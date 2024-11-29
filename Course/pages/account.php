<div class="app-main__outer">
<div class="app-main__inner">
<h1>Your Account Information</h1>
<?php
    echo "<table class='styled-table'>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Course</th>
                    <th>Batch Number</th>
                    <th>Batch Start</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{$selExmneeData['student_fullname']}</td>
                    <td>{$selExmneeData['student_gender']}</td>
                    <td>{$selExmneeData['student_birthdate']}</td>
                    <td>{$selExmneeData['student_email']}</td>
                    <td>{$selExmneeData['student_phone_number']}</td>
                    <td>{$selExmneeData['course_name']}</td>
                    <td>{$selBatch['batch_number']}</td>
                    <td>{$selBatch['start_date']}</td>
                    <td>{$selExmneeData['student_status']}</td>
                </tr>
            </tbody>
        </table>";
?>
</div>
</div>
<style>
    .styled-table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    text-align: left;
    background-color: #f9f9f9;
}

.styled-table th, .styled-table td {
    border: 1px solid #ddd;
    padding: 12px 15px;
}

.styled-table th {
    background-color: #4CAF50;
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