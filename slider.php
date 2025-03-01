<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--***********Title***************-->
    <title>Medical Website</title>
    <!--***********CSS*****************-->
    <link rel="stylesheet" href="css/style.css">
    <!--***********Fav-icon************-->
    <link rel="shortcut icon" href="photo/fav-icon.png">
    <!--*******import poppin fonts********-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--*******font-awesome for icons********-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- *******Link Swiper's CSS *******-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    
</head>
<body>
    
    <!--***************** Hero section*************-->
    <section id="hero">

        <!--***********nav************-->
        <nav class="navigation">
            <!--**menu-btn**-->
            <input type="checkbox" class="menu-btn" id="menu-btn">
            <label for="menu-btn" class="menu-icon">
                <span class="nav-icon"></span>
            </label>
     
            <a href="#" class="logo"><img src="photo/Logo.png" width="270px"></a>
     
            <ul class="menu">
                <li><a href="#team">Find A Doctor</a></li>
                <li><a href="#our-services">Our Services</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
            </ul>
     
            <a href="loginpage.php" class="nav-appointment-btn">Login</a>
            <a href="signup.php" class="nav-appointment-btn">Sign Up</a>
        </nav>

        <?php
            $con = mysqli_connect("localhost", "root", "", "hospital");

            $query = mysqli_query($con, "SELECT * FROM slider"); // Fix the query syntax
            $rowcount=mysqli_num_rows($query);


?>



          <div class="container-fluid">
            <div class="row g-3">
                <div class="col">
                <div class="hero-text">
                <h1>Feel Better About Finding HealthCare</h1>
                <p>A Healthier Tomorrow Starts. Schedule Your Appointment!
                    Your Wellness, Our Expertise: Set Up Your Appointment Today.
                </p>
         
                <div class="hero-text-btns">
                    <a href="#team">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Find Doctor
                    </a>
                    <a href="bookapp.php">
                        <i class="fa-solid fa-check"></i>
                        Book Appointment
                    </a>
                </div>
            </div>
                </div>
                <div class="col">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                  <div class="carousel-inner">

                    <?php
                      for($i=1;$i<=$rowcount;$i++)
                      {
                        $row = mysqli_fetch_array($query); // Fix deprecated function
                        ?>
  
                    <?php
                    if($i==1)
                    {
                    ?>
                    <div class="carousel-item active">
                      <img src="images/<?php echo $row["image"] ?>" class="d-block width="750px" height="500px" ">
                    </div>
                    <?php
                      }
                      else
                      {
                    ?>
                    <div class="carousel-item ">
                      <img src="images/<?php echo $row["image"] ?>" class="d-block width="750px" height="500px" ">
                    </div>
                    <?php
                      }
                    ?> 
                    <?php
                      }
                      ?>
                  </div>
                  <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </button>
                </div>
              </div>
          </div>
