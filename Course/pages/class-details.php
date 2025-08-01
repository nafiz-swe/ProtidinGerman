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

    $batchQuery = $conn->query("SELECT batch_number, class_link, class_day, class_time, start_date, class_status, notice_board FROM batch_tbl WHERE batch_id='$studentBatch'")->fetch(PDO::FETCH_ASSOC);
    $batchNumber = $batchQuery['batch_number'];
    $classLink = $batchQuery['class_link'];
    $classDays = $batchQuery['class_day']; 
    $classTime = $batchQuery['class_time'];
    $batchStart = $batchQuery['start_date'];
    $classStatus = $batchQuery['class_status']; 
    $noticeBoard = $batchQuery['notice_board']; 

    date_default_timezone_set('Asia/Dhaka');

    $currentDay = date('l'); 
    $currentDayIndex = date('w'); 
    $currentTime = new DateTime(); 

    $classDaysArray = explode(", ", $classDays);

    $nextClassDay = null;
    $nextClassTime = null;
    $foundNextClass = false;

    $dayMap = [
        'Saturday' => 'শনিবার',
        'Sunday' => 'রবিবার',
        'Monday' => 'সোমবার',
        'Tuesday' => 'মঙ্গলবার',
        'Wednesday' => 'বুধবার',
        'Thursday' => 'বৃহস্পতিবার',
        'Friday' => 'শুক্রবার'
    ];

    foreach ($classDaysArray as $day) {
        $dayIndex = date('w', strtotime($day));

        if ($dayIndex > $currentDayIndex || ($dayIndex == $currentDayIndex && new DateTime($classTime) > $currentTime)) {
            if ($dayIndex == $currentDayIndex && new DateTime($classTime) > $currentTime) {
                $nextClassDay = $day;
                $nextClassTime = new DateTime("today $classTime");
            } else {
                $nextClassDay = $day;
                $nextClassTime = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s', strtotime("next $day $classTime")));
            }
            $banglaNextClassDay = $dayMap[$nextClassDay] ?? $nextClassDay; 
            $foundNextClass = true;
            break;
        }
    }

    if (!$foundNextClass) {
        $nextClassDay = $classDaysArray[0];
        $nextClassTime = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s', strtotime("next $nextClassDay $classTime")));
        $banglaNextClassDay = $dayMap[$nextClassDay] ?? $nextClassDay; 
    }

    $nextClassTimestamp = $nextClassTime->getTimestamp();
    $currentTimestamp = $currentTime->getTimestamp();
    $timeDifference = $nextClassTimestamp - $currentTimestamp;
    $formattedClassTime = date('h:i A', strtotime($classTime));

    $isClassRunning = false;

    if (in_array($currentDay, $classDaysArray)) { 
        $classStartTimestamp = (new DateTime($classTime))->getTimestamp(); 
        $classEndTimestamp = $classStartTimestamp + (2 * 60); 
        
        if ($currentTimestamp >= $classStartTimestamp && $currentTimestamp <= $classEndTimestamp) {
            $isClassRunning = true; 
        }
    }

    echo "<script>
        const nextClassTime = $nextClassTimestamp * 1000;
        const isClassRunning = " . ($isClassRunning ? "true" : "false") . ";
        let reloadInterval = setInterval(function() {
            window.location.reload();
        }, 2 * 60 * 1000);
    </script>";

    switch ($section) {
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
    if (isset($_SESSION['examineeSession']['student_id'])) {
        $studentId = $_SESSION['examineeSession']['student_id'];
        echo "
        <div class='box'>
            <img src='../../../../../webImg/zoom-logo.webp' style='width:100%; height:100%;'>
            <h4>ক্লাস চলছে! 📖</h4>
            <h6>শুরু হয়েছে $formattedClassTime থেকে</h6>
            <div class='join-link'>
                <a 
    target='_blank' 
    href='$classLink' 
    onclick='return markAttendance($studentId, $studentBatch, \"$currentDay\", \"$formattedClassTime\")'
    style='background-color:#28a745; color:white; padding:10px; text-decoration:none; border-radius:5px;'
>
    ক্লাসে জয়েন করুন
</a>
            </div>
        </div>

        <script>
        function markAttendance(studentId, batchId, classDay, classTime) {
            fetch('attendance_save.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    student_id: studentId,
                    batch_id: batchId,
                    class_day: classDay,
                    class_time: classTime
                })
            })
            .then(res => res.json())
            .then(data => {
                console.log(data);
            });
        }
        </script>
        ";
    }
} else {
                    echo "<div class='box'>
                        <img src='../../../../../webImg/zoom-logo.webp' style='width:100%; height:100%;'></img>
                        <h4>পরবর্তী ক্লাস $banglaNextClassDay</h4>
                        <h6>শুরু হবে: $formattedClassTime থেকে</h6>
                        <p id='countdown-timer'><span id='countdown'></span></p>
                        <div class='join-link'>
                            <a target='_blank'>অপেক্ষা করুন</a>
                        </div>
                    </div>";
                }
            } elseif ($classStatus === 'Holiday') {
                echo "<div class='box'>
                    <h4>ছুটি চলছে!</h4>
                    <h6>পরবর্তী ক্লাসের আপডেট হোয়াটস্যাপ গ্রুপে জানিয়ে দেয়া হবে।</h6>
                    <div class='join-link'>
                        <a style='color:#fff;'>ক্লাস লিংক</a>
                    </div>
                </div>";
            } elseif ($classStatus === 'Complete') {
                echo "<div class='box'>
                    <h4>কোর্স সম্পন্ন হয়েছে!</h4>
                    <h6>আপনার যেকোনো সমস্যার সমাধানের জন্য আমরা আপনাকে সেবা দিতে অত্যন্ত আগ্রহী। 😊</h6>
                    <div class='join-link'>
                        <a style='color:#fff;'>আপনার জন্য দোয়া রইলো 🤲</a>
                    </div>
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

    $recordQuery = $conn->prepare("SELECT record_id, record_video, class_date, class_topics FROM class_record WHERE batch_number = :batch_number ORDER BY class_date ASC");
    $recordQuery->bindParam(':batch_number', $studentBatch, PDO::PARAM_STR);
    $recordQuery->execute();

    if ($recordQuery->rowCount() > 0) {
        $records = $recordQuery->fetchAll(PDO::FETCH_ASSOC);
        echo "<div class='record-list'>";
        $recordCount = count($records);

        for ($i = $recordCount - 1; $i >= 0; $i--) {
            $record = $records[$i];
            $recordVideo = $record['record_video'];
            $classDate = date('l, F j, Y', strtotime($record['class_date']));
            $classTopics = $record['class_topics'];
            $videoPath = 'record/' . $studentBatch . '/' . $recordVideo;

            if (file_exists($videoPath)) {
                echo "<div class='record-item'>
                        <div class='ribbon'>Class: $recordCount</div>
                        <p>$classDate</p>
                        <h3><span>Topic:</span> $classTopics</h3>
                        <div class='video-container'>
                            <video id='video-$recordCount' class='plyr' controls preload='auto' src='$videoPath'></video>
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

    echo "
    <link rel='stylesheet' href='https://cdn.plyr.io/3.7.8/plyr.css' />
    <script src='https://cdn.plyr.io/3.7.8/plyr.polyfilled.js'></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const players = Array.from(document.querySelectorAll('.plyr')).map(p => {
            return new Plyr(p, {
                controls: [
                    'play-large', 'play', 'progress', 'current-time', 'mute', 'volume',
                    'captions', 'settings', 'download', 'fullscreen' // ⬅️ download যুক্ত করা হলো
                ],
                settings: ['quality', 'speed'],
                quality: {
                    default: 1080,
                    options: [1080, 720, 480, 360, 240],
                    forced: true,
                    onChange: (quality) => {
                        console.log('Quality changed to ' + quality);
                    }
                },
                speed: {
                    selected: 1,
                    options: [0.5, 0.75, 1, 1.25, 1.5]
                }
            });
        });

        document.addEventListener('keydown', function(e) {
            let player = players[0];
            if (!player) return;

            if (e.code === 'Space') {
                e.preventDefault();
                if (player.playing) {
                    player.pause();
                } else {
                    player.play();
                }
            }

            if (e.key === 'ArrowUp') {
                e.preventDefault();
                player.volume = Math.min(player.volume + 0.1, 1);
            } else if (e.key === 'ArrowDown') {
                e.preventDefault();
                player.volume = Math.max(player.volume - 0.1, 0);
            }

            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                player.currentTime = Math.max(player.currentTime - 5, 0);
            }

            if (e.key === 'ArrowRight') {
                e.preventDefault();
                player.currentTime = Math.min(player.currentTime + 5, player.duration);
            }
        });
    });
    </script>

    ";
    echo "</div>";
    break;

case 'attendance':
    echo "<h3 class='text-white my-4'>Class Attendance</h3>";

    if (isset($_SESSION['examineeSession']['student_id'])) {
        $studentId = $_SESSION['examineeSession']['student_id'];

        // attend টেবিল থেকে ডাটা নেবে
        $attendanceStmt = $conn->prepare("SELECT batch_id, class_day, class_time, attend_time FROM attend WHERE student_id = ? ORDER BY attend_time ASC");
        $attendanceStmt->execute([$studentId]);
        $attendances = $attendanceStmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($attendances) > 0) {
            echo "<div style='overflow-x:auto;'>";
            echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse; width: 100%; background: #f9f9f9;'>";
            echo "<thead style='background-color:#7FBF4D; color:white;'>";
            echo "<tr>";
            echo "<th>ক্লাস</th>";
            echo "<th>ব্যাচ আইডি</th>";
            echo "<th>ক্লাসের দিন</th>";
            echo "<th>ক্লাসের সময়</th>";
            echo "<th>উপস্থিতির সময়</th>";
            echo "<th>উপস্থিতি অবস্থা</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            $i = 1;

            // ধরছি উপস্থিতি হলে Green (Present)
            foreach ($attendances as $attendance) {
                $batchId = $attendance['batch_id'];
                $classDay = $attendance['class_day'];
                $classTime = $attendance['class_time'];
                $attendTime = $attendance['attend_time'];

                // এখানে আমরা "Present" ধরে নিচ্ছি, কারণ attend টেবিলে রেকর্ড মানে উপস্থিতি
                $statusText = "Present";
                $colorStyle = "background-color: #d4edda; color: #155724; font-weight: bold;";

                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$batchId}</td>";
                echo "<td>{$classDay}</td>";
                echo "<td>{$classTime}</td>";
                echo "<td>" . date('d M Y, h:i A', strtotime($attendTime)) . "</td>";
                echo "<td style='{$colorStyle}'>{$statusText}</td>";
                echo "</tr>";

                $i++;
            }

            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<p style='color:red;'>কোনো উপস্থিতির রেকর্ড পাওয়া যায়নি।</p>";
        }
    } else {
        echo "<p style='color:red;'>সেশন পাওয়া যায়নি। অনুগ্রহ করে লগইন করুন।</p>";
    }
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
        // Show countdown only for the next 40 minutes
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

<script>
function markAttendance(studentId, batchId, classDay, classTime) {
    fetch('pages/attendance_save.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            student_id: studentId,
            batch_id: batchId,
            class_day: classDay,
            class_time: classTime
        })
    });

    return true; // ক্লাসের লিংক খুলবে
}
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
    font-size: 15px;
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
    font-size: 17px;
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

