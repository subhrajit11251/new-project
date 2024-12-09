<?php
session_start();
include('../db.php');  // Make sure this path is correct

// Initialize error variable
$error = ''; // Initialize the error variable here

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the user exists in the database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // User found, fetch the user data
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user['id'];  // Store user ID in session
            $_SESSION['username'] = $user['username'];  // Store username in session

            // Redirect to the home or main page (main folder)
            header("Location: ../home.php"); // Adjusted path to go back to the main folder
            exit();
        } else {
            // Invalid login credentials (incorrect password)
            $error = "Invalid username or password.";
        }
    } else {
        // User not found
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../assets/logo.png" type="image/x-icon">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #0d1117; /* Dark background */
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container for the login form */
        .login-container {
            background: rgba(255, 255, 255, 0.8); /* Semi-transparent white */
            padding: 3rem;
            border-radius: 8px;
            width: 40%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Heading for the login form */
        .login-container h1 {
            font-size: 2.5rem;
            color: #007bff; /* Blue color for heading */
            margin-bottom: 1.5rem;
        }

        /* Form fields */
        .login-container input {
            width: 100%;
            padding: 1rem;
            margin: 1rem 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        /* Login Button */
        .login-container button {
            padding: 1rem 2rem;
            background-color: #007bff;
            color: white;
            font-size: 1.2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 123, 255, 0.4);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .login-container button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
            box-shadow: 0 6px 8px rgba(0, 86, 179, 0.5);
        }

        /* Error message */
        .error-message {
            color: #ff4d4d; /* Red color for error */
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        
        <!-- Display error message if login fails -->
        <?php if (!empty($error)): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" required><br>

            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required><br>

            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
