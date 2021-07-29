<!DOCTYPE html>
<html>
  <head>
    <title>Sam's Used Cars</title>
  </head>
  <body>
    <h1>Sam's Used Cars</h1>
    <?php
      include 'db.php';

      $vin = $_GET['VIN'];
      $query = "DELETE FROM INVENTORY WHERE VIN ='$vin'";

      echo "$query <BR>";
      // Try to execute the delete statement
      if ($result = $mysqli->query($query))
      {
        echo "The vehicle with VIN $vin has been deleted from cart\n";
      }
      else
      {
        echo "Sorry, a vehicle with VIN of $vin canne be found ".mysqli($query);
      }
      $mysqli->close();
    ?>
  </body>
</html>
