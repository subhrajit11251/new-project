<?php
// Include the database connection file
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        /* Container for the registration form */
        .register-container {
            background: rgba(255, 255, 255, 0.8); /* Semi-transparent white */
            padding: 3rem;
            border-radius: 8px;
            width: 40%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Heading for the registration form */
        .register-container h1 {
            font-size: 2.5rem;
            color: #007bff; /* Blue color for heading */
            margin-bottom: 1.5rem;
        }

        /* Form fields */
        .register-container input {
            width: 100%;
            padding: 1rem;
            margin: 1rem 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        /* Register Button */
        .register-container button {
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

        .register-container button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
            box-shadow: 0 6px 8px rgba(0, 86, 179, 0.5);
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        <form action="register_action.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" required><br>

            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required><br>

            <label for="confirm_password">Confirm Password:</label><br>
            <input type="password" name="confirm_password" id="confirm_password" required><br>

            <button type="submit" name="register">Submit</button>
        </form>
    </div>
</body>
</html>
