<!DOCTYPE html>
<html>
<head>
    <title>Category and Wage Input</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select, input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Category and Wage Input</h2>
        <form method="post" action="">
            <div>
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="home assist">Home Assist</option>
                    <option value="repair and maintainence">Repair and Maintenance</option>
                    <option value="body grooming and assistance">Body Grooming and Assistance</option>
                </select>
            </div>
            <div>
                <label for="min_wage">Minimum Wage:</label>
                <input type="number" id="min_wage" name="min_wage" placeholder="Enter minimum wage" required>
            </div>
            <div>
                <label for="max_wage">Maximum Wage:</label>
                <input type="number" id="max_wage" name="max_wage" placeholder="Enter maximum wage" required>
            </div>
            <div>
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $category = $_POST['category'];
            $min_wage = $_POST['min_wage'];
            $max_wage = $_POST['max_wage'];

            // Process the values as needed, for example, you can store them in a database
            // You may add additional validation and processing logic here

            
        }
        ?>
    </div>

    <?php
        session_start(); // Start the session

        if (isset($_POST['submit'])) {
            $category = $_POST['category'];
            $min_wage = $_POST['min_wage'];
            $max_wage = $_POST['max_wage'];

            // Store values in session
            $_SESSION['category'] = $category;
            $_SESSION['min_wage'] = $min_wage;
            $_SESSION['max_wage'] = $max_wage;

            // Redirect to the next page
            header("Location: card.php");
            exit();
        }
        ?>
</body>
</html>
