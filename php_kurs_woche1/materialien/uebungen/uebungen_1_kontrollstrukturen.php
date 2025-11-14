<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übungen - Kontrollstrukturen</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <header><h1>PHP-Übungen</h1></header>
    <main class="container">
        <!-- K3 -->
        <h2>Übungen K3</h2>
        <div class="container">
            <?php
                $bezeichnung_tisch = 'Schreibtisch';
                $bezeichnung_stuhl = 'Bürostuhl';
                $bezeichnung_lampe = 'Schreibtischlampe';
                $bezeichnung_pctisch = 'Computertisch';
                $preis_tisch = 1999;
                $preis_stuhl = 589;
                $preis_lampe = 29;
                $preis_pctisch = 999;
                $MWST = 0.19; // 19% Mehrwertsteuer
                $netto_gesamt = $preis_tisch + $preis_stuhl + $preis_lampe + $preis_pctisch;
                $brutto_gesamt = $netto_gesamt * (1 + $MWST);
                $EURO = 'Euro';

                echo "<h3>Mit Variablen, Opearatoren und Konstanten arbeiten</h3>";
                echo "<p>Netto-Gesamtpreis der eingekauften Artikel: $netto_gesamt $EURO. </p>";
                echo "<p>Brutto-Gesamtpreis der eingekauften Artikel: $brutto_gesamt $EURO. </p>";
                echo "<hr>";
                echo "<p>Brutto-Preis <strong>" .$bezeichnung_tisch. "</strong>: " .($preis_tisch * (1 + $MWST)). " $EURO .</p>";
                echo "<p>Brutto-Preis <strong>" .$bezeichnung_stuhl. "</strong>: " .($preis_stuhl * (1 + $MWST)). " $EURO .</p>";
                echo "<p>Brutto-Preis <strong>" .$bezeichnung_lampe. "</strong>: " .($preis_lampe * (1 + $MWST)). " $EURO .</p>";
                echo "<p>Brutto-Preis <strong>" .$bezeichnung_pctisch. "</strong>: " .($preis_pctisch * (1 + $MWST)). " $EURO .</p>";
            ?>
        </div>
        <!-- K4 -->
        <h2>Übungen K4</h2>
        <div class="container">
            <h3>Übung 1 & 2 Switch mit Schleifen</h3>
            <?php
                $note = 10;
                while ($note >= 0) {
                    echo "<p>$note Punkte ergeben folgende Bewertung: ";
                    switch ($note) {
                        case 10:
                            echo "Sehr gut";
                            break;
                        case 9:
                            echo "Gut";
                            break;
                        case 8:
                            echo "Befriedigend";
                            break;
                        case 7:
                            echo "Ausreichend";
                            break;
                        default:
                            echo "Leider zu weniger Punkte erreicht";
                    }
                    echo "</p>";
                    $note--;
                }
            ?>
            <h3>Übung 3 while und do-while</h3>
            <?php
                echo "<p>while-schleifen (Startwert: 1)</p>";
                $zahl = 20;
                while ($zahl < 20) {
                    echo " $zahl </br>";
                    $zahl++;
                }
                echo "<hr>";
                echo "<p>do-while-schleifen (Startwert: 1)</p>";
                $zahl = 20;
                do {
                    echo " $zahl </br>";
                    $zahl++;
                } while ($zahl < 20);
                
            ?>
        </div>
        
        <!-- PHP -->
        <h2>PHP-Übungen</h2>
        <div class="container">
            <h3>Übung 1 u_for</h3>
            <?php
                $n = 13;
                while ($n <= 29) {
                    echo " $n";
                    $n += 4;
                }
                echo '<br>';
            ?>
            <?php
                for ($i = 2; $i >= -1; $i -= 0.5) {
                    echo " $i";
                }
                echo '<br>';
            ?>
            <?php
                $n = 2000;
                do {
                    echo " $n";
                    $n += 1000;
                } while ($n <= 6000);
                echo '<br>';
            ?>
            <?php
                for ($i = 5; $i <= 13; $i += 2) {
                    echo "Z$i ";
                }
                echo '<br>';
            ?>
            <?php
                for ($i = 1; $i <= 3; $i++) {
                    echo "a b$i ";
                }
                echo '<br>';
            ?>
            <?php
                for ($a = 1; $a <= 3; $a++) {
            
                    for ($b = 2; $b <= 3; $b++) {
                        if ($a > 1) {
                            echo "c";
                            if ($a === 2) { echo "1"; }
                            if ($a === 3) { echo "2"; }
                            echo "$b ";
                        } else {
                            echo "c$b ";
                        }
                    }
                }
                echo '<br>';
            ?>
            <?php
                $num = 13;
                for ($i = 1; $i <= 7; $i++) {
                    echo " $num";
                    if ($i === 3) {
                        $num += 12;
                        continue; // überspringt den Rest des Codes in dieser Iteration, wenn $i gleich 2 ist
                    }
                    $num += 4;
                }
                echo '<br>';
                echo "<br>";
            ?>
            <h3>Übung 2 u_for_schachtel</h3>
            <?php
                for ($l = 1; $l <= 10; $l++) {
                    for ($i = 1; $i <= 10; $i++) {
                        echo "" .($i * $l). " ";
                    }
                    echo '<br>';
                }
                echo '<br>';
            ?>
            <h3>Übung 3 u_tabelle</h3>
            <?php
                echo '<table border="1" cellpadding="2" cellspacing="1">';
                for ($l = 1; $l <= 10; $l++) {
                    echo '<tr>';
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<td>" .($i * $l). "</td>";
                    }
                    echo '</tr>';
                }
                echo '</table>';
                echo "<br>";
            ?>
            <h3>Übung 4 u_while</h3>
            <?php
                $P1 = 0;
                $P2 = 0;
                echo '<table border="1" cellpadding="2" cellspacing="1">';
                echo '<tr> <th>Spieler 1</th> <th>Spieler 2</th> </tr>';
                    while ($P1 <= 25 || $P2 <= 25) {
                            $randNum = rand(1, 6);
                            $P1 += $randNum;
                            echo "<tr><td>$P1</td>";
                            $randNum = rand(1, 6);
                            $P2 += $randNum;
                            echo "<td>$P2</td></tr>";
                            if ($P1 >= 25) {
                                echo '</table>';
                                echo "<p><strong>Spieler 1 hat gewonnen!</strong></p>";
                                break;
                            } elseif ($P2 >= 25) {
                                echo '</table>';
                                echo "<p><strong>Spieler 2 hat gewonnen!</strong></p>";
                                break;
                            }
                    } ;
            ?>
        </div>

    </main>
</body>
</html>