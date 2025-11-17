<?php
    declare(strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();
    include_once 'honig.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u-bestellung</title>
    <link rel="stylesheet" href="../materialien/style/style.css">
</head>
<body>
    <header>
        <h1>Honigbestellung</h1>
    </header>
    <main class="container">
        <?php
            
            /**
             * Das superglobale Array $_SESSION wird mit den Werten des Formulars und dem aktuellen Zeitstempel gefüllt
             */
            $_SESSION['Akazienhonig'] = $_POST['h-1'];
            $_SESSION['Heidehonig'] = $_POST['h-2'];
            $_SESSION['Kleehonig'] = $_POST['h-3'];     
            $_SESSION['Tannenhonig'] = $_POST['h-4'];     
        ?>

        <?php
            //echo '<pre>', print_r($_SESSION, true) , '</pre>';
        ?>

        <div class="card">
            <p>Sie haben folgende Mengen bestellt:</p>
            <?php foreach( $_SESSION as $name => $menge ): ?>
                <?php
                    if ($menge > 0) {
                        echo $name ." : ". $menge . " Gläser </br>"; 
                    }
                ?>
            <?php endforeach ?>
            <p>Die Session-ID lautet <strong> <?= session_id(); ?> </strong></p>
        </div>

        <p> <a href="u_abschluss.php">Weiter zur Eingabe persönlicher Daten</a> und dem Abschluss Bestellung</p>

    </main>
</body>
</html>