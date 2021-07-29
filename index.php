<!DOCTYPE html>
<html>
  <head>
    <title>Sam's Used Cars</title>
  </head>
  <body>
    <h1>Sam's Used Cars</h1>
    <!-- Forms used to get data from database using the post method -->
    <form action="submitcar.php" method="POST">
      VIN:<input name="VIN" type="text"/><br/>
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
