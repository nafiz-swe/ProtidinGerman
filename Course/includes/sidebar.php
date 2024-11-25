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

            <li class="app-sidebar__heading"><a href="index.php">Dashboards</a></li>

            <li class="app-sidebar__heading">CLASSES</li>
            <li>
                <a href="#">
                        <i class="metismenu-icon fa fa-chalkboard-teacher"></i>
                        Class
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
                    <li>
                        <a href="home.php?page=classDetails&section=details">
                            <i class="metismenu-icon">
                            </i>Class Details
                        </a>
                    </li>
                </ul>
            </li>


            <li class="app-sidebar__heading">LEARN GERMAN</li>
            <li>
                <a href="#">
                        <i class="metismenu-icon fa fa-info-circle"></i>
                        Course Details
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
                        <a href="home.php?page=courseDetails&id=A1A2B1">
                            <i class="metismenu-icon">
                            </i>German Express
                        </a>
                    </li>
                </ul>
            </li>
                            


            <!-- <ul class="vertical-nav-menu"> -->
            <!-- পরীক্ষা দিন -->
            <a href="javascript:void(0);" onclick="toggleExamList()">
                <ul class="app-sidebar__heading">
                    <i class="metismenu-icon fa fa-edit" style="font-size:20px; padding-right:5px;"></i>
                    পরীক্ষা দিন
                    <i class="fa fa-caret-down" style="font-size:17px; padding-right:5px;"></i>
                </ul>
            </a>

            <div id="examList" style="display: none; padding-left: 20px;">
                <?php 
                if($selExam->rowCount() > 0)
                {
                    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                        <ul>
                                <a href="#" id="startQuiz" data-id="<?php echo $selExamRow['ex_id']; ?>">
                                    <?php 
                                    $lengthOfTxt = strlen($selExamRow['ex_title']);
                                    if($lengthOfTxt >= 23) {
                                        echo substr($selExamRow['ex_title'], 0, 20) . '...';
                                    } else {
                                        echo $selExamRow['ex_title'];
                                    }
                                    ?>
                                </a>
                        </ul>
                    <?php }
                }
                else
                { ?>
                    <p><i class="metismenu-icon"></i> No Exam</p>
                <?php }
                ?>
            </div>

            <script>
            function toggleExamList() {
                var examList = document.getElementById("examList");
                if (examList.style.display === "none") {
                    examList.style.display = "block";
                } else {
                    examList.style.display = "none";
                }
            }
            </script>

            <!-- পরীক্ষার ফলাফল -->
            <a href="javascript:void(0);" onclick="toggleResultList()">
                <ul class="app-sidebar__heading">
                    <i class="metismenu-icon fa fa-file-alt" style="font-size:20px; padding-right:5px;"></i>
                    পরীক্ষার ফলাফল
                    <i class="fa fa-caret-down" style="font-size:17px; padding-right:5px;"></i>
                </ul>
            </a>

            <div id="resultList" style="display: none; padding-left: 20px;">
                <?php 
                $selTakenExam = $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id = ea.exam_id WHERE student_id='$exmneId' ORDER BY ea.examat_id");

                if($selTakenExam->rowCount() > 0)
                {
                    while ($selTakenExamRow = $selTakenExam->fetch(PDO::FETCH_ASSOC)) { ?>
                        <ul>
                            <a href="home.php?page=result&id=<?php echo $selTakenExamRow['ex_id']; ?>">
                                <?php echo $selTakenExamRow['ex_title']; ?>
                            </a>
                        </ul>
                    <?php }
                }
                else
                { ?>
                    <p><i class="metismenu-icon"></i> You are not taking exam yet</p>
                <?php }
                ?>
            </div>

            <script>
            function toggleResultList() {
                var resultList = document.getElementById("resultList");
                if (resultList.style.display === "none") {
                    resultList.style.display = "block";
                } else {
                    resultList.style.display = "none";
                }
            }
            </script>

            <a href="#" data-toggle="modal" data-target="#feedbacksModal" >
                <ul class="app-sidebar__heading">
                <i class="metismenu-icon fa fa-id-badge" style="font-size:20px; padding-right:5px;"></i>
                একাউন্ট </ul>
            </a>

            <!-- লগ আউট লিংক -->
            <a href="javascript:void(0);" onclick="confirmLogout()" style="text-decoration: none;">
                <ul class="app-sidebar__heading">
                    <i class="metismenu-icon fas fa-sign-out-alt" style="font-size:20px; padding-right:5px;"></i>
                    লগ আউট
                </ul>
            </a>

            <!-- লগ আউট কনফার্মেশন পপআপ -->
            <div id="logoutModal" class="modal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
                <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 300px; border-radius: 8px; text-align: center;">
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


        <!-- প্রতিক্রিয়া জানান মেনু -->
        <a href="javascript:void(0);" data-toggle="modal" data-target="#feedbacksModal">
            <ul class="app-sidebar__heading">
                <i class="metismenu-icon fa fa-comment-dots" style="font-size:20px; padding-right:5px;"></i>
                প্রতিক্রিয়া জানান
            </ul>
        </a>
        </ul>
        </div>
    </div>





    
</div>  