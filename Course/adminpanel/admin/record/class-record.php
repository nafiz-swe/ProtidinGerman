<?php
include('../../../conn.php'); // ডাটাবেস কনফিগারেশন
// ফর্ম থেকে ডেটা সংগ্রহ
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $batch_id = isset($_POST['batch_id']) ? $_POST['batch_id'] : 0; // ফর্ম থেকে batch_id
    $class_topics = isset($_POST['class_topics']) ? $_POST['class_topics'] : '';
    $class_date = isset($_POST['class_date']) ? $_POST['class_date'] : '';

    if ($batch_id != 0) {
        // ভিডিও আপলোড এবং ডাটাবেস অপারেশন
        $video_name = $_FILES['record_video']['name'];
        $video_tmp_name = $_FILES['record_video']['tmp_name'];
        $video_error = $_FILES['record_video']['error'];

        if ($video_error === 0) {
            $video_ext = pathinfo($video_name, PATHINFO_EXTENSION); // ফাইল এক্সটেনশন
            $video_new_name = uniqid('', true) . '.' . $video_ext; // ইউনিক ভিডিও নাম
            $video_folder = '../../../record/' . $batch_id . '/'; // ব্যাচ আইডি অনুযায়ী ফোল্ডার
            $video_dest = $video_folder . $video_new_name;

            // ফোল্ডার তৈরি
            if (!file_exists($video_folder)) {
                mkdir($video_folder, 0777, true); // ব্যাচ আইডি ফোল্ডার তৈরি
            }

            if (move_uploaded_file($video_tmp_name, $video_dest)) {
                // ডাটাবেস ইনসার্ট
                $sql = "INSERT INTO class_record (batch_number, record_video, class_topics, class_date) 
                        VALUES (:batch_id, :record_video, :class_topics, :class_date)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':batch_id', $batch_id);
                $stmt->bindParam(':record_video', $video_new_name);
                $stmt->bindParam(':class_topics', $class_topics);
                $stmt->bindParam(':class_date', $class_date);

                if ($stmt->execute()) {
                    echo "রেকর্ড সফলভাবে সংরক্ষিত হয়েছে।";
                } else {
                    echo "ত্রুটি: ডাটাবেসে ডেটা সংরক্ষণ করা যায়নি।";
                }
            } else {
                echo "ভিডিও ফাইল আপলোডে সমস্যা হয়েছে!";
            }
        } else {
            echo "ভিডিও আপলোডে সমস্যা হয়েছে!";
        }
    } else {
        echo "দয়া করে একটি ব্যাচ নির্বাচন করুন।";
    }
} else {
    echo "অননুমোদিত অনুরোধ!";
}
?>


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
    <form action="class-record.php" method="POST" enctype="multipart/form-data">
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