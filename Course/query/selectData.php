<?php 
$exmneId = $_SESSION['examineeSession']['student_id'];

// Select Data sa nilogin nga examinee
$selExmneeData = $conn->query("SELECT * FROM students_tbl WHERE student_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
$studentBatch =  $selExmneeData['student_batch_id'];


        
// Select and tanang exam depende sa course nga ni login 
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE batch_id='$studentBatch' ORDER BY ex_id DESC ");


//

 ?>