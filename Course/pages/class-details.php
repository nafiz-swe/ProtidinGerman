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
// Database connection setup (assuming $conn is the PDO connection object)
// Fetching batch details (example query)
if (isset($_GET['section'])) {
    $section = $_GET['section'];

    // Query to get batch details
    $batchQuery = $conn->query("SELECT batch_number, class_link, class_day, class_time, start_date, class_status, notice_board FROM batch_tbl WHERE batch_id='$studentBatch'")->fetch(PDO::FETCH_ASSOC);
    $batchNumber = $batchQuery['batch_number'];
    $classLink = $batchQuery['class_link'];
    $classDays = $batchQuery['class_day']; 
    $classTime = $batchQuery['class_time'];
    $batchStart = $batchQuery['start_date'];
    $classStatus = $batchQuery['class_status']; 
    $noticeBoard = $batchQuery['notice_board']; 

    // Set timezone to Asia/Dhaka
    date_default_timezone_set('Asia/Dhaka');

    // Get current day and time in Asia/Dhaka timezone
    $currentDay = date('l'); // Get today's day (e.g., "Monday", "Tuesday")
    $currentDayIndex = date('w'); // Get the current day as a number (0 for Sunday, 1 for Monday, ..., 6 for Saturday)
    $currentTime = new DateTime(); // Get current time

    // Split the class days from the database (comma separated)
    $classDaysArray = explode(", ", $classDays);

    // Initialize a variable for next class date
    $nextClassDay = null;
    $nextClassTime = null;
    $foundNextClass = false;

    // Loop through each day in class days and find the next class day
    foreach ($classDaysArray as $day) {
        // Convert day to index (Sunday = 0, Monday = 1, ..., Saturday = 6)
        $dayIndex = date('w', strtotime($day));

        // Check if this day has not passed yet (for today) and if class time is still to come today
        if ($dayIndex > $currentDayIndex || ($dayIndex == $currentDayIndex && new DateTime($classTime) > $currentTime)) {
            // For today, check if the class time is yet to come
            if ($dayIndex == $currentDayIndex && new DateTime($classTime) > $currentTime) {
                $nextClassDay = $day;
                $nextClassTime = new DateTime("today $classTime");
            } else {
                // For future days, set the class time to the "next" occurrence
                $nextClassDay = $day;
                $nextClassTime = new DateTime("next $day $classTime");
            }
            $foundNextClass = true;
            break;
        }
    }

    // If no future class day was found, take the first class day of next week
    if (!$foundNextClass) {
        $nextClassDay = $classDaysArray[0];
        $nextClassTime = new DateTime("next $nextClassDay $classTime");
    }

    // Check if the next class time is within 50 minutes of the current time
    $nextClassTimestamp = $nextClassTime->getTimestamp();
    $currentTimestamp = $currentTime->getTimestamp();
    $timeDifference = $nextClassTimestamp - $currentTimestamp;
    $formattedClassTime = date('h:i A', strtotime($classTime));

    // Check if today is a class day and if the current time is within the class time range
    $isClassRunning = false;

    if (in_array($currentDay, $classDaysArray)) { // Check if today is a class day
        $classStartTimestamp = (new DateTime($classTime))->getTimestamp(); // Class start time
        $classEndTimestamp = $classStartTimestamp + (50 * 60); // Class end time (50 minutes after start)
        
        if ($currentTimestamp >= $classStartTimestamp && $currentTimestamp <= $classEndTimestamp) {
            $isClassRunning = true; // Class is running
        }
    }

    // Pass the next class time and isClassRunning to JavaScript for the countdown
    echo "<script>
        const nextClassTime = $nextClassTimestamp * 1000; // Next class time in milliseconds
        const isClassRunning = " . ($isClassRunning ? "true" : "false") . ";
        let reloadInterval = setInterval(function() {
            window.location.reload();
        }, 50 * 60 * 1000); // Reload every 50 minutes
    </script>";


    switch ($section) {
        // Class Joing Part
        case 'join':
            echo "<div class='notice-board'>
                <p><span>Important Notice:</span> $noticeBoard</p> 
            </div>";
            echo "<div class='class-details'>
                <p>Class Schedule: <span style='color:#a1a1a1'> $classDays</span></p>
                <p>Batch Started: <span style='color:#a1a1a1'> $batchStart</span></p> 
                <p>Class Time: <span style='color:#a1a1a1'> $formattedClassTime</span></p> 
                <p>Batch Status: <span style='color:#a1a1a1'> $classStatus</span></p> 
            </div>";

            if ($classStatus === 'Coming soon') {
                echo "<div class='box'>
                    <h4>অপেক্ষা করুন!</h4>
                    <h6>ক্লাস নির্ধারিত দিনেই শুরু হবে। 😍</h6>
                    <div class='join-link'>
                    <a style='color:#fff;'>ক্লাস লিংক</a>
                    </div>
                </div>";
            } elseif ($classStatus === 'On going') {
                if ($isClassRunning) {
                    echo "<div class='box'>
                        <img src='../../../../../webImg/zoom-logo.webp' style='width:100%; height:100%;'></img>
                        <h4>ক্লাস চলছে! 📖</h4> 
                        <h6>শুরু হয়েছে $formattedClassTime থেকে</h6>
                        <div class='join-link'>
                            <a target='_blank' href='$classLink'>ক্লাসে আসুন</a>
                        </div>
                    </div>";
                } else {
                    echo "<div class='box'>
                        <img src='../../../../../webImg/zoom-logo.webp' style='width:100%; height:100%;'></img>
                        <h4>পরবর্তী ক্লাস $nextClassDay</h4> 
                        <h6>শুরু হবে: $formattedClassTime থেকে</h6>
                        <p id='countdown-timer'><span id='countdown'></span></p>
                        <div class='join-link'>
                            <a target='_blank' href='$classLink'>অপেক্ষা করুন</a>
                        </div>
                    </div>";
                }
            } elseif ($classStatus === 'Holiday') {
                echo "<div class='box'>
                    <h4>ছুটি চলছে!</h4>
                    <h6>পরবর্তী ক্লাসের আপডেট হোয়াটস্যাপ গ্রুপে জানিয়ে দেয়া হবে।</h6>
                    <div class='join-link'>
                    <a style='color:#fff;'>ক্লাস লিংক</a>
                </div>";
            } elseif ($classStatus === 'Complete') {
                echo "<div class='box'>
                    <h4>কোর্স সম্পন্ন হয়েছে!</h4>
                    <h6>আপনার যেকোনো সমস্যার সমাধানের জন্য আমরা আপনাকে সেবা দিতে অত্যন্ত আগ্রহী। 😊</h6>
                    <div class='join-link'>
                    <a style='color:#fff;'>আপনার জন্য দোয়া রইলো 🤲</a>
                </div>";
            } else {
                echo "<div class='box'>
                    <h4>তথ্য পাওয়া যায়নি!</h4>
                </div>";
            }
        break;


        // Class Record Part
        case 'record':
            echo "<div class='record-part'>
                <div class='record-info'>
                    <h2>ক্লাস রেকর্ড গুলো পর্যায়ক্রমে পেয়ে যাবেন!</h2>
                </div>
                <div class='record'>
                    <img src='../../../../../webImg/zoom-logo.webp' style='width:100%; height:100%;'></img>
                    <h6><span>টপিকস:</span> Verb & Prepositions 😍</h6>
                    <p><span>ক্লাস তারিখ:</span> </p>
                    <div class='join-link'>
                        <a target='_blank' href='$'>ক্লাস রেকর্ড দেখুন</a>
                    </div>
                </div>
            </div>";           
        break;

        // Class Attendance Part
        case 'attendance':
            echo "<h2>Class Attendance</h2>";
            echo "<p>ক্লাসের উপস্থিতির তথ্য এখানে দেখানো হবে।</p>";
        break;

        // Class Details Part
        case 'details':
            echo "<h2>Class Details</h2>";
            echo "<p>ক্লাসের বিস্তারিত তথ্য এখানে দেখানো হবে।</p>";
        break;

        default:
            echo "<h2>তথ্য পাওয়া যায়নি</h2>";
        break;
    } 
    }   else    {
        echo "<h2>কোনো ক্লাস সেকশন সিলেক্ট করা হয়নি</h2>";
    }
