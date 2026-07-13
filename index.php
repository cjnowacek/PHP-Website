<?php
$page_title = "Home";
include 'includes/header.php';
include 'includes/project-components/project_loader.php';
include 'includes/project-components/project_card.php';
// Control which projects appear and in what order
$featuredProjectIds = [
    'ml3ds',
    'whisper-from-the-stars',
    'smite',
    'runaway',
    'sintern'
];

// Load the specific projects you want
$featuredProjects = [];
foreach ($featuredProjectIds as $projectId) {
    $project = ProjectLoader::getProject($projectId);
    if ($project) {
        $featuredProjects[] = $project;
    }
}
?>

<div class="container" style="max-width: 1300px;">

    <h2>Pipeline Developer &amp; Technical Artist</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p>I build the tools and infrastructure behind CG production: Python and PyQt desktop tooling, render farm automation, and artist-facing workflows in 3ds Max and Unreal. I come at pipeline from the artist's side of the desk, with a background in character rigging and a ship credit on SMITE 2, so the systems I build fit how artists actually think and work.</p>
    </div>

<h2>Core Competencies</h2>
    <div class="grid competencies-grid">
        <div class="grid-item">
            <div class="project-info">
                <h3><i class="fa-solid fa-wand-magic-sparkles" style="color:#1e3050; vertical-align: middle; margin-right: 4px; font-size:1.1em;"></i>Pipeline &amp; Tools</h3>
                <p class="project-description">Python, PyQt, and MaxScript tooling for DCC pipelines, rigging, and artist workflows</p>
                <a href="techart.php" class="competency-link">View Tech Art</a>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3><i class="fa-solid fa-code" style="color:blue; vertical-align: middle; margin-right: 4px; font-size:1.1em;"></i>Automation &amp; Infrastructure</h3>
                <p class="project-description">Render farm automation, deployment scripting, and batch processing for production at scale</p>
                <a href="devops.php" class="competency-link">View Pipeline</a>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3><i class="fa-brands fa-github" style="color:#1e3050; vertical-align: middle; margin-right: 4px; font-size:1.1em;"></i>GitHub</h3>
                <p class="project-description">Code for these projects and more</p>
                <a href="https://github.com/cjnowacek" target="_blank" class="competency-link">Go to GitHub</a>
            </div>
        </div>
    </div>

    <h2>Featured Projects</h2>
    <div class="projects-container projects-container-index">
        <?php foreach ($featuredProjects as $project): ?>
            <?php renderProjectCard($project); ?>
        <?php endforeach; ?>
    </div>
</div>

<script>
    document.querySelectorAll('.project-card').forEach(item => {
        item.addEventListener('mouseenter', () => {
            const gif = item.querySelector('.hover-gif');
            if (gif && gif.src) {
                gif.src = gif.src; // Reset the GIF to play from the beginning
            }
        });
    });
</script>

<?php include 'includes/footer.php'; ?>
