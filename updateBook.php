<!DOCTYPE html>
<html>

<head>
    <title>UPDATE Books Table</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div>
        <h3>UPDATING AUTHOR NAME in the Books Table</h3>
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