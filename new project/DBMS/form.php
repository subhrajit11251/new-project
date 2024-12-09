<?php
// Include the database connection file
include('db.php');

// Initialize variables for form data
$name = $rank = $no = $date_joined_service = $identity_card_no = $pay_book_no = $no_of_gcbs = $date_of_birth = '';
$subscription_to_gpf = $ration = $date_of_seniority = $next_due = $ships_data_joined_ship = '';
$previous_ship_estb = $watch = $spl_duty = $marital_status = $no_of_children = $class_children_studying = '';
$next_of_kin = $next_of_kin_address = $leave_station = $phone = $nearest_military_hospital = '';
$nearest_govt_hospital = $permanent_address = $nearest_police_station = $nearest_telegraphic_office = '';
$nearest_rly_station = $leave_availed_current_year = $details_of_loan_advance = $date_due_for_promotion = '';
$date_of_qualifying_higher_rank_exam = $specialist_q = $swimming = $sports = $hobbies = '';

// Check if an 'id' is passed to edit an existing record
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch existing record data from the database
    $sql = "SELECT * FROM form WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Assign fetched values to variables
        $name = $row['name'];
        $rank = $row['rank'];
        $no = $row['no'];
        $date_joined_service = $row['date_joined_service'];
        $identity_card_no = $row['identity_card_no'];
        $pay_book_no = $row['pay_book_no'];
        $no_of_gcbs = $row['no_of_gcbs'];
        $date_of_birth = $row['date_of_birth'];
        $subscription_to_gpf = $row['subscription_to_gpf'];
        $ration = $row['ration'];
        $date_of_seniority = $row['date_of_seniority'];
        $next_due = $row['next_due'];
        $ships_data_joined_ship = $row['ships_data_joined_ship'];
        $previous_ship_estb = $row['previous_ship_estb'];
        $watch = $row['watch'];
        $spl_duty = $row['spl_duty'];
        $marital_status = $row['marital_status'];
        $no_of_children = $row['no_of_children'];
        $class_children_studying = $row['class_children_studying'];
        $next_of_kin = $row['next_of_kin'];
        $next_of_kin_address = $row['next_of_kin_address'];
        $leave_station = $row['leave_station'];
        $phone = $row['phone'];
        $nearest_military_hospital = $row['nearest_military_hospital'];
        $nearest_govt_hospital = $row['nearest_govt_hospital'];
        $permanent_address = $row['permanent_address'];
        $nearest_police_station = $row['nearest_police_station'];
        $nearest_telegraphic_office = $row['nearest_telegraphic_office'];
        $nearest_rly_station = $row['nearest_rly_station'];
        $leave_availed_current_year = $row['leave_availed_current_year'];
        $details_of_loan_advance = $row['details_of_loan_advance'];
        $date_due_for_promotion = $row['date_due_for_promotion'];
        $date_of_qualifying_higher_rank_exam = $row['date_of_qualifying_higher_rank_exam'];
        $specialist_q = $row['specialist_q'];
        $swimming = $row['swimming'];
        $sports = $row['sports'];
        $hobbies = $row['hobbies'];
    }
}

