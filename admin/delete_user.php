<?php include_once('nav.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Users</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        h2 {
            text-align: center;
            padding-top: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 6px 12px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn.edit {
            background-color: #28a745;
        }
        .btn.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h2>Admin Users</h2>
    <br>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php
            // Connect to the database
            $servername = "localhost"; // Change as per your configuration
            $username = "root"; // Change as per your configuration
            $password_db = ""; // Change as per your configuration
            $dbname = "hospital"; // Change as per your configuration

            // Create connection
            $conn = new mysqli($servername, $username, $password_db, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve data from the database
            $sql = "SELECT * FROM adminuser";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["password"] . "</td>";
                    echo "<td>";
                    echo "<a href='edit_admin_user.php?id=" . $row["id"] . "' class='btn edit'>Edit</a>";
                    echo "<a href='delete_admin_user.php?id=" . $row["id"] . "' class='btn delete'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found</td></tr>";
            }

            // Close connection
            $conn->close();
        ?>
    </table>
</body>
</html>