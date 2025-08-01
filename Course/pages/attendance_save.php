<?php
header('Content-Type: application/json');
include('../conn.php');

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data['student_id']) && !empty($data['batch_id']) && !empty($data['class_day']) && !empty($data['class_time'])) {
    $student_id = intval($data['student_id']);
    $batch_id = intval($data['batch_id']);
    $class_day = $data['class_day'];
    $class_time = $data['class_time'];
    $attend_time = date('Y-m-d H:i:s');

    // ডুপ্লিকেট চেক
    $check = $conn->prepare("SELECT * FROM attend WHERE student_id = ? AND batch_id = ? AND class_day = ? AND class_time = ?");
    $check->execute([$student_id, $batch_id, $class_day, $class_time]);

    if ($check->rowCount() == 0) {
        $stmt = $conn->prepare("INSERT INTO attend (student_id, batch_id, class_day, class_time, attend_time) VALUES (?, ?, ?, ?, ?)");
        $result = $stmt->execute([$student_id, $batch_id, $class_day, $class_time, $attend_time]);
        echo json_encode(['success' => $result]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Already marked']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid data']);
}
?>




<!-- // CREATE TABLE attendance (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     student_id INT NOT NULL,
//     batch_number VARCHAR(100) NOT NULL,
//     course_name VARCHAR(255) NOT NULL,
//     class_date DATE NOT NULL,
//     attendance_time DATETIME NOT NULL
// ); -->

