<?php
// Include database connection code here if not already included
include "conn.php";
include_once "nav.php";
// Check if appointment ID is provided in the URL
if (!isset($_GET['id'])) {
    // Redirect user to admin appointments page if ID is not provided
    header("Location: admin_appointments.php");
    exit();
}

// Get appointment ID from the URL
$id = $_GET['id'];

// Query to select appointment by ID
$sql = "SELECT * FROM appointments WHERE id = $id";
$result = $conn->query($sql);

// Check if appointment exists
if ($result->num_rows == 1) {
    // Fetch appointment data
    $appointment = $result->fetch_assoc();
} else {
    // Redirect user to admin appointments page if appointment does not exist
    header("Location: admin_appointments.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $reason = $_POST['reason'];

    // Update appointment in the database
    $update_sql = "UPDATE appointments SET name='$name', email='$email', phone='$phone', date='$date', time='$time', reason='$reason' WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        // Redirect user to admin appointments page after successful update
        header("Location: appointment.php");
        exit();
    } else {
        // Handle error
        echo "Error updating appointment: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <style>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        input[type="time"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 15px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Appointment</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $appointment['name']; ?>" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $appointment['email']; ?>" required><br>
            <label for="phone">Phone:</label><br>
            <input type="tel" id="phone" name="phone" value="<?php echo $appointment['phone']; ?>" pattern="[0-9]{10}" required><br>
            <label for="date">Preferred Date:</label><br>
            <input type="date" id="date" name="date" value="<?php echo $appointment['date']; ?>" required><br>
            <label for="time">Preferred Time:</label><br>
            <input type="time" id="time" name="time" value="<?php echo $appointment['time']; ?>" required><br>
            <label for="reason">Reason for Appointment:</label><br>
            <textarea id="reason" name="reason" rows="4" cols="50" required><?php echo $appointment['reason']; ?></textarea><br><br>
            <input type="submit" value="Update Appointment">
        </form>
    </div>
</body>
</html>
