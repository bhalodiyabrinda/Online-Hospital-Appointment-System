<?php
// session_start();
// Include your database connection script
// include_once('connection.php');
// include_once('session.php');
// // echo $_SESSION['username'];

// // Check if form is submitted
// if (isset($_POST['btn'])) {
//     // Get input values
//     $oldPassword = $_POST['oldPassword'];
//     $newPassword = $_POST['newPassword'];
//     $confirmPassword = $_POST['confirmPassword'];
    
//     // Validate input
//     if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
//         echo '<script>alert("All fields are required.");</script>';
//     } elseif ($newPassword !== $confirmPassword) {
//         echo '<script>alert("New password and confirm password do not match.");</script>';
//     } else {
//         // Check if old password matches the one in the database
//         $username = $_SESSION['username'];
//          // Assuming you have stored the username in a session
//         $query = "SELECT email,password FROM register WHERE username = ?";
//         $stmt = $con->prepare($query);
//         $stmt->bind_param("s", $username);
//         $stmt->execute();
//         $result = $stmt->get_result();

//         if ($result->num_rows == 1) {
//             $row = $result->fetch_assoc();
//             $hashedPassword = $row['password'];
//             // Verify old password
//             if (password_verify($oldPassword, $hashedPassword)) {
//                 echo "Old password matches!";
//                 // Update new password
//                 $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
//                 $updateQuery = "UPDATE register SET password = ? WHERE username = ?";
//                 $stmt = $con->prepare($updateQuery);
//                 $stmt->bind_param("ss", $hashedNewPassword, $username);
//                 if ($stmt->execute()) {
//                     // Password updated successfully
//                     echo '<script>alert("Password updated successfully!");</script>';
//                 } else {
//                     // Error updating password
//                     echo '<script>alert("Error updating password: ' . $stmt->error . '");</script>';
//                 }
//             } else {
//                 // Old password does not match
//                 echo '<script>alert("Old password is incorrect.");</script>';
//             }
//         } else {
//             // Username not found in database
//             echo '<script>alert("User not found.");</script>';
//         }
//     }
// }

include_once('connection.php');
include_once('session.php');

if (isset($_POST['btn'])) {
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    
    if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
        echo '<script>alert("All fields are required.");</script>';
    } elseif ($newPassword !== $confirmPassword) {
        echo '<script>alert("New password and confirm password do not match.");</script>';
    } else {
        $username = $_SESSION['username'];
        $query = "SELECT password FROM register WHERE username = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $oldHashedPassword = $row['password'];
            if ($oldPassword === $oldHashedPassword) {
                // echo "Old password matches!";
                $updateQuery = "UPDATE register SET password = ? WHERE username = ?";
                $stmt = $con->prepare($updateQuery);
                $stmt->bind_param("ss", $newPassword, $username);
                if ($stmt->execute()) {
                    echo '<script>alert("Password updated successfully!");
                    window.location.href = "second.php"</script>';
                    
                } else {
                    echo '<script>alert("Error updating password: ' . $stmt->error . '");</script>';
                }
            } else {
                echo '<script>alert("Old password is incorrect.");</script>';
            }
        } else {
            echo '<script>alert("User not found.");</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
   <style>
body {
    background-image: url('a.jpg');
    padding-top:250px;
    background-size: cover;
    background-position:center;
    font-family: Arial, sans-serif; /* Change the font family as needed */
    color: #fff; /* Change text color */
}

.container {
    margin-top: -120px;
    width: 400px;
    margin-left: auto;
    margin-right: auto;
}

form {
    background-color: rgba(0, 0, 0, 0.4); /* Semi-transparent background for better readability */
    padding: 20px;
    border-radius: 40px;
    backdrop-filter: blur(10px);
    border: 3px solid rgb(135, 131, 131);
    box-shadow: 5px 20px 50px #000;
}

h1 {
    text-align: center;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="password"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background for better readability */
    color: #000; /* Change text color */
}

.invalid-feedback {
    color: #dc3545;
    font-size: 80%;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>

</head>
<body>
<div class="container">
        <form id="passwordForm" action="change_password.php" method="POST">
            <h1>Change Password</h1>
            <div class="form-group">
                <label for="oldPassword">Old Password</label>
                <input type="password" name="oldPassword" class="form-control" id="oldPassword" placeholder="Enter Old Password" required>
            </div>
            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Enter New Password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm New Password</label>
                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm New Password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="btn">Submit</button>
        </form>
    </div>

    <script>
        // JavaScript validation
        document.getElementById('passwordForm').addEventListener('submit', function(event) {
            var oldPassword = document.getElementById('oldPassword').value;
            var newPassword = document.getElementById('newPassword').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            // Check if old password is empty
            if (!oldPassword) {
                document.getElementById('oldPassword').classList.add('is-invalid');
                event.preventDefault();
            } else {
                document.getElementById('oldPassword').classList.remove('is-invalid');
            }
            // Check if new password is empty
            if (!newPassword) {
                document.getElementById('newPassword').classList.add('is-invalid');
                event.preventDefault();
            } else {
                document.getElementById('newPassword').classList.remove('is-invalid');
            }

            // Check if confirm password is empty and matches new password
            if (!confirmPassword || confirmPassword !== newPassword) {
                document.getElementById('confirmPassword').classList.add('is-invalid');
                event.preventDefault();
            } else {
                document.getElementById('confirmPassword').classList.remove('is-invalid');
            }
        });
    </script>
</body>
</html>

