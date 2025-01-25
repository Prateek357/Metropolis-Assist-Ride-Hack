<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="signupworkerextradetails.css">
</head>
<body>
    <div class="container">
        <h2>Worker Registration</h2>
        <form id="registrationForm" action="signupworkerextradetails.php" method="post">
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div class="form-group">
                <label for="experience">Years of Experience:</label>
                <input type="number" id="experience" name="experience" required>
            </div>

            <div class="form-group">
                <label for="placesWorked">Places Worked Earlier (optional):</label>
                <input type="text" id="placesWorked" name="placesWorked">
            </div>

            <div class="form-group">
                <label for="skills">Skills:</label>
                <input type="text" id="skills" name="skills" required>
            </div>

            <div class="form-group">
                <label for="placesAvailable">Places Available to Work At (optional):</label>
                <input type="text" id="placesAvailable" name="placesAvailable">
            </div>

            <div class="form-group">
                <label>Available to Work On Days (select at least one):</label>
                <div class="b">
                    <input type="checkbox" id="day1" name="days[]" value="Monday">
                    <label for="day1">Monday</label>
                </div>

                <div class="b">
                    <input type="checkbox" id="day2" name="days[]" value="Tuesday">
                    <label for="day2">Tuesday</label>
                </div>

                <div class="b">
                    <input type="checkbox" id="day3" name="days[]" value="Wednesday">
                    <label for="day3">Wednesday</label>
                </div>

                <div class="b">
                    <input type="checkbox" id="day4" name="days[]" value="Thursday">
                    <label for="day4">Thursday</label>
                </div>

                <div class="b">
                    <input type="checkbox" id="day5" name="days[]" value="Friday">
                    <label for="day5">Friday</label>
                </div>

                <div class="b">
                    <input type="checkbox" id="day6" name="days[]" value="Saturday">
                    <label for="day6">Saturday</label>
                </div>

                <div class="b">
                    <input type="checkbox" id="day7" name="days[]" value="Sunday">
                    <label for="day7">Sunday</label>
                </div>
            </div>

            <div class="form-group">
                <label for="disabilities">Disabilities (optional):</label>
                <input type="text" id="disabilities" name="disabilities">
            </div>

            <div class="form-group">
                <label for="minWage">Minimum Wage:</label>
                <input type="number" id="minWage" name="minWage" required>
            </div>

            <div class="form-group">
                <label for="maxWage">Maximum Wage:</label>
                <input type="number" id="maxWage" name="maxWage" required>
            </div>

            <button type="submit" name="submit">Register</button>
        </form>
    </div>
    <?php
if (isset($_POST['submit'])) {
    $host = "localhost";
    $user = "root";
    $password = "2004";
    $database = "project";
    $conn = new mysqli($host, $user, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $us = "";
    session_start(); // Start the session
    if (isset($_SESSION['variable2'])) {
        $us = $_SESSION['variable2'];
    }
        // Extract data from the form
    $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
    $experience = mysqli_real_escape_string($conn, $_POST["experience"]);
    $placesWorked = isset($_POST["placesWorked"]) ? mysqli_real_escape_string($conn, $_POST["placesWorked"]) : null;
    $skills = mysqli_real_escape_string($conn, $_POST["skills"]);
    $placesAvailable = isset($_POST["placesAvailable"]) ? mysqli_real_escape_string($conn, $_POST["placesAvailable"]) : null;
    $days = isset($_POST["days"]) ? implode(", ", $_POST["days"]) : null;
    $disabilities = isset($_POST["disabilities"]) ? mysqli_real_escape_string($conn, $_POST["disabilities"]) : null;
    $minWage = mysqli_real_escape_string($conn, $_POST["minWage"]);
    $maxWage = mysqli_real_escape_string($conn, $_POST["maxWage"]);
    // Insert the data into the worker_data2 table
    $sql = "INSERT INTO worker_data2 (username, date_of_birth, years_of_experience, places_worked_earlier, skills, 
    places_available_to_work_at, available_days_to_work,  disabilities, min_wage, max_wage) 
    VALUES ('$us', '$dob', '$experience', '$placesWorked', '$skills', '$placesAvailable', 
    '$days', '$disabilities', '$minWage', '$maxWage')";
    if ($conn->query($sql) === TRUE) {
        // Data successfully inserted
        session_start(); // Start the session
        $_SESSION['variable'] = $us;
        header("Location: workerdashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
</body>
</html>
