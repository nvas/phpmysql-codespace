<?php
// Typecast the value as an integer to prevent SQL injection
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
  exit("Invalid book ID.");
}

// 1. Create a database connection
$db = mysqli_connect("127.0.0.1", "mariadb", "mariadb", "Books", 3306);

// Test if connection succeeded
if (mysqli_connect_errno()) {
  $msg = "Database connection failed: ";
  $msg .= mysqli_connect_error();
  $msg .= " (" . mysqli_connect_errno() . ")";
  exit($msg);
}

// 2. Perform database query
$sql = "SELECT * FROM Books WHERE id = {$id} LIMIT 1";
$result = mysqli_query($db, $sql);

// Test if query succeeded
if (!$result) {
  exit("Database query failed.");
}

// 3. Use returned data
$book = mysqli_fetch_assoc($result);

if (is_null($book)) {
  exit("No book found.");
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Books DBMS: Show Book</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../style.css">
</head>

<body>

  <header>
    <h1>Books Manager</h1>
    <nav>
      <ul>
        <li><a href="/">Home</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h2>Book Details</h2>

    <table border="1" cellpadding="5" cellspacing="0">
      <tr>
        <th>ID</th>
        <td><?php echo htmlspecialchars($book['id']); ?></td>
      </tr>
      <tr>
        <th>ISBN</th>
        <td><?php echo htmlspecialchars($book['ISBN']); ?></td>
      </tr>
      <tr>
        <th>Title</th>
        <td><?php echo htmlspecialchars($book['Title']); ?></td>
      </tr>
      <tr>
        <th>Price</th>
        <td>$<?php echo htmlspecialchars(number_format($book['Price'], 2)); ?></td>
      </tr>
    </table>

    <form action="delete.php?id=<?php echo $book['id']; ?>" method="post" onsubmit="return confirm('Delete this book?');">
      <p><input type="submit" value="Delete Book" /></p>
    </form>

    <p><a href="index.php">&laquo; Back to Book List</a></p>
  </main>


  <footer>
    <p>&copy; 2025 Books Manager System</p>
  </footer>

</body>

</html>

<?php
// 4. Release returned data and close connection
mysqli_free_result($result);
mysqli_close($db);
?>