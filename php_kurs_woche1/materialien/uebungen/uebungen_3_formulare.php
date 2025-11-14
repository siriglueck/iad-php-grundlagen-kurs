<?php
    
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

$name = $_POST['name'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$postcode = $_POST['postcode'] ?? '';
$street = $_POST['street'] ?? '';
$city = $_POST['city'] ?? '';
$number = $_POST['number'] ?? '';
$error = '';

// Prüfe, ob diese Datei über ein Formular aufgerufen wurde
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
  echo '<pre>', print_r( $_POST ), '</pre>';
  // Prüfe, ob alle Felder ausgefüllt sind
  if ( $name === '' || $msg === '' ){
    $error = 'Bitte alle Felder ausfüllen.';
  } 

  function quadrat( $num ) {
    return $num * $num;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Übungen</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <header><h1>PHP-Übungen</h1></header>
    <main class="container">
        <h2>Übung 13 u_eingabe</h2>
        <?php if( $error ): ?><p class="alert"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    
        <div class="container">
            <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post" class="card">
                <label for="firstname">Vorname</label>
                <input type="text" name="firstname" id="firstname">
        
                <label for="lastname">Nachname</label>
                <input type="text" name="lastname" id="lastname">

                <label for="street">Straße</label>
                <input type="text" name="street" id="street">

                <label for="postcode">Postleitzahl</label>
                <input type="number" name="postcode" id="postcode">

                <label for="city">Ort</label>
                <input type="text" name="city" id="city">

                <hr>
                <button type="submit" class="button">Senden</button>
                <hr>
                <button type="reset" class="button">Zurücksetzen</button>
              

            </form>

            <p class="card">
            <?= "Hallo $name $lastname, Ihre Adresse lautet: $street, $postcode $city." ?>
            </p>

            <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post" class="card">

                <label for="postcode">Zahl</label>
                <input type="number" name="number" id="number">

                <button type="submit" class="button">Senden</button>
            </form>

            <?php if( $number ): ?>
                <p class="alert">
                <?= "Das Quadrat von $number ist " . quadrat($number) ?>
                </p>
            <?php endif; ?>
    
        </div>
    </main>
</body>
</html>