<?php
// Connect to the database
$mysqli = new mysqli("db", "root", "password", "bookshop");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch tasks
$result = $mysqli->query("SELECT * FROM tasks");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 2rem auto;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #aaa;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Task List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Priority</th>
            <th>Completed</th>
            <th>Description</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['priority'] ?></td>
            <td><?= $row['completed'] ? 'Yes' : 'No' ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
