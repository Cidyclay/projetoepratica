<?php
$mostrar = false;
$id = 1;

$fp = fopen('publis.csv', 'r');

while (($row = fgetcsv($fp)) !== false) {
    $id++;
}
?>
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
<?php
require "auth.php";
?>

<body>
    <?php include "componentes/navBar.php" ?>
    <?= navBar("Comunidade") ?>
    <div class="divBody" style="margin-left: 30%;">
        <h1>Criar Publicações</h1>

        <!--- <php $nomeArquivo='publis.csv' ; $arquivo=file($nomeArquivo) ?> ---->

        <form action="add_post.php" method="POST">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="text" name="titulo" placeholder="Titulo*" required>
            <input type="text" name="conteudo" placeholder="Conteudo*" required>
            <input type="submit" name="criar" value="Criar" class="criar-butao">
        </form>

        <?php $fp = fopen('publis.csv', 'r') ?>
        <?php while (($row = fgetcsv($fp)) !== false) : ?>
            <!-- só vai mostar "minhas publicaçoes" caso o usuario tenha alguma publicação -->
            <!-- tirei o "minhas" ja q não vai mostrar só as publicaçoes dql usuario, e sim todas q tem no  csv-->
            <?php if (!$mostrar) : ?>
                <h2> Publicações</h2>
            <?php $mostrar = true;
                $id++;
            endif ?>

            <div style=" text-align: center; width:500px">
                <div>
                    <h2 class="publicacao"><?= $row[1] ?></h2>

                </div>
                <div>
                    <p class="publicacao"><?= $row[2] ?></p>

                </div>
                <div>
                    <p class="publicacao">Última atualização: <?= $row[3] ?></p>

                </div>

                <div>
                    <p class="publicacao">Criador: <?= $row[4] ?></p>
                </div>
            </div>
            <?php if (isset($_SESSION["user"]) && ($row[4] == $_SESSION["user"])) : ?>
                <a href="/edit_post.php?id=<?= $row[0] ?>"> Editar</a>
                <form action="delete_post.php" method="GET" onsubmit="return confirm ('VOCÊ ESTÁ CERTO DISSO?')">
                    <input type="hidden" name="id" value="<?= $row[0] ?>">
                    <button>Excluir publicação</button>
                </form>
            <?php endif ?>
        <?php endwhile ?>

    </div>
</body>

</html>