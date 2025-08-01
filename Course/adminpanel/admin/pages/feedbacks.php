<div class="app-main__outer"> 
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div><b>ALL FEEDBACKS</b></div>
                </div>
            </div>
        </div> 

        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Feedback's List</div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                            <tr>
                                <th class="text-left pl-4" width="20%">Feedbacks As</th>
                                <th class="text-left pl-4" width="20%">Students Name</th>
                                <th class="text-left">Batch Number</th>
                                <th class="text-left">Phone Number</th>
                                <th class="text-left">Message</th>
                                <th class="text-center" width="15%">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // SQL Query updated to use student_id for joining with students_tbl
                                $selExam = $conn->query("SELECT f.fb_id, f.fb_exmne_as, f.fb_feedbacks, f.fb_date, 
                                                        s.student_fullname, s.student_phone_number, s.student_batch_id, 
                                                        b.batch_number 
                                                    FROM feedbacks_tbl f
                                                    LEFT JOIN students_tbl s ON f.student_id = s.student_id
                                                    LEFT JOIN batch_tbl b ON s.student_batch_id = b.batch_id 
                                                    ORDER BY f.fb_id DESC");

                                if($selExam->rowCount() > 0) {
                                    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td class="pl-4"><?php echo $selExamRow['fb_exmne_as']; ?></td> 
                                            <td class="pl-4"><?php echo $selExamRow['student_fullname']; ?></td>
                                            <td><?php echo $selExamRow['batch_number']; ?></td>
                                            <td><?php echo $selExamRow['student_phone_number']; ?></td>
                                            <td><?php echo $selExamRow['fb_feedbacks']; ?></td>
                                            <td><?php echo $selExamRow['fb_date']; ?></td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                      <td colspan="6">
                                        <h3 class="p-3">No Feedback found</h3>
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
</div>
