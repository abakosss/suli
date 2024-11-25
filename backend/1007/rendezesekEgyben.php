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
            <option value="buborekos_rendezes">Buborékos rendezés</option>
            <option value="beszurasos_rendezes">Beszúrásos rendezés</option>
            <option value="maxkiv_rendezes">Maximumkiválasztásos rendezés</option>
            <option value="cseres_rendezes">Cserés rendezés</option>
        </select>
        <br><br>
        <input type="submit" value="Futtatás">
    </form>

    <?php
    // Teszt tömb adatok
    $tomb = array(8, 2, 5, 3, 7);

    // Függvények
    function kiir_tomb($tomb)
    {
        echo "<h3>Tömb elemei: " . implode( ", ", $tomb) . "</h3>";
    }

    function beszurasos_rendezes($tomb) {
        for ($i = 1; $i < count($tomb); $i++) {
            $aktualis = $tomb[$i];
            $j = $i - 1;
            while ($j >= 0 && $tomb[$j] > $aktualis) {
                $tomb[$j + 1] = $tomb[$j];
                $j--;
            }
            $tomb[$j + 1] = $aktualis;
        }
        return $tomb;
    }

    function maxkivalasztasos_rendezes($tomb) {
        for ($i = count($tomb) - 1; $i > 0; $i--) {
            $maxIndex = 0;
            for ($j = 1; $j <= $i; $j++) {
                if ($tomb[$j] > $tomb[$maxIndex]) {
                    $maxIndex = $j;
                }
            }
            // Csere
            $temp = $tomb[$i];
            $tomb[$i] = $tomb[$maxIndex];
            $tomb[$maxIndex] = $temp;
        }
        return $tomb;
    }

    function cseres_rendezes($tomb) 
    {
        for ($i = 0; $i <= count($tomb)-2; $i++) 
            for ($j = $i+1; $j <= count($tomb)-1; $j++)
            if($tomb[$i]>$tomb[$j])
            {
                $temp = $tomb[$i];
                $tomb[$i] = $tomb[$j];
                $tomb[$j] = $temp;
            }  
        return $tomb;   
    }

    function buborekos_rendezes($tomb) 
    {
        for ($i = 0; $i <= count($tomb)-2; $i++) 
            for ($j = $i+1; $i <= count($tomb)-1; $i++)
            if($tomb[$i]>$tomb[$j])
            {
                $temp = $tomb[$i];
                $tomb[$i] = $tomb[$j];
                $tomb[$j] = $temp;
            }  
        return $tomb;   
    }

    // Program futtatás
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tetel = $_POST['tetel'];
        kiir_tomb($tomb);

        // Tételek futtatása
        switch ($tetel) {
            
            case "buborekos_rendezes":
                echo "<h3>Buborékos rendezés eredménye: " . implode(", ", beszurasos_rendezes($tomb)) . "</h3>";
                break;
            case "beszurasos_rendezes":
                echo "<h3>Beszúrásos rendezés eredménye: " . implode(", ", beszurasos_rendezes($tomb)) . "</h3>";
                break;
            case "maxkiv_rendezes":
                echo "<h3>Maximum kiválasztásos rendezés eredménye: " . implode(", ", maxkivalasztasos_rendezes($tomb)) . "</h3>";
                break;
            case "cseres_rendezes":
                echo "<h3>Cserés rendezés eredménye: " . implode(", ", cseres_rendezes($tomb)) . "</h3>";
                break;
        }
    }
    ?>
</body>
</html>
