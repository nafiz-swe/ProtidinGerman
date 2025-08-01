<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selBatch = $conn->query("SELECT * FROM batch_tbl WHERE batch_id='$id' ")->fetch(PDO::FETCH_ASSOC);

?>

<fieldset style="width:543px;">
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update Batch Number ( <?php echo strtoupper($selBatch['batch_number']); ?> )</i></legend>
  <div class="col-md-12 mt-4">
  <form method="post" id="updateCourseFrm">
    <div class="form-group">
        <legend>Batch Number</legend>
        <input type="hidden" name="batch_id_check" value="<?php echo $id; ?>">
        <input type="text" name="updateBatch" class="form-control" required="" value="<?php echo $selBatch['batch_number']; ?>">
    </div>
    <div class="form-group">
        <legend>Class Start Date</legend>
        <input type="hidden" name="start_date_check" value="<?php echo $selBatch['start_date']; ?>">
        <input type="date" name="updateStartDate" class="form-control" required value="<?php echo date('Y-m-d', strtotime($selBatch['start_date'])); ?>">
    </div>
    <div class="form-group">
        <legend>Class Days</legend>
        <?php
        // Convert the stored class days string into an array
        $classDaysArray = explode(', ', $selBatch['class_day']);
        ?>
        <input type="checkbox" name="classDay[]" value="Sunday" <?php echo in_array('Sunday', $classDaysArray) ? 'checked' : ''; ?>> Sunday<br>
        <input type="checkbox" name="classDay[]" value="Monday" <?php echo in_array('Monday', $classDaysArray) ? 'checked' : ''; ?>> Monday<br>
        <input type="checkbox" name="classDay[]" value="Tuesday" <?php echo in_array('Tuesday', $classDaysArray) ? 'checked' : ''; ?>> Tuesday<br>
        <input type="checkbox" name="classDay[]" value="Wednesday" <?php echo in_array('Wednesday', $classDaysArray) ? 'checked' : ''; ?>> Wednesday<br>
        <input type="checkbox" name="classDay[]" value="Thursday" <?php echo in_array('Thursday', $classDaysArray) ? 'checked' : ''; ?>> Thursday<br>
        <input type="checkbox" name="classDay[]" value="Friday" <?php echo in_array('Friday', $classDaysArray) ? 'checked' : ''; ?>> Friday<br>
        <input type="checkbox" name="classDay[]" value="Saturday" <?php echo in_array('Saturday', $classDaysArray) ? 'checked' : ''; ?>> Saturday<br>
    </div>

    <div class="form-group">
    <legend>Class Time</legend>
    <input 
        type="time" 
        name="updateClassTime" 
        class="form-control" 
        value="<?php echo date('H:i', strtotime($selBatch['class_time'])); ?>" 
        required>
    </div>

    <div class="form-group">
        <legend>Class Link</legend>
        <input type="text" name="updateClassLink" class="form-control" value="<?php echo $selBatch['class_link']; ?>" required="">
    </div>
    <div class="form-group">
        <legend>Batch Status</legend>
        <select class="form-control" name="updateClassStatus" required="">
            <option value="Coming soon" <?php echo ($selBatch['class_status'] == 'Coming soon') ? 'selected' : ''; ?>>Coming soon</option>
            <option value="On going" <?php echo ($selBatch['class_status'] == 'On going') ? 'selected' : ''; ?>>On going</option>
            <option value="Holiday" <?php echo ($selBatch['class_status'] == 'Holiday') ? 'selected' : ''; ?>>Holiday</option>
            <option value="Complete" <?php echo ($selBatch['class_status'] == 'Complete') ? 'selected' : ''; ?>>Complete</option>
        </select>
    </div>
    <div class="form-group">
        <label>Notice Board</label>
        <textarea name="updateNoticeBoard" class="form-control" rows="4" placeholder="Input Notice" required=""><?php echo $selBatch['notice_board']; ?></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
    </div>
</form>

  </div>
</fieldset>
