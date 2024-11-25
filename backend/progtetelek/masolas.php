<?php
    $tomb = array(8, 3, 5, 6, 7);
    $tomb2 = array(0, 0, 0, 0, 0);
    for ($i=0; $i < 5; $i++) { 
        $tomb2[$i] = $tomb[$i]*2;
    }
    print_r($tomb); print"<br>";
    print_r($tomb2); print"<br>";
?>
<!-- feladat: a tömbünk 2x-esét másoljuk be a tomb2-be -->
