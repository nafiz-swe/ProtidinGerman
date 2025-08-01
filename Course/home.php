<?php 
session_start();

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:index.php");


 ?>
<?php include("conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      
<?php include('includes/modals.php'); ?>

<!-- UI THEME Color -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>



<!-- Condition If unza nga page gi click -->
<?php 
   @$page = $_GET['page'];


   if($page != '')
   {
     if($page == "exam")
     {
       include("pages/exam.php");
     }
     else if($page == "result")
     {
       include("pages/result.php");
     }
     else if($page == "myscores")
     {
       include("pages/myscores.php");
     }
     else if($page == "courseDetails")
     {
       include("pages/course-details.php");
     }
     else if($page == "classDetails")
     {
       include("pages/class-details.php");
     }
     else if($page == "studentLogout")
     {
       include("pages/logout.php");
     }
        else if($page == "documentation")
     {
       include("pages/documents.php");
     }
     else if($page == "sAccount")
     {
       include("pages/account.php");
     }
   }
   // Else ang home nga page mo display
   else
   {
     include("pages/home.php"); 
   }

 ?> 
    <?php
$page = $_GET['page'] ?? '';

if ($page == 'courseDetails') {
    include('adminpanel/admin/pages/course-details.php');
}
?>

<!-- MAO NI IYA FOOTER -->
<?php include("includes/footer.php"); ?>

<!-- < ?php include("includes/addBatch.php"); ?> -->


