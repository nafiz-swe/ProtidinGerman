<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Protidin German</title>
    <link rel="icon" type="webImg/png" href="webImg/protidin-german-icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/3a84168e33.js" crossorigin="anonymous"></script>

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-20"><a href="index.php"><img src="webImg/Protidn-german-Home.svg" style="width:102px; height:55px;"></img></a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="#courses-section" class="nav-link">Courses</a></li>
                <li><a href="#teachers-section" class="nav-link">Teachers</a></li>
                <li><a href="reviews.php" class="nav-link">Reviews</a></li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-35">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="#contact-section" class="nav-link"><span>Contact Us</span></a></li>
                <li class="cta"><a href="Course/index.php" class="nav-link"><span>S. Login</span></a></li>
                <li class="cta"><a href="Course/adminpanel/admin/index.php" class="nav-link"><span>T. Login</span></a></li>
                <!-- <li class="cta"><a href="uniquedeveloper/login.php" class="nav-link"><span>Admin</span></a></li> -->
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
    </header>

    <div class="intro-section" id="home-section">
      <div class="slide-1" style="background-image: url('webimg/Protidin-German-Banner.webp');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center"></div>
        </div>
      </div>
    </div>




    <style>

      /* Header styling */
.site-navbar {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1000;
  background-color: #fff; /* Slightly transparent background */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Light shadow for better visibility */
  transition: background-color 0.3s, padding 0.3s;
}

.site-navbar .container-fluid {
  padding: 0 1.5rem; /* Reduce padding for a sleek look */
}

.site-navbar.py-4 {
  padding-top: 0.5rem !important;
  padding-bottom: 0.5rem !important;
}

.nav-link {
  padding: 0.5rem 1rem;
  font-size: 16px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .site-navbar .container-fluid {
    padding: 0 1rem;
  }
  
  .site-navbar {
    padding-top: 0.3rem !important;
    padding-bottom: 0.3rem !important;
  }
}

@media (max-width: 768px) {
  .intro-section {
    height: 50vh; /* Reduce height for tablets */
  }
}

@media (max-width: 480px) {
  .intro-section {
    height: 40vh; /* Further reduce height for mobile devices */
  }
}

    /* Card Styles */
    .course-card,
    .book-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
        margin: 50px 15px;
        width: 100%;
        max-width: 333px;
        box-sizing: border-box;
        position: relative;
    }

    .course-card:hover,
    .book-card:hover {
        transform: scale(1.02);
    }

    .course-card img {
        width: 165px;
        height: auto;
        border-bottom: 1px solid #ddd;
        display: block;
        margin: auto;
        padding-bottom: 10px;
    }

    .book-card img {
      width: 95%;
      height: 265px;
      display: block;
      margin: auto;
      padding-bottom: 0;
      padding-top: 8px;
      border-radius: 15px 15px 0 0;
    }

    .course-details {
        padding: 15px 0px;
        text-align: center;
    }

    .course-details h3 {
      color: #5F9E3F;
    }

    .course-details p {
      margin-top: 0;
      margin-bottom: 0px;
      font-size: 16px;
      color: #000;
      text-align: left;
    }

    #courses-section {
    scroll-margin-top: 50px; /* Navbar থেকে 20px নিচে offset করবে */
}
    /* Offer Tag Styling */
    .offer-tag {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #ff5a5f;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.9rem;
        font-weight: bold;
    }

    /* Original Price Styling */
    .original-price {
      font-size: 1rem;
      color: gray;
      text-decoration: line-through;
      text-decoration-color: red; 
      margin-right: 8px;
    }

    /* Offer Price Styling */
    .course-price {
        font-size: 1.4rem;
        color: #ff5a5f;
        font-weight: bold;
    }

    .meta {
      color: gray;
      padding: 0px 20px;
      text-align: justify;
      margin: auto;
      font-size: 15.5px;
    }

    .meta i {
      padding-right: 8px;
    }

    .course-stats{
      padding:0 35px 15px 35px;
    }

    .message-us {
      padding: 0;
    }

    .course-stats button,
    .message-us button{
      width: 100%;
      padding: 6px;
      border-radius: 3px;
      border: 1px solid #ccc;
      background: #7FBF4D;
      color: #fff;
      text-align: center;
      font-size: 16px;
      cursor: pointer;
    }

    .course-stats button:hover,
    .message-us button:hover {
      background: #5F9E3F;
      border: 1px solid #ccc;
    }

    .courses-container,
    .teachers-container,
    .programs-container,
    .book-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 150px;
    }

    .footer-services{
      display: flex;
      flex-wrap: nowrap;
      margin: auto;
      width: 100%;
      border-top: 1px solid #edf0f5 !important;
      padding: 0px 0 30px 0;
      margin-top: 25px;
    }

    .ft-service{
      margin: auto;
    }
    .footer-top {
      background: #7FBF4D;
      height: 50px;
      width: 100%;
      border-radius: 100% 100% 0 0;
}

