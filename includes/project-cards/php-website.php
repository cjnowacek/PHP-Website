<?php

// includes/project-cards/php-website.php
return [
    'id' => 'php-website',
    'title' => 'This Website',
    'company' => '',
    'category' => 'devops',
    'featured' => false,
    'order' => 4,
    'image' => '',
    'gif' => '',
    'description' => 'This portfolio site: procedural PHP with clean-URL routing, a data-driven project card system, and CI/CD that auto-deploys every push to production over SSH.',
    'highlights' => [
        'GitHub Actions deploy pipeline to SiteGround',
        'Data-driven project cards: each project is a PHP array, not markup',
        'Resume PDFs built and pushed automatically from a LaTeX repo CI'
    ],
    'tech_tags' => ['PHP', 'Apache', 'GitHub Actions', 'rsync'],
    'link' => 'https://github.com/cjnowacek/php-website',
    'meta' => [
        'duration' => 'Ongoing',
        'role' => 'Developer',
        'platforms' => 'Web',
        'team_size' => 'Personal project'
    ]
];
?>
