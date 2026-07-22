<?php
$page_title = "Runaway - Technical Art";
include '../../includes/header.php';
?>

<!----------- Navigation ------------->
<div class="container" style="max-width: 1300px;">
    <!-- Breadcrumb Navigation -->
    <nav style="margin: 20px 0; color: var(--text-secondary); font-size: 14px;">
        <a href="../../index.php" style="color: var(--header-color); text-decoration: none;">Home</a> > 
        <a href="../../techart.php" style="color: var(--header-color); text-decoration: none;">Technical Art</a> > 
        <span>Runaway</span>
    </nav>

    <h2>Runaway</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Senior Thesis | 2022-2023 | Unreal Engine</strong></p>
        <p>Final BFA project exploring narrative-driven gameplay and technical innovation. Runaway is a story-rich adventure game focusing on childhood trauma and the courage to face one’s past, developed as part of my senior thesis.</p>
        
        <p>Working as the sole developer, I was responsible for every aspect of the project, from character rigging and animation systems to asset optimization and deployment automation. The project challenged me to create efficient workflows that supported rapid iteration while maintaining high visual quality.</p>
    </div>

<!----------- Embedded YouTube Video ------------->
    <div class="demo-reel" style="margin: 40px 0;">
        <div class="video-container">
            <iframe title="Runaway | BFA Thesis | 2022-2023" 
                    src="https://www.youtube.com/embed/AJZ5Ny6kXLE" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen
                    loading="lazy">
            </iframe>
        </div>
        <p class="image-caption" style="text-align: center; margin-top: 10px;">
            Runaway - Gameplay demo
        </p>
    </div>

<!----------- Key Achievements START ------------->
    <h2>Key Achievements</h2>
    <div class="grid competencies-grid">

        <div class="grid-item">
            <div class="project-info">
                <h3><i class="fa-brands fa-github" style="color: var(--header-color); vertical-align: middle; margin-right: 4px; font-size:1.1em;"></i>Github Snapshot</h3>
                <p class="project-description">Here's a snapshot of the tools I created during production.</p>
                <a href="https://github.com/cjnowacek/maya-tools-lab/tree/89f7c5b4d28bb9b6fccbc0d72c9d9a6b53beae93" target="_blank" class="competency-link">Goto Github</a>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Cinematic Systems</h3>
                <p class="project-description">Programmed cinematic camera system and character locomotion for seamless narrative sequences and responsive gameplay.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Character Rigging & Animation</h3>
                <p class="project-description">Developed complete character rigging system with facial animation support, IK/FK blending, and optimized bone hierarchy for performance.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Automated Build Pipeline</h3>
                <p class="project-description">Created an automated build and deployment system, reducing manual tasks, ensuring consistent export settings, and eliminating user error.</p>
            </div>
        </div>
    </div>
<!----------- Key Achievements END ------------->

<!----------- Technical Inplementation ------------->
    <h2>Technical Implementation</h2>

<!----------- Cinematic Blueprints ------------->
    <div class="expandable-section">
        <button class="expand-toggle">
           Cinematic Systems - Level blueprint logic <span class="toggle-icon">▼</span>
        </button>
        <div class="expandable-content">

            <p>Setting up cinematic animations posed a question... how to trigger the cutscene without changing the level. Luckily, understanding the level blueprint turned an impossible task for a Senior Thesis into... still a lot of work, but now it was doable.</p>

            <h3>Level Blueprint Setup</h3>    <!-- Main Level Blueprint Section -->
            <div class="two-column-section two-column-reverse" style="grid-template-columns: 2fr 1.5fr;">
                <div>
                    <img src="/static/img/pages/runaway/runaway-main-level-blueprint.webp" 
                        alt="runaway-main-level-blueprint.webp" 
                        class="column-image"
                        style="margin-bottom: 20px;">
                </div>
                <div>
                    <h3>Level Blueprint - Main</h3>
                    <p>This area is used to set up the main initialization of the game. Using sequence nodes, I was then able to set up the different variables for the game and cinematics to function correctly.</p>
                    <p>Starting out, I was going to have everything displayed in the main level blueprint area. However, that proved to be an issue with the amount of visual blueprinting that needed to be set up. So I broke it up into different sections...</p>
                </div>
            </div>

            <!-- Cutscene References - Level Blueprint Section -->
            <div class="two-column-section two-column-reverse" style="grid-template-columns: 2fr 1.5fr;">
                <div>
                    <img src="/static/img/pages/runaway/runaway-cutscenes-references-level-blueprint.webp" 
                        alt="runaway-cutscene-references-level-blueprint.webp" 
                        class="column-image"
                        style="margin-bottom: 20px;">
                </div>
                <div>
                    <h3>Level Blueprint - Cutscene References</h3>
                    <p>In order for Unreal to register a cutscene playing in the level, the scene must be defined and attached to variables in the level editor. Each scene could then be triggered in the game with an event or a trigger volume.</p>
                </div>
            </div>

            <!-- Cutscene Sequences - Level Blueprint Section -->
            <div class="two-column-section two-column-reverse" style="grid-template-columns: 2fr 1.5fr;">
                <div>
                    <img src="/static/img/pages/runaway/runaway-cutscenes-level-blueprint.webp" 
                        alt="runaway-cutscene-references-level-blueprint.webp" 
                        class="column-image"
                        style="margin-bottom: 20px;">
                </div>
                <div>
                    <h3>Level Blueprint - Cutscene Logic</h3>
                    <p>Handling the player's state after cutscenes became an important feature to implement. As each cutscene was different and I wanted to direct the player after viewing it, I needed a way to make the player face the direction I wanted. That necessitated a return-to-game handler: managing lighting levels, cycling mesh visibility, and so on.</p>
                </div>
            </div>
        </div>
    </div>
