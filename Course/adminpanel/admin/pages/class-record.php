<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ক্লাস রেকর্ড সাবমিট করুন</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>ক্লাস রেকর্ড আপলোড ফর্ম</h2>
    <form id="addClassRecordFrm" method="POST" enctype="multipart/form-data">
        <div>
            <label for="batch_number">ব্যাচ নির্বাচন করুন:</label>
            <select class="form-control" name="batch_id">
    <option value="0">Select batch</option>
    <?php 
    $selBatch = $conn->query("SELECT * FROM batch_tbl ORDER BY batch_id DESC");
    if ($selBatch->rowCount() > 0) {
        while ($selBatchRow = $selBatch->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php echo $selBatchRow['batch_id']; ?>">
                <?php echo $selBatchRow['batch_number']; ?>
            </option>
        <?php }
    } else { ?>
        <option value="0">No Batch Found</option>
    <?php } ?>
</select>


        </div>
        
        <div>
            <label for="class_topics">টপিকস:</label>
            <input type="text" name="class_topics" id="class_topics" required>
        </div>

        <div>
            <label for="class_date">ক্লাস তারিখ:</label>
            <input type="date" name="class_date" id="class_date" required>
        </div>

        <div>
            <label for="record_video">ভিডিও আপলোড করুন:</label>
            <input type="file" name="record_video" id="record_video" accept="video/*" required>
        </div>

        <button type="submit">সাবমিট করুন</button>
    </form>

</body>
</html>


<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    padding: 20px;
}

h2 {
    text-align: center;
    color: #4CAF50;
    margin-bottom: 30px;
}

form {
    width: 60%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

form div {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

select, input[type="text"], input[type="date"], input[type="file"], button {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

input[type="file"] {
    padding: 5px;
    background-color: #f9f9f9;
}

</style>