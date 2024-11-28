<?php
include("../../../conn.php");
extract($_POST);

// Sanitize and format input data
$updateBatch = strtoupper($updateBatch);
$updateStartDate = $updateStartDate;
$updateClassTime = $updateClassTime;
$updateClassLink = $updateClassLink;
$updateClassStatus = $updateClassStatus;
$updateNoticeBoard = $updateNoticeBoard;

// Convert class days array to a string (if needed, adjust the format in your database accordingly)
$classDays = isset($classDay) ? implode(', ', $classDay) : '';

// Update query with additional fields
$updCourse = $conn->query("UPDATE batch_tbl 
                           SET batch_number='$updateBatch', 
                               start_date='$updateStartDate', 
                               class_day='$classDays', 
                               class_time='$updateClassTime', 
                               class_link='$updateClassLink', 
                               class_status='$updateClassStatus',
                               notice_board='$updateNoticeBoard'  
                           WHERE batch_id='$batch_id_check'");

if ($updCourse) {
    $res = array("res" => "success", "updateBatch" => $updateBatch, "updateStartDate" => $updateStartDate);
} else {
    $res = array("res" => "failed");
}

echo json_encode($res);
?>
