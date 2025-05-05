<?php
include 'config.php';

$table = $_GET['table'];
$id = $_GET['id'];

$pdo->query("DELETE FROM $table WHERE id=$id");
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>