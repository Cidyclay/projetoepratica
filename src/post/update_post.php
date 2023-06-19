<?php
session_start();
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];
date_default_timezone_set("America/Sao_Paulo");
$dataPublicacao = date("F j, Y, H:i ");

// vai receber o conteúdo original com a modificação
$arquivoTemporario = tempnam("../../csv", "");

$criador =  $_SESSION["userUsuario"];

$original = fopen('../../csv/publis.csv', 'r');
$temp = fopen($arquivoTemporario,'w');
while(($row = fgetcsv($original)) !== false) {
    if($row[0] == $id) {
        fputcsv($temp, [$id, $titulo, $conteudo, $dataPublicacao,  $criador]);
        continue;
    }
    fputcsv($temp, $row);
}
fclose($temp);
fclose($original);
rename("../../csv/" . basename($arquivoTemporario), "../../csv/publis.csv");
header('location: /src/comunidade.php', true, 302);


?>