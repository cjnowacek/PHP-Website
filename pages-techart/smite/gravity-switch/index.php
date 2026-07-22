<?php
$page_title = "Gravity Switch Rig - Technical Art";
include '../../../includes/header.php';
?>

<div class="container" style="max-width: 1300px;">
    <!-- Breadcrumb Navigation -->
    <nav style="margin: 20px 0; color: var(--text-secondary); font-size: 14px;">
        <a href="../../../index.php" style="color: var(--header-color); text-decoration: none;">Home</a> >
        <a href="../../../techart.php" style="color: var(--header-color); text-decoration: none;">Technical Art</a> >
        <a href="../index.php" style="color: var(--header-color); text-decoration: none;">Smite</a> >
        <span>Gravity Switch Rig</span>
    </nav>

    <h2>Gravity Switch Rig</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Hi-Rez Studios | 3ds Max Rigging, MaxScript</strong></p>
        <p>A gravity simulation rig built in 3ds Max with orient and aim constraints, set up through MaxScript. The rig lets animators change the direction gravity pulls on hair and other dangling elements, so secondary motion stays believable no matter how a character moves or poses.</p>

        <p>The Gravity Switch was used primarily for hair on Smite characters. By using constraint-based simulation rather than dynamics, the system stayed artist-friendly, evaluated in real time, and produced clean, keyframeable results in the animation pipeline.</p>
    </div>

    <h2>Key Features</h2>
    <div class="grid competencies-grid">
        <div class="grid-item">
            <div class="project-info">
                <h3>Dynamic Gravity Direction</h3>
                <p class="project-description">Orient constraints allow smooth transitions between gravity directions, keeping hair and accessories hanging correctly through flips, spins, and extreme poses.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Aim Constraint Integration</h3>
                <p class="project-description">Aim constraints keep chain elements properly oriented relative to the gravity direction, maintaining believable weight without dynamics.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Animator-Friendly Controls</h3>
                <p class="project-description">Simple keyframeable controls let animators adjust gravity direction and influence without any scripting knowledge.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Performance Optimized</h3>
                <p class="project-description">Constraint-based approach ensures real-time viewport performance and clean animation curves without simulation overhead.</p>
            </div>
        </div>
    </div>

    <h2>Tool Demo</h2>
    <div class="demo-reel">
        <div class="video-container">
            <iframe title="Gravity Switch MaxScript Demo"
                    src="https://www.youtube.com/embed/OyiUt6jIEQE"
                    frameborder="0"
                    allowfullscreen
                    loading="lazy">
            </iframe>
        </div>
    </div>

    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
    <h2>Rig Impact</h2>
    <p>Gave animators precise, predictable control over gravity on hair and dangling elements. The constraint-based approach produced keyframeable results that exported cleanly to engine, avoiding the noise and cleanup that come with dynamic simulation.</p>
    </div>

    <div class="text-content">
        <ul>
            <li><strong>Believable Secondary Motion:</strong> Hair kept its sense of weight through any character orientation</li>
            <li><strong>Animator Control:</strong> Keyframeable gravity direction gave animators full creative control</li>
            <li><strong>Real-Time Performance:</strong> Constraint system maintained viewport interactivity during animation</li>
            <li><strong>Clean Export:</strong> Baked animations exported cleanly to engine without simulation artifacts</li>
        </ul>

        <hr>

        <h3>Technology Stack</h3>
        <ul>
            <li><strong>3D Software:</strong> Autodesk 3ds Max</li>
            <li><strong>Scripting:</strong> MaxScript</li>
            <li><strong>Rigging Systems:</strong> Orient Constraints, Aim Constraints, custom control rigs</li>
        </ul>

        <hr>

        <h3>Development Details</h3>
        <ul>
            <li><strong>Role:</strong> Technical Artist & Rigger</li>
            <li><strong>Development Type:</strong> Rigging system development</li>
            <li><strong>Context:</strong> Part of Smite character rigging pipeline</li>
            <li><strong>Platforms:</strong> PC, Console</li>
        </ul>
    </div>

    <h2>Technical Implementation</h2>
    <div class="grid competencies-grid">

        <div class="grid-item">
            <div class="project-info">
                <h3>Orient Constraint System</h3>
                <p class="project-description">Core gravity direction controlled by orient constraints targeting directional helper objects representing gravity vectors.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Aim Constraint Hierarchy</h3>
                <p class="project-description">Aim constraints down the chain keep hair, cloth, and accessories oriented relative to gravity as the character moves.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>MaxScript Setup</h3>
                <p class="project-description">Scripted setup builds the constraint network consistently across characters, keeping naming and structure uniform in the pipeline.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Baking Pipeline</h3>
                <p class="project-description">Constraint-driven motion bakes down to the standard bone hierarchy for clean engine export.</p>
            </div>
        </div>
    </div>

    <h2>Use Cases</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Hair:</strong> The primary use case. Long hair, ponytails, and braids kept a consistent sense of weight as characters flipped, turned, and posed, without hand-animating every strand.</p>

        <p><strong>Cloth and Accessories:</strong> Capes, scarves, belts, and other dangling elements benefited from the same gravity-aware constraint setup.</p>

        <p><strong>Stylized Motion:</strong> Because gravity direction is keyframeable, animators could push or exaggerate the apparent pull for stylized shots and ability animations.</p>
    </div>

    <h2>Technical Challenges</h2>
    <div class="grid competencies-grid">

        <div class="grid-item">
            <div class="project-info">
                <h3>Constraint Stability</h3>
                <p class="project-description">Maintaining stable constraint evaluation order was critical to prevent flipping or gimbal lock during gravity transitions.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Animation Blending</h3>
                <p class="project-description">Required careful setup to ensure gravity-driven motion blended smoothly with existing locomotion and action animations.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Performance Optimization</h3>
                <p class="project-description">Constraint evaluation overhead required optimization to maintain real-time scrubbing in complex scenes.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>Engine Export</h3>
                <p class="project-description">Ensuring constraint-driven motion baked correctly for engine import without losing fidelity.</p>
            </div>
        </div>
    </div>

    <h2>Lessons Learned</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>Constraints Over Simulation:</strong> For game animation, predictable constraint-based systems proved more artist-friendly than dynamic simulations. Animators valued control over automatic behavior.</p>

        <p><strong>Hierarchy Matters:</strong> Proper constraint hierarchy and evaluation order were essential. Early prototypes suffered from evaluation order issues that caused unpredictable results.</p>

        <p><strong>Test Early and Often:</strong> Testing gravity transitions with real animation cycles revealed edge cases that were not apparent in static poses. Iterative testing with animators was invaluable.</p>
    </div>

    <!-- Navigation -->
    <div style="display: flex; justify-content: space-between; margin: 60px 0 40px 0; gap: 20px;">
        <a href="../index.php" class="project-link" style="background: var(--form-bg); color: var(--text-color);">← Back to Smite</a>
        <a href="../../../techart.php" class="project-link">View All Technical Art →</a>
    </div>
</div>

<?php include '../../../includes/footer.php'; ?>
