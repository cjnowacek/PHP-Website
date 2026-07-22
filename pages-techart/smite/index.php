<?php
$page_title = "Smite - Technical Art";
include '../../includes/header.php';
include '../../includes/project-components/project_loader.php';
include '../../includes/project-components/project_card.php';

$techartProjectIds = [
    'smite-envelope-tool',
    'smite-gravity-switch'
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
    <!-- Breadcrumb Navigation -->
    <nav style="margin: 20px 0; color: var(--text-secondary); font-size: 14px;">
        <a href="../../index.php" style="color: var(--header-color); text-decoration: none;">Home</a> > 
        <a href="../../techart.php" style="color: var(--header-color); text-decoration: none;">Technical Art</a> > 
        <span>Smite</span>
    </nav>

    <h2>Smite</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Hi-Rez Studios | 2022-2025 | Unreal Engine 5 & 3ds Max</strong></p>
        <p>Technical Animator for Hi-Rez Studios’ popular MOBA game, focusing on character skinning/rigging and tool development. Working on a live-service game with millions of players required robust, scalable solutions that could handle frequent content updates while maintaining high-quality standards.</p>
        
        <p>My primary focus was streamlining the character production workflow, particularly the transition from the original Smite to its sequel. This involved creating automated tools for rig building, optimizing character porting processes, and ensuring consistency across a large library of character assets.</p>
    </div>

    <h2>Key Contributions</h2>
    <div class="grid competencies-grid">
        <div class="grid-item">
            <div class="project-info">
                <h3>Automatic Rig Tools</h3>
                <p class="project-description">Created automated build tools for modular rig components, reducing manual setup time and ensuring consistency across character assets.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Batch Processing Automation</h3>
                <p class="project-description">Cut manual asset-processing time by 25% with automated Python and MaxScript batch tools and standardized workflows.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Pipeline Documentation</h3>
                <p class="project-description">Developed comprehensive documentation and training materials for character production pipelines.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Live-Service Support</h3>
                <p class="project-description">Maintained and updated existing character assets while supporting ongoing content releases and seasonal updates.</p>
            </div>
        </div>
    </div>

    <h2>Featured Projects</h2>

    <div class="projects-container">
        <?php foreach ($techartProjects as $project): ?>
            <?php renderProjectCard($project); ?>
        <?php endforeach; ?>
    </div>

    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
    <h2>Project Impact</h2>
    <p>Streamlined the character production pipeline across a large, multi-platform project. Implemented automation and standardization that significantly improved quality control, iteration speed, and team efficiency.</p>
    </div>

    <div class="text-content">
        <ul>
            <li><strong>25% Faster Asset Processing:</strong> Python and MaxScript batch tools cut manual processing time</li>
            <li><strong>Consistent Quality:</strong> Standardized pipeline ensured uniform quality across multiple character assets</li>
            <li><strong>Team Productivity:</strong> Freed up artist time for creative work instead of technical setup</li>
            <li><strong>Live Service Support:</strong> Enabled rapid deployment of character updates and new content</li>
        </ul>

        <hr>

        <h3>Technology Stack</h3>
        <ul>
            <li><strong>Engine:</strong> Unreal Engine 5</li>
            <li><strong>3D & Animation:</strong> 3ds Max</li>
            <li><strong>Scripting & Tools:</strong> MaxScript, Python</li>
            <li><strong>Version Control & CI/CD:</strong> Perforce, Git</li>
        </ul>

        <hr>

        <h3>Team & Duration</h3>
        <ul>
            <li><strong>Role:</strong> Technical Animator</li>
            <li><strong>Team Size:</strong> 200+ developers</li>
            <li><strong>Duration:</strong> 2022-2025 (intern to associate to contract)</li>
            <li><strong>Platforms:</strong> PC, Console</li>
        </ul>
    </div>

    <h2>Production Challenges</h2>
    <div class="grid competencies-grid">

        <div class="grid-item">
            <div class="project-info">
                <h3>Live Service Constraints</h3>
                <p class="project-description">Tools needed to work with existing content while supporting ongoing development and player-facing updates.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Team Coordination</h3>
                <p class="project-description">Large team required clear communication and documentation. Created training materials and workflow guides.</p>
            </div>
        </div>
    </div>

    <h2>Technical Innovation</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Modular Rig System:</strong> Developed a component-based rigging approach that allowed for flexible character variations while maintaining consistency. Rigs could be assembled from pre-built modules for different character types.</p>
        
        <p><strong>Batch Processing Pipeline:</strong> Created tools that could process multiple character animations simultaneously. Essential for handling the large character roster efficiently.</p>
    </div>

    <h2>Lessons Learned</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Automation Saves Time and Reduces Errors:</strong> Investing in robust automation tools paid dividends across the large character roster. Manual processes that seemed quick for one character became bottlenecks at scale.</p>
        
        <p><strong>Documentation is Critical:</strong> In a large team environment, clear documentation and training materials were essential for tool adoption and maintenance.</p>
        
        <p><strong>Iterative Improvement:</strong> Tools evolved based on team feedback and production needs. Regular updates and improvements were necessary to maintain efficiency.</p>
    </div>

    <!-- Navigation -->
    <div style="display: flex; justify-content: space-between; margin: 60px 0 40px 0; gap: 20px;">
        <a href="../../techart.php" class="project-link" style="background: var(--form-bg); color: var(--text-color);">← Back to Technical Art</a>
        <a href="../runaway/" class="project-link">Next Project: Runaway →</a>
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

<?php include '../../includes/footer.php'; ?>
