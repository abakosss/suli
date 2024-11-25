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
    
//tabla letrehozas
$sql = "DROP TABLE IF EXISTS emberek";
$sql = "CREATE TABLE IF NOT EXISTS emberek(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
vezeteknev VARCHAR(30) NOT NULL,
keresztnev VARCHAR(30) NOT NULL,
beosztas VARCHAR(50),
regiszt_datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($connect->query($sql) === TRUE) {
    echo "Sikeres tábla létrehozás";
}
else {
    echo "Hiba a létrehozáskor: " . $connect->error;
}

$connect->close();
?>