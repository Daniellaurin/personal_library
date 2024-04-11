<?php
//Due Date: March 18,2024
# Class: MIT439_004
/*
Student Name: [Your Name]
Student Number: w0828564
Assignment Number: Assign #7
userScew: w24afd.scweb.ca/
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>HTML form for Book Delete</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div>
<h2>Book DELETE form - Programmed by Daniel</h2>
<?php
// Connect to the database
require_once('databaseConnectionVariables.php');
$dbConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Query to get the book titles
$query = "SELECT title FROM Books";
$result = mysqli_query($dbConnection, $query);
$result2 = mysqli_query($dbConnection, $query);

// Display the list of books
echo "<p>These are the books in your database: </p>";
echo "<ul>";
while ($row = mysqli_fetch_array($result)) {
    echo "<li>$row[title]</li>";
}
echo "</ul>";

// Create a datalist for book titles
echo "<datalist id='books'>";
while ($row = mysqli_fetch_array($result2)) {
    echo "<option value='$row[title]'></option>";
}
echo "</datalist>";
?>

<!-- Form to delete a book -->
<form action="deleteBook.php" method="post">
Book Title to be deleted from database: <input list="books" name="title" size="20"/><br/>
    <input type="submit" name="SUBMIT" value="Delete Record!"/>
</form>
</div>
</body>
</html>
