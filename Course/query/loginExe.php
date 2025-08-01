<?php 
session_start();
include("../conn.php");

extract($_POST);

// Determine login field (email or phone)
$loginField = (filter_var($username, FILTER_VALIDATE_EMAIL)) ? 'student_email' : 'student_phone_number';

// First, check if user exists and password matches
$selAcc = $conn->query("SELECT * FROM students_tbl WHERE $loginField='$username' AND student_password='$pass'");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

if ($selAcc->rowCount() > 0) {
    // Now check if status is Running or Completed only
    if ($selAccRow['student_status'] === 'Running' || $selAccRow['student_status'] === 'Completed') {
        $_SESSION['examineeSession'] = array(
            'student_id' => $selAccRow['student_id'],
            'examineenakalogin' => true
        );
        $res = array("res" => "success");
    } else {
        // Not allowed status like Dropped, Hold, etc.
        $res = array("res" => "denied", "reason" => $selAccRow['student_status']);
    }
} else {
    // Invalid credentials
    $res = array("res" => "invalid");
}

echo json_encode($res);
?>
