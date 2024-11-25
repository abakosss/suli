
<?php
//includoljunk
require_once 'connect.php';
if ($conn->query("Update `filmek set `hossz`=123 where `cím`='Csillagok háborúja' "))
{
    echo $conn->affected_rows;
}
$conn->close();
?>