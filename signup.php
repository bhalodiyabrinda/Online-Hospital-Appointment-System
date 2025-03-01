<?php
include_once ("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHP MAILER/PHPMailer.php');
require('PHP MAILER/SMTP.php');
require('PHP MAILER/Exception.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> WEBSITE</title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

   </head>
<style>

  body {
    font-family: Arial, sans-serif;
    background-image: url('a.jpg');
    background-size: cover;
    background-position: center;
    color: #fff;
    
}

.container {
    max-width: 600px; /* Increase the maximum width */
    margin: 100px auto;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.title {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
}

.input-box {
    margin-bottom: 20px;
    padding-right:30px;
}

.details {
    font-weight: bold;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
    color: #000; /* Text color */
}

.submit {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
}

.submit:hover {
    background-color: #0056b3;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 80%;
}

.button {
    text-align: center;
} 



</style>
<script src="validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#registrationForm').validate({
        rules: {
          name: {
            required: true
          },
          user: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
          phone: {
            required: true,
            minlength: 10,
            maxlength: 10,
            digits: true
          },
          pwd: {
            required: true,
            minlength: 8
          },
          pass: {
            required: true,
            equalTo: '#password'
          }
        },
        messages: {
          name: {
            required: 'Please enter your full name'
          },
          user: {
            required: 'Please enter a username'
          },
          email: {
            required: 'Please enter your email',
            email: 'Please enter a valid email address'
          },
          phone: {
            required: 'Please enter your phone number',
            minlength: 'Phone number must be 10 digits',
            maxlength: 'Phone number must be 10 digits',
            digits: 'Please enter only digits'
          },
          pwd: {
            required: 'Please enter a password',
            minlength: 'Password must be at least 8 characters long'
          },
          pass: {
            required: 'Please confirm your password',
            equalTo: 'Passwords do not match'
          }
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
  </script>
<body>
  <div class="container">
    <div class="title"><h1>Registration</h1></div>
    <div class="content">
      <form action="register.php" id="registrationForm" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" id="name" placeholder="Enter your name" name="name">
            <span id="name_err" style="padding-top:2px; color:red;"></span>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" id="user" placeholder="Enter your username" name="user" >
            <span id="user_error" style="padding-top:2px; color:red;"></span>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" id="email" placeholder="Enter your email" name="email" >
            <span id="em_err" style="padding-top:2px; color:red;"></span>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" id="phone" placeholder="Enter your number" name="phone" >
            <span id="phone_err" style="padding-top:2px; color:red;"></span>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" id="password" placeholder="Enter your password" name="pwd">
            <span id="pass_err" style="padding-top:2px; color:red;"></span>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" id="pass" placeholder="Confirm your password">
            <span id="passc_err" style="padding-top:2px; color:red;"></span>
          </div>
          <div class="input-box">
            <span class="details">Date Of Birth</span>
            <input type="date" id="date" placeholder="YYYY-MM-DD" name="date">
            <span id="date_err" style="padding-top:2px; color:red;"></span>
          </div>
        </div>
        <div class="input-box">
        <span class="details">Profile Picture</span>
        <input type="file" id="myFile" name="filename">
        <span id="pic_err" style="padding-top:2px; color:red;"></span>
        </div>
        <div class="button">
          <a href="loginpage.php"><input class="submit" type="submit" value="Register" name="btn"></a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>