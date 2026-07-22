# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Clone Location

Clone to `C:\dev\PHP-Website` on Windows, `~/dev/PHP-Website` on Linux.

## What This Is

CJ Nowacek's portfolio website (cjnowacek.com): procedural PHP, no framework, no build step, no tests. Two portfolio tracks mirror his dual resume: Technical Art (`techart.php`) and DevOps (`devops.php`). Hosted on SiteGround, served by Apache with mod_rewrite.

## Commands

There is no build, lint, or test step. PHP files are served directly.

```bash
# Local preview (Windows or anywhere with PHP): http://localhost:8090
./dev-server.bat            # or: php -S 127.0.0.1:8090 -t . dev-router.php
# dev-router.php emulates the .htaccess clean URLs for `php -S`

# Local dev (WSL/Linux alternative): real Apache serving this directory
./reinstall-apache2.sh

# Quick syntax check on a changed file
php -l index.php

# Manually re-run the deploy workflow if needed
gh workflow run deploy.yml

# Push new/changed images to the server (images are not deployed by CI)
rsync -avzP --exclude='*.kra' --exclude='*~' static/img/ siteground:www/cjnowacek.com/public_html/static/img/
```

## Deploy

Pushing to `main` auto-deploys to SiteGround: `.github/workflows/deploy.yml` rsyncs the repo over SSH (secrets `SG_HOST`/`SG_USER`/`SG_SSH_KEY`). Do not deploy manually with rsync; just push.

The CI deploy is code-only. It excludes `static/img/` contents (images live on the server, uploaded via the rsync command above), except the git-tracked exceptions that mirror `.gitignore`: `static/img/project-cards/video/` and `static/img/project-cards/ml3ds-webp-1200x900.webp`. It also excludes dev-only files (`dev-server.bat`, `dev-router.php`, `reinstall-apache2.sh`, `CLAUDE.md`) and `contact_submissions.json`.

If a deployed change looks stale in the browser, SiteGround's Dynamic Cache may be serving old PHP: flush via Site Tools > Speed > Caching.

Images live in Dropbox, not git; `static/img/` is gitignored. The sync source is `C:\Dropbox\1-career\web-assets\~sync\` (subfolders `pages/`, `pfp/`, `project-cards/` map 1:1 into `static/img/`). The sync script lives in that Dropbox folder, not this repo, and is cross-platform (Git Bash, WSL, native Linux):

```bash
# Auto-detects the repo (C:\dev\PHP-Website on Windows, ~/dev/PHP-Website on Linux);
# pass the repo path to override
/c/Dropbox/1-career/web-assets/sync-with-static-img.sh [path-to-repo]
```

Source art (PSDs, logo, gif frames) is in `C:\Dropbox\1-career\web-assets\src\`; only `~sync\` contents ship to the site.

## Architecture

### Page composition

Every top-level page follows the same skeleton: set `$page_title`, include `includes/header.php` (which pulls in `includes/config.php` for nav, SEO metadata, and social links), emit page content, include `includes/footer.php`. Clean URLs come from `.htaccess`: `/foo` maps to `foo.php`, direct `.php` requests 301-redirect to the extensionless form, and directory pages (`pages-techart/smite/`) serve their `index.php`.

### Project card system (the core pattern)

Projects are data, not markup:

1. Each file in `includes/project-cards/*.php` **returns a PHP array** describing one project: `id`, `title`, `company`, `category` (`techart`/`devops`), `featured`, `order`, `image`, `gif`, `description`, `highlights`, `tech_tags`, `link`, `meta`.
2. `includes/project-components/project_loader.php` (`ProjectLoader`) globs that directory once and serves lookups by id/category/featured.
3. Pages declare an ordered id list (e.g. `$featuredProjectIds` in `index.php`, `$techartProjectIds` in `techart.php`) and render each via `renderProjectCard()` from `project_card.php`. Ids commented out in those lists are hidden but keep their data.
4. Each card's `link` points to a detail page under `pages-techart/<project>/index.php` or `pages-devops/<project>/index.php` (detail pages include header/footer via relative `../../` paths; nested pages like `smite/gravity-switch/` go one level deeper).

**To add a project:** create the card array in `includes/project-cards/`, create the detail page directory, add the id to the relevant page's id list, and drop the card image/gif into `static/img/project-cards/` (via Dropbox, not git).

### Contact form

`contact.php` posts to `includes/contact_handler.php`, which validates and appends to `contact_submissions.json` (gitignored). The Contact nav item is currently commented out in `config.php`.

## TODO

- **Migrate to Astro.** Planned rewrite of this site: PHP includes become Astro components, output is fully static, deployed via GitHub Actions to free static hosting (GitHub Pages or Cloudflare) instead of SiteGround. The contact form moves to a form service (e.g. Formspree) since there will be no server-side PHP. Astro's asset pipeline also replaces the oversized hover gifs with optimized media. Treat the migration as a scoped standalone project; until then, all work stays on the current PHP stack.

## Gotchas

- `static/files/` holds the two resume PDFs. Do not edit them here: the `Resume-with-Tex` repo's CI builds them and pushes fresh copies into this repo automatically on resume changes (commits authored by `resume-ci`).
- Site copy style: no em dashes anywhere in user-facing text; use colons, commas, or parentheses. Keep employer work described IP-safe: no internal tool codenames, node counts, vendor names, or client names from MediaLab work.

## Full Tree

```
PHP-Website/
├── .gitignore
├── .github/workflows/deploy.yml  Auto-deploy to SiteGround on push to main
├── .htaccess                  Clean-URL rewrites (strip .php, serve directory index.php)
├── 404.php
├── CLAUDE.md
├── README.md
├── about.php
├── contact.php
├── dev-server.bat             Local preview server (php -S with dev-router.php)
├── dev-router.php             Emulates .htaccess clean URLs for php -S
├── devops.php                 DevOps portfolio page (id list: $devopsProjectIds)
├── index.php                  Homepage (id list: $featuredProjectIds)
├── list_projects.php          Dev helper: lists all project ids
├── reinstall-apache2.sh       Local Apache setup (WSL/Linux)
├── techart.php                TechArt portfolio page (id list: $techartProjectIds)
├── includes/
│   ├── config.php             Nav items, SEO metadata, social links
│   ├── contact_handler.php    POST handler; logs to contact_submissions.json
│   ├── demo_reel.php          Vimeo embed
│   ├── footer.php
│   ├── header.php
│   ├── components/
│   │   └── breadcrumb.php
│   ├── project-cards/         One returned array per project
│   │   ├── bash-tools.php
│   │   ├── build_pipeline.php
│   │   ├── gravity-switch.php
│   │   ├── php-website.php
│   │   ├── runaway.php
│   │   ├── smite-envelope-tool.php
│   │   ├── smite-gravity-switch.php
│   │   ├── smite.php
│   │   └── whisper.php
│   └── project-components/
│       ├── project_card.php   renderProjectCard()
│       └── project_loader.php ProjectLoader class
├── pages-devops/
│   ├── bash-tools/index.php
│   └── build-pipeline/index.php
├── pages-techart/
│   ├── runaway/index.php
│   ├── sintern/index.php      Unlisted: reachable by URL, not linked from any page
│   ├── smite/
│   │   ├── index.php
│   │   ├── envelope-tool/index.php
│   │   └── gravity-switch/index.php
│   └── whisper-from-the-stars/index.php
└── static/
    ├── css/                   Modular stylesheets (variables, base, grid, header, ...)
    ├── files/                 Resume PDFs (from Resume-with-Tex CI artifact)
    ├── icons/
    └── img/                   Gitignored; synced from Dropbox
```
