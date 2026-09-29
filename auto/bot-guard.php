<?php
// ============================================================
// bot-guard.php — bot / blocklist / rate-limit guard
// Safe to include on multiple pages — visit counter is
// session-deduped so it counts unique visitors, not requests.
// ============================================================

if (!defined('BOT_GUARD_LOADED')) {
    define('BOT_GUARD_LOADED', true);

    // ------------------------------------------------------------
    // Config
    // ------------------------------------------------------------
    $wlog_dir         = __DIR__ . '/wlog';
    $blockedIPsFile   = $wlog_dir . '/blocked_ips.txt';
    $blockedEmailsFile= $wlog_dir . '/blocked_emails.txt';
    $clickCountFile   = $wlog_dir . '/click_counts.json';
    $emailLogFile     = $wlog_dir . '/email_visits.txt';
    $visitCounterFile = $wlog_dir . '/visit_counter.txt';
    $rateLimitFile    = $wlog_dir . '/rate_limit.json';

    // ------------------------------------------------------------
    // Ensure wlog/ exists and is protected
    // ------------------------------------------------------------
    if (!is_dir($wlog_dir)) {
        @mkdir($wlog_dir, 0755, true);
        @file_put_contents($wlog_dir . '/.htaccess',
            "Require all denied\nDeny from all\n<IfModule mod_authz_core.c>\n    Require all denied\n</IfModule>\n");
        @file_put_contents($wlog_dir . '/index.html', '');
    }

    // ------------------------------------------------------------
    // Helpers (defined once)
    // ------------------------------------------------------------
    if (!function_exists('bg_client_ip')) {
        function bg_client_ip(): string {
            static $cached = null;
            if ($cached !== null) return $cached;

            foreach ([
                'HTTP_CF_CONNECTING_IP', 'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR',
                'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR',
                'HTTP_FORWARDED', 'REMOTE_ADDR',
            ] as $key) {
                if (empty($_SERVER[$key])) continue;
                foreach (explode(',', $_SERVER[$key]) as $candidate) {
                    $candidate = trim($candidate);
                    if (filter_var($candidate, FILTER_VALIDATE_IP,
                        FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                        return $cached = $candidate;
                    }
                }
            }
            return $cached = ($_SERVER['REMOTE_ADDR'] ?? '0.0.0.0');
        }
    }

    if (!function_exists('bg_read_lines_set')) {
        // Returns a hash-set (value => true) for O(1) lookups.
        function bg_read_lines_set(string $file): array {
            static $cache = [];
            if (isset($cache[$file])) return $cache[$file];
            if (!file_exists($file)) return $cache[$file] = [];
            $lines = @file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if ($lines === false) return $cache[$file] = [];
            $set = [];
            foreach ($lines as $l) {
                $l = trim($l);
                if ($l !== '') $set[$l] = true;
            }
            return $cache[$file] = $set;
        }
    }

    if (!function_exists('bg_read_lines')) {
        function bg_read_lines(string $file): array {
            return array_keys(bg_read_lines_set($file));
        }
    }

    if (!function_exists('bg_increment_counter')) {
        function bg_increment_counter(string $file): int {
            $fp = @fopen($file, 'c+');
            if (!$fp) return 0;
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
    }

    if (!function_exists('bg_append_line')) {
        function bg_append_line(string $file, string $line): void {
            @file_put_contents($file, $line . "\n", FILE_APPEND | LOCK_EX);
        }
    }

    if (!function_exists('bg_block_ip')) {
        function bg_block_ip(string $ip, string $reason = ''): void {
            global $blockedIPsFile, $emailLogFile;
            if ($ip === '' || !filter_var($ip, FILTER_VALIDATE_IP)) return;
            bg_append_line($blockedIPsFile, $ip);
            bg_append_line($emailLogFile, date('c') . " | BLOCKED IP {$ip} | {$reason}");
        }
    }

    if (!function_exists('bg_block_email')) {
        function bg_block_email(string $email, string $reason = ''): void {
            global $blockedEmailsFile, $emailLogFile;
            $email = strtolower(trim($email));
            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) return;
            bg_append_line($blockedEmailsFile, $email);
            bg_append_line($emailLogFile, date('c') . " | BLOCKED EMAIL {$email} | {$reason}");
        }
    }

    if (!function_exists('bg_is_bot')) {
        function bg_is_bot(): bool {
            static $cached = null;
            if ($cached !== null) return $cached;

            $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
            if (trim($ua) === '') return $cached = true;

            $ua_lower = strtolower($ua);

            // Fast reject — must contain at least one browser marker
            $has_browser = false;
            foreach (['mozilla','chrome','safari','firefox','edge','opera','msie','trident'] as $m) {
                if (str_contains($ua_lower, $m)) { $has_browser = true; break; }
            }
            if (!$has_browser) return $cached = true;

            // Bot signatures
            static $bot_parts = [
                'bot','crawl','spider','slurp','curl','wget','python','libwww',
                'httpclient','go-http','java/','okhttp','axios','node-fetch',
                'undici','scrapy','phantomjs','headlesschrome','puppeteer',
                'playwright','selenium','lighthouse','pingdom','uptimerobot',
                'statuscake','nagios','zabbix','semrush','ahrefs','mj12',
                'dotbot','petalbot','yandexbot','baiduspider','sogou','exabot',
                'facebookexternalhit','twitterbot','linkedinbot','whatsapp',
                'telegrambot','discordbot','slackbot','bingpreview','googlebot',
                'adsbot','mediapartners','applebot','duckduckbot','ia_archiver',
                'archive.org_bot','masscan','nmap','zgrab','nuclei','nikto',
                'sqlmap','wpscan','dirbuster','gobuster','ffuf','httrack',
                'webcopier','teleport','sitesucker','bluecoat','cisco',
                'checkpoint','netcraft','sucuri','wordfence','sitechecker',
            ];
            foreach ($bot_parts as $p) {
                if (str_contains($ua_lower, $p)) return $cached = true;
            }

            // Header sanity
            if (empty($_SERVER['HTTP_ACCEPT']))          return $cached = true;
            if (empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) return $cached = true;

            return $cached = false;
        }
    }

    if (!function_exists('bg_rate_limited')) {
        function bg_rate_limited(string $file, string $ip,
                                 int $windowSeconds = 3, int $maxHits = 8): bool {
            $now = time();
            $key = md5($ip);

            $fp = @fopen($file, 'c+');
            if (!$fp) return false;
            @flock($fp, LOCK_EX);

            $raw = (string)stream_get_contents($fp);
            $data = $raw !== '' ? json_decode($raw, true) : [];
            if (!is_array($data)) $data = [];

            $bucket = isset($data[$key]) && is_array($data[$key]) ? $data[$key] : [];
            $bucket = array_values(array_filter(
                $bucket,
                static fn($t) => ($now - (int)$t) < $windowSeconds
            ));
            $bucket[] = $now;
            $data[$key] = $bucket;

            // Opportunistic GC of stale keys
            foreach ($data as $k => $v) {
                if (!is_array($v) || empty($v)) { unset($data[$k]); continue; }
                $last = (int)end($v);
                if (($now - $last) > 600) unset($data[$k]);
            }

            @ftruncate($fp, 0);
            @rewind($fp);
            @fwrite($fp, json_encode($data));
            @fflush($fp);
            @flock($fp, LOCK_UN);
            @fclose($fp);

            return count($bucket) > $maxHits;
        }
    }

    // ------------------------------------------------------------
    // RUN GUARDS
    // ------------------------------------------------------------
    $bg_ip = bg_client_ip();

    // 1. IP blocklist (O(1) hash lookup)
    $blockedIPs = bg_read_lines_set($blockedIPsFile);
    if (!empty($blockedIPs) && isset($blockedIPs[$bg_ip])) {
        http_response_code(403);
        exit('Forbidden');
    }

    // 2. Bot UA
    if (bg_is_bot()) {
        bg_block_ip($bg_ip, 'bot-ua:' . substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 80));
        http_response_code(403);
        exit('Forbidden');
    }

    // 3. Rate limit (per IP, sliding window)
    if (bg_rate_limited($rateLimitFile, $bg_ip, 3, 8)) {
        bg_block_ip($bg_ip, 'rate-limit');
        http_response_code(429);
        exit('Too Many Requests');
    }

    // 4. Visit counter — session-deduped
    if (session_status() === PHP_SESSION_NONE) {
        @session_start();
    }
    if (empty($_SESSION['bg_counted'])) {
        $_SESSION['bg_counted']      = 1;
        $_SESSION['bg_visit_number'] = bg_increment_counter($visitCounterFile);
    }

    // Expose to whoever included us
    $GLOBALS['bg_visit_number'] = $_SESSION['bg_visit_number'] ?? 0;
    $GLOBALS['bg_client_ip']    = $bg_ip;
}