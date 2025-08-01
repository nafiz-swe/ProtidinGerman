
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selBatch = $conn->query("SELECT * FROM exam_question_tbl WHERE eqt_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<div class="center-form-container">
  <fieldset>
<div class="facebox-header">
  <i class="edit large icon"></i>&nbsp;Update Question
</div>
  
    <div class="col-md-12 mt-4">
      <form method="post" id="updateQuestionFrm">
        <div class="form-group">
          <legend class="text-success">Question Title</legend>
          <input type="hidden" name="question_id" value="<?php echo $id; ?>">
          <textarea name="question" class="form-control" rows="2" required=""><?php echo $selBatch['exam_question']; ?></textarea>
        </div>

        <div class="form-group">
          <legend>Option A</legend>
          <input type="text" name="exam_ch1" value="<?php echo $selBatch['exam_ch1']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <legend>Option B</legend>
          <input type="text" name="exam_ch2" value="<?php echo $selBatch['exam_ch2']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <legend>Option C</legend>
          <input type="text" name="exam_ch3" value="<?php echo $selBatch['exam_ch3']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <legend>Option D</legend>
          <input type="text" name="exam_ch4" value="<?php echo $selBatch['exam_ch4']; ?>" class="form-control" required>
        </div>

        <div class="form-group">
          <legend class="text-success">Correct Answer</legend>
          <input type="text" name="exam_final" value="<?php echo $selBatch['exam_answer']; ?>" class="form-control" placeholder="Enter correct answer" required>
        </div>

        <div class="form-group" align="right">
          <button type="submit" class="exam-qs-updt-btn">Update Now</button>
        </div>
      </form>
    </div>
  </fieldset>
</div>





