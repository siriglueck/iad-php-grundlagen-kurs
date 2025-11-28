<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once dirname(__DIR__) . '/../inc/db-connect.php';
require_once dirname(__DIR__) . '/../inc/functions.php';


$id      = (int)($_POST['id'] ?? 0);
$title   = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');
$catRaw  = $_POST['category_id'] ?? '';
$catId   = ($catRaw === '' ? null : (int)$catRaw);
$oldImage= $_POST['old_image'] ?? '';

if ($id <= 0 || $title === '' || $content === '') {
    die('Ungültige Eingaben');
}

$uploadDir = dirname(__DIR__) . '/../images/';
$image = $oldImage;

// Check if there is a new image upload
if (!empty($_FILES['image']['name'])) {
    $fileTmp  = $_FILES['image']['tmp_name'];
    $fileName = basename($_FILES['image']['name']);
    $fileType = mime_content_type($fileTmp);

    // regenerate a new name, prevent same name
    $newFileName = time() . '_' . preg_replace('/\s+/', '_', $fileName);
    $target = $uploadDir . $newFileName;

    if (!move_uploaded_file($fileTmp, $target)) {
        die('Fehler beim Hochladen der Datei.');
    }

    $image = $newFileName;
    updatePost($pdo, $id, $title, $content, $catId, $image);

    header('Location: ../post_single.php?id=' . $id);
    exit;
}


// // อัปเดต DB
// $stmt = $pdo->prepare(
//     'UPDATE tbl_posts 
//      SET posts_header = :t,
//          posts_content = :c,
//          posts_categ_id_ref = :cat,
//          posts_image = :img
//      WHERE posts_id = :id'
// );

// $ok = $stmt->execute([
//     ':t'   => $title,
//     ':c'   => $content,
//     ':cat' => $catId,
//     ':img' => $image,
//     ':id'  => $id
// ]);



