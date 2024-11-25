<?php

function noveldErteket(&$szam) 
{
    $szam++;
    echo "$szam<br>";
}

$ertek = 5;
noveldErteket($ertek);
echo $ertek;
