<?php
declare(strict_types=1);
$name = 'Siri';
$age = 10;
$lucky = 777;
$sum = $age + $lucky;
/*
Arithmetische Operatoren:
+   Addition
-   Subtraktion
*   Multiplikation
/   Division
%   Modulo (Rest einer Division)

Verkettungsoperator (Konkatenator):
.   Verkettung von Strings (nicht + wie in JS)

Vergleichsoperatoren:
<   Kleiner als
>   Größer als
<=  Kleiner gleich
>=  Größer gleich
==  Gleich (Wertgleichheit)
!=  Ungleich
<>  Ungleich
=== Identisch (Wert- und Typgleichheit)
!== Nicht identisch

*/
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Variablen & Operatoren</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Variablen & Operatoren</h1></header>
  <main class="container">
    <p> Hallo <?= htmlspecialchars($name) ?>, du bist <?= $age ?> Jahre alt</p>
    <p> und dein Glückszahl ist <?= $lucky ?>. </p>
    <p> Die Summe ist <?= $sum ?>. </p>    
  </main>
</body>
</html>
