<?php
//includoljunk
require_once 'connect.php';
//lekérdezések a myDB adatbázisból
//query adattag
$result =$conn->query("Select * from vendegeim");
//echo '<pre>';
//print_r($result);
//eredmények feldolgozásához:
//Összetett tömbbe
$tomb = $result->fetch_all();
/*echo '<pre>';
print_r($tomb);
*/
foreach($tomb as $sor)
{
    foreach ($sor as $rekord)
    {
        echo $rekord . '';
    }
    echo '<br />';
}

//vivigszaladhatnánk két ciklussal és indexelhetnénk, így kiiratva az eredményt:
echo $tomb[0][1];
echo '<br />';
$conn->close();
?>