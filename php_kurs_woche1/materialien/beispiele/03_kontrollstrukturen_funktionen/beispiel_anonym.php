<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anonyme Funktionen</title>
</head>
<body>
    <header>
        <h1>Anonyme Funktionen</h1>
        <link rel="stylesheet" href="../../style/style.css">
    </header>
    <main>
        <h2>Definitionen ohne Funktionsbezeichner</h2>
 
        <?php
        $hallo = function($n){
            return "Hallo $n!";
        };
        ?>
        <p><?= $hallo('Marcus'); ?></p>
 
        <?php $gruss = $hallo; ?>
 
        <p><?= $gruss('Anna'); ?></p>
 
        <h2>Pfeilfunktionen</h2>
 
        <?php
        $summe = fn($a, $b) => $a + $b;
        ?>
 
        <p><?= $summe(37.5, 5); ?></p>
 
        <h2>Callback-Funktionen</h2>
 
        <?php
       
        // normale Funktionsdefinition
        function halbiert($x) {
            return $x / 2;
        }
 
        function ausgabe($von, $bis, $schritt, $fkt) {
            $ausg = '<p>';
            for($i = $von; $i < $bis; $i += $schritt) {
                $ausg .= $fkt($i) . ', ';
            }
            $ausg .= '</p>';
            return $ausg;
        }
        ?>
 
        <!-- Übergabe der Funktion als Parameter -->
        <p><?= ausgabe(5, 14, 2, 'halbiert'); ?></p>
   
        <!-- Übergabe als anonyme Funktion -->
        <p><?= ausgabe(2, 20, 3, function($x) {
            return $x / 4;
        }); ?>
        </p>
 
    </main>
</body>
</html>