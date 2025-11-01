<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "todo_db";
    $con = mysqli_connect($host, $user, $pass, $dbname);

    if(!$con){
        die("Database Connection Failed" . mysqli_connect_error());
    }
?>