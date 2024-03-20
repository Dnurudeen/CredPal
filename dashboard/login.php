<?php
    session_start();
    include ("connectdb.php");

    if(isset($_POST['login'])){
        // GET INPUT FROM FORM
        $uname = $_POST['username'];
        $pass = $_POST['passcode'];

        // CHECK DATA FROM DATABASE
        $database = mysqli_query($connectdb, "SELECT * FROM `registration` WHERE username='$uname' and password='$pass'");
        $check_db = mysqli_fetch_array($database);

        // VALIDATE DATA
        if($check_db > 0){
            $_SESSION['id'] = $check_db['id'];
            $_SESSION['username'] = $check_db['username'];
            header("location: dashboard.php");
        }else{
            echo("Invalid Input");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="text-center container" style="margin-top: 15rem">
    <h1 class="text-dark mb-3">Login System</h1>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" name="passcode" class="form-control" name="" placeholder="Password">
            </div>
            <div>
                <button class="btn btn-danger w-50" name="login">Login</button>
            </div>
        </form>

        <div class="my-4">
            Don't have an account? <a href="index.html">Register</a>
        </div>
    </div>
</body>
</html>