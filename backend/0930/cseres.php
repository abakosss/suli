<?php
$tomb = array(11, 5, 4, 8, 7, 9);
$maxIndex = count($tomb) - 1;

function csere(&$tomb, $i, $j)
{
    $b = $tomb[$i];
    $tomb[$i] = $tomb[$j];
    $tomb[$j] = $b;
}
print_r($tomb);