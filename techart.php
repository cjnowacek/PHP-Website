<?php
$page_title = "Technical Art";
include 'includes/header.php';
include 'includes/project-components/project_loader.php';
include 'includes/project-components/project_card.php';

$techartProjectIds = [
    'smite',
    'runaway',
    'sintern',
    // 'gravity-switch',

];

// Load the specific projects you want
$techartProjects = [];
foreach ($techartProjectIds as $projectId) {
    $project = ProjectLoader::getProject($projectId);
    if ($project) {
        $techartProjects[] = $project;
    }
}
?>

<div class="container" style="max-width: 1300px;">
 
    <h2>Technical Art</h2>

    <hr>

    <div style="text-align: center; margin: 40px 0;">
        <a href="/static/files/CJ-Nowacek-TechArt-Resume.pdf" class="resume-download-btn" target="_blank" rel="noopener">Download Tech Art Resume (PDF)</a>
    </div>   

   <?php include 'includes/demo_reel.php'; ?>

    <h2>Featured Projects</h2>

    <div class="projects-container project-rows">
        <?php foreach ($techartProjects as $project): ?>
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
