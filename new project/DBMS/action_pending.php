<?php
session_start();
include('db.php');  // Include the database connection

// Handle form submission and insert entry into the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_entry'])) {
    $entry = htmlspecialchars($_POST['entry']); // Sanitize input

    // Insert entry into the database
    $stmt = $conn->prepare("INSERT INTO action_pending_entries (entry) VALUES (?)");
    $stmt->bind_param("s", $entry);
    $stmt->execute();
    $stmt->close();
}

// Fetch entries from the database
$sql = "SELECT * FROM action_pending_entries ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Action Pending Section</title>
    <style>
        /* Keep your existing CSS here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fb;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Header Section Above the Container */
        .header-section {
            width: 90%; /* Set the width to 90% of the screen */
            max-width: 1000px;
            margin-top: 20px;
            text-align: center;
        }

        .header-section h2 {
            color: #007bff;
        }

        .header-buttons {
            margin-top: 10px;
        }

        .header-buttons button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-left: 10px;
        }

        .header-buttons button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Main Content Container */
        .container {
            width: 90%; /* Set the width to 90% of the screen */
            height: 8cm; /* Fixed height of 8 cm */
            background-color: #fff;
            margin-top: 50px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            overflow: auto; /* Enable both vertical and horizontal scrollbars if content overflows */
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

        .form-container {
            display: none;
            margin-top: 20px;
        }

        .form-container.active {
            display: block;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .return-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-left: 10px; /* Optional: Space between buttons */
        }

        .return-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
    <script>
        // JavaScript to toggle form visibility
        function toggleForm() {
            const form = document.querySelector('.form-container');
            form.classList.toggle('active');
        }

        // JavaScript function for the "Return" button
        function returnToHome() {
            window.location.href = 'home.php'; // Redirect to home.php
        }
    </script>
</head>
<body>

    <!-- Header Section Above the Container -->
    <div class="header-section">
        <h2>Action Pending Section</h2>
        <div class="header-buttons">
            <button class="return-btn" onclick="returnToHome()">Return</button>
            <button class="new-entry-btn" onclick="toggleForm()">New Entry</button>
        </div>
    </div>

    <!-- Main Content Container -->
    <div class="container">
        
        <!-- New Entry Form -->
        <div class="form-container">
            <form method="POST" action="">
                <input type="text" name="entry" placeholder="Enter your text here..." required>
                <button type="submit" name="new_entry">Submit</button>
            </form>
        </div>

        <!-- Display Entries -->
        <div class="entries">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="entry"><?php echo $row['entry']; ?></div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No entries yet. Click "New Entry" to add one.</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>
