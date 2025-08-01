<style>

/* Star container */
.star-rating {
    display: inline-flex;
    gap: 5px;
}

/* Default star styling */
.star {
    width: 30px;
    height: 30px;
    display: inline-block;
    clip-path: polygon(
        50% 0%, 
        61% 35%, 
        98% 35%, 
        68% 57%, 
        79% 91%, 
        50% 70%, 
        21% 91%, 
        32% 57%, 
        2% 35%, 
        39% 35%
    );
    background-color: #ccc;
    border: 2px solid gray;
    cursor: pointer;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

/* Active star styling */
.star.active {
    background-color: #7FBF4D;
    border-color: #7FBF4D;
}

/* Hover effect starting from the left */
.star:hover,
.star:hover ~ .star {
    background-color: #f1f1f1; /* Reset color for all stars */
    border-color: #ccc;
}

.star:hover,
.star ~ .star:hover {
    background-color: gold; /* Light green hover effect */
    border-color: gold;
}


/* Review form container */
.review-form {
    background-color: #fff;
    margin: 120px auto 90px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 600px;
}

.filter-reviews{
    margin-bottom: 50px;
    padding-bottom: 20px;
    border-bottom: .1rem solid #7FBF4D;
}

.review-form h2 {
    color: #333;
    margin-bottom: 15px;
}

.review-form label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
    font-size: 15px;
}

.review-form input,
.review-form select,
.review-form textarea {
    width: calc(100% - 10px);
    padding: 8px;
    margin-bottom: 30px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.review-form button {
    background-color: #7FBF4D;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.review-form button:hover {
    background-color: #5F9E3F;
}

/* Review display container */
.review-display {
    background-color: #fff;
    margin: 20px auto 150px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 600px;
}

.review-display h2 {
    color: #333;
    margin-bottom: 15px;
}

.review {
    border-bottom: 1px solid #eee;
    padding-bottom: 15px;
    margin-bottom: 15px;
}

.review h3 {
    margin: 0;
    color: #444;
    font-size: 18px;
}

.review .stars {
    color: gold;
    font-size: 20px;
    margin: -7px 0 -0 0;
}

.total-stars {
    color: gold;
    font-size: 20px;
    margin: 5px 0;
}
.ratings-breakdown{
    margin-bottom: 40px;
}

.star-count p,
.filter-reviews label {
    margin: 0;
    font-size: 15px;
}
#order {
    font-size: 13px;
}

.review p {
    margin: 0;
    color: #666;
    font-size: 14px;
    text-align: justify;
}

.review small {
    display: block;
    margin-top: -6px;
    margin-bottom: 10px;
    color: #5F9E3F;
}

.review:last-child {
    border-bottom: none;
}

/* Responsive design for smaller devices */
@media (max-width: 768px) {
    .review-form {
        margin: 130px auto 0 auto;
        padding: 15px;
        width: 90%;
    }
    .review-display {
        margin: 80px auto 130px auto;
        padding: 15px;
        width: 90%;
    }
}

        /* General Popup Styling */
        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%); /* Adjust alignment */
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #7FBF4D;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;
            z-index: 1000;
                }
        #popup h3 {
            margin: 0 0 15px;
            color: #5F9E3F;
            font-size: 18px;
        }
        #popup button {
            padding: 5px 20px;
            background: #7FBF4D;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
        }
        #popup button:hover {
            background: #5F9E3F;
        }
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

    </style> 


    
    


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
                <li><a href="index.php" class="nav-link">Courses</a></li>
                <li><a href="index.php" class="nav-link">Teachers</a></li>
                <li><a href="reviews.php" class="nav-link">Reviews</a></li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-35">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="index.php" class="nav-link"><span>Contact Us</span></a></li>
                <!-- <li class="cta"><a href="Course/index.php" class="nav-link"><span>Login</span></a></li> -->
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
</style>

    














<?php
// Include database connection
include './Course/conn.php';

