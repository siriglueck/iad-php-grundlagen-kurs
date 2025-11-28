<?php
    declare(strict_types=1);

    require_once  __DIR__ . '/../header.php';
    require_once  __DIR__ . '/create.inc.php';
    require_once  dirname(__DIR__) . '/../inc/functions.php';

    $error = $title = $content = $image = $catId = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');
        $cat = $_POST['category_id'] ?? '';
        $catId = ($cat === '' ? null : (int)$cat);
        $image = trim($new_filename?? '');
        
        
        echo '<pre>', var_dump($title, $content, $catId, $image), '</pre>';
        addPost($pdo, $title, $content, $catId, $image);
        //echo var_dump($upload_dir . '<br>'. $new_filename);
        header('Location: ../index.php');
    }


?>
    <main class="container">
        <h2>Eintrag erstellen</h2>
        <section class="card">
            <?php if($error): ?>
                <p class="alert"><?= safe($error) ?></p>
            <?php endif; ?>

            <!-- Form -->
            <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">
                <label>Titel : <input type="text" name="title" required > </label>
                <label>Bild : <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <label>Wählen Sie ein Bild (*.jpg, *.png, *.gif oder *.webp) zum Hochladen aus.
                    <input name="image" type="file" accept="image/gif,image/jpeg,image/png,image/webp">
                </label>
                
                <label for="">Inhalt : <textarea name="content" rows="10" required></textarea></label>
                <label for="">Kategorie
                    <select name="category_id">
                        <option value="" disabled selected>- keine -</option>
                        <?php foreach ($pdo->query('SELECT categ_id, categ_name FROM tbl_categories ORDER BY categ_name') as $cat ): ?>
                            <option value="<?= (int)$cat->categ_id ?>"><?= safe($cat->categ_name) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
            <button type="submit" name="create">erstellen</button>
        </form>

        </section>
        
        <div style="display: flex; justify-content: space-between; margin: 1rem 0 1rem 0;">
            <a href="../index.php" class="button">Zurück zur Startseite</a>
        </div>
        
    </main>
<?php include_once __DIR__ . '/../footer.php' ?>