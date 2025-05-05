<?php include 'includes/header.php'; 

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
$stmt->execute([$id]);
$employee = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE employees SET 
        username = ?,
        password = ?,
        name = ?,
        address = ?,
        phone = ?,
        hire_date = ?,
        salary = ?,
        loans = ?,
        incentives = ?,
        role = ?
        WHERE id = ?");
    $stmt->execute([
        $_POST['username'],
        $passwordHash,
        $_POST['name'],
        $_POST['address'],
        $_POST['phone'],
        $_POST['hire_date'],
        $_POST['salary'],
        $_POST['loans'],
        $_POST['incentives'],
        $_POST['role'],
        $id
    ]);
    header('Location: employees.php');
    exit;
}
?>

<div class="container mt-4">
    <h3>تعديل موظف</h3>
    <form method="post">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="username" class="form-control" value="<?= $employee['username'] ?>" required>
            </div>
            <div class="col-md-3">
                <input type="password" name="password" class="form-control" placeholder="اتركه فارغًا لإبقاء كلمة المرور الحالية">
            </div>
            <div class="col-md-3">
                <input type="text" name="name" class="form-control" value="<?= $employee['name'] ?>" required>
            </div>
            <div class="col-md-3">
                <select name="role" class="form-control" required>
                    <option value="مدير" <?= $employee['role'] == 'مدير' ? 'selected' : '' ?>>مدير</option>
                    <option value="مشرف" <?= $employee['role'] == 'مشرف' ? 'selected' : '' ?>>مشرف</option>
                </select>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-3">
                <input type="text" name="address" class="form-control" value="<?= $employee['address'] ?>">
            </div>
            <div class="col-md-3">
                <input type="tel" name="phone" class="form-control" value="<?= $employee['phone'] ?>">
            </div>
            <div class="col-md-3">
                <input type="date" name="hire_date" class="form-control" value="<?= $employee['hire_date'] ?>" required>
            </div>
            <div class="col-md-3">
                <input type="number" step="0.01" name="salary" class="form-control" value="<?= $employee['salary'] ?>" required>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-3">
                <input type="number" step="0.01" name="loans" class="form-control" value="<?= $employee['loans'] ?>" placeholder="السلفيات">
            </div>
            <div class="col-md-3">
                <input type="number" step="0.01" name="incentives" class="form-control" value="<?= $employee['incentives'] ?>" placeholder="الحوافز">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success w-100">حفظ التعديلات</button>
            </div>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>