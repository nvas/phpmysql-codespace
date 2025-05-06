<?php

function redirect_to($location)
{
  header("Location: " . $location);
  exit;
}

// Get and sanitize the ID
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Database connection
$db = mysqli_connect("127.0.0.1", "mariadb", "mariadb", "Books", 3306);

if (mysqli_connect_errno()) {
  $msg = "Database connection failed: ";
  $msg .= mysqli_connect_error();
  $msg .= " (" . mysqli_connect_errno() . ")";
  exit($msg);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get form input
  $book = [];
  $book['ISBN'] = $_POST['ISBN'] ?? '';
  $book['Title'] = $_POST['Title'] ?? '';
  $book['Price'] = $_POST['Price'] ?? '0.00';

  // Update the book record
  $sql = "UPDATE Books SET ";
  $sql .= "ISBN='" . mysqli_real_escape_string($db, $book['ISBN']) . "', ";
  $sql .= "Title='" . mysqli_real_escape_string($db, $book['Title']) . "', ";
  $sql .= "Price='" . mysqli_real_escape_string($db, $book['Price']) . "' ";
  $sql .= "WHERE id={$id} ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);

  if (!$result) {
    echo "Update failed: " . mysqli_error($db);
    exit;
  }

  redirect_to('edit.php?success=1&id=' . $id);
} else {
  if (isset($_GET['success']) && $_GET['success'] == "1") {
    $message = "Book updated.";
  }

  $sql = "SELECT * FROM Books WHERE id = {$id} LIMIT 1";
  $result = mysqli_query($db, $sql);

  if (!$result) {
    exit("Database query failed.");
  }

  $book = mysqli_fetch_assoc($result);
  if (is_null($book)) {
    exit("No book found.");
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Books DBMS: Edit Book</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../style.css">
</head>

<body>

  <header>
    <h1>Books Manager DBMS</h1>
    <nav>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="index.php">Book List</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h2>Edit Book</h2>

    <?php if (isset($message)) {
      echo "<div><strong>$message</strong></div>";
    } ?>

    <form action="edit.php?id=<?php echo $id; ?>" method="post">
      <dl>
        <dt>ISBN</dt>
        <dd><input type="text" name="ISBN" value="<?php echo htmlspecialchars($book['ISBN']); ?>" required /></dd>
      </dl>
      <dl>
        <dt>Title</dt>
        <dd><input type="text" name="Title" value="<?php echo htmlspecialchars($book['Title']); ?>" required /></dd>
      </dl>
      <dl>
        <dt>Price</dt>
        <dd><input type="number" name="Price" value="<?php echo htmlspecialchars($book['Price']); ?>" step="0.01" min="0" required /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Update Book" />
      </div>
    </form>

  </main>

  <footer>
    &copy; 2025 Books Manager System
  </footer>

</body>

</html>

<?php
mysqli_free_result($result);
mysqli_close($db);
?>