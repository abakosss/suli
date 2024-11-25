
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";



$kapcsolat = mysqli_connect($servername, $username, $password, $dbname);
//a kapcsolat ellenőrzése
if(!$kapcsolat)
{
die('Kapcsolódási hiba ('.mysqli_connect_errno().') '.mysqli_connect_error());
}