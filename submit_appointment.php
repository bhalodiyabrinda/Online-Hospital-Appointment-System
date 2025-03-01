<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect user to login page if not logged in
    header("Location: loginpage.php");
    exit();
}

// Get session email
$email = $_SESSION['email'];

// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your database password
$dbname = "hospital";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO appointments (name, email, phone, date, time, reason) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $email, $phone, $date, $time, $reason);

// Set parameters and execute
$name = $_POST['name'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$reason = $_POST['reason'];

$stmt->execute();

$stmt->close();
$conn->close();

// Redirect user to a confirmation page or any other appropriate page
header("Location: confirmation.php");
exit();
?>
