<?php
    session_start();
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];

    $criador =  $_SESSION["userUsuario"];



    date_default_timezone_set("America/Sao_Paulo");
    $dataPublicacao = date("F j, Y, H:i ");

    $fp = fopen("../../csv/publis.csv", "a");
    fputcsv($fp, [$id, $titulo, $conteudo, $dataPublicacao, $criador]);
    fclose($fp);
    header('location: /src/comunidade.php', true, 302);