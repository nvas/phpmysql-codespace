<?php
include 'config.php';

$mills = $_POST['mill_ids'];
$totalSacks = $_POST['total_sacks'];
$millCount = count($mills);
$sacksPerMill = array_fill(0, $millCount, $totalSacks / $millCount);
$mercuryPerMill = array_fill(0, $millCount, 0);

$stmt = $pdo->prepare("INSERT INTO operations 
    (supervisor_id, mill_ids, total_sacks, sacks_per_mill, mercury_per_mill, start_time, remaining_time)
    VALUES (?, ?, ?, ?, ?, NOW(), ?)");

$totalRuntime = 0;
foreach($mills as $millId) {
    $mill = $pdo->query("SELECT total_runtime FROM mills WHERE id=$millId")->fetch();
    $totalRuntime += $mill['total_runtime'];
}

$avgRuntime = $totalRuntime / $millCount;

$stmt->execute([
    $_POST['supervisor_id'],
    json_encode($mills),
    $totalSacks,
    json_encode($sacksPerMill),
    json_encode($mercuryPerMill),
    $avgRuntime * 60
]);

foreach($mills as $millId) {
    $pdo->query("UPDATE mills SET total_runtime = total_runtime - $avgRuntime WHERE id=$millId");
}

echo "success";
?>