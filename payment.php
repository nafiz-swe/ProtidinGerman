<?php
require_once './Course/conn.php';
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name      = $_POST["name"] ?? '';
    $email          = $_POST["email"] ?? '';
    $mobile         = $_POST["mobile"] ?? '';
    $course         = $_POST["course"] ?? '';
    $batch_number   = $_POST["batch_number"] ?? '';
    $payment_method = $_POST["payment_method"] ?? '';
    $amount         = $_POST["amount"] ?? '';
    $proof_type     = $_POST["proof_type"] ?? '';
    $transaction_id = $_POST["transaction_id"] ?? '';
    
    // নতুন ফিল্ড
    $birthdate = $_POST["birthdate"] ?? null;
    $gender    = $_POST["gender"] ?? null;
    $password  = $_POST["password"] ?? ''; // plaintext password

    $screenshot_path = null;

    if (isset($_FILES["screenshot"]) && $_FILES["screenshot"]["error"] == 0) {
        $upload_dir = "payment/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $filename = time() . "_" . basename($_FILES["screenshot"]["name"]);
        $target_file = $upload_dir . $filename;

        if (move_uploaded_file($_FILES["screenshot"]["tmp_name"], $target_file)) {
            $screenshot_path = $target_file;
        }
    }

    $stmt = $conn->prepare("INSERT INTO course_payments (
        full_name, email, mobile, course, batch_number,
        payment_method, amount, proof_type, transaction_id, screenshot_path,
        birthdate, gender, password
    ) VALUES (
        :full_name, :email, :mobile, :course, :batch_number,
        :payment_method, :amount, :proof_type, :transaction_id, :screenshot_path,
        :birthdate, :gender, :password
    )");

    $success = $stmt->execute([
        ":full_name"        => $full_name,
        ":email"            => $email,
        ":mobile"           => $mobile,
        ":course"           => $course,
        ":batch_number"     => $batch_number,
        ":payment_method"   => $payment_method,
        ":amount"           => $amount,
        ":proof_type"       => strtolower($proof_type),
        ":transaction_id"   => $transaction_id ?: null,
        ":screenshot_path"  => $screenshot_path,
        ":birthdate"        => $birthdate,
        ":gender"           => $gender,
        ":password"         => $password // no hash
    ]);
}

// AJAX দিয়ে ব্যাচ নাম্বার রিকুয়েস্ট
if (isset($_GET['course']) && isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    $course = $_GET['course'];

    $stmt = $conn->prepare("SELECT batch_number FROM batch_tbl WHERE batch_number LIKE :course_like AND class_status = 'Coming soon' LIMIT 1");
    $stmt->execute([':course_like' => $course . '%']);
    $batch = $stmt->fetch(PDO::FETCH_ASSOC);

    echo $batch ? $batch['batch_number'] : '';
    exit;
}
?>



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
  <title>Course Payment</title>

  <style>
body {
  background: #f7f7f7;
  font-family: 'Segoe UI', sans-serif;
  min-height: 100vh;
  margin: 0;
  padding: 0;
  /* display:flex; align-items:center; justify-content:center; এইগুলো বাদ দিলাম কারণ তোমার হেডার-ফুটার থাকতে পারে */
}

form {
  background: white;
  padding: 40px 30px 30px 30px;  /* উপরে একটু বেশি প্যাডিং */
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  width: 100%;
  max-width: 550px;
  margin: 160px auto;  /* ফর্মের উপরে ও নিচে যথেষ্ট মার্জিন, আর মাঝে রাখা */
  box-sizing: border-box;
}

.site-navbar .site-menu.main-menu > li {
  margin-left: 20px; /* প্রতিটা মেনু আইটেমে একটু স্পেস */
}

.site-navbar {
  padding-top: 10px !important;
  padding-bottom: 10px !important;
}


h2 {
  text-align: center;
  color: #333;
  margin-bottom: 30px;  /* ফর্ম টাইটেলের নিচে বেশি স্পেস */
  font-size: 2.2rem;
  font-weight: 700;
}


    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 600;
      color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"],
    select,
    input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 6px;
      border: 1px solid #ccc;
      transition: 0.3s;
    }

    input:focus,
    select:focus {
      outline: none;
      border-color: #60a5fa;
      box-shadow: 0 0 5px rgba(100, 149, 237, 0.4);
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #38b6ff;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0a91da;
    }

    .popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      z-index: 1000;
      display: none;
      text-align: center;
    }

    .popup button {
      margin-top: 20px;
      background: #38b000;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background: rgba(0,0,0,0.3);
      z-index: 999;
      display: none;
    }
  </style>
  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="site-wrap">

  </div>
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

