<!DOCTYPE html>
<html>
  <head>
    <title>Sam's Used Cars</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">

  </head>
  <body>
    <h1>Sam's Used Cars</h1>

    <?php
      include 'db.php';
      // Used for testing purposed
      error_reporting(0);

      // Create $vin variable and assign it to the value that url string
      $vin = $_GET['VIN'];
      // Varible used if user wanted to update VIN
      $vinEdit = $_POST['VINEdit'];
      $price = $_POST['Asking_Price'];
      $color = $_POST['EXT_COLOR'];
      $interior = $_POST['INT_COLOR'];
      $year = $_POST['YEAR'];
      $make = $_POST['Make'];
      $model = $_POST['Model'];
      $mileage = $_POST['Mileage'];


      // Builds query string
      // Current Car
      $query = "SELECT * FROM Inventory WHERE VIN='$vin'";


      // Try to query the database
      // Create result set
      if ($result = $mysqli->query($query))
      {
        // Don't do anything if successful
      }
      else
      {
        // Produce error if query has an error
        echo "Sorry, a vehicle with VIN of $vin cannot be found";
        mysqli_error($mysqli)."br";
      }
      // Used to show the options for the currently selected car
      echo "Current Car";
      // Make table to present data for current car
      echo "<table id='Grid' style='width: 80%'><tr>";
      // Creates the first row of the table
      echo "<th style='width: 50px'>VIN</th>";
      echo "<th style='width: 50px'>Year</th>";
      echo "<th style='width: 50px'>Color</th>";
      echo "<th style='width: 50px'>Interior Color</th>";
      echo "<th style='width: 50px'>Make</th>";
      echo "<th style='width: 50px'>Model</th>";
      echo "<th style='width: 50px'>Asking Price</th>";
      echo "<th style='width: 50px'>Mileage</th>";
      echo "</tr>\n";

      // Loop though all the rows returned by the query, creating a table row for each
      while ($result_ar = mysqli_fetch_assoc($result))
      {
        // Assign a series of variables with the values of the specific data columns
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
        // Used to get data from image column to store image
        $image = $result_ar['Primary_Image'];
      }
      // Create query string to update inventory database
      $query = "UPDATE inventory
      SET YEAR ='$year',
      Make ='$make',
      Model ='$model',
      EXT_COLOR ='$color',
      INT_COLOR ='$interior',
      ASKING_PRICE ='$price',
      Mileage = '$mileage'

      WHERE VIN= '$vinEdit'";


      if ($result = $mysqli->query($query))
      {
        // if successful, let user know
        echo "$year $make $model successfully updated";
      }
      else
      {
        // Produce error if query has an error
        echo "Sorry, a vehicle with VIN of $vin cannot be found";
        mysqli_error($mysqli)."br";
      }
      echo "</table>";
      // used to display car images
      echo "<IMG src='Images/$image'>";

      $mysqli->close();
    ?>
    <!-- Form used to update car values -->
    <form action="viewcar.php" method="POST">
      <br/><br/>
      VIN:<input name="VINEdit" type="text"/><br/>
      <br/>
      Year:<input name="YEAR" type="text"/><br/>
      <br/>
      Make:<input name="Make" type="text"/><br/>
      <br/>
      Model:<input name="Model" type="text"/><br/>
      <br/>
      Price:<input name="Asking_Price" type="number"/><br/>
      <br/>
      Exterior Color:<input name="EXT_COLOR" type="text"/><br/>
      <br/>
      Interior Color:<input name="INT_COLOR" type="text"/><br/>
      <br/>
      &nbsp;
      Mileage:<input name="Mileage" type="number"/><br/>
      <br/>
      <input name="Submit1" type="submit" value="submit"/><br/>
      </form>

  </body>
</html>
