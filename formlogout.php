<?php

    include "connection.php";
    // session_start();
    if(isset($_POST['btnlgout']))
    {
        session_destroy();
        echo "logout";
        header('Location: index.php');
        exit();
    }

?>