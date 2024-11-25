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
            <option value="beszurasos_rendezes">Beszúrásos rendezés</option>
            <option value="cseres_rendezes">Cserés rendezés</option>
            <option value="minkivalasztas">Minimum kiválasztása tétele</option>
            <option value="szetvalogatas">Szétválogatás tétele</option>
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

$tombkisebb10 = array(0,0,0,0,0,0,0,0);
$tombnagyobb10 = array(0,0,0,0,0,0,0,0);
$j = 0;
$k = 0;

    function szetvalogatas($tomb, $tombkisebb10, $tombnagyobb10, $j, $k)
    {
        for ($i=0; $i < count($tomb); $i++) { 
            if ($tomb[$i] <= 5) 
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
        return [$tombkisebb10, $tombnagyobb10];
    }

$ertekek = szetvalogatas($tomb, $tombkisebb10, $tombnagyobb10, $j, $k);


    // Program futtatás
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tetel = $_POST['tetel'];
        kiir_tomb($tomb);

        // Tételek futtatása
        switch ($tetel) {
            
            case "beszurasos_rendezes":
                echo "<h3>Beszúrásos rendezés eredménye: " . implode(", ", beszurasos_rendezes($tomb)) . "</h3>";
                break;
            case "cseres_rendezes":
                echo "<h3>Cserés rendezés eredménye: " . implode(", ", cseres_rendezes($tomb)) . "</h3>";
                break;
            case "szetvalogatas":
                echo "<h3>Kisebb mint 5 tömb: " . implode(", ", $ertekek[0]) . "</h3>";
                echo "<h3>Nagyobb mint 5 tömb: " . implode(", ", $ertekek[1]) . "</h3>";
                break;
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
    }

    
    ?>
</body>
</html>
