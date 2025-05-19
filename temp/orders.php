<?php
require 'db.php';
$action = $_GET['action'] ?? '';

if ($action == 'create') {
    $customerid = $_POST['CustomerID'] ?? null;
    $bookisbn = $_POST['BookISBN'] ?? '';
    $quantity = $_POST['Quantity'] ?? null;
    $stmt = $pdo->prepare('INSERT INTO Orders (CustomerID, BookISBN, Quantity) VALUES (?, ?, ?)');
    $stmt->execute([$customerid, $bookisbn, $quantity]);
    header('Location: index.html');
    exit;
} elseif ($action == 'read') {
    $stmt = $pdo->query('SELECT * FROM Orders');
    echo json_encode($stmt->fetchAll());
    exit;
} elseif ($action == 'update') {
    $id = $_POST['OrderID'] ?? '';
    $customerid = $_POST['CustomerID'] ?? null;
    $bookisbn = $_POST['BookISBN'] ?? '';
    $quantity = $_POST['Quantity'] ?? null;
    $stmt = $pdo->prepare('UPDATE Orders SET CustomerID=?, BookISBN=?, Quantity=? WHERE OrderID=?');
    $stmt->execute([$customerid, $bookisbn, $quantity, $id]);
    header('Location: index.html');
    exit;
} elseif ($action == 'delete') {
    $id = $_POST['OrderID'] ?? '';
    $stmt = $pdo->prepare('DELETE FROM Orders WHERE OrderID=?');
    $stmt->execute([$id]);
    header('Location: index.html');
    exit;
} else {
    http_response_code(400);
    echo 'Invalid action';
}
