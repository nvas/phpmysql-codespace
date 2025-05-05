<?php include 'includes/header.php'; 

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM customers WHERE id = ?");
$stmt->execute([$id]);
$customer = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE customers SET 
        customer_name = ?,
        shipment_quantity = ?,
        sacks_count = ?,
        delivery_date = ?,
        supervisor_id = ?
        WHERE id = ?");
    $stmt->execute([
        $_POST['customer_name'],
        $_POST['shipment_quantity'],
        $_POST['sacks_count'],
        $_POST['delivery_date'],
        $_POST['supervisor_id'],
        $id
    ]);
    header('Location: customers.php');
    exit;
}
?>

<div class="container mt-4">
    <h3>تعديل عميل</h3>
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="customer_name" class="form-control" value="<?= $customer['customer_name'] ?>" required>
            </div>
            <div class="col-md-4">
                <input type="number" name="shipment_quantity" class="form-control" value="<?= $customer['shipment_quantity'] ?>" required>
            </div>
            <div class="col-md-4">
                <input type="number" name="sacks_count" class="form-control" value="<?= $customer['sacks_count'] ?>" required>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <input type="date" name="delivery_date" class="form-control" value="<?= $customer['delivery_date'] ?>" required>
            </div>
            <div class="col-md-4">