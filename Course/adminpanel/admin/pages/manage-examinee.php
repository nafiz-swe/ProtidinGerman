<link rel="stylesheet" type="text/css" href="css/mycss.css">
<!-- <link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" /> -->

  <link href="css/facebox.css" rel="stylesheet" type="text/css" />
  <script src="js/jquery.min.js"></script>
  <script src="js/facebox.js"></script>


<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE STUDENTS</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Students List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Students Name</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                                <th>Course Name</th>
                                <th>Batch Number</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Payment Amount</th>
                                <th>Payment Proof</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExmne = $conn->query("SELECT * FROM students_tbl ORDER BY student_id DESC ");
                                if($selExmne->rowCount() > 0)
                                {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selExmneRow['student_fullname']; ?></td>
                                           <td><?php echo $selExmneRow['student_gender']; ?></td>
                                           <td><?php echo $selExmneRow['student_birthdate']; ?></td>
                                           <td><?php echo $selExmneRow['course_name']; ?></td>
                                           <td>
                                            <?php 
                                                 $studentBatch = $selExmneRow['student_batch_id'];
                                                 $selBatch = $conn->query("SELECT * FROM batch_tbl WHERE batch_id='$studentBatch' ")->fetch(PDO::FETCH_ASSOC);
                                                 echo $selBatch['batch_number'];
                                             ?>
                                            </td>
                                           <td><?php echo $selExmneRow['student_email']; ?></td>
                                           <td><?php echo $selExmneRow['student_phone_number']; ?></td>
                                           <td><?php echo $selExmneRow['student_password']; ?></td>
                                           <td><?php echo $selExmneRow['student_status']; ?></td>

                                           <td>
                                            <?php 
                                                $studentEmail = $selExmneRow['student_email'];

                                                // Latest payment amount fetch korchi
                                                $stmtAmount = $conn->prepare("SELECT amount FROM course_payments WHERE email = :email ORDER BY id DESC LIMIT 1");
                                                $stmtAmount->execute([':email' => $studentEmail]);
                                                $payment = $stmtAmount->fetch(PDO::FETCH_ASSOC);

                                                if ($payment && !empty($payment['amount'])) {
                                                    echo htmlspecialchars($payment['amount']);
                                                } else {
                                                    echo 'No Amount';
                                                }
                                            ?>
                                            </td>


                                           <td>
                                            <?php 
                                            $studentEmail = $selExmneRow['student_email'];
                                            $baseUrl = "http://localhost:8000/";
                                            // $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}/";

                                            // Query payment proof with transaction_id
                                            $stmtProof = $conn->prepare("SELECT screenshot_path, transaction_id FROM course_payments WHERE email = :email ORDER BY id DESC LIMIT 1");
                                            $stmtProof->execute([':email' => $studentEmail]);
                                            $proof = $stmtProof->fetch(PDO::FETCH_ASSOC);

                                            if ($proof) {
                                                if (!empty($proof['screenshot_path'])) {
                                                    $fileUrl = $baseUrl . $proof['screenshot_path'];
                                                    $ext = strtolower(pathinfo($fileUrl, PATHINFO_EXTENSION));
                                                    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];

                                                    if (in_array($ext, $allowed_ext)) {
                                                        echo '<a href="' . htmlspecialchars($fileUrl) . '" target="_blank" title="Payment Proof">';
                                                        echo '<img src="' . htmlspecialchars($fileUrl) . '" alt="Payment Proof" style="width:80px; cursor:pointer; border-radius:4px;">';
                                                        echo '</a>';
                                                    } else {
                                                        echo '<a href="' . htmlspecialchars($fileUrl) . '" target="_blank">View File</a>';
                                                    }
                                                } elseif (!empty($proof['transaction_id'])) {
                                                    echo htmlspecialchars($proof['transaction_id']);
                                                } else {
                                                    echo 'No Proof';
                                                }
                                            } else {
                                                echo 'No Proof';
                                            }
                                            ?>
                                            </td>



                                           <td>
                                               <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?php echo $selExmneRow['student_id']; ?>" class="btn btn-sm btn-primary">Update</a>

                                           </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Course Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      </div>
         
  <script>
    $(document).ready(function() {
      $('a[rel*=facebox]').facebox();
    });
  </script>