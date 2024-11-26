<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Section</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="app-main__outer">
<div class="app-main__inner">
    
<?php
if (isset($_GET['section'])) {
    $section = $_GET['section'];

    // Set timezone to Dhaka
    date_default_timezone_set('Asia/Dhaka');

    // Class start and end time settings
    $classStartTime = strtotime("7:45 PM");
    $classEndTime = $classStartTime + 50 * 60; // 50 minutes after class start time

    // Today's day
    $today = date('l');

    // Days of the week for the next class
    $daysOfWeek = ['Saturday', 'Monday', 'Tuesday', 'Wednesday'];
    $nextClassTime = null;
    $nextClassDay = null;

    // Find the next class time
    foreach ($daysOfWeek as $day) {
        $nextClassTimestamp = strtotime($day . " 7:45 PM");

        if ($nextClassTimestamp > time()) {
            $nextClassTime = $nextClassTimestamp;
            $nextClassDay = $day;
            break;
        }
    }

    // Switch for different sections
    switch ($section) {
        case 'join':

            // If class is ongoing
            if (time() >= $classStartTime && time() <= $classEndTime) {
                echo "<div class='box'>
                        <img src='../../../../../webImg/zoom-logo.webp' style='width:100%; height:100%;'></img>
                        <h5>ক্লাস শুরু 7:45 PM থেকে</h5>
                        <p>ক্লাস চলছে, অনুগ্রহ করে জয়েন করুন।</p>
                        <div class='join-link'>
                            <a target='_blank' href='https://zoom.us/postattendee?mn=8zVY4DMsFjCmRWg35joW59qN6QgydWFbBMG7.yF3fjfcsL4AHNxF9'>ক্লাসে যোগ দিন</a>
                        </div>
                    </div>";
            } else {
                // Countdown for next class
                $timeRemaining = $nextClassTime - time();
                echo "<div class='box'>
                        <img src='../../../../../webImg/zoom-logo.webp' style='width:100%; height:100%;'></img>
                        <h5>Class $nextClassDay 7:45 PM</h5>
                        <p id='countdown-timer'>Remaining: <span id='countdown'></span></p>
                        <div class='join-link'>
                            <a target='_blank' href='https://zoom.us/postattendee?mn=8zVY4DMsFjCmRWg35joW59qN6QgydWFbBMG7.yF3fjfcsL4AHNxF9'>ক্লাসে যোগ দিন</a>
                        </div>
                    </div>";
            }
            break;

        case 'record':
            echo "<h2>Class Record</h2>";
            echo "<p>ক্লাসের রেকর্ডের তথ্য এখানে দেখানো হবে।</p>";
            break;

        case 'attendance':
            echo "<h2>Class Attendance</h2>";
            echo "<p>ক্লাসের উপস্থিতির তথ্য এখানে দেখানো হবে।</p>";
            break;

        case 'details':
            echo "<h2>Class Details</h2>";
            echo "<p>ক্লাসের বিস্তারিত তথ্য এখানে দেখানো হবে।</p>";
            break;

        default:
            echo "<h2>তথ্য পাওয়া যায়নি</h2>";
            break;
    }
} else {
    echo "<h2>কোনো ক্লাস সেকশন সিলেক্ট করা হয়নি</h2>";
}
?>


</div>  

<script>
// Countdown Timer Function
function startCountdown(timeRemaining) {
    const countdownElement = document.getElementById('countdown');
    let timer = setInterval(function() {
        // Calculate days, hours, minutes, seconds
        let days = Math.floor(timeRemaining / (24 * 60 * 60));
        let hours = Math.floor((timeRemaining % (24 * 60 * 60)) / 3600);
        let minutes = Math.floor((timeRemaining % 3600) / 60);
        let seconds = timeRemaining % 60;

        // Add leading zeros if necessary
        if (hours < 10) hours = '0' + hours;
        if (minutes < 10) minutes = '0' + minutes;
        if (seconds < 10) seconds = '0' + seconds;

        countdownElement.textContent = `${days}d : ${hours}h : ${minutes}m : ${seconds}s`;

        if (timeRemaining <= 0) {
            clearInterval(timer);
            countdownElement.textContent = "Class is ongoing";
        }
        
        timeRemaining--;
    }, 1000);
}

<?php if ($nextClassTime) { ?>
    // পরবর্তী ক্লাসের জন্য countdown শুরু করুন
    startCountdown(<?php echo $timeRemaining; ?>);
<?php } ?>

</script>

</body>
</html>

<style>


/* Box Styling */
.box {
    text-align: center;
    background-color: #fff;
    border: 2px solid #4caf50;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 300px;
    margin: 100px auto;
}

.box h5 {
    margin: 15px auto 5px auto;
    font-size:20px;
    font-weight: bold;
}
.box p{
    font-size:17px;
    font-weight: 500;
}
#countdown {
    margin: 15px auto;
    color: #4caf50;
}

/* Link Styling */
.join-link {
    margin: 30px auto 15px auto;
}
.join-link a {
    text-decoration: none;
    font-size: 18px;
    color: white;
    background-color: #4caf50;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

/* Link Hover Effect */
.box a:hover {
    background-color: #45a049;
}

    </style>

