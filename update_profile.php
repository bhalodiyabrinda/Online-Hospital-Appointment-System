//<?php

// // // // Include your database connection script

// // // include_once('connection.php');
// // // include_once("session.php");

// // // // Check if the form is submitted
// // // if (isset($_POST['btn'])) {
// // //     // Print the received form data
    
// // //     // Retrieve form data
// // //     $name = $_POST['name1'];
// // //     $phone = $_POST['phone1'];
// // //     $dob = $_POST['dob1'];
// // //     $username = $_POST['username1'];

// // //     // Prepare UPDATE query to update user's data
// // //     $stmt = $con->prepare("UPDATE register SET name = ?, phone = ?, DOB = ? WHERE username = ?");
// // //     $stmt->bind_param("ssss", $name, $phone, $dob, $username);

// // //     // Execute the query
// // //     if ($stmt->execute()) {
// // //         >?
// // //         <script>
// // //             alert("Profile Updated Succesfully"); 
// // //             window.location.href = 'edituser.php';
// // //         </script>
// // //         <?php
// // //     } else {
// // //         echo "Error updating profile: " . $con->error;
// // //     }

// // //     // Close the statement
// // //     $stmt->close();
    

// // //     if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
// // //         // Get the file details
// // //         $file_name = $_FILES['profile_pic']['name'];
// // //         $file_tmp = $_FILES['profile_pic']['tmp_name'];

// // //         // Move the uploaded file to the desired location
// // //         $upload_dir = 'css/uploads/'; // Directory to upload files
// // //         $file_path = $upload_dir . $file_name;
// // //         if(move_uploaded_file($file_tmp, $file_path)) {
// // //             // File uploaded successfully
// // //             // Update the database with the file path
// // //             $sql = "UPDATE register SET profile_pic = ? WHERE username = ?";
// // //             $stmt = $con->prepare($sql);
// // //             $stmt->bind_param("ss", $file_path, $_SESSION['username']); // Assuming you have stored the username in session
// // //             if($stmt->execute()) {
// // //                 // Database updated successfully
// // //                 echo "<script>alert('Profile picture updated successfully');</script>";
// // //             } else {
// // //                 echo "<script>alert('Error updating profile picture');</script>";
// // //             }
// // //             $stmt->close();
// // //         } else {
// // //             echo "<script>alert('Error uploading file');</script>";
// // //         }
// // //     } else {
// // //         echo "<script>alert('No file selected');</script>";
// // //     }
// // // }


// // // // Close the database connection
// // // $con->close();



// // // new code 
// // // Include your database connection script
// // include_once('connection.php');
// // include_once("session.php");

// // // Check if the form is submitted
// // if (isset($_POST['btn'])) {
// //     // Retrieve form data
// //     $name = $_POST['name1'];
// //     $phone = $_POST['phone1'];
// //     $dob = $_POST['dob1'];
// //     $username = $_POST['username1'];

// //     // Prepare UPDATE query to update user's data
// //     $stmt = $con->prepare("UPDATE register SET name = ?, phone = ?, DOB = ? WHERE username = ?");
// //     $stmt->bind_param("ssss", $name, $phone, $dob, $username);

// //     // Execute the query
// //     if ($stmt->execute()) {
// //         // Check if a file is selected for upload
// //         if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
// //             // Get the file details
// //             $file_name = $_FILES['profile_pic']['name'];
// //             $file_tmp = $_FILES['profile_pic']['tmp_name'];

// //             // Move the uploaded file to the desired location
// //             $upload_dir = 'css/uploads/'; // Directory to upload files
// //             $file_path = $upload_dir . $file_name;
// //             if (move_uploaded_file($file_tmp, $file_path)) {
// //                 // File uploaded successfully
// //                 // Update the database with the file path
// //                 $sql = "UPDATE register SET profile_pic = ? WHERE username = ?";
// //                 $stmt = $con->prepare($sql);
// //                 $stmt->bind_param("ss", $file_path, $_SESSION['username']); // Assuming you have stored the username in session
// //                 if ($stmt->execute()) {
// //                     // Database updated successfully
// //                     ?>
// //                     <script>
// //                         alert('Profile updated successfully');
// //                         window.location.href = 'edituser.php';
// //                     </script>
// //                     <?php
// //                 } else {
// //                     echo "<script>alert('Error updating profile picture');</script>";
// //                 }
// //                 $stmt->close();
// //             } else {
// //                 echo "<script>alert('Error uploading file');</script>";
// //             }
// //         } else {
// //             echo "<script>alert('No file selected');</script>";
// //         }
// //     } else {
// //         echo "Error updating profile: " . $con->error;
// //     }

// //     // Close the statement
// //     $stmt->close();
// // }

// // // Close the database connection
// $con->close();
include_once('connection.php');
include_once('session.php');

if (isset($_POST['btn'])) {
    $name = $_POST['name1'];
    $phone = $_POST['phone1'];
    $dob = $_POST['dob1'];
    $username = $_POST['username1'];

    // Check if file upload is successful
    if ($_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_pic']['tmp_name'];
        $fileName = $_FILES['profile_pic']['name'];
        $fileSize = $_FILES['profile_pic']['size'];
        $fileType = $_FILES['profile_pic']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Create unique file name to avoid overwriting existing files
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Directory where uploaded files will be saved
        $uploadDirectory = 'css/uploads/';

        // Move the uploaded file to the specified directory
        $destPath = $uploadDirectory . $newFileName;
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // Update profile picture path in the database
            $sql = "UPDATE register SET profile_pic = '$destPath' WHERE username = '$username'";
            if ($con->query($sql) === TRUE) {
                echo '<script>alert("Profile picture updated successfully!");</script>';
            } else {
                echo '<script>alert("Error updating profile picture: ' . $con->error . '");</script>';
            }
        } else {
            echo '<script>alert("Failed to upload profile picture.");</script>';
        }
    }

    // Update other profile information in the database
    $updateQuery = "UPDATE register SET name = ?, phone = ?, DOB = ? WHERE username = ?";
    $stmt = $con->prepare($updateQuery);
    $stmt->bind_param("ssss", $name, $phone, $dob, $username);
    if ($stmt->execute()) {
        echo '<script>alert("Profile updated successfully!");</script>';
        header('Location: edituser.php');
    } else {
        echo '<script>alert("Error updating profile: ' . $stmt->error . '");</script>';
    }
}
?>