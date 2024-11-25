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
        <input type="text" name="updateStartDate" class="form-control" required="" value="<?php echo $selBatch['start_date']; ?>">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
      </div>
    </form>
  </div>
</fieldset>
