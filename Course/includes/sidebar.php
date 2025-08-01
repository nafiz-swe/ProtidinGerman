<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="site-logo mr-auto w-25"><a href="../index.php"><img src="../webImg/Protidn-german-Home.svg" style="width:92px; height:50px;"></img></a></div>

        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>

    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">

            <li>
                <a href="index.php">
                     <i class="metismenu-icon fa fa-dashboard"></i>
                     DASHBOARD
                </a>
            </li>


            <li class="app-sidebar__heading"></li>
            <li>
                <a href="#">
                        <i class="metismenu-icon fas fa-chalkboard-teacher"></i>
                        CLASS
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a  href="home.php?page=classDetails&section=join">
                            <i class="metismenu-icon"></i>
                            Join Class
                        </a>
                    </li>
                    <li>
                        <a href="home.php?page=classDetails&section=record">
                            <i class="metismenu-icon">
                            </i>Class Record
                        </a>
                    </li>
                    <li>
                        <a href="home.php?page=classDetails&section=attendance">
                        <i class="metismenu-icon">
                        </i>Class Attendance
                        </a>
                    </li>
                </ul>
            </li>

            <li class="app-sidebar__heading"></li>
            <li>
                <a href="#">
                     <i class="metismenu-icon fas fa-file-signature"></i>
                     EXAM'S
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul >
                    <?php 
                        
                        if($selExam->rowCount() > 0)
                        {
                            while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                 <li>
                                 <a href="#" id="startQuiz" data-id="<?php echo $selExamRow['ex_id']; ?>"  >
                                    <?php 
                                        $lenthOfTxt = strlen($selExamRow['ex_title']);
                                        if($lenthOfTxt >= 23)
                                        { ?>
                                            <?php echo substr($selExamRow['ex_title'], 0, 20);?>.....
                                        <?php }
                                        else
                                        {
                                            echo $selExamRow['ex_title'];
                                        }
                                     ?>
                                 </a>
                                 </li>
                            <?php }
                        }
                        else
                        { ?>
                            <a href="#">
                                <i class="metismenu-icon"></i>Exam's Not Available
                            </a>
                        <?php }
                     ?>
                </ul>
            </li>


            <li class="app-sidebar__heading"></li>
            <li>
                <a href="#">
                     <i class="metismenu-icon fas fa-trophy"></i>
                     RESULTS
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul >
                <?php 
                $selTakenExam = $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id = ea.exam_id WHERE student_id='$exmneId' ORDER BY ea.examat_id");

                if($selTakenExam->rowCount() > 0)
                {
                    while ($selTakenExamRow = $selTakenExam->fetch(PDO::FETCH_ASSOC)) { ?>
                            <a href="home.php?page=result&id=<?php echo $selTakenExamRow['ex_id']; ?>" style="padding: 0px 22px;">
                                <?php echo $selTakenExamRow['ex_title']; ?>
                            </a>
                    <?php }
                }
                else
                { ?>
                    <p><i class="metismenu-icon"></i> You are not taking exam yet</p>
                <?php }
                ?>
                </ul>
            </li>

            <li class="app-sidebar__heading"></li>
            <li>
                <a href="#">
                        <i class="metismenu-icon fa fa-info-circle"></i>
                        COURSE
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a  href="home.php?page=courseDetails&id=A1">
                            <i class="metismenu-icon"></i>
                            Deutsch A1
                        </a>
                    </li>
                    <li>
                        <a href="home.php?page=courseDetails&id=A2">
                            <i class="metismenu-icon">
                            </i>Deutsch A2
                        </a>
                    </li>
                    <li>
                        <a href="home.php?page=courseDetails&id=B1">
                            <i class="metismenu-icon">
                            </i>Deutsch B1
                        </a>
                    </li>
                    <li>
                        <a href="home.php?page=courseDetails&id=ExamPreparation">
                            <i class="metismenu-icon">
                            </i>Exam Preparation
                        </a>
                    </li>
                </ul>
            </li>

            <li class="app-sidebar__heading"></li>
            <li>
                <a href="home.php?page=documentation">
                    <i class="metismenu-icon fa fa-id-badge"></i>
                    DOCUMENTATION
                </a>
            </li>

            <li class="app-sidebar__heading"></li>
            <li>
                <a href="home.php?page=sAccount">
                    <i class="metismenu-icon fa fa-id-badge"></i>
                    ACCOUNT
                </a>
            </li>

            <li class="app-sidebar__heading"></li>
            <li>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#feedbacksModal">
                    <i class="metismenu-icon fa fa-comments-o"></i>
                    FEEDBACK
                </a>
            </li>

            <li class="app-sidebar__heading"></li>
            <li>
                <a href="javascript:void(0);" onclick="confirmLogout()" style="text-decoration: none;">
                     <i class="metismenu-icon fas fa-sign-out-alt"></i>
                     LOGOUT
                </a>
            </li>

<!-- ✅ Student Logout Modal -->
<div id="logoutModal" class="modal-overlay hidden">
  <div class="modal-container">
    <div class="modal-icon">👨‍🎓</div>
    <h2>আপনি কি লগ আউট করতে চান?</h2>
    <div class="modal-buttons">
      <button onclick="logout()" class="btn yes">হ্যাঁ</button>
      <button onclick="closeLogoutModal()" class="btn no">না</button>
    </div>
  </div>
</div>

<!-- ✅ CSS -->
<style>
.hidden {
  display: none !important;
}

.modal-overlay {
  position: fixed;
  z-index: 9999;
  inset: 0;
  background: rgba(0, 0, 0, 0.6);
  backdrop-filter: blur(5px);
  display: flex;
  align-items: center;
  justify-content: center;
}


.modal-container {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(12px);
  border-radius: 16px;
  padding: 30px 25px;
  max-width: 340px;
  width: 90%;
  text-align: center;
  color: #fff;
  box-shadow: 0 10px 30px rgba(0,0,0,0.5);
  animation: fadeIn 0.3s ease-in-out;
  border: 1px solid rgba(255,255,255,0.2);
}

.modal-icon {
  font-size: 40px;
  margin-bottom: 15px;
}

.modal-container h2 {
  margin-bottom: 20px;
  font-size: 20px;
  font-weight: 500;
}

.modal-buttons {
  display: flex;
  justify-content: center;
  gap: 15px;
  margin-top: 10px;
}

.modal-buttons .btn {
  padding: 10px 22px;
  border: none;
  border-radius: 6px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.2s ease;
}

.btn.yes {
  background-color: #28a745;
  color: #fff;
}

.btn.no {
  background-color: #dc3545;
  color: #fff;
}

.btn:hover {
  opacity: 0.9;
  transform: scale(1.05);
}

@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.95); }
  to { opacity: 1; transform: scale(1); }
}

</style>

<!-- ✅ JS -->
<script>
function confirmLogout() {
  document.getElementById("logoutModal").classList.remove("hidden");
}
function closeLogoutModal() {
  document.getElementById("logoutModal").classList.add("hidden");
}
function logout() {
  window.location.href = "pages/logout.php?page=studentLogout";
}
</script>


        </ul>
        </div>
    </div>





    
</div>  