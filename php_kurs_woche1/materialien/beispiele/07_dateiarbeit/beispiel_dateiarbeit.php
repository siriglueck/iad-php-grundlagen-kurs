<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mit externen Dateien und Verzeichnissen arbeiten</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <h1>Datei- und Verzeichnisarbeit</h1>
    </header>
    <main class="container">
        <h2>Datei mit den Dateifunktionen lesen</h2>
        <div class="card">
            <?php
                $file = 'user.txt';
                // 1. Prüfe, ob der Pfad existiert und ob es sich dabei um eine Datei handelt
                if( file_exists($file) && is_file($file) ) {
                    // 2. Datei öffnen
                    $fh = fopen($file, 'r'); // r - read, chmod Modi Rechte
                }
            
                // 3. Schleife über alle Zeilen der Datei
                // fh = file handler
                while( ! feof ($fh) ) {
                    // 4. Zeilenweise lesen
                    $row = fgets( $fh ); // liest genau eine Zeile einer Datei
                    echo "$row<br>";
                }
                // 5. Datei schließen
                fclose( $fh );
            ?>
        </div>
        <br>
        <h2>Die Funktionen <code>readfile()</code> und <code>file()</code></h2>
        <div class="card">
            <?php
                /**
                 * ? readfile()
                 * liest eine Datei komplett und gibt sie ohne weitere Bearbeitungsmöglichkeit direkt im Browser aus
                 */
                readfile($file);

                /**
                 * ? file()
                 * liest ebenfalls eine komplette Datei ein, gibt aber ein Array zurück in welchem jedes Array-Element eine Zeile dieser Datei repräsentiert
                 */
                $filecontent = file($file);
                $i = 1;
                echo '<p>';
                foreach( $filecontent as $row) {
                    echo 'Zeile ' . $i++ . ': ' . $row . '<br>';
                } 
                echo '</p>';
            ?>
        </div>
        <br>
        <h2>Lesen mit <code>file_get_contents()</code></h2>
        <div class="card">
            <?php
                /**
                 * 
                 */
                
                $content = nl2br(file_get_contents( $file ));
                echo "<p>$content</p>";
                              
            ?>
        </div>
        <br>
        <h2>In Dateien schreiben</h2>
        <div class="card">
            <?php
                $fh = fopen('bestellungen.txt', 'a'); // a - append 
                if( $fh === false ) {
                    echo '<p>Die Datei konnte nicht zum Schreiben geöffnet werden.</p>';
                    die('<p>Das Programm wird geschlossen</p>');
                }
            
                $name = 'Donald Duck';
                $strasse = 'Entenweg 35';
                $ort = '45 Entenhausen';

                if( fwrite( $fh , "$name\r\n$strasse\r\n$ort") ) {
                    echo "<p>Folgenden Daten wurden geschrieben: $name, $strasse, $ort</p>";
                } else {
                    echo '<p>Das Schreiben der Datei ist fehlgeschlagen.</p>';
                }

                fclose($fh);
            ?>
        </div>
        <br>
        <h2>Die Funktion <code>file_put_contents()</code></h2>
        <div class="card">
            <?php
                $file = "text.txt";
                if( file_put_contents( $file , "Irendwelche Daten\r\n" ) ) {
                    echo '<p class="good"> Schreiben erfolgreich. 😊 </p>';
                } else {
                    echo '<p class="good"> Schreiben war nicht erfolgreich. 😖 </p>';
                }

                if( file_put_contents( $file , "Noch mehr Daten\r\n" ) ) {
                    echo '<p class="good"> Schreiben erfolgreich. 😊 </p>';
                } else {
                    echo '<p class="good"> Schreiben war nicht erfolgreich. 😖 </p>';
                }
          
                if( file_put_contents( $file , "Weitere Daten\r\n", FILE_APPEND ) ) {
                    echo '<p class="good"> Schreiben erfolgreich. 😊 </p>';
                } else {
                    echo '<p class="good"> Schreiben war nicht erfolgreich. 😖 </p>';
                }
            ?>
        </div>
    </main>
</body>
</html>