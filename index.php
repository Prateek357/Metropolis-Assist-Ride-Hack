<?php
include_once 'upload.php'; 
?>

<!DOCTYPE html>

<html lang="en-US">

<head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .upfrm label {
            display: block;
            margin-bottom: 10px;
        }

        .upfrm input[type="file"] {
            margin-bottom: 20px;
        }

        .upfrm input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .upfrm input[type="submit"]:hover {
            background-color: #45a049;
        }

        .gallery {
            margin-top: 30px;
        }

        .gcon {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .gcon img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>

<title>Upload Image and Store in the Database by CodexWorld</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
<div class="upfrm">
<form method="post" enctype="multipart/form-data">
<label>Select Image File to Upload:</label>
<input type="file" name="file">
<input type="submit" name="submit" value="Upload">
<?php
?> 
    <img src="<?php  ?>" alt="" />
<?php 
// ?>

</body>

</html>