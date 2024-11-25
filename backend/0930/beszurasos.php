<?php
$tomb = array(11, 5, 4, 8, 7, 9);
$maxIndex = count($tomb) - 1;
for ($i = 0; $i <= $maxIndex; $i++) {
    $kezbe = $tomb[$i];
    $j = $i - 1;
    while (($j >= 0) && ($tomb[$j] > $kezbe)) {
        $tomb[$j + 1] = $tomb[$j];
        $j--;
    }
    $tomb[$j + 1] = $kezbe;
}
print_r($tomb);
