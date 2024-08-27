<?php
include "header.php";
include "connection.php";

$successMessage = "";

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $des = $_POST['des'];
  $unit = $_POST['unit'];
  $unitprice = $_POST['unitprice'];

  $insertsql = "INSERT INTO product(name, des, unit, unitprice) VALUES ('$name', '$des', '$unit','$unitprice')";
  $insertsql1 = "INSERT INTO purchase(name, des, unit, unitprice) VALUES ('$name', '$des', '$unit','$unitprice')";

  if ($conn->query($insertsql1) === TRUE && $conn->query($insertsql) === TRUE) {
    $successMessage = "New record created successfully";
  } else {
    echo "Error: " . $conn->error;
  }
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
      position: relative;
    }

    h5 {
      color: #6a1b9a;
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
      color: #6a1b9a;
    }

    .form-control {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 10px;
      width: 100%;
      box-sizing: border-box;
      margin-bottom: 15px;
    }

    button,
    .btn-primary {
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

    button:hover,
    .btn-primary:hover {
      background-color: #4a0072;
    }

    .success-message {
      position: absolute;
      top: 20px;
      right: -250px;
      background-color: #e0ffe0;
      color: #28a745;
      padding: 10px 15px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 200px;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <?php if (!empty($successMessage)) : ?>
      <div class="success-message"><?php echo $successMessage; ?></div>
    <?php endif; ?>
    <h5>Purchase</h5>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="mb-3">
        <label for="exampleInputName" class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputName">
      </div>
      <div class="mb-3">
        <label for="exampleInputDes" class="form-label">Description</label>
        <input type="text" name="des" class="form-control" id="exampleInputDes">
      </div>
      <div class="mb-3">
        <label for="exampleInputUnit" class="form-label">Unit</label>
        <input type="number" name="unit" class="form-control" id="exampleInputUnit">
      </div>
      <div class="mb-3">
        <label for="exampleInputUnitprice" class="form-label">Unit Price</label>
        <input type="number" name="unitprice" class="form-control" id="exampleInputUnitprice">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
</body>

</html>