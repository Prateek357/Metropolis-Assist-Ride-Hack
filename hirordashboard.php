<!DOCTYPE html>
<html>
<head>
    <title>Display User Data</title>
    <link rel="stylesheet" type="text/css" href="hirordashboard.css">
</head>
<body>
    <h1><u>Employer Dashboard</u></h1>
    <br><br>
    <div class="data-container">
        <?php
        // Replace with your database connection details
        $host = "localhost";
        $username = "root";
        $password = "2004";
        $database = "project";

        // Create a database connection
        $conn = new mysqli($host, $username, $password, $database);
        session_start(); // Start the session
        $us = $_SESSION['variable2'];
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the "Update" or "Hire" button is clicked
        

        // Retrieve data from the hiror_data1 table
        $sql = "SELECT username, password, fullname, address, mobile, email, age, city FROM hiror_data1 where username='$us'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data in a table
            echo "<form method='post' >";
            echo "<table>";
            echo "<tr><th>Username</th><th>Password</th><th>Full Name</th><th>Address</th><th>Mobile</th><th>Email</th><th>Age</th><th>City</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "<td>" . $row["fullname"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["mobile"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>" . $row["city"] . "</td>";
                // Add buttons for update and hire
                echo "<td><br>
                <button type='submit' name='update' value='" . $row["username"] . "'>Update</button><br><br>
                <button type='submit' name='hire' value='" . $row["username"] . "'>Hire</button><br><br>
                <button type='submit' name='delete_profile'>Delete Profile</button><br><br>
                </td> ";
                echo "</tr>";
            }
            echo "</table>";
            echo "</form>";
            if (isset($_POST['update'])) {
                // Handle the update button click action here
                // You can add the logic to update user data
                    session_start(); // Start the session
                    $_SESSION['variable'] = $us;
                    header("Location: hirorupdation.php");
                    //exit();
            } 
            elseif (isset($_POST['hire'])) {
                // Handle the hire button click action here
                // You can add the logic to hire the user
                session_start(); // Start the session
                $_SESSION['variable'] = $us;
                header("Location: category_input.php");
                exit();
            }
            elseif (isset($_POST['delete_profile'])) {
                // Handle the delete profile button click action here
                // You can add the logic to delete the user profile
                session_start(); // Start the session
                $_SESSION['variable'] = $us;
                header("Location: deletehiror.php");
                exit();
            }
            
        } else {
            echo "No data found.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
