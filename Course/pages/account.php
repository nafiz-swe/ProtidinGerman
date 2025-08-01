<div class="app-main__outer mt-5">
    <div id="refreshData">
<div class="app-main__inner">
    <div class="head-info">
        <h3 class="text-white text-center mb-3">Your Account Information</h3>
    </div>
<?php
echo "<table class='styled-table'>
<thead>
    <tr>
        <th>Heading</th>
        <th>Data</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>Full Name</td>
        <td>{$selExmneeData['student_fullname']}</td>
    </tr>
    <tr>
        <td>Gender</td>
        <td>{$selExmneeData['student_gender']}</td>
    </tr>
    <tr>
        <td>Birthdate</td>
        <td>{$selExmneeData['student_birthdate']}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{$selExmneeData['student_email']}</td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td>{$selExmneeData['student_phone_number']}</td>
    </tr>
    <tr>
        <td>Course</td>
        <td>{$selExmneeData['course_name']}</td>
    </tr>
    <tr>
        <td>Batch Number</td>
        <td>{$selBatch['batch_number']}</td>
    </tr>
    <tr>
        <td>Batch Start</td>
        <td>{$selBatch['start_date']}</td>
    </tr>
    <tr>
        <td>Status</td>
        <td>{$selExmneeData['student_status']}</td>
    </tr>
</tbody>
</table>";

// Payment info show korar jonno

// Email niye query korchi latest payment er jonno
$studentEmail = $selExmneeData['student_email'];

$stmtPayment = $conn->prepare("SELECT payment_method, amount, proof_type, transaction_id, screenshot_path, submitted_at FROM course_payments WHERE email = :email ORDER BY id DESC LIMIT 1");
$stmtPayment->execute([':email' => $studentEmail]);
$paymentData = $stmtPayment->fetch(PDO::FETCH_ASSOC);

if ($paymentData) {
        echo "<div class=\"head-info\">
            <h3 class='text-white text-center mb-3'>Payment Details</h3>
        </div>

        <table class='styled-table'>
        <thead>

        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Payment Method</td>
            <td>" . htmlspecialchars($paymentData['payment_method']) . "</td>
        </tr>
        <tr>
            <td>Amount</td>
            <td>" . htmlspecialchars($paymentData['amount']) . "</td>
        </tr>
        <tr>
            <td>Proof Type</td>
            <td>" . htmlspecialchars($paymentData['proof_type']) . "</td>
        </tr>
        <tr>
            <td>Transaction ID</td>
            <td>" . htmlspecialchars($paymentData['transaction_id']) . "</td>
        </tr>
        <tr>
            <td>Payment Screenshot</td>
            <td>";

    if (!empty($paymentData['screenshot_path'])) {
        // Base URL detect korar jonno
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}/";
        $fileUrl = $baseUrl . htmlspecialchars($paymentData['screenshot_path']);

        // Allowed image extensions
        $ext = strtolower(pathinfo($fileUrl, PATHINFO_EXTENSION));
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];

        if (in_array($ext, $allowed_ext)) {
            echo '<a href="' . $fileUrl . '" target="_blank" title="Payment Screenshot">';
            echo '<img src="' . $fileUrl . '" alt="Payment Screenshot" style="width:120px; cursor:pointer; border-radius:4px;">';
            echo '</a>';
        } else {
            echo '<a href="' . $fileUrl . '" target="_blank">View File</a>';
        }
    } else {
        echo "No Screenshot Uploaded";
    }

    echo "</td></tr>";

    echo "<tr><td>Submitted At</td><td>" . htmlspecialchars($paymentData['submitted_at']) . "</td></tr>";
    
    echo "</tbody></table>";
} else {
    echo "<p>No payment information found.</p>";
}
?>
</div>
</div>

<style>
    .head-info h2 {
    font-size: 35px;
    text-align: center;
    margin: 0 auto 10px auto;
    padding: 20px;
    color: #fff;
}
.styled-table {
    width: 90%;
    border-collapse: collapse;
    margin: 20px auto 100px auto;
    font-size: 16px;
    text-align: left;
    background-color: #f9f9f9;
}

.styled-table th, .styled-table td {
    border: 1px solid #ddd;
    padding: 12px 15px;
}

.styled-table th {
    background-color: #7FBF4D;
    color: #fff;
    text-transform: uppercase;
    font-weight: bold;
}

.styled-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.styled-table tbody tr:hover {
    background-color: #f1f1f1;
}

.styled-table td {
    color: #333;
}

.styled-table th, .styled-table td {
    border: 1px solid #ddd;
    text-align: center;
}

/* Responsive design */
@media screen and (max-width: 768px) {
    .styled-table {
        font-size: 14px;
    }

    .styled-table th, .styled-table td {
        padding: 8px 10px;
    }
}
</style>