// Initialize the message variable
$message = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $service_name = htmlspecialchars(trim($_POST['service_name']));
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $review_text = htmlspecialchars(trim($_POST['review_text']));
    $email = $_POST['email'];

    // Prepare SQL query to check the examinee email
    $query = "SELECT student_id FROM students_tbl WHERE student_email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Email exists, retrieve student_id
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $student_id = $row['student_id'];

        // Validate rating
        if ($rating < 1 || $rating > 5) {
            $message = "Invalid rating. Please select a rating between 1 Star and 5 Stars.";
        } else {
            // Set timezone to Dhaka (GMT+6)
            date_default_timezone_set('Asia/Dhaka');

            // Format the current date as "25 January 2024, 10:46 PM" in Dhaka time
            $created_at = date("d F Y, h:i A");

            // Prepare SQL query to insert the review along with the student_id and created_at
            $query = "INSERT INTO reviews (service_name, rating, review_text, student_id, created_at) VALUES (:service_name, :rating, :review_text, :student_id, :created_at)";
            $stmt = $conn->prepare($query);

            // Bind the parameters
            $stmt->bindValue(':service_name', $service_name, PDO::PARAM_STR);
            $stmt->bindValue(':rating', $rating, PDO::PARAM_INT);
            $stmt->bindValue(':review_text', $review_text, PDO::PARAM_STR);
            $stmt->bindValue(':student_id', $student_id, PDO::PARAM_INT);
            $stmt->bindValue(':created_at', $created_at, PDO::PARAM_STR);

            // Execute the query
            if ($stmt->execute()) {
                $message = "Thanks! Your review has been submitted successfully.";
            } else {
                $message = "Error: " . $stmt->errorInfo()[2];
            }
        }
    } else {
        // Email does not exist in the database
        $message = "You are not our user. Only users who availed our service can leave reviews.";
    }
}
?>

<!-- Review Form -->
<div class="review-form">
    <h2>Submit Your Review</h2>
    <form method="POST" action="">
        <label for="service_name">Service Name</label>
        <input type="text" name="service_name" placeholder="Enter service name" required><br>

        <label for="email">Email Address</label>
        <input type="email" name="email" placeholder="Enter user email" required><br>

        <label for="rating">Rating</label>
        <div class="star-rating">
            <span class="star" data-value="1"></span>
            <span class="star" data-value="2"></span>
            <span class="star" data-value="3"></span>
            <span class="star" data-value="4"></span>
            <span class="star" data-value="5"></span>
        </div>
        <input type="hidden" name="rating" id="rating-value" required><br><br>

        <script>
            const stars = document.querySelectorAll('.star-rating .star');
            const ratingInput = document.getElementById('rating-value');

            stars.forEach((star) => {
                star.addEventListener('click', (e) => {
                    const value = e.target.dataset.value;

                    // Reset all stars
                    stars.forEach((s) => s.classList.remove('active'));

                    // Activate clicked stars and those before it
                    for (let i = 0; i < value; i++) {
                        stars[i].classList.add('active');
                    }

                    // Set the value of the hidden input
                    ratingInput.value = value;
                });
            });
        </script>

        <label for="review_text">Your Review</label>
        <textarea name="review_text" rows="4" cols="30" placeholder="Write your review here..." required></textarea><br>

        <button type="submit">Submit Review</button>
    </form>
</div>

<!-- Popup and Overlay -->
<div id="overlay" style="display: none;"></div>
<div id="popup" style="display: none;">
    <h3 id="popup-message"></h3>
    <button onclick="closePopup()">OK</button>
</div>

