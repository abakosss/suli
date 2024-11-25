<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Programozási Tételek</title>
</head>
<body>
    <h2>Válassz programozási tételt:</h2>
    <form method="POST" action="">
        <select name="tetel">
            <option value="osszegzes">Összegzés tétele</option>
            <option value="maxkivalasztas">Maximum kiválasztása tétele</option>
            <option value="minkivalasztas">Minimum kiválasztása tétele</option>
            <option value="eldontes">Eldöntés tétele (van-e 5-nél nagyobb szám)</option>
            <option value="kereses">Keresés tétele (van-e 5-ös szám)</option>
        </select>
        <br><br>
        <input type="submit" value="Futtatás">
    </form>

    <?php

    // Teszt tömb adatok
    $tomb = array(8, 2, 5, 3, 7);

    // A tömb kiírása
    echo "<h3>Tömb elemei: " . implode(", ", $tomb) . "</h3>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tetel = $_POST['tetel'];

        

        // Összegzés tétele
        if ($tetel == "osszegzes") {
            $osszeg = 0;
            for ($i = 0; $i < count($tomb); $i++) {
                $osszeg += $tomb[$i];
            }
            echo "<h3>Összegzés eredménye: " . $osszeg . "</h3>";
        }

        // Maximum kiválasztása tétele
        if ($tetel == "maxkivalasztas") {
            $max = $tomb[0];
            for ($i = 1; $i < count($tomb); $i++) {
                if ($tomb[$i] > $max) {
                    $max = $tomb[$i];
                }
            }
            echo "<h3>Maximum kiválasztása eredménye: " . $max . "</h3>";
        }

        // Minimum kiválasztása tétele
        if ($tetel == "minkivalasztas") {
            $min = $tomb[0];
            for ($i = 1; $i < count($tomb); $i++) {
                if ($tomb[$i] < $min) {
                    $min = $tomb[$i];
                }
            }
            echo "<h3>Minimum kiválasztása eredménye: " . $min . "</h3>";
        }

        // Eldöntés tétele (van-e 5-nél nagyobb szám)
        if ($tetel == "eldontes") {
            $vanNagyobb = false;
            for ($i = 0; $i < count($tomb); $i++) {
                if ($tomb[$i] > 5) {
                    $vanNagyobb = true;
                    break;
                }
            }
            if ($vanNagyobb) {
                echo "<h3>Eldöntés: Van 5-nél nagyobb szám a tömbben.</h3>";
            } else {
                echo "<h3>Eldöntés: Nincs 5-nél nagyobb szám a tömbben.</h3>";
            }
        }

        // Keresés tétele (van-e 5-ös szám)
        if ($tetel == "kereses") {
            $vanOt = false;
            for ($i = 0; $i < count($tomb); $i++) {
                if ($tomb[$i] == 5) {
                    $vanOt = true;
                    break;
                }
            }
            if ($vanOt) {
                echo "<h3>Keresés: Van 5-ös szám a tömbben.</h3>";
            } else {
                echo "<h3>Keresés: Nincs 5-ös szám a tömbben.</h3>";
            }
        }
    }
    ?>
</body>
</html>