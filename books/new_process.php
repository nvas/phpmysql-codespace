<?php

function redirect_to($location)
{
  header("Location: " . $location);
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Sanitize and collect POST data
  $book = [];
  $book['isbn'] = $_POST['isbn'] ?? '';
  $book['title'] = $_POST['title'] ?? '';
  $book['price'] = $_POST['price'] ?? '0';

  // Connect to database
  // mysqli_connect(host, username, password, database, port)

  $db = mysqli_connect("127.0.0.1", "mariadb", "mariadb", "Books", 3306);
  if (mysqli_connect_errno()) {
    $msg = "Database connection failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " (" . mysqli_connect_errno() . ")";
    exit($msg);
  }

  // Escape and build SQL
  $isbn = mysqli_real_escape_string($db, $book['isbn']);
  $title = mysqli_real_escape_string($db, $book['title']);
  $price = mysqli_real_escape_string($db, $book['price']);

  $sql = "INSERT INTO Books (isbn, title, price) VALUES ('$isbn', '$title', '$price')";
  $result = mysqli_query($db, $sql);

  if (!$result) {
    echo 'Insert failed: ' . mysqli_error($db);
    exit;
  }

  $new_id = mysqli_insert_id($db);
  mysqli_close($db);

  redirect_to('show.php?id=' . $new_id);
}
