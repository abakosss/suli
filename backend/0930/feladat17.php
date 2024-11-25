<?php

$tomb = array(5,8,9,1,12,20,11,27);
$tombdbszam = count($tomb);

//17
//hány elemet tartalmaz a tömb;
//van-e benne 8-nál kisebb szám

echo "<p>Ennyi elemet tartalmaz a tömb: {$tombdbszam}</p>";
vanE8nalkisebb($tomb, $tombdbszam);

function vanE8nalkisebb($tomb, $tombdbszam)
{
    $igaz = false;
    for ($i=0; $i < $tombdbszam; $i++) 
    { 
        if ($tomb[$i] < 8) {
            $igaz = true;
        }
        // print_r($tomb[$i]);
    }
    if ($igaz) {
        print_r("Van benne 8-nál kisebb szám.");
    }
    else {
        print_r("Nincs benne 8-nál kisebb szám.");
    }
}

//2,12 feladat
//válogassa szét a 10-nél kisebb, ill. nagyobb értékeket
//nagyobb van-e 20<x<=27

szetvalogatas($tomb, $tombdbszam, $tombkisebb10, $tombnagyobb10, $j, $k);

$tombkisebb10 = array(0,0,0,0,0,0,0,0);
$tombnagyobb10 = array(0,0,0,0,0,0,0,0);
$j = 0;
$k = 0;
function szetvalogatas($tomb, $tombdbszam, $tombkisebb10, $tombnagyobb10, $j, $k)
{
    for ($i=0; $i < $tombdbszam; $i++) { 
        if ($tomb[$i] < 10) 
        {
            $tombkisebb10[$j] += $tomb[$i];
            $j++;

        }
        else 
        {
            $tombnagyobb10[$k] += $tomb[$i];
            $k++;
        }
    }
    echo "<p></p>";
    print_r($tombkisebb10);
    echo "<p></p>";
    print_r($tombnagyobb10);

    for ($i=0; $i < $tombdbszam; $i++) { 
        if (20 < $tomb[$i] <=27) 
        {
            print_r("Van olyan szám, ami nagyobb mint 20, de kisebb vagy egyenlő 27-el.");
        }
    }
}

