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

function authenticate(PDO $pdo, string $username, string $password): bool {
  $stmt = $pdo->prepare('SELECT users_email, users_password FROM tbl_users WHERE users_email=:u');
  $stmt->execute([':u'=> $username]);
  $row = $stmt->fetch();
  echo '<pre>', var_dump( $row ), '</pre>';
  if(!$row) return false;
  return password_verify($password, $row->users_password);
}

function is_logged_in(): bool {
  return isset($_SESSION['user']) && $_SESSION['user'] !== '';
}

function addPost(PDO $pdo, string $title, string $content, int $catId, string $image):void {
    $stmt = $pdo->prepare('INSERT INTO tbl_posts(posts_header, posts_content, posts_categ_id_ref, posts_image) VALUES (:t, :c, :cat, :img)');
    $stmt->execute([':t' => $title, ':c' => $content, ':cat' => $catId, ':img' => $image]);
}

function updatePost(PDO $pdo, int $id,string $title, string $content, int $catId, string $image):void {
  $stmt = $pdo->prepare('UPDATE tbl_posts SET posts_header=:t, posts_content=:c, posts_categ_id_ref=:cat, posts_image=:img WHERE posts_id=:id');
  $stmt->execute([':t' => $title, ':c' => $content, ':cat' => $catId, ':img' => $image, ':id' => $id]);
}

function deletePost(PDO $pdo, int $id): void {
    $stmt = $pdo->prepare('DELETE FROM tbl_posts WHERE posts_id=:id');
    $stmt->execute([':id'=>$id]);
} 