<?php


$conteudo = file_get_contents('dados.json'); //VocÊ pode utilizar API(com  CURL, e utilizar a função json_decode); Utilizei
// um dados.json por conta do limite de requests da api.
$data = json_decode($conteudo, true);


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste API</title>
</head>

<body>
    <?php for ($i = 0; $i <= 4; $i++) {
        $dataUtc = $data['news_results'][$i]['date_utc'];

        $dataBrasil = date('d/m/Y H:i:s', strtotime($dataUtc));
    ?>
        <h1><?= $data['news_results'][$i]['title'] ?></h1>
        <img src="<?= $data['news_results'][$i]['thumbnail'] ?>" alt="Thumbnail">
        <p><?= $data['news_results'][$i]['snippet'] ?></p>
        <p><?= $dataBrasil ?></p>
        <a href="<?= $data['news_results'][$i]['link'] ?>" target="_blank">Veja mais</a>
    <?php } ?>
</body>

</html>