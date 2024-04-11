<?php
//Due Date: April 5,2024
# Class: MIT439_004
/*
Student Name: Daniel Laurin
Student Number: w0828564
Assignment Number: Assign #9
userScew: w24afd.scweb.ca/
*/
?>

<?php
// Connect to the database
require_once('databaseConnectionVariables.php');
$dbConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check if the connection was successful
if (!$dbConnection) {
    die("Connection failed: " . mysqli_connect_error()); // Output error message and exit
}

// Check if the table 'Books' exists
$checkQuery = "SHOW TABLES LIKE 'Books'";
$result = mysqli_query($dbConnection, $checkQuery);

// If the table exists, drop it
if (mysqli_num_rows($result) > 0) {
    $query = "DROP TABLE Books";
    if (mysqli_query($dbConnection, $query)) {
        echo "Table 'Books' dropped successfully."; // Output success message
    } else {
        echo "Error dropping table: " . mysqli_error($dbConnection); // Output error message
    }
} else {
    echo "Table 'Books' does not exist."; // Output message if table doesn't exist
}

// Close the database connection
mysqli_close($dbConnection);
