<?php

// var_dump($_POST);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];


// Establish DB Connection
$host = "127.0.0.1";
$username = "mariadb";
$password = "mariadb";
$dbname = "TEST_DB";

$db = mysqli_connect($host, $username, $password, $dbname, 3306);


// Test if connection succeeded (recommended)
if (mysqli_connect_errno()) {
  $msg = "Database connection failed: ";
  $msg .= mysqli_connect_error();
  $msg .= " (" . mysqli_connect_errno() . ")";
  exit($msg);
}


$sql = "INSERT INTO Persons (user_id, FirstName, LastName) VALUES (2, '$first_name', '$last_name')";


$result = mysqli_query($db, $sql);