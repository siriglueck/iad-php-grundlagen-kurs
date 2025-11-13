<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
//echo '<pre>', print_r( $_POST ), '</pre>';

$name = $_POST['name'] ?? '';
$msg = $_POST['msg'] ?? '';
$error = '';

// Prüfe, ob diese Datei über ein Formular aufgerufen wurde
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
  // echo '<pre>', print_r( $_POST ), '</pre>';
  // Prüfe, ob alle Felder ausgefüllt sind
  if ( $name === '' || $msg === '' ){
    $error = 'Bitte alle Felder ausfüllen.';
  } 
}

?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Formular Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Formular & Validierung</h1></header>
  <main class="container">
    <?php if( $error ): ?><p class="alert"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post" class="card">
      
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>">

      <label for="msg">Nachricht:</label>
      <textarea id="msg" name="msg" rows="4"><?= htmlspecialchars($msg) ?></textarea>

      <button type="submit">Absenden</button>
    </form>
    <?php if( isset( $_POST ) && !$error ): ?>
      <hr>
      <h2>Ausgabe</h2>
      <p><b><?= htmlspecialchars($name) ?>: </b> <br> <?= nl2br(htmlspecialchars($msg)) ?></p>
    <?php endif; ?>
  </main>
</body>
</html>
