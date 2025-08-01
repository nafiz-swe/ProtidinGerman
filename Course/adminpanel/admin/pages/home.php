<?php 
// Total Completed Batch
$completedCourses = $conn->query("SELECT COUNT(*) as total FROM batch_tbl WHERE class_status = 'Complete' ");
$row = $completedCourses->fetch(PDO::FETCH_ASSOC);
$completedCount = $row['total'];

// Total Student
$totalStudentsQuery = $conn->query("SELECT COUNT(student_id) as total FROM students_tbl");
$studentRow = $totalStudentsQuery->fetch(PDO::FETCH_ASSOC);
$studentCount = $studentRow['total'];

// Total Students with status 'Running'
$runningStudentsQuery = $conn->query("SELECT COUNT(student_id) as total FROM students_tbl WHERE student_status = 'Running'");
$runningRow = $runningStudentsQuery->fetch(PDO::FETCH_ASSOC);
$runningCount = $runningRow['total'];

// A1 Batch Count
$a1Query = $conn->query("SELECT COUNT(*) as total FROM batch_tbl WHERE batch_number LIKE 'A1%'");
$a1Row = $a1Query->fetch(PDO::FETCH_ASSOC);
$a1Count = $a1Row['total'];

// A2 Batch Count
$a2Query = $conn->query("SELECT COUNT(*) as total FROM batch_tbl WHERE batch_number LIKE 'A2%'");
$a2Row = $a2Query->fetch(PDO::FETCH_ASSOC);
$a2Count = $a2Row['total'];

// B1 Batch Count
$b1Query = $conn->query("SELECT COUNT(*) as total FROM batch_tbl WHERE batch_number LIKE 'B1%'");
$b1Row = $b1Query->fetch(PDO::FETCH_ASSOC);
$b1Count = $b1Row['total'];

// Exam Preparation Batch Count
$examPrepQuery = $conn->query("SELECT COUNT(*) as total FROM batch_tbl WHERE batch_number LIKE 'EXAM PREPARATION%'");
$examPrepRow = $examPrepQuery->fetch(PDO::FETCH_ASSOC);
$examPrepCount = $examPrepRow['total'];

// A1 Completed Batches
$a1CompleteQuery = $conn->query("SELECT COUNT(*) as total FROM batch_tbl WHERE batch_number LIKE 'A1%' AND class_status = 'Complete'");
$a1Complete = $a1CompleteQuery->fetch(PDO::FETCH_ASSOC)['total'];

// A2 Completed Batches
$a2CompleteQuery = $conn->query("SELECT COUNT(*) as total FROM batch_tbl WHERE batch_number LIKE 'A2%' AND class_status = 'Complete'");
$a2Complete = $a2CompleteQuery->fetch(PDO::FETCH_ASSOC)['total'];

// B1 Completed Batches
$b1CompleteQuery = $conn->query("SELECT COUNT(*) as total FROM batch_tbl WHERE batch_number LIKE 'B1%' AND class_status = 'Complete'");
$b1Complete = $b1CompleteQuery->fetch(PDO::FETCH_ASSOC)['total'];

// Exam Preparation Completed Batches
$examPrepCompleteQuery = $conn->query("SELECT COUNT(*) as total FROM batch_tbl WHERE batch_number LIKE 'EXAM PREPARATION%' AND class_status = 'Complete'");
$examPrepComplete = $examPrepCompleteQuery->fetch(PDO::FETCH_ASSOC)['total'];

// A1 Students Count
$a1StudentsQuery = $conn->query("SELECT COUNT(*) as total FROM students_tbl WHERE course_name = 'A1'");
$a1StudentCount = $a1StudentsQuery->fetch(PDO::FETCH_ASSOC)['total'];

// A2 Students Count
$a2StudentsQuery = $conn->query("SELECT COUNT(*) as total FROM students_tbl WHERE course_name = 'A2'");
$a2StudentCount = $a2StudentsQuery->fetch(PDO::FETCH_ASSOC)['total'];

