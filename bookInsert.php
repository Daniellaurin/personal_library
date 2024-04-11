<?php
//Due Date: March 18,2024
# Class: MIT439_004
/*
Student Name: Daniel Laurin
Student Number: w0828564
Assignment Number: Assign #7
userScew: w24afd.scweb.ca/
*/
?>
<?php
require_once('databaseConnectionVariables.php');
$dbConnect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Get the form data and trim whitespace
$title = isset($_POST['Title']) ? trim($_POST['Title']) : '';
$author = isset($_POST['Author']) ? trim($_POST['Author']) : '';
$yearPublished = isset($_POST['YearPublished']) ? trim($_POST['YearPublished']) : '';
$publisher = isset($_POST['Publisher']) ? trim($_POST['Publisher']) : '';


$query = "INSERT into Books values ('0', '$title', '$author', '$yearPublished', '$publisher')";

print("The query is:<br/>$query<br/><br/>");

if (mysqli_query($dbConnect, $query)) {
    echo "The query was successfully executed!<br/>";
    echo "<a href='displayBooks.php'>View Books</a>";
} else {
    echo "The query could not be executed!<br />";
}
mysqli_close($dbConnect);
