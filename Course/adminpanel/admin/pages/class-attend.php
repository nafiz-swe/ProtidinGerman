<?php
include("../../conn.php"); // এখানে PDO ব্যবহার হয়েছে ধরে নিচ্ছি

$selected_batch_id = $_GET['batch_id'] ?? null;
$allClassDays = [];
$students = [];

try {
    // ব্যাচ তালিকা
    $stmt = $conn->query("SELECT * FROM batch_tbl ORDER BY batch_number ASC");
    $batchList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($selected_batch_id) {
        // ব্যাচ অনুযায়ী class_day সংগ্রহ
        $stmt = $conn->prepare("SELECT DISTINCT class_day FROM attend WHERE batch_id = ? ORDER BY id ASC");
        $stmt->execute([$selected_batch_id]);
        $classQuery = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($classQuery as $row) {
            $allClassDays[] = $row['class_day'];
        }

        // ব্যাচ অনুযায়ী ছাত্রদের তথ্য
        $stmt = $conn->prepare("SELECT * FROM students_tbl WHERE student_batch_id = ?");
        $stmt->execute([$selected_batch_id]);
        $studentList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($studentList as $student) {
            $student_id = $student['student_id'];
            $student['attend'] = [];

            // প্রতিটি class_day এর জন্য উপস্থিতি চেক
            foreach ($allClassDays as $day) {
                $stmt = $conn->prepare("SELECT * FROM attend WHERE student_id = ? AND batch_id = ? AND class_day = ?");
                $stmt->execute([$student_id, $selected_batch_id, $day]);

                if ($stmt->rowCount() > 0) {
                    $student['attend'][$day] = "Present";
                } else {
                    $student['attend'][$day] = "Absent";
                }
            }

            $students[] = $student;
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<style>
    .scrollable-wrapper {
        overflow-x: auto;
        width: 100%;
    }

    table {
        min-width: 1000px; /* Force scroll if not enough space */
        width: 100%;
        border-collapse: collapse;
        background: #fff;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #7FBF4D;
        color: #fff;
    }

    .present {
        background-color: #d4edda;
        color: green;
        font-weight: bold;
    }

    .absent {
        background-color: #f8d7da;
        color: red;
        font-weight: bold;
    }

    select, button {
        border: 2px solid #7FBF4D;
        padding: 8px 12px;
        font-size: 16px;
        border-radius: 4px;
        margin-top: 5px;
    }

    button {
        background-color: #7FBF4D;
        color: white;
        cursor: pointer;
    }

    button:hover {
        background-color: #6AAE3E;
    }

    select:focus, button:focus {
        outline: none;
        box-shadow: 0 0 5px #7FBF4D;
    }
</style>

<div class="app-main__outer">
    <div id="refreshData">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-news-paper icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div>Class Attendance</div>
                    </div>
                </div>
            </div>


<h3 class="text-white my-3">Class Attendance View</h3>

<form method="GET" action="home.php">
    <input type="hidden" name="page" value="classAttend">
    <h6 class="text-white mt-3">Select Batch</h6>
    
    <select name="batch_id" required>
        <option value="">-- Select a Batch --</option>
        <?php foreach ($batchList as $batch): ?>
            <option value="<?= $batch['batch_id'] ?>" <?= ($selected_batch_id == $batch['batch_id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($batch['batch_number']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <button type="submit">Search</button>
</form>


<br><br>

<?php if ($selected_batch_id && !empty($students)): ?>
<div class="scrollable-wrapper">
    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Phone Number</th>
                <?php foreach ($allClassDays as $index => $class_day): ?>
                    <th>
                        <div><?= ($index + 1) ?><sup>th</sup> Class</div>
                        <div><?= htmlspecialchars($class_day) ?></div>
                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= htmlspecialchars($student['student_fullname']) ?></td>
                    <td><?= htmlspecialchars($student['student_phone_number']) ?></td>
                    <?php foreach ($allClassDays as $day): ?>
                        <td class="<?= strtolower($student['attend'][$day]) ?>">
                            <?= $student['attend'][$day] ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php elseif ($selected_batch_id): ?>
    <p>No students found for this batch.</p>
<?php endif; ?>


</div>
</div>
</div>