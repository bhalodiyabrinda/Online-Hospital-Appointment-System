<?php
session_start();
if (!isset($_SESSION['username'])) {
    // header('Location: loginpage.php');
    echo $_SESSION['username'];
    exit(); // It's good practice to exit after a redirect to prevent further execution
}

// If session email is set, continue with the rest of the code
?>