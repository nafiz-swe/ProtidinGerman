<?php
if (isset($_GET['id'])) {
    $batchId = $_GET['id'];

    switch ($batchId) {
        case 'A1':
            echo "<h2>Deutsch A1 Course Details</h2>";
            echo "<p>A1 লেভেলের কোর্স ডিটেলস এখানে দেখানো হবে।</p>";
            break;

        case 'A2':
            echo "<h2>Deutsch A2 Course Details</h2>";
            echo "<p>A2 লেভেলের কোর্স ডিটেলস এখানে দেখানো হবে।</p>";
            break;

        case 'B1':
            echo "<h2>Deutsch B1 Course Details</h2>";
            echo "<p>B1 লেভেলের কোর্স ডিটেলস এখানে দেখানো হবে।</p>";
            break;

        case 'GermanExpress':
            echo "<h2>Deutsch A1 A2 & B1 Course Details</h2>";
            echo "<p>A1 A2 & B1 লেভেলের কোর্স ডিটেলস এখানে দেখানো হবে।</p>";
            break;
            
        default:
            echo "<h2>কোর্স ডিটেলস পাওয়া যায়নি</h2>";
            break;
    }
} else {
    echo "<h2>কোনো কোর্স সিলেক্ট করা হয়নি</h2>";
}
?>
