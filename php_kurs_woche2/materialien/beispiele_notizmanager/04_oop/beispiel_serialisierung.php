<?php
    declare(strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require_once __DIR__ . '/class/Raumschriff.php';

    if( file_exists('RaumschiffState.dat')) {
        // Objekt-Status einlesen
        $s = file_get_contents('RaumschriffState.dat');
        
        // Objekt deserialisieren
        $enterprise = unserialize($s);
    } else {
        $enterprise = new Raumschiff('U.S.S. Enterprise', 'NCC 1701', 25);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serialisierung</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <h1>Serialisierung, Deserialisierung</h1>
    </header>
    <main class="container">

        <p><?= $enterprise->__toString(); ?></p>
        <p><?= $enterprise ?></p>

        <?php $enterprise->setEntfernung(25); ?>
        <p><?= $enterprise ?></p>

        <?php 
        // Objekt wird serialisiert
        $s = serialize($enterprise);

        echo '<pre>'. var_dump($s) .'</pre>';
        
        // Objekt wird gespeichert
        file_put_contents('RaumschriffState.dat', $s);
        ?>
        <p>Objekt wurde serialiert und gespeichert</p>

    </main>
</body>
</html>