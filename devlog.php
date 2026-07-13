<?php
$page_title = "Dev Log";
include 'includes/header.php';

// Load posts: each file in includes/devlog-posts/ returns
// ['date' => 'YYYY-MM-DD', 'title' => ..., 'tags' => [...], 'html' => ...]
$posts = [];
foreach (glob('includes/devlog-posts/*.php') as $file) {
    $post = include $file;
    if (is_array($post) && isset($post['date'], $post['title'], $post['html'])) {
        $posts[] = $post;
    }
}
usort($posts, function ($a, $b) {
    return strcmp($b['date'], $a['date']);
});
?>

<div class="container" style="max-width: 1300px;">

    <h2>Dev Log</h2>
    <div class="about-text" style="max-width: 800px; margin: 0 auto 40px auto; text-align: left;">
        <p>Working notes from the pipeline bench: what I'm building, what broke, and how I thought through it. Short entries, posted as the work happens.</p>
    </div>

    <?php if (empty($posts)): ?>
        <p style="text-align: center; color: var(--text-secondary);">First entries coming soon.</p>
    <?php endif; ?>

    <?php foreach ($posts as $post): ?>
        <article class="text-content" style="margin-bottom: 50px;">
            <h3 style="color: var(--header-color); margin-bottom: 4px;"><?php echo htmlspecialchars($post['title']); ?></h3>
            <p style="color: var(--text-secondary); font-size: 14px; margin-top: 0;">
                <?php echo htmlspecialchars(date('F j, Y', strtotime($post['date']))); ?>
                <?php if (!empty($post['tags'])): ?>
                    &middot; <?php echo htmlspecialchars(implode(' / ', $post['tags'])); ?>
                <?php endif; ?>
            </p>
            <?php echo $post['html']; ?>
        </article>
        <hr style="max-width: 800px;">
    <?php endforeach; ?>

</div>

<?php include 'includes/footer.php'; ?>
