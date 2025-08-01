<link rel="stylesheet" type="text/css" href="css/mycss.css">
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<!-- <script src="js/jquery.min.js"></script> -->
<!-- <script src="js/facebox.js"></script> -->
<!-- <script>
    $(document).ready(function($) {
        $('a[rel*=facebox]').facebox({
            loadingImage : 'img/loading.gif',
            closeImage   : 'img/closelabel.png'
        });
    });
</script> -->

<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE BATCH</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Batch List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Batch Number</th>
                                <th class="text-left pl-4">Batch Start</th>
                                <th class="text-left pl-4">Class Day</th>
                                <th class="text-left pl-4">Class Time</th>
                                <th class="text-left pl-4">Class Link</th>
                                <th class="text-left pl-4">Batch Status</th>
                                <th class="text-left pl-4">Notice Board</th>
                                <th class="text-center" width="20%">Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $selBatch = $conn->query("SELECT * FROM batch_tbl ORDER BY batch_id DESC ");
                                    if($selBatch->rowCount() > 0)
                                    {
                                        while ($selBatchRow = $selBatch->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <tr>
                                                <td class="pl-4">
                                                    <?php echo $selBatchRow['batch_number']; ?>
                                                </td>
                                                <td class="pl-4">
                                                    <?php echo $selBatchRow['start_date']; ?>
                                                </td>
                                                <td class="pl-4">
                                                    <?php echo $selBatchRow['class_day']; ?>
                                                </td>
                                                <td class="pl-4">
                                                    <?php echo $selBatchRow['class_time']; ?>
                                                </td>
                                                <td class="pl-4">
                                                    <?php echo $selBatchRow['class_link']; ?>
                                                </td>
                                                <td class="pl-4">
                                                    <?php echo $selBatchRow['class_status']; ?>
                                                </td>
                                                <td class="pl-4">
                                                    <?php echo nl2br(htmlspecialchars($selBatchRow['notice_board'])); ?>
                                                </td>                                              




                                                <!-- Delete Confirmation Popup -->
<div id="deleteCoursePopup" class="popup-overlay" style="display: none;">
    <div class="popup-content">
        <h3>Are you sure?</h3>
        <p>Do you really want to delete this batch? This action cannot be undone.</p>
        <div class="popup-actions">
            <button id="cancelDeleteCourseBtn" class="btn btn-secondary">No, Cancel!</button>
            <button id="confirmDeleteCourseBtn" class="btn btn-danger">Yes, Delete!</button>
        </div>
    </div>
</div>

<!-- Success/Failure Message -->
<div id="messageCoursePopup" class="popup-overlay" style="display: none;">
    <div class="popup-content">
        <h3 id="messageCourseText"></h3>
        <div class="popup-actions">
            <button id="closeCourseMessageBtn" class="btn btn-primary">OK</button>
        </div>
    </div>
</div>

<!-- Course List Table -->
<td class="text-center">
    <a rel="facebox" style="text-decoration: none;" class="btn btn-primary btn-sm" href="facebox_modal/updateCourse.php?id=<?php echo $selBatchRow['batch_id']; ?>" id="updateCourse">Update</a>
    <button type="button" id="deleteCourse" onclick="showDeleteCoursePopup(<?php echo $selBatchRow['batch_id']; ?>)" class="exam-qs-btn btn-danger btn-sm">Delete</button>
</td>




                                            </tr>

                                        <?php }
                                    }
                                    else
                                    { ?>
                                        <tr>
                                        <td colspan="3">
                                            <h3 class="p-3">No Batch Found</h3>
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
        


<script>
let selectedCourseId = null;

// Show the delete popup for course
function showDeleteCoursePopup(courseId) {
    selectedCourseId = courseId; // Store the course ID
    document.getElementById('deleteCoursePopup').style.display = 'flex'; // Show delete popup
}

// Cancel delete operation for course
document.getElementById('cancelDeleteCourseBtn').addEventListener('click', function () {
    document.getElementById('deleteCoursePopup').style.display = 'none'; // Hide delete popup
    selectedCourseId = null; // Reset course ID
});

// Confirm delete operation for course
document.getElementById('confirmDeleteCourseBtn').addEventListener('click', function () {
    if (selectedCourseId) {
        // AJAX request to delete course
        fetch('query/deleteCourseExe.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: selectedCourseId }),
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('deleteCoursePopup').style.display = 'none'; // Hide delete popup
            if (data.res === "success") {
                showCourseMessage("Course deleted successfully!");
                location.reload(); // Reload the page
            } else {
                showCourseMessage("Failed to delete the course. Please try again.");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showCourseMessage("An error occurred. Please try again.");
        });
    }
});

// Show message popup for course
function showCourseMessage(message) {
    document.getElementById('messageCourseText').textContent = message;
    document.getElementById('messageCoursePopup').style.display = 'flex';
}

// Close message popup for course
document.getElementById('closeCourseMessageBtn').addEventListener('click', function () {
    document.getElementById('messageCoursePopup').style.display = 'none';
});
</script>

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
