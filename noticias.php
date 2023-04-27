<?php
function lerNoticias() {
    // Um array chamado $noticias para receber o conteúdo do arquivo csv.
    $noticias = array();
    // Caso o arquivo csv seja aberto com sucesso, leia 
    if (($handle = fopen("noticias.csv", "r")) !== FALSE) {
        // Com a condição atentidada, $data recebe todo o conteúdo do arquivo csv.
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            $noticias[] = $data;
        }
        // fecha o arquivo csv
        fclose($handle);
    }
        // retorna as noticiais
    return $noticias;
}

function exibirNoticias()
{
    // A variável noticiais agora receber a função ler noticiais.
    $noticias = lerNoticias();
    // Vai LÊ todo o conteúdo da variável
    foreach ($noticias as $noticia) {
        //Será exibido na tela da seguinte maneira
        //Obs: pode observar que cada tag pode ser personalizada
        // para maneira que você quer que ela apareça, mesmo dentro de um echo.
        echo '<div class="noticia">';
        echo '<h2>' . $noticia[0] . '</h2>';
        echo '<img src="' . $noticia[1] . '" width="500"><br>';
        echo '<p>' . $noticia[2] . '</p>';
        echo '<a href ="' . $noticia[4] . ' "target ="_blank"> Clique aqui para acessar a notícia !!</a>';
        if ($noticia[3] != '') {
            echo '<div class="video-container">';
            echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $noticia[3] . '" frameborder="0" allowfullscreen></iframe>';
            echo '</div>';
        }
    }
}
