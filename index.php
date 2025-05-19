<!doctype html>
<html lang="en">

<head>
  <title>Book Store DBMS</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <header>
    <h1>Book Store DBMS</h1>
    <nav>
      <ul>
        <li><a href="/">Home</a></li>
        <!-- <li><a href="tasks/">Table Tasks</a></li> -->
        <li><a href="books/">Books</a></li>
        <li><a href="authors/">Authors</a></li>
        <li><a href="customers/">Customers</a></li>
        <li><a href="orders/">Orders</a></li>
        <li><a href="shipments/">Shipments</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h2>Tables Overview</h2>

    <section>
      <h3>Table: Books</h3>
      <p>
        <strong>Columns:</strong><br />
        - <code>id</code>: int(11), NOT NULL, PRIMARY KEY, auto_increment<br />
        - <code>ISBN</code>: varchar(13), NOT NULL, UNIQUE<br />
        - <code>Title</code>: varchar(100), NULL<br />
        - <code>Price</code>: decimal(6,2), NULL
      </p>
    </section>

    <section>
      <h3>Table: Authors</h3>
      <p>
        <strong>Columns:</strong><br />
        - <code>AuthorID</code>: int(11), NOT NULL, PRIMARY KEY<br />
        - <code>Name</code>: varchar(100), NULL
      </p>
    </section>

    <section>
      <h3>Table: Orders</h3>
      <p>
        <strong>Columns:</strong><br />
        - <code>OrderID</code>: int(11), NOT NULL, PRIMARY KEY<br />
        - <code>CustomerID</code>: int(11), NULL, FOREIGN KEY<br />
        - <code>BookISBN</code>: varchar(13), NULL, FOREIGN KEY<br />
        - <code>Quantity</code>: int(11), NULL
      </p>
    </section>

    <section>
      <h3>Table: Customers</h3>
      <p>
        <strong>Columns:</strong><br />
        - <code>CustomerID</code>: int(11), NOT NULL, PRIMARY KEY<br />
        - <code>Name</code>: varchar(100), NULL<br />
        - <code>Email</code>: varchar(100), NULL
      </p>
    </section>

    <section>
      <h3>Table: Shipments</h3>
      <p>
        <strong>Columns:</strong><br />
        - <code>ShipmentID</code>: int(11), NOT NULL, PRIMARY KEY<br />
        - <code>OrderID</code>: int(11), NULL, FOREIGN KEY<br />
        - <code>Address</code>: varchar(200), NULL<br />
        - <code>Status</code>: varchar(20), NULL
      </p>
    </section>
  </main>


  <footer>
    &copy; 2025 Books Store DBMS
  </footer>

</body>

</html>