<?php
// Include the database connection file
include '../db.php';

if (isset($_POST['register'])) {
    // Get the data from the registration form
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if username already exists
    if ($result->num_rows > 0) {
        die("Username already exists. Please choose a different username.");
    }

    // Prepare SQL query to insert the new user into the database
    $query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    
    // Default role is 'user', it can be changed later
    $role = 'user';
    
    // Bind parameters and execute the query
    $stmt->bind_param("sss", $username, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "Registration successful! You can now <a href='../login/login.php'>login</a>.";
    } else {
        echo "There was an error with your registration. Please try again.";
    }
}
?>
