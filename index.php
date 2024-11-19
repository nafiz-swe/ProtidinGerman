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
          <div class="site-logo mr-auto w-25"><a href="index.php"><img src="webImg/Protidn-german-Home.svg" style="width:102px; height:55px;"></img></a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#courses-section" class="nav-link">Courses</a></li>
                <li><a href="#teachers-section" class="nav-link">Teachers</a></li>
                <li><a href="#programs-section" class="nav-link">Services</a></li>
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

    /* Card Styles */
    .course-card,
    .book-card {
        background: white;
        border-radius: 8px;
        border: 1px solid #8BC34A;
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
      height: 270px;
      display: block;
      margin: auto;
      padding-bottom: 10px;
      padding-top: 8px;
      border-radius: 15px 15px 0 0;
    }

    .course-details {
        padding: 15px;
        text-align: center;
    }

    .course-details h3 {
      color: #689F38;
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
      padding: 2px 20px;
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
      background: #8BC34A;
      color: #fff;
      text-align: center;
      font-size: 16px;
    }

    .course-stats button:hover,
    .message-us button:hover {
      background: #689F38;
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
    }

    .ft-link{
      padding: 5px 0;
      color: #fff;
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

/* .ribbon.left-bottom {
  bottom: 0px;
  left: 0px;
}

.ribbon.right-top {
  top: 0px;
  right: 0px;
} */

@media (max-width: 600px) {
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
</style>



<div class="site-section courses-title" id="courses-section">
  <div class="container" data-aos="fade-up" data-aos-delay="">
      <h2 class="section-title">Learn German</h2>
  </div>
</div>

<div class="site-section courses-entry-wrap">
    <div class="container">
        <div class="courses-container">
            <!-- Course Card 1 -->
            <div class="course-card" data-aos="fade-up" data-aos-delay="100">
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
                    <div class="meta"><i class="fas fa-edit"></i> With Exam Preparation</div>
                  </div>
                  <div class="course-stats">
                    <a href="deutsch-a1.php"><button>Views Course Details</button></a>
                  </div>
            </div>

            <!-- Course Card 2 -->
            <div class="course-card" data-aos="fade-up" data-aos-delay="200">
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
                    <div class="meta"><i class="fas fa-edit"></i> With Exam Preparation</div>
                </div>
                <div class="course-stats">
                  <a href="deutsch-a2.php"><button>Views Course Details</button></a>
                </div>
            </div>

            <!-- Course Card 3 -->
            <div class="course-card" data-aos="fade-up" data-aos-delay="300">
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
                    <div class="meta"><i class="fas fa-edit"></i> With Exam Preparation</div>
                </div>
                <div class="course-stats">
                  <a href="deutsch-b1.php"><button>Views Course Details</button></a>
                </div>
            </div>

              <!-- Course Card 3 -->
              <div class="course-card" data-aos="fade-up" data-aos-delay="300">
                <div class="ribbon">Recommended</div> <!-- Recommended Ribbon -->

                <img src="webimg/Deutsch-A1A2B1.webp" alt="Deutsch B1">
                <div class="course-details">
                    <div class="offer-tag">22% OFF</div>
                    <span class="original-price"><span class="taka-symbol">TK</span> 32,692</span>
                    <span class="course-price"><span class="taka-symbol">TK</span> 25,500</span> <!-- &#2547; -->
                    <h3>Short time Course</h3>
                    <div class="meta"><i class="far fa-calendar-alt"></i> Start 1 June, 2025</div>
                    <div class="meta"><i class="fas fa-chalkboard-teacher"></i> Online Class (Zoom)</div>
                    <div class="meta"><i class="fa fa-clock-o"></i> Duration 3 Months / 48 Class</div>
                    <div class="meta"><i class="far fa-calendar-check"></i> Weekly 4days (Sat,Mon,Wed,Th)</div>
                    <div class="meta"><i class="far fa-closed-captioning"></i> Class Record Available</div>
                    <div class="meta"><i class="fas fa-edit"></i> With Exam Preparation</div>
                </div>
                <div class="course-stats">
                  <a href="deutsch-shortCourse.php"><button>Views Course Details</button></a>
                </div>
              </div>

        </div>
    </div>
</div>





        <div class="site-section teachers-title" id="teachers-section">
          <div class="container" data-aos="fade-up" data-aos-delay="">
              <h2 class="section-title">Our Teachers</h2>
          </div>
        </div>


        <div class="site-section teachers-entry-wrap">
        <div class="container">
        <div class="teachers-container">

          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="teacher text-center">
              <img src="webimg/nafiz.webp" alt="Nafiz" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
                <h3 class="text-black">Nafizul Islam</h3>
                <p class="position">Position: Ausbildung</p>
                <p>Subject: Software Techniker</p>
                <p>Company: ABCD</p>
                <p>Stay: Frankfurt, Germany</p>
                <p>Stay from: 03 August 2025</p>
                <p>German Proficiency: B1</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="teacher text-center">
            <img src="webimg/nafiz.webp" alt="Nafiz" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
              <h3 class="text-black">Nafizul Islam</h3>
                <p class="position">Position: Ausbildung</p>
                <p>Subject: Software Techniker</p>
                <p>Company: ABCD</p>
                <p>Stay: Munich, Germany</p>
                <p>Stay from: 05 August 2025</p>
                <p>German Proficiency: B1</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="teacher text-center">
            <img src="webimg/nafiz.webp" alt="Nafiz" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
              <h3 class="text-black">Nafizul Islam</h3>
                <p class="position">Position: Ausbildung</p>
                <p>Subject: Software Techniker</p>
                <p>Company: ABCD</p>
                <p>Stay: Berlin, Germany</p>
                <p>Stay from: 07 August 2025</p>
                <p>German Proficiency: B1</p>
              </div>
            </div>
          </div>

        </div>
      </div>

      </div>








<div class="site-section programs-title" id="programs-section">
  <div class="container" data-aos="fade-up" data-aos-delay="">
      <h2 class="section-title">German Services</h2>
      <h6>We aim to make studying SIMPLE, EASY and ACCESSIBLE to EVERYONE thus we collected the BEST COURSES in the world in one place.</h6>
  </div>
</div>


    <div class="site-section programs-entry-wrap">
      <div class="container">
        <div class="programs-container">

          <!-- Netzwerk-Neu-A1 -->
          <div class="book-card" data-aos="fade-up" data-aos-delay="100">
            <img src="webimg/ausbildung.webp" alt="Netzwerk-Neu-A1" class="img-fluid">
            <div class="course-details">
              <!-- <div class="offer-tag">15% OFF</div> -->
              <!-- <span class="original-price"><span class="taka-symbol">Tk</span> 6471</span> -->
              <span class="course-price"><span class="taka-symbol">Tk</span> 95,500</span>
              <h3>Ausbildung Manage</h3>
              <div class="meta"><i class="fa fa-clock-o"></i>Manage within 3 weeks</div>
              <div class="meta"><i class="far fa-file-alt"></i> Required minimum B1 certificate</div>
            </div>
            <div class="course-stats">
              <a href="deutsch-a1.php"><button>View Details</button></a>
            </div>
          </div>

            <!-- Netzwerk-Neu-A1 -->
            <div class="book-card" data-aos="fade-up" data-aos-delay="200">
            <img src="webimg/bfd.webp" alt="Netzwerk-Neu-A1" class="img-fluid">
            <div class="course-details">
              <!-- <div class="offer-tag">15% OFF</div>
              <span class="original-price"><span class="taka-symbol">Tk</span> 6471</span> -->
              <span class="course-price"><span class="taka-symbol">Tk</span> 90,500</span>
              <h3>BFD Manage</h3>
              <div class="meta"><i class="fa fa-clock-o"></i>Manage within 3 weeks</div>
              <div class="meta"><i class="far fa-file-alt"></i> Required minimum A2 certificate</div>
            </div>
            <div class="course-stats">
              <a href="deutsch-a1.php"><button>View Details</button></a>
            </div>
          </div>

            <!-- Netzwerk-Neu-A1 -->
            <div class="book-card" data-aos="fade-up" data-aos-delay="300">
            <img src="webimg/fsj.webp" alt="Netzwerk-Neu-A1" class="img-fluid">
            <div class="course-details">
              <!-- <div class="offer-tag">15% OFF</div>
              <span class="original-price"><span class="taka-symbol">Tk</span> 6471</span> -->
              <span class="course-price"><span class="taka-symbol">Tk</span> 85,500</span>
              <h3>FSJ Manage</h3>
              <div class="meta"><i class="fa fa-clock-o"></i>Manage within 3 weeks</div>
              <div class="meta"><i class="far fa-file-alt"></i> Required minimum A2 certificate</div>
            </div>
            <div class="course-stats">
              <a href="deutsch-a1.php"><button>View Details</button></a>
            </div>
          </div>

                      <!-- Netzwerk-Neu-A1 -->
                      <div class="book-card" data-aos="fade-up" data-aos-delay="100">
            <img src="webimg/university.webp" alt="Netzwerk-Neu-A1" class="img-fluid">
            <div class="course-details">
              <!-- <div class="offer-tag">15% OFF</div>
              <span class="original-price"><span class="taka-symbol">Tk</span> 6471</span> -->
              <span class="course-price"><span class="taka-symbol">Tk</span> 25,500</span>
              <h3>Varsity Offer Letter</h3>
              <div class="meta"><i class="fa fa-clock-o"></i>Manage within 3 weeks</div>
              <div class="meta"><i class="far fa-file-alt"></i> Required minimum IELTS 6.00</div>
            </div>
            <div class="course-stats">
              <a href="deutsch-a1.php"><button>View Details</button></a>
            </div>
          </div>

            <!-- Netzwerk-Neu-A1 -->
            <div class="book-card" data-aos="fade-up" data-aos-delay="200">
            <img src="webimg/german-home.webp" alt="Netzwerk-Neu-A1" class="img-fluid">
            <div class="course-details">
              <!-- <div class="offer-tag">15% OFF</div>
              <span class="original-price"><span class="taka-symbol">Tk</span> 6471</span> -->
              <span class="course-price"><span class="taka-symbol">Tk</span> 15,500</span>
              <h3>Living House Manage</h3>
              <div class="meta"><i class="fa fa-clock-o"></i>Manage within 2 weeks</div>
              <div class="meta"><i class="fa fa-file-alt"></i> Required any offer letter</div>
            </div>
            <div class="course-stats">
              <a href="deutsch-a1.php"><button>View Details</button></a>
            </div>
          </div>

          <!-- Netzwerk-Neu-A2 -->
          <div class="book-card" data-aos="fade-up" data-aos-delay="300">
            <img src="webimg/europus-resume-cv.webp" alt="Netzwerk-Neu-A2" class="img-fluid">
            <div class="course-details">
              <!-- <div class="offer-tag">15% OFF</div>
              <span class="original-price"><span class="taka-symbol">Tk</span> 6471</span> -->
              <span class="course-price"><span class="taka-symbol">Tk</span> 850</span>
              <h3>Resume/CV</h3>
              <div class="meta"><i class="fa fa-clock-o"></i>Provide within 2 working days</div>
              <div class="meta"><i class="fa fa-file-alt"></i> Required personal informations</div>
            </div>
            <div class="course-stats">
              <a href="deutsch-a1.php"><button>View Details</button></a>
            </div>
          </div>

          <!-- Netzwerk-Neu-B1 -->
          <div class="book-card" data-aos="fade-up" data-aos-delay="100">
            <img src="webimg/motivation-letter.webp" alt="Netzwerk-Neu-B1" class="img-fluid">
            <div class="course-details">
              <!-- <div class="offer-tag">15% OFF</div>
              <span class="original-price"><span class="taka-symbol">Tk</span> 6471</span> -->
              <span class="course-price"><span class="taka-symbol">Tk</span> 750</span>
              <h3>Motivation Letter</h3>
              <div class="meta"><i class="fa fa-clock-o"></i>Provide within 2 working days</div>
              <div class="meta"><i class="fa fa-file-alt"></i> Required personal informations</div>
            </div>
            <div class="course-stats">
              <a href="deutsch-a1.php"><button>View Details</button></a>
            </div>
          </div>

          <!-- German-Sarfuddin-Ahmed-->
          <div class="book-card" data-aos="fade-up" data-aos-delay="200">
            <img src="webimg/cover-letter.webp" alt="German-Sarfuddin-Ahmed" class="img-fluid">
            <div class="course-details">
              <!-- <div class="offer-tag">15% OFF</div>
              <span class="original-price"><span class="taka-symbol">Tk</span> 6471</span> -->
              <span class="course-price"><span class="taka-symbol">Tk</span> 750</span>
              <h3>Cover Letter</h3>
              <div class="meta"><i class="fa fa-clock-o"></i>Provide within 2 working days</div>
              <div class="meta"><i class="fa fa-file-alt"></i> Required personal informations</div>
            </div>
            <div class="course-stats">
              <a href="deutsch-a1.php"><button>View Details</button></a>
            </div>
          </div>

            <!-- German-Sarfuddin-Ahmed-->
            <div class="book-card" data-aos="fade-up" data-aos-delay="300">
            <img src="webimg/applications-email.webp" alt="German-Sarfuddin-Ahmed" class="img-fluid">
            <div class="course-details">
              <!-- <div class="offer-tag">15% OFF</div>
              <span class="original-price"><span class="taka-symbol">Tk</span> 6471</span> -->
              <span class="course-price"><span class="taka-symbol">Tk</span> 450</span>
              <h3>Application or Email</h3>
              <div class="meta"><i class="fa fa-clock-o"></i>Provide within 2 working days</div>
              <div class="meta"><i class="fa fa-file-alt"></i> Required personal informations</div>
            </div>
            <div class="course-stats">
              <a href="deutsch-a1.php"><button>View Details</button></a>
            </div>
          </div>

          
        </div>
      </div>
    </div>






    

      
    <div class="site-section book-title" id="book-section">
  <div class="container" data-aos="fade-up" data-aos-delay="">
      <h2 class="section-title">Book Shop</h2>
      <h6>We aim to make studying SIMPLE, EASY and ACCESSIBLE to EVERYONE thus we collected the BEST COURSES in the world in one place.</h6>
  </div>
</div>

    <div class="site-section book-entry-wrap">
      <div class="container">
        <div class="book-container">

          <!-- Netzwerk-Neu-A1 -->
          <div class="book-card" data-aos="fade-up" data-aos-delay="100">
            <img src="webimg/German-Netzwerk-Neu-A1.jpg" alt="Netzwerk-Neu-A1" class="img-fluid">
            <div class="course-details">
              <div class="offer-tag">15% OFF</div>
              <span class="original-price"><span class="taka-symbol">Tk</span> 6471</span>
              <span class="course-price"><span class="taka-symbol">Tk</span> 5500</span>
              <h3>Netzwerk-Neu-A1</h3>
              <div class="meta"><i class="fa fa-book"></i>3 Books (Übungs,Kurs,Glossar)</div>
              <div class="meta"><i class="fa fa-book-open"></i> Color Print</div>
            </div>
            <div class="course-stats">
              <a href="deutsch-a1.php"><button>Buy Now</button></a>
            </div>
          </div>

          <!-- Netzwerk-Neu-A2 -->
          <div class="book-card" data-aos="fade-up" data-aos-delay="200">
            <img src="webimg/German-Netzwerk-Neu-A2.jpg" alt="Netzwerk-Neu-A2" class="img-fluid">
            <div class="course-details">
              <div class="offer-tag">15% OFF</div>
              <span class="original-price"><span class="taka-symbol">Tk</span> 6471</span>
              <span class="course-price"><span class="taka-symbol">Tk</span> 5500</span>
              <h3>Netzwerk-Neu-A2</h3>
              <div class="meta"><i class="fa fa-book"></i>3 Books (Übungs,Kurs,Glossar)</div>
              <div class="meta"><i class="fa fa-book-open"></i> Color Print</div>
            </div>
            <div class="course-stats">
              <a href="deutsch-a1.php"><button>Buy Now</button></a>
            </div>
          </div>

          <!-- Netzwerk-Neu-B1 -->
          <div class="book-card" data-aos="fade-up" data-aos-delay="300">
            <img src="webimg/German-Netzwerk-Neu-B1.jpg" alt="Netzwerk-Neu-B1" class="img-fluid">
            <div class="course-details">
              <div class="offer-tag">15% OFF</div>
              <span class="original-price"><span class="taka-symbol">Tk</span> 6471</span>
              <span class="course-price"><span class="taka-symbol">Tk</span> 5500</span>
              <h3>Netzwerk-Neu-B1</h3>
              <div class="meta"><i class="fa fa-book"></i>3 Books (Übungs,Kurs,Glossar)</div>
              <div class="meta"><i class="fa fa-book-open"></i> Color Print</div>
            </div>
            <div class="course-stats">
              <a href="deutsch-a1.php"><button>Buy Now</button></a>
            </div>
          </div>

          <!-- German-Sarfuddin-Ahmed-->
          <div class="book-card" data-aos="fade-up" data-aos-delay="320">
            <img src="webimg/German-grammar-Sarfuddin-Ahmed.jpg" alt="German-Sarfuddin-Ahmed" class="img-fluid">
            <div class="course-details">
              <div class="offer-tag">15% OFF</div>
              <span class="original-price"><span class="taka-symbol">Tk</span> 6471</span>
              <span class="course-price"><span class="taka-symbol">Tk</span> 5500</span>
              <h3>Bangla to German</h3>
              <div class="meta"><i class="fa fa-book"></i>1 Book (3rd Editions)</div>
              <div class="meta"><i class="fa fa-book-open"></i> Color Print</div>
            </div>
            <div class="course-stats">
              <a href="deutsch-a1.php"><button>Buy Now</button></a>
            </div>
          </div>

          
        </div>
      </div>
    </div>










  <div class="site-section contact-title" id="contact-section">
  <div class="container" data-aos="fade-up" data-aos-delay="">
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
            <form method="post" action="index.php#contact-section" id="contact_form" data-aos="fade-up" data-aos-delay="100">
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




    <footer class="footer-section bg-white">
      <div class="container" data-aos="fade-down" data-aos-delay="">
        <div class="row" style="text-align: right;">
          <div class="col-md-4">
            <h3>About Protidin German</h3>
            <p>An E-Learning platform rich of resources, We make learning easy and simple for Everyone.</p>
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
              <li><a href="#home-section" class="ft-link">Reviews</a></li>
              <li><a href="#home-section" class="ft-link">Blogs</a></li>
            </ul>
          </div>
        </div>

        <div class="border-top">
          <p> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved ProtidinGerman</p>
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
