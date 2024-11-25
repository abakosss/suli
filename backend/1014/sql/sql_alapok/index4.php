<?php
//includoljunk
    require_once 'connect.php';
//lekérdezések a myDB adatbázisból
//query adattag
if ($eredmeny =$conn->query("Select * from vendegeim where `id`=2 "))
{
    if($eredmeny->num_rows)
    {
        $sor=$eredmeny->fetch_object();
        //echo '<pre>';
        //print_r($sor);
        echo $sor->keresztnev;


    }
}
$eredmeny->free();
$conn->close();