<?php include('../db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .return-btn {
            background-color: #3498db;
            color: #fff;
        }
        .new-entry-btn {
            background-color: #2ecc71;
            color: #fff;
        }
        .scrollable-container {
            max-height: 300px;
            overflow: auto;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .fixed-container {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Leave Application</h1>
        <div class="buttons">
            <button class="return-btn" onclick="window.location.href='../home.php'">Return</button>
            <button class="new-entry-btn" onclick="showForm()">New Entry</button>
        </div>
        <div class="scrollable-container" id="form-container" style="display: none;">
            <form id="leave-form" method="POST" action="submit_leave.php">
                <div class="form-group">
                    <label for="employee_name">Employee Name:</label>
                    <input type="text" id="employee_name" name="employee_name" required>
                </div>
                <div class="form-group">
                    <label for="leave_type">Leave Type:</label>
                    <input type="text" id="leave_type" name="leave_type" required>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" required>
                </div>
                <div class="form-group">
                    <label for="reason">Reason:</label>
                    <textarea id="reason" name="reason" rows="4" required></textarea>
                </div>
                <button type="submit" style="background-color: #e74c3c; color: white;">Submit</button>
            </form>
        </div>
        <div class="fixed-container">
            <h3>Leave Applications</h3>
            <?php
                $result = mysqli_query($conn, "SELECT * FROM leaveapplications ORDER BY id DESC");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div>";
                    echo "<p><strong>{$row['employee_name']}</strong> - {$row['leave_type']} ({$row['start_date']} to {$row['end_date']})</p>";
                    echo "<p>Reason: {$row['reason']}</p>";
                    echo "<button onclick=\"approveLeave({$row['id']})\">Approve</button>";
                    echo "</div><hr>";
                }
            ?>
        </div>
    </div>
    <script>
        function showForm() {
            document.getElementById('form-container').style.display = 'block';
        }

        function approveLeave(id) {
            window.location.href = 'approve_leave.php?id=' + id;
        }
    </script>
</body>
</html>