?>

<script>
// JavaScript for countdown
function updateCountdown() {
    const now = new Date().getTime();
    const timeRemaining = nextClassTime - now;

    if (isClassRunning) {
        // Show countdown only for the next 50 minutes
        const remainingMinutes = Math.floor(timeRemaining / (1000 * 60)); // In minutes
        if (remainingMinutes > 0) {
            document.getElementById('countdown').innerHTML = remainingMinutes + " মিনিট বাকি";
        } else {
            document.getElementById('countdown').innerHTML = ""; // No text if class has started
        }
    } else if (timeRemaining > 0) {
        // Countdown for next class
        const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

        document.getElementById('countdown').innerHTML = `${days} দিন ${hours} ঘন্টা ${minutes} মিনিট ${seconds} সেকেন্ড`;
    }
}
// Update countdown every second
setInterval(updateCountdown, 1000);
</script>



</body>
</html>
<style>
.record-part {
    margin: 30px auto 100px auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 20px; /* কার্ডগুলোর মধ্যে ফাঁকা */
}

.record-info h2 {
    font-size: 35px;
    text-align: center;
    margin: 20px auto;
    padding: 20px;
    color: #fff;
}

.record {
    text-align: center;
    background-color: #fff;
    border: 2px solid #4caf50;
    padding: 20px 10px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 300px;
    font-size: 16px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}

