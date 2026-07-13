<?php
// includes/footer.php
?>
    <div class="site-footer">
        <p class="footer-links">
            <a href="<?php echo htmlspecialchars($social_links['github']); ?>" target="_blank" rel="noopener"><i class="fa-brands fa-github"></i> GitHub</a>
            <a href="<?php echo htmlspecialchars($social_links['linkedin']); ?>" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin"></i> LinkedIn</a>
            <a href="<?php echo htmlspecialchars($social_links['vimeo']); ?>" target="_blank" rel="noopener"><i class="fa-brands fa-vimeo"></i> Demo Reel</a>
            <a href="<?php echo htmlspecialchars($social_links['email']); ?>"><i class="fa-solid fa-envelope"></i> Email</a>
        </p>
        <p class="subtext">&copy; <?php echo $current_year; ?> <?php echo htmlspecialchars($site_name); ?>. All rights reserved.</p>
    </div>

    <script>
        // Play hover-preview videos on card hover; pause and rewind on leave
        document.querySelectorAll('.project-card').forEach(card => {
            const video = card.querySelector('.hover-video');
            if (!video) return;
            card.addEventListener('mouseenter', () => {
                video.currentTime = 0;
                video.play().catch(() => {});
            });
            card.addEventListener('mouseleave', () => {
                video.pause();
            });
        });

        // Whole card is clickable; real links inside keep working normally
        document.querySelectorAll('.project-card[data-href]').forEach(card => {
            card.addEventListener('click', e => {
                if (e.target.closest('a')) return;
                window.location = card.dataset.href;
            });
        });
    </script>
</body>
</html>