<!----------- Rigging and Animation and Exporting ------------->
    <div class="expandable-section">
        <button class="expand-toggle">
            Rigging and Exporting<span class="toggle-icon">▼</span>
        </button>
        <div class="expandable-content">

<!----------- Rigging ------------->
            <div class="two-column-section" style="grid-template-columns: 1.5fr 2fr;">
                <div>
                    <h3>Rigging</h3>
                    <p>The rigging was handled in Maya. I wanted to use Unreal's Control Rig built into the engine, but considering I didn't have time to learn it for this project, I decided to stick with Maya rigging.</p>
                </div>
                <div class="demo-reel">
                    <div class="video-container">
                        <iframe title="robin-rig-showcase" 
                          src="https://www.youtube.com/embed/RGZt7E0X0zg?autohide=1&modestbranding=1&rel=0" 
                          frameborder="0" 
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                          allowfullscreen
                          loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>

<!----------- Animation ------------->


<!----------- Exporting ------------->
            <div class="two-column-section" style="grid-template-columns: 1.5fr 2fr;">
                <div>
                    <h3>Exporting</h3>
                    <p>Exporting was a really big pain in the beginning. However, I figured out how to script the animation export, turning a cumbersome task of over 30 seconds per animation into 2 seconds. This was crucial in order to iterate quickly and get feedback on whether I was on track or needed to pivot.</p>
                </div>
                    <div>
                    <a href="https://github.com/cjnowacek/maya-tools-lab/blob/89f7c5b4d28bb9b6fccbc0d72c9d9a6b53beae93/live/BfaOps_AnimExporter.py" target="_blank" class="competency-link">Animation Export Script</a>
                    </div>
            </div>

        </div>
    </div>

    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
    <h2>Project Results</h2>
    <p>Delivered a fully realized interactive experience that fused storytelling with robust technical systems. Designed and implemented the entire production pipeline, from rigging and animation to automation and deployment, ensuring efficiency and creative flexibility.</p>
    </div>

    <div class="text-content">
        <ul>
            <li><strong>Complete Character Pipeline:</strong> Delivered fully-rigged characters from Maya to Unreal Engine with animation retargeting</li>
            <li><strong>Automated Workflows:</strong> Reduced manual asset processing time by 75% through Python-based automation</li>
            <li><strong>Seamless Cinematics:</strong> Integrated narrative sequences with gameplay using custom camera systems</li>
        </ul>

        <hr>

        <h3>Technology Stack</h3>
        <ul>
            <li><strong>Engine:</strong> Unreal Engine 5</li>
            <li><strong>3D & Animation:</strong> Maya, Blender</li>
            <li><strong>Scripting & Tools:</strong> Python, MEL, Blueprint Visual Scripting</li>
        </ul>

        <hr>

        <h3>Team & Duration</h3>
        <ul>
            <li><strong>Role:</strong> 3D Generalist</li>
            <li><strong>Team Size:</strong> 1 developer</li>
            <li><strong>Duration:</strong> 8 months (academic year)</li>
            <li><strong>Platform:</strong> PC</li>
        </ul>
    </div>

    <h2>Development Challenges</h2>
    <div class="grid competencies-grid">
        <div class="grid-item">
            <div class="project-info">
                <h3><i class="fa-solid fa-clock" style="color: var(--header-color); vertical-align: middle; margin-right: 4px; font-size:1.1em;"></i>Time Constraints</h3>
                <p class="project-description">Academic deadlines required efficient planning and prioritization. Focused on core features first, then polish as much as possible.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3><i class="fa-solid fa-bullseye" style="color: var(--header-color); vertical-align: middle; margin-right: 4px; font-size:1.1em;"></i>Scope Management</h3>
                <p class="project-description">Balanced ambitious narrative goals with technical constraints. Developed modular systems for flexible content creation.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3><i class="fa-solid fa-screwdriver-wrench" style="color: var(--header-color); vertical-align: middle; margin-right: 4px; font-size:1.1em;"></i>Tool Development</h3>
                <p class="project-description">Built custom tools for my workflow while learning new technologies.</p>
            </div>
        </div>
    </div>

    <h2>Lessons Learned</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Pipeline First:</strong> Investing time early in pipeline development and scripts paid dividends throughout production. Automated systems allowed me to focus on creative work instead of technical bottlenecks. It made a world of difference during crunch time.</p>

        <p><strong>Iterative Development:</strong> Small, frequent iterations were more effective than large milestone deliveries. This approach allowed for course corrections and fewer headaches. Yet another reason why pipeline scripting early on was so important.</p>
    </div>

    <!-- Navigation -->
    <div style="display: flex; justify-content: space-between; margin: 60px 0 40px 0; gap: 20px;">
        <a href="../../techart.php" class="project-link" style="background: var(--form-bg); color: var(--text-color);">← Back to Technical Art</a>
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
