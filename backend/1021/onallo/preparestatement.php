<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "onalloAB";

    $connect = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

$stmt = $connect->prepare("INSERT INTO autok (evjarat, tipus, rendszam) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $evjarat, $tipus, $rendszam);

$evjarat = 2012;
$tipus = "Renault Fluence";
$rendszam = "ECS004";
$stmt->execute();

$evjarat = 2003;
$tipus = "Audi A4";
$rendszam = "IUV591";
$stmt->execute();

echo "Létrejöttek az új rekordok";

$stmt->close();
$connect->close();
?>