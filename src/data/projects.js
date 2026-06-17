// src/data/projects.js
// Ported from includes/project-cards/*.php — each PHP file's `return [...]` array
// becomes one object here. Image paths use a leading slash (served from /public).
//
// TODO (rest of the port): bring over the remaining cards from
// includes/project-cards/ — whisper, smite, runaway, sintern, etc.

export const projects = [
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
];

export const getProject = (id) => projects.find((p) => p.id === id);
export const getByCategory = (category) => projects.filter((p) => p.category === category);
