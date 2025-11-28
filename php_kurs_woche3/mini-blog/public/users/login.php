<?php 
include_once '../header.php'; 
include_once '../../inc/functions.php';

$error = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $u = trim($_POST['username'] ?? '');
  $p = (string)($_POST['password'] ?? '');



  if($u !== '' && $p !== '') {
    $result = authenticate($pdo, $u, $p);
    echo '<pre>', var_dump( $result ), '</pre>';
    if( $result ) {
      $_SESSION['user'] = $u;
      header('Location: ' . $path . 'index.php');
      exit;
    } else {
      $error = 'Login fehlgeschlagen';
    }
  } else {
    $error = 'Bitte alle Felder ausfüllen!';
  }
}
?>
<main class="container">
    <h2>Anmelden</h2>
    <?php if($error): ?>
        <p class="alert"><?= safe($error) ?></p>
    <?php endif; ?>

    <div class="card">
      <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post">
          <label>Benutzername:
          <input type="text" name="username" required>
          </label>
          <label>Passwort:
          <input type="password" name="password" required>
          </label>
          <button type="submit">Login</button>
      </form>
    </div>

    <div style="display: flex; justify-content: space-between; margin: 1rem 0 1rem 0;">
        <a href="../index.php" class="button">Zurück zur Startseite</a>
    </div>
</main>
