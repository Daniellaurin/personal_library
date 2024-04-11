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
<!DOCTYPE html>
<html>
  <head>
    <title>HTML Books Input Form</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <div>
      <h3>
        Enter a Book that you wish to add to the database <br />
        Programmed by Daniel Laurin
      </h3>
      <form action="bookInsert.php" method="post">
        <fieldset>
          <legend>Book Information</legend>
          <label for="Title">Book Title:</label>
          <input type="text" id="Title" name="Title" size="20" required />
          <br />
          <label for="Publisher">Publisher:</label>
          <input type="text" id="Publisher" name="Publisher" size="30" required />
          <br />
          <label for="YearPublished">Year Published:</label>
          <input type="text" id="YearPublished" name="YearPublished" size="6" required /><br />
          <label for="Author">Author:</label>
          <input type="text" id="Author" name="Author" size="20" required /><br />
        </fieldset>
        <input type="submit" name="submit" value="[+] Add Book" />
      </form>
    </div>
  </body>
</html>
