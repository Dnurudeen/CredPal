<?php
    session_start();
    include("connectdb.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <style>
        #content{
            padding: 120px 60px 80px 60px;
        }
        #content th{
            width: 20%;
        }
        #content th,td{
            padding: 20px;
        }

        #whole{
            position: relative;
        }
        #footer{
            position: absolute;
            bottom: -240px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="whole">
        <div id="header">
            <?php
                include("site-overview/dash-header.html");
            ?>
        </div>

        <?php 
            $userid = $_SESSION['id'];
            $get_info = mysqli_query($connectdb, "SELECT * FROM `registration` WHERE id='$userid'");
            $fetch = mysqli_fetch_array($get_info);
        ?>
        <div id="content">
            <fieldset>
                <legend><h4>PROFILE</h4></legend>

                <table border="1" width="100%">
                    <tr>
                        <th>Fullname</th>
                        <td> <?php echo $fetch['firstname'] . ' ' . $fetch['lastname']; ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><?php echo $fetch['username'] ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $fetch['email'] ?></td>
                    </tr>
                    <tr>
                        <th>Fund</th>
                        <td><?php echo $fetch['fund'] ?></td>
                    </tr>
                </table>
            </fieldset>
        </div>

        <div id="footer">
            <?php
                include("site-overview/dash-footer.html");
            ?>
        </div>
    </div>
</body>
</html>