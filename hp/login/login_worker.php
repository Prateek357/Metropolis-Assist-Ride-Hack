<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <form method="post" action="login_worker.php">
    <h2>Worker Login</h2>

    <label for="username">Username:</label>
    <input type="text" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Login">
    <br><br> 
    <div class="marquee-container">
    <marquee class="marquee" behavior="scroll" direction="left" loop="infinite" scrollamount="10">
    <img src= "image_processing20210217-23409-1sk6736.gif" width="22%" height="30%" />
    <img src= "edit_New_Multy_repair.gif" width="17%" height="35%" />
    <img src="image_processing20210217-28556-jr8y3a.gif" width="22%" height="30%"/>&nbsp;
    </marquee>
    <marquee class="marquee" behavior="scroll" direction="right" loop="infinite" scrollamount="10">
    <img src= "image_processing20210217-23409-1sk6736.gif" width="22%" height="30%" />
    <img src= "edit_New_Multy_repair.gif" width="17%" height="35%" />
    <img src="image_processing20210217-28556-jr8y3a.gif" width="22%" height="30%"/>&nbsp;
    </marquee>

    </form>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            width:45%;
            height:75%
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 50%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Establish database connection
    $mysqli = new mysqli("localhost", "root", "2004", "project");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Fetch user data from the database
    $query = "SELECT * FROM worker_data1 WHERE username = '$username' AND password = '$password'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        // Redirect to a success page if credentials are correct
        session_start(); // Start the session
        $_SESSION['variable2'] = $username;
        header("Location: http://localhost/vedant/Project/hp/signup/workerdashboard.php");
        exit();
    } else {
        echo '<script>alert("Invalid username or password");</script>';
    }

    // Close the database connection
 $mysqli->close();
}
?>



</body>
</html>