li {
  list-style: none;
}

    @media (max-width: 768px) {
        .course-card,
        .book-card {
            max-width: 100%;
        }
    }

    @media (min-width: 769px) {
        .course-card,
        .book-card {
            max-width: 300px;
        }
    }

    .py-2 p{
    font-size: 16px;
    color: #000;
    margin: auto;
    text-align: justify;
    padding: 0 35px;
    }

    .py-2 .position {
      color: gray;
    }

    .ft-link{
      padding: 5px 0;
      color: #ccc;
      font-size: 15px;
    }
    .ft-link i {
      margin-left: 10px;
    }
    .ft-link:hover{
      text-decoration: underline;
      color: #fff;
    }
    .footer-links i {
      background: #5F9E3F;
      color: #fff;
      border-radius: 5px;
    }
    .container h6{
  color: #fff;
}
.ribbon {
  position: absolute;
  background-color: #5F9E3F;
  color: #fff;
  padding: 5px 30px;
  font-size: 12px;
  font-weight: bold;
  text-transform: uppercase;
  border-radius: 3px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  transform: rotate(-45deg); /* বাঁকা করার জন্য */
  margin: 23px 0px 0px -38px;
}

/* .ribbon.left-bottom {
  bottom: 0px;
  left: 0px;
}

.ribbon.right-top {
  top: 0px;
  right: 0px;
} */

@media (max-width: 600px) {
  .footer-services{
      display: block;
  }
  .footer-section .footer-links li,
  .footer-section p {
    font-size: 14px;
  }
    .meta{
      padding: 2px 0px;
      font-size: 14px;
    }
    .container{
      width: 100%;
    }
    .course-details {
      padding: 20px 30px;
  }
  .course-details h3{
    font-size: 23px;
  }
  .book-card img {
    width: 100%;
    height: 285px;
    padding: 0;
    border-radius: 0;
  }
  .py-2 p{
    padding: 0;
  }
  }
</style>



<div class="site-section courses-title" id="courses-section">
  <div class="container">
      <h2 class="section-title">Learn German</h2>
  </div>
</div>

