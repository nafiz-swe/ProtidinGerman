<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EduHome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/style.css">
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
            <div class="site-logo mr-auto w-25">
              <a href="index.php"><img src="../webImg/PritidinGermanWeb.png" style="width:75px; height:55px;"></img></a>
            </div>
            <div class="mx-auto text-center">
              <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                  <li><a href="#home-section" class="nav-link">Home</a></li>
                  <li><a href="#courses-section" class="nav-link">Courses</a></li>
                  <li><a href="#programs-section" class="nav-link">Programs</a></li>
                  <li><a href="#teachers-section" class="nav-link">Teachers</a></li>
                  <li><a href="#book-section" class="nav-link">Book-Shop</a></li>
                </ul>
              </nav>
            </div>
            <div class="ml-auto w-25">
              <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                  <li class="cta"><a href="#contact-section" class="nav-link"><span>Contact Us</span></a></li>
                  <li class="cta"><a href="Course/index.php" class="nav-link"><span>Login</span></a></li>
                  <!-- <li class="cta"><a href="uniquedeveloper/login.php" class="nav-link"><span>Admin</span></a></li> -->
                </ul>
              </nav>
              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
            </div>
          </div>
        </div>
      </header>

      <div class="intro-section" id="home-section">
        <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-12">
                <div class="sign">
                  <div class="container <?php echo (isset($_GET['errorp']) || isset($_GET['signup']))? 'right-panel-active':''; ?>" id="container">
                    <form method="post" id="examineeLoginFrm" class="login100-form validate-form">
                      <h1 class="title">Sign in</h1> <br>
                      <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <input class="input100" type="text" name="username" placeholder="Enter email">
                        <span class="focus-input100"></span>
                      </div>
                      <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Enter password">
                        <span class="focus-input100"></span>
                      </div>
                      <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">Sign in</button>
                      </div>
                    </form>  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    
    <footer class="footer-section bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3>About EduHome</h3>
            <p>An E-Learning platform rich of resources, We make learning easy and simple for Everyone.</p>
          </div>

          <div class="col-md-3 ml-auto">
            <h3>Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="#home-section" class="nav-link">Home</a></li>
              <li><a href="#courses-section" class="nav-link">Courses</a></li>
              
             
            </ul>
          </div>

          <div class="col-md-4">
            <h3>Subscribe</h3>
            <p>Keep yourself up to date and receive all kind of news about EduHome.</p>
            <form action="" target="_blank" class="footer-subscribe">
              <div class="d-flex mb-5">

                <input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
              </div>
            </form>
          </div>

        </div>

        <div class="row pt-1 mt-1 text-center">
          <div class="col-md-10">
            <div class="border-top pt-5" >
            <p>
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved ProtidinGerman
      </p>
            </div>
          </div>

        </div>
      </div>
    </footer>
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
