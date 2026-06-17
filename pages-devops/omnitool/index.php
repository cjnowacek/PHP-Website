<?php
$page_title = "OmniTool — Pipeline App - DevOps";
include '../../includes/header.php';
?>

<div class="container" style="max-width: 1300px;">
    <!-- Breadcrumb Navigation -->
    <nav style="margin: 20px 0; color: var(--text-secondary); font-size: 14px;">
        <a href="../../index.php" style="color: var(--header-color); text-decoration: none;">Home</a> &gt;
        <a href="../../devops.php" style="color: var(--header-color); text-decoration: none;">DevOps</a> &gt;
        <span>OmniTool</span>
    </nav>

    <h2>OmniTool — Pipeline Application</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p><strong>3ds Max Pipeline Tooling | Python · PyQt · PyInstaller | Windows</strong></p>
        <p>OmniTool is a Python application for automating <strong>3ds Max scene preparation and render-farm job submission</strong>. Its defining trait is reach: a single core library runs from three completely different contexts — a command line, a PyQt desktop GUI, and natively inside 3ds Max through <code>pymxs</code> — with the same code doing the work in each.</p>

        <p>Just as interesting is how it ships. OmniTool is delivered as a self-updating, single-file executable to roughly <strong>130 machines across two independent studios</strong>, and a large share of the engineering went into making that distribution survive real-world studio constraints: endpoint security (SentinelOne EDR), locked-down accounts, flaky drive mappings, and the quirks of embedding a Qt app inside Max.</p>
    </div>

    <h2>Key Features</h2>
    <div class="grid competencies-grid">
        <div class="grid-item">
            <div class="project-info">
                <h3>🧩 One Core, Three Front-Ends</h3>
                <p class="project-description">A UI-agnostic core library powers a CLI, a PyQt GUI, and in-Max execution. The connection layer auto-detects native vs. external.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>🛡️ EDR-Aware Packaging</h3>
                <p class="project-description">PyInstaller build deliberately tuned — onefile, UPX off, redirected runtime tmpdir — so the studio's SentinelOne whitelist applies cleanly.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>🔄 Silent Auto-Updater</h3>
                <p class="project-description">A per-user scheduled task SHA-256-compares the share build every 10 minutes and prompts to update — with a per-build decline memory.</p>
            </div>
        </div>

        <div class="grid-item">
            <div class="project-info">
                <h3>🏢 Two-Studio Deploy</h3>
                <p class="project-description">Independent share roots, databases, and push cadences per studio, with each machine bound to its origin via a studio sentinel file.</p>
            </div>
        </div>
    </div>

    <h2>How It Works</h2>
    <div class="expandable-section">
        <button class="expand-toggle">
            Architecture <span class="toggle-icon">▼</span>
        </button>
        <div class="expandable-content">
            <p>The core library has <em>zero</em> UI knowledge — the CLI and GUI are thin shells over it. The connection is injected by a <code>get_connection()</code> factory that auto-detects whether OmniTool is running natively inside Max or talking to it externally (COM / socket). A Python 3.7 floor keeps it compatible with the interpreter bundled in Max 2022, all the way up to 3.12 in Max 2026.</p>

            <div style="background: var(--form-bg); padding: 20px; border-radius: 8px; margin: 20px 0;">
                <pre style="color: var(--text-secondary); font-family: 'Courier New', monospace; font-size: 14px; line-height: 1.6; margin: 0;"><code>omnitool/
├── connection/    Transport layer (COM, socket, native pymxs)
├── max/           MXS execution, scene operations
├── sini/          Sini IgNite / Forensic / Unite wrappers
├── pipeline/      Scene-prep orchestrator, submission logic
├── diagnostics/   Health checks, INI sidecar caching
├── models/        Pure data objects (reports, configs, manifests)
├── config.py      Farm paths, defaults
└── cli.py         CLI entry point</code></pre>
            </div>

            <p>Common commands across every context:</p>
            <div style="background: var(--form-bg); padding: 20px; border-radius: 8px; margin: 20px 0;">
                <pre style="color: var(--text-secondary); font-family: 'Courier New', monospace; font-size: 14px; line-height: 1.6; margin: 0;"><code># Diagnose connection + scene health
omnitool diagnose --scene shot_001.max

# Prep a scene (cleanup, relink, preflight)
omnitool prep --scene shot_001.max

