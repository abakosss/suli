<?php
$servername = "localhost";
$username = "root";
$password= "";
$dbname= "myDB";
// csatlakozás létrehozása
$conn = new mysqli ($servername, $username, $password, $dbname);
// csatlakozás ellenőrzése
// következő szám az errorszám
//echo $conn->connect_errno;
if ($conn->connect_error) {
//ha hiba van die-al megöljük a csatlakozást
die("Csatlakozási hiba: " . $conn->connect_error);
} 
else 
{
    echo 'Kapcsolat létrejött';
}
echo '<br />';
// $conn->close();
?>