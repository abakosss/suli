<?php
$tomb = array(11, 5, 4, 8, 7, 9);
$maxIndex = count($tomb) - 1;

function csere(&$tomb, $i, $j)
{
    $b = $tomb[$i];
    $tomb[$i] = $tomb[$j];
    $tomb[$j] = $b;
}

for ($i = $maxIndex; $i >= 1; $i--) {
    for ($j = 0; $j <= $i - 1; $j++) {
        if ($tomb[$j] > $tomb[$j + 1]) {
            csere($tomb, $i, $j);
        }
    }
}
print_r($tomb);
