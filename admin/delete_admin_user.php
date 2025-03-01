<?php
// Check if user ID is provided
if(isset($_GET['id']) && !empty($_GET['id'])){
    $user_id = $_GET['id'];

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

    // Delete user from the database
    $sql = "DELETE FROM adminuser WHERE id='$user_id'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the users page
        header("Location: delete_user.php");
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "User ID not provided";
}
?>