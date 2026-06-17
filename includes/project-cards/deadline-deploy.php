<?php
// includes/project-cards/deadline-deploy.php
return [
    'id' => 'deadline-deploy',
    'title' => 'Render Farm Deploy Automation',
    'company' => 'Render Farm Infrastructure',
    'category' => 'devops',
    'featured' => true,
    'order' => 1,
    // Drop an image at this path to replace the placeholder card art:
    'image' => null, // 'static/img/project-cards/deadline-deploy.webp'
    'gif' => null,
    'description' => 'Python automation that installs 3ds Max (2024/2026) and the full plugin stack — V-Ray, Phoenix FD, Anima, Forest Pack — across ~130 Windows render nodes, executed remotely and unattended through AWS Thinkbox Deadline.',
    'highlights' => [
        'Automated 3ds Max + plugin installs across ~130 Windows render nodes',
        'Remote, unattended rollout via Deadline workers — no hands-on per machine',
        'SYSTEM-level elevation through scheduled tasks (workers stay non-admin)',
        'Dry-run mode and --continue-on-fail for safe, resilient deployments'
    ],
    'tech_tags' => ['Python', 'AWS Thinkbox Deadline', 'Windows', 'Render Farm', 'Automation'],
    'link' => 'pages-devops/deadline-deploy/',
    'meta' => [
        'duration' => '',
        'role' => 'Pipeline & DevOps',
        'platforms' => 'Windows render farm (~130 nodes)',
        'team_size' => 'Solo'
    ]
];
?>
