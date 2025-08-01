<div class="app-main__outer">
        <div class="app-main__inner">
             


            <?php 
                @$exam_id = $_GET['exam_id'];


                if($exam_id != "")
                {
                   $selEx = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exam_id' ")->fetch(PDO::FETCH_ASSOC);
                   $exam_course = $selEx['batch_id'];

                   

                   $selExmne = $conn->query("SELECT * FROM students_tbl et  WHERE student_batch_id='$exam_course'  ");


                   ?>
                   <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div><b class="text-primary">RANKING BY EXAM</b><br>
                                Exam Topic : <?php echo $selEx['ex_title']; ?><br><br>
                               <span class="border" style="padding:10px;color:white;background-color: #15803d;">Excellent</span>
                               <span class="border" style="padding:10px;color:white;background-color: #7FBF4D;">Very Good</span>
                               <span class="border" style="padding:10px;color:white;background-color: #0284c7;">Good</span>
                               <span class="border" style="padding:10px;color:white;background-color: #be123c;">Failed</span>
                               <span class="border" style="padding:10px;color:black;background-color: #cbd5e1;">Not Answering</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                          <tbody>
                            <thead>
                                <tr>
                                    <th width="25%">Examinee Fullname</th>
                                    <th>Score / Over</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <?php 
                                while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <?php 
                                            $exmneId = $selExmneRow['student_id'];
                                            $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ORDER BY ea.exans_id DESC");

                                              $selAttempt = $conn->query("SELECT * FROM exam_attempt WHERE student_id='$exmneId' AND exam_id='$exam_id' ");

                                             $over = $selEx['ex_questlimit_display']  ;    


                                              @$score = $selScore->rowCount();
                                                @$ans = $score / $over * 100;

                                         ?>
                                       <tr style="<?php 
                                             if($selAttempt->rowCount() == 0)
                                             {
                                                echo "background-color: #cbd5e1;color:black";
                                             }
                                             else if($ans > 90)
                                             {
                                                echo "background-color: #15803d;color:white";
                                             } 
                                             else if($ans >= 80){
                                                echo "background-color: #7FBF4D;color:white";
                                             }
                                             else if($ans >= 60){
                                                echo "background-color: #0284c7;color:white";
                                             }
                                             else
                                             {
                                                echo "background-color: #be123c;color:white";
                                             }
                                           
                                            
                                             ?>"
                                        >
                                        <td>

                                          <?php echo $selExmneRow['student_fullname']; ?></td>
                                        
                                        <td >
                                        <?php 
                                          if($selAttempt->rowCount() == 0)
                                          {
                                            echo "Not answer yet";
                                          }
                                          else if($selScore->rowCount() > 0)
                                          {
                                            echo $totScore =  $selScore->rowCount();
                                            echo " / ";
                                            echo $over;
                                          }
                                          else
                                          {
                                            echo $totScore =  $selScore->rowCount();
                                            echo " / ";
                                            echo $over;
                                          }

                                            
                                            

                                         ?>
                                        </td>
                                        <td>
                                          <?php 
                                                if($selAttempt->rowCount() == 0)
                                                {
                                                  echo "Not answer yet";
                                                }
                                                else
                                                {
                                                    echo $ans; ?>%<?php
                                                }
                                           
                                          ?>
                                        </td>
                                    </tr>
                                <?php }
                             ?>                              
                          </tbody>
                        </table>
                    </div>



                   <?php
                }
                else
                { ?>
                <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div><b>RANKING BY EXAM</b></div>
                    </div>
                </div>
                </div> 

                 <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Exam Topics List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Exam Topics</th>
                                <th class="text-left ">Course</th>
                                <th class="text-left ">Batch Number</th>
                                <th class="text-left ">Description</th>
                                <th class="text-center" width="8%">Action</th>
                            </tr>
                            </thead>

<tbody>
    <?php 
        $selExam = $conn->query("SELECT * FROM exam_tbl ORDER BY ex_id DESC");
        if($selExam->rowCount() > 0) {
            while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td class="pl-4"><?php echo $selExamRow['ex_title']; ?></td>
                    <td>
                      <?php 
                          $batchId = $selExamRow['batch_id'];
                          $selStudent = $conn->query("SELECT course_name FROM students_tbl WHERE student_batch_id='$batchId'");
                          if ($selStudent->rowCount() > 0) {
                              while ($selStudentRow = $selStudent->fetch(PDO::FETCH_ASSOC)) {
                                  echo $selStudentRow['course_name'];
                              }
                          } else {
                              echo "No Course Found";
                          }
                      ?>
                    </td>
                    <td>
                        <?php 
                            $batchId = $selExamRow['batch_id'];
                            $selBatch = $conn->query("SELECT * FROM batch_tbl WHERE batch_id='$batchId'");
                            while ($selBatchRow = $selBatch->fetch(PDO::FETCH_ASSOC)) {
                                echo $selBatchRow['batch_number'];
                            }
                        ?>
                    </td>
                    <td><?php echo nl2br(htmlspecialchars($selExamRow['ex_description'])); ?></td>

                    <td class="text-center">
                        <a href="?page=ranking-exam&exam_id=<?php echo $selExamRow['ex_id']; ?>" class="btn btn-success btn-sm">View</a>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="5">
                    <h3 class="p-3">No Exam Found</h3>
                </td>
            </tr>
        <?php }
    ?>
</tbody>

                        </table>
                    </div>
                </div>
            </div>   
                    
                <?php }

             ?>      
            
            
      
        
</div>
         


















