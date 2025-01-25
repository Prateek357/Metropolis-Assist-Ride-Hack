<!DOCTYPE html>
<html>
<head>
    <title>Worker Details</title>
    <link rel="stylesheet" type="text/css" href="workerdashboard.css">
</head>
<body>
    <h1><u>Worker Dashboard</u></h1><br><br>
    <div class="data-container">
    <div class="center-container">
        <?php
        // Replace with your database connection details
        $host = "localhost";
        $username = "root";
        $password = "2004";
        $database = "project";
        $us;
    // Retrieve the data from the URL and decode it
        session_start(); // Start the session
        if (isset($_SESSION['variable2'])) {
        $us = $_SESSION['variable2'];
        // Create a database connection
        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve data from worker_data1 table
        $sql1 = "SELECT username, fullname, number, email, city, address, exp, age FROM worker_data1 WHERE username='$us'";
        $result1 = $conn->query($sql1);

        // Retrieve data from worker_data2 table
        $sql2 = "SELECT date_of_birth, years_of_experience, places_worked_earlier, skills, places_available_to_work_at, available_days_to_work, disabilities, min_wage, max_wage FROM worker_data2 WHERE username='$us'";
        $result2 = $conn->query($sql2);

        if ($result1->num_rows > 0 && $result2->num_rows > 0) {
            // Output data in a table
            echo "<form method='post'>";
            echo "<table>";
            echo "<tr><th>Username</th><th>Full Name</th><th>Number</th><th>Email</th><th>City</th><th>Address</th><th>Experience</th><th>Age</th><th>Date of Birth</th><th>Years of Experience</th><th>Places Worked Earlier</th><th>Skills</th><th>Places Available to Work At</th><th>Available Days to Work</th><th>Disabilities</th><th>Min Wage</th><th>Max Wage</th><th>Action</th></tr>";
            
            $row1 = $result1->fetch_assoc();
            $row2 = $result2->fetch_assoc();

            echo "<tr>";
            echo "<td>" . $row1["username"] . "</td>";
            echo "<td>" . $row1["fullname"] . "</td>";
            echo "<td>" . $row1["number"] . "</td>";
            echo "<td>" . $row1["email"] . "</td>";
            echo "<td>" . $row1["city"] . "</td>";
            echo "<td>" . $row1["address"] . "</td>";
            echo "<td>" . $row1["exp"] . "</td>";
            echo "<td>" . $row1["age"] . "</td>";
            
            echo "<td>" . $row2["date_of_birth"] . "</td>";
            echo "<td>" . $row2["years_of_experience"] . "</td>";
            echo "<td>" . $row2["places_worked_earlier"] . "</td>";
            echo "<td>" . $row2["skills"] . "</td>";
            echo "<td>" . $row2["places_available_to_work_at"] . "</td>";
            echo "<td>" . $row2["available_days_to_work"] . "</td>";
            echo "<td>" . $row2["disabilities"] . "</td>";
            echo "<td>" . $row2["min_wage"] . "</td>";
            echo "<td>" . $row2["max_wage"] . "</td>";
            
            // Add buttons for update and hire
            echo "<td><br>
                            <button type='submit' name='update' value='" . $row1["username"] . "'>Update</button><br><br>
                            <button type='submit' name='homepage'>Homepage</button><br><br>
                            <button type='submit' name='view_profiles'>View Profiles</button><br><br>
                            <button type='submit' name='delete_worker'>Delete Worker</button><br><br>
                            
                          </td>";
            echo "</tr>";
            echo "</tr>";

            echo "</table>";
            echo "</form>";
            
            if (isset($_POST['update'])) {
                // Handle the update button click action here
                // You can add the logic to update worker data
                session_start(); // Start the session
                $_SESSION['variable'] = $us;
                header("Location: workerupdation.php");
                exit();
            } elseif (isset($_POST['homepage'])) {
                // Handle the hire button click action here
                // You can add the logic to hire the worker
                
                header("Location: http://localhost/vedant/Project/hp/index.html");
                exit();
            }
            elseif (isset($_POST['view_profiles'])) {
                // Handle the hire button click action here
                // You can add the logic to hire the worker
                session_start(); // Start the session
                $_SESSION['variable'] = $us;
                header("Location: category_input.php");
                exit();
                
            }
            elseif (isset($_POST['delete_worker'])) {
                // Handle the hire button click action here
                // You can add the logic to hire the worker
                session_start(); // Start the session
                $_SESSION['variable2'] = $us;
                header("Location: deleteworker.php");
                exit();
                
            }
        } else {
            echo "No data found for the worker.";
        }

        $conn->close();
    }
        ?>
        </div>
    </div>
</body>
</html>
