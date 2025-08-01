<!-- Modal For Add Batch -->
<div class="modal fade" id="modalForAddCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addCourseFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Batch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Batch Number</label>
            <input type="" name="add_batch" id="add_batch" class="form-control" placeholder="Input Batch" required="" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Batch Start Date</label>
            <input type="date" name="startDate" class="form-control" placeholder="Input Start Date" required autocomplete="off">
          </div>
          <div class="form-group">
            <label>Class Day</label><br>
            <input type="checkbox" name="classDay[]" value="Sunday"> Sunday<br>
            <input type="checkbox" name="classDay[]" value="Monday"> Monday<br>
            <input type="checkbox" name="classDay[]" value="Tuesday"> Tuesday<br>
            <input type="checkbox" name="classDay[]" value="Wednesday"> Wednesday<br>
            <input type="checkbox" name="classDay[]" value="Thursday"> Thursday<br>
            <input type="checkbox" name="classDay[]" value="Friday"> Friday<br>
            <input type="checkbox" name="classDay[]" value="Saturday"> Saturday<br>
          </div>

          <div class="form-group">
            <label for="startTime">Class Time</label>
            <input type="time" id="startTime" name="startTime" class="form-control" required autocomplete="off">
          </div>

          <div class="form-group">
            <label>Class Link</label>
            <input type="" name="classLink"  class="form-control" placeholder="Input Class Link" required="" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Batch Status</label>
            <select class="form-control" name="classStatus" required="">
              <option>Select Status</option>
              <option value="Coming soon">Coming soon</option>  
              <option value="On going">On going</option>
              <option value="Holiday">Holiday</option>  
              <option value="Complete">Complete</option> 
            </select>
          </div>
          <div class="form-group">
            <label>Notice Board</label>
            <textarea name="noticeBoard" class="form-control" rows="4" placeholder="Input Notice" required=""></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Update Batch -->
<div class="modal fade myModal" id="updateCourse-<?php echo $selBatchRow['batch_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
     <form class="refreshFrm" id="addCourseFrm" method="post" >
       <div class="modal-content myModal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update ( <?php echo $selBatchRow['batch_number']; ?> )</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Batch</label>
              <input type="" name="add_batch" id="add_batch" class="form-control" value="<?php echo $selBatchRow['batch_number']; ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Now</button>
        </div>
      </div>
     </form>
    </div>
  </div>


<!-- Modal For Add Exam -->
<div class="modal fade" id="modalForExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Select Batch Number</label>
            <select class="form-control" name="courseSelected">
              <option value="0">Select batch</option>
              <?php 
                $selBatch = $conn->query("SELECT * FROM batch_tbl ORDER BY batch_id DESC");
                if($selBatch->rowCount() > 0)
                {
                  while ($selBatchRow = $selBatch->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selBatchRow['batch_id']; ?>"><?php echo $selBatchRow['batch_number']; ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="0">No Batch Found</option>
                <?php }
               ?>
            </select>
          </div>

          <div class="form-group">
            <label>Exam Time Limit</label>
            <select class="form-control" name="timeLimit" required="">
              <option value="0">Select time</option>
              <option value="10">10 Minutes</option> 
              <option value="20">20 Minutes</option> 
              <option value="30">30 Minutes</option> 
              <option value="40">40 Minutes</option> 
              <option value="50">50 Minutes</option> 
              <option value="60">60 Minutes</option> 
            </select>
          </div>

          <div class="form-group">
            <label>Question Limit to Display</label>
            <input type="number" name="examQuestDipLimit" id="" class="form-control" placeholder="Input question limit to display">
          </div>

          <div class="form-group">
            <label>Exam Topic</label>
            <input type="" name="examTitle" class="form-control" placeholder="Input Exam Topic" required="">
          </div>

          <div class="form-group">
            <label>Exam Description</label>
            <textarea name="examDesc" class="form-control" rows="4" placeholder="Input Exam Description" required=""></textarea>
          </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Add Students -->
<div class="modal fade" id="modalForAddExaminee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamineeFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student | Student Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Full Name</label>
            <input type="" name="fullname" id="fullname" class="form-control" placeholder="Enter fullname" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Birhdate</label>
            <input type="date" name="bdate" id="bdate" class="form-control" placeholder="Birhdate" autocomplete="off" >
          </div>
          <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender" id="gender">
              <option value="0">Select gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="form-group">
            <label>Course Name</label>
            <select class="form-control" name="course_level" id="course_level">
              <option value="0">Select level</option>
              <option value="Exam Preparation">Exam Preparation</option>
              <option value="A1">A1</option>
              <option value="A2">A2</option>
              <option value="B1">B1</option>
              <option value="B2">B2</option>
            </select>
          </div>
          <div class="form-group">
            <label>Batch Number</label>
            <select class="form-control" name="batch_serial" id="batch_serial">
              <option value="0">Select batch</option>
              <?php 
                $selBatch = $conn->query("SELECT * FROM batch_tbl ORDER BY batch_id asc");
                while ($selBatchRow = $selBatch->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $selBatchRow['batch_id']; ?>"><?php echo $selBatchRow['batch_number']; ?></option>
                <?php }
               ?>
            </select>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="number" name="student_phone_number" id="student_phone_number" class="form-control" placeholder="Enter phone number" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status" id="status">
              <option value="0">Select Status</option>
              <option value="Running">Running</option>
              <option value="Completed">Completed</option>
              <option value="Dropped">Dropped</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>



<!-- Modal For Add Question -->
<div class="modal fade" id="modalForAddQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addQuestionFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Question for <br><?php echo $selExamRow['ex_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm" method="post" id="addQuestionFrm">
      <div class="modal-body">
        <div class="col-md-12">


          <div class="form-group">
          <legend class="text-success">Question Title</legend>
            <input type="hidden" name="examId" value="<?php echo $exId; ?>">
            <input type="" name="question" id="course_name" class="form-control" placeholder="Input question" autocomplete="off">
          </div>

            <div class="facebox-header">
              Input keyword for MCQ
            </div>
            <div class="form-group">
                <label>Option A</label>
                <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Input option A" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Option B</label>
                <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Input option B" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Option C</label>
                <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Input option C" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Option D</label>
                <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Input option D" autocomplete="off">
            </div>

            <div class="form-group">
              <legend class="text-success">Correct Answer</legend>
                <input type="" name="correctAnswer" id="" class="form-control" placeholder="Input the full answer" autocomplete="off">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
      </form>
    </div>
   </form>
  </div>
</div>