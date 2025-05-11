<?php


// 1. Create a database connection host, username, password, dbname, port
// $host = "127.0.0.1";
// $username = "mariadb";
// $password = "mariadb";
// $dbname = "mariadb";

$host = "127.0.0.1";
// $host = "localhost";
$username = "books_admin";
$password = "books_admin";
$dbname = "Books";
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
  <title>Book Store: Book List</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>

  <header>
    <h1>Book Store DBMS</h1>
    <nav>
      <ul>
        <li><a href="/">Home</a></li>
      </ul>
    </nav>
  </header>



  <main>
    <section>
      <a href="new.php">+ Add New Book</a>
      <h1>Book List</h1>

      <table border="1" cellpadding="5" cellspacing="0">
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
            <td><a href="show.php?id=<?php echo $book['id']; ?>">View</a></td>
            <td><a href="edit.php?id=<?php echo $book['id']; ?>">Edit</a></td>
          </tr>
        <?php } ?>
      </table>

    </section>
  </main>
</body>


<footer>
  &copy; 2025 Books Store DBMS
</footer>

</html>

<?php
// 4. Release returned data
mysqli_free_result($result);

// 5. Close database connection
mysqli_close($db);
?>