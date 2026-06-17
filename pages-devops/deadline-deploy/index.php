<?php
$page_title = "Render Farm Deploy Automation - DevOps";
include '../../includes/header.php';
?>

<div class="container" style="max-width: 1300px;">
    <!-- Breadcrumb Navigation -->
    <nav style="margin: 20px 0; color: var(--text-secondary); font-size: 14px;">
        <a href="../../index.php" style="color: var(--header-color); text-decoration: none;">Home</a> &gt;
        <a href="../../devops.php" style="color: var(--header-color); text-decoration: none;">DevOps</a> &gt;
        <span>Render Farm Deploy Automation</span>
    </nav>

    <h2>Render Farm Deploy Automation</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>3ds Max Render Farm Pipeline | Python &amp; AWS Thinkbox Deadline | Windows</strong></p>
        <p>Standing up a new DCC version across a render farm used to mean walking every machine — running installers by hand, copying plugin files, and praying the configuration matched. This project replaces that with a single Python toolchain that installs <strong>3ds Max 2024/2026</strong> and its full plugin stack — <strong>V-Ray, Phoenix FD, Anima, and Forest Pack</strong> — across roughly <strong>130 Windows render nodes</strong>, executed remotely and unattended through AWS Thinkbox Deadline.</p>

        <p>The hard part isn't running an installer — it's running it <em>silently, elevated, and reliably</em> on machines whose render-worker accounts deliberately aren't administrators. The system solves that with a SYSTEM-level elevation model built on Windows scheduled tasks, UNC-share execution, and a dry-run mode that lets every rollout be rehearsed before it touches production.</p>
    </div>

    <h2>Key Features</h2>
    <div class="grid competencies-grid">
        <div class="grid-item">
            <div class="project-info">
                <h3>🚀 One-Command Rollout</h3>
                <p class="project-description">A single orchestrator deploys Max plus any subset of plugins to the whole farm via Deadline jobs — no per-machine babysitting.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>🔐 SYSTEM Elevation</h3>
                <p class="project-description">Installs run elevated as SYSTEM through a scheduled-task runner, so render workers never need to be local administrators.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>🧪 Dry-Run Safety</h3>
                <p class="project-description">Every deployment can be simulated first — validating installer paths and file existence before a single change is made.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>📦 Stdlib Only</h3>
                <p class="project-description">Runs on Deadline's embedded Python with zero external dependencies — nothing to pip-install on 130 machines.</p>
            </div>
        </div>
    </div>

    <h2>How It Works</h2>
    <div class="expandable-section">
        <button class="expand-toggle">
            Orchestration Pattern <span class="toggle-icon">▼</span>
        </button>
        <div class="expandable-content">
            <p>A single entry point, <code>deadline_install_main.py</code>, holds a <code>DEPLOYABLES</code> dictionary that maps each component key to a display name and its installer function. The orchestrator iterates the requested components and runs each installer in sequence. Adding a new package — a new Max version, a new plugin — is a matter of writing one <code>install_&lt;name&gt;.py</code> module and registering it in the dict.</p>

            <div style="background: var(--form-bg); padding: 20px; border-radius: 8px; margin: 20px 0;">
                <pre style="color: var(--text-secondary); font-family: 'Courier New', monospace; font-size: 14px; line-height: 1.6; margin: 0;"><code># deadline_install_main.py — single entry point
DEPLOYABLES = {
    "max2024":    ("3ds Max 2024",   install_max2024.install),
    "max2026":    ("3ds Max 2026",   install_max2026.install),
    "vray6":      ("V-Ray 6",        install_vray6.install),
    "vray7":      ("V-Ray 7",        install_vray7.install),
    "phoenix":    ("Phoenix FD",     install_phoenix.install),
    "anima":      ("Anima",          install_anima.install),
    "forestpack": ("Forest Pack Pro", install_forestpack.install),
}

# Each install_*.py exposes an install() returning an int exit code.
# Adding a component = new module + one entry here.</code></pre>
            </div>
        </div>
    </div>

    <div class="expandable-section">
        <button class="expand-toggle">
            Running a Deployment <span class="toggle-icon">▼</span>
        </button>
        <div class="expandable-content">
            <p>Scripts live on a UNC share and are invoked on each node by Deadline's render worker. The CLI selects exactly which components to install and supports a full dry run.</p>

            <div style="background: var(--form-bg); padding: 20px; border-radius: 8px; margin: 20px 0;">
                <pre style="color: var(--text-secondary); font-family: 'Courier New', monospace; font-size: 14px; line-height: 1.6; margin: 0;"><code>REM Default install (3ds Max 2026 + V-Ray 7)
