<?php
declare(strict_types=1);

require_once __DIR__  . '/pdo-keys.php';

//echo '', var_dump( PDO::getAvailableDrivers()), '';

try {
  $pdo = new PDO(
    'mysql:host='. DB_HOST .
    ';dbname=' . DB_NAME . 
    ';charset=utf8mb4',
    DB_USER , 
    DB_PASSWORD, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
  ]);
  //echo 'Verbindung ergolgreich';
} catch (PDOException $e) {
  echo 'DB-Fehler: ' . htmlspecialchars($e->getMessage());
}