<?php
include("../../../conn.php");
extract($_POST);

$updateBatch = strtoupper($updateBatch);
$updateStartDate = $updateStartDate;

$updCourse = $conn->query("UPDATE batch_tbl SET batch_number='$updateBatch', start_date='$updateStartDate' WHERE batch_id='$batch_id_check'");

if($updCourse)
{
    $res = array("res" => "success", "updateBatch" => $updateBatch, "updateStartDate" => $updateStartDate);
}
else
{
    $res = array("res" => "failed");
}

echo json_encode($res);
?>
