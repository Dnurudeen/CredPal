<?php
    include ("connectdb.php");

    if(isset($_POST["submit"])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        // $cpass = $_POST['cpass'];

        $insert_into = mysqli_query($connectdb, "INSERT INTO `registration` (`firstname`, `lastname`, `username`, `email`, `password`) VALUES ('$fname', '$lname', '$uname', '$email', '$pass')");
        // $match_pass = ($pass == $cpass);

        if($insert_into){
            echo ("Registration Successful!");
        }else{
            echo ("Pls, Try Again!");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="" method="post">
            <input type="text" name="fname" placeholder="Firstname" id=""><br><br>
            <input type="text" name="lname" placeholder="Lastname"> <br><br>
            <input type="text" name="uname" placeholder="Username"> <br><br>
            <input type="email" name="email" placeholder="Email address"><br><br>
            <input type="password" name="pass" placeholder="Password"> <br><br>
            <!-- <input type="password" name="cpass" placeholder="Confirm Password"> <br><br> -->

            <button name="submit">Submit</button>
        </form>
    </div>
</body>
</html>