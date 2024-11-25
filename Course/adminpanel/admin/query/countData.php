<?php 

// Count All Course
$selBatch = $conn->query("SELECT COUNT(batch_id) as totCourse FROM batch_tbl ")->fetch(PDO::FETCH_ASSOC);


// Count All Exam
$selExam = $conn->query("SELECT COUNT(ex_id) as totExam FROM exam_tbl ")->fetch(PDO::FETCH_ASSOC);




 ?>