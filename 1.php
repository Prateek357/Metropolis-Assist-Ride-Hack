<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
</head>
<body>
    <?php
    if (isset($_GET['value'])) {
        $value = $_GET['value'];
       
    } else {
        echo "No value provided.";
    }
        // Establish database connection
        $mysqli = new mysqli("localhost", "root", "2004", "project");
        // Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        // Fetch user data from the database
        $query = "SELECT * FROM worker_data1 WHERE username = '$value'";
        $query2 = "SELECT * FROM worker_data2 WHERE username = '$value'";
        $result1 = $mysqli->query($query);
        $result2 = $mysqli->query($query2);
        if ($result1->num_rows > 0 && $result2->num_rows>0) {
            // Display user data
            $row = $result1->fetch_assoc();
            $row2 = $result2->fetch_assoc();


            echo "<h1>".$row['fullname']."</h1><hr><br>";

            $imageQuery = "SELECT * FROM images WHERE id = '$value'";
            $imageResult = $mysqli->query($imageQuery);
        
            if ($imageResult->num_rows > 0) {
            $imageRow = $imageResult->fetch_assoc();
            $imageUrl = $imageRow['file_name'];
            $imageURL = 'uploads/'.$imageUrl;
            echo "<img src='$imageURL' id='im' alt='User Image'>";
        } else {
            echo "<p>No image found for the user.</p>";
        }
        
        echo "<p><strong>Age:</strong> " . $row['age'] . "</p>";
        echo "<p><strong>Date of Birth:</strong> " . $row2['date_of_birth'] . "</p><br><hr><br>";
        
        echo "<h3>Contact Details:</h3>";
        echo "<h5><strong>Contact Number:</strong> " . $row['number'] . "</h5>";
        echo "<h5><strong>Email:</strong> " . $row['email'] . "</h5><br>";
        
        echo "<h3>Residential Details:</h3>";
        echo "<h5><strong>Address:</strong> " . $row['address'] . "</h5><br>";
        
        
        echo "<h3>Salary Expectations:</h3>";
        echo "<h5><strong>Minimum Wage:</strong> " . $row2['min_wage'] . "</h5>";
        echo "<h5><strong>Maximum Wage:</strong> " . $row2['max_wage'] . "</h5><br>";
        
        echo "<h3>Skills and Experience:</h3>";
        echo "<h5><strong>Places worked earlier:</strong> " . $row2['places_worked_earlier'] . "</h5>";
        echo "<h5><strong>Skills:</strong> " . $row2['skills'] . "</h5>";
        echo "<h5><strong>Experience:</strong> " . $row['exp'] . "</h5><br>";
        
        echo "<h3>Available on:</h3>";
        echo "<p><strong>Days available to work:</strong> " . $row2['available_days_to_work'] . "</p>";
        echo "<p><strong>Places available to work:</strong> " . $row2['places_available_to_work_at'] . "</p><br>";
        

        if($row2['disabilities']!='')
        echo "<p><strong>Disabilities:</strong> " . $row2['disabilities'] . "</p><br><hr><br>";
        // Add similar lines for other fields


            // echo "<h1>User Profile</h1>";
            // echo "<p><strong>Username:</strong> " . $row['username'] . "</p>";
            // echo "<p><strong>Full Name:</strong> " . $row['fullname'] . "</p>";
            // echo "<p><strong>Number:</strong> " . $row['number'] . "</p>";
            // echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
            // echo "<p><strong>City:</strong> " . $row['city'] . "</p>";
            // echo "<p><strong>Address:</strong> " . $row['address'] . "</p>";
            // echo "<p><strong>Experience:</strong> " . $row['exp'] . "</p>";
            // echo "<p><strong>Days available to work:</strong> " . $row['days'] . "</p>";
            // echo "<p><strong>Age:</strong> " . $row['age'] . "</p>";

            // echo "<p><strong>Date of Birth:</strong> " . $row2['date_of_birth'] . "</p>";
            // echo "<p><strong>Places worked earlier:</strong> " . $row2['places_worked_earlier'] . "</p>";
            // echo "<p><strong>Skills:</strong> " . $row2['skills'] . "</p>";
            // echo "<p><strong>Places available to work:</strong> " . $row2['places_available_to_work_at'] . "</p>";
            // echo "<p><strong>Disabilities:</strong> " . $row2['disabilities'] . "</p>";
            // echo "<p><strong>Minimum Wage:</strong> " . $row2['min_wage'] . "</p>";
            // echo "<p><strong>Maximum Wage:</strong> " . $row2['max_wage'] . "</p>";
            // Add similar lines for other fields
            // Close the database connection
            // Display the image
            
        
        // Close the database connection
        $mysqli->close();
        } 
        else {
            echo "<p>User not found.</p>";
        }
?>
<style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        #im{
            width:170px;
            height:300px;
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        p {
            margin-bottom: 10px;
        }

        strong {
            color: #007bff;
        }
        img {
            max-width: 60%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>

</body>
</html>