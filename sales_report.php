<?php
include 'header.php';
include 'connection.php';
$t = 0;
if (isset($_POST['submit'])) {
  $starttime = $_POST['starttime'];
  $endtime = $_POST['endtime'];

  $sql = "SELECT * FROM sales where created_at>='$starttime' && created_at<'$endtime'";
  $result = $conn->query($sql);
}
?>
<html>

<head>
  <title>Sales Report</title>
</head>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    margin: 0;
    padding: 0;
  }

  .container {
    max-width: 900px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  h5 {
    color: #6a1b9a;
    margin-bottom: 20px;
  }

  form {
    margin-bottom: 20px;
  }

  label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
    color: #6a1b9a;
  }

  input[type="datetime-local"] {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 8px;
    width: 100%;
    box-sizing: border-box;
    margin-bottom: 10px;
  }

  input[type="submit"],
  button {
    background-color: #6a1b9a;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 15px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    margin-top: 10px;
  }

  input[type="submit"]:hover,
  button:hover {
    background-color: #4a0072;
  }

  button {
    margin-left: 10px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  thead {
    background-color: #6a1b9a;
    color: #fff;
  }

  th,
  td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }


  .total {
    font-weight: bold;
    margin-top: 20px;
    font-size: 18px;
    color: #6a1b9a;
  }
</style>

</html>
<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="starttime">Start (date and time):</label>
    <input type="datetime-local" id="starttime" name="starttime">

    <label for="endtime"> End (date and time):</label>
    <input type="datetime-local" id="endtime" name="endtime">
    <input type="submit" name="submit">
  </form>
  <button type="button" onclick="window.print();return false;">Pdf Report</button>
  <div class="container pendingbody">
    <h5>Sales Report</h5>
    <table class="table">
      <thead>
        <tr>

          <th scope="col">Name</th>
          <th scope="col">Unit</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_POST['submit'])) {

          $t = 0;
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
              $t = $t + $row["totalprice"];

        ?>
              <tr>

                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["sellunit"] ?></td>
                <td><?php echo $row["totalprice"] ?></td>
              </tr>
        <?php

            }
          } else
            echo "0 results";
        }
        ?>
      </tbody>
    </table>
    <?php echo "Total= Rs" . $t; ?>

  </div>