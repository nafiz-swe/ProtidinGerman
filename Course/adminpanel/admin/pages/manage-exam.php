<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE EXAM</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Exam List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Exam Topics</th>
                                <th class="text-left ">Batch</th>
                                <th class="text-left ">Description</th>
                                <th class="text-left ">Time limit</th>  
                                <th class="text-left ">Display limit</th>  
                                <th class="text-center" width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExam = $conn->query("SELECT * FROM exam_tbl ORDER BY ex_id DESC ");
                                if($selExam->rowCount() > 0)
                                {
                                    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td class="pl-4"><?php echo $selExamRow['ex_title']; ?></td>
                                            <td>
                                                <?php 
                                                    $batchId =  $selExamRow['batch_id']; 
                                                    $selBatch = $conn->query("SELECT * FROM batch_tbl WHERE batch_id='$batchId' ");
                                                    while ($selBatchRow = $selBatch->fetch(PDO::FETCH_ASSOC)) {
                                                        echo $selBatchRow['batch_number'];
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo nl2br(htmlspecialchars($selExamRow['ex_description'])); ?></td>
                                            <td><?php echo $selExamRow['ex_time_limit']; ?></td>
                                            <td><?php echo $selExamRow['ex_questlimit_display']; ?></td>
          
                                            


<!-- Delete Confirmation Popup -->
<div id="deletePopup" class="popup-overlay" style="display: none;">
    <div class="popup-content">
        <h3>Are you sure?</h3>
        <p>Do you really want to delete this exam? This action cannot be undone.</p>
        <div class="popup-actions">
            <button id="cancelDeleteBtn" class="btn btn-secondary">No, Cancel!</button>
            <button id="confirmDeleteBtn" class="btn btn-danger">Yes, Delete!</button>
        </div>
    </div>
</div>

<!-- Success/Failure Message -->
<div id="messagePopup" class="popup-overlay" style="display: none;">
    <div class="popup-content">
        <h3 id="messageText"></h3>
        <div class="popup-actions">
            <button id="closeMessageBtn" class="btn btn-primary">OK</button>
        </div>
    </div>
</div>

<!-- Exam List Table -->
<td class="text-center">
    <a href="manage-exam.php?id=<?php echo $selExamRow['ex_id']; ?>" type="button" class="btn btn-primary btn-sm">Manage</a>
    <button type="button" class="exam-qs-btn btn-danger" onclick="showDeletePopup(<?php echo $selExamRow['ex_id']; ?>)">Delete</button>
</td>






                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="5">
                                        <h3 class="p-3">No Exam Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>



<style>
/* Popup overlay styling */
.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    padding: 0 40px;
}

/* Popup content styling */
.popup-content {
    background: #fff;
    padding: 20px 30px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    width: 100%;
    animation: fadeIn 0.3s ease-in-out;
}

/* Popup header */
.popup-content h3 {
    margin-bottom: 10px;
    font-size: 1.5em;
    color: #333;
}

/* Popup actions (buttons) */
.popup-actions {
    display: flex;
    justify-content: space-around;
    margin-top: 15px;
}

.popup-actions .btn {
    padding: 10px 10px;
    font-size: 1em;
    width: 45%;
    border-radius: 5px;
    border: none;
    cursor: pointer;
}

.popup-actions .btn-danger {
    background: #d92550;
    color: #fff;
    transition: 0.6s;
}

.popup-actions .btn-danger:hover {
    background: #c0392b;
}

.popup-actions .btn-secondary {
    background: #7f8c8d;
    color: #fff;
    transition: 0.3s;
}

.popup-actions .btn-secondary:hover {
    background: #626567;
}

.popup-actions .btn-primary {
    background: #3498db;
    color: #fff;
    transition: 0.3s;
}

.popup-actions .btn-primary:hover {
    background: #2980b9;
}
#confirmDeleteBtn{
    margin-bottom: 5px;
}
/* Fade-in animation for the popup */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}
</style> 

<script>
let selectedExamId = null;

// Show the delete popup
function showDeletePopup(examId) {
    selectedExamId = examId; // Store the exam ID
    document.getElementById('deletePopup').style.display = 'flex'; // Show delete popup
}

// Cancel delete operation
document.getElementById('cancelDeleteBtn').addEventListener('click', function () {
    document.getElementById('deletePopup').style.display = 'none'; // Hide delete popup
    selectedExamId = null; // Reset exam ID
});

// Confirm delete operation
document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
    if (selectedExamId) {
        // AJAX request to delete exam
        fetch('query/deleteExamExe.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: selectedExamId }),
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('deletePopup').style.display = 'none'; // Hide delete popup
            if (data.res === "success") {
                showMessage("Exam deleted successfully!");
                location.reload(); // Reload the page
            } else {
                showMessage("Failed to delete the exam. Please try again.");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showMessage("An error occurred. Please try again.");
        });
    }
});

// Show message popup
function showMessage(message) {
    document.getElementById('messageText').textContent = message;
    document.getElementById('messagePopup').style.display = 'flex';
}

// Close message popup
document.getElementById('closeMessageBtn').addEventListener('click', function () {
    document.getElementById('messagePopup').style.display = 'none';
});
</script> 