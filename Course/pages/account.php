<?php
if (isset($_GET['section'])) {
    $section = $_GET['section'];

    switch ($section) {
        case 'sAccont':
            echo "<h2>Join Class</h2>";
            echo "<p>ক্লাসে যোগদানের তথ্য এখানে দেখানো হবে।</p>";
            break;


        default:
            echo "<h2>তথ্য পাওয়া যায়নি</h2>";
            break;
    }
} else {
    echo "<h2>কোনো ক্লাস সেকশন সিলেক্ট করা হয়নি</h2>";
}
?>




