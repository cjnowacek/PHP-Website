<?php
$page_title = "Whispers from the Star - Technical Art";
include '../../includes/header.php';
?>

<div class="container">
    <!-- Breadcrumb Navigation -->
    <nav style="margin: 20px 0; color: var(--text-secondary); font-size: 14px;">
        <a href="../../index.php" style="color: var(--header-color); text-decoration: none;">Home</a> > 
        <a href="../../techart.php" style="color: var(--header-color); text-decoration: none;">Technical Art</a> > 
        <span>Whispers from the Star</span>
    </nav>

    <h2>Whispers from the Star</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Anuttacon | 2025 | Python & Maya</strong></p>
        <p>Technical artist on an ambitious indie space exploration game, focusing on automation pipeline development and CLI-based workflows. In a two-month contract, I developed comprehensive scripts and automation tools that integrated seamlessly into the studio's CI/CD pipeline.</p>
        
        <p>The project required rapid development of robust, command-line driven tools that could handle rigging, animation export, and asset processing without manual intervention. This work enabled the small team to maintain consistent quality while scaling their content production efficiently.</p>
    </div>

    <h2>Key Contributions</h2>
    <div class="grid competencies-grid">
        <div class="grid-item">
            <div class="project-info">
                <h3>CLI-Based Rigging Tools</h3>
                <p class="project-description">Developed command-line rigging automation scripts that could generate fully functional character rigs without manual intervention.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>CI/CD Integration</h3>
                <p class="project-description">Integrated asset processing pipeline into continuous integration workflow, enabling automated builds and deployments.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Animation Export Systems</h3>
                <p class="project-description">Created automated animation export tools that processed multiple characters and animations in batch operations.</p>
            </div>
        </div>

    </div>

    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
    <h2>Project Results</h2>
    <p>Delivered a suite of headless automation tools that let a small team scale content production without sacrificing quality. Every tool ran from the command line, slotting directly into the studio's CI/CD pipeline.</p>
    </div>

    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <ul>
            <li><strong>80% Time Reduction:</strong> Automated rigging process reduced manual work from hours to minutes</li>
            <li><strong>CLI-Driven Workflow:</strong> All tools accessible via command line for seamless CI/CD integration</li>
            <li><strong>Batch Processing:</strong> Processed 20+ characters and 100+ animations automatically</li>
            <li><strong>Quality Consistency:</strong> Automated validation ensured uniform asset quality across all content</li>
            <li><strong>Rapid Deployment:</strong> Enabled daily content updates through automated pipeline</li>
        </ul>

        <hr>

        <h3>Technology Stack</h3>
        <ul>
            <li><strong>Languages & APIs:</strong> Python, Maya Python API</li>
            <li><strong>Automation Tools:</strong> Command Line (CLI) Utilities, Shell Scripting</li>
        </ul>

        <hr>

        <h3>Team & Duration</h3>
        <ul>
            <li><strong>Role:</strong> Technical Artist</li>
            <li><strong>Team Size:</strong> 8+ developers</li>
            <li><strong>Duration:</strong> 2 months (2025)</li>
            <li><strong>Platform:</strong> PC</li>
        </ul>
    </div>

    <h2>Automation Challenges</h2>
    <div class="grid competencies-grid">
        <div class="grid-item">
            <div class="project-info">
                <h3>Rapid Timeline</h3>
                <p class="project-description">Short contract timeline required efficient tool design and rapid iteration based on team feedback.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Headless Operation</h3>
                <p class="project-description">All tools needed to run without GUI for CI/CD integration, requiring robust error handling and logging.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Quality Validation</h3>
                <p class="project-description">Automated systems needed comprehensive validation to catch issues without manual review.</p>
            </div>
        </div>

    </div>

    <h2>Technical Innovation</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Headless Maya Pipeline:</strong> Created a robust system for running Maya operations in headless mode with comprehensive error handling and progress reporting.</p>
        
        <p><strong>Modular Tool Architecture:</strong> Built tools as composable CLI utilities that could be chained together for complex workflows while remaining simple to use individually.</p>
    </div>

    <h2>Lessons Learned</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>CLI-First Design:</strong> Building tools with command-line interfaces from the start made CI/CD integration seamless and enabled powerful automation workflows.</p>
        
        <p><strong>Robust Error Handling:</strong> Headless operations require extensive error handling and logging since there's no user interface to provide feedback when things go wrong.</p>
        
        <p><strong>Incremental Automation:</strong> Starting with the most time-consuming manual tasks and automating them first provided immediate value while building toward full automation.</p>
        
        <p><strong>Documentation is Critical:</strong> CLI tools require excellent documentation and examples since there's no GUI to guide users through the process.</p>
    </div>

    <!-- Navigation -->
    <div style="display: flex; justify-content: space-between; margin: 60px 0 40px 0; gap: 20px;">
        <a href="../../techart.php" class="project-link" style="background: var(--form-bg); color: var(--text-color);">← Back to Technical Art</a>
        <a href="../smite/" class="project-link">Next Project: Smite →</a>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>
