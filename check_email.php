<?php
include_once("connection.php");

$em = $_REQUEST['email'];
$q = "select * from registration where email='$em'";
$result = mysqli_query($con, $q);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "email registered";
}