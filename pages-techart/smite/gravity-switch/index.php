<?php
$page_title = "FK Chain Hair Tool - Technical Art";
include '../../../includes/header.php';
?>

<div class="container" style="max-width: 1300px;">
    <!-- Breadcrumb Navigation -->
    <nav style="margin: 20px 0; color: var(--text-secondary); font-size: 14px;">
        <a href="../../../index.php" style="color: var(--header-color); text-decoration: none;">Home</a> >
        <a href="../../../techart.php" style="color: var(--header-color); text-decoration: none;">Technical Art</a> >
        <a href="../index.php" style="color: var(--header-color); text-decoration: none;">Smite</a> >
        <span>FK Chain Hair Tool</span>
    </nav>

    <h2>FK Chain Hair Tool</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Hi-Rez Studios | 3ds Max MaxScript Tool Development</strong></p>
        <p>A MaxScript-based rigging tool developed for 3ds Max that automates the creation of FK (Forward Kinematics) chain hair systems. This tool streamlines the hair rigging workflow by automatically generating bone chains, control objects, and constraint hierarchies based on artist-defined splines or selected objects.</p>

        <p>The FK Chain Hair Tool was designed to accelerate the character animation pipeline at Hi-Rez Studios. By automating repetitive setup tasks, the tool reduced hair rig creation time from hours to minutes while maintaining consistency across character assets and ensuring animator-friendly control structures.</p>
    </div>

    <h2>Key Features</h2>
    <div class="grid competencies-grid">
        <div class="grid-item">
            <div class="project-info">
                <h3>Automated Bone Generation</h3>
                <p class="project-description">Automatically creates FK bone chains from splines or point selections, with customizable bone count and spacing for optimal deformation.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Control Rig Creation</h3>
                <p class="project-description">Generates animator-friendly control objects with proper hierarchies, shapes, and colors for easy selection and manipulation.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Constraint Setup</h3>
                <p class="project-description">Automatically configures orientation and position constraints between controls and bones, ensuring proper FK behavior and chain propagation.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Customizable Parameters</h3>
                <p class="project-description">User-configurable settings for bone count, control size, naming conventions, and constraint types to match project requirements.</p>
            </div>
        </div>
    </div>

    <h2>Tool Demo</h2>
    <div class="demo-reel">
        <div class="video-container">
            <iframe title="FK Chain Hair Tool Demo"
                    src="https://www.youtube.com/embed/OyiUt6jIEQE"
                    frameborder="0"
                    allowfullscreen
                    loading="lazy">
            </iframe>
        </div>
    </div>

    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
    <h2>Tool Impact</h2>
    <p>Significantly accelerated the character rigging workflow by automating repetitive FK chain creation tasks. The tool enabled riggers to focus on creative aspects rather than tedious manual setup, while ensuring consistency and quality across all character hair rigs in production.</p>
    </div>

    <div class="text-content">
        <ul>
            <li><strong>Time Savings:</strong> Reduced hair rig setup from hours to minutes per character</li>
            <li><strong>Consistency:</strong> Ensured standardized naming conventions and rig structure across all assets</li>
            <li><strong>Quality Assurance:</strong> Eliminated human error in manual constraint and hierarchy setup</li>
            <li><strong>Pipeline Integration:</strong> Seamlessly integrated with existing character rigging pipeline and tools</li>
        </ul>

        <hr>

        <h3>Technology Stack</h3>
        <ul>
            <li><strong>Scripting Language:</strong> MaxScript</li>
            <li><strong>3D Software:</strong> Autodesk 3ds Max</li>
            <li><strong>UI Framework:</strong> MaxScript Rollout UI</li>
            <li><strong>Rigging Systems:</strong> Bones, Position/Orientation Constraints, Control Objects</li>
        </ul>

        <hr>

        <h3>Development Details</h3>
        <ul>
            <li><strong>Role:</strong> Technical Artist & Tool Developer</li>
            <li><strong>Development Type:</strong> MaxScript automation tool</li>
            <li><strong>Context:</strong> Part of Smite character rigging pipeline</li>
            <li><strong>Users:</strong> Character riggers and technical artists</li>
        </ul>
    </div>

    <h2>Technical Implementation</h2>
    <div class="grid competencies-grid">

        <div class="grid-item">
            <div class="project-info">
                <h3>Spline-Based Generation</h3>
                <p class="project-description">Script analyzes selected a selected joint to automatically place bones along the joint's length, maintaining proper spacing and orientation for natural hair flow.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Control Object Creation</h3>
                <p class="project-description">Generates custom shape controls with proper naming, coloring, and hierarchical parenting to provide intuitive animator interfaces.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Constraint Automation</h3>
                <p class="project-description">Automatically configures position and orientation constraints linking controls to bones with proper axis settings.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>UI Interface</h3>
                <p class="project-description">MaxScript rollout interface provides parameter controls for bone count, naming prefixes, control size, and rig options.</p>
            </div>
        </div>
    </div>

    <h2>Use Cases</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Long Hair Characters:</strong> Characters with flowing hair, ponytails, or braids required FK chains for animator control. The tool quickly generated multi-bone chains following hair strands for natural deformation.</p>

        <p><strong>Cloth and Accessories:</strong> Capes, scarves, belts, and dangling accessories benefited from FK chains. The tool enabled rapid setup of control hierarchies for any dangling character elements.</p>

        <p><strong>Tentacles and Tails:</strong> Organic appendages like tails, tentacles, or flexible armor pieces required FK bone chains. The spline-based generation allowed artists to draw the desired shape and instantly create a rig.</p>
    </div>

    <h2>Technical Challenges</h2>
    <div class="grid competencies-grid">

        <div class="grid-item">
            <div class="project-info">
                <h3>Spline Sampling Accuracy</h3>
                <p class="project-description">Ensuring bones positions accurately while maintaining even spacing required careful mathematical interpolation.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Bone Orientation</h3>
                <p class="project-description">Calculating proper bone rotations to aim along the spline tangent while avoiding twist required quaternion math and look-at calculations.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Naming Conventions</h3>
                <p class="project-description">Supporting flexible naming schemes while maintaining pipeline compatibility required careful string handling and validation logic.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Error Handling</h3>
                <p class="project-description">Gracefully handling edge cases like invalid selections, overlapping bones, or existing hierarchies required robust validation and user feedback.</p>
            </div>
        </div>
    </div>

    <h2>Lessons Learned</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>User Feedback is Essential:</strong> Early versions of the tool had rigid workflows that didn't match artist needs. Iterating with rigger feedback led to flexible parameter controls that accommodated diverse use cases.</p>

        <p><strong>Defaults Matter:</strong> Providing intelligent defaults based on common use cases reduced setup time. Artists could quickly generate rigs and only adjust parameters when needed.</p>

    </div>

    <!-- Navigation -->
    <div style="display: flex; justify-content: space-between; margin: 60px 0 40px 0; gap: 20px;">
        <a href="../index.php" class="project-link" style="background: var(--form-bg); color: var(--text-color);">← Back to Smite</a>
        <a href="../../../techart.php" class="project-link">View All Technical Art →</a>
    </div>
</div>

<?php include '../../../includes/footer.php'; ?>
