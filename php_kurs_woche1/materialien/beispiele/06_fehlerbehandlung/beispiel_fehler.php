<?php
    declare(strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fehlerbeispiele</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <h1> Fehler Beispiele </h1>
    </header>
    <main class="container">
    
    <?php
        /*
        * Fehler-Kategorien
        * ! Fehler (Error, Parse Error, Fatal Error)
        *  Schwerwiegende Fehler, die die Ausführung des Skripts stoppen.
        *  Brechen das Skript an der Stelle ab.
        */
        // $i = 5;
        prin_r(i); // print_r mit Tippfehler - Fatal Error
        echo "String mit \"falschen\" Zeichen"; // Parse Error durch falsche Anführungszeichen
    ?>

    
    <?php
        /*
        * ! Warnung
        * Wichtige Informationen - möglichst bald beheben.
        * Skripte werden trotzdem bis zum Ende ausgeführt.
        */
        echo '<p>Der Wert der Variable $i istÖ: ' . $i . '</p>'; // Warnung: Undefined Variable
        /** 
         * ! Notizen 
         * Ebenfalls möglischst bald beheben.
        */
    ?>

    <?php
        /*
        * Kann der Parser nicht erkennen.
        */
        $z = 2;
        // Yoda-Notation hilft der Fehler gemeldet zu werden
        if ( 1 === $z ) {
            echo "<p>Treffer</p>";
        } else {
            echo "<p>Leider nicht getroffen</p>";
        }
        
        
    ?>


    </main>
</body>
</html>