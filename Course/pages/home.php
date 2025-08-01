<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include(__DIR__ . '/../conn.php');

if (!isset($_SESSION['examineeSession']['student_id'])) {
    echo "<h2 style='text-align:center; color:red;'>অনুগ্রহ করে লগইন করুন!</h2>";
    exit();
}

$student_id = $_SESSION['examineeSession']['student_id'];

$stmtBatch = $conn->prepare("SELECT student_batch_id FROM students_tbl WHERE student_id = :student_id");
$stmtBatch->execute(['student_id' => $student_id]);
$batch_id = $stmtBatch->fetchColumn();

if (!$batch_id) {
    echo "<h2 style='text-align:center; color:red;'>আপনার ব্যাচ তথ্য পাওয়া যায়নি!</h2>";
    exit();
}

$stmtExams = $conn->prepare("
    SELECT ex_id as exam_id, ex_title 
    FROM exam_tbl 
    WHERE batch_id = :batch_id
");
$stmtExams->execute(['batch_id' => $batch_id]);
$exams = $stmtExams->fetchAll(PDO::FETCH_ASSOC);

$stmtBatchStudents = $conn->prepare("SELECT student_id, student_fullname FROM students_tbl WHERE student_batch_id = :batch_id");
$stmtBatchStudents->execute(['batch_id' => $batch_id]);
$batchStudents = $stmtBatchStudents->fetchAll(PDO::FETCH_ASSOC);

$examTotalQuestions = [];
foreach ($exams as $exam) {
    $stmtTotalQ = $conn->prepare("SELECT COUNT(*) as total FROM exam_question_tbl WHERE exam_id = :exam_id");
    $stmtTotalQ->execute(['exam_id' => $exam['exam_id']]);
    $totalQ = $stmtTotalQ->fetchColumn();
    $examTotalQuestions[$exam['exam_id']] = $totalQ;
}

$studentAvgScores = [];

foreach ($batchStudents as $student) {
    $stu_id = $student['student_id'];
    $stu_name = $student['student_fullname'];

    $totalPercentSum = 0;
    $examCount = 0;

    foreach ($exams as $exam) {
        $exam_id = $exam['exam_id'];
        $totalQ = $examTotalQuestions[$exam_id] ?? 0;
        if ($totalQ == 0) continue;

        $stmtCorrect = $conn->prepare("
            SELECT COUNT(*) as correct_count
            FROM exam_answers ea
            JOIN exam_question_tbl eq ON ea.quest_id = eq.eqt_id
            WHERE ea.axmne_id = :student_id AND ea.exam_id = :exam_id AND ea.exans_answer = eq.exam_answer
        ");
        $stmtCorrect->execute(['student_id' => $stu_id, 'exam_id' => $exam_id]);
        $correctCount = $stmtCorrect->fetchColumn();

        $percent = ($correctCount / $totalQ) * 100;
        $totalPercentSum += $percent;
        $examCount++;
    }

    if ($examCount > 0) {
        $avgPercent = round($totalPercentSum / $examCount, 2);
        $studentAvgScores[] = [
            'student_id' => $stu_id,
            'student_name' => $stu_name,
            'average_score' => $avgPercent
        ];
    }
}

usort($studentAvgScores, function($a, $b) {
    return $b['average_score'] <=> $a['average_score'];
});

$top3Students = array_slice($studentAvgScores, 0, 3);
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8" />
    <title>Student Exam Results & Top 3 Averages</title>
    <style>

        h3, h4 {
            text-align: center;
            margin-bottom: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        /* Flex layout for student result cards */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-bottom: 60px;
        }

        .exam-result {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            border-radius: 15px;
            padding: 15px 20px;
            width: 260px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .exam-result:hover {
            transform: translateY(-5px);
        }

        .exam-result h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #34495e;
            padding-bottom: 8px;
            border-bottom: 2px solid #d3d3d3;
        }

        .exam-result p {
            margin: 5px 0;
            font-size: 15px;
            color: #2c3e50;
        }

        .percent {
            font-weight: bold;
            color: #e74c3c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: linear-gradient(to bottom, #a8e063, #56ab2f);
            color: white;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        .top-students {
            margin-top: 80px;
        }
    </style>
</head>
<body>

<div class="app-main__outer">
    <div id="refreshData">
        <div class="app-main__inner">

            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <!-- <div class="page-title-icon">
                            <i class="pe-7s-news-paper icon-gradient bg-mean-fruit"></i>
                        </div> -->
                        <div>Class Materials</div>
                    </div>
                </div>
            </div>


        
            <div class="container">
                <h3 class="text-white mb-3">Your Class Test Performance</h3>

                <?php if (count($exams) === 0): ?>
                    <p>আপনি এখনও কোনো পরীক্ষা দেননি।</p>
                <?php else: ?>
                    <div class="card-container">
                    <?php foreach ($exams as $exam): 
                        $exam_id = $exam['exam_id'];
                        $totalQ = $examTotalQuestions[$exam_id] ?? 0;
                        if ($totalQ == 0) continue;

                        $stmtCorrect = $conn->prepare("
                            SELECT COUNT(*) as correct_count
                            FROM exam_answers ea
                            JOIN exam_question_tbl eq ON ea.quest_id = eq.eqt_id
                            WHERE ea.axmne_id = :student_id AND ea.exam_id = :exam_id AND ea.exans_answer = eq.exam_answer
                        ");
                        $stmtCorrect->execute(['student_id' => $student_id, 'exam_id' => $exam_id]);
                        $correctCount = $stmtCorrect->fetchColumn();

                        $studentPercent = round(($correctCount / $totalQ) * 100, 2);
                    ?>
                        <div class="exam-result">
                            <h2><?= htmlspecialchars($exam['ex_title']) ?></h2>
                            <p>Questions: <?= $totalQ ?></p>
                            <p>Corrrect Ans: <?= $correctCount ?></p>
                            <p>Your Point: <span class="percent"><?= $studentPercent ?>%</span></p>
                        </div>
                    <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="top-students">
                    <h3 class="text-white mb-3">Top 3 Students' Average Scores</h3>

                    <?php if (count($top3Students) === 0): ?>
                        <p>কোনো পরীক্ষার Top 3 Students' তথ্য পাওয়া যায়নি।</p>
                    <?php else: ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Student Name</th>
                                    <th>Average Scores (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($top3Students as $index => $stu): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= htmlspecialchars($stu['student_name']) ?></td>
                                        <td><?= $stu['average_score'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
