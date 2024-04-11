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
/*
* File: displayBooks.php
* Description: This file displays all book records from the database and provides links to add, delete, and update book records.
*/

// Database connection variables
            require_once('databaseConnectionVariables.php');

// Connect to the database
$dbConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Query to select all books
$query = "SELECT * FROM Books";
$result = mysqli_query($dbConnection, $query);

// Start HTML output
            ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Display BOOK Records</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <div>
            <h2>Display Book Records</h2>
            <div class='wrapper'>
                <?php
                // Loop through the result set and display book records
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <article>
                        <img src='book.png' alt='<?php echo $row[1]; ?>' Title='<?php echo $row[1]; ?>'/>
                        <p><?php echo $row[1]; ?></p>
                        <p>Author: <?php echo $row[2]; ?></p>
                        <p>Year Published: <?php echo $row[3]; ?></p>
                        <p>Publisher: <?php echo $row[4]; ?></p>
                    </article>
                    <?php
                }
                ?>
            </div>
            <p class='clear'></p>

            <?php
            // Close the database connection
            mysqli_close($dbConnection);

            // Get the current date
            $currentDate = date("l F j, Y");

            // Display links to add, delete, and update book records
            ?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Management</title>
</head>
<body>
    <div class="box">
        <p><a href='bookForm.php'>[+]Add A Book</a></p>
        <p><a href='deleteBookForm.php'>[-]Delete A Book</a></p>
        <p><a href='updateBookForm.php'>[~]Update A Book</a></p>
        <p><em>Daniel Laurin &nbsp;&nbsp;Date: <?php echo $currentDate; ?></em></p>
    </div>
</body>
</html>
