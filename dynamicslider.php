<?php
$con = mysqli_connect("localhost", "root", "", "hospital");

if (isset($_POST["submit"])) { // Change from $_REQUEST to $_POST and specify the method in the form
    $file = $_FILES["file"]["name"];
    $temp_name = $_FILES["file"]["tmp_name"]; // Correct typo here
    $path = "Images/" . $file; // Correct typo here

    move_uploaded_file($temp_name, $path);

    mysqli_query($con, "INSERT INTO slider (image) VALUES ('$file')"); // Add $con for database connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data"> <!-- Specify method and enctype -->
        Image Upload: <input type="file" name="file">
        <br>
        <input type="submit" name="submit" value="Upload Image">
    </form>
</body>
</html>
