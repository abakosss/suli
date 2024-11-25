<?php
print_r($_GET);
print("<br>");
print_r($_POST);
function terfogatKor($sugar, $magassag){
    $pi=pi();
return $pi * pow($sugar, 2) * $magassag;
}
function terfogatNegyzet($oldal, $magassag){
return pow($oldal,2) * $magassag;
}
function feluletKor($sugar, $magassag){
    $pi=pi();
    return 2*$pi*$sugar($sugar, $magassag);
}
function feluletNegyzet($oldal, $magassag){
return 2*($oldal*$oldal+$oldal);
}
$hiba='';
$ertek='';
$magassag='';
$tipus=$_POST['tipus'] ?? 'kor';

if($_POST){
    $ertek=$_POST['ertek'] ?? '';
    $magassag=$_POST['magassag'] ?? '';

    $hiba='';
    if(empty($ertek)){
        $hiba='sugar/oldal hianyzik!';
    }else if(empty($magassag)){
    $hiba = 'magassag hianyzik' ;
    }else if(!is_numeric($magassag)){
    $hiba='magassag nem szam'   ;
    }
    else if(!is_numeric($ertek)){
    $hiba='sugar/oldal nem szam';
    }

    if(!$hiba){
        if($tipus == 'kor'){
            $terfogat= terfogatKor($ertek, $magassag);
            $felulet = feluletKor($ertek, $magassag);
        }
        else if($tipus=='negyzet'){
            $terfogat=terfogatNegyzet($ertek, $magassag);
            $felulet=feluletKor($ertek, $magassag);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testek</title>
</head>
<body>
    <?php if($hiba) : ?>
        <p><?php echo $hiba; ?></p>
    <?php endif; ?>
    <form action ="" method="post">
        <label>
            Válassz típust:
            <select name="tipus">
            <option value="kor" <?php if($tipus=='kor') echo 'selected'; ?>>Kör alapú hasáb</option>
            <option value="negyzet" <?php if($tipus=='negyzet') echo 'selected'; ?>>Négyzet alapú hasáb</option>
        </select>
        </label><br>
        Sugár/Oldal
        <input type="text" name="ertek" value="<?php echo $ertek; ?>"><br>
        Magasság:
        <input type="text" name="magassag" value="<?php echo $magassag; ?>"><br>
        <input type="submit" value="Számítás">
    </form>
    <?php if (isset($terfogat)) : ?>
        <p>Magasság=<?php echo $magassag; ?></p>
        <p><?php echo ($tipus == 'kor') ? "Sugar" : "Oldal"; ?>=<?php echo $ertek; ?></p>
        <p>Térfogat = <?php echo $terfogat; ?></p>
        <p>Felület = <?php echo $felulet ?></p>
        <?php endif; ?>
</body>
</html>