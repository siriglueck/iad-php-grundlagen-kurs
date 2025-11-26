<?php
  
   declare(strict_types=1);
    //! die folgendern 2 Zeilen in der Produktiv-Variante löschen!
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake-Gif</title>
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
    <header>
        <h1>Fake-Gif</h1>
    </header>
    <main class="contianer">
        <pre>
            <?php
                // Dateiname: fakegif.gif
                // Datei erstellen
                $filename = tempnam('.','fakeimage');

                // Datei mit "magischen" Bytes und der davor gesetzten Zeichenfolge "GIF89a" füllen
                file_put_contents($filename, 'GIF89a' . random_bytes(100));
                
                echo "\nMIME-Type: ", mime_content_type($filename), "\n\n";
                echo print_r( getimagesize($filename, true) );
                echo "\n";

                // temporär erzeugte Datei löchen
                unlink($filename);
            ?>
        </pre>
    </main>
</body>
</html>