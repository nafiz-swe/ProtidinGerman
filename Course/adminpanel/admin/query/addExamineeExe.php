<?php 
 include("../../../conn.php");


extract($_POST);

$selExamineeFullname = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_fullname='$fullname' ");
$selExamineeEmail = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_email='$email' ");

if($selExamineeFullname->rowCount() > 0)
{
	$res = array("res" => "fullnameExist", "msg" => $fullname);
}
else if($gender == "0")
{
	$res = array("res" => "noGender");
}
else if($year_level == "0")
{
	$res = array("res" => "noLevel");
}
else if($course == "0")
{
	$res = array("res" => "noCourse");
}
else if($selExamineeEmail->rowCount() > 0)
{
	$res = array("res" => "emailExist", "msg" => $email);
}
else if($phone_number == "0")
{
	$res = array("res" => "noPhnnumber");
}
else
{
	$insData = $conn->query("INSERT INTO examinee_tbl(exmne_fullname, exmne_course, exmne_gender, exmne_birthdate, exmne_year_level, exmne_email, exmne_password, phone_number) VALUES('$fullname','$course','$gender','$bdate','$year_level','$email','$password','$phone_number')");
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