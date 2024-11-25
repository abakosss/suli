<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "mysqlphp";
    $connect = "";

    $connect = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if ($connect) {
        echo"You are connected!";
    }
    else {
        echo"Something went wrong!";
    }
?>