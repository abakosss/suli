<?php

function kiirTomb ($tomb, $cimke = ''): void{
    echo "<b>{$cimke}</b>";
    echo '<pre>';
    print_r($tomb);
    echo '</pre>';
}

kiirTomb (tomb: $_GET, cimke: 'GET');
kiirTomb (tomb: $_POST, cimke: 'POST');