<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام إدارة المطاحن</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">الرئيسية</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="employees.php">الموظفين</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customers.php">العملاء</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mills.php">الطواحين</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="operations.php">العمليات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports.php">التقارير</a>
                    </li>
                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="logout.php">تسجيل الخروج</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>