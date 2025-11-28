<?php
    
    require_once  __DIR__ . '/../header.php';
    require_once  dirname(__DIR__) . '/../inc/functions.php';

    
?>
    <main class="container">
        <h2>Eintrag anlegen</h2>
        <section class="card">
           <?php if($error): ?>
                <p class="alert"><?= safe($error) ?></p>
            <?php endif; ?>

            <!-- Form -->
            <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post">
                <label>Titel:
                    <input type="text" name="title" required value="<?= safe($username) ?>">
                </label>
                <!-- <label>Inhalt:
                    <input type="password" name="password" required>
                </label> -->
                <!-- <label>Bild:
                    <input type="password" name="password_repeat" required>
                </label> -->
            <button type="submit">Registrieren</button>
        </form>

        </section>
        
        <div style="display: flex; justify-content: space-between; margin: 1rem 0 1rem 0;">
            <a href="../index.php" class="button">Zurück zur Startseite</a>
        </div>
        
    </main>
<?php include_once __DIR__ . '/../footer.php' ?>