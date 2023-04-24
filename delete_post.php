<?php

$id = $_GET['id'];


$arquivoTemporario = tempnam('.','');


$original = fopen('publis.csv', 'r');
$temp = fopen($arquivoTemporario,'w');
while(($row = fgetcsv($original)) !== false) {
    if($row[0] == $id) {
        continue;
    }
    fputcsv($temp, $row);
}

fclose($temp);
fclose($original);

rename($arquivoTemporario, 'publis.csv');

header('location: comunidadeSocial.php');


?>