<?php

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];
date_default_timezone_set("America/Sao_Paulo");
$dataPublicacao = date("F j, Y, H:i ");

// vai receber o conteúdo original com a modificação
$arquivoTemporario = tempnam('.','');


$original = fopen('publis.csv', 'r');
$temp = fopen($arquivoTemporario,'w');
while(($row = fgetcsv($original)) !== false) {
    if($row[0] == $id) {
        fputcsv($temp, [$id, $titulo, $conteudo, $dataPublicacao]);
        continue;
    }
    fputcsv($temp, $row);
}
fclose($temp);
fclose($original);

rename($arquivoTemporario, 'publis.csv');

header('location: comunidadeSocial.php');


?>