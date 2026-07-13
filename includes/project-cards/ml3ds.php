<?php
// includes/project-cards/ml3ds.php
return [
    'id' => 'ml3ds',
    'title' => 'ML3DS Production Pipeline',
    'company' => 'MediaLab 3D Solutions',
    'category' => 'devops',
    'featured' => true,
    'order' => 0,
    'image' => '',
    'gif' => '',
    'description' => 'Pipeline tools and infrastructure for an architectural visualization studio: scene automation, render farm deployment, and artist-facing tooling for 3ds Max production at scale.',
    'highlights' => [
        'Python scene-automation framework with CLI, PyQt GUI, and native 3ds Max integration',
        'MaxScript batch-rendering suite for material and finish combinations',
        'Automated remote deployment of 3ds Max and plugins across the render farm',
        'Leading migration to a modern render-management platform'
    ],
    'tech_tags' => ['Python', 'PyQt', 'MaxScript', '3ds Max', 'V-Ray'],
    'link' => 'pages-devops/ml3ds/index.php',
    'meta' => [
        'duration' => '2026-Present',
        'role' => 'CGI Pipeline Developer',
        'platforms' => 'Windows render farm',
        'team_size' => 'Studio-wide tooling'
    ]
];
