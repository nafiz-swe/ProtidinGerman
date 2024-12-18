<div class="app-main__outer">
<div class="app-main__inner">
    <div class="head-info">
        <h2>Your Account Information</h2>
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