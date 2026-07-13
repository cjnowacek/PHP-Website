<?php
// includes/config.php
$site_title = "CJ Nowacek";
$site_name = "CJ Nowacek";
$current_year = date('Y');

// Navigation items
$nav_items = [
    '/' => 'Home',
    '/techart' => 'Tech Art',
    '/devops' => 'Pipeline',
    '/devlog' => 'Dev Log',
    '/about' => 'About',
//    '/contact.php' => 'Contact'
];

// Get current page for active nav highlighting
$current_page = basename($_SERVER['PHP_SELF']);
$current_path = '/' . $current_page; // Add leading slash to match nav_items

// Site metadata for SEO
$site_description = "CJ Nowacek: Pipeline Developer and Technical Artist specializing in CG production tooling, render farm automation, character rigging, and DCC workflows.";
$site_keywords = "pipeline developer, technical artist, 3ds max, maxscript, python automation, pyqt, render farm, character rigging, unreal engine";
$site_author = "CJ Nowacek";
$site_url = "https://cjnowacek.com";

// Social media links
$social_links = [
    'linkedin' => 'https://linkedin.com/in/cj-nowacek',
    'github' => 'https://github.com/cjnowacek',
    'vimeo' => 'https://vimeo.com/1016947852',
    'email' => 'mailto:cj@cjnowacek.com'
];
?>
