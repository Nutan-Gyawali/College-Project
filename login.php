<?php

SESSION_START();

if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth'] == 1) {
        header("location:index.php");
    }
}


if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $pass = ($_POST['password']);

    if ($id == 'admin' && $pass == 'admin') {
        $_SESSION['auth'] = 1;
        header("location:index.php");
    } else {
        echo "invalid";
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }

        .card-header {
            background-color: #6a1b9a;
            color: #fff;
            border-bottom: none;
            border-radius: 8px 8px 0 0;
            text-align: center;
            position: relative;
            padding: 1.5rem;
        }

        .card-header img {
            width: 150px;
            /* Increased size for the logo */
            height: auto;
            position: absolute;
            top: 15px;
            left: 50%;
            transform: translateX(-50%);
        }

        .card-body {
            padding: 2rem;
            margin-top: 50px;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #6a1b9a;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #4a0072;
        }

        .team-section {
            margin-top: 2rem;
            padding: 1.5rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
        }

        .team-members {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .team-member {
            text-align: center;
            flex: 1;
            max-width: 150px;
            /* Adjust as needed */
            margin: 0 10px;
        }

        .team-member img {
            width: 80px;
            /* Adjust as needed */
            height: auto;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .team-member p {
            margin: 0;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-header">
                    <img src="logo.jpg" alt="Logo"> <!-- Increased size for the logo -->
                    <h3>Sign In</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="input-group form-group">
                            <input type="text" class="form-control" placeholder="username" name="id">
                        </div>
                        <div class="input-group form-group">
                            <input type="password" class="form-control" placeholder="password" name="password">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn btn-primary" name="submit">
                        </div>
                    </form>
                </div>
                <!-- Team Members Section -->
                <div class="team-section">
                    <b>
                        <p>Team Members </p>
                    </b>
                    <div class="team-members">

                        <div class="team-member">
                            <img src="https://via.placeholder.com/80" alt="Member 1">
                            <p>Karisha P</p>
                        </div>
                        <div class="team-member">
                            <img src="https://via.placeholder.com/80" alt="Member 2">
                            <p>Nisha K</p>
                        </div>
                        <div class="team-member">
                            <img src="https://via.placeholder.com/80" alt="Member 3">
                            <p>Nutan G</p>
                        </div>
                        <div class="team-member">
                            <img src="https://via.placeholder.com/80" alt="Member 4">
                            <p>Prapti G</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>