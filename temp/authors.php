<?php
require 'db.php';
$action = $_GET['action'] ?? '';

if ($action == 'create') {
    $name = $_POST['Name'] ?? '';
    $stmt = $pdo->prepare('INSERT INTO Authors (Name) VALUES (?)');
    $stmt->execute([$name]);
    header('Location: index.html');
    exit;
} elseif ($action == 'read') {
    $stmt = $pdo->query('SELECT * FROM Authors');
    echo json_encode($stmt->fetchAll());
    exit;
} elseif ($action == 'update') {
    $id = $_POST['AuthorID'] ?? '';
    $name = $_POST['Name'] ?? '';
    $stmt = $pdo->prepare('UPDATE Authors SET Name=? WHERE AuthorID=?');
    $stmt->execute([$name, $id]);
    header('Location: index.html');
    exit;
} elseif ($action == 'delete') {
    $id = $_POST['AuthorID'] ?? '';
    $stmt = $pdo->prepare('DELETE FROM Authors WHERE AuthorID=?');
    $stmt->execute([$id]);
    header('Location: index.html');
    exit;
} else {
    http_response_code(400);
    echo 'Invalid action';
}
