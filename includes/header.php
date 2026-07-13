<?php
// includes/header.php
// HTML must never be served stale (SiteGround's dynamic cache kept serving
// pre-deploy pages); assets stay cacheable via their ?v= versioned URLs
header('Cache-Control: no-cache, must-revalidate');

include_once 'config.php';

// Get page-specific title if provided
$page_title = isset($page_title) ? $page_title . ' - ' . $site_name : $site_title;

// Navigation highlighting from the request path (works under Apache and `php -S`)
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_path = rtrim(preg_replace('/\.php$/', '', $request_path), '/');

if ($request_path === '' || $request_path === '/index') {
    $active_nav = '/';
} elseif (strpos($request_path, '/techart') === 0 || strpos($request_path, '/pages-techart') === 0) {
    $active_nav = '/techart';
} elseif (strpos($request_path, '/devops') === 0 || strpos($request_path, '/pages-devops') === 0) {
    $active_nav = '/devops';
} elseif ($request_path === '/devlog') {
    $active_nav = '/devlog';
} elseif ($request_path === '/about') {
    $active_nav = '/about';
} elseif ($request_path === '/contact') {
    $active_nav = '/contact';
} else {
    $active_nav = null; // not a main page: highlight nothing
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="<?php echo htmlspecialchars($site_author); ?>" />
    <meta name="description" content="<?php echo htmlspecialchars($site_description); ?>" />
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <?php
    // Link each stylesheet with an mtime version so CSS changes bust browser caches
    foreach (['variables', 'base', 'header', 'grid', 'forms', 'projects', 'pages', 'responsive'] as $sheet) {
        $sheet_file = __DIR__ . '/../static/css/' . $sheet . '.css';
        $v = @filemtime($sheet_file) ?: 1;
        echo '    <link rel="stylesheet" href="/static/css/' . $sheet . '.css?v=' . $v . '" />' . "\n";
    }
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
    <div class="title__container">
        <h1><a href="/" style="color: inherit; text-decoration: none;"><?php echo htmlspecialchars($site_name); ?></a></h1>
        <nav>
            <?php foreach ($nav_items as $file => $label): ?>
                <a href="<?php echo $file; ?>" 
                   <?php echo ($active_nav === $file) ? 'class="active"' : ''; ?>>
                    <?php echo htmlspecialchars($label); ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
