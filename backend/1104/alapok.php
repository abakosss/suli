<?php
class elso_Osztaly{
    var $nev = "Gizella";
}

$obj1 = new elso_Osztaly();
$obj2 = new elso_Osztaly();
print "\$obj1 " . gettype($obj1) . " típusú<br>";
print "\$obj2 " . gettype($obj2) . " típusú<br>";
?>