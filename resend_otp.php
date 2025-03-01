<?php
include_once("guestheader.php");

use PHPMAILER\PHPMailer\PHPMailer;
use PHPMAILER\PHPMailer\SMTP;
use PHPMAILER\PHPMailer\Exception;

require('PHP MAILER/PHPMailer.php');
require('PHP MAILER/SMTP.php');
require('PHP MAILER/Exception.php');

$em = $_SESSION['forgot_em'];

// Check if the 'registration' table exists in the database
$table_check_query = "SHOW TABLES LIKE 'register'";
$table_exists = mysqli_query($con, $table_check_query);
if (!$table_exists || mysqli_num_rows($table_exists) == 0) {
    die("Error: 'register' table doesn't exist in the database.");
}

$q = "SELECT * FROM register WHERE email='$em'";
$result = mysqli_query($con, $q);

if (!$result) {
    die("Error: " . mysqli_error($con));
}

$q1 = "SELECT * FROM token WHERE Email='$em'";
$countem = mysqli_num_rows(mysqli_query($con, $q1));
if ($countem == 1) {
    setcookie('error', "OTP for resetting password is sent to your registered email address. New OTP will be generated if old OTP expires", time() + 2, "/");
?>
    <script>
        window.location.href = "Forgot_password_otp.php";
    </script>
    <?php
} else {
    date_default_timezone_set("Asia/Kolkata");
    $s_time = date("Y-m-d G:i:s");

    $token = hash('sha512', $s_time);
    $otp = mt_rand(100000, 999999);
    $ins_token = "INSERT INTO token VALUES ('','$em','$s_time','$token',$otp)";
    
    if (mysqli_query($con, $ins_token)) {
        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'mahekbabariya18@gmail.com';
            $mail->Password = '';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $_SESSION['forgot_token'] = $token;
            $mail->setFrom('mahekbabariya18@gmail.com', 'Mahek Babariya');
            while ($row = mysqli_fetch_array($result)) {
                $mail->addAddress($em, $row[0]);
            }

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset';
            $mail->Body = 'Your OTP to reset your account password is ' . $otp;

            if ($mail->send()) {
                setcookie("success", "OTP to reset your password is sent to your registered email address", time() + 2, "/");
?>
                <script>
                    window.location.href = "Forgot_password_otp.php";
                </script>
            <?php
            } else {
                setcookie("error", "Error in sending OTP. Please try again later.", time() + 2, "/");
            ?>
                <script>
                    window.location.href = "ForgetPassword.php";
                </script>
<?php
            }
        } catch (Exception $e) {
            echo "Email sending failed. Error: {$mail->ErrorInfo}";
        }
    } else {
        die("Error: " . mysqli_error($con));
    }
}
?>