<?php
    declare(strict_types=1);
    //! die folgendern 2 Zeilen in der Produktiv-Variante löschen!
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    session_start();

    require_once __DIR__ . '/../inc/db-connect.php';
    require_once __DIR__ . '/../inc/functions.php';

    //echo print_r($_SERVER['SCRIPT_FILENAME']) . '<br>';
    $uri = $_SERVER['SCRIPT_FILENAME'];
    //echo print_r(dirname($uri)) . '<br>';
    
    //echo print_r(str_ends_with('ABC','DEF')) . '<br>';
    //echo print_r(str_ends_with($uri,'public')) . '<br>';
    
    $path = ( !str_ends_with(dirname($uri),'public') ) ? '../' : '' ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notiz-Manage DB</title>
    <link rel="stylesheet"  href="<?= $path ?>../css/style.css">
</head>
<body>
    <?php require_once 'nav.php' ?>
    
    <header>
        <div class="container">
            <h1>Notiz-Manager DB</h1>
        </div>
    </header>