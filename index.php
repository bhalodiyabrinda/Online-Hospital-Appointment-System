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

<style>
a{
        text-decoration: none;
    }
</style>

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
   

        <!--************content**************-->
        <div class="hero-content">
        <?php
            $con = mysqli_connect("localhost", "root", "", "hospital");

            $query = mysqli_query($con, "SELECT * FROM slider"); // Fix the query syntax
            $rowcount=mysqli_num_rows($query);
        ?>
            <div class="hero-text" style="margin-left:120px;">
                <h1>Feel Better About Finding HealthCare</h1>
                <p>A Healthier Tomorrow Starts. Schedule Your Appointment!
                    Your Wellness, Our Expertise: Set Up Your Appointment Today.
                </p>
         
                <div class="hero-text-btns">
                    <a href="#team">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Find Doctor
                    </a>
                    <a href="loginpage.php">
                        <i class="fa-solid fa-check"></i>
                        Book Appointment
                    </a>
                </div>
            </div>
     
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" style="margin-left:120px;">

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
                      <img src="images/<?php echo $row["image"] ?>" class="d-block width="750px" height="400px" ">
                    </div>
                    <?php
                      }
                      else
                      {
                    ?>
                    <div class="carousel-item ">
                      <img src="images/<?php echo $row["image"] ?>" class="d-block width="750px" height="400px"  ">
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
            
        </div>


    </section>

<br><br><br>

    <!--**********Search**********8-->
    <div class="appoinment-search-container">
        <h3>Find Best HealthCare</h3>
   
        <div class="appoinment-search">
     
            <div class="appo-search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Services Doctor Here">
            </div>
       
            <div class="appo-search-box">
                <i class="fa-solid fa-location-dot"></i>
                <input type="text" placeholder="Set Your Location">
            </div>
     
            <button>
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </div>
 

    <!--************What we provide****************-->
    <section class="what-we-provide">

        <!--****box1****-->
        <div class="w-info-box w-info-box1">
      
            <div class="w-info-icon">
                <i class="fa-solid fa-capsules"></i>
            </div>
       
            <div class="w-info-text">
                <strong>Specialised Services</strong>
            </div>
        </div>

        <!--****box2****-->
        <div class="w-info-box w-info-box2">
    
            <div class="w-info-icon">
                <i class="fa-regular fa-comment"></i>
            </div>
     
            <div class="w-info-text">
                <strong>24/7 Advance Care</strong>
            </div>
        </div>

        <!--****box3****-->
        <div class="w-info-box w-info-box3">
    
            <div class="w-info-icon">
                <i class="fa-solid fa-square-poll-horizontal"></i>
            </div>
         
            <div class="w-info-text">
                <strong>Get Reasult Online</strong>
            </div>
        </div>

    </section>


    <!-- *******Our-Story******* -->
    <section id="our-story">
     
        <div class="our-story-img">
            <img src="photo/Untitled design.png" alt="">
         
            <a href="#" class="story-play-btn">
                <i class="fa-solid fa-play"></i>
                Play Video
            </a>
        </div>
   
        <div class="our-story-text">
            <h2>Short Story About Us</h2>
            <p>Doctor Appointment Website for Healthcare, connecting you effortlessly with medical professionals. 
                Book appointments with doctors at clinics and hospitals. Access real-time availability, 
                secure communication, and integrated health records.  
            </p>
            <p>Our platform revolutionizes medical care, offering a user-centric interface for easy navigation. 
                Explore the future of healthcare with our technologically advanced and accessible medical website. </p>
         
            <div class="story-number-container">
                <!--**box1**-->
                <div class="story-number-box s-n-box1">
                    <strong>1000+</strong>
                    <span>Happy Patients</span>
                </div>
                 <!--**box2**-->
                 <div class="story-number-box s-n-box2">
                    <strong>215+</strong>
                    <span>Expert Doctor's</span>
                </div>
                 <!--**box3**-->
                 <div class="story-number-box s-n-box3">
                    <strong>310+</strong>
                    <span>Hospital Room's</span>
                </div>
                 <!--**box4**-->
                 <div class="story-number-box s-n-box4">
                    <strong>109+</strong>
                    <span>Award Wining</span>
                </div>
            </div>
        </div>
    </section>
  

    <!--*********our services***********-->
    <section id="our-services">
      
        <div class="services-heading">
          
            <div class="services-heading-text">
                <strong>Our Services</strong>
                <h2>High Quality Services For You</h2>
            </div>
         
            <div class="services-slide-btns">
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
        </div>

     
        <div class="services-box-container">

           
            <div class="swiper mySwiperservices">
            <div class="swiper-wrapper">

               
                <div class="swiper-slide">
                 
                    <div class="service-box s-box1">
                      <i class="fa-solid fa-tooth"></i>
                      <strong>Dental Care</strong>
                      <a href="#">Read More</a>
                    </div>
                </div>

                <!--**slide-2**-->
                <div class="swiper-slide">
                    <div class="service-box s-box2">
                      <i class="far fa-grin-beam"></i>
                      <strong>Skin Care</strong>
                      <a href="#">Read More</a>
                    </div>
                </div>

                <!--**slide-3**-->
                <div class="swiper-slide">
                    <div class="service-box s-box3">
                      <i class="fa fa-eye"></i>
                      <strong>Eye Care</strong>
                      <a href="#">Read More</a>
                    </div>
                </div>

                <!--**slide-4*-->
                <div class="swiper-slide">
                    <div class="service-box s-box4">
                      <i class="fa-solid fa-user-doctor"></i>
                      <strong>Sergical</strong>
                      <a href="#">Read More</a>
                    </div>
                </div>

            </div>
            </div>

        </div>

        <span class="service-help-btn">Contact Us For Need Any Help And Services<a href="#">Let's Get Started</a></span>
    </section>


    <!--**************Why Choose Us****************-->
    <section id="why-choose-us">

        <div class="why-choose-us-left">
            <h3>Why Choose Us</h3>

            <div class="why-choose-box-container">
   
                <div class="why-choose-box">

                    <i class="fa-solid fa-check"></i>
                 
                    <div class="why-choose-box-text">
                        <strong>Advance Care</strong>
                    </div>
                </div>

                 <!--****box-->
                 <div class="why-choose-box">
                  
                    <i class="fa-solid fa-check"></i>
                 
                    <div class="why-choose-box-text">
                        <strong>Online Medicine</strong>
                    </div>
                </div>

                 <!--****box-->
                 <div class="why-choose-box">
                    
                    <i class="fa-solid fa-check"></i>
                   
                    <div class="why-choose-box-text">
                        <strong>Medical & Surgical</strong>
                    </div>
                </div>

                 <!--****box-->
                 <div class="why-choose-box">
                  
                    <i class="fa-solid fa-check"></i>
                  
                    <div class="why-choose-box-text">
                        <strong>Lab Test's</strong>
                    </div>
                </div>

            </div>


            <a href="#" class="why-choose-us-btn">Make Appoinment</a>


        </div>
      
        <div class="why-choose-us-right">
            <h3>
                Emergency?<br/>
                Contact Us
            </h3>
            <p></p>
            
            <div class="w-right-contact-container">
                <!--**box**-->
                <div class="w-right-contact-box">
                   
                    <i class="fa-solid fa-phone"></i>
                   
                    <div class="w-right-contact-box-text">
                        <span>Call Us Now</span>
                        <strong>+123 456 789</strong>
                    </div>
                </div>

                <!--**box**-->
                <div class="w-right-contact-box">

                    <i class="fa-solid fa-envelope"></i>
                   
                    <div class="w-right-contact-box-text">
                        <span>Mail Us</span>
                        <strong>info@abc.com</strong>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!--************TEAM***********-->
    <section id="team">

     
        <div href="find a doctor" class="team-heading">
            <h3>Meet Our Specialist</h3>
        </div>

        
        <div class="team-box-container">


         
            <div class="swiper mySwiperteam">
            <div class="swiper-wrapper">

                <!--***slide-1***-->
                <div class="swiper-slide">
             
                    <div class="team-box">
                    
                        <div class="team-img">
                            <img src="photo/d1.png" alt="">
                        </div>
                     
                        <div class="team-text">
                            <strong>Dr Paradox Alex</strong>
                            <span>Skin Specialist</span>
                        </div>
                    </div>
                </div>

                <!--***slide-2***-->
                <div class="swiper-slide">
                   
                    <div class="team-box">
                    
                        <div class="team-img">
                            <img src="photo/d5.png" alt="">
                        </div>
                      
                        <div class="team-text">
                            <strong>Dr Paradox Alex</strong>
                            <span>Gynaecology</span>
                        </div>
                    </div>
                </div>

                <!--***slide-3***-->
                <div class="swiper-slide">
                 
                    <div class="team-box">
                   
                        <div class="team-img">
                            <img src="photo/d2.png" alt="">
                        </div>
                    
                        <div class="team-text">
                            <strong>Dr Paradox Alex</strong>
                            <span>Neurology</span>
                        </div>
                    </div>
                </div>

                <!--***slide-4***-->
                <div class="swiper-slide">
                 
                    <div class="team-box">
                     
                        <div class="team-img">
                            <img src="photo/d3.png" alt="">
                        </div>
                   
                        <div class="team-text">
                            <strong>Dr Paradox Alex</strong>
                            <span>Child Specialist</span>
                        </div>
                    </div>
                </div>

                <!--***slide-5***-->
                <div class="swiper-slide">
              
                    <div class="team-box">
                     
                        <div class="team-img">
                            <img src="photo/d4.png" alt="">
                        </div>
                 
                        <div class="team-text">
                            <strong>Dr Paradox Alex</strong>
                            <span>Orthopaedics</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
            </div>



        </div>
    </section>
 

    <!--******************Testimonials***********************-->
    <section id="testimonials">

        
        <div class="testimonials-heading">
            <h3>Our Patients FeedBack About us</h3>
        </div>

      
        <div class="testimonials-content">

        
            <div class="testimonials-img">
                <img src="photo/testimonials-img.png" alt="">
            </div>

 
            <div class="testimonials-box-container">


        
                <div class="swiper mySwipertesti">
                <div class="swiper-wrapper">

                <!--**slide-1**-->
                <div class="swiper-slide">
        
                <div class="testimonials-box">
               
                    <div class="t-profile">
                    
                        <div class="t-profile-img">
                            <img src="photo/t1.jpg" alt="">
                        </div>
                       
                        <div class="t-profile-text">
                            <strong>Mahin Sharma</strong>
                            <span>From India</span>
                       
                            <div class="t-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>

                    <!--***feedback***-->
                    <p>Verry Helpful. Far easier than doing same things on computer. 
                        Allow quick and easy search with speedy booking. 
                        Even maintains hestory of doctors visit
                    </p>
                </div>
                </div>

                 <!--**slide-1**-->
                 <div class="swiper-slide">
              
                    <div class="testimonials-box">
                
                        <div class="t-profile">
                       
                            <div class="t-profile-img">
                                <img src="photo/t2.jpg" alt="">
                            </div>
                       
                            <div class="t-profile-text">
                                <strong>John Nick</strong>
                                <span>From USA</span>
                          
                                <div class="t-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
    
                        <!--***feedback***-->
                        <p>This hospital is very good and faithfulness. 
                            This is rare one in the city</p>
    
                    </div>
                    </div>
    
  
                     <!--**slide-1**-->
                <div class="swiper-slide">
                
                    <div class="testimonials-box">
                   
                        <div class="t-profile">
                       
                            <div class="t-profile-img">
                                <img src="photo/t3.webp" alt="">
                            </div>
                          
                            <div class="t-profile-text">
                                <strong>Aadhya Rao</strong>
                                <span>From India</span>
                     
                                <div class="t-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <!--***feedback***-->
                        <p>very advanced hospital with the technology and also doctors….
                            they take care of patients verygood…
                            the entire staff reciveing and treating of the patients is very excellent…</p>
    
                    </div>
                    </div>
    
  
                     <!--**slide-1**-->
                <div class="swiper-slide">
              
                    <div class="testimonials-box">
                    
                        <div class="t-profile">
                        
                            <div class="t-profile-img">
                                <img src="photo/t4.jpg" alt="">
                            </div>
                    
                            <div class="t-profile-text">
                                <strong>Ruhi Deva</strong>
                                <span>From Kerala</span>
                          
                                <div class="t-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
    
                        <!--***feedback***-->
                        <p>very advanced hospital with the technology and also doctors….
                            they take care of patients verygood…
                            try to open these kind of branches in near other. Thank you for taking care of
                            my doughter</p>
    
                    </div>
                    </div>   

                </div>
                <div class="swiper-pagination"></div>
                </div>

            </div>

        </div>
    </section>




    
    <!--**************Subscribe*********** -->
    <!--<section id="subscribe">
        <h3>Subscribe For New Updates From Medi|Buddy</h3> 
    
        <form class="subscribe-box">
            <input type="email" placeholder="Example@site.com">
            <button>Subscribe</button>
        </form>
    </section> --> 



    <!--**************footer****************-->

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
            <span>Copyright © 2023 Medi buddy.</span>
            <span> All rights reserved.</span>
        </div>
    </footer>

   

    
    <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
     /* services-slide */
      var swiper = new Swiper(".mySwiperservices", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          700: {
            slidesPerView: 2,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
        },
      });

      /* *****team***** */
      var swiper = new Swiper(".mySwiperteam", {
      slidesPerView: 1,
      spaceBetween: 10,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
       
        560: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        950: {
          slidesPerView: 3,
          spaceBetween: 40,
        },
        1250: {
          slidesPerView: 4,
          spaceBetween: 50,
        },
      },
    });

    /* *****testimonials****** */
    var swiper = new Swiper(".mySwipertesti", {
      pagination: {
        el: ".swiper-pagination",
      },
    });
    </script>
</body>
</html>