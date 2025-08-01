<?php
include("../conn.php");

// সর্বোচ্চ কত দিন পিছিয়ে যাবে চেক করতে
$daysBack = 10;
$today = new DateTime();

for ($i = 0; $i < $daysBack; $i++) {
    $checkDate = clone $today;
    $checkDate->modify("-$i days");

    $classDay = $checkDate->format('l'); // eg. Sunday
    $classDateStr = $checkDate->format('Y-m-d');

    // আজকের দিনের ক্লাস গুলো বের করো
    $batchQry = $conn->query("SELECT * FROM batch_tbl WHERE class_day = '$classDay'");
    while ($batch = $batchQry->fetch(PDO::FETCH_ASSOC)) {
        $batchId = $batch['batch_id'];
        $classTime = $batch['class_time'];

        // ঐ ব্যাচের Active ছাত্ররা
        $studentQry = $conn->query("SELECT * FROM students_tbl WHERE batch_id = '$batchId' AND student_status = 'Running'");
        while ($student = $studentQry->fetch(PDO::FETCH_ASSOC)) {
            $studentId = $student['student_id'];

            // ঐ দিনে এই student-এর attendance আছে কিনা
            $check = $conn->prepare("SELECT * FROM attend WHERE student_id = ? AND batch_id = ? AND DATE(attend_time) = ?");
            $check->execute([$studentId, $batchId, $classDateStr]);

            if ($check->rowCount() == 0) {
                // Absent হিসেবেই রেকর্ড করো
                $insert = $conn->prepare("INSERT INTO attend (student_id, batch_id, class_day, class_time, attend_time, status)
                    VALUES (?, ?, ?, ?, ?, 'Absent')");
                $insert->execute([$studentId, $batchId, $classDay, $classTime, $classDateStr . ' ' . $classTime]);
            }
        }
    }
}
?>
