<?php
include_once("guestheader.php");
if (isset($_POST['btn'])) {
    $pwd = $_POST['pswd'];
    $em = $_SESSION['forgot_em'];
    $token = $_SESSION['forgot_token'];
    $q = "update register set password='$pwd' where email='$em'";
    if (mysqli_query($con, $q)) {
        $q1 = "delete from token where email='$em' and token='$token'";
        if (mysqli_query($con, $q1)) {
            unset($_SESSION['forgot_em']);
            unset($_SESSION['forgot_token']);
            setcookie('success', 'Password reset successfull', time() + 2, "/");
        }
    } else {
        setcookie('error', 'Error in resetting password', time() + 2, "/");
    }
?>
    <script>
        window.location.href = "loginpage.php";
    </script>
<?php
}