<?php
    declare(strict_types=1);
    //! die folgendern 2 Zeilen in der Produktiv-Variante löschen!
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require_once  dirname(__DIR__) . '/../inc/db-connect.php';
    require_once dirname(__DIR__) . '/../inc/functions.php';
    
    $id = (int)($_GET['id'] ?? 0);

    echo var_dump($id);

    if($id) {
        deletePost($pdo,$id);
    }

    header('Location: ../index.php');
    

    