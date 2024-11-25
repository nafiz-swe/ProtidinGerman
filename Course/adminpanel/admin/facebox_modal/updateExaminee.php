
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selExmne = $conn->query("SELECT * FROM students_tbl WHERE student_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update <b>( <?php echo strtoupper($selExmne['student_fullname']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateExamineeFrm">
     <div class="form-group">
        <legend>Fullname</legend>
        <input type="hidden" name="student_id" value="<?php echo $id; ?>">
        <input type="" name="exFullname" class="form-control" required="" value="<?php echo $selExmne['student_fullname']; ?>" >
     </div>

     <div class="form-group">
        <legend>Gender</legend>
        <select class="form-control" name="exGender">
          <option value="<?php echo $selExmne['student_gender']; ?>"><?php echo $selExmne['student_gender']; ?></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
     </div>

     <div class="form-group">
        <legend>Birthdate</legend>
        <input type="date" name="exBdate" class="form-control" required="" value="<?php echo date('Y-m-d',strtotime($selExmne["student_birthdate"])) ?>"/>
     </div>

     <div class="form-group">
        <legend>Course Name</legend>
        <select class="form-control" name="course_area">
            <option value="<?php echo $selExmne['course_name']; ?>"><?php echo $selExmne['course_name']; ?></option>
            <option value="AB Express">AB Express</option>
            <option value="A1">A1</option>
            <option value="A2">A2</option>
            <option value="B1">B1</option>
        </select>

        <!-- < ?php 
            $studentCourse = $selExmne['student_id'];
            $selCourse = $conn->query("SELECT * FROM students_tbl WHERE student_id='$studentCourse' ")->fetch(PDO::FETCH_ASSOC);
         ?>
         <select class="form-control" name="course_area">
           <option value="< ?php echo $studentCourse; ?>">< ?php echo $selCourse['course_name']; ?></option>
           < ?php 
             $selCourse = $conn->query("SELECT * FROM students_tbl WHERE student_id!='$studentCourse' ");
             while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="< ?php echo $selCourseRow['student_id']; ?>">< ?php echo $selCourseRow['course_name']; ?></option>
            < ?php  }
            ?>
         </select> -->
     </div>

     <div class="form-group">
        <legend>Batch Number</legend>
        <?php 
            $studentBatch = $selExmne['student_batch_id'];
            $selBatch = $conn->query("SELECT * FROM batch_tbl WHERE batch_id='$studentBatch' ")->fetch(PDO::FETCH_ASSOC);
         ?>
         <select class="form-control" name="selectBatch">
           <option value="<?php echo $studentBatch; ?>"><?php echo $selBatch['batch_number']; ?></option>
           <?php 
             $selBatch = $conn->query("SELECT * FROM batch_tbl WHERE batch_id!='$studentBatch' ");
             while ($selBatchRow = $selBatch->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php echo $selBatchRow['batch_id']; ?>"><?php echo $selBatchRow['batch_number']; ?></option>
            <?php  }
            ?>
         </select>
     </div>

     <div class="form-group">
        <legend>Email</legend>
        <input type="" name="exEmail" class="form-control" required="" value="<?php echo $selExmne['student_email']; ?>" >
     </div>

     <div class="form-group">
        <legend>Phone Number</legend>
        <input type="" name="exPhone" class="form-control" required="" value="<?php echo $selExmne['student_phone_number']; ?>" >
     </div>

     <div class="form-group">
        <legend>Password</legend>
        <input type="" name="exPass" class="form-control" required="" value="<?php echo $selExmne['student_password']; ?>" >
     </div>
     <div class="form-group">
      <legend>Status</legend>
        <select class="form-control" name="exStatus">
         <option value="<?php echo $selExmne['student_status']; ?>"><?php echo $selExmne['student_status']; ?></option>
         <option value="Active">Active</option>
         <option value="Deativated">Deativated</option>
        </select>
     </div>
  <div class="form-group">
    <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
  </div>
</form>
  </div>
</fieldset>







