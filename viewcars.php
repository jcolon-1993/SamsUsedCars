<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sam's Used Cars</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <h1>Sam's Used Cars</h1>
    <h3>Complete Inventory</h3>

    <?php
      include 'db.php';
      // SQL statement that produces the list of cars to be displayed
      $query = "SELECT * FROM Inventory";
      // If statement checks the result of the query
      if ($result = $mysqli->query($query))
      {
        // Don't do anything if successful.
      }
      else
      {
        // Otherwise, print error message if query fails.
        echo "Error getting cars from the database:".
        mysqli_error($mysqli)."<br>";
      }
      // Create table headers
      echo "<table id='Grid' style='width: 80%'><tr>";
      // Creates the first row of the table
      echo "<th style='width: 50px'>Edit Car</th>";
      echo "<th style='width: 50px'>Delete Car</th>";
      echo "<th style='width: 50px'>VIN</th>";
      echo "<th style='width: 50px'>Year</th>";
      echo "<th style='width: 50px'>Color</th>";
      echo "<th style='width: 50px'>Interior Color</th>";
      echo "<th style='width: 50px'>Make</th>";
      echo "<th style='width: 50px'>Model</th>";
      echo "<th style='width: 50px'>Asking Price</th>";
      echo "<th style='width: 50px'>Mileage</th>";

      // Clsoing tag for the table row
      echo "</tr>\n";

      // Keep track of whether a row was even or odd and set $class to odd
      $class = "odd";

      // Loop through all the rows returned by the query
      while ($result_ar = mysqli_fetch_assoc($result))
      {
        // Creates a row that corresponds with each row in the database table
        echo "<tr class=\"$class\">";
        // Data that goes in row
        // Edit Car
        echo "<td><form action='viewcar.php' method='GET'><a href='viewcar.php?
        VIN=".$result_ar['VIN']."'>".'Click Here to Edit '.$result_ar['Make']."
        </a></form></td>";
        // Delete Car
        echo "<td><form action='deletepage.php'><a href='deletepage.php?
        VIN=".$result_ar['VIN']."'>".'Click Here to Delete '.$result_ar['Make']."
        </a></form></td>";
        // Vin number
        echo "<td>".$result_ar['VIN']."</td>";
        // Year
        echo "<td>".$result_ar['YEAR']."</td>";
        // Color
        echo "<td>".$result_ar['EXT_COLOR']."</td>";
        // Int Color
        echo "<td>".$result_ar['INT_COLOR']."</td>";
        // Make
        echo "<td>".$result_ar['Make']."</a></td>";
        // Model
        echo "<td>".$result_ar['Model']."</td>";
        // Asking Price
        echo "<td>".$result_ar['ASKING_PRICE']."</td>";
        // Mileage
        echo "<td>".$result_ar['Mileage']."</td>";
        // Closing tag for row
        echo "</td></tr>\n";

        // If the last row was even, make the next on odd and vice-versa
        if ($class == "odd")
        {
          $class = "even";
        }
        else
        {
          $class = "odd";
        }
      }
      echo "</table>";
      // Close the database
      $mysqli->close();
    ?>
    <br/>


  </body>
</html>
