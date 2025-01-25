<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Profile Update</title>
   <link rel="stylesheet" href="workerupdation.css">
</head>
<body>
    <h2>Worker Profile Update</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <!-- Update Password -->
        <label for="old_password">Old Password:</label>
        <input type="password" name="old_password">
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password">
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

        <!-- Update Date of Birth -->
        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob">
        <button name="update" value="dob">Update Date of Birth</button>

        <!-- Update Years of Experience -->
        <label for="exp">Years of Experience:</label>
        <input type="number" name="exp">
        <button name="update" value="exp">Update Years of Experience</button>

        <!-- Update Places Worked Earlier -->
        <label for="places_worked_earlier">Places Worked Earlier:</label>
        <input type="text" name="places_worked_earlier">
        <button name="update" value="places_worked_earlier">Update Places Worked Earlier</button>

        <!-- Update Skills -->
        <label for "skills">Skills:</label>
        <input type="text" name="skills">
        <button name="update" value="skills">Update Skills</button>

        <!-- Update Places Available to Work At -->
        <label for="places_available_to_work_at">Places Available to Work At:</label>
        <input type="text" name="places_available_to_work_at">
        <button name="update" value="places_available_to_work_at">Update Places Available to Work At</button>

        <!-- Update Available Days to Work -->
        <label for="available_days_to_work">Available Days to Work:</label>
        <input type="text" name="available_days_to_work">
        <button name="update" value="available_days_to_work">Update Available Days to Work</button>

        <!-- Update Disabilities -->
        <label for="disabilities">Disabilities:</label>
        <input type="text" name="disabilities">
        <button name="update" value="disabilities">Update Disabilities</button>

        <!-- Update Min Wage -->
        <label for="min_wage">Min Wage:</label>
        <input type="number" name="min_wage">
        <button name="update" value="min_wage">Update Min Wage</button>

        <!-- Update Max Wage -->
        <label for="max_wage">Max Wage:</label>
        <input type="number" name="max_wage">
        <button name="update" value="max_wage">Update Max Wage</button>

        <label for="street">(Address)Street:</label>
        <input type="text" name="street"><br>
        <label for="area">(Address)Area:</label>
        <input type="text" name="area"><br>
        <label for="city">(Address)City:</label>
        <input type="text" name="city">
        <button name="update" value="city">Update Address</button>
    </form>

