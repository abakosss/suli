<!-- 5,9,13 -->

<!-- 5. A $bemenetitomb-ből válogassok ki $kimenetitomb-be a [2..16] (azaz
2<=x<=16) számokat (kiválogatás). A kapott $kimenetitomb-ben benna
van-e a 14-es szám? (eldöntés) -->

<!-- 9. Összetettebb feladatok: Válogassuk szét $bemenetitomb-öt két részre,
10-nél nagyobb, illetve 10-nél kisebb-egyenlő feltételekkel. Számoljuk
meg a kimeneti tömbök elemszámát. (megszámolás). Melyik kimeneti
tömb tartalmaz több elemet? -->

<!-- 13. Rendezések: $bemenetitomb rendezése maximumkiválasztásos
rendezéssel. -->

<?php
    $bemenetitomb = array(10, 6, 17, 25, 32, 4, 5, 1, 2, 12, 14, 13);
    $kimenetitomb = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $j = 0;
    $k = 0;
    $vanebenne14 = false;
// 5. feladat

    function feladat5($bemenetitomb, $kimenetitomb, $j, $k, $vanebenne14)
    {
        for ($i = 0; $i < count($bemenetitomb); $i++) {
            if ($bemenetitomb[$i] >= 2 && $bemenetitomb[$i] <= 16) {
                $kimenetitomb[$j] += $bemenetitomb[$i];
                $j++;
            }
            else {
                $bemenetitomb[$k] += $bemenetitomb[$i];
                $k++;
            }
            if ($kimenetitomb[$i] = 14) {
                $vanebenne14 = true;
            }
        }
        echo "<p>Bemeneti tömb:</p>";
        print_r($bemenetitomb);
        echo "<p>Kimeneti tömb:</p>";
        print_r($kimenetitomb);
        echo "<br>";
        echo "<br>";
        if ($vanebenne14) {
            print_r("Van benne 14-es szám.");
        }
        else {
            print_r("Nincs benne 14-es szám.");
        }

    }
    
    echo "<p>5. feladat</p>";
    feladat5($bemenetitomb, $kimenetitomb, $j, $k, $vanebenne14);

    //9. feladat

    $tombkisebb10 = array(0,0,0,0,0,0,0,0,0,0,0,0);
    $tombnagyobb10 = array(0,0,0,0,0,0,0,0,0,0,0,0);
    $j = 0;
    $k = 0;
    function feladat9($bemenetitomb, $tombkisebb10, $tombnagyobb10, $j, $k)
        {
            for ($i=0; $i < count($bemenetitomb); $i++) { 
                if ($bemenetitomb[$i] < 10) 
                {
                    $tombkisebb10[$j] += $bemenetitomb[$i];
                    $j++;

                }
                else 
                {
                    $tombnagyobb10[$k] += $bemenetitomb[$i];
                    $k++;
                }
            }

            
            echo "<p>Kisebb mint 10 tömb:</p>";
            print_r($tombkisebb10);
            echo "<p>Kisebb mint 10 tömb elemszáma:{$j}</p>";
            echo "<p>Nagyobb mint 10 tömb:</p>";
            print_r($tombnagyobb10);
            echo "<p>Nagyobb mint 10 tömb elemszáma:{$k}</p>";
            
            if ($j > $k) {
                echo "A kisebb mint 10 tömb tartalmaz több elemet.";
            }
            else {
                echo "A nagyobb mint 10 tömb tartalmaz több elemet.";
            }
        }
        
    echo "<p>9. feladat</p>";
    feladat9($bemenetitomb, $tombkisebb10, $tombnagyobb10, $j, $k);

// 13. feladat: Rendezések: $bemenetitomb rendezése maximumkiválasztásos
// rendezéssel.

$maxIndex = 0;

function feladat13(&$bemenetitomb, $maxIndex)
{
    for ($i=0; $i < count($bemenetitomb); $i++) { 
        for ($j=0; $j < count($bemenetitomb)-$i; $j++) { 
            if ($bemenetitomb[$j] > $bemenetitomb[$maxIndex]) {
                $maxIndex = $j;
            }
        }
        $max = $bemenetitomb[count($bemenetitomb) - $i - 1];
        $bemenetitomb[count($bemenetitomb) - $i - 1] = $bemenetitomb[$maxIndex];
        $bemenetitomb[$maxIndex] = $max;
    }
    echo "<p>Rendezett tömb:</p>";
    print_r($bemenetitomb);
}
echo "<p>13. feladat</p>";
feladat13($bemenetitomb, $maxIndex);
?>