<div class="site-section courses-entry-wrap">
    <div class="container">
        <div class="courses-container">
            <!-- Course Card 1 -->
            <div class="course-card">
                <img src="webimg/DeutschA1.png" alt="Deutsch A1">
                  <div class="course-details">
                    <div class="offer-tag">15% OFF</div>
                    <span class="original-price"><span class="taka-symbol">Tk</span> 9058</span>
                    <span class="course-price"><span class="taka-symbol">Tk</span> 7700</span>
                    <h3>Goethe-Zertifikat A1</h3>
                    <div class="meta"><i class="far fa-calendar-alt"></i> Start 1 June, 2025</div>
                    <div class="meta"><i class="fas fa-chalkboard-teacher"></i> Online Class (Zoom)</div>
                    <div class="meta"><i class="fa fa-clock-o"></i> Duration 2 Months / 24 Class</div>
                    <div class="meta"><i class="far fa-calendar-check"></i> Weekly 3days (Sat,Mon,Wed)</div>
                    <div class="meta"><i class="far fa-closed-captioning"></i> Class Record Available</div>
                    <!-- <div class="meta"><i class="fas fa-edit"></i> With Exam Preparation</div> -->
                  </div>
                  <div class="course-stats">
                    <a href="deutsch-a1.php"><button>Views Course Details</button></a>
                  </div>
            </div>

            <!-- Course Card 2 -->
            <div class="course-card">
                <img src="webimg/DeutschA2.png" alt="Deutsch A2">
                <div class="course-details">
                    <div class="offer-tag">17% OFF</div>
                    <span class="original-price"><span class="taka-symbol">TK</span> 10602</span>
                    <span class="course-price"><span class="taka-symbol">TK</span> 8800</span>
                    <h3>Goethe-Zertifikat A2</h3>
                    <div class="meta"><i class="far fa-calendar-alt"></i> Start 1 June, 2025</div>
                    <div class="meta"><i class="fas fa-chalkboard-teacher"></i> Online Class (Zoom)</div>
                    <div class="meta"><i class="fa fa-clock-o"></i> Duration 2 Months / 24 Class</div>
                    <div class="meta"><i class="far fa-calendar-check"></i> Weekly 3days (Sat,Mon,Wed)</div>
                    <div class="meta"><i class="far fa-closed-captioning"></i> Class Record Available</div>
                    <!-- <div class="meta"><i class="fas fa-edit"></i> With Exam Preparation</div> -->
                </div>
                <div class="course-stats">
                  <a href="deutsch-a2.php"><button>Views Course Details</button></a>
                </div>
            </div>

            <!-- Course Card 3 -->
            <div class="course-card">
                <img src="webimg/DeutschB1.png" alt="Deutsch B1">
                <div class="course-details">
                    <div class="offer-tag">20% OFF</div>
                    <span class="original-price"><span class="taka-symbol">TK</span> 12375</span>
                    <span class="course-price"><span class="taka-symbol">TK</span> 9900</span> <!-- &#2547; -->
                    <h3>Goethe-Zertifikat B1</h3>
                    <div class="meta"><i class="far fa-calendar-alt"></i> Start 1 June, 2025</div>
                    <div class="meta"><i class="fas fa-chalkboard-teacher"></i> Online Class (Zoom)</div>
                    <div class="meta"><i class="fa fa-clock-o"></i> Duration 2 Months / 24 Class</div>
                    <div class="meta"><i class="far fa-calendar-check"></i> Weekly 3days (Sat,Mon,Wed)</div>
                    <div class="meta"><i class="far fa-closed-captioning"></i> Class Record Available</div>
                    <!-- <div class="meta"><i class="fas fa-edit"></i> With Exam Preparation</div> -->
                </div>
                <div class="course-stats">
                  <a href="deutsch-b1.php"><button>Views Course Details</button></a>
                </div>
            </div>

              <!-- Course Card 3 -->
              <div class="course-card">
                <div class="ribbon">Recommended</div> <!-- Recommended Ribbon -->

                <img src="webimg/Deutsch-A1A2B1.webp" alt="Deutsch B1">
                <div class="course-details">
                    <div class="offer-tag">22% OFF</div>
                    <span class="original-price"><span class="taka-symbol">TK</span> 8,500</span>
                    <span class="course-price"><span class="taka-symbol">TK</span> 7,450</span> <!-- &#2547; -->
                    <h3>Exam Preparation</h3>
                    <div class="meta"><i class="far fa-calendar-alt"></i> Start 1 June, 2025</div>
                    <div class="meta"><i class="fas fa-chalkboard-teacher"></i> Online Class (Zoom)</div>
                    <div class="meta"><i class="fa fa-clock-o"></i> Duration 1 Months / 12 Class</div>
                    <div class="meta"><i class="far fa-calendar-check"></i> Weekly 4days (Sat,Mon,Wed,Th)</div>
                    <div class="meta"><i class="far fa-closed-captioning"></i> Class Record Available</div>
                    <!-- <div class="meta"><i class="fas fa-edit"></i> With Exam Preparation</div> -->
                </div>
                <div class="course-stats">
                  <a href="deutsch-exam-pre.php"><button>Views Course Details</button></a>
                </div>
              </div>

        </div>
    </div>
