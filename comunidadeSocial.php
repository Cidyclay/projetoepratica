<?php $mostrar = false ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/componentes/navBar.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>MGT</title>
</head>

<body>
    <?php include "componentes/navBar.php" ?>
    <?= navBar("Comunidade") ?>
    <div class="divBody" style="margin-left: 30%;">
        <h1>Criar Publicações</h1>

        <php $nomeArquivo='publis.csv' ; $arquivo=file($nomeArquivo) ?>

            <form action="add_post.php" method="POST">
                <input type="text" name="titulo" placeholder="Titulo*" required>
                <input type="text" name="conteudo" placeholder="Conteudo*" required>
                <input type="submit" name="criar" value="Criar" class="criar-butao">
            </form>


            <?php $fp = fopen('publis.csv', 'r') ?>
            <?php while (($rom = fgetcsv($fp)) !== false) : ?>

                <!-- só vai mostar "minhas publicaçoes" caso o usuario tenha alguma publicação -->
                <?php if (!$mostrar) : ?>
                    <h2>Minhas Publicações</h2>
                <?php $mostrar = true;
                endif ?>
                
                    <div style=" text-align: center; width:500px">
                        <div style="">
                            <h2 class="publicacao"><?= $rom[0] ?></h2>
    
                        </div>
                        <div>
                            <p class="publicacao"><?= $rom[1] ?></p>
    
                        </div>
                        <div>
                            <p class="publicacao">Data da Publicação: <?= $rom[2] ?></p>
    
                        </div>
                </div>

            <?php endwhile ?>

    </div>
</body>

</html>