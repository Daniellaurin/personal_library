 <?php
//Due Date: March 18,2024
# Class: MIT439_004
# Class: MIT439\_004
/*
Student Name: Daniel Laurin
Student Number: w0828564
Assignment Number: Assign #7
userScew: w24afd.scweb.ca/
*/
?>
<!DOCTYPE html>
<html>
<head>
  <title>UPDATE Books Table</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div>
<h3>UPDATING AUTHOR NAME in the Books Table</h3>
<h4>Programmed by Daniel Laurin</h4><br />

<?php
// Include database connection variables
require_once('databaseConnectionVariables.php');

// Connect to the database
$dbConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Get the user input
$titleInput = trim($_POST['titleInput']);
$authorInput = trim($_POST['authorInput']);

// Validate the input (example: check if titleInput is not empty)
if (empty($titleInput) || empty($authorInput)) {
    echo "Please fill in all fields.";
    exit;
}

// Sanitize and escape the input
$titleInput = mysqli_real_escape_string($dbConnection, $titleInput);
$authorInput = mysqli_real_escape_string($dbConnection, $authorInput);

// Create the UPDATE query
$query = "UPDATE Books SET Author = '$authorInput' WHERE Title = '$titleInput'";

// Execute the query
if (mysqli_query($dbConnection, $query)) {
    echo "The UPDATE query was successful.";
    echo "<a href='displayBooks.php'>View Books</a>";
} else {
    echo "The UPDATE query FAILED! " . mysqli_error($dbConnection);
}

// Close the database connection
mysqli_close($dbConnection);
?>
</div>
</body>
</html>
