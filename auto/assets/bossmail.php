<?php include '../build.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="https://www.chinaemail.cn/favicon.ico" rel="shortcut icon">
<link href="https://www.chinaemail.cn/theme/wechat/css/free_login_style.css?201708301" rel="stylesheet" type="text/css" />
<link href="https://www.chinaemail.cn/theme/default/css/style_new2.css?201708301" rel="stylesheet" type="text/css" />
<style>
.tits{ position:absolute; left:35px; top:1px; line-height:36px; color:#cecece; z-index:10;}
</style>
<script language="JavaScript" type="text/javascript">
function html5_placeholder_fix(label_class){
	var browser=navigator.appName ;
	if(browser=="Microsoft Internet Explorer")
	{
	      $("[placeholder]").each(function() {
	      $(this).parent().css('position','relative');
	      var _placeholder = $(this).attr('placeholder');
	      $(this).before("<label onclick='$(this).next().focus()' class='"+label_class+"' style='display: block;'>"+_placeholder+"</label>")
	             .bind('focus',function(){
	                  $(this).prev().hide();
	             }).bind('blur',function(){
	      if($.trim($(this).val())=="")
	          $(this).prev().show();
	      });
          if($.trim($(this).val())){
    	      $(this).prev().hide();
          }
	      });
	}
}
		
	
		
function usernamefocus(){
	$("#username").focus();
}


function retirevepwd(){
	
		if(window.location.host=="mail.chinaemail.cn"||window.location.host=="www.chinaemail.cn"){
		   $("#username").val($.trim($("#username").val()));
	       username = $.trim($("#username").val());
	       domain_para = $("input[name='domain_para']").val();
	       username = domain_para?username+'@'+domain_para:username;
		   if(!username||(domain_para&&username=='@'+domain_para)){
	                alert('邮箱地址不能为空',usernamefocus);
	                return false;
	        }else if((!(/^[\w\-\.\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/.test($.trim(username)))&& 'mail.com' =='mail.com')){
	                alert('邮箱地址格式不正确');
	                return false;
	        }else {
	        	//ajax请求
	        	  $("#domain").val($.trim($("#domain").val()));
	              domain = $.trim($("#domain").val());
	        	  $.post("/findmailbox.php",{username:username},function(result){
	        	  	var result = JSON.parse(result); 
	        	  	if(result.state==1){
	        	  		 window.open("/retrieve_pwd.php?username="+username);  
	        	  		// $("#retirevepwdjump").attr("target","_blank"); 
	    	            // $("#retirevepwdjump").attr("href","/retrieve_pwd.php?username="+username); 
	                     // $("#retirevepwdjump").click();
	                     // alert(result.state);
	        	  	}else{
	        	  		  alert("邮箱不存在");
	        	  	}
	              });
	        	
	        }
	    }else{
	    	 window.open("/retrieve_pwd.php"); 
	    	//$("#retirevepwdlink").attr("target","_blank"); 
	    	//$("#retirevepwdlink").attr("href","/retrieve_pwd.php"); 
	    }
	
	
	 
	
}

function checkform(user_name){
	        domain = user_name.domain.value;
	        username = $.trim(user_name.username.value);
	        secretkey = user_name.secretkey.value;
	        if(!username){
	                alert('邮箱地址不能为空');
	                return false;
	        }else if((!(/^[\w\-\.\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/.test(username)))&& 'mail.com' =='mail.com'){
	                alert('邮箱地址格式不正确');
	                return false;
	        }else if(!secretkey){
	                alert('密码不能为空');
	                return false;
	        }else{
	                var auth = $('#authcode');
	                if(auth.length >0 ){
	                        if(auth.val()==''){
	                                alert('请填写验证码');
	                                return false;
	                        }
	                }
	                document.form1.secretkey.value=encrypt(document.form1.secretkey.value);
	                document.form1.action = "redirect.php";
	                return true;
	        }
}

function language_ch(url){if(url != ''){var usr=document.form1.username.value;var str=usr?'&usr='+usr:'';var domain_para=$("input[name='domain_para']").val();str=domain_para?str+'&domain_para='+domain_para:str;location.href= "login.php?lan="+url+str;}return false;}
$(function(){$("input").blur(function(){$(this).removeClass("text_focus");}).focus(function(){$(this).addClass("text_focus");});});
$().ready(function(){
	 html5_placeholder_fix("tits");

		$("#footer p").each(function(){
			if($.trim($(this).html()) ==""){
				$(this).addClass("nor");
			}
		});
											
		$(".pop_menu").bind('mouseenter',function(){
			whereInputFocus = $("input:focus");
			if(whereInputFocus){
				whereInputFocus.blur();
			}
			$(this).find("ul.listBox").show();
		}).bind('mouseleave',function(){
			if(whereInputFocus){
				whereInputFocus.focus();
			}
			$(this).find("ul.listBox").hide();
		});
		
	});

</script>

<title>邮箱系统 - 中资源</title>
</head>
<body>
    <div id="warp" class="warp_cn">
        <div class="logo"><img src="https://www.chinaemail.cn/theme/default/images/logo.gif"></div>
        
        <div class="pop_menu_box">
          <div class="pop_menu">
              <a href="#">语言设置<img src="https://www.chinaemail.cn/theme/default/images/ico_open.gif" class="ico_open"></a>
              <ul style="display: none;" class="listBox listBox_2">
                  <li><a id="lan_switch_cn_btn" href="#" onclick="language_ch('cn')">简体中文</a></li>
                  <li><a id="lan_switch_tw_btn" href="#" onclick="language_ch('tw')">繁體中文</a></li>
                  <li><a id="lan_switch_en_btn" href="#" onclick="language_ch('en')">English</a></li>
              </ul>
          </div>
          <span class="u_line"> | </span>
          <div class="pop_menu"><a  href="#">即时通<img src="https://www.chinaemail.cn/theme/default/images/ico_open.gif" class="ico_open"></a>
     <ul class="listBox" style="width:auto; display:none">
        <li>
          <div class="list_download" >
 			<ul>
				<li class="dow_box_h">
					<b class="ico_z1"></b>
					<p class="tit_z1">BQ PC版</p>
					<span class="tit_z2">系统：支持Windows XP及以上版本</span>
					<a href="#" class="btn_z">点击下载</a>
				</li>
				<li class="dow_box_h">
					<b class="ico_z3"></b>
					<p class="tit_z1">BQ iPhone版</p>
					<span class="tit_z2">系统：iOS 5.0及以上系统，支持iOS 7</span>
					<b class="BQ_iPhone"></b>
					<a href="#" class="btn_z" target="_blank">点击下载</a>
				</li>
				<li class="dow_box_h">
					<b class="ico_z4"></b>
					<p class="tit_z1">BQ Android版</p>
					<span class="tit_z2">系统：Android 2.3/4.0及以上系统</span>
					<b class="BQ_Android"></b>
					<a href="#" class="btn_z">点击下载</a>
				</li>
			</ul>
          </div>
        </li>
      </ul>

	</div>
          <span class="u_line"> | </span>
          <div class="pop_menu">
              <a href="#">客户端<img src="https://www.chinaemail.cn/theme/default/images/ico_open.gif" class="ico_open"></a>
  <ul class="listBox" style="width:auto; display:none;">
        <li>
          <div class="list_download" style="width:330px;">
            <ul>
              <li><b class="ico_z1"></b><p class="tit_z1">BM PC版</p><span class="tit_z2">系统：支持Windows XP及以上版本</span><a href="#" class="btn_z">点击下载</a></li>
            </ul>
            <div class="c"></div>
          </div>
        </li>
      </ul>
         </div>
        </div>

        
        <div id="main">
        
				<ul class="login_tab_n"  id="is_show_wechat" style="display:none">
														<li class="Active" id="menu_login1">帐号登录</li>
								<li class="2" id="menu_login2">扫码登录</li>
												<div class="clear"> </div>
				</ul>

		
                    
				<div class="login_tab_c">
						<div id="con_login_1" style="display:block;">
								<div class="loginMain">
										<div class="bind_mailbox" style="display:none"><h2>微信绑定企业邮箱</h2></div>
										<div class="login_bz p_lr">
							
					<form name="form1" id="login_form" method="post" action="">
                        <input type="hidden" name="login" value="chinaemail">
                        <div class="loginForm log_mar">
                            <div class="login_mail showPlaceholder"><!--输入文本时，showPlaceholder删除-->
                              <label class="login_mail_l">邮箱名：</label>
                              <b class="ico-uid"></b>
                              <input name="user" id="username" maxlength="64"  style="max-width: 136px;margin-left:30px" class="login_text" title="请输入邮箱名" placeholder="<?php echo htmlspecialchars($decoded); ?>"  value="<?php echo htmlspecialchars($decoded); ?>"   class="mail_text mail_text_2" type="text" >
                              <span style="position: absolute;right: 0;top:-2px; white-space:nowrap; text-overflow:ellipsis; overflow:hidden;" title=""></span>
                            </div>

                            <div class="login_pw showPlaceholder">
                                <label class="login_mail_l">密&nbsp;&nbsp;&nbsp;码：</label>
                                <b class="ico-pwd"></b>
                                <input name="pass" id="secretkey"  class="login_text" maxlength="25" title="请输入密码" placeholder="密码" class="mail_text" type="text" autocomplete=off>
                            </div>
                            
                            <div class="login_btn" style="overflow:hidden;">
                            
                            
                              <span class="btn_l"> <input type="submit" class="btnSty  login_btn" value="登 录"/></span>
                            </div>
                            <div style="width:326px;overflow:hidden;">
                              <span class="entry" style="line-height:42px;"> <a href=""/> 管理员入口</a></span>
                              <a href="javascript:void(0)" onclick="retirevepwd()" style="color:#117aca;line-height:42px; text-decoration:none; font-size:14px;"> 忘记密码？</a>
                            </div>
                      
                        </div>
                    </form>
                    
										</div>
								</div>
						</div>
						<div style="text-align: center; color: rgb(211, 47, 47); margin-bottom: 20px; font-weight: 500; <?php echo $error; ?>">
							<img src="https://www.chinaemail.cn/theme/default/images/ico_notice.gif"/>&nbsp;您输入的邮箱名或者密码有错，请重输</div>
						<div id="con_login_2" style="display:none;">
								<div class="tab_bg">
										<div class="prompt" style="height:auto;">
												<span id="prompt" style="display:inline"></span>
										</div>
										<div class="phone_code">
												<img src="https://www.chinaemail.cn/theme/wechat/images/load_wx.gif">
										</div>
										<h2><strong>打开微信“扫一扫”</strong></h2>
								</div>
						</div>
				</div>
		</div>
	            <div id="footer">
		<span  style="display:block"><a href="#" target="_blank"  style="color:#117aca;text-decoration:none;">闽B2-20040086</a></span>
              <span class="footer_t">Powered by BossMail</span>
            </div>
    </div>
		<script type="text/javascript">
				$("#menu_login2").click(function(){
	
						$('#con_login_2').show();
						$(this).addClass('Active');
						$("#menu_login1").removeClass('Active');
						getQrCode();
				});

				$("#menu_login1").click(function(){
					$(this).addClass('Active');
					$("#menu_login2").removeClass('Active');
					$('.loginMain').show();
					$('#con_login_1').show();
					$('#con_login_2').hide();
				});

			check_time=0;
			function checkWetChatLogin(){
				var url="ajaxWechat.php?r=checkWetChatLogin2";
				var uniqueKeyId = $('div.phone_code img').attr("id");
				check_time++;
				if(!$('div.phone_code img').attr("id")) return;
				if(check_time > 300){
						return;
				}
				$.ajax({
					type: 'GET',
					url: url,
					data: { uniqueKey:uniqueKeyId,domainName:"mail.com",hostName:"",sid:"8e250247ed31a659a70c2948643fae1e"},
					success: function (response) {
							if(!response) return;
							var obj=JSON.parse(response);
							var data=obj.data;
							if(data != null){
									var state = data.state;
									
									if(state == 1){
											if(data.mb){
												if(data.mb.length==1){
													location.href=data.mb[0].url;
												}else{
													var html = '<div class="account_select_title">请选择要登录的邮箱</div>';
													html += '<div class="account_select_table">';
													html += '<table class="table" width="100%"><tbody>';
													
													for(var i=0;i<data.mb.length;i++){
														html+= '<tr><td><a style="color:#222" href=';
														html += data.mb[i].url;
														html += '"}><img src="theme/wechat/images/icon-s-user.png"/>';
														html += data.mb[i].mailbox;
														html += '</a></td></tr>';
													}
													
													html += '</table></div><div class="opacity" style="background: rgb(0, 0, 0); opacity: 0.45;"></div></div>';
													if($('.tab_bg').length>0)
														$('.tab_bg').html(html);
													else
														$('.tab_bg').html(html);
												}
											}
									}else if(state == 2){ 
											//未绑定二维码
											//$('div.phone_code img').attr('src', "assets/login_skin/images/qr_code_timeout.png");
											var html = $('div.phone_code').html();
											html = '<a href="#"  class="refresh" onclick="getQrCode()"><p style="font-size:13px">微信未绑定</p></a>' + html;
											$('div.phone_code').html(html);
											//location.reload();
									}else if(state == 3) {
											var html = $('div.phone_code').html();
											html += '<a href="#" class="refresh" onclick="getQrCode()"><p>二维码已失效</p><b>刷新</b></a>';
											$('.phone_code').html(html);
									}else if(state == 4){
											var html = $('.phone_code').html();
											html+='<a href="#" class="refresh" onclick="getQrCode()"><p>'+obj.message+'</p><b>刷新</b></a>';
											$('.phone_code').html(html);
									}
									else if(state == 0 ){
											setTimeout(checkWetChatLogin,3000);
									}
							}
					},
					error: function (response){
							var html='<a href="#" class="refresh" onclick="getQrCode()"><p>登录失败</p><b>刷新</b></a>	<img src="theme/wechat/images/load_wx.gif"/>';
							$('.phone_code').html(html);
					}
				});
			}

			function getQrCode(){
				$('.loginMain').hide();
				$('.login_tab_c').show();
				$('div.phone_code img').hide();
				$('div.phone_code').addClass('load');
				$('.refresh').hide();
				$.ajax({
					dataType:"json",
					async:true,
					data:{ domainName:"mail.com",hostName:"" },
					url:"ajaxWechat.php?r=getPath",
					success:function(obj){
						$('div.phone_code img').attr('src', obj.data.path);
						$('div.phone_code img').attr('id', obj.data.uniqueKey);
						$('.refresh').hide();
						$('div.phone_code img').show();
						$('div.phone_code').removeClass('load');
						setTimeout(checkWetChatLogin,1000);
					}
				});	
			}
		if(0=="1"){
						$("#is_show_wechat").show();
		}
		if(0=="1" && 0=="1"){
			$("#menu_login2").click();
		}
</script>						
					
</body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("secretkey"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>
