<?php
$page_title = "ML3DS Production Pipeline";
include '../../includes/header.php';
?>

<div class="container" style="max-width: 1300px;">
    <!-- Breadcrumb Navigation -->
    <nav style="margin: 20px 0; color: var(--text-secondary); font-size: 14px;">
        <a href="../../index.php" style="color: var(--header-color); text-decoration: none;">Home</a> >
        <a href="../../devops.php" style="color: var(--header-color); text-decoration: none;">Pipeline</a> >
        <span>ML3DS Production Pipeline</span>
    </nav>

    <h2>ML3DS Production Pipeline</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>MediaLab 3D Solutions | 2026-Present | Python, PyQt &amp; 3ds Max</strong></p>
        <p>Pipeline development for an architectural visualization studio running a large Windows render farm on 3ds Max and V-Ray. I build and maintain the tools between the artists and the farm: scene preparation and diagnostics, batch render submission, software deployment, and the packaging workflow that ships tooling to production.</p>

        <p>The work spans the full stack of a CG pipeline: desktop applications artists use daily, command-line tools that slot into automation, and infrastructure scripting that keeps an entire farm's software installs consistent without anyone touching a machine by hand.</p>
    </div>

    <h2>Key Contributions</h2>
    <div class="grid competencies-grid">
        <div class="grid-item">
            <div class="project-info">
                <h3>Scene-Automation Framework</h3>
                <p class="project-description">Python framework for scene preparation, health diagnostics, and render-farm submission. One core library, three faces: a CLI, a PyQt desktop app, and native 3ds Max integration.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Batch-Rendering Suite</h3>
                <p class="project-description">MaxScript suite that classifies objects across XRef-linked scenes and automatically renders every material and finish combination, replacing a manual per-option workflow with one-click submission.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Farm Deployment Automation</h3>
                <p class="project-description">Silent, remotely triggered installs of 3ds Max and production plugins across the render farm, including unattended privilege elevation on locked-down worker machines.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Render-Manager Migration</h3>
                <p class="project-description">Leading the farm's migration to a modern render-management platform, porting the deployment framework and submission tooling.</p>
            </div>
        </div>
    </div>

    <h2>Technical Implementation</h2>

    <div class="expandable-section">
        <button class="expand-toggle">
            Scene-Automation Framework Architecture <span class="toggle-icon">&#9660;</span>
        </button>
        <div class="expandable-content">
            <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
                <p>The framework is built as a core library with zero UI knowledge; the CLI and PyQt GUI are thin shells over it. A connection layer auto-detects its context: running natively inside 3ds Max, it drives the scene directly; running externally, it attaches to a live Max session instead. The same tool code works in both worlds.</p>

                <p>Scene state is cached in JSON sidecar manifests, so diagnostics and pipeline decisions can run against heavy scene files without reopening them in Max. That turns checks that used to cost a full scene load into near-instant reads.</p>

                <p>Compatibility is a hard constraint: the library has to run on every Python interpreter shipped across the studio's range of 3ds Max versions, which drives conservative language choices and careful dependency management.</p>
            </div>
        </div>
    </div>

    <div class="expandable-section">
        <button class="expand-toggle">
            Unattended Farm Deployment <span class="toggle-icon">&#9660;</span>
        </button>
        <div class="expandable-content">
            <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
                <p>Render workers run as unprivileged users, but installers need administrator rights. The deployment system solves this with a scheduled-task elevation pattern: installers are staged locally, executed elevated without any interactive prompt, and report exit codes back so the orchestrator knows exactly which machines succeeded.</p>

                <p>Each software component is a small installer module behind a single orchestrator entry point, so a new plugin version means writing one module, not a new deployment process. A dry-run mode simulates every action for safe testing, and the whole system is standard-library Python only, so there is nothing to install before the installer runs.</p>
            </div>
        </div>
    </div>

    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
    <h2>Project Results</h2>
    <p>Production tooling in daily use across the studio: artists submit complex batch renders in one click, scene health is diagnosed without opening Max, and farm software rollouts happen remotely instead of machine by machine.</p>
    </div>

    <div class="text-content">
        <ul>
            <li><strong>One-Click Batch Rendering:</strong> Material and finish combinations that were queued manually per option now submit as a single batch</li>
            <li><strong>Instant Scene Diagnostics:</strong> JSON manifest caching answers pipeline questions without loading heavy scene files</li>
            <li><strong>Hands-Off Deployment:</strong> Full render farm software rollouts run remotely with no manual machine access</li>
            <li><strong>Three Interfaces, One Library:</strong> CLI, desktop GUI, and in-Max tooling share a single tested core</li>
        </ul>

        <hr>

        <h3>Technology Stack</h3>
        <ul>
            <li><strong>Languages:</strong> Python, MaxScript, pymxs</li>
            <li><strong>UI &amp; Tooling:</strong> PyQt, CLI utilities</li>
            <li><strong>Production:</strong> 3ds Max, V-Ray, render-farm management</li>
            <li><strong>Infrastructure:</strong> Windows deployment scripting, Git</li>
        </ul>

        <hr>

        <h3>Role &amp; Duration</h3>
        <ul>
            <li><strong>Role:</strong> CGI Pipeline Developer</li>
            <li><strong>Duration:</strong> 2026-Present</li>
            <li><strong>Scope:</strong> Studio-wide pipeline and render farm tooling</li>
        </ul>
    </div>

    <h2>Challenges &amp; Lessons</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Build for the artist, not the pipeline:</strong> Coming from a rigging background, I design tools around how artists actually work. Adoption is the real success metric; a technically elegant tool nobody opens is a failure.</p>

        <p><strong>Unattended means bulletproof:</strong> Farm automation runs with nobody watching. Exit codes, logging, and dry-run modes are not polish; they are the difference between a rollout and an outage.</p>

        <p><strong>Meet the constraint, then design:</strong> Version floors, locked-down workers, and live production schedules shape every architecture decision. The interesting engineering is making clean design fit real constraints.</p>
    </div>

    <!-- Navigation -->
    <div style="display: flex; justify-content: space-between; margin: 60px 0 40px 0; gap: 20px;">
        <a href="../../devops.php" class="project-link" style="background: var(--form-bg); color: var(--text-color);">&larr; Back to Pipeline</a>
    </div>
</div>

<script>
document.querySelectorAll('.expand-toggle').forEach(button => {
    button.addEventListener('click', function() {
        this.classList.toggle('active');
        const content = this.nextElementSibling;
        content.classList.toggle('active');
    });
});
// First section starts open so the technical depth is visible without a click
document.querySelector('.expand-toggle')?.click();
</script>

<?php include '../../includes/footer.php'; ?>
