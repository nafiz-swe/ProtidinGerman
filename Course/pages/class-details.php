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

        case 'record':
            echo "<div class='record-part'>
                <div class='head-info'>
                    <h2>ক্লাস রেকর্ড গুলো পর্যায়ক্রমে পেয়ে যাবেন!</h2>
                </div>";
        
            // Query to fetch class records based on batch_number
            $recordQuery = $conn->prepare("SELECT record_id, record_video, class_date, class_topics FROM class_record WHERE batch_number = :batch_number ORDER BY class_date ASC");
            $recordQuery->bindParam(':batch_number', $studentBatch, PDO::PARAM_STR);
            $recordQuery->execute();
        
            if ($recordQuery->rowCount() > 0) {
                $records = $recordQuery->fetchAll(PDO::FETCH_ASSOC); // Fetch all records at once
                echo "<div class='record-list'>";
                $recordCount = count($records); // Start counting from the total number of records
        
                // Loop through records in reverse order to display the most recent first
                for ($i = $recordCount - 1; $i >= 0; $i--) {
                    $record = $records[$i];
                    $recordVideo = $record['record_video'];
                    $classDate = date('l, F j, Y', strtotime($record['class_date']));
                    $classTopics = $record['class_topics']; // Get the topic from the record
                    $videoPath = 'record/' . $studentBatch . '/' . $recordVideo;
        
                    if (file_exists($videoPath)) {
                        echo "<div class='record-item'>
                        
                                <div class='ribbon'>Class: $recordCount</div>
                                <p>$classDate</p>
                                <h3><span>Topic:</span> $classTopics</h3>
                                <div class='video-container'>
                                    <video id='video-$recordCount' class='plyr' controls crossorigin>
                                        <source src='$videoPath' type='video/mp4'>
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>";
                    } else {
                        echo "<div class='record-item'>
                                <h3>ক্লাস #$recordCount</h3>
                                <p><strong>Class Date:</strong> $classDate</p>
                                <p>ভিডিওটি পাওয়া যায়নি।</p>
                            </div>";
                    }
        
                    $recordCount--;
                }
                echo "</div>";
            } else {
                echo "<p>কোনো রেকর্ড পাওয়া যায়নি।</p>";
            }
        
            // Include Plyr CSS and JS
            echo "<link href='https://cdn.jsdelivr.net/npm/plyr@3.6.8/dist/plyr.css' rel='stylesheet'>
                  <script src='https://cdn.jsdelivr.net/npm/plyr@3.6.8/dist/plyr.min.js'></script>
                  <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const players = document.querySelectorAll('.plyr');
                        players.forEach(function (player) {
                            const plyrInstance = new Plyr(player, {
                                controls: [
                                    'play', 'progress', 'current-time', 'duration', 'mute', 'volume', 'settings', 'pip', 'fullscreen'
                                ],
                                settings: ['speed', 'quality'],
                                speed: {
                                    selected: 1,
                                    options: [0.5, 0.75, 1, 1.5, 1.75, 2],
                                },
                                quality: {
                                    default: 720,
                                    options: [360, 480, 720, 1080],
                                    forced: true,
                                },
                                tooltips: { controls: true, seek: true }
                            });
                        });
                    });
                  </script>";
        
            echo "</div>"; // Close record part div
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
    .plyr__progress input[type=range],
    .plyr__volume input[type=range]{
        color: #7FBF4D !important;
    }
    .plyr__control{
        background: #7FBF4D !important;
    }
    .plyr__menu__container .plyr__control[role=menuitemradio][aria-checked=true]:before{
        background:#fff;
    }
    .plyr__menu__container .plyr__control[role=menuitemradio]:before{
        background: #21774f;
    }
    .plyr__menu__container .plyr__control>span{
        color: #fff;
    }
    .plyr__menu__container .plyr__control--forward:after{
        border-left-color: #fff;
    }
    .plyr__menu__container .plyr__control--back:after{
        border-right-color: #fff;
    }
.record-part {
    margin: 10px auto 100px auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 20px; /* কার্ডগুলোর মধ্যে ফাঁকা */
}

.head-info h2 {
    font-size: 35px;
    text-align: center;
    margin: 0 auto 10px auto;
    padding: 20px;
    color: #fff;
}









.record-list {
    display: flex;
    flex-wrap: wrap;
    gap: 30px 25px; /* Space between video items */
    justify-content: center; /* Center align items */
    padding: 20px;
}

.ribbon { 
    position: absolute;
    background-color: #5F9E3F;
    color: #fff;
    padding: 1px 30px 3px 30px;
    font-size: 16px;
    font-weight: bold;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    transform: rotate(-45deg);
    margin: 13px 167px 0px -100px;
}

/* .record-item {
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid #ccc;
    padding: 0px;
    background-color: #f9f9f9; 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    width: 320px;
    max-width: 100%;
    height: 244px;
} */

.record-item {
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid #ccc;
    padding: 0px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    width: 320px;
    max-width: 100%;
    height: 244px;
    transition: box-shadow 0.3s ease, transform 0.3s ease; /* Smooth transition */
}

.record-item:hover {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transform: translateY(-10px);
}

.record-item h3 {
    margin: 0px auto 15px auto;
    color: #666;
    font-size: 18px;
    padding-left: 28px;
    padding-right: 3px;
}
.record-item span {
    color: #7FBF4D;
    font-weight: 500;
}

.record-item p {
    margin: 10px auto 5px auto;
    color: #000;
    font-weight: 500;
}

.video-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 170px; /* Fixed height for the video container */
    overflow: hidden; /* Hide overflow if the video is larger */
}

video {
    width: 100%; /* Full width for the video */
    height: 100%; /* Set fixed height */
    object-fit: cover; /* Maintain aspect ratio without distortion */
    border-radius: 4px; /* Optional: Rounded corners for the video */
}

.join-link a {
    text-decoration: none;
    color: #fff;
    background-color: #7FBF4D;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.join-link a:hover {
    background-color: #5F9E3F;
}

/* Box Styling */
.box {
    text-align: center;
    background-color: #fff;
    border: 2px solid #7FBF4D;
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
    color: #5F9E3F;
    font-weight: bold;
    font-size: 17px;
}
#countdown {
    margin: 15px auto;
    color: #5F9E3F ;
}
/* Link Styling */
.join-link {
    margin: 30px auto 15px auto;
}
.join-link a {
    text-decoration: none;
    font-size: 18px;
    color: white;
    background-color: #7FBF4D;  /*#7FBF4D*/
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}
/* Link Hover Effect */
.box a:hover {
    background-color: #5F9E3F ;  /*#5F9E3F*/
}
</style>

