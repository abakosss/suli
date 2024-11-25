<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "onalloAB";

    $connect = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

$sql = "SELECT * FROM autok";
$eredmeny = $connect->query($sql);

if ($eredmeny->num_rows > 0) {
    # minden adat a sorokból
    while ($row = $eredmeny->fetch_assoc()) {
        echo "id: " . $row["id"] . " - evjarat: " . $row["evjarat"]. " típus: " . $row["tipus"]. " rendszám: " .  $row["rendszam"].   "<br>";
    }
}
else {
    echo "0 rekord az eredmeny";
}

$connect->close();
?>