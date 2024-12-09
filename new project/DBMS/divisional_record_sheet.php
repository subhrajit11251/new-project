<?php
// divisional_record_sheet.php
include('db.php'); // include the DB connection

// Fetch records from the database to display
$sql = "SELECT * FROM form"; // Modify this query based on the data you need
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisional Record Sheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fb;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Heading and New Entry button styling */
        .header-section {
            width: 90%; /* Set the width to 90% of the screen */
            max-width: 1000px;
            margin-top: 20px;
            text-align: center;
        }

        .header-section h2 {
            color: #007bff;
        }

        .new-entry-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .new-entry-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .container {
            width: 90%; /* Set the width to 90% of the screen */
            max-width: 1000px; /* Optional: limit the max width */
            margin-top: 50px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            overflow: hidden; /* Prevent extra scrollbars for the container itself */
        }

        .entries {
            margin: 20px 0;
            text-align: left;
            color: #555;
        }

        .entry {
            background-color: #f9f9f9;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            min-width: 800px; /* Ensure the table is wide enough for horizontal scrolling */
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .print-btn {
            background-color: #28a745; /* Green color for print button */
        }

        .print-btn:hover {
            background-color: #218838;
        }

        .edit-btn {
            background-color: #ffc107; /* Yellow color for edit button */
        }

        .edit-btn:hover {
            background-color: #e0a800;
        }

        .scrollable-table {
            max-height: 400px; /* Adjust as needed */
            overflow-y: scroll; /* Enable vertical scroll */
        }
    </style>
    <script>
        function printRecord(recordId) {
            var printWindow = window.open('', '', 'width=800,height=600');
            printWindow.document.write('<html><head><title>Print Record</title></head><body>');
            printWindow.document.write('<h3>Record Details</h3>');
            printWindow.document.write(document.getElementById('record-' + recordId).innerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</head>
<body>
    <!-- Header Section Above the Container -->
    <div class="header-section">
        <h2>Divisional Record Sheet</h2>
        <div class="header-buttons">
            <button onclick="location.href='home.php'">Return</button>
            <button onclick="location.href='form.php'">New Entry</button>
        </div>
    </div>

    <!-- Main Content Container -->
    <div class="container">
        <div class="scrollable-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Rank</th>
                        <th>No</th>
                        <th>Date Joined Service</th>
                        <th>Identity Card No</th>
                        <th>Pay Book No</th>
                        <th>No of GCBs</th>
                        <th>Date of Birth</th>
                        <th>Subscription to GPF</th>
                        <th>Ration</th>
                        <th>Date of Seniority</th>
                        <th>Next Due</th>
                        <th>Ships Data Joined Ship</th>
                        <th>Previous Ship/Estb</th>
                        <th>Watch</th>
                        <th>Spl Duty</th>
                        <th>Marital Status</th>
                        <th>No of Children</th>
                        <th>Class Children Studying</th>
                        <th>Next of Kin</th>
                        <th>Next of Kin Address</th>
                        <th>Leave Station</th>
                        <th>Phone</th>
                        <th>Nearest Military Hospital</th>
                        <th>Nearest Govt Hospital</th>
                        <th>Permanent Address</th>
                        <th>Nearest Police Station</th>
                        <th>Nearest Telegraphic Office</th>
                        <th>Nearest Rly Station</th>
                        <th>Leave Availed Current Year</th>
                        <th>Details of Loan/Advance</th>
                        <th>Date Due for Promotion</th>
                        <th>Date of Qualifying Higher Rank Exam</th>
                        <th>Specialist Q</th>
                        <th>Swimming</th>
                        <th>Sports</th>
                        <th>Hobbies</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through each record and display it in the table
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr id='record-{$row['id']}'>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['rank']}</td>";
                            echo "<td>{$row['no']}</td>";
                            echo "<td>{$row['date_joined_service']}</td>";
                            echo "<td>{$row['identity_card_no']}</td>";
                            echo "<td>{$row['pay_book_no']}</td>";
                            echo "<td>{$row['no_of_gcbs']}</td>";
                            echo "<td>{$row['date_of_birth']}</td>";
                            echo "<td>{$row['subscription_to_gpf']}</td>";
                            echo "<td>{$row['ration']}</td>";
                            echo "<td>{$row['date_of_seniority']}</td>";
                            echo "<td>{$row['next_due']}</td>";
                            echo "<td>{$row['ships_data_joined_ship']}</td>";
                            echo "<td>{$row['previous_ship_estb']}</td>";
                            echo "<td>{$row['watch']}</td>";
                            echo "<td>{$row['spl_duty']}</td>";
                            echo "<td>{$row['marital_status']}</td>";
                            echo "<td>{$row['no_of_children']}</td>";
                            echo "<td>{$row['class_children_studying']}</td>";
                            echo "<td>{$row['next_of_kin']}</td>";
                            echo "<td>{$row['next_of_kin_address']}</td>";
                            echo "<td>{$row['leave_station']}</td>";
                            echo "<td>{$row['phone']}</td>";
                            echo "<td>{$row['nearest_military_hospital']}</td>";
                            echo "<td>{$row['nearest_govt_hospital']}</td>";
                            echo "<td>{$row['permanent_address']}</td>";
                            echo "<td>{$row['nearest_police_station']}</td>";
                            echo "<td>{$row['nearest_telegraphic_office']}</td>";
                            echo "<td>{$row['nearest_rly_station']}</td>";
                            echo "<td>{$row['leave_availed_current_year']}</td>";
                            echo "<td>{$row['details_of_loan_advance']}</td>";
                            echo "<td>{$row['date_due_for_promotion']}</td>";
                            echo "<td>{$row['date_of_qualifying_higher_rank_exam']}</td>";
                            echo "<td>{$row['specialist_q']}</td>";
                            echo "<td>{$row['swimming']}</td>";
                            echo "<td>{$row['sports']}</td>";
                            echo "<td>{$row['hobbies']}</td>";
                            // Edit and print buttons
                            echo "<td>
                                    <a href='form.php?id={$row['id']}'><button class='edit-btn'>Edit</button></a>
                                    <button class='print-btn' onclick='printRecord({$row['id']})'>Print</button>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='35'>No records found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
