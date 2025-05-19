<?php
require 'db.php';

$action = $_GET['action'] ?? '';

if ($action == 'create') {
    $isbn = $_POST['ISBN'] ?? '';
    $title = $_POST['Title'] ?? '';
    $price = $_POST['Price'] ?? null;
    $stmt = $pdo->prepare('INSERT INTO Books (ISBN, Title, Price) VALUES (?, ?, ?)');
    $stmt->execute([$isbn, $title, $price]);
    header('Location: index.html');
    exit;
} elseif ($action == 'read') {
    $stmt = $pdo->query('SELECT * FROM Books');
    echo json_encode($stmt->fetchAll());
    exit;
} elseif ($action == 'update') {
    $id = $_POST['id'] ?? '';
    $isbn = $_POST['ISBN'] ?? '';
    $title = $_POST['Title'] ?? '';
    $price = $_POST['Price'] ?? null;
    $stmt = $pdo->prepare('UPDATE Books SET ISBN=?, Title=?, Price=? WHERE id=?');
    $stmt->execute([$isbn, $title, $price, $id]);
    header('Location: index.html');
    exit;
} elseif ($action == 'delete') {
    $id = $_POST['id'] ?? '';
    $stmt = $pdo->prepare('DELETE FROM Books WHERE id=?');
    $stmt->execute([$id]);
    header('Location: index.html');
    exit;
} else {
    http_response_code(400);
    echo 'Invalid action';
}
