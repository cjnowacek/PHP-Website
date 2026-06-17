<?php
// includes/project-cards/omnitool.php
return [
    'id' => 'omnitool',
    'title' => 'OmniTool — Pipeline App',
    'company' => 'Pipeline Tooling',
    'category' => 'devops',
    'featured' => true,
    'order' => 2,
    // Drop an image at this path to replace the placeholder card art:
    'image' => null, // 'static/img/project-cards/omnitool.webp'
    'gif' => null,
    'description' => 'A Python/PyQt application for automating 3ds Max scene prep and render-farm job submission. One codebase runs as a CLI, a desktop GUI, and natively inside Max — shipped as a self-updating, EDR-whitelisted single-file executable to ~130 machines across two studios.',
    'highlights' => [
        'One codebase runs as CLI, PyQt GUI, and natively inside 3ds Max',
        'Single-file PyInstaller build tuned to pass studio EDR (SentinelOne)',
        'Self-updating: per-user task SHA-256 checks the share every 10 minutes',
        'Headless install/uninstall with automatic Max startup-listener bootstrap'
    ],
    'tech_tags' => ['Python', 'PyQt', '3ds Max / pymxs', 'PyInstaller', 'PowerShell'],
    'link' => 'pages-devops/omnitool/',
    'meta' => [
        'duration' => '',
        'role' => 'Pipeline & Tools Developer',
        'platforms' => 'Windows · 3ds Max 2022–2026',
        'team_size' => 'Solo'
    ]
];
?>
