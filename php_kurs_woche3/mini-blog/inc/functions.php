<?php
declare(strict_types=1);

function safe(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function findPost(PDO $pdo, int $id): ?object {
    $stmt = $pdo->prepare('SELECT * FROM tbl_posts WHERE posts_id=:id');
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();
    return $row ?: null;
}

function getAllPosts(PDO $pdo):array {
    $sql = 'SELECT p.posts_id, p.posts_header, c.categ_name
            FROM tbl_posts p
            LEFT JOIN tbl_categories c
                 ON p.posts_categ_id_ref = c.categ_id
            ORDER BY p.posts_id ASC';
    return $pdo->query($sql)->fetchAll();
}

function getFilterPosts(PDO $pdo, string $filter):array {
    $sql = 'SELECT p.posts_id, p.posts_header, c.categ_name
            FROM tbl_posts p
            LEFT JOIN tbl_categories c
                 ON p.posts_categ_id_ref = c.categ_id
            WHERE c.categ_name = :filter
            ORDER BY p.posts_id ASC';
    $pdo = $pdo->prepare($sql);
    $pdo->execute(['filter' => $filter]);
    return $pdo->fetchAll();
}