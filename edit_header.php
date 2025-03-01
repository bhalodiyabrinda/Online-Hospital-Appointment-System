<?php
session_start();
include_once("connection.php");
$url = $_SERVER['REQUEST_URI'];
// echo $url;
$url = parse_url($url, PHP_URL_PATH);
$arr_url = explode("/", $url);
//echo $arr_url[3];

if (!isset($_SESSION['email'])) {
?>
    <script>
        window.location.href = "loginpage.php";
    </script>
<?php
}
?>