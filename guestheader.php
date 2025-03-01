<?php
session_start();
include_once("connection.php");

//delete token for forget password
date_default_timezone_set("Asia/Kolkata");
$db_time = date("Y-m-d G:i:s", strtotime("-1 min"));
$q = "DELETE FROM token WHERE sent_time <= '$db_time'";
mysqli_query($con, $q);
?>
<br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($_COOKIE['success'])) {
                ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> <?php echo $_COOKIE['success']; ?>
                    </div>
                <?php
                }
                if (isset($_COOKIE['error'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error!</strong> <?php echo $_COOKIE['error']; ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
























        
<!-- Opening div tag should be placed here -->
 <!-- Closing div tag -->