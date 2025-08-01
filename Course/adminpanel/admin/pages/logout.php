<?php
session_start();
session_destroy(); // সেশন ধ্বংস করা

// Root ফোল্ডারের index.php পেজে রিডাইরেক্ট করুন
header("Location: /index.php"); 
exit();
?>
