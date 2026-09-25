<?php
declare(strict_types=1);

// The original project accepted passwords here and forwarded them to third
// parties. Credential collection is intentionally disabled.
http_response_code(410);
header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    'ok' => false,
    'message' => 'Credential collection is disabled in this safe training build.'
], JSON_UNESCAPED_SLASHES);