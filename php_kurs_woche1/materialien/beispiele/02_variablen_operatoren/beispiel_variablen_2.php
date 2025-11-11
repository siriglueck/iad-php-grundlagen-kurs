<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variablen Fortsetzung</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <?php 
        $einString = 'Ich bin ein String'; // Datentyp: String
        echo '<p>Der Inhalt der Variable ist:  . $einString . </p>';
        echo '<p>Der Inhalt der Variable ist: ' . $einString . '</p>';
        echo "<p>Der Inhalt der Variable ist:  $einString. </p>\r\n";
        echo '<p>Eine mit Komma getrennte Ausgabe mit mehreren Zeichenketten: ', $einString, ' ist aus einer Variable.', '</p>';

        $preisZiege = '0.5 Kamele';
        $menge = 5;
        $gesamtPreis = $preisZiege * $menge; // Achtung: PHP wandelt den String in eine Zahl um
        echo "<p>Der Gesamtpreis für $menge Ziegen beträgt $gesamtPreis Kamele.</p>";

        // ### Konstanten ###
        // klassische Variante
        define('MEINE_KONSTANTE', 'Ich bin eine Konstante');
        define('SEK_TAG', 24 * 60 *60); // Sekunden pro Tag
        // neue Variante seit PHP 5.5
        const MIN_TAG = 24 * 60;

        echo '<p> Ein Tag hat ', MIN_TAG,' Minuten. bzw. ', SEK_TAG,' Sekunden.</p>';

        // ### Verketten und Rechnen ###
        $zahl = 5;
        $nochEineZahl = 1;

        echo "<p>Die Summe der Zahlen $zahl und $nochEineZahl ergibt:" . ($zahl + $nochEineZahl) ."</p>";

    ?>
</body>
</html>