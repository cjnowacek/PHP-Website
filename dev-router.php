<?php
// Dev router for `php -S` (local preview only; Apache uses .htaccess instead).
// Emulates the clean-URL rewrites: /foo -> foo.php, directory index.php, 404.
$docroot = __DIR__;
$path = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$full = realpath($docroot . $path);

// Serve non-PHP static files as-is
if ($full && is_file($full) && pathinfo($full, PATHINFO_EXTENSION) !== 'php') {
    return false;
}

// Resolve the PHP script: explicit .php, directory index, or clean URL
$script = null;
if ($full && is_file($full)) {
    $script = $full;
} elseif ($full && is_dir($full) && is_file($full . DIRECTORY_SEPARATOR . 'index.php')) {
    $script = $full . DIRECTORY_SEPARATOR . 'index.php';
} elseif (is_file($docroot . $path . '.php')) {
    $script = $docroot . $path . '.php';
}

if ($script) {
    chdir(dirname($script)); // match Apache: cwd = script dir, so relative includes work
    require $script;
    return true;
}

http_response_code(404);
chdir($docroot);
require $docroot . '/404.php';
return true;
