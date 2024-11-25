<?php
if (isset($_GET['nev'])) 
{
    $nev = htmlspecialchars($_GET['nev']);
    echo "Hello, " . $nev . "!";
}
else 
{
    echo "Add meg a neved a kérésben (pl. ?nev=Jani)!";
}