// B1 Students Count
$b1StudentsQuery = $conn->query("SELECT COUNT(*) as total FROM students_tbl WHERE course_name = 'B1'");
$b1StudentCount = $b1StudentsQuery->fetch(PDO::FETCH_ASSOC)['total'];

// Exam Preparation Students Count
$examPrepStudentsQuery = $conn->query("SELECT COUNT(*) as total FROM students_tbl WHERE course_name = 'Exam Preparation'");
$examPrepStudentCount = $examPrepStudentsQuery->fetch(PDO::FETCH_ASSOC)['total'];

function getStatusCount($conn, $course, $status) {
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM students_tbl WHERE course_name = :course AND student_status = :status");
    $stmt->execute(['course' => $course, 'status' => $status]);
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

// A1
$a1Running   = getStatusCount($conn, 'A1', 'Running');
$a1Completed = getStatusCount($conn, 'A1', 'Completed');
$a1Dropped   = getStatusCount($conn, 'A1', 'Dropped');

// A2
$a2Running   = getStatusCount($conn, 'A2', 'Running');
$a2Completed = getStatusCount($conn, 'A2', 'Completed');
$a2Dropped   = getStatusCount($conn, 'A2', 'Dropped');

// B1
$b1Running   = getStatusCount($conn, 'B1', 'Running');
$b1Completed = getStatusCount($conn, 'B1', 'Completed');
$b1Dropped   = getStatusCount($conn, 'B1', 'Dropped');

// Exam Preparation
$examRunning   = getStatusCount($conn, 'Exam Preparation', 'Running');
$examCompleted = getStatusCount($conn, 'Exam Preparation', 'Completed');
$examDropped   = getStatusCount($conn, 'Exam Preparation', 'Dropped');

// A1 Exams
$a1ExamQuery = $conn->query("
    SELECT COUNT(*) as total 
    FROM exam_tbl 
    WHERE batch_id IN (
        SELECT batch_id FROM batch_tbl WHERE batch_number LIKE 'A1%'
    )
");
$a1ExamCount = $a1ExamQuery->fetch(PDO::FETCH_ASSOC)['total'];

// A2 Exams
$a2ExamQuery = $conn->query("
    SELECT COUNT(*) as total 
    FROM exam_tbl 
    WHERE batch_id IN (
        SELECT batch_id FROM batch_tbl WHERE batch_number LIKE 'A2%'
    )
");
$a2ExamCount = $a2ExamQuery->fetch(PDO::FETCH_ASSOC)['total'];

// B1 Exams
$b1ExamQuery = $conn->query("
    SELECT COUNT(*) as total 
    FROM exam_tbl 
    WHERE batch_id IN (
        SELECT batch_id FROM batch_tbl WHERE batch_number LIKE 'B1%'
    )
");
$b1ExamCount = $b1ExamQuery->fetch(PDO::FETCH_ASSOC)['total'];

// Exam Preparation Exams
$examPrepQuery = $conn->query("
    SELECT COUNT(*) as total 
    FROM exam_tbl 
    WHERE batch_id IN (
        SELECT batch_id FROM batch_tbl WHERE batch_number LIKE 'EXAM PREPARATION%'
    )
");
$examPrepexamCount = $examPrepQuery->fetch(PDO::FETCH_ASSOC)['total'];

?>

<?php 
date_default_timezone_set('Asia/Dhaka');

// ✅ Calculate Next Class Time from multiple days
function getClosestClassTime($class_days_string, $class_time, $fromTime = null) {
    $now = $fromTime ?? time();
    $days = ['sunday','monday','tuesday','wednesday','thursday','friday','saturday'];
    $class_days = array_map('trim', explode(',', strtolower($class_days_string)));

    $closestTimestamp = null;

    foreach ($class_days as $day) {
        if (!in_array($day, $days)) continue;

        $todayIndex = date('w', $now);
        $dayIndex = array_search($day, $days);

        $dayDiff = ($dayIndex - $todayIndex + 7) % 7;
        $classDate = date('Y-m-d', strtotime("+$dayDiff days", $now));

        $classTimestamp = strtotime($classDate . ' ' . $class_time);

        if ($dayDiff === 0 && $classTimestamp <= $now) {
            $classTimestamp = strtotime("+7 days", $classTimestamp);
        }

        if ($classTimestamp > $now && ($closestTimestamp === null || $classTimestamp < $closestTimestamp)) {
            $closestTimestamp = $classTimestamp;
        }
    }

    return $closestTimestamp;
}

// ✅ Calculate Next Class Time for Coming Soon batches based on start_date
function getClosestClassTimeAfterStart($class_days_string, $class_time, $start_date) {
    $startTimestamp = strtotime($start_date);
    $now = time();
    $days = ['sunday','monday','tuesday','wednesday','thursday','friday','saturday'];
    $class_days = array_map('trim', explode(',', strtolower($class_days_string)));

    $closestTimestamp = null;

    foreach ($class_days as $day) {
        if (!in_array($day, $days)) continue;

        $dayIndex = array_search($day, $days);
        $temp = $startTimestamp;

        while (true) {
            $tempDayIndex = date('w', $temp);
            if ($tempDayIndex == $dayIndex && $temp >= $startTimestamp) {
                $candidate = strtotime(date('Y-m-d', $temp) . ' ' . $class_time);
                if ($candidate > $now && ($closestTimestamp === null || $candidate < $closestTimestamp)) {
                    $closestTimestamp = $candidate;
                }
                break;
            }
            $temp = strtotime('+1 day', $temp);
        }
    }

    return $closestTimestamp;
}

// ✅ Fetch batches by status + course
$statuses = ['On going', 'Holiday', 'Coming soon'];
$courses = ['A1', 'A2', 'B1', 'Exam Preparation'];
$batchData = [];

foreach ($statuses as $status) {
    foreach ($courses as $course) {
        $stmt = $conn->prepare("
            SELECT batch_number, class_day, class_time, class_link, class_status, start_date
            FROM batch_tbl
            WHERE class_status = :status
              AND batch_number LIKE :course
            ORDER BY class_time ASC
        ");
        $stmt->execute([
            'status' => $status,
            'course' => $course . '%'
        ]);
        $batchData[$status][$course] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

<div class="app-main__outer">
    <div id="refreshData">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div>Analytics Dashboard</div>
                    </div>
                </div>
            </div>

<?php foreach ($statuses as $status): ?>
<div class="row mb-4">
  <div class="col-12">
    <h4 class="text-white mb-3"><?php echo $status; ?> Batches</h4>
  </div>
  <?php foreach ($courses as $course): 
    $batches = $batchData[$status][$course];
    if (count($batches) == 0): ?>
    <div class="col-md-6 col-xl-3 my-3">
        <div class="card widget-content bg-midnight-lilac">
            <div class="widget-content-wrapper">
            <div class="widget-content-left">
                <div class="text-center mb-2">
                    <h5 class="text-black"><?php echo $course; ?></h5>
                </div>
                <div class="widget text-white">No batch found</div>
            </div>
            </div>
        </div>
    </div>

    <?php endif; ?>

    <?php foreach ($batches as $batch):
      $now = time();
      $today = strtolower(date('l', $now));
      $classDays = array_map('trim', explode(',', strtolower($batch['class_day'])));
      $isTodayClass = in_array($today, $classDays);
      $todayClassTime = strtotime(date('Y-m-d') . ' ' . $batch['class_time']);
      $isLive = false;
      $classStart = null;
      
      // If status is Holiday — just show static info (No button, no countdown)
      if (strtolower($batch['class_status']) === 'holiday'):
    ?>
<div class="col-md-6 col-xl-3">
  <div class="card mb-3 widget-content bg-sky-lantern">
    <div class="p-3">
      <div class="text-center mb-3">
        <h5 class="text-black mb-0"><?php echo $batch['batch_number']; ?></h5>
      </div>
      <div class="mb-1 text-start">
        <span style="color: #000">Class:</span> <?php echo $batch['class_day']; ?>
      </div>
      <div class="mb-1 text-start">
        <span style="color: #000">Time:</span> <?php echo date('h:i A', strtotime($batch['class_time'])); ?>
      </div>
      <div class="mb-2 text-start">
        <span style="color: #000">Status:</span> Holiday
      </div>
    </div>
  </div>
</div>


    <?php else:
        // Not Holiday — Handle live, wait, countdown

        if (strtolower($batch['class_status']) === 'coming soon') {
            $nextClassTime = getClosestClassTimeAfterStart($batch['class_day'], $batch['class_time'], $batch['start_date']);
            $classStart = $nextClassTime;
        } elseif ($isTodayClass && $now >= $todayClassTime && $now <= ($todayClassTime + 40 * 60)) {
            $isLive = true;
            $classStart = $todayClassTime;
        } else {
            $nextClassTime = getClosestClassTime($batch['class_day'], $batch['class_time'], $now);
            $classStart = $nextClassTime;
        }

        $remaining = $classStart - $now;
        $days = max(0, floor($remaining / 86400));
        $hours = max(0, floor(($remaining % 86400) / 3600));
        $minutes = max(0, floor(($remaining % 3600) / 60));
    ?>
    <div class="col-md-6 col-xl-3">
        <div class="card mb-3 p-3 bg-velvet-rose custom-card">
            <div class="flex-column align-items-center text-center">

            <!-- Row 1: Batch Number -->
            <div class="w-100 mb-2">
                <div class="widget-heading text-black h5 fw-bold"><?php echo $batch['batch_number']; ?></div>
            </div>

            <!-- Row 2–4: Left aligned text -->
            <div class="w-100 text-left text-white">
                <div><span style="color: #000">Class:</span> <?php echo $batch['class_day']; ?></div>
                <div><span style="color: #000">Time:</span> <?php echo date('h:i A', strtotime($batch['class_time'])); ?></div>
                <div><span style="color: #000">Status:</span> <?php echo $batch['class_status']; ?></div>
            </div>

            <!-- Row 5: Countdown with Top Border -->
            <div class="w-100 border-top mt-3 pt-2 text-center">
                <?php if ($isLive): ?>
                <div class="text-white mb-2 fs-5" style="font-size: 20px;">Live</div>
                <a href="<?php echo htmlspecialchars($batch['class_link']); ?>" target="_blank" class="btn btn-sm btn-primary" style="width: 100%; font-size: 15px">Join</a>
                <?php else: ?>
                <div class="text-white mb-2 fs-5" style="font-size: 20px;"><?php echo "{$days}d {$hours}h {$minutes}m left"; ?></div>
                <button class="btn btn-sm btn-secondary" disabled>Wait...</button>
                <?php endif; ?>
            </div>

            </div>
        </div>
    </div>

    <?php endif; ?>
  <?php endforeach; ?>
  <?php endforeach; ?>
</div>
<?php endforeach; ?>


            <br><br>
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white mb-3">Total Batch & Student Info</h4>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-rose-champagne">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">Total Batch</div>
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span><?php echo $totalCourse = $selBatch['totCourse']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-green-glow">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">Total Completed Batch</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $completedCount; ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-royal-emerald">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">Total Student</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $studentCount; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-purple-dream">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">Total Running Students</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $runningCount; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-golden-hour">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">Total Exam</div>
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span><?php echo $totalCourse = $selExam['totExam']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-sprout-light">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">Total Exam Participant</div>
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>46%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <br> <br>
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white mb-3">A1 Batch & Student Info</h4>
                </div>
                <!-- A1 Batch -->
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-blazing-fire">
                        <div class="widget-content-wrapper bg-white">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">Total A1 Batch</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-black"><?php echo $a1Count; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-blazing-fire">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">A1 Completed Batch</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $a1Complete; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-blazing-fire">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">A1 Total Student</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $a1StudentCount; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-blazing-fire">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">A1 Runging Students</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $a1Running; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-blazing-fire">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">A1 Completed Students</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $a1Completed; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-blazing-fire">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">A1 Dropped Students</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $a1Dropped; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-blazing-fire">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">A1 Total Exam</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $a1ExamCount; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <br> <br>
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white mb-3">A2 Batch & Student Info</h4>
                </div>                <!-- A2 Batch -->
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-sunset-blush">
                        <div class="widget-content-wrapper bg-white">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">Total A2 Batch</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-black"><?php echo $a2Count; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-sunset-blush">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">A2 Completed Batch</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $a2Complete; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-sunset-blush">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">A2 Total Student</div>
                            </div>
                            <div class="widget-content-right">
                        <div class="widget-numbers text-white"><?php echo $a2StudentCount; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-sunset-blush">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">A2 Runging Students</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $a2Running; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-sunset-blush">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">A2 Completed Students</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $a2Completed; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-sunset-blush">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">A2 Dropped Students</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $a2Dropped; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-sunset-blush">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">A2 Total Exam</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $a2ExamCount; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <br> <br>
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white mb-3">B1 Batch & Student Info</h4>
                </div>                <!-- B1 Batch -->
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-lush-leaf">
                        <div class="widget-content-wrapper bg-white">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">Total B1 Batch</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-black"><?php echo $b1Count; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-lush-leaf">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">B1 Completed Batch</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $b1Complete; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-lush-leaf">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">B1 Total Student</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $b1StudentCount; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-lush-leaf">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">B1 Runging Students</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $b1Running; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-lush-leaf">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">B1 Completed Students</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $b1Completed; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-lush-leaf">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">B1 Dropped Students</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $b1Dropped; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-lush-leaf">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">B1 Total Exam</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $b1ExamCount; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <br> <br>
            <div class="row">
                <div class="col-12">
                    <h4 class="text-white mb-3">B1 Exam Prepa. Batch & Student Info</h4>
                </div>                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-cold-mint">
                        <div class="widget-content-wrapper bg-white">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">Total B1 Exam Prepa. Batch</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-black"><?php echo $examPrepCount; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-cold-mint">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">B1 Exam Prepa. Completed Batch</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $examPrepComplete; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-cold-mint">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">B1 Exam Prepa. Total Student</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $examPrepStudentCount; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-cold-mint">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">B1 Exam Prepa. Runging Students</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $examRunning; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-cold-mint">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">B1 Exam Prepa. Completed Students</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $examCompleted; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-cold-mint">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">B1 Exam Prepa. Dropped Students</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $examDropped; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-wrapper bg-cold-mint">
                            <div class="widget-content-left">
                                <div class="widget-heading text-black">B1 Exam Prepa. Total Exam</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><?php echo $examPrepexamCount; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <?php include("includes/graph.php"); ?> -->
        </div>
    </div>
<style>
.bg-midnight-glow {
    background: linear-gradient(to bottom, #0f2027, #203a43, #2c5364);
    color: #fff;
}

.bg-sunset-blush {
    background: linear-gradient(to bottom, #ffb88c, #de6262);
    color: #212529;
}


.bg-ocean-wave {
    background: linear-gradient(to bottom, #43cea2, #185a9d);
    color: #fff;
}

.bg-mango-mix {
    background: linear-gradient(to bottom, #ffe259, #ffa751);
    color: #212529;
}

.bg-lush-leaf {
    background: linear-gradient(to bottom, #a8e063, #56ab2f);
    color: #212529;
}

.bg-royal-night {
    background: linear-gradient(to bottom, #141e30, #243b55);
    color: #fff;
}

.bg-peach-splash {
    background: linear-gradient(to bottom, #fbc2eb, #a6c1ee);
    color: #212529;
}

.bg-blazing-fire {
    background: linear-gradient(to bottom, #f12711, #f5af19);
    color: #fff;
}

.bg-cold-mint {
    background: linear-gradient(to bottom, #00d2ff, #3a7bd5);
    color: #212529;
}

.bg-purple-dream {
    background: linear-gradient(to left, #a18cd1, #fbc2eb);
    color: #212529;
}

.bg-sky-lantern {
    background: linear-gradient(to right, #00c3ff, #c0cd07ff);
    color: #fff;
}

.bg-flamingo-sunset {
    background: linear-gradient(to bottom, #ff6e7f, #ffc371);
    color: #212529;
}

.bg-midnight-river {
    background: linear-gradient(to bottom, #2c3e50, #4ca1af);
    color: #fff;
}

.bg-golden-hour {
    background: linear-gradient(to left, #f7971e, #ffd200);
    color: #212529;
}

.bg-deep-space {
    background: linear-gradient(to bottom, #000000, #434343);
    color: #fff;
}

.bg-coral-mist {
    background: linear-gradient(to bottom, #ff512f, #dd2476);
    color: #fff;
}

.bg-tropical-breeze {
    background: linear-gradient(to bottom, #00c6ff, #0072ff);
    color: #fff;
}

.bg-lavender-field {
    background: linear-gradient(to bottom, #e0c3fc, #8ec5fc);
    color: #212529;
}

.bg-forest-glow {
    background: linear-gradient(to bottom, #5a3f37, #2c7744);
    color: #fff;
}

.bg-pink-horizon {
    background: linear-gradient(to bottom, #ff758c, #ff7eb3);
    color: #fff;
}

.bg-caramel-coffee {
    background: linear-gradient(to bottom, #c79081, #dfa579);
    color: #fff;
}

.bg-cool-lagoon {
    background: linear-gradient(to bottom, #13547a, #80d0c7);
    color: #fff;
}

.bg-rose-champagne {
    background: linear-gradient(to right, #fbd3e9, #bb377d);
    color: #212529;
}

.bg-icy-blue {
    background: linear-gradient(to bottom, #74ebd5, #acb6e5);
    color: #212529;
}

.bg-vintage-orange {
    background: linear-gradient(to bottom, #f3904f, #3b4371);
    color: #fff;
}
.bg-sprout-light {
    background: linear-gradient(to right, #b7f8db, #50a7c2);
    color: #212529;
}
.bg-green-glow {
    background: linear-gradient(280deg, #561ae1ff, #4361ee, #4cc9f0);
    color: #ffffff;
}

.bg-indigo-glow {
    background: linear-gradient(to bottom, #3f51b5, #5a55ae);
    color: #fff;
}
.bg-mystic-forest {
    background: linear-gradient(to right, #134e5e, #71b280);
    color: #fff;
}
.bg-sapphire-wave {
    background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
    color: #fff;
}
.bg-citrus-burst {
    background: linear-gradient(to right, #f7971e, #ffd200);
    color: #333;
}
.bg-midnight-lilac {
    background: linear-gradient(135deg, #1A2980, #26D0CE);
    color: #fff;
}

.bg-tropical-punch {
    background: linear-gradient(to right, #f857a6, #ff5858);
    color: #fff;
}
.bg-ocean-foam {
    background: linear-gradient(to right, #00b09b, #96c93d);
    color: #fff;
}
.bg-amber-glow {
    background: linear-gradient(to right, #ffb347, #ffcc33);
    color: #333;
}
.bg-royal-emerald {
    background: linear-gradient(to left, #004d40, #1de9b6);
    color: #fff;
}
.bg-velvet-rose {
    background: linear-gradient(to right, #b721ff, #21d4fd);
    color: #fff;
}

</style>