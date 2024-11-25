<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "onalloAB";

    $connect = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

//adatbázis készítése

$sql = "DROP TABLE autok";

if ($connect->query($sql) === TRUE) {
    echo "Tábla sikeresen törölve.";
}
else {
    echo "Hiba: " . $connect->error;
}

$connect->close();
?>