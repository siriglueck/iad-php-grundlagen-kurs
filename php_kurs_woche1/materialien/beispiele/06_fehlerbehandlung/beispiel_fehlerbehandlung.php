<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fehlerbehandlung</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <h1>Fehlerbehandlung</h1>
    </header>
    <main class="container">
        <div class="card">
            <?php
                // $x = 42;
                // Variable unbekannt
                try {
                    if( !isset($x) ) {
                        // Anweisung, wenn die Variable nicht existiert
                        throw new Exception();
                    }
                    echo "<p>Variable: $x</p>";
                } catch  ( Exception $err ) {
                    echo '<p class="bad"><b>Oops</b>';
                    echo $err->getMessage() . '<br>';
                    echo 'Weitere mögliche Meldungen</p>';
                    echo '<pre>', var_dump( $err ) ,'</pre>';
                } finally {
                    echo '<p>Ausgabe von Anweisungen, egal ob die Ausnahme geworfen wurde oder nicht.</p>';
                }
            ?>
        </div>

        <div class="card">
            <?php
                // Division durch 0
                $x = 42;
                $y = 0;
                try {
                    if ( $y === 0 ) {
                        throw new Exception("Division $x : $y nicht erlaubt");
                    }
                    $z = $x / $y;
                    echo "Division: $x / $y = $z <br>";
                } catch (Exception $e) {
                    echo $e->getMessage() . '<br>';
                }
            
            ?>
        </div>

        <div class="card">
        <?php
            function testFkt() {echo "<p>testFkt</p>";}

            // Zugriff auf unbekannte Funktion
            try {
                if( ! function_exists('testFkt') ) {
                    throw new Exception('<p>Funktion "testFkt" unbekannt<br>');
                }
                testFkt(); 
            }
            catch ( Exception $e) {
                    echo $e->getMessage() . '</p>';
            }        
        ?>
        </div>
    </main>
</body>
</html>