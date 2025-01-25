<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>User Profile Update</h2>
    <form action="hirorupdation.php" method="post">
        <!-- Update Password -->
        <label for="old_password">Old Password:</label>
        <input type="password" name="old_password" >
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" >
        <button name="update" value="password">Update Password</button>
        
        <!-- Update Full Name -->
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname">
        <button name="update" value="fullname">Update Full Name</button>
        
        <!-- Update Mobile -->
        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile">
        <button name="update" value="mobile">Update Mobile</button>
        
        <!-- Update Email -->
        <label for="email">Email:</label>
        <input type="email" name="email">
        <button name="update" value="email">Update Email</button>
        
        <!-- Update Age -->
        <label for="age">Age:</label>
        <input type="number" name="age">
        <button name="update" value="age">Update Age</button>
        
        
        <!-- Update Address -->
        <label for="street">(Address)Street:</label>
        <input type="text" name="street"><br>
        <label for="area">(Address)Area:</label>
        <input type="text" name="area"><br>
        <label for="city">(Address)City:</label>
        <input type="text" name="city">
        <button name="update" value="city">Update Address</button>
        <!-- <input type="submit" name=submit> -->
    </form>

<?php
session_start(); // Start the session
if (isset($_SESSION['variable'])) {
    $us = $_SESSION['variable'];
        // Use $receivedData in your code
}
$host = "localhost";
        $username = "root";
        $password = "2004";
        $database = "project";
        // Create a database connection
        $connection = new mysqli($host, $username, $password, $database);
$updateField=$_POST['update'];
echo $updateField;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($updateField==="password" ){
        $oldpassword=$_POST['old_password'];
        $newpassword=$_POST['new_password'];
        $query = "SELECT password FROM hiror_data1 WHERE username = '$us'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Compare the old password with the stored password in the database
            $storedPassword = $row["password"];

            if ($oldpassword === $storedPassword) {
                // Passwords match, update the password in the database with the new password
                //$hashedPassword = password_hash($newpassword, PASSWORD_BCRYPT);
                // Update the user's password in the database
                $updateQuery = "UPDATE hiror_data1 SET password = '$newpassword' WHERE username = '$us'";
                mysqli_query($connection, $updateQuery);
                echo "Password updated successfully!";
            } else {
                // Old password doesn't match, show an alert
                echo "<script>alert('Old password does not match. Please try again.');</script>";
                exit();
            }
        } else {
            // User not found in the database, handle the error
            echo "<script>alert('User not found in the database. Please try again.');</script>";
            
        }
        header("Location: hirordashboard.php");
        exit();
    }
    
     elseif ($updateField === "fullname") {
        // Handle full name update
        $fullname=$_POST['fullname'];
        $updateQuery = "UPDATE hiror_data1 SET fullname = '$fullname' WHERE username = '$us'";
        mysqli_query($connection, $updateQuery);
        sleep(5);
        header("Location: hirordashboard.php");
        exit();
    }

     elseif ($updateField === "mobile") {
        // Handle mobile update
        $mobile=$_POST['mobile'];
         $updateQuery = "UPDATE hiror_data1 SET mobile = '$mobile' WHERE username = '$us'";
         mysqli_query($connection, $updateQuery);
         sleep(5);
         header("Location: hirordashboard.php");
         exit();
        // $updateQuery = "UPDATE hiror_data1 SET password = '$newpassword' WHERE username = '$us'";
        // mysqli_query($connection, $updateQuery);
    } elseif ($updateField === "email") {
        // Handle email update
        $email=$_POST['email'];
         $updateQuery = "UPDATE hiror_data1 SET email = '$email' WHERE username = '$us'";
         mysqli_query($connection, $updateQuery);
         sleep(5);
         header("Location: hirordashboard.php");
         exit();
        // $updateQuery = "UPDATE hiror_data1 SET password = '$newpassword' WHERE username = '$us'";
        // mysqli_query($connection, $updateQuery);
    } elseif ($updateField === "age") {
        // Handle age update
        $age=$_POST['age'];
         $updateQuery = "UPDATE hiror_data1 SET age = '$age' WHERE username = '$us'";
         mysqli_query($connection, $updateQuery);
         sleep(5);
         header("Location: hirordashboard.php");
         exit();
        // $updateQuery = "UPDATE hiror_data1 SET password = '$newpassword' WHERE username = '$us'";
        // mysqli_query($connection, $updateQuery);
    } elseif ($updateField === "city") {
        // Handle city update
        $street=$_POST['street'];
        $area=$_POST['area'];
        $city=$_POST['city'];
        $k=" ";
         $updateQuery = "UPDATE hiror_data1 SET address = '$street$k$area$k$city' WHERE username = '$us'";
         $updateQuery2 = "UPDATE hiror_data1 SET city = '$city' WHERE username = '$us'";

         mysqli_query($connection, $updateQuery);
         mysqli_query($connection, $updateQuery2);
         sleep(5);
         header("Location: hirordashboard.php");
         exit();
        // $updateQuery = "UPDATE hiror_data1 SET password = '$newpassword' WHERE username = '$us'";
        // mysqli_query($connection, $updateQuery);
    }
    
    // Redirect the user back to the form or another page as needed
}
?>

</body>
</html>