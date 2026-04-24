<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

$fixture = (string) ($_GET['fixture'] ?? '');
$fixture = preg_replace('/[^a-zA-Z0-9_-]/', '', $fixture) ?? '';

if ($fixture === '__health') {
    header('Content-Type: text/plain');
    echo 'ok';
    return;
}

if ($fixture === '') {
    $views = glob(__DIR__ . '/views/*.php') ?: [];
    $names = array_map(static fn(string $p): string => basename($p, '.php'), $views);
    sort($names);

    header('Content-Type: text/html; charset=utf-8');
    echo "<!DOCTYPE html>\n<html lang=\"en\">\n";
    echo "<head><meta charset=\"utf-8\"><title>Elmish E2E Fixtures</title></head>\n";
    echo "<body><h1>Elmish E2E Fixtures</h1><ul>\n";
    foreach ($names as $name) {
        $safe = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        echo "<li><a href=\"/?fixture={$safe}\">{$safe}</a></li>\n";
    }
    echo "</ul></body></html>\n";
    return;
}

$path = __DIR__ . '/views/' . $fixture . '.php';

if (! is_file($path)) {
    http_response_code(404);
    header('Content-Type: text/plain');
    echo "Fixture not found: {$fixture}";
    return;
}

ob_start();
include $path;
$body = (string) ob_get_clean();

header('Content-Type: text/html; charset=utf-8');
echo "<!DOCTYPE html>\n",
    "<html lang=\"en\">\n",
    "<head><meta charset=\"utf-8\"><title>{$fixture}</title></head>\n",
    "<body>\n{$body}\n</body>\n",
    "</html>\n";
