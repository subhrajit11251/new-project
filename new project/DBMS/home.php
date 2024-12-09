<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="icon" href="assets/logo.png" type="image/x-icon">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fb;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styling */
        header {
            background-color: #007bff;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            color: white;
        }

        header h1 {
            font-size: 3rem;
        }

        .logout-btn-container {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .logout-btn {
            background: white;
            color: #007bff;
            border: 2px solid #007bff;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: #007bff;
            color: white;
        }

        /* Navbar Styling */
        nav {
            background-color: #fff;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #007bff;
            font-size: 1.2rem;
            padding: 10px 15px;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #007bff;
            color: white;
        }

        /* Main Section Styling */
        .main-section {
            flex: 1;
            width: 80%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }

        /* Hero Section for Slider */
        .hero {
            position: relative;
            width: 100%;
            height: 400px;  /* Set a fixed height for the slider */
            overflow: hidden;
            border-radius: 10px;
        }

        .hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .hero img.active {
            opacity: 1;
        }

        /* Footer Styling */
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1>Coast Guard Store Depot Porbandar</h1>
        <div class="logout-btn-container">
            <form action="logout.php" method="POST" style="margin: 0;">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </header>

    <!-- Navbar Section -->
    <nav>
        <a href="eric.php"><button class="btn">ERIC</button></a>
        <a href="action_pending.php"><button class="btn">Action Pending</button></a>
        <a href="divisional_record_sheet.php"><button class="btn">Divisional Record Sheet</button></a>
        <a href="leave/leave.php"><button class="btn">Leave</button></a>
    </nav>

    <!-- Main Content Section -->
    <div class="main-section">
        <!-- Hero Section -->
        <div class="hero">
            <img src="assets/14.jpg" alt="Slide 1" class="active">
            <img src="assets/12.jpg" alt="Slide 2">
            <img src="assets/16.jpg" alt="Slide 3">
            <img src="assets/17.jpg" alt="Slide 4">
            <img src="assets/18.jpg" alt="Slide 5">
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>Ready Relevant and Responsive</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