</div>





        <div class="site-section teachers-title" id="teachers-section">
          <div class="container">
              <h2 class="section-title">Our Teachers</h2>
          </div>
        </div>


        <div class="site-section teachers-entry-wrap">
        <div class="container">
        <div class="teachers-container">

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="teacher text-center">
              <img src="webimg/nafiz.webp" alt="Nafiz" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
                <h3 class="text-black">Nafizul Islam</h3>
                <!-- <p class="position">Position: Ausbildung</p> -->
                <p>Subject: Software Techniker</p>
                <p>Stay: Frankfurt, Germany</p>
                <p>Stay from: 03 August 2025</p>
                <p>German Proficiency: B1</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="teacher text-center">
            <img src="webimg/nafiz.webp" alt="Nafiz" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
              <h3 class="text-black">Nafizul Islam</h3>
                <!-- <p class="position">Position: Ausbildung</p> -->
                <p>Subject: Software Techniker</p>
                <p>Stay: Munich, Germany</p>
                <p>Stay from: 05 August 2025</p>
                <p>German Proficiency: B1</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="teacher text-center">
            <img src="webimg/nafiz.webp" alt="Nafiz" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
              <h3 class="text-black">Nafizul Islam</h3>
                <p class="position">Position: Ausbildung</p>
                <p>Subject: Software Techniker</p>
                <p>Living in: Berlin, Germany</p>
                <p>Residing since: 07 August 2025</p>
                <p>German Proficiency: B1</p>
              </div>
            </div>
          </div>

        </div>
      </div>

      </div>





  <div class="site-section contact-title" id="contact-section">
  <div class="container">
      <h2 class="section-title">Message Us</h2>
      <h6>Describe your problems. We are very intarested for serving you.</h6>
  </div>
</div>



      <div class="site-section contact-entry-wrap">
        <div class="container" style="max-width: 500px;">
        <div class="contact-container">
            <!-- Beginning of the php for the contact form -->
            <?php
            // Message Vars
            $msg = '';
            $msgClass = '';

            // Check For Submit
            if(filter_has_var(INPUT_POST, 'submit')){
              // Get Form Data
              $name = htmlspecialchars($_POST['name']);
              $email = htmlspecialchars($_POST['email']);
              $message = htmlspecialchars($_POST['message']);
              $subject = htmlspecialchars($_POST['subject']);

              // Check Required Fields
              if(!empty($email) && !empty($name) && !empty($message) && !empty($subject)){
                // Passed
                // Check Email
                if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                  // Failed
                  $msg = 'Please use a valid email';
                  $msgClass = 'alert-danger';
                } else {
                  // Passed
                  $toEmail = 'ProtidinGerman@gmail.com';
                  $body = $subject.'<h4>Name</h4><p>'.$name.'</p>
                    <h4>Email</h4><p>'.$email.'</p>
                    <h4>Message</h4><p>'.$message.'</p>';

                  // Email Headers
                  $headers = "MIME-Version: 1.0" ."\r\n";
                  $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

                  // Additional Headers
                  $headers .= "From: " .$name. "<".$email.">". "\r\n";

                  if(mail($toEmail, $subject, $body, $headers)){
                    // Email Sent
                    $msg = 'Your email has been sent';
                    $msgClass = 'alert-success';
                  } else {
                    // Failed
                    $msg = 'Your email was not sent';
                    $msgClass = 'alert-danger';
                  }
                }
              } else {
                // Failed
                $msg = 'Please fill in all fields';
                $msgClass = 'alert-danger';
              }
            }
             ?>
             <?php if($msg != ''): ?>
                 <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
               <?php endif; ?>
            <!-- End of the php for the contact form -->
            <form method="post" action="index.php#contact-section" id="contact_form">
              <div class="form-group row">
                <div class="col-md-12">
                  <div id="error_contact_fullname"></div>
                  <input type="text" name="name" id="contact_fullname" class="form-control" placeholder="Full name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <div id="error_contact_subject"></div>
                  <input type="text" id="contact_subject" name="subject" class="form-control" placeholder="Subject" >
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <div id="error_contact_email"></div>
                  <input type="email" id="contact_email" name="email"  class="form-control" placeholder="Email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <div id="error_whatsapp"></div>
                  <input type="number" id="appointment_whatsapp" name="whatsapp"  class="form-control" placeholder="WhatsApp" value="<?php echo isset($_POST['whatsapp']) ? $whatsapp : ''; ?>">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <div id="error_contact_message"></div>
                  <textarea class="form-control" id="contact_message" name="message" cols="30" rows="5" placeholder="Write your message here..."><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                </div>
              </div>

              <!-- <div class="form-group row"> -->
                <div class="message-us">
                  <button type="submit" name="submit">Send Message</button></a>
                </div>
              <!-- </div> -->

            </form>
          </div>
        </div>
      </div>


      <div class="footer-top">
      </div>
      <?php include 'footer.php'; ?>


  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
