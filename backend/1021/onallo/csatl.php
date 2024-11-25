<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";

    $connect = mysqli_connect($db_server, $db_user, $db_pass);

//adatbázis készítése

$sql = "DROP DATABASE IF EXISTS onalloAB";
$sql = "CREATE DATABASE IF NOT EXISTS onalloAB";

if ($connect->query($sql) === TRUE) {
    echo "Adatbázis sikeresen létrejött.";
}
else {
    echo "Hiba az adatbázis létrehozásakor: " . $connect->error;
}

$connect->close();
?>