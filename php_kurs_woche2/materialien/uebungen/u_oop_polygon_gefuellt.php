<?php
    declare(strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include_once 'u_oop_polygon_gefuellt.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u_oop_polygon_gefüllt</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <header>
        <h1>u_oop_polygon_gefüllt</h1>
    </header>
    <main class="container">
        <?php
           $polygonGefuellt1 = new PolygonGefuellt(
            array(new Punkt(3.5, 1),
            new Punkt(-2, 6.5),
            new Punkt(1.5, -3.5)), 
            "Rot"
           );
           echo "$polygonGefuellt1 <br>";
           $polygonGefuellt1->verschieben(0.5, 3.5);
           echo "$polygonGefuellt1 <br>";
           $polygonGefuellt1->faerben("Blau");
           echo "$polygonGefuellt1 <br>";

        ?>
    </main>
</body>
</html>