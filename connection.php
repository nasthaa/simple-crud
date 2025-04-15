<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "praktikum12";

    $con = mysqli_connect($host, $user, $pass, $db);
    if(!$con){
        die("Connection Failed: " . mysqli_connect_error());
    }
    // echo"Connection Successful!";
?>