"C:\Program Files\Thinkbox\Deadline10\bin\python3\python.exe" ^
  "\\mapdrives\...\DL_Deploy\deadline_install_main.py"

REM Install a specific subset of components
... deadline_install_main.py --only max2024,vray6

REM Max 2026 + every plugin
... deadline_install_main.py --only max2026,vray7,phoenix,anima,forestpack

REM Rehearse without changing anything
... deadline_install_main.py --dry-run

REM Keep going even if one component fails
... deadline_install_main.py --continue-on-fail</code></pre>
            </div>
        </div>
    </div>

    <div class="expandable-section">
        <button class="expand-toggle">
            The Elevation Model <span class="toggle-icon">▼</span>
        </button>
        <div class="expandable-content">
            <p>The interesting engineering lives in <code>deploy_lib.py</code>. Render workers run as non-admin accounts, but installers need to run as SYSTEM. The <code>run_elevated()</code> helper uses a three-tier strategy so deployments work whether or not a machine has been pre-provisioned:</p>
            <ul>
                <li><strong>Already elevated</strong> → run the command directly.</li>
                <li><strong>Permanent runner exists</strong> → reuse the pre-created <code>DeadlineElevatedRunner</code> scheduled task (set up once per machine via <code>setup_elevated_runner.py</code>).</li>
                <li><strong>Fallback</strong> → create, run, and delete a temporary scheduled task on the fly.</li>
            </ul>
            <p>Because UNC installers aren't reachable by the SYSTEM context directly, <code>run_installer_copied()</code> stages each installer to a local temp directory, runs it elevated, and cleans up afterward. A global <code>DRY_RUN</code> flag short-circuits every action into a simulated log line.</p>
        </div>
    </div>

    <h2>Business Impact</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <ul>
            <li><strong>~130 machines, zero hands-on:</strong> A farm-wide DCC + plugin rollout that once meant visiting every workstation now runs as a Deadline job.</li>
            <li><strong>Consistent configuration:</strong> Every node installs from the same images and the same code path, eliminating per-machine drift.</li>
            <li><strong>Non-admin by design:</strong> Workers stay locked down; elevation is scoped to a single, auditable scheduled task.</li>
            <li><strong>Safe to rehearse:</strong> Dry-run mode validates the whole plan before production deployment.</li>
            <li><strong>Resilient rollouts:</strong> <code>--continue-on-fail</code> allows partial installs to complete instead of halting the entire batch.</li>
        </ul>

        <hr>

        <h3>Technology Stack</h3>
        <ul>
            <li><strong>Language:</strong> Python 3 (Deadline's embedded interpreter), standard library only</li>
            <li><strong>Render management:</strong> AWS Thinkbox Deadline 10</li>
            <li><strong>Windows internals:</strong> <code>schtasks</code>, <code>robocopy</code>, <code>ctypes.windll</code>, UNC shares</li>
            <li><strong>Targets:</strong> 3ds Max 2024 / 2026, V-Ray 6 / 7, Phoenix FD, Anima, Forest Pack Pro</li>
        </ul>

        <hr>

        <h3>Design Principles</h3>
        <ul>
            <li><strong>Single entry point:</strong> One orchestrator, one component registry, predictable sequencing.</li>
            <li><strong>Pluggable installers:</strong> New software = one new module + one registry line.</li>
            <li><strong>No external dependencies:</strong> Nothing to install on the nodes before the deployer can run.</li>
            <li><strong>Simulate before you ship:</strong> Dry-run is a first-class mode, not an afterthought.</li>
        </ul>
    </div>

    <!-- Navigation -->
    <div style="display: flex; justify-content: space-between; margin: 60px 0 40px 0; gap: 20px;">
        <a href="../../devops.php" class="project-link" style="background: var(--form-bg); color: var(--text-color);">← Back to DevOps</a>
        <a href="../omnitool/" class="project-link">Next Project: OmniTool →</a>
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
</script>

<?php include '../../includes/footer.php'; ?>
