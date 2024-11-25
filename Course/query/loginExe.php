<?php 
session_start();
include("../conn.php");

extract($_POST);

// Check if either email or phone number is provided for login
$loginField = (filter_var($username, FILTER_VALIDATE_EMAIL)) ? 'student_email' : 'student_phone_number';

// Query to check the student's login credentials along with student status
$selAcc = $conn->query("SELECT * FROM students_tbl WHERE $loginField='$username' AND student_password='$pass'");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

if ($selAcc->rowCount() > 0) {
    // Check if the student's status is Active
    if ($selAccRow['student_status'] === 'Active') {
        $_SESSION['examineeSession'] = array(
            'student_id' => $selAccRow['student_id'],
            'examineenakalogin' => true
        );
        $res = array("res" => "success");
    } else {
        // If the student is Deactivated
        $res = array("res" => "deactivated");
    }
} else {
    $res = array("res" => "invalid");
}

echo json_encode($res);
?>
