<?php
$page_title = "Available Projects";
include 'includes/header.php';
include 'includes/project-components/project_loader.php';
?>

<div class="container" style="max-width: 1300px;">
    <h2>Available Projects (for reference)</h2>
    <p>Use these IDs in your project arrays:</p>
    
    <?php
    $allProjects = ProjectLoader::getAllProjects();
    foreach ($allProjects as $project) {
        echo "<div style='border: 1px solid #ccc; margin: 10px; padding: 10px; border-radius: 5px;'>";
        echo "<strong>ID:</strong> <code>" . $project['id'] . "</code><br>";
        echo "<strong>Title:</strong> " . $project['title'] . "<br>";
        echo "<strong>Category:</strong> " . $project['category'] . "<br>";
        echo "</div>";
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
