<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_name = $_POST['employee_name'];
    $leave_type = $_POST['leave_type'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $reason = $_POST['reason'];

    $query = "INSERT INTO leaveapplications (employee_name, leave_type, start_date, end_date, reason) 
              VALUES ('$employee_name', '$leave_type', '$start_date', '$end_date', '$reason')";

    if (mysqli_query($conn, $query)) {
        header('Location: leave.php?success=1');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
