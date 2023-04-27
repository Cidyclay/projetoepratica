<?php
// Criação de um função que recebe como parametro abaixo :
function adicionarNoticia($titulo, $imagem, $texto, $video,$link)
{
    //Estou abrindo o arquivo noticiais.csv com o comando fopen e passando como parametro 'a'
    // que significa append, ou seja todos os novos conteúdos vão ser adicionados ao final do arquivo.
    $handle = fopen('noticias.csv', 'a');
    //Criei uma array que tem como parametro o titulo,imagem,text,video,link
    // obeserve que foi colocado na ordem a qual , eu quero que seja escrita. :)
    $data = [
        $titulo,
        $imagem,
        $texto,
        $video,
        $link
    ];
    //fptutcsv abre o arquivo, eu chamo a variável "$handle", que irá fazer a escrita de acordo com o parametro que eu passei
    // la em cima, e por fim o conteúdo que será escrito que contém dentro do array "$data".
    fputcsv($handle, $data);
    // Por final eu fecho o arquivo e encerro a escrita.
    fclose($handle);
}

    // Aqui o isset verifica se o valor dentro das variáveis e diferente de null, ou seja vázio
    // obs: mesmo que o usuário não coloque imagem, este código vai funcionar mesmo assim. :)
if (isset($_POST['titulo']) && isset($_POST['imagem']) && isset($_POST['texto']) && isset($_POST['link'])) {
    // Aqui estamos atribuindo o valor das variáveis, através do dados inseridos pelo usuário.
    $titulo = $_POST['titulo'];
    $imagem = $_POST['imagem'];
    $texto = $_POST['texto'];
    $link = $_POST['link'];
    $video = null;
    // Este código do youtube, verifica se a URL do youtube contém o video_ID.
    if (isset($_POST['video'])) {
        $video = explode('v=', $_POST['video'])[1];
    }
    //Caso esteja tudo correto, a função "adicionarNoticia", e chamada para fazer tudo que foi comentado acima.
    adicionarNoticia($titulo, $imagem, $texto, $video,$link);
}
// final retorne pro index.php;
header('Location: index.php');
exit;
