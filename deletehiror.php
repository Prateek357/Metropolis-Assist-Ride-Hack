<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Deletion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin-top: 50px;
        }

        .message {
            font-size: 18px;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .redirect-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    if (isset($_SESSION['variable'])) {
        $us = $_SESSION['variable'];

        // Replace with your database connection details
        $host = "localhost";
        $username = "root";
        $password = "2004";
        $database = "project";

        // Create a database connection
        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Delete data from worker_data3
        $sql_delete_hiror_data1 = "DELETE FROM hiror_data1 WHERE username = '$us'";
        $result_delete_hiror_data1 = $conn->query($sql_delete_hiror_data1);

        

        if ($result_delete_hiror_data1) {
            echo "<div class='message'>Profile deleted successfully.</div>";
        } else {
            echo "<div class='message'>Error deleting data from worker_data1: " . $conn->error . "</div>";
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "<div class='message'>Username not found in the session.</div>";
    }
    ?>

    <a href="http://localhost/vedant/Project/hp/index.html" class="redirect-button">Go to Home Page</a>
</body>
</html>
