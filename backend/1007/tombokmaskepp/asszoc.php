<?php
// kulcsokat névvel látjuk else
$gk = array("Főnök"=>"SBC-123", "Könyvelő"=>"BHZ-543", "Projektfelelős"=>"DDD-456");

echo "Főnök a/az" . $gk['Főnök'] . ". rendszámú kocsival jár." . "<br />";

//kiiratom az egészet
foreach($gk as $x => $x_value) {
    echo "Kulcs=" . $x . ", Érték=" . $x_value;
    echo "<br>";
}

// adjunk hozzá valakit
$gk['Portás'] = "POR001";

echo "Portás " . $gk['Portás'] . "rendszámú kocsival jár." . "<br />";

//kiiratom az egészet újra
foreach($gk as $x => $x_value) {
    echo "Kulcs=" . $x . ", Érték=" . $x_value;
    echo "<br>";
}

// érték szerint
print "Érték szerint" . "<br>";
    asort ($gk);
    $tombszel = count($gk);
foreach($gk as $x => $x_value) {
    echo "Kulcs=" . $x . ", Érték=" . $x_value;
    echo "<br>";
}
print "<br>";
print "Kulcs szerint" . "<br>";

ksort($gk); 
// kulcs szerint
foreach ($gk as $x => $x_value) {
    echo "Kulcs=" . $x . ", Érték=" . $x_value;
    echo "<br>";
}
print "<br>";
// fordítva
print "Fordítva" . "<br>";
    arsort ($gk);
foreach($gk as $x => $x_value) {
    echo "Kulcs=" . $x . ", Érték=" . $x_value;
    echo "<br>";
}
print "<br>";
?>