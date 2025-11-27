<?php
    declare(strict_types=1);
    //! die folgendern 2 Zeilen in der Produktiv-Variante löschen!
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require_once __DIR__ . '/../inc/db-connect.php';
    require_once __DIR__ . '/../inc/functions.php';

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $post = $id ? findPost($pdo, $id) : null;

    if(!$post) {
        header('Location: index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel-Ansicht</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Mini-Blog</h1>
        </div>
    </header>
    <main class="container">
        <h2>Artikel-Ansicht</h2>
        <section class="card">
           
                <h2><?= safe($post->posts_header) ?></h2>
                <h5 class="text-muted">Created: <?= safe($post->posts_created_at) ?> | Updated: <?= safe($post->posts_updated_at) ?></h5>
                <hr>
                <img src="<?= safe($post->posts_image ?: '../images/placeholder.png') ?>" alt="Post image"> 
                <hr>
                <?= $post->posts_content ?>

        </section>
        
        <div style="display: flex; justify-content: space-between; margin: 1rem 0 1rem 0;">
            <a href="" class="button text-danger">Bearbeiten</a>
            <a href="index.php" class="button">Zurück zur Startseite</a>
        </div>
        
    </main>
</body>
</html>