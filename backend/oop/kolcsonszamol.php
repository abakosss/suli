<?php
if (isset($_GET['kuld'])) {
    $osszeg = $_GET['osszeg'];
    $honap = $_GET['honap'];
    echo "A felvenni kívánt összeg: $osszeg Ft";
    echo "<br />Hónapok száma: $honap";
    $reszlet = ($osszeg * 1.0125 + $osszeg * 1.25) / $honap;
    echo "<br />Havi törlesztőrészlet: ".round($reszlet, 1)." Ft";
    echo "<br /><a href='kolcson.html'>Vissza az űrlaphoz!</a>";
}
else {
    echo "Töltse ki az űrlapot!";
    header("refresh:2; url=kolcson.html");
}