<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "enABm";

    $connect = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "You are connected!";

$stmt = $connect->prepare("INSERT INTO emberek (vezeteknev, keresztnev, beosztas) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $vezeteknev, $keresztnev, $beosztas);

$vezeteknev = "Kólás";
$keresztnev = "János2";
$beosztas = "kolasjanos@2per14.hu";
$stmt->execute();

$vezeteknev = "Manyi";
$keresztnev = "Mari2";
$beosztas = "manyimari@2per14.hu";
$stmt->execute();

echo "Létrejöttek az új rekordok";

$stmt->close();
$connect->close();
?>