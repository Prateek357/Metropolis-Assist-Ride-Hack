<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="signupprofotherdetails.css">
</head>
<body>
    <div class="container">
        <h2>Register As Hirer</h2>
        <form id="registrationForm" action="signupprofotherdetails.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input placeholder="Enter your name" type="text" id="name" name="name" required>
            </div>
            <!-- Add this hidden input field within the form -->
            <input type="hidden" name="username" value="<?php echo $username; ?>">

            <div class="form-group">
                <label for="age">Age:</label>
                <input placeholder="Enter your age" type="number" id="age" name="age" required>
            </div>
            <br>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input placeholder="Enter your mobile number" type="text" id="mobile" name="mobile" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input placeholder="Enter your email address" type="email" id="email" name="email" required>
            </div>
            <br>
        
            <br>
            <div class="form-group">
                <label for="area">Address(Area):</label>
                <input placeholder="Enter your area" type="text" id="area" name="area" required>
            </div>
            <div class="form-group">
                <label for="city">Address(City):</label>
                <input placeholder="Enter your city" type="text" id="city" name="city" required>
            </div>
            <br> 
            <div class="form-group">
                <label for="street">Address(Street):</label>
                <input placeholder="Enter your Street" type="text" id="street" name="street" required>
            </div>

            <div class="form-group">
                <label for="pincode">Pincode:</label>
                <input placeholder="Enter your Pincode" type="text" id="pincode" name="pincode" required>
            </div>
            <br>
            <button type="submit" name="submit">Register</button>
        </form>
    </div>
    <?php
    //echo "hel";
    if (isset($_POST['submit'])) {
        //echo "hel";
        $host = "localhost";
        $user = "root";
        $password = "2004";
        $database = "project";
        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    //echo "reacher username extraction";
    // Extract the username from the previous PHP file
    $us;
    // Retrieve the data from the URL and decode it
    session_start(); // Start the session
    if (isset($_SESSION['variable'])) {
        $us = $_SESSION['variable'];
            // Use $receivedData in your code
    }
    // Extract other worker details from the current HTML form
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $age = mysqli_real_escape_string($conn, $_POST["age"]);
    $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $area = mysqli_real_escape_string($conn, $_POST["area"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);
    $street = mysqli_real_escape_string($conn, $_POST["street"]);
    $pincode = mysqli_real_escape_string($conn, $_POST["pincode"]);
    // You can also handle the image file upload here
    // Insert the worker details into the worker_data1 table
    $k=" ";
    //echo $name;
    $sql = "UPDATE hiror_data1 SET fullname='$name', age='$age', mobile='$mobile', email='$email', city='$city', address='$street$k$area$k$city$k$pincode'WHERE username='$us'";
    //echo"after insertion";
    
    if ($conn->query($sql) === TRUE) {
        //echo "Registration successful!";
        // You can redirect the user to a success page or perform other actions as needed.
        session_start(); // Start the session
        $_SESSION['variable2'] = $us;
        header("Location: hirordashboard.php");
        exit();
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
</body>
</html>