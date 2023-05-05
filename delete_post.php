<?php
$id = $_GET['id'];

$tempName = tempnam('.','');

$fpOriginal = fopen('noticias.csv','r');
$fpTemp = fopen($tempFile,'w');

while (($row = fgetcsv($fpOriginal)) !==false){
if($row[0] !== $nome){
    fputcsv($fpTemp, $row);

}
fclose($fpOriginal);
fclose($fpTemp);

rename($tempFile, 'noticias.csv');

header('location: index.php');

}


