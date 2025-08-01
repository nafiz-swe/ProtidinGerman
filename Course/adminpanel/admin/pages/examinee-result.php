<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>STUDENTS RESULT</div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Results of All Students</div>
                <div class="p-3">
                    <form method="GET" action="home.php" class="form-inline">
                        <input type="hidden" name="page" value="examinee-result">
                        <input type="text" name="fullname" class="form-control mr-2" placeholder="Full Name" value="<?php echo isset($_GET['fullname']) ? htmlspecialchars($_GET['fullname']) : ''; ?>">
                        <input type="text" name="batch" class="form-control mr-2" placeholder="Batch Number" value="<?php echo isset($_GET['batch']) ? htmlspecialchars($_GET['batch']) : ''; ?>">
                        <button type="submit" class="btn btn-primary mr-2">Search</button>
                        <a href="home.php?page=examinee-result" class="btn btn-secondary">Reset</a>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Course Name</th>
                                <th>Batch Number</th>
                                <th>Exam Topics/Titles</th>
                                <th>Scores</th>
                                <th>Ratings</th>
                                <th>Answer Submit</th>
                                <th width="10%">Account Details</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$limit = 15;
$current_page = isset($_GET['pg']) ? (int)$_GET['pg'] : 1;
$offset = ($current_page - 1) * $limit;

// Filter conditions
$whereClause = "WHERE 1=1";
if (!empty($_GET['fullname'])) {
    $fullname = $_GET['fullname'];
    $whereClause .= " AND et.student_fullname LIKE '%$fullname%'";
}
if (!empty($_GET['batch'])) {
    $batch = $_GET['batch'];
    $whereClause .= " AND et.student_batch_id IN (SELECT batch_id FROM batch_tbl WHERE batch_number LIKE '%$batch%')";
}

// Count total records with filters
$totalQuery = $conn->query("SELECT COUNT(*) FROM students_tbl et INNER JOIN exam_attempt ea ON et.student_id = ea.student_id $whereClause");
$totalRows = $totalQuery->fetchColumn();
$totalPages = ceil($totalRows / $limit);

// Main query
$selExmne = $conn->query("SELECT * FROM students_tbl et INNER JOIN exam_attempt ea ON et.student_id = ea.student_id $whereClause ORDER BY ea.examat_id DESC LIMIT $offset, $limit");

if ($selExmne->rowCount() > 0) {
    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) {
        ?>
<tr>
    <td><?php echo $selExmneRow['student_fullname']; ?></td>
    <td><?php echo $selExmneRow['course_name']; ?></td>

    <td>
        <?php 
        $batchId = $selExmneRow['student_batch_id'];
        $selBatch = $conn->query("SELECT batch_number FROM batch_tbl WHERE batch_id='$batchId'")->fetch(PDO::FETCH_ASSOC);
        echo $selBatch ? $selBatch['batch_number'] : 'N/A';
        ?>
    </td>

    <td>
        <?php 
        $exam_id = $selExmneRow['exam_id']; // coming from main SELECT
        $examTitle = $conn->query("SELECT ex_title FROM exam_tbl WHERE ex_id = '$exam_id'")->fetch(PDO::FETCH_ASSOC);
        echo $examTitle ? $examTitle['ex_title'] : 'No title';
        ?>
    </td>

    <td>
        <?php 
        $eid = $selExmneRow['student_id']; // make sure it's available
        $scoreQuery = $conn->query("SELECT * FROM exam_question_tbl eqt
            INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id 
            AND eqt.exam_answer = ea.exans_answer  
            WHERE ea.axmne_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new'");
        $score = $scoreQuery->rowCount();

        $exData = $conn->query("SELECT ex_questlimit_display FROM exam_tbl WHERE ex_id = '$exam_id'")->fetch(PDO::FETCH_ASSOC);
        $over = $exData ? $exData['ex_questlimit_display'] : 0;

        echo "$score / $over";
        ?>
    </td>

    <td>
        <?php 
        $percentage = ($over > 0) ? ($score / $over * 100) : 0;
        echo number_format($percentage, 2) . "%";
        ?>
    </td>

    <td>
        <?php 
        $submitTimeQuery = $conn->query("SELECT exans_created FROM exam_answers 
            WHERE axmne_id = '$eid' AND exam_id = '$exam_id' 
            ORDER BY exans_created DESC LIMIT 1");
        $submitRow = $submitTimeQuery->fetch(PDO::FETCH_ASSOC);
        if ($submitRow && !empty($submitRow['exans_created'])) {
            echo date('h:i:s A, l, d F Y', strtotime($submitRow['exans_created']));
        } else {
            echo 'Not submitted';
        }
        ?>
    </td>

    <td>
        <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?php echo $selExmneRow['student_id']; ?>" class="btn btn-sm btn-primary">Student Info</a>
    </td>
</tr>

        <?php
    }
} else {
    echo '<tr><td colspan="8"><h3 class="p-3">No matching results found</h3></td></tr>';
}
?>
                        </tbody>

                        <!-- Pagination -->
                        <tr>
                            <td colspan="8" style="text-align:center; padding: 20px;">
                                <?php if ($totalPages > 1): ?>
                                    <div class="pagination">
                                        <?php
                                        $baseURL = "home.php?page=examinee-result";
                                        if (!empty($_GET['fullname'])) {
                                            $baseURL .= "&fullname=" . urlencode($_GET['fullname']);
                                        }
                                        if (!empty($_GET['batch'])) {
                                            $baseURL .= "&batch=" . urlencode($_GET['batch']);
                                        }

                                        if ($current_page > 1) {
                                            $prev = $current_page - 1;
                                            echo "<a href='$baseURL&pg=$prev' style='padding:6px 12px;border:1px solid #ccc;margin-right:5px;text-decoration:none;'>« Prev</a>";
                                        }

                                        for ($i = 1; $i <= $totalPages; $i++) {
                                            if ($i == $current_page) {
                                                echo "<strong style='padding:6px 12px;background:#007bff;color:white;border-radius:3px;'>$i</strong> ";
                                            } else {
                                                echo "<a href='$baseURL&pg=$i' style='padding:6px 12px;border:1px solid #ccc;border-radius:3px;margin:2px;text-decoration:none;color:#007bff;'>$i</a> ";
                                            }
                                        }

                                        if ($current_page < $totalPages) {
                                            $next = $current_page + 1;
                                            echo "<a href='$baseURL&pg=$next' style='padding:6px 12px;border:1px solid #ccc;margin-left:5px;text-decoration:none;'>Next »</a>";
                                        }
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <style>
                            .pagination a:hover {
                                background-color: #f0f0f0;
                            }
                        </style>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
