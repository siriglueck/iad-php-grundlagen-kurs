<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Funktionsdefinition
function hallo($name) {
    echo "<p>Hallo! $name aus der Funktion</p>";
}

function summe($a, $b) {
  $ergebnis = $a + $b;
  return $ergebnis;

  echo "<p>Dies wird nie ausgegeben</p>";
}

// fixe Datentypen
function brutto(float $netto, float $MSWR = 0.19):float {
  return $netto + (1 * $MSWR);
}


function ausgabe(string $name, int $alter):string {
  // Interne Funktion von PHP
  $params = func_get_args(); // alle übergebenen Parameter in einem Array
  echo '<pre>', var_dump($params) , '</pre>'; 
  
  $num_params = func_num_args(); // Anzahl der übergebenen Parameter
  echo "<p>Anzahl der übergebenen Parameter: $num_params</p>";
  
  $sex = func_get_arg(2); // einzelner Parameter
  echo "<p>Geschlecht: $sex</p>";
  
  return "$name ist $alter Jahre alt.";
}

// variadische Parameter
// nutzen ein Array als Parameter-Definition
function zeigeZutaten(...$zutaten) {
  $return = "<h3>Zutatenliste:</h3>";
  $return .= "<ul>";
  foreach ($zutaten as $zutat) {
    $return .= "<li>$zutat</li>";
  }
  $return .= "</ul>";
  return $return;
}

$person = ['Müller', 'Anna', 28, 'female'];

function personInfo(string $name, string $vorname, int $age, string $gender = 'unknown') {
  return "$vorname $name ist $age Jahre alt und hat das Geschlecht: $gender.";
}


?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Funktionen Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Funktionen</h1></header>
  <main class="container">
    <?php hallo('Siri'); ?>
    <?= ausgabe('Siri', 10, 'female', 'Thai', 555, false); ?>
    <?php
      $brutto = summe(100, 19);
      echo "<p>Netto: 100.00 € → Brutto: $brutto €</p>";
    ?>
    <p>Netto: 100.00 € → Brutto: <?= $brutto ?>  €</p>
    <p>Netto: 100.00 € → Brutto: <?= brutto(100) ?>  €</p>
    <p><?= zeigeZutaten('Butter','Mehl','Eier','Safran', 'Salz')?></p>
    <?php
    // Aufruf mit Spread-Operator
    echo personInfo(...$person);
    ?>
  </main>
</body>
</html>
