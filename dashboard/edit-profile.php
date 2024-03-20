<?php
    session_start();
    include("connectdb.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <style>
        #content{
            padding: 120px 60px 80px 60px;
        }
        #content h1{
            font-size: 60px;
            color: #731212;
        }
        #content p{
            font-size: 50px;
            font-family: Impact;
        }

        #whole{
            position: relative;
        }
        #footer{
            position: absolute;
            bottom: -200px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="whole">
        <div>
            <?php
                include("site-overview/dash-header.html");
            ?>
        </div>

        <?php
                if(isset($_POST['updates'])){
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $uname = $_POST['uname'];
                    $email = $_POST['email'];

                    $userid = $_SESSION['id'];
                    $update_info = mysqli_query($connectdb, "UPDATE `registration` SET `firstname`='$fname',`lastname`='$lname',`username`='$uname',`email`='$email' WHERE id='$userid'");

                    if($update_info == true){
                        echo ("<script>alert('Update Successful!')</script>");
                    }else{
                        echo ("<script>alert('Try Again!')</script>");
                    }
                }
            ?>

        <div id="content">
            <?php
                $useridx = $_SESSION['id'];
                $get_info = mysqli_query($connectdb, "SELECT `firstname`, `lastname`, `username`, `email`, `fund` FROM `registration` WHERE id='$useridx'");
                $fetch = mysqli_fetch_array($get_info);
            ?>
            <div class="container">
                <fieldset>
                    <legend><h4>UPDATE PROFILE</h4></legend>
                    <form action="edit-profile.php" method="post">
                        <div class="form-group">
                            <label for="Firstname"><b>Firstname</b></label>
                            <input type="text" name="fname" value="<?php echo $fetch['firstname'] ?>" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                        <label for="Lastname"><b>Lastname</b></label>
                            <input type="text" name="lname" value="<?php echo $fetch['lastname'] ?>" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                        <label for="Username"><b>Username</b></label>
                            <input type="text" name="uname" value="<?php echo $fetch['username'] ?>" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                        <label for="Email"><b>Email</b></label>
                            <input type="email" name="email" value="<?php echo $fetch['email'] ?>" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label><b>Fund</b></label>
                            <b class="form-control"><?php echo $fetch['fund'] ?></b>
                        </div>
                        <div>
                            <button class="btn btn-danger" name="updates">Update</button>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>


        <div id="footer">
            <?php
                include("site-overview/dash-footer.html");
            ?>
        </div>
    </div>
</body>
</html>