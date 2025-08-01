<?php
include("../conn.php");

// আজকের দিন ও সময়
$currentDay = date('l'); // eg. Sunday
$currentDate = date('Y-m-d');
$currentTime = date('H:i:s');

// class শুরু থেকে ৪০ মিনিট পরের সময়
$bufferTime = date('H:i:s', strtotime('-2 minutes', strtotime($currentTime)));

// আজকের দিনে ক্লাস আছে এমন সব ব্যাচ বের করো
$batchQry = $conn->query("SELECT * FROM batch_tbl WHERE class_day = '$currentDay'");
while ($batch = $batchQry->fetch(PDO::FETCH_ASSOC)) {
    $batchId = $batch['batch_id'];
    $classTime = $batch['class_time'];

    // এখন যদি class time এর ৪০ মিনিট পেরিয়ে যায়, তখন absent চেক করো
    if ($currentTime > date('H:i:s', strtotime($classTime) + 2 * 60)) {

        // এই ব্যাচে কাদের attendance আজকে দেয়া হয়নি
        $studentQry = $conn->query("SELECT * FROM students_tbl WHERE batch_id = '$batchId' AND student_status = 'Running'");
        while ($student = $studentQry->fetch(PDO::FETCH_ASSOC)) {
            $studentId = $student['student_id'];

            // এই student আজকের তারিখে attendance দেয়নি কিনা
            $check = $conn->prepare("SELECT * FROM attend WHERE student_id = ? AND batch_id = ? AND DATE(attend_time) = ?");
            $check->execute([$studentId, $batchId, $currentDate]);

            if ($check->rowCount() == 0) {
                // absent হিসেবেই mark করো
                $insert = $conn->prepare("INSERT INTO attend (student_id, batch_id, class_day, class_time, attend_time, status)
                    VALUES (?, ?, ?, ?, NOW(), 'Absent')");
                $insert->execute([$studentId, $batchId, $currentDay, $classTime]);
            }
        }
    }
}
?>
