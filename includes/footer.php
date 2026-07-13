<?php
// includes/footer.php
?>
    <div class="site-footer">
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
