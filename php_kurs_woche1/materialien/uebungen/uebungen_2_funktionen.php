<?php
    declare(strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
   
    function vermerk(string $name): string {
        return '<table border="1"><tr><td> Dieses Programm wurde geschrieben von ' . $name . '</td></tr></table>' ;
    }

    function vermerk2(string $name, string $surname, string $department): string {
        $ausgabe = '<table border="1"><tr><td>';
        $ausgabe .= 'Programmteil von: ' . $name . ' ' . $surname . ', Abteilung: ' . $department . '<br>';
        $ausgabe .= 'Email: ' . $name . '.' . $surname . '@' . $department . '.' . 'phpdevel.de';
        $ausgabe .= '</td></tr></table>';
        return $ausgabe;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übungen - Funktionen</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <header><h1>PHP-Übungen</h1></header>
    <main class="container">
   
        <h2>Übung 5 u_funktion_einfach</h2>
        <div class="container">
            <?= 'Anfang des Programms'  ?>
            <?= vermerk('Siri'); ?>
            <?= 'Mitte des Programms'  ?>
            <?= vermerk('Siri'); ?>
            <?= 'Ende des Programms'  ?>
        </div>

        <h2>Übung 6 u_funktion_parameter1</h2>
        <div class="container">
            <?= vermerk('Siri') ?>
            <?= vermerk('Max Mustermann') ?>
        </div>

        <h2>Übung 7 u_funktion_parameter2</h2>
        <div class="container">
            <?php
                function quadrat(float $zahl): float {
                    return $zahl * $zahl;
                }
            ?>
            <p><?= 'Das Quadrat von 3  ist '. quadrat(3); ?></p>
            <p><?= 'Das Quadrat von 3.2 ist '. quadrat(3.2); ?></p>
            <p><?= 'Das Quadrat von -5 ist '. quadrat(-5); ?></p>
            <p><?= 'Das Quadrat von 83373 ist '. quadrat(83373); ?></p>
        </div>

        <h2>Übung 8 u_funktion_mehrere1</h2>
        <div class="container">
            <?php
                function mittel(float $a, float $b, float $c): string {
                    $mittelwert = ($a + $b + $c) / 3;
                    return "Der Mittelwert von $a $b $c ist $mittelwert <br>";
                }
            ?>
            <?= mittel(4, 7, 6); ?>
            <?= mittel(44, 67.5, 1); ?>
            <?= mittel(-5, 0, -13); ?>
            <?= mittel(0.001, 0.0081, 0.0032); ?>
            <?= mittel(5, 8, 2); ?>
        </div>

        <h2>Übung 9 u_funktion_mehrere2</h2>
        <div class="container">
            <?= vermerk2('Bodo', 'Berg', 'FE2'); ?>
            <?= vermerk2('Hans', 'Heim', 'SU3'); ?>
        </div>

        <h2>Übung 10 u_funktion_rueckgabewert</h2>
        <div class="container">  
        <?php
            function bigger($a, $b) {
                if ($a > $b) {
                    return "Maximun: $a";
                } else {
                    return "Maximun: $b";
                }
            }
        ?>
            <?=  bigger(4, 7); ?><br>
            <?=  bigger(8, 2); ?><br>
        </div>

        <h2>Übung 11 u_funktion_referenz</h2>
        <div class="class">
            <?php

                
                
            ?>
        </div>

    </main>
</body>
</html>