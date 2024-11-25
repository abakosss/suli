<?php
    $tomb = array(5, 5, 5, 5, 5);
    $n = count($tomb); //tömb elemszám
    $van = true; //kitűnő
    $i = 0; //ciklus lépések
    while (($i <= $n-1) && ($tomb[$i] == 5)) {
        $i++;
    }
    print($i."  ".$n."\n");
    
    if ($i<$n) 
        print("Nem kítűnő a srác");
    else
        print("Kitűnő a srác");
    
?>
