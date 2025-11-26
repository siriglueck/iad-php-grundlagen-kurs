<?php
declare(strict_types=1);
    
// FUNCTIONS
function getAllData(PDO $pdo):array {
    $stmt = $pdo->query("SELECT * FROM fp ORDER BY preis DESC");
    return $pdo = $stmt->fetchAll();
}

function getCondition1(PDO $pdo):array {
    $stmt = $pdo->query("SELECT * FROM fp WHERE gb>60 AND preis <150 ORDER BY gb DESC;");
    return $pdo = $stmt->fetchAll();
}

function getOpt1(PDO $pdo, string $sort):array {
    $stmt = $pdo->query("SELECT * FROM fp WHERE preis <= 120 ORDER BY preis $sort;");
    return $pdo = $stmt->fetchAll();
}

function getOpt2(PDO $pdo, string $sort):array {
    $stmt = $pdo->query("SELECT * FROM fp WHERE preis >= 120 AND preis <=140 ORDER BY preis $sort;");
    return $pdo = $stmt->fetchAll();
}

function getOpt3(PDO $pdo, string $sort):array {
    $stmt = $pdo->query("SELECT * FROM fp WHERE preis > 140 ORDER BY preis $sort;");
    return $pdo = $stmt->fetchAll();
}
    
