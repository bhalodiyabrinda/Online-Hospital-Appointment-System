<?php
// include_once("connection.php");


// if(isset($_POST['btn']))
// {
//   // Fatch ID PSW
//   $em = $_POST['em'];
//   $psw = $_POST['psw'];

//   $con = mysqli_connect("localhost", "root", "", "hospital");

//   $q = "SELECT * FROM register WHERE email='$em' and password='$psw'";
//     $result=mysqli_query($con,$q);
//     $count = mysqli_num_rows($result);
//     $data = mysqli_fetch_array($result);

//     if($result){
//       if($count == 1){
//         if($data[9] == "Active"){
//           session_start();
//           $_SESSION['username'] = $data['username'];
//           ?>
<!-- //           <script>alert('login successfull!'); -->
<!-- //                     alert($data); -->

        </script>
           <?php
//         setcookie("success", "OTP to reset your password is sent to your registered email address", time() + 2, "/");
//         ?>
         <script>
//           window.location.href = "second.php";
//         </script>
//         <?php
//         }
//         else{
//           ?>
<!-- //           <script>alert('Your Email is incorrcet, Please chech it');</script> -->
           <?php
//           setcookie("error", "Error in sending OTP. Please try again later.", time() + 2, "/");
//         }
//       }
//       else{
//         ?>
          <!-- <script>alert('Your Password is incorrect, Please check it');</script> -->
        <?php
        // setcookie("error", "Error in sending OTP. Please try again later.", time() + 2, "/");
        ?>
        <script>
          // windows.location.href = "1.php";
          // window.location.href = "loginpage.php";
        </script>
        <?php
//       }
//      }
// }

// new code
include_once("connection.php");

