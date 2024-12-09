<?php
include('../db.php');

if (isset($_GET['id'])) {
    $leave_id = $_GET['id'];

    // Role check logic can be added here
    $query = "UPDATE leaveapplications SET status='Approved' WHERE id=$leave_id";

    if (mysqli_query($conn, $query)) {
        header('Location: leave.php?approved=1');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