# Force fresh diagnostics, bypassing the INI cache
omnitool diagnose --scene shot_001.max --force</code></pre>
            </div>
        </div>
    </div>

    <div class="expandable-section">
        <button class="expand-toggle">
            Surviving Studio EDR <span class="toggle-icon">▼</span>
        </button>
        <div class="expandable-content">
            <p>Shipping a PyInstaller binary into a studio running SentinelOne meant the packaging choices <em>were</em> the feature. Each setting in the build spec exists because an alternative tripped the endpoint-security stack:</p>
            <ul>
                <li><strong>onefile, not onedir</strong> — SentinelOne flagged the onedir launcher + <code>_internal\</code> DLL layout as DLL sideloading. The studio whitelist applies cleanly only to the single-file build.</li>
                <li><strong>UPX disabled</strong> — UPX-packed binaries trip static analysis regardless of payload.</li>
                <li><strong>Redirected runtime tmpdir</strong> — the bootloader extracts to <code>%LOCALAPPDATA%\OmniTool\runtime</code> instead of <code>%TEMP%</code>, reducing AV friction and avoiding orphaned extraction folders.</li>
                <li><strong>Explicit AppUserModelID</strong> — set before <code>QApplication</code> starts so Windows shows OmniTool's icon instead of the generic embedded-Python feather.</li>
            </ul>
        </div>
    </div>

    <div class="expandable-section">
        <button class="expand-toggle">
            Install &amp; Auto-Update Flow <span class="toggle-icon">▼</span>
        </button>
        <div class="expandable-content">
            <p>The shippable artifact is a flat four-file bundle that mirrors 1:1 to a studio share. <code>install.bat</code> copies the exe to the user's desktop, drops a shortcut, headlessly installs the Max startup listener via <code>omnitool.exe --install-listener</code>, writes a studio sentinel, and registers a per-user <strong>OmniTool Updater</strong> scheduled task. <code>uninstall.bat</code> reverses every step in pure batch — no dependency on the exe.</p>

            <p>The updater task then runs every 10 minutes and:</p>
            <ol>
                <li>Reads the studio sentinel to find the pinned share root.</li>
                <li>SHA-256-compares the share's <code>omnitool.exe</code> against the local copy; exits silently if they match.</li>
                <li>Honors a per-hash "decline" file, so saying No to one build doesn't nag — but a fresh push invalidates the decline automatically.</li>
                <li>Otherwise prompts with a 60-second auto-yes timer, then shells <code>install.bat</code> in unattended mode and relaunches.</li>
            </ol>
            <p>A named mutex prevents two concurrent prompts, and the same flow is reachable manually from <strong>Help → Check for Updates…</strong> in the GUI.</p>
        </div>
    </div>

    <h2>Engineering Highlights</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <ul>
            <li><strong>Robust drive-path resolution:</strong> The SQLite DB root resolves to the mapped <code>T:</code> drive when present and falls back to its UNC equivalent — because fresh logons and Deadline workers don't always have login-script drive mappings in place.</li>
            <li><strong>Crash-free in-Max listener:</strong> The job-queue pump was moved off a <code>System.Windows.Forms.Timer</code> (which faulted re-entrantly inside the .NET↔MaxScript marshaling layer) onto a native MaxScript <code>rollout timer</code> hosted in an off-screen dialog — eliminating a class of unhandled-exception crashes.</li>
            <li><strong>Two independent studios:</strong> Each studio has its own bundle copy, its own database, and its own push cadence, with no cross-studio fallback — a machine pulls only from the studio it was installed from.</li>
        </ul>

        <hr>

        <h3>Technology Stack</h3>
        <ul>
            <li><strong>Language:</strong> Python 3.7–3.12 (Max-bundled interpreters)</li>
            <li><strong>GUI:</strong> PyQt</li>
            <li><strong>Max integration:</strong> <code>pymxs</code>, MaxScript, COM &amp; socket transports</li>
            <li><strong>Packaging &amp; deploy:</strong> PyInstaller (onefile), PowerShell updater, Windows scheduled tasks, SQLite</li>
        </ul>
    </div>

    <!-- Navigation -->
    <div style="display: flex; justify-content: space-between; margin: 60px 0 40px 0; gap: 20px;">
        <a href="../deadline-deploy/" class="project-link" style="background: var(--form-bg); color: var(--text-color);">← Render Farm Deploy</a>
        <a href="../../devops.php" class="project-link">Back to DevOps →</a>
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