// Handle form submission for both insert and update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $rank = $_POST['rank'];
    $no = $_POST['no'];
    $date_joined_service = $_POST['date_joined_service'];
    $identity_card_no = $_POST['identity_card_no'];
    $pay_book_no = $_POST['pay_book_no'];
    $no_of_gcbs = $_POST['no_of_gcbs'];
    $date_of_birth = $_POST['date_of_birth'];
    $subscription_to_gpf = $_POST['subscription_to_gpf'];
    $ration = $_POST['ration'];
    $date_of_seniority = $_POST['date_of_seniority'];
    $next_due = $_POST['next_due'];
    $ships_data_joined_ship = $_POST['ships_data_joined_ship'];
    $previous_ship_estb = $_POST['previous_ship_estb'];
    $watch = $_POST['watch'];
    $spl_duty = $_POST['spl_duty'];
    $marital_status = $_POST['marital_status'];
    $no_of_children = $_POST['no_of_children'];
    $class_children_studying = $_POST['class_children_studying'];
    $next_of_kin = $_POST['next_of_kin'];
    $next_of_kin_address = $_POST['next_of_kin_address'];
    $leave_station = $_POST['leave_station'];
    $phone = $_POST['phone'];
    $nearest_military_hospital = $_POST['nearest_military_hospital'];
    $nearest_govt_hospital = $_POST['nearest_govt_hospital'];
    $permanent_address = $_POST['permanent_address'];
    $nearest_police_station = $_POST['nearest_police_station'];
    $nearest_telegraphic_office = $_POST['nearest_telegraphic_office'];
    $nearest_rly_station = $_POST['nearest_rly_station'];
    $leave_availed_current_year = $_POST['leave_availed_current_year'];
    $details_of_loan_advance = $_POST['details_of_loan_advance'];
    $date_due_for_promotion = $_POST['date_due_for_promotion'];
    $date_of_qualifying_higher_rank_exam = $_POST['date_of_qualifying_higher_rank_exam'];
    $specialist_q = $_POST['specialist_q'];
    $swimming = $_POST['swimming'];
    $sports = $_POST['sports'];
    $hobbies = $_POST['hobbies'];

    // Check if 'id' is set (for updating an existing record)
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Prepare the UPDATE SQL query
        $sql = "UPDATE form SET 
                name = ?, rank = ?, no = ?, date_joined_service = ?, identity_card_no = ?, pay_book_no = ?, 
                no_of_gcbs = ?, date_of_birth = ?, subscription_to_gpf = ?, ration = ?, date_of_seniority = ?, 
                next_due = ?, ships_data_joined_ship = ?, previous_ship_estb = ?, watch = ?, spl_duty = ?, 
                marital_status = ?, no_of_children = ?, class_children_studying = ?, next_of_kin = ?, 
                next_of_kin_address = ?, leave_station = ?, phone = ?, nearest_military_hospital = ?, 
                nearest_govt_hospital = ?, permanent_address = ?, nearest_police_station = ?, 
                nearest_telegraphic_office = ?, nearest_rly_station = ?, leave_availed_current_year = ?, 
                details_of_loan_advance = ?, date_due_for_promotion = ?, date_of_qualifying_higher_rank_exam = ?, 
                specialist_q = ?, swimming = ?, sports = ?, hobbies = ? WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssssssssssssssssssssssssssssi", 
            $name, $rank, $no, $date_joined_service, $identity_card_no, $pay_book_no, $no_of_gcbs, $date_of_birth, 
            $subscription_to_gpf, $ration, $date_of_seniority, $next_due, $ships_data_joined_ship, 
            $previous_ship_estb, $watch, $spl_duty, $marital_status, $no_of_children, $class_children_studying, 
            $next_of_kin, $next_of_kin_address, $leave_station, $phone, $nearest_military_hospital, 
            $nearest_govt_hospital, $permanent_address, $nearest_police_station, $nearest_telegraphic_office, 
            $nearest_rly_station, $leave_availed_current_year, $details_of_loan_advance, $date_due_for_promotion, 
            $date_of_qualifying_higher_rank_exam, $specialist_q, $swimming, $sports, $hobbies, $id);
        
        if ($stmt->execute()) {
            header('Location: divisional_record_sheet.php'); // Redirect to the divisional record sheet
            exit();
        }
    } else {
        // Prepare the INSERT SQL query for new records
        $sql = "INSERT INTO form (name, rank, no, date_joined_service, identity_card_no, pay_book_no, no_of_gcbs, 
                date_of_birth, subscription_to_gpf, ration, date_of_seniority, next_due, ships_data_joined_ship, 
                previous_ship_estb, watch, spl_duty, marital_status, no_of_children, class_children_studying, 
                next_of_kin, next_of_kin_address, leave_station, phone, nearest_military_hospital, 
                nearest_govt_hospital, permanent_address, nearest_police_station, nearest_telegraphic_office, 
                nearest_rly_station, leave_availed_current_year, details_of_loan_advance, date_due_for_promotion, 
                date_of_qualifying_higher_rank_exam, specialist_q, swimming, sports, hobbies) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssssssssssssssssssssssssssssssss", 
            $name, $rank, $no, $date_joined_service, $identity_card_no, $pay_book_no, $no_of_gcbs, $date_of_birth, 
            $subscription_to_gpf, $ration, $date_of_seniority, $next_due, $ships_data_joined_ship, 
            $previous_ship_estb, $watch, $spl_duty, $marital_status, $no_of_children, $class_children_studying, 
            $next_of_kin, $next_of_kin_address, $leave_station, $phone, $nearest_military_hospital, 
            $nearest_govt_hospital, $permanent_address, $nearest_police_station, $nearest_telegraphic_office, 
            $nearest_rly_station, $leave_availed_current_year, $details_of_loan_advance, $date_due_for_promotion, 
            $date_of_qualifying_higher_rank_exam, $specialist_q, $swimming, $sports, $hobbies);

        if ($stmt->execute()) {
            header('Location: divisional_record_sheet.php'); // Redirect to divisional record sheet after success
            exit();
        }
    }
}

