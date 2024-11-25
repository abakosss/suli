<?php
//includoljunk
require_once 'connect.php';
//lekérdezések a myDB adatbázisból //query adattag
// minden sor (rekord egy tömb)
if ($eredmeny =$conn->query(query: "Select * from vendegeim where `id`=1 "))
{
//sorok magyarosítva ;)
//if igaz, ha nem nulla a visszaadott sorok száma
    if($eredmeny->num_rows)
    {
        $sor=$eredmeny->fetch_array(mode: MYSQLI_ASSOC);
        //echo '<pre>';
        echo "<pre>";
        print_r($sor);
        //print_r($eredmeny);
        //alapértelmezett a 'BOTH'
    }
}
$eredmeny->free();
$conn->close();