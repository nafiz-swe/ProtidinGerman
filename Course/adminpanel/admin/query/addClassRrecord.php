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

