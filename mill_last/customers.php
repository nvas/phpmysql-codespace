<?php include 'includes/header.php'; ?>

<div class="container mt-4">
    <h3>إدارة العملاء</h3>
    <form method="post" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="customer_name" class="form-control" placeholder="اسم العميل" required>
            </div>
            <div class="col-md-4">
                <input type="number" name="shipment_quantity" class="form-control" placeholder="كمية الشحنة" required>
            </div>
            <div class="col-md-4">
                <input type="number" name="sacks_count" class="form-control" placeholder="عدد الشوالات" required>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <input type="date" name="delivery_date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <select name="supervisor_id" class="form-control">
                    <option value="">اختر مشرف</option>
                    <?php foreach($pdo->query("SELECT id, name FROM employees WHERE role='مشرف'") as $row): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success w-100">إضافة عميل</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>اسم العميل</th>
                <th>كمية الشحنة</th>
                <th>عدد الشوالات</th>
                <th>تاريخ التسليم</th>
                <th>المشرف</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pdo->query("SELECT c.*, e.name as supervisor_name FROM customers c LEFT JOIN employees e ON c.supervisor_id = e.id") as $row): ?>
            <tr>
                <td><?= $row['customer_name'] ?></td>
                <td><?= $row['shipment_quantity'] ?></td>
                <td><?= $row['sacks_count'] ?></td>
                <td><?= $row['delivery_date'] ?></td>
                <td><?= $row['supervisor_name'] ?></td>
                <td>
                    <a href="edit_customer.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">تعديل</a>
                    <a href="delete.php?table=customers&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">حذف</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>