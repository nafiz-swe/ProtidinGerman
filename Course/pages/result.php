 <?php 
    $examId = $_GET['id'];
    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<div class="app-main__outer">
<div class="app-main__inner">
    <div id="refreshData">
            
    <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <?php echo "Exam Topic: " . $selExam['ex_title']; ?>
                          <div class="page-title-subheading">
                            <?php echo nl2br(htmlspecialchars( $selExam['ex_description'])); ?>
                          </div>

                    </div>
                </div>
            </div>
        </div>  
        <div class="row col-md-12 mt-5">
        	<h1 class="text-primary">RESULT'S</h1>
        </div>

        <div class="col mt-4">
        	<div class="col-md-6 float-left">
                <div class="card mb-3 widget-content bg-ocean-wave text-white">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading"><h3>Score</h3></div>
                            <div class="widget-subheading" style="color: transparent;">/</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white">
                                <?php 
                                    $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                                ?>
                                <span>
                                    <?php echo $selScore->rowCount(); ?>
                                    <?php 
                                        $over  = $selExam['ex_questlimit_display'];
                                    ?>
                                </span> / <?php echo $over; ?>
                            </div>
                        </div>
                    </div>
                </div>
        	</div>

            <div class="col">
                <div class="card mb-3 widget-content bg-happy-green">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading"><h3>Percentage</h3></div>
                            <div class="widget-subheading" style="color: transparent;">/</div>
                            </div>
                            <div class="widget-content-right">
                            <div class="widget-numbers text-white">
                                <?php 
                                    $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                                ?>
                                <span>
                                    <?php 
                                        $score = $selScore->rowCount();
                                        $ans = $score / $over * 100;
                                        echo "$ans";
                                        echo "%";
                                        
                                    ?>
                                </span> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-md-6 mt-5">
        	<div class="main-card mb-3 card">
                <div class="card-body">
                	<h5 class="card-title">Your Answer's</h5>
        			<table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                    <?php 
                    	$selQuest = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id WHERE eqt.exam_id='$examId' AND ea.axmne_id='$exmneId' AND ea.exans_status='new' ");
                    	$i = 1;
                    	while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                    		<tr>
                    			<td>
                    				<b><p><?php echo $i++; ?> .) <?php echo $selQuestRow['exam_question']; ?></p></b>
                    				<label class="pl-4 text-success">
                    					Answer : 
                    					<?php 
                    						if($selQuestRow['exam_answer'] != $selQuestRow['exans_answer'])
                    						{ ?>
                    							<span style="color:red"><?php echo $selQuestRow['exans_answer']; ?></span>
                    						<?PHP }
                    						else
                    						{ ?>
                    							<span class="text-success"><?php echo $selQuestRow['exans_answer']; ?></span>
                    						<?php }
                    					 ?>
                    				</label>
                    			</td>
                    		</tr>
                    	<?php }
                     ?>
	                 </table>
                </div>
            </div>
        </div>
    </div>


    </div>
</div>

<style>
    .bg-midnight-glow   { background: linear-gradient(to bottom, #232526, #414345); color: #fff; }
    .bg-sunset-blush    { background: linear-gradient(to bottom, #ff6e7f, #bfe9ff); color: #212529; }
    .bg-ocean-wave      { background: linear-gradient(to bottom, #2b5876, #4e4376); color: #fff; }
    .bg-mango-mix       { background: linear-gradient(to bottom, #f3904f, #3b4371); color: #fff; }
    .bg-lush-leaf       { background: linear-gradient(to bottom, #56ab2f, #a8e063); color: #212529; }
    .bg-royal-night     { background: linear-gradient(to bottom, #141e30, #243b55); color: #fff; }
    .bg-peach-splash    { background: linear-gradient(to bottom, #ffecd2, #fcb69f); color: #212529; }
    .bg-blazing-fire    { background: linear-gradient(to bottom, #f12711, #f5af19); color: #fff; }
    .bg-cold-mint       { background: linear-gradient(to bottom, #00c9ff, #92fe9d); color: #212529; }
    .bg-purple-dream    { background: linear-gradient(to bottom, #a18cd1, #fbc2eb); color: #212529; }

</style>