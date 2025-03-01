<?php
// Include database connection code here if not already included
include "conn.php";
include_once "nav.php";
// Check if appointment ID is provided in the URL
if (!isset($_GET['id'])) {
    // Redirect user to admin appointments page if ID is not provided
    header("Location: appointments.php");
    exit();
}

// Get appointment ID from the URL
$id = $_GET['id'];

// Query to delete appointment by ID
$sql = "DELETE FROM appointments WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    // Redirect user to admin appointments page after successful deletion
    header("Location: admin_appointments.php");
    exit();
} else {
    // Handle error
    echo "Error deleting appointment: " . $conn->error;
}

$conn->close();
?>