if(isset($_POST['btn'])) {
    $em = $_POST['em'];
    $psw = $_POST['psw'];

    // Prepare and execute the SQL query
    $q = "SELECT * FROM register WHERE email='$em' AND password='$psw'";
    $result = mysqli_query($con, $q);

    if ($result) {
        $count = mysqli_num_rows($result);
        $data = mysqli_fetch_array($result);

        if ($count == 1) {
            if ($data['status'] == "Active") {
                session_start();
                $_SESSION['email'] = $data['email'];
                $_SESSION['username'] = $data['username'];
                header("Location: second.php");
                exit();
            } else {
                echo "<script>alert('Your account is not active. Please activate your account.');</script>";
            }
        } else {
            echo "<script>alert('Invalid email or password. Please try again.');</script>";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?famil=Jost:wgth@500&display=swap">
  <script src="css/bootstrap.css"></script>
  <script src="js/bootstrap.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style.css">
  <title>login-page</title>
  <style>
    body{
      height: 100%;
      width: 100%;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Jost' , sans-serif;
      background: url(a.jpg);
      background-position: center;
      background-size: cover;
      position: relative;
    }
    .main{
      width: 450px;
      height: 550px;
      overflow: hidden;
      border-radius: 40px;
      backdrop-filter: blur(10px);
      border: 3px solid rgb(135, 131, 131);
      box-shadow: 5px 20px 50px #000;
    }
    .signup{
      position: relative;
      width: 100%;
      height: 100%;
    }
    label{
      color: #fff;
      font-size: 2.3em;
      justify-content: center;
      display: flex;
      margin: 50px;
      font-weight: bold;
      cursor: pointer;
      transition: .5s ease-in-out;
    }
    input{
      width: 60%;
      height: 40px;
      background: #fff;
      justify-content: center;
      display: flex;
      margin: 10px auto;
      padding: 10px;
      border: none;
      outline: none;
      border-radius: 5px;
    }
    a{
      margin-left: -120px;
      color: #3046d7;
      text-decoration: none;

    }
    button{
      width: 60%;
      height: 40px;
      margin: 10px auto;
      justify-content: center;
      display: block;
      color: #fff;
      background: #3046d7;
      font-size: 1em;
      font-weight: bold;
      margin-top: 20px;
      outline: none;
      border: none;
      border-radius: 5px;
      transition: .2s ease-in;
      cursor: pointer;
    }
    button:hover{
      background: #3046d7;
      
    }
    .login{
      height: 520px;
      background: #eee;
      border-radius: 60% / 10%;
      transform: translateY(-180px);
      transition: .8s ease-in-out;
    }
    .login label{
      transform: scale(.6);
    }
    .label{
      color: #3046d7;
    }
    
    
    .error{
      color: rgb(206, 46, 46);
      font-size: 15px;
      margin-top: 0;
      margin-bottom: 0;
    }
    
    
  </style>

  <body>
  <script src="jquery-3.7.1.min.js"></script>
  <script src="jquery.validate.js"></script>
  <script>
      $(document).ready(function () {
          
          $.validator.addMethod("emregex", function(value, element){
              regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              return regex.test(value);
          },"Email adress is not formatted");
          $.validator.addMethod("pswregex", function(value, element){
              regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+}{":;'?/>.<,])(?=.*[^\w\d\s])\S{6,}$/;
              return regex.test(value);
          },"Password is not formatted");
          $('#form1').validate({
              rules: {
                  
                  em:{
                      required:true,
                      emregex:true
                  },
                  psw:{
                      required:true,
                      pswregex:true
                  }
              },
              messages:{
                  fn:{
                      required: "Fullname is required field",
                      minlength: "Fullname must contain 2 characters",
                      maxlength: "Fullname cannot be greater than 20 characters"
                  },
                  em:{
                      required: "Email is required field"
                  },
                  psw:{
                      required: "password is required field"
                  }
              },
              errorPlacement: function(error, element){
                  
                  if (element.attr('name')== "em"){
                      $('#em_err').html(error);
                  }
                  if (element.attr('name')== "psw"){
                      $('#psw_err').html(error);
                  }
              }
          })
      });

      $(document).ready(function () {
        $.validator.addMethod("fnregex", function(value, element){
          regex = /^[a-zA-Z]+$/;
          return regex.test(value);
          },"Fullname must contain only letters");
          $.validator.addMethod("em_regex", function(value, element){
              regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              return regex.test(value);
          },"Email adress is not formatted");
          // $.validator.addMethod("ps_wregex", function(value, element){
          //     regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+}{":;'?/>.<,])(?=.*[^\w\d\s])\S{6,}$/;
          //     return regex.test(value);
          // },"Password is not formatted");
          $('#form2').validate({
              rules: {
                fn:{
                  required:true,
                  minlength:2,
                  maxlength:20,
                  fnregex:true
              },
                  em_:{
                      required:true,
                      emregex:true
                  },
                  psw_:{
                      required:true,
                      pswregex:true
                  }
              },
              messages:{
                  em_:{
                      required: "Email is required field"
                  },
                  psw_:{
                      required: "password is required field"
                  }
              },
              errorPlacement: function(error, element){
                if (element.attr('name')== "fn"){
                  $('#fn_err').html(error);
              }
                  if (element.attr('name')== "em_"){
                      $('#em_err_').html(error);
                  }
                  // if (element.attr('name')== "psw_"){
                  //     $('#psw_err_').html(error);
                  // }
              }
          })
      });
  </script>
</head>
<body>
  <div class="main">
    <div class="signup">
      <form id="form1" action="loginpage.php" method="POST">
        <label for="chk" aria-hidden="true">Login </label>
        <br>
        <input type="email" name="em" id="em1" placeholder="Email">
        <p id="em_err"></p>
        <input type="password" name="psw" id="psw1" placeholder="Password">
        <p id="psw_err"></p>
        <a href="ForgetPassword.php">Forget Password?</a>
        <!-- <a href="second.php"></a> -->
        <button type="submit" name="btn">Login</button>
      </form>
    </div>

    <?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// if(isset($_POST['btn']))
// {
//   // Fetch email and password from the form
//   $em = $_POST['em'];
//   $psw = $_POST['psw'];

//   // Establish database connection
//   $con = mysqli_connect("localhost", "root", "", "hospital");

//   if (!$con) {
//     die("Connection failed: " . mysqli_connect_error());
//   }

//   // Prepare and execute the SQL query
//   $q = "SELECT * FROM `register` WHERE `email`='$em' AND `password`='$psw'";
//   $result = mysqli_query($con, $q);

//   if (!$result) {
//     die("Query failed: " . mysqli_error($con));
//   }

//   // Check the number of rows returned by the query
//   $count = mysqli_num_rows($result);

//   if($count == 1) {
//     // Fetch data from the query result
//     $data = mysqli_fetch_array($result);

//     if($data[9] == "Active") {
//       session_start();
//       $_SESSION['email'] = $data['email'];
//       ?>
//       <script>
//         alert('Succesfull Login !!!');
//         window.location.href = 'second.php';
//       </script>
//       <?php
//     } else {
//       echo "<script>alert('Account is not active. Please try again later.');</script>";
//     }
//   } else {
//     echo "<script>alert('Invalid email or password. Please try again.');</script>";
//   }

 
// }
?>

  </div>
</body>
</html>
