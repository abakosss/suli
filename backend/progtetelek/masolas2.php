<?php
    $tomb1 = array("a","b","c","d");
    $osszefuz = $tomb1[0];
    for ($i=1; $i < count($tomb1); $i++) { 
        $osszefuz = $osszefuz.$tomb1[$i];
    }
    print($osszefuz);
?>