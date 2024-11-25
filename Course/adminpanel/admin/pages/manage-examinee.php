<link rel="stylesheet" type="text/css" href="css/mycss.css">
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
                                <th></th>
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
         
