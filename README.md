# CJ Nowacek Portfolio

Professional portfolio website showcasing Technical Art and DevOps expertise.

## Overview

This is a PHP-based portfolio website featuring project showcases, downloadable resumes, an embedded demo reel, and a contact form. The site is designed to highlight work in both Technical Art (game development) and DevOps/Infrastructure domains.

## Tech Stack

- **Backend:** PHP (procedural, component-based)
- **Frontend:** HTML5, CSS3, Vanilla JavaScript
- **Server:** Apache 2 with mod_rewrite
- **Icons:** Font Awesome 6.5.0

## Project Structure

```
php-website/
├── index.php              # Homepage
├── techart.php            # Technical Art portfolio
├── devops.php             # DevOps portfolio
├── about.php              # About page
├── contact.php            # Contact page with form
├── 404.php                # Custom error page
├── includes/              # Backend components
│   ├── config.php         # Site configuration
│   ├── header.php         # Common header/nav
│   ├── footer.php         # Common footer
│   ├── contact_handler.php # Form submission handler
│   ├── demo_reel.php      # Vimeo embed component
│   ├── components/        # Reusable UI components
│   ├── project-cards/     # Project data definitions
│   └── project-components/ # Project rendering system
├── pages-techart/         # Technical Art project detail pages
├── pages-devops/          # DevOps project detail pages
├── static/
│   ├── css/               # Modular stylesheets
│   ├── files/             # Downloadable resumes (PDFs)
│   ├── img/               # Images (not in git)
│   └── icons/             # Icon assets
├── .htaccess              # Apache URL rewriting
└── reinstall-apache2.sh   # Apache setup script
```

## Setup

### Prerequisites

- Apache 2
- PHP 7.4+
- mod_rewrite enabled

### Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd php-website
```

2. Sync images (script lives in the Dropbox assets folder, not this repo; runs in Git Bash, WSL, or Linux):
```bash
# Auto-detects the repo at C:\dev\PHP-Website (Windows) or ~/PHP-Website (Linux/WSL);
# pass the repo path explicitly if it lives elsewhere
/c/Dropbox/1-career/web-assets/sync-with-static-img.sh [path-to-repo]
```
Note: Images are stored separately in Dropbox and excluded from git.

3. Configure Apache to serve this directory, or use the provided script:
```bash
./reinstall-apache2.sh
```

4. Access the site at `http://localhost`

## Configuration

Edit `includes/config.php` to update:
- Site title and description
- Navigation menu items
- SEO metadata
- Social media links

## Features

- **Dynamic Project System:** Projects are loaded from individual PHP files in `includes/project-cards/`
- **Contact Form:** Submissions logged to JSON with validation
- **Clean URLs:** Apache rewriting removes `.php` extensions
- **Responsive Design:** Mobile-first CSS with breakpoints
- **Project Cards:** Hover animations with GIF transitions
- **Demo Reel:** Embedded Vimeo player
- **Dual Resumes:** Separate PDFs for TechArt and DevOps roles

## Image Management

Images are stored in Windows Dropbox at `C:\Dropbox\1-career\web-assets\`. The `~sync\` subfolder holds the web-ready assets (`pages/`, `pfp/`, `project-cards/`); `src\` holds source art (PSDs, logo, gif frames) that never ships.

Sync via the script in the Dropbox folder. It works in Git Bash on Windows, WSL, and native Linux, auto-detecting Dropbox and the repo (`C:\dev\PHP-Website` on Windows, `~/PHP-Website` on Linux); pass the repo path as an argument to override:

```bash
/c/Dropbox/1-career/web-assets/sync-with-static-img.sh [path-to-repo]
```

## URL Structure

- Homepage: `/`
- Portfolio pages: `/techart`, `/devops`
- About: `/about`
- Contact: `/contact`
- Project details: `/pages-techart/{project}/`, `/pages-devops/{project}/`

## Development

The site uses a modular component system:
- Common elements (header/footer) are in `includes/`
- Projects are defined as PHP arrays in `includes/project-cards/`
- Add new projects by creating a new file in `project-cards/` and a detail page in `pages-techart/` or `pages-devops/`

## Contact Form

Form submissions are handled by `includes/contact_handler.php` and logged to `contact_submissions.json`. The handler validates:
- Required fields (name, email, subject, message)
- Email format
- Request method (POST only)

## Deployment

Deploy to SiteGround hosting:

```bash
rsync -avzP --delete --exclude='.git/' --exclude='/home/cnowacek/git/php-website/reinstall-apache2.sh' /home/cnowacek/git/php-website/ siteground:www/cjnowacek.com/public_html/
```

If the images don't sync, excluding .kra usually works

```bash
rsync -avzP --exclude='*.kra' --exclude='*~' /home/cnowacek/git/php-website/static/img/ siteground:www/cjnowacek.com/public_html/static/img/
```

This syncs the entire site to the production server, excluding git files and the local Apache setup script.

## License

Personal portfolio - All rights reserved.
