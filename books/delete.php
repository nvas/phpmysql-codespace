<?php

// Helper function
function redirect_to($location)
{
  header("Location: " . $location);
  exit;
}

// Typecast ID for safety
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // 1. Create a database connection
  $db = mysqli_connect("127.0.0.1", "mariadb", "mariadb", "Books", 3306);

  if (mysqli_connect_errno()) {
    $msg = "Database connection failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " (" . mysqli_connect_errno() . ")";
    exit($msg);
  }

  // 2. Perform DELETE query
  $sql = "DELETE FROM Books WHERE id = {$id} LIMIT 1";
  $result = mysqli_query($db, $sql);

  if (!$result) {
    echo 'Delete failed: ' . mysqli_error($db);
    exit;
  }

  // 3. Close the connection
  mysqli_close($db);
}

// 4. Redirect to list page
redirect_to('index.php');
