<?php
require 'db.php';
$action = $_GET['action'] ?? '';

if ($action == 'create') {
    $orderid = $_POST['OrderID'] ?? null;
    $address = $_POST['Address'] ?? '';
    $status = $_POST['Status'] ?? '';
    $stmt = $pdo->prepare('INSERT INTO Shipments (OrderID, Address, Status) VALUES (?, ?, ?)');
    $stmt->execute([$orderid, $address, $status]);
    header('Location: index.html');
    exit;
} elseif ($action == 'read') {
    $stmt = $pdo->query('SELECT * FROM Shipments');
    echo json_encode($stmt->fetchAll());
    exit;
} elseif ($action == 'update') {
    $id = $_POST['ShipmentID'] ?? '';
    $orderid = $_POST['OrderID'] ?? null;
    $address = $_POST['Address'] ?? '';
    $status = $_POST['Status'] ?? '';
    $stmt = $pdo->prepare('UPDATE Shipments SET OrderID=?, Address=?, Status=? WHERE ShipmentID=?');
    $stmt->execute([$orderid, $address, $status, $id]);
    header('Location: index.html');
    exit;
} elseif ($action == 'delete') {
    $id = $_POST['ShipmentID'] ?? '';
    $stmt = $pdo->prepare('DELETE FROM Shipments WHERE ShipmentID=?');
    $stmt->execute([$id]);
    header('Location: index.html');
    exit;
} else {
    http_response_code(400);
    echo 'Invalid action';
}
