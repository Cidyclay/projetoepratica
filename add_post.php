<?php

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];

date_default_timezone_set("America/Sao_Paulo");
$dataPublicacao = date("F j, Y, H:i ");

$fp = fopen('publis.csv', 'a');
fputcsv($fp, [$id, $titulo, $conteudo, $dataPublicacao]);

http_response_code(302);
header('location:comunidadeSocial.php');

?>