<!-- নিচে HTML শুরু -->
<form method="post" enctype="multipart/form-data">
  <h2>Course Payment Form</h2>

  <label for="name">Full Name</label>
  <input type="text" name="name" id="name" required />

    <label for="birthdate">Birthdate</label>
  <input type="date" name="birthdate" id="birthdate" required />

  <label for="gender">Gender</label>
  <select name="gender" id="gender" required>
    <option value="">Select</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
  </select>

  <label for="email">Email Address</label>
  <input type="email" name="email" id="email" required />

  <label for="mobile">Mobile Number</label>
  <input type="text" name="mobile" id="mobile" required />

<label for="password">Password</label>
<div style="position: relative;">
  <input type="password" name="password" id="password" required style="padding-right: 40px;" />
  <i class="fas fa-eye" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
</div>


  <label for="course">Course Name</label>
  <select name="course" id="course" required>
    <option value="">Select a course</option>
    <option value="A1">A1</option>
    <option value="A2">A2</option>
    <option value="B1">B1</option>
    <option value="Exam Preparation">B1 Exam Preparation</option>
  </select>

  <label for="batch_number">Upcoming Batch Number</label>
  <input type="text" name="batch_number" id="batch_number" readonly required />

  <label for="payment_method">Payment Method</label>
  <select name="payment_method" id="payment_method" required>
    <option value="">Select</option>
    <option value="Bkash">Bkash</option>
    <option value="Nagad">Nagad</option>
    <option value="Rocket">Rocket</option>
  </select>

  <label for="amount">Payment Amount</label>
  <input type="number" name="amount" id="amount" required />

  <label for="proof_type">Proof Type</label>
  <select name="proof_type" id="proof_type" required>
    <option value="">Select</option>
    <option value="id">Transaction ID</option>
    <option value="screenshot">Screenshot</option>
  </select>

  <div id="transaction_id_field" style="display:none;">
    <label for="transaction_id">Transaction ID</label>
    <input type="text" name="transaction_id" id="transaction_id" />
  </div>

  <div id="screenshot_field" style="display:none;">
    <label for="screenshot">Screenshot Upload</label>
    <input type="file" name="screenshot" id="screenshot" accept="image/*" />
  </div>

  <button type="submit">Submit Payment</button>
</form>

<?php if ($success): ?>
  <div class="overlay" id="overlay"></div>
  <div class="popup" id="popup">
    <h3>আপনার পেমেন্ট সফলভাবে জমা হয়েছে ✅</h3>
    <button onclick="closePopup()">OK</button>
  </div>
<?php endif; ?>

<script>
  function closePopup() {
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
  }

  window.onload = function () {
    if (document.getElementById('popup')) {
      document.getElementById('popup').style.display = 'block';
      document.getElementById('overlay').style.display = 'block';
    }
  };

  // Proof type এর ওপর ভিত্তি করে ফিল্ড দেখানো লুকানো
  const proofTypeSelect = document.getElementById('proof_type');
  const transactionField = document.getElementById('transaction_id_field');
  const screenshotField = document.getElementById('screenshot_field');

  function toggleProofFields() {
    const selected = proofTypeSelect.value;
    if (selected === 'id') {
      transactionField.style.display = 'block';
      screenshotField.style.display = 'none';
    } else if (selected === 'screenshot') {
      transactionField.style.display = 'none';
      screenshotField.style.display = 'block';
    } else {
      transactionField.style.display = 'none';
      screenshotField.style.display = 'none';
    }
  }

  proofTypeSelect.addEventListener('change', toggleProofFields);
  window.addEventListener('load', toggleProofFields);

  // কোর্স সিলেক্ট করলে AJAX দিয়ে ব্যাচ নম্বর লোড
  document.getElementById('course').addEventListener('change', function () {
    const course = this.value;
    if (course) {
      fetch(`payment.php?course=${encodeURIComponent(course)}`, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
      .then(response => response.text())
      .then(batch => {
        document.getElementById('batch_number').value = batch || '';
      });
    } else {
      document.getElementById('batch_number').value = '';
    }
  });



  // পাসওয়ার্ড টগল ফাংশন
  document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");

    togglePassword.addEventListener("click", function () {
      const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);
      this.classList.toggle("fa-eye-slash");
    });
  });
</script>

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
