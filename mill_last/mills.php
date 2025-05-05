<?php include 'includes/header.php'; ?>

<div class="container mt-4">
    <h3>إدارة الطواحين</h3>
    <form method="post" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="mill_number" class="form-control" placeholder="رقم الطاحونة" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="اسم الطاحونة" required>
            </div>
            <div class="col-md-4">
                <input type="number" name="total_runtime" class="form-control" placeholder="الوقت الكلي بالدقائق" required>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <select name="supervisor_id" class="form-control" required>
                    <option value="">اختر مشرف</option>
                    <?php foreach($pdo->query("SELECT id, name FROM employees WHERE role='مشرف'") as $row): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success w-100">إضافة طاحونة</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>رقم الطاحونة</th>
                <th>الاسم</th>
                <th>الوقت الكلي</th>
                <th>المشرف</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pdo->query("SELECT m.*, e.name as supervisor_name FROM mills m LEFT JOIN employees e ON m.supervisor_id = e.id") as $row): ?>
            <tr>
                <td><?= $row['mill_number'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['total_runtime'] ?> دقيقة</td>
                <td><?= $row['supervisor_name'] ?></td>
                <td>
                    <a href="edit_mill.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">تعديل</a>
                    <a href="delete.php?table=mills&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">حذف</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>