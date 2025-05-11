<!doctype html>
<html lang="en">

<head>
  <title>Book Store: New Book</title>
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
    <a href="index.php">Book List</a>
    <section>

      <h1>New Book</h1>
      <form action="new_process.php" method="post">
        <fieldset>
          <legend>Book Information</legend>

          <label for="isbn">ISBN:</label><br />
          <input type="text" id="isbn" name="isbn" required /><br /><br />

          <label for="title">Title:</label><br />
          <input type="text" id="title" name="title" required /><br /><br />

          <label for="price">Price:</label><br />
          <input type="number" id="price" name="price" step="0.01" required /><br /><br />

          <input type="submit" value="Create Book" />
        </fieldset>
      </form>


    </section>

  </main>
</body>

<footer>
  &copy; 2025 Books Store DBMS
</footer>

</html>