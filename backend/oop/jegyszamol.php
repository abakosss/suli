<?php
if (isset($_GET['kuld'])) {
    $tavolsag = $_GET['tavolsag'];
    $tipus = $_GET['tipus'];
    $kedvezmeny = $_GET['kedvezmeny'];
    echo "Üdvözlöm!<br>A kapott adatok:";
    echo "<br>Távolság: $tavolsag";
    $fizetendo = $tavolsag * 50 * $kedvezmeny * $tipus;
    echo "<br><b>Fizetendő összeg: $fizetendo Ft</b>";
    echo "<br><a href='jegyrendeles.html'>Vissza az űrlaphoz!</a>";
}
else {
    echo "Töltse ki az űrlapot!";
    header("refresh:2; url=jegyrendeles.html");
}