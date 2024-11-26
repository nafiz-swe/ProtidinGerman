

<?php
// Include database connection
include('../conn.php');
session_start();

// Check if the user is logged in by verifying the session
if (!isset($_SESSION['examineeSession']) || !$_SESSION['examineeSession']['examineenakalogin']) {
    echo "You must be logged in to view this page.";
    exit;
}

// Get the student_id from the session
$student_id = $_SESSION['examineeSession']['student_id'];

// Fetch the logged-in student's data from the database
$sql = "SELECT * FROM students_tbl WHERE student_id = :student_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
$stmt->execute();
$studentData = $stmt->fetch(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Protidin German</title>
    <link rel="icon" type="webImg/png" href="webImg/protidin-german-icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../../../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/jquery-ui.css">
    <link rel="stylesheet" href="../../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../../css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../../../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../../../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../../../css/aos.css">
    <link rel="stylesheet" href="../../../css/style.css">
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
          <div class="site-logo mr-auto w-20"><a href="index.php"><img src="../../../webImg/Protidn-german-Home.svg" style="width:102px; height:55px;"></img></a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="../pages/course-details.php" class="nav-link">Course</a></li>
                <li><a href="index.php" class="nav-link">Test</a></li>
                <li><a href="index.php" class="nav-link">Teachers</a></li>
                <li><a href="index.php" class="nav-link">Services</a></li>
                <li><a href="index.php" class="nav-link">Book-Shop</a></li>
                <li><a href="reviews.php" class="nav-link">Reviews</a></li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-35">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="index.php" class="nav-link"><span>Contact Us</span></a></li>
                <li class="cta"><a href="../home.php" class="nav-link"><span>Account</span></a></li>
                <!-- <li class="cta"><a href="uniquedeveloper/login.php" class="nav-link"><span>Admin</span></a></li> -->
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
    </header>






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




      /* Banner section styling */
.intro-section {
  position: relative;
  width: 100%;
  height: 100vh; /* Initial height for desktop */
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
}

.slide-1 {
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 100px;

}

.container {
  width: 90%;
  max-width: 1200px;
  margin: 0 auto;
  text-align: center;
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
      background: #8BC34A;
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
            max-width: 333px;
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

    .border-top p{
      padding: 20px 0;
      margin: auto;
      color: #ccc;
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
      background: #689F38;
      color: #fff;
      border-radius: 5px;
    }
    .container h6{
  color: #fff;
}
.ribbon {
  position: absolute;
  background-color: #689F38;
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

@media (max-width: 600px) {
  .review-form h2,
  .review-display h2{
    font-size: 25px;
  }
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
      padding: 20px 10px;
  }
  .course-details h3{
    font-size: 23px;
  }
  .book-card img {
    width: 100%;
    height: 215px;
    padding-top: 0;
  }
  .py-2 p{
    padding: 0;
  }
  }












        /* main table */

        table {
            width: 80%;
            border-collapse: collapse;
            background: #fff;
            padding: 50px;
            margin: 180px auto;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #4CAF50;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #ddd;
        }
    </style>

    <h1>Your Account Information</h1>
    <?php
    if ($studentData) {
        echo "<table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Batch ID</th>
                        <th>Gender</th>
                        <th>Birthdate</th>
                        <th>Course</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{$studentData['student_id']}</td>
                        <td>{$studentData['student_fullname']}</td>
                        <td>{$studentData['student_batch_id']}</td>
                        <td>{$studentData['student_gender']}</td>
                        <td>{$studentData['student_birthdate']}</td>
                        <td>{$studentData['course_name']}</td>
                        <td>{$studentData['student_email']}</td>
                        <td>{$studentData['student_phone_number']}</td>
                        <td>{$studentData['student_status']}</td>
                    </tr>
                </tbody>
            </table>";
    } else {
        echo "<p>No account information available.</p>";
    }
    ?>




<div class="footer-top">
      </div>
<footer class="footer-section bg-white">
      <div class="container" data-aos="fade-down" data-aos-delay="">
        <div class="row" style="text-align: right;">
          <div class="col-md-4">
            <h3>About Protidin German</h3>
            <p>An E-Learning platform rich of resources, We make learning easy and simple for Everyone.</p>
            <div class="site-logo mr-auto w-20"><a href="index.php"><img src="../../../webImg/ProtidinGerman-footer.webp" style="width:150px; height:65px; border-radius:5px; margin:20px auto;"></img></a></div>
          </div>
          <div class="col-md-3 ml-auto">
            <h3>Follow Us</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="https://www.whatsapp.com/ProtidinGerman" target="_blank" class="ft-link">WhatsApp <i class="fa fa-whatsapp" style="padding: 4px 5px;"></i></a></li>
              <li><a href="https://www.instagram.com/ProtidinGerman" target="_blank" class="ft-link">Instagram <i class="fa fa-instagram" style="padding: 4px 5px;"></i></a></li>
              <li><a href="https://www.facebook.com/ProtidinGerman/" target="_blank" class="ft-link">Facebook <i class="fa fa-facebook" style="padding: 4px 7px;"></i></a></li>
              <li><a href="https://www.telegram.com/ProtidinGerman" target="_blank" class="ft-link">Telegram <i class="fa fa-telegram" style="padding: 4px 4px;"></i></a></li>
              <li><a href="https://www.youtube.com/@ProtidinGerman" target="_blank" class="ft-link">Youtube <i class="fa fa-youtube" style="padding: 4px 3px;"></i></a></li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3>Quick Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="#home-section" class="ft-link">Term & Conditions</a></li>
              <li><a href="#home-section" class="ft-link">Privacy Policy</a></li>
              <li><a href="#home-section" class="ft-link">About Us</a></li>
              <li><a href="reviews.php" class="ft-link">Reviews</a></li>
              <li><a href="#home-section" class="ft-link">Blogs</a></li>
            </ul>
          </div>
        </div>

        <div class="footer-services">
          <div class="col-md-4 ft-service" style="text-align: left;">
            <h3>Direct Contact</h3>
            <p> ProtidinGerman@gmail.com</p>
            <p> 01737226404 (Only WhatsApp)</p>
          </div>
          <div class="col-md-4 ft-service" style="text-align: center;">
            <h3>Office Time</h3>
            <p> Germany Time: Sat-Thu (8am-8pm)</p>
            <p> Bangladesh Time: Sat-Thu (11am-11pm)</p>
          </div>
          <div class="col-md-4 ft-service" style="text-align: right;">
            <h3>Questions & Answers</h3>
            <li><a href="https://www.youtube.com/@ProtidinGerman" target="_blank" class="ft-link">German Youtube Blog (Every Sunday)</a></li>
            <li><a href="https://www.zoom.com/ProtidinGerman" target="_blank" class="ft-link">Join Zoom Meeting (Every Friday 9pm BD)</a></li>
          </div>
        </div>

        <div class="border-top">
          <p> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved ProtidinGerman</p>
        </div>
      </div>
    </footer>
  </div> <!-- .site-wrap -->

  <script src="../../../js/jquery-3.3.1.min.js"></script>
  <script src="../../../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../../../js/jquery-ui.js"></script>
  <script src="../../../js/popper.min.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/owl.carousel.min.js"></script>
  <script src="../../../js/jquery.stellar.min.js"></script>
  <script src="../../../js/jquery.countdown.min.js"></script>
  <script src="../../../js/bootstrap-datepicker.min.js"></script>
  <script src="../../../js/jquery.easing.1.3.js"></script>
  <script src="../../../js/aos.js"></script>
  <script src="../../../js/jquery.fancybox.min.js"></script>
  <script src="../../../js/jquery.sticky.js"></script>
  <script src="../../../js/main.js"></script>

  </body>
</html>
