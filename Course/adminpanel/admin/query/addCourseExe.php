<?php 
include("../../../conn.php");

extract($_POST);

$add_batch = strtoupper($add_batch);
$selBatch = $conn->query("SELECT * FROM batch_tbl WHERE batch_number='$add_batch' ");

if ($selBatch->rowCount() > 0) {
    $res = array("res" => "exist", "add_batch" => $add_batch);
} else {
    $insCourse = $conn->query("INSERT INTO batch_tbl(batch_number, start_date) VALUES('$add_batch', '$startDate') ");
    if ($insCourse) {
        $res = array("res" => "success", "add_batch" => $add_batch);
    } else {
        $res = array("res" => "failed", "add_batch" => $add_batch);
    }
}

echo json_encode($res);
?>
