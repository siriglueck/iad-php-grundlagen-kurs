<?php
    declare(strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();
    include_once 'honig.inc.php';

    // To check if it is posted
    $isSubmitted = ($_SERVER["REQUEST_METHOD"] === "POST");

    $vorname = $_POST['vorname'] ?? '';
    $nachname = $_POST['nachname'] ?? '';
    $ort = $_POST['ort'] ?? '';
    $email = $_POST['email'] ?? '';
    $error = '';

    // To delete session after clicked the link
    if (isset($_GET['reset'])) {
        session_unset();
        session_destroy();
        session_start(); // re-create a new session, prevent error
        echo '<p>Session wurde gelöscht!</p>';
        header("Location: u_formular.php");
    exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u_abschluss</title>
    <link rel="stylesheet" href="../materialien/style/style.css">
</head>
<body>
    <header>
        <h1>Honigbestellung - Abschluss</h1>
    </header>
    <main class="container">
        <?php if (!$isSubmitted): ?>
            <p>Bitte geben Sie noch Ihre Kontaktdaten ein: </p>
            <form action="<?= $_SERVER["REQUEST_METHOD"] == "POST" ?>" method="post">
                <label for="vorname">Vorname</label>
                <input type="text" name="vorname">

                <label for="nachname">Nachname</label>
                <input type="text" name="nachname">

                <label for="ort">Wohnort</label>
                <input type="text" name="ort">

                <label for="email">Mailadresse</label>
                <input type="email" name="email">

                <button type="submit">Abschicken</button>

            </form>
        <?php else: ?>
            <div class="card">
                <?php foreach( $_SESSION as $name => $menge ): ?>
                    <?php
                        if ($menge > 0) {
                            echo $name ." : ". $menge . " Gläser </br>";
                        }
                    ?>
                <?php endforeach ?>
                <?php echo 'Vorname : ' . htmlspecialchars($vorname); ?><br>
                <?php echo 'Nachname : ' . htmlspecialchars($nachname); ?><br>
                <?php echo 'Wohnort : ' . htmlspecialchars($ort); ?><br>
                <?php echo 'Email : ' . htmlspecialchars($email); ?><br>
            
            </div>

            <p>Damit ist die Session beendet. <a href="?reset=1">Klicken Sie hier</a>, um eine neue Session zu beginnen.</p>
            <a href="u_formular.php">Zurück zur Startseite</a>
        <?php endif; ?>


    </main>
    
</body>
</html>