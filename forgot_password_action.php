<?php
include_once("guestheader.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHP MAILER\PHPMailer.php');
require('PHP MAILER\SMTP.php');
require('PHP MAILER\Exception.php');

if (isset($_POST['btn'])) {
    $em = $_POST['email'];
    $otp_entered = $_POST['otp']; // Get the entered OTP
    $q = "select * from register where email='$em'";
    $result = mysqli_query($con, $q);

    $count = mysqli_num_rows($result);
    if ($count == 1) {

        $q1 = "select * from token where Email='$em'";
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
                    $mail->Password = 'bnyf sohk tlqv sewd';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
                    $_SESSION['forgot_em'] = $em;
                    $_SESSION['forgot_token'] = $token;
                    $mail->setFrom('mahekbabariya18@gmail.com', 'Mahek Babariya');
                    while ($row = mysqli_fetch_array($result)) {
                        $mail->addAddress($em, $row[0]);
                    }

                    $mail->isHTML(true);
                    $mail->Subject = 'Password Reset';
                    $mail->Body = 'Your otp to reset your account password is ' . $otp;

                    if ($mail->send()) {
                        setcookie("success", "OTP to reset your password is sent to your registered email address", time() + 2, "/");
            ?>
                        <script>
                            alert("Succesfull");
                            window.location.href = "Forgot_password_otp.php";
                        </script>
                    <?php
                    } else {
                        setcookie("error", "Error occurred", time() + 2, "/");
                    ?>
                        <script>
                            alert('Error 1');
                            window.location.href = "ForgetPassword.php";
                        </script>
        <?php
                    }
                } catch (Exception $e) {
                    alert('Error 2');
                    echo "Email sending failed. Error: {$mail->ErrorInfo}";
                }
            }
        }
    } else {
        setcookie('error', 'Email id is not registered', time() + 2, "/");
?>
        <script>
            alert('Email is incorrect');
            window.location.href = "ForgetPassword.php";
        </script>
<?php
    }
} else if (isset($_POST['reset_submit'])) { // Check if reset OTP form is submitted
    $em = $_SESSION['forgot_em']; // Get email from session
    $entered_otp = $_POST['otp']; // Get entered OTP
    $q = "select * from token where Email='$em' AND OTP=$entered_otp"; // Check if entered OTP is correct
    $result = mysqli_query($con, $q);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        // OTP is correct, proceed with password reset
        // Implement password reset logic here
        // Redirect user to password reset page or perform necessary actions
    } else {
        ?>
        <script>
            alert('Wrong OTP');
        </script>
        <?php
        // Wrong OTP entered, redirect back to same page with error message
        setcookie("error", "Wrong OTP entered. Please try again.", time() + 2, "/");
        ?>
        <script>
            alert('Wrong OTP');
            window.location.href = "Forgot_password_otp.php";
        </script>
<?php
    }
}
?>
