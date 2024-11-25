<?php
//includoljunk
require_once 'connect.php';
//lekérdezések a myDB adatbázisból
//query adattag
if ($eredmeny =$conn->query(query: "Select * from filmek "))
{
    if($eredmeny->num_rows)
    {
        echo '<pre>';
        $tomb=array();
        while($sor=$eredmeny->fetch_object())
        {
        array_push($tomb, $sor); // echo $sor->vezeteknev .
        $sor->keresztnev . '<br /';
        }
    }
}
foreach($tomb as $sor)
{
    foreach ($sor as $rekord)
    {
    echo $rekord. '<br /> ';
    }
}
$eredmeny->free();
$conn->close();