<?php
include "header.php";
include "connection.php";
$t = 0;
if (isset($_POST['submit'])) {
  $starttime = $_POST['starttime'];
  $endtime = $_POST['endtime'];

  $sql = "SELECT * FROM purchase where created_at>='$starttime' && created_at<'$endtime'";
  $res = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
</head>

<body>
  <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <label for="starttime">Start (date and time):</label>
      <input type="datetime-local" id="starttime" name="starttime">

      <label for="endtime"> End (date and time):</label>
      <input type="datetime-local" id="endtime" name="endtime">
      <input type="submit" name="submit">
    </form>
    <button type="button" onclick="window.print();return false;">Pdf Report</button>
    <h5>Purchase Report</h5>
    <table class="table table-striped">
      <thead>
        <tr>
          <!--<th scope="col">#</th>-->
          <th scope="col">Product Name</th>
          <th scope="col">Unit</th>
          <th scope="col">Total Unit Price</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_POST['submit'])) {
          if (mysqli_num_rows($res) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($res)) {
              $t = $t + ($row['unit'] * $row['unitprice']);
        ?>
              <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['unit']; ?></td>
                <td><?php echo $row['unit'] * $row['unitprice']; ?></td>

              </tr>
              </form>
        <?php
            }
          } else {
            echo "0 results";
          }
        }
        ?>
      </tbody>
    </table>
    <?php echo "Total= Rs." . $t; ?>
  </div>
</body>

</html>