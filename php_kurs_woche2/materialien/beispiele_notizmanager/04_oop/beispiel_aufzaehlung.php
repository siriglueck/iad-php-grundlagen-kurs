<?php
    declare(strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
/**
 * einfache Aufzählung
 */
enum Skat {
    case Eichel;
    case Gruen;
    case Herz;
    case Schellen;

    function getName() {
        return $this->name;
    }
}

/**
 * gesicherte Aufzählung (backed enumeration)
 * Typhinweis darf *ausschließlich* int oder string sein
 * ein vorhandener Wert kann nicht an ein weiteres Element gehängt werden
 * Aufzählungen besitzten grundsätzlich eine schreibgeschützte Eigenschaft name
 * gesicherte Aufzählungen besitzen zusätzlich noch die Eigenschaft value 
 */

enum Status: string {
    case undone = 'offen';
    case send = 'gesendet';
    case done = 'abgeschlossen';
    
    // Dies wird nicht funktionieren: Error
    // case success = 'abgeschlossen';

    function getStatus(Status $stat){
        return "Name: $stat->name, Wert: $stat->value";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aufzählung (enum)</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <h1>Aufzählung (enum)</h1>
    </header>
    <main class="container">
        <h2>einfache Aufzählungen</h2>
        <p><?= Skat::Herz->getName() ?> ist Trumpf</p>
        <h2></h2>
        <p><?= Status::send->getStatus(Status::send) ?></p>
    </main>
</body>
</html>