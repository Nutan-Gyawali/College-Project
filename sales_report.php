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
    <table class="table table-striped">
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
    <?php echo "Total= Rs. " . $t; ?>

  </div>