<?php
$host = "localhost";
$username = "root";
$password = "2004";
$database = "project";
session_start(); // Start the session
if (isset($_SESSION['variable'])) {
    $us = $_SESSION['variable'];
        // Use $receivedData in your code
}
$updateField = $_POST['update'];
// Create a database connection
$connection = new mysqli($host, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    if ($updateField === "password") {
        // Handle password update
        $oldpassword = $_POST['old_password'];
        $newpassword = $_POST['new_password'];
        $query = "SELECT password FROM worker_data1 WHERE username = '$us'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            // Compare the old password with the stored password in the database
            $storedPassword = $row["password"];

            if ($oldpassword === $storedPassword) {
                // Passwords match, update the password in the database with the new password
                $updateQuery = "UPDATE worker_data1 SET password = '$newpassword' WHERE username = '$us'";
                mysqli_query($connection, $updateQuery);
                echo "Password updated successfully!";
            } else {
                // Old password doesn't match, show an alert
                echo "<script>alert('Old password does not match. Please try again.');</script>";
            }
        } else {
            // User not found in the database, handle the error
            echo "<script>alert('User not found in the database. Please try again.');</script>";
        }
    }
    elseif ($updateField === "fullname") {
        // Handle full name update
        $fullname=$_POST['fullname'];
        $updateQuery = "UPDATE worker_data1 SET fullname = '$fullname' WHERE username = '$us'";
        mysqli_query($connection, $updateQuery);
        //sleep(5);
        //header("Location: hirordashboard.php");
        //exit();
    }
    elseif ($updateField === "mobile") {
        // Handle full name update
        $mobile=$_POST['mobile'];
        $updateQuery = "UPDATE worker_data1 SET number = '$mobile' WHERE username = '$us'";
        mysqli_query($connection, $updateQuery);
        //sleep(5);
        //header("Location: hirordashboard.php");
        //exit();
    }
    elseif ($updateField === "email") {
        // Handle full name update
        $email=$_POST['email'];
        $updateQuery = "UPDATE worker_data1 SET email = '$email' WHERE username = '$us'";
        mysqli_query($connection, $updateQuery);
        //sleep(5);
        //header("Location: hirordashboard.php");
        //exit();
    }
    elseif ($updateField === "age") {
        // Handle full name update
        $age=$_POST['age'];
        $updateQuery = "UPDATE worker_data1 SET age = '$age' WHERE username = '$us'";
        mysqli_query($connection, $updateQuery);
        //sleep(5);
        //header("Location: hirordashboard.php");
        //exit();
    }
    elseif ($updateField === "dob") {
        // Handle full name update
        $dob=$_POST['dob'];
        $updateQuery = "UPDATE worker_data2 SET date_of_birth = '$dob' WHERE username = '$us'";
        mysqli_query($connection, $updateQuery);
        //sleep(5);
        //header("Location: hirordashboard.php");
        //exit();
    }
    elseif ($updateField === "places_worked_earlier") {
        // Handle full name update
        $places_worked_earlier=$_POST['places_worked_earlier'];
        $updateQuery = "UPDATE worker_data2 SET places_worked_earlier = '$places_worked_earlier' WHERE username = '$us'";
        mysqli_query($connection, $updateQuery);
        //sleep(5);
        //header("Location: hirordashboard.php");
        //exit();
    }
    elseif ($updateField === "exp") {
        // Handle full name update
        $exp=$_POST['exp'];
        $updateQuery = "UPDATE worker_data2 SET years_of_experience = '$exp' WHERE username = '$us'";
        mysqli_query($connection, $updateQuery);
        //sleep(5);
        //header("Location: hirordashboard.php");
        //exit();
    }
    elseif ($updateField === "available_days_to_work") {
        // Handle full name update
        $available_days_to_work=$_POST['available_days_to_work'];
        $updateQuery = "UPDATE worker_data2 SET available_days_to_work = '$available_days_to_work' WHERE username = '$us'";
        mysqli_query($connection, $updateQuery);
        //sleep(5);
        //header("Location: hirordashboard.php");
        //exit();
    }
    elseif ($updateField === "disabilities") {
        // Handle full name update
        $disabilities=$_POST['disabilities'];
        $updateQuery = "UPDATE worker_data2 SET disabilities = '$disabilities' WHERE username = '$us'";
        mysqli_query($connection, $updateQuery);
        //sleep(5);
        //header("Location: hirordashboard.php");
        //exit();
    }
    elseif ($updateField === "min_wage") {
        // Handle full name update
        $min_wage=$_POST['min_wage'];
        $updateQuery = "UPDATE worker_data2 SET min_wage = '$min_wage' WHERE username = '$us'";
        mysqli_query($connection, $updateQuery);
        //sleep(5);
        //header("Location: hirordashboard.php");
        //exit();
    }
    elseif ($updateField === "max_wage") {
        // Handle full name update
        $max_wage=$_POST['max_wage'];
        $updateQuery = "UPDATE worker_data2 SET max_wage = '$max_wage' WHERE username = '$us'";
        mysqli_query($connection, $updateQuery);
        //sleep(5);
        //header("Location: hirordashboard.php");
        //exit();
    }
    elseif ($updateField === "city") {
        // Handle city update
        $street=$_POST['street'];
        $area=$_POST['area'];
        $city=$_POST['city'];
        $k=" ";
         $updateQuery = "UPDATE worker_data1 SET address = '$street$k$area$k$city' WHERE username = '$us'";
         $updateQuery2 = "UPDATE worker_data1 SET city = '$city' WHERE username = '$us'";

         mysqli_query($connection, $updateQuery);
         mysqli_query($connection, $updateQuery2);
         //sleep(5);
         //header("Location: hirordashboard.php");
         //exit();
        // $updateQuery = "UPDATE hiror_data1 SET password = '$newpassword' WHERE username = '$us'";
        // mysqli_query($connection, $updateQuery);
    }
    // Handle other update fields for worker_data1 and worker_data2

    // Redirect the user back to the form or another page as needed
}
?>

</body>
</html>
