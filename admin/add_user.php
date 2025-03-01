<?php include_once('nav.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        
        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <br>
    <br>
    <div class="container">
        <h2>User Registration</h2>
        <form action="add_user.php" method="POST">
            <label for="id">Name:</label><br>
            <input type="text" id="id" name="name"><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Register">
        </form>
        <?php
            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Validate form data
                if (empty($name) || empty($email) || empty($password)){
                    // Handle empty fields
                    echo "<div class='error'>ID, name, and password are required!</div>";
                } else {
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

                    // Insert data into the database
                    $sql = "INSERT INTO adminuser    (name, email, password) VALUES ('$name', '$email', '$password')";
                    
                    try {
                        $conn->query($sql);
                        echo "<div>New record created successfully</div>";
                    } catch (Exception $e) {
                        // Handle duplicate entry error
                        // You can customize this message as per your requirement
                        echo "<div class='error'>Email already exists!</div>";
                    }

                    // Close connection
                    $conn->close();
                }
            }
        ?>
    </div>
</body>
</html>