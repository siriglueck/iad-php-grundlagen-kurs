<?php
    declare(strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();
    include_once 'artikel.inc.php';
    $vorname = "";
    $nachname = "";
    $ort = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasse</title>
    <link rel="stylesheet" href="../materialien/style/style.css">
</head>
<body>
    <header>
        <h1>Bestellung abschließen</h1>
    </header>
    <main class="container">

        <?php   
            // prüfe, ob das Formular bereits abgesendet wurde
            if( isset($_POST['abschliessen']) ):
                // Wenn ja, Daten speichern ...
                $vorname = $_POST['vorname'];
                $nachname = $_POST['nachname'];
                $ort = $_POST['ort'];

                // ... und die tabellatische Übersicht inkl. Adressdaten ausgeben
        ?>
        <?php endif; ?>

        <p>Sie haben folgenden Bestellung übernittelt:</p>

        <!-- Adressdaten ausgeben -->
        <p><?= $vorname ?> <?= $nachname ?> <?= $ort ?></p>

        <!-- bestellte Artikel -->
         <table>
            <tr>
                <th>Art.-Nr.</th>
                <th>Artikel</th>
                <th>Menge</th>

                <?php
                    
                // Bestellung speichern in eine CSV-Datei
                // Spaltenüberschrift der CSV-Datei
                $bestellung = "Art-Nr.;Artikel;Menge\r\n";

                // Artikel eintragen
                foreach($_SESSION as $artnr => $menge) :
                    if( str_starts_with($artnr, 'p') ) : ?>
                        <tr>
                            <td><?= $artnr ?></td>
                            <td><?= $array_pralinen[$artnr] ?></td>
                            <td><?= $menge ?></td>
                        </tr>
                        <?php $bestellung .= "$artnr;" . $array_pralinen[$artnr] . ";$menge\r\n" ?>
                    <?php endif;
                    if( str_starts_with($artnr, 's') ) : ?>
                        <tr>
                            <td><?= $artnr ?></td>
                            <td><?= $array_schoko[$artnr] ?></td>
                            <td><?= $menge ?></td>
                        </tr>
                        <?php $bestellung .= "$artnr;" . $array_schoko[$artnr] . ";$menge\r\n" ?>       
                    <?php endif; ?>
                <?php endforeach;
                    $bestellung .= "\r\nbestellt von\r\n$vorname;
                    $nachname;$ort\r\n\r\n";
                ?>
            
            </tr>
         </table>
                        

         <p>Vielen Dank für Ihren Einkauf!</p>
         <?php 
            // Bestellung speichern
            $file = __DIR__ . '/bestellung.csv';
            file_put_contents($file, $bestellung, FILE_APPEND);
            // need to give the right to the server to write this file too
            // go inside the directory then sudo chown www-data:www-data .

            // Session (Warenkorn) löschen
            $_SESSION = array();
            session_destroy();

         ?>

        <p>Bitte füllen Sie die nachfolgenden Eingabefelder aus:</p>
        <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post">
            <p>Vorname: <input type="text" name="vorname"></p>
            <p>Nachname: <input type="text" name="nachname"></p>
            <p>Wohnort: <input type="text" name="ort"></p>
            <p><button name="abschliessen" type="submit">Absenden und Bestellung abschließen</button></p>
        </form>
    </main>
</body>
</html>