?>

<!-- Form HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Form</title>
    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .form-container label {
            display: block;
            margin: 10px 0 5px;
        }
        .form-container input, .form-container select, .form-container textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .buttons-container {
            text-align: center;
        }
        .buttons-container input {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .buttons-container input:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <!-- Heading with inline CSS -->
    <h2 style="font-family: 'Algerian', serif; font-size: 40px; text-align: center; color: skyblue;">Divisional Record Sheet</h2>
    
    <form action="" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>

    <label for="rank">Rank:</label>
    <input type="text" id="rank" name="rank" value="<?php echo $rank; ?>" required>

    <label for="no">No:</label>
    <input type="text" id="no" name="no" value="<?php echo $no; ?>" required>

    <label for="date_joined_service">Date Joined Service:</label>
    <input type="date" id="date_joined_service" name="date_joined_service" value="<?php echo $date_joined_service; ?>" required>

    <label for="identity_card_no">Identity Card No:</label>
    <input type="text" id="identity_card_no" name="identity_card_no" value="<?php echo $identity_card_no; ?>" required>

    <label for="pay_book_no">Pay Book No:</label>
    <input type="text" id="pay_book_no" name="pay_book_no" value="<?php echo $pay_book_no; ?>" required>

    <label for="no_of_gcbs">No of GCBs:</label>
    <input type="text" id="no_of_gcbs" name="no_of_gcbs" value="<?php echo $no_of_gcbs; ?>" required>

    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth; ?>" required>

    <label for="subscription_to_gpf">Subscription to GPF:</label>
    <input type="text" id="subscription_to_gpf" name="subscription_to_gpf" value="<?php echo $subscription_to_gpf; ?>" required>

    <label for="ration">Ration:</label>
    <input type="text" id="ration" name="ration" value="<?php echo $ration; ?>" required>

    <label for="date_of_seniority">Date of Seniority:</label>
    <input type="date" id="date_of_seniority" name="date_of_seniority" value="<?php echo $date_of_seniority; ?>" required>

    <label for="next_due">Next Due:</label>
    <input type="text" id="next_due" name="next_due" value="<?php echo $next_due; ?>" required>

    <label for="ships_data_joined_ship">Ships Data Joined Ship:</label>
    <input type="text" id="ships_data_joined_ship" name="ships_data_joined_ship" value="<?php echo $ships_data_joined_ship; ?>" required>

    <label for="previous_ship_estb">Previous Ship Estb:</label>
    <input type="text" id="previous_ship_estb" name="previous_ship_estb" value="<?php echo $previous_ship_estb; ?>" required>

    <label for="watch">Watch:</label>
    <input type="text" id="watch" name="watch" value="<?php echo $watch; ?>" required>

    <label for="spl_duty">Special Duty:</label>
    <input type="text" id="spl_duty" name="spl_duty" value="<?php echo $spl_duty; ?>" required>

    <label for="marital_status">Marital Status:</label>
    <input type="text" id="marital_status" name="marital_status" value="<?php echo $marital_status; ?>" required>

    <label for="no_of_children">No of Children:</label>
    <input type="text" id="no_of_children" name="no_of_children" value="<?php echo $no_of_children; ?>" required>

    <label for="class_children_studying">Class Children Studying:</label>
    <input type="text" id="class_children_studying" name="class_children_studying" value="<?php echo $class_children_studying; ?>" required>

    <label for="next_of_kin">Next of Kin:</label>
    <input type="text" id="next_of_kin" name="next_of_kin" value="<?php echo $next_of_kin; ?>" required>

    <label for="next_of_kin_address">Next of Kin Address:</label>
    <input type="text" id="next_of_kin_address" name="next_of_kin_address" value="<?php echo $next_of_kin_address; ?>" required>

    <label for="leave_station">Leave Station:</label>
    <input type="text" id="leave_station" name="leave_station" value="<?php echo $leave_station; ?>" required>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required>

    <label for="nearest_military_hospital">Nearest Military Hospital:</label>
    <input type="text" id="nearest_military_hospital" name="nearest_military_hospital" value="<?php echo $nearest_military_hospital; ?>" required>

    <label for="nearest_govt_hospital">Nearest Govt. Hospital:</label>
    <input type="text" id="nearest_govt_hospital" name="nearest_govt_hospital" value="<?php echo $nearest_govt_hospital; ?>" required>

    <label for="permanent_address">Permanent Address:</label>
    <input type="text" id="permanent_address" name="permanent_address" value="<?php echo $permanent_address; ?>" required>

    <label for="nearest_police_station">Nearest Police Station:</label>
    <input type="text" id="nearest_police_station" name="nearest_police_station" value="<?php echo $nearest_police_station; ?>" required>

    <label for="nearest_telegraphic_office">Nearest Telegraphic Office:</label>
    <input type="text" id="nearest_telegraphic_office" name="nearest_telegraphic_office" value="<?php echo $nearest_telegraphic_office; ?>" required>

    <label for="nearest_rly_station">Nearest Railway Station:</label>
    <input type="text" id="nearest_rly_station" name="nearest_rly_station" value="<?php echo $nearest_rly_station; ?>" required>

    <label for="leave_availed_current_year">Leave Availed Current Year:</label>
    <input type="text" id="leave_availed_current_year" name="leave_availed_current_year" value="<?php echo $leave_availed_current_year; ?>" required>

    <label for="details_of_loan_advance">Details of Loan/Advance:</label>
    <input type="text" id="details_of_loan_advance" name="details_of_loan_advance" value="<?php echo $details_of_loan_advance; ?>" required>

    <label for="date_due_for_promotion">Date Due for Promotion:</label>
    <input type="date" id="date_due_for_promotion" name="date_due_for_promotion" value="<?php echo $date_due_for_promotion; ?>" required>

    <label for="date_of_qualifying_higher_rank_exam">Date of Qualifying Higher Rank Exam:</label>
    <input type="date" id="date_of_qualifying_higher_rank_exam" name="date_of_qualifying_higher_rank_exam" value="<?php echo $date_of_qualifying_higher_rank_exam; ?>" required>

    <label for="specialist_q">Specialist Qualifications:</label>
    <input type="text" id="specialist_q" name="specialist_q" value="<?php echo $specialist_q; ?>" required>

    <label for="swimming">Swimming:</label>
    <input type="text" id="swimming" name="swimming" value="<?php echo $swimming; ?>" required>

    <label for="sports">Sports:</label>
    <input type="text" id="sports" name="sports" value="<?php echo $sports; ?>" required>

    <label for="hobbies">Hobbies:</label>
    <input type="text" id="hobbies" name="hobbies" value="<?php echo $hobbies; ?>" required>

    <div class="buttons-container">
        <input type="submit" value="Submit">
        <a href="divisional_record_sheet.php"><input type="button" value="Return to List"></a>
    </div>
</form>

</div>

</body>
</html>
