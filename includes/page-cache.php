<?php

declare(strict_types=1);

function startPageCache(int $ttl = 300): void
{
    if (PHP_SAPI === 'cli') {
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        return;
    }

    if (!empty($_GET) || !empty($_POST)) {
        return;
    }

    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    $cacheDir = dirname(__DIR__) . '/cache/pages';

    if (!is_dir($cacheDir)) {
        mkdir($cacheDir, 0755, true);
    }

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';

    $cacheKey = hash('sha256', $uri);
    $cacheFile = $cacheDir . '/' . $cacheKey . '.html';

    if (is_file($cacheFile) && filemtime($cacheFile) + $ttl > time()) {
        header('X-Page-Cache: HIT');
        header('Content-Type: text/html; charset=UTF-8');

        readfile($cacheFile);
        exit;
    }

    header('X-Page-Cache: MISS');

    ob_start();

    register_shutdown_function(
        static function () use ($cacheFile): void {
            $html = ob_get_contents();

            if ($html === false) {
                return;
            }

            if (http_response_code() !== 200) {
                ob_end_flush();
                return;
            }

            if (headers_sent()) {
                ob_end_flush();
                return;
            }

            file_put_contents($cacheFile, $html, LOCK_EX);

            ob_end_flush();
        }
    );
}