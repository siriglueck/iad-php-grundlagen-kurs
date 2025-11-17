<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auslesen der Session-Daten</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <h1>Auslesen der Session-Daten</h1>
    </header>
    <main class="container">
        <p>
            Folgende Daten wurden gespeichert: <br>
            <?php 
                foreach($_SESSION as $key => $value) {
                    echo "$key: $value <br>";
                }    
            ?>
        <p>Weiter zu <a href="session-start.php">starten Seite</a></p>

        </p>
    </main>
</body>
</html>