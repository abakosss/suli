
<?php
//includoljunk
require_once 'connect.php';
if($conn->query(query: "Delete from `filmek` where `cím`='Ez az' "))
{
    echo $conn->affected_rows;
}
$conn->close();