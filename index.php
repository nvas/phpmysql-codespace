
<!doctype html>
<html lang="en">
  <head>
      <title>Tasks Manager DBMS</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <header>
      <h1>Tasks Manager DBMS</h1>
      <nav>
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="tasks/">Tasks</a></li>
          <li><a href="users/">Users</a></li>
          <li><a href="projects/">Projects</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <h2>Tables Overview</h2>

      <section id="table1">
        <h3>[COMPLETED] Table 1: Tasks</h3>
        <p>
          This table defines tasks with a unique <code>id</code> as the primary key that auto-increments. Each task includes a <code>priority</code> level, a <code>completed</code> status (0 or 1), and a <code>description</code> of up to 255 characters.
        </p>
      </section>

      <section id="table2">
        <h3>[TODO] Table 2: Users</h3>
        <p>
          The <code>Users</code> table stores user information including a unique <code>user_id</code>, <code>name</code>, and <code>email</code>. Each task can be assigned to a user.
        </p>
      </section>

      <section id="table3">
        <h3>[TODO] Table 3: Projects</h3>
        <p>
          The <code>Projects</code> table manages project data with a <code>project_id</code> as the primary key. Each task can be linked to a project through a foreign key.
        </p>
      </section>
    </main>

    <footer>
      &copy; 2025 Tasks Manager System
    </footer>
    
  </body>
</html>
