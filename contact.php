<?php
$page_title = "Contact";
include 'includes/header.php';
?>

<div class="container" style="max-width: 1300px;">
    <h2>Get In Touch</h2>
    
    <div class="contact-content">
        <div class="contact-info">
            <h3>Let's Connect</h3>
            <div class="contact-details">
                <p><strong>📧 Email:</strong><br>
                <a href="mailto:cj@cjnowacek.com">cj@cjnowacek.com</a></p>
                
                <p><strong>💼 LinkedIn:</strong><br>
                <a href="https://linkedin.com/in/cj-nowacek" target="_blank" rel="noopener">linkedin.com/in/cj-nowacek</a></p>
                
                <p><strong>🐙 GitHub:</strong><br>
                <a href="https://github.com/cjnowacek" target="_blank" rel="noopener">github.com/cjnowacek</a></p>
                
                <p><strong>🎬 Demo Reel:</strong><br>
                <a href="https://vimeo.com/1016947852" target="_blank" rel="noopener">View on Vimeo</a></p>
            </div>
            
            <div class="resume-download">
                <h3>Resume</h3>
                <a href="/static/files/CJ-Nowacek-TechArt-Resume.pdf" class="project-link" download>
                    📄 Tech Art Resume (PDF)
                </a>
                <a href="/static/files/CJ-Nowacek-Pipeline-Resume.pdf" class="project-link" download>
                    📄 Pipeline Resume (PDF)
                </a>
                <p class="project-description">Pipeline Developer &amp; Technical Artist<br>
                Updated: <?php echo date('F Y', @filemtime(__DIR__ . '/static/files/CJ-Nowacek-Pipeline-Resume.pdf') ?: time()); ?></p>
            </div>

            <div class="availability">
                <h3>Availability</h3>
                <div class="status-indicator">
                    <span class="status-dot available"></span>
                    <span>Open to conversations</span>
                </div>
                <p class="project-description">Happy to talk pipeline tooling, rigging, and render farm automation. Freelance rigging inquiries welcome.</p>
            </div>
        </div>
        
        <div class="contact-form">
            <h3>Send a Message</h3>
            <form action="includes/contact_handler.php" method="POST" id="contactForm">
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="company">Company/Organization</label>
                    <input type="text" id="company" name="company">
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject *</label>
                    <select id="subject" name="subject" required>
                        <option value="">Select a topic...</option>
                        <option value="job_opportunity">Job Opportunity</option>
                        <option value="freelance_project">Freelance Project</option>
                        <option value="collaboration">Collaboration</option>
                        <option value="technical_question">Technical Question</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" rows="6" required placeholder="Tell me about your project, opportunity, or question..."></textarea>
                </div>
                
                <!-- Honeypot: hidden from humans, catches bots -->
                <div style="position: absolute; left: -9999px;" aria-hidden="true">
                    <label for="website">Website</label>
                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                </div>

                <button type="submit" class="submit-btn">Send Message</button>
                
                <p class="form-note">* Required fields. I typically respond within 24-48 hours.</p>
            </form>
            
            <div id="formResponse" class="form-response" style="display: none;"></div>
        </div>
    </div>
</div>

<script>
document.getElementById('contactForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const form = this;
    const submitBtn = form.querySelector('.submit-btn');
    const responseDiv = document.getElementById('formResponse');

    submitBtn.textContent = 'Sending...';
    submitBtn.disabled = true;

    try {
        const res = await fetch('/includes/contact_handler.php', {
            method: 'POST',
            body: new FormData(form)
        });
        const data = await res.json();

        if (res.ok && data.success) {
            responseDiv.innerHTML = '<div class="success-message">' + data.message + '</div>';
            form.reset();
        } else {
            const details = (data.details || [data.error || 'Something went wrong.']).join(' ');
            responseDiv.innerHTML = '<div class="error-message">' + details + '</div>';
        }
    } catch (err) {
        responseDiv.innerHTML = '<div class="error-message">Could not send right now. Email me directly at cj@cjnowacek.com.</div>';
    }

    responseDiv.style.display = 'block';
    submitBtn.textContent = 'Send Message';
    submitBtn.disabled = false;

    setTimeout(() => { responseDiv.style.display = 'none'; }, 8000);
});
</script>

<?php include 'includes/footer.php'; ?>
