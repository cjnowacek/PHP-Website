<?php
$page_title = "DevOps";
include 'includes/header.php';
include 'includes/project-components/project_loader.php';
include 'includes/project-components/project_card.php';

$devopsProjectIds = [
  'deadline-deploy',
  'omnitool',
#  'bash-tools',
#  'php-website'
];

// Load the specific projects you want
$devopsProjects = [];
foreach ($devopsProjectIds as $projectId) {
    $project = ProjectLoader::getProject($projectId);
    if ($project) {
        $devopsProjects[] = $project;
    }
}
?>

<style>
.projects-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
}
@media (max-width: 900px) {
    .projects-container {
        grid-template-columns: 1fr 1fr;
        min-width: auto;
    }
}
@media (max-width: 600px) {
    .projects-container {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="container" style="max-width: 1300px;">
    <h2>DevOps & Infrastructure</h2>
    
    <hr>

    <div style="text-align: center; margin: 40px 0;">
        <a href="/static/files/CJ-Nowacek-IT-Resume.pdf" class="resume-download-btn" target="_blank" rel="noopener">Download DevOps Resume (PDF)</a>
    </div>   

    <h2>Core Competencies</h2>
    <div class="grid competencies-grid">

        <div class="grid-item">
            <div class="project-info">
                <h3>Automation Scripting</h3>
                <p class="project-description">Python/bash automation for infrastructure provisioning, asset processing, and build system optimization</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Containerization</h3>
                <p class="project-description">Docker containers and orchestration for consistent environments and deployments</p>
            </div>
        </div>

    </div>

    <h2>Featured Projects</h2>

    <div class="projects-container">
        <?php foreach ($devopsProjects as $project): ?>
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
