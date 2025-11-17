<?php
    declare(strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();
    include_once 'honig.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u_formulare</title>
    <link rel="stylesheet" href="../materialien/style/style.css">
</head>
<body>
    <header>
        <h1>Übung: Honigbestellung</h1>
    </header>
    <main class="container">
        <p>Bitte geben Sie die Bestellmenge an (Einheit: 500-g-Glas): </p>
        <form action="u_bestellung.php" method="post">
             <table>
                <tr>
                    <th>Honig</th>
                    <th>Menge</th>
                </tr>
                <?php
                /**
                * Schleife über das Array der Honig
                * */
                
                foreach( $array_honig as $artnr => $artikel ):
                ?>
                <tr>
                    <td><?= $artikel ?></td>
                    <td><input type="number" name="<?= $artnr ?>" value="<?= $_SESSION[$artnr] ?? 0 ?>" size="5" ></td>
                </tr>
                <?php endforeach ?>
            
                <tr>
                    <td colspan="2">
                        <button style="" type="submit">Abschicken</button>
                    </td>
                </tr>

            </table>
        </form>
    </main>
    
</body>
</html>