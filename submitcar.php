<!DOCTYPE html>
<html>
  <head>
    <title>Car Saved</title>
  </head>
  <body bgcolor="#ffffff" text="#000000">

    <?php

      // Gets the values that were on the form and assign them php variables
      $VIN = $_POST['VIN'];
      $year = $_POST['YEAR'];
      $Make = $_POST['Make'];
      $Model = $_POST['Model'];
      $color = $_POST['EXT_COLOR'];
      $interior = $_POST['INT_COLOR'];
      $Price = $_POST['Asking_Price'];
      $mileage = $_POST['Mileage'];


      // Makes a SQL Insert Command
      $query = "INSERT INTO Inventory
      (VIN, YEAR, Make, Model, EXT_COLOR, INT_COLOR, ASKING_PRICE, Mileage)
      VALUES
      ('$VIN',
      '$year',
      '$Make',
      '$Model',
      '$color',
      '$interior',
      '$Price',
      '$mileage'
     )";
      // Print query to the user
      echo ($query."<br>");

      // Makes a connection to the mySQL database
      $mysqli = new mysqli('localhost', 'root', '%0ArSs7UI4#I8op%', 'cars');
      // Test to see if connection work.
      if (mysqli_connect_errno())
      {
        // If it does not work, Print error message and stop code using exit()
        printf("Connect failed: %s\n", mysqli_connect_errno());
        exit();
      }
      // Otherwise, print success statment
      echo "Connected successfully to mySQL.<br>";

      // Selects the "cars" database and prints out message
      $mysqli->select_db('Cars');
        echo ("Selected the Cars database. <br>");

        // Execute the SQL statement
      if($result = $mysqli->query($query))
      {
        // Prints success message
        echo "<p>You have successfully entered $Make $Model into the database</p>";
      }
      else
      {
        // Prints error message
        echo "Error entering $VIN into database:".
        mysqli_error($mysqli)."<br>";
      }

      // Close connection to the database
      $mysqli->close();

    ?>

  </body>
</html>
