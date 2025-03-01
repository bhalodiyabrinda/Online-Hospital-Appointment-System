<?php
// Include your database connection script
include_once('connection.php');
include_once("session.php");


// Execute SELECT query to retrieve data
$sql = "SELECT name, DOB, phone, username, profile_pic FROM register WHERE username='" . $_SESSION['username'] . "'";
$result = $con->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Fetch data from each row
    while ($row = $result->fetch_assoc()) {
        $column1_value = $row['name'];
        $column2_value = $row['profile_pic'];
        $column3_value = $row['DOB'];
        $column4_value = $row['phone'];
        $column5_value = $row['username'];
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <!--*******Style Sheet links********-->
    <link rel="stylesheet" href="css/style.css">
    <!--*******import poppin fonts********-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--*******font-awesome for icons********-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        .error-message{
            color: red;
        }
    </style>
</head>
<body>
  <section class="navbar">
    <nav class="navigation">
      <!--**menu-btn**-->
      <input type="checkbox" class="menu-btn" id="menu-btn">
      <label for="menu-btn" class="menu-icon">
          <span class="nav-icon"></span>
      </label>

      <a href="#" class="logo"><img src="photo/Logo.png" width="200px" style="margin-right: 800px;"></a>


      <a href="second.php" class="nav-appointment-btn">Home</a>
  </nav>

  </section>
        <form action="update_profile.php" method="POST" enctype="multipart/form-data">
          <div class="row">
             <div class="col">
              <div class="card mb-4">
              <div class="card-body text-center">
        <?php
        // Check if $column2_value is not empty
        if (!empty($column2_value)) {
            echo '<img src="' . $column2_value . '" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">';
        } else {
            // If $column2_value is empty, display a placeholder image or an error message
            echo '<p>No image available</p>';
        }
        ?>
        <h5 class="my-3"><?php echo $column1_value; ?></h5>
        <div class="d-flex justify-content-center mb-2">
            <button type="button" id="editBtn" class="btn btn-primary me-2">Edit Profile</button>
            <a href= "change_password.php"><button type="button" id="change" class="btn btn-success" name="changebtn">Change Password </button></a>
        </div>
    </div>
              </div>
             
              </div>

            <div class="col">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3" style=" padding-top:8px;">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control profile-input" value="<?php echo $column1_value; ?>" name="name1"  >
                        <span class="error-message"></span>
                    </div>
                  </div>
                  <hr>
                  
      
                  <div class="row">
                    <div class="col-sm-3" style="padding-top:8px;">
                      <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                        <input type="number" class="form-control profile-input" value="<?php echo $column4_value; ?>" name="phone1"   >
                        <span class="error-message"></span>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3"  style="padding-top:8px;">
                      <p class="mb-0">Date Of Birth</p>
                    </div>
                    <div class="col-sm-9">
                        <input type="date" class="form-control profile-input" value="<?php echo $column3_value; ?>" name="dob1"  >
                        <span class="error-message"></span>
                    </div>
                  </div>
                  <hr>  
                  <div class="row">
                    <div class="col-sm-3" style="padding-top:8px;">
                      <p class="mb-0">Username</p>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="username1" class="form-control profile-input" value="<?php echo $column5_value; ?>"  >
                        <span class="error-message"></span>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3" style="padding-top:8px;">
                      <p class="mb-0">Profile Picture</p>
                    </div>
                    <div class="col-sm-9">
                    <input type="file" class="form-control profile-input" name="profile_pic" accept="image/*">
                        <span class="error-message"></span>
                        <br>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                    <button type="submit" id="saveBtn" class="btn btn-success" name="btn">Save Profile</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>

    <footer id="footer">
      <div class="footer-container">


          <div class="footer-company-box">
      
              <a href="#" class="logo"><img src="photo/Logo.png" width="170px"></a>
       
              <p>Follow us for new updates</p>
         
              <div class="footer-social">
                  <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                  <a href="#"><i class="fa-brands fa-instagram"></i></a>
                  <a href="#"><i class="fa-brands fa-youtube"></i></a>
                  <a href="#"><i class="fa-brands fa-twitter"></i></a>
              </div>
          </div>
      
        
          <div class="footer-link-box">
              <strong>Main Link's</strong>
              <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">About</a></li>
                  <li><a href="#">Review</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Book</a></li>
                  <li><a href="#">Doctors</a></li>
              </ul>
          </div>
              
          <div class="footer-link-box">
              <strong>Our Services</strong>
              <ul>
                  <li><a href="#">Dental care</a></li>
                  <li><a href="#">Message therapy</a></li>
                  <li><a href="#">Cardiology</a></li>
                  <li><a href="#">Ambulance services</a></li>
                  <li><a href="#">diagnosis</a></li>
              </ul>
          </div>

          <div class="footer-link-box">
              <strong>Contact info</strong>
              <ul>
                  <li><a href="#">+202-646-1377</a></li>
                  <li><a href="#">+128-386-3336</a></li>
                  <li><a href="#">medicare@gmail.com</a></li>
                  <li><a href="#">mumbai, india - 400104</a></li>
              </ul>
          </div>
         
      </div>

      <!--*******bottom*******-->
      <div class="footer-bottom">
          <span>Copyright © 2023 Medi buddy. All rights reserved</span>
      </div>
  </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
          $('#editBtn').click(function(){
            $('.profile-input').prop(' ', false).focus();
          });

          $('#saveBtn').click(function(){
            if (validateInputs()) {
              $('.profile-input').prop(' ', true);
            }
          });

          function validateInputs() {
            var valid = true;
            $('.profile-input').each(function() {
              var $this = $(this);
              var value = $this.val().trim();
              var errorMessage = $this.siblings('.error-message');

              if (value === '' || ($this.attr('type') === 'email' && !isValidEmail(value)) || ($this.attr('type') === 'number' && !isValidPhoneNumber(value))) {
                valid = false;
                errorMessage.text("Please enter a valid" + $this.attr('type') + ".");
              } else {
                errorMessage.text("");
              }
            });
            return valid;
          }

          function isValidEmail(email) {
            // Regular expression for email validation
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
          }

          function isValidPhoneNumber(phone) {
            // Regular expression for phone number validation
            var phonePattern = /^\d{10}$/;
            return phonePattern.test(phone);
          }
        });
    </script>
</body>
</html>
