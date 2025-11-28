<?php
    declare(strict_types=1);
    //! die folgendern 2 Zeilen in der Produktiv-Variante löschen!
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require_once  __DIR__ . '/../header.php';
    require_once  dirname(__DIR__) . '/../inc/functions.php';
    require_once  dirname(__DIR__) . '/../inc/db-connect.php';

    $error = '';

    $id = (int)($_GET['id'] ?? 0);
    $post = $id ? findPost($pdo, $id) : null;
    
    //wenn $note null ist,
    if(!$post) {
        header('Location: index.php');
    exit;
    }
?>
    <main class="container">
        <h2>Eintrag bearbeiten</h2>
        <section class="card">
           <section class="card">
            <?php if($error): ?>
                <p class="alert"><?= safe($error) ?></p>
            <?php endif; ?>

            <!-- Form -->
            <form action="edit.inc.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= (int)$id ?>">
                <input type="hidden" name="old_image" value="<?= safe($post->posts_image ?? '') ?>">

                <label>Titel:
                    <input type="text" name="title" value="<?= safe($post->posts_header) ?>" required>
                </label>

                <label>Bild:
                    <input type="file" name="image" accept="image/gif,image/jpeg,image/png,image/webp">
                </label>
                <?php if(!empty($post->posts_image)): ?>
                    <img src="../images/<?= safe($post->posts_image) ?>" alt="" width="200">
                <?php endif; ?>

                <label>Inhalt:
                    <textarea name="content" rows="10" required><?= safe($post->posts_content) ?></textarea>
                </label>

                <label>Kategorie:
                    <select name="category_id">
                        <option value="" disabled <?= ($post->posts_categ_id_ref === null) ? 'selected' : '' ?>>- keine -</option>
                        <?php foreach ($pdo->query('SELECT categ_id, categ_name FROM tbl_categories ORDER BY categ_name') as $cat ): ?>
                            <option value="<?= (int)$cat->categ_id ?>" <?= ($post->posts_categ_id_ref ?? null) == $cat->categ_id ? 'selected' : '' ?>>
                                <?= safe($cat->categ_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <button type="submit">Bearbeiten</button>
            </form>

        </section>

        </section>
        
        <div style="display: flex; justify-content: space-between; margin: 1rem 0 1rem 0;">
            <a href="../post_single.php?id=<?= (int)$id ?>" class="button">< Zurück zur Startseite</a>
        </div>
        
    </main>
<?php include_once __DIR__ . '/../footer.php' ?>