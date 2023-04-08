<?php 

    $mostrar = false;
    //include('upload.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicações</title>
</head>

<body>

    <h1>Criar Publicações</h1>

    <php $nomeArquivo='publis.csv'; $arquivo=file($nomeArquivo) ?>

    <form action="add_post.php" method="POST" >
        <input type="text" name="titulo" placeholder="Titulo*" required>
        <input type="text" name="conteudo" placeholder="Conteudo*" required>
        <!-- <input type="file" name="file"> -->
        <input type="submit" name="criar" value="Criar">
    </form>

    <br>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="arquivo">
        <input type="submit" value="Enviar">
    </form>

 

    
    <?php $fp = fopen('publis.csv', 'r') ?>
    <?php while (($rom = fgetcsv($fp)) !== false): ?>

        <!-- só vai mostar "minhas publicaçoes" caso o usuario tenha alguma publicação -->
        <?php if(!$mostrar): ?>
            <h2>Minahs Publicações</h2>
        <?php $mostrar = true; endif ?>
   
        <h2><?= $rom[0] ?></h2>
        <p><?= $rom[1] ?></p>
        <p>Data da Publicação: <?= $rom[2] ?></p>

        <?php if (!file_exists($rom[3])) : ?>
            <img src="<?= $rom[3] . $basename?>" alt="Minha imagem">
        <?php endif ?>


        <br>
    <?php endwhile ?>

    

</body>

</html>