// src/data/projects.js
// Ported from includes/project-cards/*.php — each PHP file's `return [...]` array
// is one object here. Image/gif paths are normalized to absolute /static/... URLs
// (the PHP versions used relative paths, which broke on sub-pages).
//
// Detail-page links point to clean Astro routes (/techart/<id>, /devops/<id>);
// those detail pages are ported in a later step.
//
// Not yet ported (review — looked like placeholder/stub data in PHP):
//   - php-website.php  (card body was a copy of runaway's content)
//   - build_pipeline.php (generic "Enterprise DevOps" sample metrics)

export const projects = [
  // ───────────────────────── Technical Art ─────────────────────────
  {
    id: 'smite',
    title: 'Smite',
    company: 'Hi-Rez Studios',
    category: 'techart',
    featured: true,
    order: 1,
    image: '/static/img/project-cards/smite-webp-1200x900.webp',
    gif: '/static/img/project-cards/smite-gif-1200x900.gif',
    description:
      'Technical artist to the popular MOBA game. Focused on creating optimizing charater rigging pipelines, and developing tools to streamline the art production workflow.',
    highlights: [
      'Created automatic build tools for building rig moduals',
      'Reduced character port time from smite to its sequal by 25%',
    ],
    tech_tags: ['Unreal Engine 5', '3D Studio Max', 'Macscript', 'Python'],
    link: '/techart/smite',
    meta: {
      duration: '18 months',
      role: 'Technical Artist',
      platforms: 'PC, Console',
      team_size: '200+ developers',
    },
  },
  {
    id: 'sintern',
    title: 'The Sintern',
    company: 'Brimstone Studios',
    category: 'techart',
    featured: true,
    order: 2,
    image: '/static/img/project-cards/sintern-webp-1200x900.webp',
    gif: '/static/img/project-cards/sintern-gif-1200x900.gif',
    description:
      "Junior feature film project about the devils intern in hell. She is tasked with taking care of her boss's demon dog while also trying to complete her work.",
    highlights: [
      'Character rigging and animation cleanup',
      'Lighting rigging and environmental modeling',
    ],
    tech_tags: ['Maya', 'Python', 'Blender', 'After Effect'],
    link: '/techart/sintern',
    meta: {
      duration: '6 months',
      role: 'Technical Artist & Developer',
      platforms: 'Animation',
      team_size: '3 developers',
    },
  },
  {
    id: 'runaway',
    title: 'Runaway',
    company: 'Senior Thesis',
    category: 'techart',
    featured: true,
    order: 3,
    image: '/static/img/project-cards/runaway-webp-1200x900.webp',
    gif: '/static/img/project-cards/runaway-gif-1200x900.gif',
    description:
      'Final BFA school project. Story rich adventure focusing on childhood trauma and facing your past.',
    highlights: [
      'Character rigging and animation',
      'Automated build and deployment pipeline',
      'Programed cinematic camera and character locomotion',
      'Streamlined asset import workflow',
    ],
    tech_tags: ['Unreal Engine', 'Maya', 'Blender', 'Python'],
    link: '/techart/runaway',
    meta: {
      duration: '48 hours',
      role: 'Technical Artist',
      platforms: 'PC',
      team_size: '4 developers',
    },
  },
  {
    id: 'whisper-from-the-stars',
    title: 'Whisper from the Stars',
    company: 'Anuttacon',
    category: 'techart',
    featured: true,
    order: 4,
    image: '/static/img/project-cards/whispers-webp-1200x900.webp',
    gif: '/static/img/project-cards/whispers-gif-1200x900.gif',
    description:
      'Technical artist for an indie space exploration game, focusing on automation pipeline development and CLI-based rigging workflows. Created comprehensive scripts for asset processing and animation export systems.',
    highlights: [
      'Developed CLI-based rigging automation scripts',
      'Integrated asset pipeline into CI/CD workflow',
      'Created automated animation export systems',
      'Built command-line tools for batch processing',
    ],
    tech_tags: ['Python', 'CLI Tools', 'CI/CD', 'Maya', 'Automation'],
    link: '/techart/whisper-from-the-stars',
    meta: {
      duration: '1 month',
      role: 'Technical Artist',
      platforms: 'PC',
      team_size: '8 developers',
    },
  },
  // Smite sub-tools (not featured; surfaced from the Smite detail page)
  {
    id: 'smite-envelope-tool',
    title: 'Envelope Export Tool',
    company: 'Hi-Rez Studios',
    category: 'techart',
    featured: false,
    order: 100,
    image: '/static/img/project-cards/skinExporter-webp-1200x900.webp',
    gif: '/static/img/project-cards/skinExporter-webp-1200x900.webp',
    description:
      'MaxScript tool for exporting mesh envelopes and importing skinning data. Streamlines the workflow for transferring skin weights between files in 3ds Max.',
    highlights: [
      'Automated envelope extraction from existing meshes',
      'Simplified skin weight transfer workflow',
    ],
    tech_tags: ['3D Studio Max', 'MaxScript'],
    link: '/techart/smite/envelope-tool',
    meta: {
      duration: 'Part of Smite project',
      role: 'Technical Artist',
      platforms: 'PC',
      team_size: 'Individual tool',
    },
  },
  {
    id: 'smite-gravity-switch',
    title: 'Gravity Switch Rig',
    company: 'Hi-Rez Studios',
    category: 'techart',
    featured: false,
    order: 101,
    image: '/static/img/project-cards/gravitySwitch-webp-1200x900.webp',
    gif: '/static/img/project-cards/gravitySwitch-webp-1200x900.gif',
    description:
      'Gravity simulation rigging system using orient and aim constraints. Enables dynamic directional gravity effects for character animation in Smite.',
    highlights: [
      'Dynamic gravity direction simulation using constraints',
      'Seamless integration with existing character rigs',
    ],
    tech_tags: ['3D Studio Max', 'Rigging', 'Animation'],
    link: '/techart/smite/gravity-switch',
    meta: {
      duration: 'Part of Smite project',
      role: 'Technical Artist',
      platforms: 'PC, Console',
      team_size: 'Individual tool',
    },
  },

  // ───────────────────────── DevOps ─────────────────────────
  {
    id: 'deadline-deploy',
    title: 'Render Farm Deploy Automation',
    company: 'Render Farm Infrastructure',
    category: 'devops',
    featured: true,
    order: 1,
    image: null, // '/static/img/project-cards/deadline-deploy.webp'
    gif: null,
    description:
      'Python automation that installs 3ds Max (2024/2026) and the full plugin stack — V-Ray, Phoenix FD, Anima, Forest Pack — across ~130 Windows render nodes, executed remotely and unattended through AWS Thinkbox Deadline.',
    highlights: [
      'Automated 3ds Max + plugin installs across ~130 Windows render nodes',
      'Remote, unattended rollout via Deadline workers — no hands-on per machine',
      'SYSTEM-level elevation through scheduled tasks (workers stay non-admin)',
      'Dry-run mode and --continue-on-fail for safe, resilient deployments',
    ],
    tech_tags: ['Python', 'AWS Thinkbox Deadline', 'Windows', 'Render Farm', 'Automation'],
    link: '/devops/deadline-deploy',
    meta: {
      duration: '',
      role: 'Pipeline & DevOps',
      platforms: 'Windows render farm (~130 nodes)',
      team_size: 'Solo',
    },
  },
  {
    id: 'omnitool',
    title: 'OmniTool — Pipeline App',
    company: 'Pipeline Tooling',
    category: 'devops',
    featured: true,
    order: 2,
    image: null, // '/static/img/project-cards/omnitool.webp'
    gif: null,
    description:
      'A Python/PyQt application for automating 3ds Max scene prep and render-farm job submission. One codebase runs as a CLI, a desktop GUI, and natively inside Max — shipped as a self-updating, EDR-whitelisted single-file executable to ~130 machines across two studios.',
    highlights: [
      'One codebase runs as CLI, PyQt GUI, and natively inside 3ds Max',
      'Single-file PyInstaller build tuned to pass studio EDR (SentinelOne)',
      'Self-updating: per-user task SHA-256 checks the share every 10 minutes',
      'Headless install/uninstall with automatic Max startup-listener bootstrap',
    ],
    tech_tags: ['Python', 'PyQt', '3ds Max / pymxs', 'PyInstaller', 'PowerShell'],
    link: '/devops/omnitool',
    meta: {
      duration: '',
      role: 'Pipeline & Tools Developer',
      platforms: 'Windows · 3ds Max 2022–2026',
      team_size: 'Solo',
    },
  },
  {
    id: 'bash-tools',
    title: 'Bash Tools',
    company: '',
    category: 'devops',
    featured: true,
    order: 3,
    image: null,
    gif: null,
    description:
      'A curated collection of practical bash scripts for file management and automation — batch renaming, sequence processing, and website deployment — built with defensive checks and user confirmation.',
    highlights: ['Automating repetitive tasks', 'Time saving tools'],
    tech_tags: ['Bash', 'Python', 'Linux'],
    link: '/devops/bash-tools',
    meta: {
      duration: '',
      role: 'Programmer',
      platforms: 'Linux',
      team_size: 'Solo',
    },
  },
];

export const getProject = (id) => projects.find((p) => p.id === id);
export const getByCategory = (category) => projects.filter((p) => p.category === category);
export const getFeatured = (category) =>
  projects.filter((p) => p.featured && (!category || p.category === category)).sort((a, b) => a.order - b.order);
