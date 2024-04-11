<?php
/*
 * Deleting a record from the Books Database
 */

// Connect to the database
require_once('databaseConnectionVariables.php');
$dbConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Get the book title from the form
$bookTitle = trim($_POST['title']);

// Table name
$tableName = 'Books';

// SQL query to delete the record
$query = "DELETE FROM $tableName WHERE title = '$bookTitle'";

// Execute the query
if (mysqli_query($dbConnection, $query)) {
    echo "The DELETE query was successfully executed!<br />";
    echo "<a href='displayBooks.php'>View Books</a>";
} else {
    echo "The DELETE query could not be executed!" . mysqli_error($dbConnection);
}

// Close the database connection
mysqli_close($dbConnection);
