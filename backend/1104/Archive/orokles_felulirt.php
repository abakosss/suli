<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Táblázat rugalmasan</title>
</head>
<body>

<?php
// táblázatnak van fejléce és adatai
// táblázat manipulációja
class Tablazat
{
    // adattagok
    var $oszlop_Szam;
    var $oszlop_Nevek= array();
    var $tablazat_Sorai = array();
    //konstruktor
    function __construct($oszlop_Nevek)
{
    // Táblázat kezdetkor
    // fejlécet kap
    $this->oszlop_Nevek=$oszlop_Nevek;
    $this->oszlop_Szam = count($oszlop_Nevek);
}



// beszúrni szeretnénk, de csak akkor lehet
// ha a beszúrandó sor elemszáma megegyezik $oszlop_Szam-mal
// !!! a sorokat array() formájában kapja paraméterül
function uj_Sor($sor)
{
    if (count($sor)==$this->oszlop_Szam)
    {
        // stimmel a két szám
        array_push($this->tablazat_Sorai, $sor);
        return true;
    }
    else
    {
        return false;
    }
}
// mi van akkor, ha nem a fejléc adatok sorrendjében
// jönnek az adatok a tömbben, ekkor rugalmasan kellene
// eljárni..

function uj_Nevessor ($asszoc_sor)
{
    // itt is stimmelni kell az elemszámnak
    if (count($asszoc_sor) != $this->oszlop_Szam)
    {
        print "Nem egyezik a paraméterben megadott tömb elemszáma";
        return false;
    }
    else
    {
        print "Egyeznek a számok!<br>";
        $sor=$asszoc_sor;
        // print_r($asszoc_sor);
        foreach($this->oszlop_Nevek as $oszlop_Nev)
        {
            // ha nincs megnevezve, akkor üres értéket kap
            if (!isset($asszoc_sor[$oszlop_Nev]))
            {
                $asszoc_sor [$oszlop_Nev]="";
            }
            else{
                $sor[] = $asszoc_sor[$oszlop_Nev];
            }
        }
        array_push($this->tablazat_Sorai, $sor);
    }
}

function kiir()
{
    print "<pre>";
    // fejléc bejárása ( $oszlop_Nevek= array())
    foreach($this->oszlop_Nevek as $oszlop_Nev)
    {
        print "$oszlop_Nev ";
    }
    print "<br>";
    // táblázat adatainak bejárása ( var $tablazat_Sorai = array())
    foreach($this->tablazat_Sorai as $t_Sorai)
    {
        foreach($t_Sorai as $x_Cella)
        {
        print " $x_Cella ";
        }
        print "<br>";
    }
    print "</pre>";
    }
}
$proba1=new Tablazat (array("a","b","c"));
$proba1->uj_Sor(array(6,7,8));
$proba1->uj_Sor(array(11,9,7));
$proba1->kiir();
$proba1->uj_Nevessor(array("c"=>9, "b"=>99, "a"=>9));
$proba1->uj_Nevessor(array("c"=>99, "b"=>9, "a"=>99));
print "<br>";
$proba1->kiir();

?>
</body>
</html>