<?php 
include("../../../conn.php");

// JSON ডেটা গ্রহণ
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];

// Prepared statement ব্যবহার করে ডেটা ডিলিট করা
$delCourse = $conn->prepare("DELETE FROM batch_tbl WHERE batch_id = :id");
$delCourse->bindParam(':id', $id);

if ($delCourse->execute()) {
    $res = array("res" => "success");
} else {
    $res = array("res" => "failed");
}

// JSON রেসপন্স ফেরত পাঠানো
echo json_encode($res);
?>
