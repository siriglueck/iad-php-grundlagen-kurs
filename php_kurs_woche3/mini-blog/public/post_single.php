<?php
    
    require_once  __DIR__ . '/header.php';
    require_once  dirname(__DIR__) . '/inc/functions.php';

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $post = $id ? findPost($pdo, $id) : null;

    if(!$post) {
        header('Location: index.php');
        exit;
    }
    
?>
    <main class="container">
        <h2>Artikel-Ansicht</h2>
        <section class="card">
           
                <h2><?= safe($post->posts_header) ?></h2>
                <h5 class="text-muted">Created: <?= safe($post->posts_created_at) ?> | Updated: <?= safe($post->posts_updated_at) ?></h5>
                <hr>
                <img src="images/<?= safe($post->posts_image ?: '../images/placeholder.png') ?>" alt="Post image"> 
                <hr>
                <?= $post->posts_content ?>

        </section>
        
        <div style="display: flex; justify-content: space-between; margin: 1rem 0 1rem 0;">
            <a href="index.php" class="button">< Zurück zur Startseite</a>
            <?php if(is_logged_in()): ?>
                <div>
                    <a href="posts/edit.php?id=<?= (int)$id ?>" class="button text-danger">Bearbeiten</a>
                    <a href="posts/delete.php?id=<?= (int)$id ?>" onclick="return confirm('Sind Sie sicher, dass Sie diesen Eintrag löschen möchten?');" class="button-danger text-danger">Löschen</a>
                </div>
            <?php else: ?>
                <!--  -->
            <?php endif; ?>    
            
        </div>
        
    </main>
<?php include_once __DIR__ . '/footer.php' ?>