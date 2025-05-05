<?php include 'includes/header.php'; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">إجمالي الموظفين</h5>
                    <p class="card-text display-4"><?= $pdo->query("SELECT COUNT(*) FROM employees")->fetchColumn() ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">إجمالي العملاء</h5>
                    <p class="card-text display-4"><?= $pdo->query("SELECT COUNT(*) FROM customers")->fetchColumn() ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">إجمالي الطواحين</h5>
                    <p class="card-text display-4"><?= $pdo->query("SELECT COUNT(*) FROM mills")->fetchColumn() ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">العمليات النشطة</h5>
                    <p class="card-text display-4"><?= $pdo->query("SELECT COUNT(*) FROM operations WHERE end_time IS NULL")->fetchColumn() ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>