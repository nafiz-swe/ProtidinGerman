<?php 
include("../../../conn.php");

header('Content-Type: application/json'); // Set response as JSON

// Decode the JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Check if 'id' is provided
if (isset($data['id'])) {
    $id = $data['id'];
    $delExam = $conn->query("DELETE FROM exam_tbl WHERE ex_id='$id'");
    
    if ($delExam) {
        $res = array("res" => "success");
    } else {
        $res = array("res" => "failed");
    }
} else {
    $res = array("res" => "failed", "message" => "No ID provided.");
}

echo json_encode($res);
?>
