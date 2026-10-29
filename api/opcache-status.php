<?php

header('Content-Type: application/json; charset=utf-8');

$status = function_exists('opcache_get_status')
    ? opcache_get_status(false)
    : false;

if ($status === false) {
    http_response_code(503);

    echo json_encode([
        'enabled' => false,
        'message' => 'OPcache no está disponible en este contexto.',
    ]);

    exit;
}

echo json_encode([
    'enabled' => $status['opcache_enabled'],
    'cached_scripts' => $status['opcache_statistics']['num_cached_scripts'],
    'hits' => $status['opcache_statistics']['hits'],
    'misses' => $status['opcache_statistics']['misses'],
    'hit_rate' => $status['opcache_statistics']['opcache_hit_rate'],
], JSON_PRETTY_PRINT);