<?php include 'includes/header.php'; ?>

<div class="container mt-4">
    <h3>إدارة الموظفين</h3>
    <form method="post" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="username" class="form-control" placeholder="اسم المستخدم" required>
            </div>
            <div class="col-md-3">
                <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="name" class="form-control" placeholder="الاسم الكامل" required>
            </div>
            <div class="col-md-3">
                <select name="role" class="form-control" required>
                    <option value="">اختر الصلاحية</option>
                    <option value="مدير">مدير</option>
                    <option value="مشرف">مشرف</option>
                </select>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-3">
                <input type="text" name="address" class="form-control" placeholder="العنوان">
            </div>
            <div class="col-md-3">
                <input type="tel" name="phone" class="form-control" placeholder="رقم الهاتف">
            </div>
            <div class="col-md-3">
                <input type="date" name="hire_date" class="form-control" required>
            </div>
            <div class="col-md-3">
                <input type="number" step="0.01" name="salary" class="form-control" placeholder="الراتب الشهري" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3">إضافة موظف</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>اسم المستخدم</th>
                <th>الاسم</th>
                <th>الصلاحية</th>
                <th>الراتب</th>
                <th>السلفيات</th>
                <th>الحوافز</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pdo->query("SELECT * FROM employees") as $row): ?>
            <tr>
                <td><?= $row['username'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['role'] ?></td>
                <td><?= number_format($row['salary'], 2) ?></td>
                <td><?= number_format($row['loans'], 2) ?></td>
                <td><?= number_format($row['incentives'], 2) ?></td>
                <td>
                    <a href="edit_employee.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">تعديل</a>
                    <a href="delete.php?table=employees&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">حذف</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>