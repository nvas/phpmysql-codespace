<?php


// 1. Create a database connection host, username, password, dbname, port
// $host = "127.0.0.1";
// $username = "mariadb";
// $password = "mariadb";
// $dbname = "mariadb";

$host = "127.0.0.1";
$username = "admin";
$password = "admin";
$dbname = "mariadb";
$db = mysqli_connect($host, $username, $password, $dbname, 3306);


// Test if connection succeeded (recommended)
if (mysqli_connect_errno()) {
  $msg = "Database connection failed: ";
  $msg .= mysqli_connect_error();
  $msg .= " (" . mysqli_connect_errno() . ")";
  exit($msg);
}

// 2. Perform database query
$sql = "SELECT * FROM Books";
$result = mysqli_query($db, $sql);

// Test if query succeeded (recommended)
if (!$result) {
  exit("Database query failed.");
}

// 3. Use returned data (if any)

?>

<!doctype html>
<html lang="en">

<head>
  <title>Task Manager: Task List</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>

  <header>
    <h1>Tasks Manager DBMS</h1>
    <nav>
      <ul>
        <li><a href="/">Home</a></li>
      </ul>
    </nav>
  </header>

  <nav>
    <a href="new.php">+ New Book</a>
  </nav>

  <section>

    <h1>Book List</h1>

    <table>
      <tr>
        <th>ISBN</th>
        <th>Title</th>
        <th>Price</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php while ($book = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $book['ISBN']; ?></td>
          <td><?php echo $book['Title']; ?></td>
          <td><?php echo $book['Price']; ?></td>
          <td><a href="show.php?id=<?php echo $task['id']; ?>">View</a></td>
          <td><a href="edit.php?id=<?php echo $task['id']; ?>">Edit</a></td>
        </tr>
      <?php } ?>
    </table>

  </section>

</body>


<footer>
  &copy; 2025 Online Bookstore
</footer>

</html>

<?php
// 4. Release returned data
mysqli_free_result($result);

// 5. Close database connection
mysqli_close($db);
?>