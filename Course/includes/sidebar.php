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
                        <a href="home.php?page=courseDetails&id=GermanExpress">
                            <i class="metismenu-icon">
                            </i>German Express
                        </a>
                    </li>
                </ul>
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
                <a href="javascript:void(0);" onclick="confirmLogout()" style="text-decoration: none;">
                     <i class="metismenu-icon fas fa-sign-out-alt"></i>
                     LOGOUT
                </a>
            </li>

            <!-- লগ আউট কনফার্মেশন পপআপ -->
            <div id="logoutModal" class="modal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
                <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 300px; border-radius: 8px; text-align: center; color: #000;">
                    <h3>আপনি কি লগ আউট করতে চান?</h3>
                    <button onclick="logout()" style="background-color: #28a745; color: white; padding: 10px 20px; margin: 10px; border: none; border-radius: 5px; cursor: pointer;">হ্যাঁ</button>
                    <button onclick="closeLogoutModal()" style="background-color: #dc3545; color: white; padding: 10px 20px; margin: 10px; border: none; border-radius: 5px; cursor: pointer;">না</button>
                </div>
            </div>

            <script>
            // পপআপ খোলার জন্য ফাংশন
            function confirmLogout() {
                document.getElementById("logoutModal").style.display = "block";
            }

            // পপআপ বন্ধ করার জন্য ফাংশন
            function closeLogoutModal() {
                document.getElementById("logoutModal").style.display = "none";
            }

            // লগ আউট ফাংশন
            function logout() {
                window.location.href = "pages/logout.php?page=studentLogout";
            }
            </script>

            <li class="app-sidebar__heading"></li>
            <li>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#feedbacksModal">
                    <i class="metismenu-icon fa fa-comments-o"></i>
                    FEEDBACK
                </a>
            </li>


        </ul>
        </div>
    </div>





    
</div>  