<script>
    function showPopup(message) {
        document.getElementById('popup-message').innerText = message;
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('popup').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
</script>

<?php if (!empty($message)): ?>
    <script>
        // Display the popup with the message
        showPopup("<?php echo $message; ?>");
    </script>
<?php endif; ?>



















<?php
// Include database connection
include './Course/conn.php';

// Set default order to 'newest'
$order = isset($_GET['order']) ? $_GET['order'] : 'DESC';  // Default to descending order (newest first)

// Validate order input to avoid SQL injection
if (!in_array($order, ['ASC', 'DESC'])) {
    $order = 'DESC';  // Fallback to default
}

// Fetch reviews from the database, sorted by date (created_at)
$query = "SELECT reviews.*, students_tbl.student_fullname 
          FROM reviews 
          JOIN students_tbl ON reviews.student_id = students_tbl.student_id 
          ORDER BY reviews.created_at $order";  // Order dynamically based on user selection
$result = $conn->query($query);

// Check if the query is successful
if (!$result) {
    die("Error fetching data: " . $conn->error);
}

// Initialize variables for counting ratings and calculating average score
$ratingCount = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
$totalScore = 0;
$totalReviews = 0;
$reviews = [];  // Array to store the reviews

// Fetch all reviews and process ratings
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $reviews[] = $row;  // Store the review in the array
    $rating = $row['rating'];
    $ratingCount[$rating]++;  // Count the number of reviews for each rating
    $totalScore += $rating;   // Add the rating to the total score
    $totalReviews++;         // Increment the total review count
}

// Calculate average score
$averageScore = $totalReviews > 0 ? round($totalScore / $totalReviews, 2) : 0;

// Calculate percentage based on the average score (1 star = 20%)
$percentage = $averageScore * 20; // Each star corresponds to 20% (1 star = 20%, 2 stars = 40%, etc.)
?>

<!-- Display Reviews -->
<div class="review-display">
    <!-- Display Total Ratings Count -->
    <div class="ratings-breakdown">
        <div class="star-count">
        <h2>Rating Breakdown</h2>
        <p>Reviews <?php echo $averageScore; ?> (5.00)</p>
        <p>Recommended <?php echo $percentage; ?>%</p>
        <p><span class="total-stars">★</span> <?php echo $ratingCount[1]; ?> reviews</p>
        <p><span class="total-stars">★★</span> <?php echo $ratingCount[2]; ?> reviews</p>
        <p><span class="total-stars">★★★</span> <?php echo $ratingCount[3]; ?> reviews</p>
        <p><span class="total-stars">★★★★</span> <?php echo $ratingCount[4]; ?> reviews</p>
        <p><span class="total-stars">★★★★★</span> <?php echo $ratingCount[5]; ?> reviews</p>
        </div>
    </div>

    <!-- Dropdown for selecting the order of reviews -->
    <form method="GET" action="">
        <div class="filter-reviews">
        <h2>All Reviews</h2>
        <label for="order">Show Reviews: </label>
        <select name="order" id="order" onchange="this.form.submit()">
            <option value="DESC" <?php echo ($order === 'DESC') ? 'selected' : ''; ?>>New</option>
            <option value="ASC" <?php echo ($order === 'ASC') ? 'selected' : ''; ?>>Old</option>
        </select>
        </div>
    </form>

    <!-- Display All Reviews -->
    <?php if (count($reviews) > 0): ?>
        <?php foreach ($reviews as $row): ?>
            <div class="review">
                <p style="font-weight: bold; font-size: 16px;"><i class="fa fa-user" style="margin-right: 7px;"></i> <?php echo htmlspecialchars($row['student_fullname']); ?></p> <!-- Display full name here -->
                <p class="stars"><?php echo str_repeat('★', $row['rating']); ?></p>
                <small><?php echo $row['created_at']; ?></small>
                <p style="background: #7FBF4D; color: #fff; display: inline-block; padding: 0 5px; border-radius: 2px;">
                    <strong>Service taken:</strong> <?php echo htmlspecialchars($row['service_name']); ?>
                </p>

                <p><?php echo htmlspecialchars($row['review_text']); ?></p>
                <hr>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No reviews yet.</p>
    <?php endif; ?>
</div> 





      <div class="footer-top">
      </div>
      <?php include './footer.php'; ?>

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
