<?php
    $server = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "new_app";

    $connectdb = mysqli_connect($server, $dbuser, $dbpass, $dbname);

    if(!$connectdb){
        echo "Not connected!";
    }
?>