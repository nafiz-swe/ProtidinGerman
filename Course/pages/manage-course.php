<link rel="stylesheet" type="text/css" href="css/mycss.css">
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
                                <th class="text-left pl-4">Class Start Date</th>
                                <th class="text-center" width="20%">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $selBatch = $conn->query("SELECT * FROM batch_tbl ORDER BY batch_id DESC ");
                                    if($selBatch->rowCount() > 0)
                                    {
                                        while ($selBatchRow = $selBatch->fetch(PDO::FETCH_ASSOC)) { 
                                            $formattedDate = date("d F Y", strtotime($selBatchRow['start_date']));
                                ?>
                                <tr>
                                    <td class="pl-4">
                                        <?php echo $selBatchRow['batch_number']; ?>
                                    </td>
                                    <td class="pl-4">
                                        <?php echo $formattedDate; ?>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" data-toggle="modal" data-target="#updateCourse-<?php echo $selBatchRow['batch_id']; ?>"  class="btn btn-primary btn-sm">Update</button></br></br>
                                        <button type="button" id="deleteCourse" data-id='<?php echo $selBatchRow['batch_id']; ?>'  class="exam-qs-btn btn-danger btn-sm">Delete</button>
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
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