.record span {
    font-weight: bold;
}

.record h6 {
    margin: 20px auto auto auto;
    padding: 5px 10px;
    text-align: left;
    width: 100%; /* পুরো জায়গায় টেক্সট দেখানোর জন্য */
}

.record p {
    margin: auto;
    padding: 5px 10px;
    text-align: left;
    width: 100%; /* পুরো জায়গায় টেক্সট দেখানোর জন্য */
}

.join-link a {
    text-decoration: none;
    color: #fff;
    background-color: #4caf50;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.join-link a:hover {
    background-color: #45a049;
}

/* Box Styling */
.box {
    text-align: center;
    background-color: #fff;
    border: 2px solid #4caf50;
    padding: 20px 10px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 330px;
    margin: 25px auto 100px auto;
}
.box h4 {
    margin: 15px auto 5px auto;
    font-size:20px;
    font-weight: bold;
}
.box h6 {
    margin: auto;
    font-size:18px;
}
.box p{
    font-size:17px;
    margin-top: 5px;
    font-weight: 500;
}
.class-details p{
    color: #fff;
    margin: auto;
    font-size: 16px;
}
.class-details{
    margin: auto 20px;
    padding: 10px;
}
.notice-board {
    margin: 0px auto 25px auto;
    padding: 10px;
    width: 100%;
    background-image: linear-gradient(-20deg, #2b5876 0%, #4e4376 100%) !important;
}
.notice-board p{
    margin: auto;
    color: #fff;
    font-size: 15px;
    padding: 0 10px;
    text-align: justify;
}
.notice-board span{
    color: #45A049;
    font-weight: bold;
    font-size: 17px;
}
#countdown {
    margin: 15px auto;
    color: #45A049 ;
}
/* Link Styling */
.join-link {
    margin: 30px auto 15px auto;
}
.join-link a {
    text-decoration: none;
    font-size: 18px;
    color: white;
    background-color: #4CAF50;  /*#4caf50*/
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}
/* Link Hover Effect */
.box a:hover {
    background-color: #45A049 ;  /*#45a049*/
}
</style>

