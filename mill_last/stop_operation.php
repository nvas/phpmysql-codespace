<?php
include 'config.php';

$operationId = $_POST['id'];
$operation = $pdo->query("SELECT * FROM operations WHERE id=$operationId")->fetch();

$startTime = strtotime($operation['start_time']);
$currentTime = time();
$elapsedTime = $currentTime - $startTime;
$remainingTime = max(0, $operation['remaining_time'] - $elapsedTime);

$stmt = $pdo->prepare("UPDATE operations SET end_time=NOW(), remaining_time=? WHERE id=?");
$stmt->execute([$remainingTime, $operationId]);

$mills = json_decode($operation['mill_ids']);
foreach($mills as $millId) {
    $pdo->query("UPDATE mills SET total_runtime = total_runtime + ($remainingTime / " . count($mills) . ") WHERE id=$millId");
}

echo "success";
?>