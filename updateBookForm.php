<!DOCTYPE html>
<html>
    <head>
        <title>UPDATE Books Database</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
<body>
<div>
<h3>Enter the book Author's Name for the Book that you wish to UPDATE in the database</br>
Programmed by Daniel Laurin</h3>

<?php
// Include database connection variables
require_once('databaseConnectionVariables.php');

// Connect to the database
$dbConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Check if form has been submitted
    if (isset($_POST['submit'])) {
        // Query to retrieve book title
        $query = "SELECT title FROM Books WHERE title = '" . mysqli_real_escape_string($dbConnection, $_POST['titleInput']) . "'";
$result = mysqli_query($dbConnection, $query);

        // Check if book title exists in database
        if (mysqli_num_rows($result) > 0) {
            // Query to update author name
            $query = "UPDATE Books SET author = '" . mysqli_real_escape_string($dbConnection, $_POST['authorInput']) . "' WHERE title = '" . mysqli_real_escape_string($dbConnection, $_POST['titleInput']) . "'";
            $result = mysqli_query($dbConnection, $query);

            // Check if query was successful
            if ($result) {
                echo "<p>Author name updated successfully!</p>";
            } else {
                echo "<p>Error updating author name: " . mysqli_error($dbConnection) . "</p>";
            }
        } else {
            echo "<p>Book title not found in database.</p>";
        }
    }
    ?>

    <!-- Form to update author name -->
    <form action="updateBook.php" method="post">
        <fieldset>
            <legend>Update Author Name</legend>
            <!-- Input for book title -->
            <label for="title">Book Title (existing):<span class="required">*</span></label>
            <input list="books" id="title" name="titleInput" size="20" required/><br/>
            <!-- Input for new author name -->
            <label for="author">New Author Name:<span class="required">*</span></label>
            <input type="text" id="author" name="authorInput" size="14" required/><br/>
            <br/>
        </fieldset>
        <!-- Submit button -->
        <input type="submit" name="submit" value="Submit Information!"/>
    </form>

    <!-- Datalist for book titles -->
    <datalist id="books">
        <?php
        // Query to retrieve book titles
        $query = "SELECT title FROM Books";
        $result = mysqli_query($dbConnection, $query);

        // Display book titles
        while ($row = mysqli_fetch_array($result)) {
            echo "<option value='" . htmlspecialchars($row['title']) . "'></option>";
        }
        ?>
    </datalist>
</div>
</body>
</html>
