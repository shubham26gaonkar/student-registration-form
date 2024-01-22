<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="ajax-final";
    $con= new mysqli($host, $user, $pass, $db);

    if (!$con){
        die(mysqli_error($con));
    }
?>