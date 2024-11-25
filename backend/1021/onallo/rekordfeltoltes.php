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

$sql = "INSERT INTO autok (evjarat, tipus, rendszam)
VALUES (2006, 'Peugeot 207', 'AAGL818'),
(2005, 'Mazda 3', 'JYK393'),
(2016, 'Citroen C3', 'SEV001')";

if ($connect->query($sql) === TRUE) {
    echo "Új rekordok felvétele sikerült.";
}
else {
    echo "Hiba: " . $sql . "<br>" . $connect->error;
}

$connect->close();
?>