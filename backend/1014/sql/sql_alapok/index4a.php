<?php
//includoljunk
require_once 'connect.php';
//lekérdezések a myDB adatbázisból
//query adattag
if ($eredmeny =$conn->query(query: "Select * from vendegeim where `id`<3 "))
{
    if($eredmeny->num_rows)
    {
        echo '<pre>';
        $tomb=array();
        while($sor=$eredmeny->fetch_object())
        {
            array_push($tomb, $sor); // echo $sor->vezeteknev ..
        }
    }
}
print_r($tomb);
echo $tomb[0]->keresztnev; //tagkijeleölő operátorral
$eredmeny->free();
$conn->close();