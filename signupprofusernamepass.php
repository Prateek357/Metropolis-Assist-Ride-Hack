<!DOCTYPE html>
<html>
<head>
    <title>Professional Registration</title>
    <link rel="stylesheet" type="text/css" href="signupprofusernamepass.css">
</head>
<body>
    <div class="container">
        <h2>Hirer Registration</h2>
        <form id="registrationForm" action="signupprofusernamepass.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input placeholder="Enter a Username" type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input placeholder="Create a strong password" type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input placeholder="Please Confirm Password" type="password" id="confirmPassword" name="cpassword" required>
            </div>
            <button type="submit" name="submit">Register</button>
        </form>
    </div>
    
    <?php
    if (isset($_POST['submit'])) {
        $host = "localhost";
        $username = "root";
        $password = "2004";
        $database = "project";
        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = $_POST["password"];
        $cpassword=$_POST["cpassword"];
        if($password!=$cpassword)
        {
         echo "<script>alert('password does not match');</script>";
        }
        else
        {
            $minLength = 6;
        $lowercaseRegex = '/[a-z]/';
        $uppercaseRegex = '/[A-Z]/';
        $numberRegex = '/[0-9]/';
        if (strlen($password) < $minLength ||
            !preg_match($lowercaseRegex, $password) ||
            !preg_match($uppercaseRegex, $password) ||
            !preg_match($numberRegex, $password)) {
            echo "<script>alert('Password must be at least 6 characters long and contain at least one lowercase letter, one uppercase letter, and one number.');</script>";
        } 
        else 
        {
            $checkUsernameQuery = "SELECT * FROM hiror_data1 WHERE username = '$username'";
            $result = $conn->query($checkUsernameQuery);
        
            if ($result->num_rows > 0) {
                echo "<script>alert('Username already exists, please choose a different username.');</script>";
            }
            else {
                $sql = "INSERT INTO hiror_data1 (username, password) VALUES ('$username', '$password')";
    
                if ($conn->query($sql) === TRUE) {
                    echo "Registration successful!";
                    // Redirect to another page or perform other actions as needed.
                    session_start(); // Start the session
                    $_SESSION['variable'] = $username;
                    header("Location: signupprofotherdetails.php");
                    exit();
                } 
                else {
                    echo "<script>alert('Entered Username already used, Please enter a different Username!');</script>";
                }
            }
        }
        $conn->close();
        }
        
    }
    ?>
</body>
</html>
