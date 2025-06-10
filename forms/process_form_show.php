<?php

// var_dump($_GET);
$isbn = $_GET['isbn'];

// echo $isbn;

// Establish DB Connection
$host = "127.0.0.1";
$username = "mariadb";
$password = "mariadb";
$dbname = "Books";

$db = mysqli_connect($host, $username, $password, $dbname, 3306);


// Test if connection succeeded (recommended)
if (mysqli_connect_errno()) {
  $msg = "Database connection failed: ";
  $msg .= mysqli_connect_error();
  $msg .= " (" . mysqli_connect_errno() . ")";
  exit($msg);
} else 


$sql = "select * from Books where ISBN='$isbn';";


$result = mysqli_query($db, $sql);

// var_dump($result);

echo '<br>---------------------------------------------<br>';

$book = mysqli_fetch_assoc($result);

// var_dump($book);

echo 'The book title is ' .  $book['Title'];
echo '<br>';
echo '<a href="form_edit.html?book=' . $isbn . '"> Edit Book</a>';
echo '<br>';
echo '<a href="form_delete.html?book=' . $isbn . '"> Delete Book</a>';
?>