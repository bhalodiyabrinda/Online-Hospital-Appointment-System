<?php
include ('guestheader.php');
require 'connection.php'; // Include your database connection script
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHP MAILER/PHPMailer.php';
require 'PHP MAILER/SMTP.php';
require 'PHP MAILER/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['user'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['date'];
    $password = $_POST['pwd'];
    $profilePic = $_FILES['filename']['name']; // Get the file name of the uploaded profile picture

    // Hash the password for security
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Generate a random token for email verification
    $verificationToken = md5(uniqid(rand(), true));

    // Check if the phone number already exists in the database
    $checkPhoneQuery = $con->prepare("SELECT * FROM register WHERE phone = ?");
    $checkPhoneQuery->bind_param("s", $phone);
    $checkPhoneQuery->execute();
    $result = $checkPhoneQuery->get_result();

    if ($result->num_rows > 0) {
        // Phone number already exists, handle the error
        echo "Sorry, this phone number is already registered.";
        exit; // Stop execution to prevent further processing
    }

    // Upload and store the profile picture
    $targetDirectory = "D:\\xampp\\htdocs\\website\\css\\uploads\\";
    $targetFile = $targetDirectory . basename($_FILES["filename"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["filename"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["filename"]["size"] > 10000000) { // 10 MB
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["filename"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["filename"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Insert user data into the database
    $stmt = $con->prepare("INSERT INTO register (name, username, email, phone, password, profile_pic, DOB, verification_token) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $name, $username, $email, $phone, $password, $profilePic, $dob, $verificationToken);

    if ($stmt->execute()) {
        // Send verification email
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'mahekbabariya18@gmail.com'; // SMTP username
            $mail->Password = 'bnyf sohk tlqv sewd'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, ssl also accepted
            $mail->Port = 465; // TCP port to connect to
            // $mail->SMTPDebug = 2;

            // Recipients
            $mail->setFrom('mahekbabariya18@gmail.com', 'Mahek Babariya'); // Sender's email address and name
            $mail->addAddress($email, $name); // Recipient's email address and name

            // Attachments
            //$mail->addAttachment('/path/to/attachment/file.pdf', 'Attachment.pdf'); // Path to the attachment and optional filename

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Account Verification';
            $mail->Body    = 'Congratulations! ' . $name . ' Your account has been created successfully. This email is for your account verification. <br> Kindly click on the link below to verify your account. You will be able to login into your account only after account verification. <br>
            <a href="http://localhost/website/verify.php?em=' . $email . '&token=' . $verificationToken . '">Click here to verify your account</a>';

            // Send the email
            if ($mail->send()) {
                setcookie("success", "Registration Successful. Activation mail is sent to your registered email account. Kindly activate your account to login.", time() + 2, "/");
?>
                <script>
                    window.location.href = "loginpage.php";
                </script>
            <?php
            } else {
                setcookie("error", "Error in sending mail. Please try again later.", time() + 2, "/");
            ?>
                <script>
                    window.location.href = "register.php";
                </script>
        <?php
            }
        } catch (Exception $e) {
            echo "Email sending failed. Error: {$mail->ErrorInfo}";
        }
    } else {
        // Error occurred while inserting data
        echo "Error in registration. Please try again later.";
    }
}
?>
