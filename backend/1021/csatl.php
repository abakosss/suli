<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    //$db_name = "szilyProjekt";

    $connect = mysqli_connect($db_server, $db_user, $db_pass); //$db_name);

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "You are connected!";

//adatbázis készítése

$sql = "DROP DATABASE IF EXISTS enABm";
$sql = "CREATE DATABASE IF NOT EXISTS enABm";

if ($connect->query($sql) === TRUE) {
    echo "Adatbázis sikeresen létrejött.";
}
else {
    echo "Hiba az adatbázis létrehozásakor: " . $connect->error;
}

$connect->close();
?>