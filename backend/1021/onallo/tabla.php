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
    
//tabla letrehozas
$sql = "DROP TABLE IF EXISTS autok";
$sql = "CREATE TABLE IF NOT EXISTS autok(
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
evjarat INT(4) NOT NULL,
tipus VARCHAR(50) NOT NULL,
rendszam VARCHAR(8) UNIQUE
)";

if ($connect->query($sql) === TRUE) {
    echo "Sikeres tábla létrehozás";
}
else {
    echo "Hiba a létrehozáskor: " . $connect->error;
}

$connect->close();
?>