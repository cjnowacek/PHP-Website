<?php
$page_title = "Envelope Export Tool - Technical Art";
include '../../../includes/header.php';
?>

<div class="container" style="max-width: 1300px;">
    <!-- Breadcrumb Navigation -->
    <nav style="margin: 20px 0; color: var(--text-secondary); font-size: 14px;">
        <a href="../../../index.php" style="color: var(--header-color); text-decoration: none;">Home</a> >
        <a href="../../../techart.php" style="color: var(--header-color); text-decoration: none;">Technical Art</a> >
        <a href="../index.php" style="color: var(--header-color); text-decoration: none;">Smite</a> >
        <span>Envelope Export Tool</span>
    </nav>

    <h2>Envelope Export Tool</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Hi-Rez Studios | 3ds Max & MaxScript</strong></p>
        <p>A MaxScript utility developed to streamline the workflow of transferring mesh envelopes and skinning data between files in 3ds Max. This tool exports envelope information from existing meshes, allowing artists to easily add them to new files and load in the skinning data without manual recreation.</p>

        <p>This tool was created to address a common pain point in character production workflows where skin weight data needed to be transferred or replicated across multiple asset files, particularly during character porting and variant creation.</p>
    </div>

    <h2>Key Features</h2>
    <div class="grid competencies-grid">
        <div class="grid-item">
            <div class="project-info">
                <h3>Envelope Extraction</h3>
                <p class="project-description">Automatically extracts envelope data from selected meshes, preserving all skin modifier information and bone influence data.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Data Import</h3>
                <p class="project-description">Imports previously exported envelope data onto new meshes, recreating skin modifiers with correct bone assignments and weight values.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Workflow Integration</h3>
                <p class="project-description">Seamlessly integrates into existing 3ds Max pipelines with simple UI and batch processing capabilities.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Error Handling</h3>
                <p class="project-description">Validates bone hierarchies and provides clear feedback when mismatches occur, preventing data corruption.</p>
            </div>
        </div>
    </div>

    <h2>Tool Demo</h2>
    <div class="demo-reel">
        <div class="video-container">
            <iframe title="Envelope exporter"
                    src="https://www.youtube.com/embed/clCQRT6Jh8g"
                    frameborder="0"
                    allowfullscreen
                    loading="lazy">
            </iframe>
        </div>
    </div>

    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
    <h2>Tool Impact</h2>
    <p>Reduced repetitive manual work in character skinning workflows, enabling faster iteration and more consistent results across character variants and ports. Particularly valuable when working with the large character roster in Smite.</p>
    </div>

    <div class="text-content">
        <ul>
            <li><strong>Time Savings:</strong> Eliminated hours of manual skin weight recreation per character</li>
            <li><strong>Consistency:</strong> Ensured identical skinning data across character variants</li>
            <li><strong>Error Reduction:</strong> Automated process reduced human error in weight transfer</li>
            <li><strong>Workflow Flexibility:</strong> Enabled non-destructive experimentation with skinning approaches</li>
        </ul>

        <hr>

        <h3>Technology Stack</h3>
        <ul>
            <li><strong>3D Software:</strong> 3ds Max</li>
            <li><strong>Scripting Language:</strong> MaxScript</li>
            <li><strong>Data Format:</strong> Custom XML/text-based envelope data structure</li>
        </ul>

        <hr>

        <h3>Development Details</h3>
        <ul>
            <li><strong>Role:</strong> Technical Artist & Tool Developer</li>
            <li><strong>Development Type:</strong> Individual tool development</li>
            <li><strong>Context:</strong> Part of Smite character production pipeline</li>
            <li><strong>Platform:</strong> PC (3ds Max environment)</li>
        </ul>
    </div>

    <h2>Technical Implementation</h2>
    <div class="grid competencies-grid">

        <div class="grid-item">
            <div class="project-info">
                <h3>Skin Modifier Parsing</h3>
                <p class="project-description">Accesses and extracts all vertex weight data, bone assignments, and envelope parameters from the Skin modifier interface.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Data Serialization</h3>
                <p class="project-description">Converts complex skin data into a portable format that can be stored and transferred between Max files.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Bone Hierarchy Matching</h3>
                <p class="project-description">Intelligently matches bone names and hierarchy structures between source and destination scenes.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>UI Design</h3>
                <p class="project-description">Simple, artist-friendly interface with clear export/import workflow and progress feedback.</p>
            </div>
        </div>
    </div>

    <h2>Use Cases</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Character Porting:</strong> When bringing characters from Smite to its sequel, this tool allowed rapid transfer of proven skin weight data to new mesh topology after retopology adjustments.</p>

        <p><strong>Skin Variants:</strong> Creating alternate costumes or visual variants required replicating skinning data across similar mesh structures. The tool made this process instant rather than manual.</p>

        <p><strong>Backup and Recovery:</strong> Artists could export and archive working skinning data as a safety measure before experimental modifications, allowing quick rollback if needed.</p>
    </div>

    <h2>Lessons Learned</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Data Validation is Critical:</strong> Early versions didn't thoroughly validate bone hierarchies, leading to crashes. Adding comprehensive validation and clear error messages made the tool production-ready.</p>

        <p><strong>Artist Feedback Drives Features:</strong> Initial design was purely export/import. Artist requests led to additions like selective bone export and partial weight transfer capabilities.</p>

        <p><strong>Simple UI Wins:</strong> Keeping the interface simple and workflow-focused led to higher adoption than more feature-rich but complex alternatives.</p>
    </div>

    <!-- Navigation -->
    <div style="display: flex; justify-content: space-between; margin: 60px 0 40px 0; gap: 20px;">
        <a href="../index.php" class="project-link" style="background: var(--form-bg); color: var(--text-color);">← Back to Smite</a>
        <a href="../../../techart.php" class="project-link">View All Technical Art →</a>
    </div>
</div>

<?php include '../../../includes/footer.php'; ?>
