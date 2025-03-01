<?php
include ('guestheader.php');

// Check if email and verificationToken are set in the URL
if(isset($_REQUEST['em']) && isset($_REQUEST['token'])) {
    $email = $_REQUEST['em'];
    $verificationToken = $_REQUEST['token'];
    
    // Check if the database connection is established
    if(isset($con)) {
        // Prepare and execute the query
        $q = "SELECT * FROM register WHERE email='$email' AND verification_token='$verificationToken'";
        $result = mysqli_query($con, $q);

        // Check if the query executed successfully
        if($result) {
            $count = mysqli_num_rows($result);

            if ($count == 1) {
                while ($row = mysqli_fetch_array($result)) {
                    $status = $row[10];
                    if ($status == "Active") {
                        $_SESSION['success'] = "Account is already activated";
                    } else {
                        $updt = "UPDATE register SET status='Active' WHERE email='$email' AND verification_token='$verificationToken'";
                        if (mysqli_query($con, $updt)) {
                            setcookie('success', "Activation activated successfully", time() + 2, "/");
                        } else {
                            setcookie('error', "Error in activating Account. Please try again later.", time() + 2, "/");
                        }
                    }
                }
                ?>
                <script>
                    window.location.href = "loginpage.php";
                </script>
            <?php
            } else {
                setcookie('error', "Either Email is not registered or token is incorrect.", time() + 2, "/");
                ?>
                <script>
                    window.location.href = "register.php";
                </script>
                <?php
            }
        } else {
            echo "Error executing the query: " . mysqli_error($con);
        }
    } else {
        echo "Database connection is not established.";
    }
} else {
    echo "Email or verificationToken is missing in the URL.";
}
?>