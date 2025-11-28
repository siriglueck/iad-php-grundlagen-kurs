<?php include_once __DIR__ . '/../inc/functions.php' ?>

<header>
    <nav>
        <div class="container">
            <h1>Mini-Blog</h1>
            <ul>
                <!-- <li><a href="">User-Verwaltung</a></li> -->
                <?php if(is_logged_in()): ?>
                    <li><a href="<?= $path ?>password_change.php">Passwort ändern</a></li>
                <?php else: ?>
                    <li><a href="<?= $path ?>register.php">Registrieren</a></li>
                <?php endif; ?>
                <div class="text-muted">
                    <?php if(!empty($_SESSION['user'])): ?>
                        Eingeloggt als <strong><?= safe($_SESSION['user']) ?></strong> - <a href="<?= $path ?>users/logout.php">Logout</a>
                    <?php else: ?>
                        <a href="<?= $path ?>users/login.php">Login</a>
                    <?php endif; ?>
                </div>
            </ul>
        </div>
    </nav>
</header>