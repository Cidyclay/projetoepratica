<?php

$id = $_GET['id'];

$arquivoTemporario = tempnam("../../csv", "");

$original = fopen('../../csv/publis.csv', 'r');
$temp = fopen($arquivoTemporario,'w');
while(($row = fgetcsv($original)) !== false) {
    if($row[0] == $id) {
        continue;
    }
    fputcsv($temp, $row);
}

fclose($temp);
fclose($original);
rename("../../csv/" . basename($arquivoTemporario), "../../csv/publis.csv");
header('location: /src/comunidade.php', true, 302);


?>