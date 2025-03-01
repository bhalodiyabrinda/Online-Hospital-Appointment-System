<?php
$con=mysqli_connect("localhost","root","","hospital");
if(isset($_POST['btn'])){
    $name=$_POST['name'];
    $sp=$_POST['sp'];
    $status=$_POST['status'];
    $photo = $_FILES['photo']['name'];
    $token = uniqid() . uniqid();
    $photo_name = uniqid() . $photo;
    
        $up = "INSERT INTO doctors (photo, name,specialist, status) VALUES ('$photo','$name','$sp','$status')";

        if (mysqli_query($con, $up)) {
            if (!is_dir("images/profile_pictures")) {
                mkdir("images/profile_pictures");
            }
            move_uploaded_file($_FILES['photo']['tmp_name'], "images/profile_pictures/" . $photo_name);
 ?>
        <script>
              window.location.href="addnew.php";
         </script>
         <?php
         }else{
            $up="insert into doctors (name,specialist,status) VALUES ('$name','$sp','$status')";
             $upd=mysqli_query($con,$up);
               ?><script>
             window.location.href="addnew.php";
         </script><?php
     }
 }
 ?>