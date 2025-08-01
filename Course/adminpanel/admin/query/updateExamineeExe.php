<?php
 include("../../../conn.php");
 extract($_POST);


 $updCourse = $conn->query("UPDATE students_tbl SET student_fullname='$exFullname', student_batch_id='$selectBatch', student_gender='$exGender', student_birthdate='$exBdate', course_name='$course_area', student_email='$exEmail', student_password='$exPass', student_phone_number='$exPhone', student_status='$exStatus' WHERE student_id='$student_id'");
 if($updCourse)
{
	   $res = array("res" => "success", "exFullname" => $exFullname);
}
else
{
	   $res = array("res" => "failed");
}



 echo json_encode($res);	
?>