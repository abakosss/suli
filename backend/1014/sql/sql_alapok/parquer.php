
<?php //includoljunk
require_once 'connect.php';
if(isset($_GET['kateg']) and !empty($_GET['kateg']))
{
    $kategoria=trim($GET['kateg']);
    $plek = $conn->prepare("Select `cím` from `filmek` where `kategória`=?");
    $plek->bind_param('s', $kategoria);
    $plek->execute();
    $plek->bind_result($cim);
    while($plek->fetch())
    {
        echo $cím . '<br />';
    }
}
$conn->close();