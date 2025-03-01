<?php include_once('nav.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <?php
        // Check if user ID is provided
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $user_id = $_GET['id'];

            // Connect to the database (assuming you already have this code in 'nav.php' or somewhere else)
            include_once('conn.php');

            // Retrieve user data from the database
            $sql = "SELECT * FROM adminuser WHERE id='$user_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Display user data in a form for editing
                $row = $result->fetch_assoc();
                ?>
                <form action="edit_admin_user.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>"><br><br>
                    <input type="submit" value="Update">
                </form>
                <?php
            } else {
                echo "User not found";
            }

            // Close connection
            $conn->close();
        } else {
            echo "User ID not provided";
        }
    ?>
</body>
</html>
