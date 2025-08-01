<?php 
 include("../../../conn.php");


extract($_POST);

$selExamineeFullname = $conn->query("SELECT * FROM students_tbl WHERE student_fullname='$fullname' ");
$selExamineeEmail = $conn->query("SELECT * FROM students_tbl WHERE student_email='$email' ");

if($selExamineeFullname->rowCount() > 0)
{
	$res = array("res" => "fullnameExist", "msg" => $fullname);
}
else if($gender == "0")
{
	$res = array("res" => "noGender");
}
else if($course_level == "0")
{
	$res = array("res" => "noCourseLevel");
}
else if($batch_serial == "0")
{
	$res = array("res" => "noBatch");
}
else if($selExamineeEmail->rowCount() > 0)
{
	$res = array("res" => "emailExist", "msg" => $email);
}
else if($student_phone_number == "0")
{
	$res = array("res" => "noPhnnumber");
}
else if($status == "0")
{
	$res = array("res" => "noStatus");
}
else
{
	$insData = $conn->query("INSERT INTO students_tbl(student_fullname, student_batch_id, student_gender, student_birthdate, course_name, student_email, student_password, student_phone_number, student_status) VALUES('$fullname','$batch_serial','$gender','$bdate','$course_level','$email','$password','$student_phone_number','$status')");
	if($insData)
	{
		$res = array("res" => "success", "msg" => $email);
	}
	else
	{
		$res = array("res" => "failed");
	}
}


echo json_encode($res);
 ?>