<?php
//includoljunk
require_once 'connect.php';
//lekérdezések a myDB adatbázisból
//query adattag
$result =$conn->query("Select * from vendegeim"); //echo '<pre>';
//print_r($result);
//eredmények feldolgozásához:
//Összetett tömbbe, de ASSZOCIATÍVAN
$tomb =$result->fetch_all(MYSQLI_BOTH);
echo '<pre>';
print_r($tomb);
echo '<br />';
/*
foreach($tomb as $sor)
{
foreach($sor as $rekord)
{
echo $rekord. ' ';
}
echo '<br />';
}
*/
//vivigszaladhatnánk két ciklussal és indexelhetnénk, így kiiratva az eredményt:
echo $tomb[0]['email'];
echo '<br />';
$result->free();
$conn->close();
?>