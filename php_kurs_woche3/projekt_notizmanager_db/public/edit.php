<?php
    require_once 'header.php';

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $note = $id ? findNote($pdo, $id) : null;
    
    //wenn $note null ist,
    if(!$note) {
        header('Location: index.php');
        exit;
    }
?>

    <main class="container">
        <section class="card">
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?= (int)$note->id ?>">
                <label for="">Titel <input type="text" name="title" value="<?= safe($note->title) ?>"  required></label>
                <label for="">Inhalt <textarea name="content" rows="10" required><?= safe($note->content) ?></textarea></label>
                <label for="">Kategorie
                    <select name="category_id">
                        <?php foreach ($pdo->query('SELECT id, name FROM categories ORDER BY name') as $cat ): ?>
                            <option value="<?= (int)$cat->id ?>" <?= ($note->category_id ?? null) == $cat->id ? 'selected' : '' ?> ><?= safe($cat->name) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <button type="submit">Speichern</button>
                <a href="index.php" class="button">Abbrechen</a>
            </form>
        </section>
    </main>
</body>
</html>