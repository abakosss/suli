<?php
    $tomb = array(5, 5, 5, 5, 5);
    $tomb_elemekszam = $n = count($tomb);
    print_r($tomb); print"<br>";
    print_r($tomb_elemekszam); print"<br>";
    $kituno = true;
    for ($i=0; $i < 5; $i++) { 
        if ($tomb [$i]<5) {
            $kituno = false;
        }
    }
    if ($kituno)
        print("Kitűnő a srác.");
    else
        print("NEM kitűnő a srác.");
    
?>
