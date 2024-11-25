
<?php
//includoljunk
require_once 'connect.php';
//lekérdezések a myDB adatbázisból
//query adattag
if ($eredmeny =$conn->query(query: "Select * from vendegeim where `id`>0 "))
{
//sorok magyarosítva ;)
//if igaz, ha nem nulla a visszaadott sorok száma
//echo $eredmeny->num_rows;
    if($eredmeny->num_rows)
    {
        echo '<pre>';
        while($sor=$eredmeny->fetch_assoc())
        {
            echo $sor['vezeteknev'],' ',$sor['keresztnev'], '<br />';
        }
    }
}
$eredmeny->free();
$conn->close();