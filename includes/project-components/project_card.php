
<?php
// includes/project-cards/project_card.php - Reusable project card component
function renderProjectCard($project, $showLink = true) {
    $hasVideo = !empty($project['video']);
    $hasGif = !empty($project['gif']);
    $cardHref = ($showLink && !empty($project['link'])) ? $project['link'] : null;
    ?>
    <div class="project-card"<?php if ($cardHref): ?> data-href="<?php echo htmlspecialchars($cardHref); ?>"<?php endif; ?>>
        <div class="project-media">
            <?php if (!empty($project['image'])): ?>
                <img src="<?php echo htmlspecialchars($project['image']); ?>"
                     alt="<?php echo htmlspecialchars($project['title']); ?>"
                     loading="lazy">
                <?php if ($hasVideo): ?>
                    <video class="hover-video"
                           src="<?php echo htmlspecialchars($project['video']); ?>"
                           muted loop playsinline preload="metadata"
                           aria-label="<?php echo htmlspecialchars($project['title']); ?> preview"></video>
                <?php elseif ($hasGif): ?>
                    <img class="hover-gif"
                         src="<?php echo htmlspecialchars($project['gif']); ?>"
                         alt="<?php echo htmlspecialchars($project['title']); ?> GIF"
                         loading="lazy">
                <?php endif; ?>
            <?php else: ?>
                <div class="project-media-overlay">
                    <div class="media-icon">🔄</div>
                </div>
            <?php endif; ?>
        </div>
        <div class="project-info-card">
            <h3><?php echo htmlspecialchars($project['title']); ?></h3>
            <p class="project-company"><?php echo htmlspecialchars($project['company']); ?></p>
            <p class="project-description-card"><?php echo htmlspecialchars($project['description']); ?></p>
            
            <?php if (!empty($project['highlights'])): ?>
                <div class="project-highlights">
                    <strong>Key <?php echo $project['category'] === 'devops' ? 'Achievements' : 'Contributions'; ?>:</strong>
                    <ul>
                        <?php foreach ($project['highlights'] as $highlight): ?>
                            <li><?php echo htmlspecialchars($highlight); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($project['tech_tags'])): ?>
                <div class="tech-tags">
                    <?php foreach ($project['tech_tags'] as $tag): ?>
                        <span class="tech-tag"><?php echo htmlspecialchars($tag); ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($showLink && !empty($project['link'])): ?>
                <a href="<?php echo htmlspecialchars($project['link']); ?>" class="project-link">View Project Details</a>
            <?php endif; ?>
        </div>
    </div>
    <?php
}
?>
