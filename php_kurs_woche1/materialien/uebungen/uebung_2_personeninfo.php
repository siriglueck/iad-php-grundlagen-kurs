<?php
declare(strict_types=1);
/**
 * Aufgabe:
 * 1) Lege Variablen für name, alter, stadt an.
 * 2) Gib einen formatierten Satz aus (HTML + CSS).
 * 3) Bonus: Rechne ein Geburtsjahr aus.
 */

$name = 'Siri';
$age = 34;
$city = 'Erfurt';
$birthYear = date('Y') - $age;
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 2 – Personeninfo</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header><h1>Übung 2 – Personeninfo</h1></header>
  <main class="container">
    <!-- TODO -->
    <p> <?= htmlspecialchars($name) ?> ist <?= $age ?> Jahre alt, wohnt in <?= htmlspecialchars($city) ?> und wurde im Jahr <?= $birthYear ?> geboren.</p>
  </main>
</body>
</html>
