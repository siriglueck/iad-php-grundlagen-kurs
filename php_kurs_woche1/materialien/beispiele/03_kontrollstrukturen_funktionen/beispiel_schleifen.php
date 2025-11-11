<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schleifen</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header><h1>Schleifen</h1></header>
    <main class="container">
        <h2>1. Die <code>while</code>-Schleifen</h2>
        <h3>1.1 kopfgesteuert</h3>
        <?php         
            $counter = 1;
            echo '<p>Ausgabe mit kopfgesteuerter while-Schleife:</p><ul>';
            while ($counter <= 5) {
                echo "<li>Dies ist Durchlauf Nummer $counter</li>";
                $counter++;
            }
            echo '</ul>';            
        ?>

        <h3>1.2 fußgesteuert</h3>
        <p> Es wird zumindest 1 mal durchgeführt. </p>
        <?php
            echo '<p>Ausgabe mit fußgesteuerter do-while-Schleife:</p><ul>';
            do {
                echo "<li>Dies ist Durchlauf Nummer $counter</li>";
                $counter++;
            } while ($counter <= 5);
            echo '</ul>';
        ?>

        <h2>2. Die <code>for</code>-Schleife</h2>
        <?php
            echo '<p>Ausgabe mit for-Schleife:</p><ul>';
            for ($i = 25; $i >= 10; $i -= 3) {

                echo "<li style='font-size: ${i}px'> Schriftgröße ist $i</li>";
            }
            echo '</ul>';
        ?>

        <h2>3. <code>Break</code> und <code>Continue</code></h2>
        <?php
            $budget = 50;
            $einzelPreis = 6;
            $menge = 1;
            echo '<p>Ausgabe mit break:</p><ul>';
            while( $menge <= 15 ) {
                $gesamtPreis = $einzelPreis * $menge;
                if ( $gesamtPreis > $budget ) {
                    echo "<li>Budget von $budget Kamele überschritten bei Menge $menge (Gesamtpreis: $gesamtPreis Kamele). Abbruch der Schleife.</li>";
                    break; // Schleife beenden, wenn Budget überschritten ist
                }
                echo "<li>Für Menge $menge beträgt der Gesamtpreis: $gesamtPreis Kamele.</li>";
                $menge++;
            }
            echo '</ul>';
         ?>
         <?php
            echo '<p>Ausgabe mit continue:</p><ul>';
            $z = 5;
            for ( $n = -2; $n <= 2; $n++ ) {
                if ( $n === 0 ) {
                    echo "<li>Division durch Null ist nicht erlaubt. Überspringe n=$n.</li>";
                    continue; // überspringe den aktuellen Schleifendurchlauf
                }
                $erg = $z / $n;
                echo "<li>$z / $n = $erg.</li>";
            }
            echo '</ul>';
            
         ?>
    </main>
</body>
</html>