<?php
//Due Date: April 5,2024
# Class: MIT439_004
/*
Student Name: Daniel Laurin
Student Number: w0828564
Assignment Number: Assign #8
userScew: w24afd.scweb.ca/
*/
?>
<?php
// Include the database connection variables
require_once('databaseConnectionVariables.php');

// Connect to the database
$dbConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check if the connection was successful
if (!$dbConnection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the table 'Books' exists
$tableExistsQuery = "SHOW TABLES LIKE 'Books'";
$result = mysqli_query($dbConnection, $tableExistsQuery);

// If the table exists, display a message and a link to the book form
if ($result && mysqli_num_rows($result) > 0) {
    echo "Table with name Books already exists. <br>Go to <a href='bookForm.php'>Book Insert</a> to add books";
} else {
    // If the table doesn't exist, create it
    $query = "CREATE TABLE IF NOT EXISTS Books (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        publisher VARCHAR(100) NOT NULL,
        yearPublished YEAR NOT NULL,
        author VARCHAR(100) NOT NULL
    )";

    // Execute the query
    if (mysqli_query($dbConnection, $query)) {
        echo "The query was successfully executed! You created the Books Table <br />Go to <a href='bookForm.php'>Book Insert</a> to add books";
    } else {
        echo "The query could not be executed! Error: " . mysqli_error($dbConnection);
    }
}

// Close the database connection
mysqli_close($dbConnection);
?>
