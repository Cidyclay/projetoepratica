<?php
require "auth/auth.php";
$mostrar = false;
$id = 1;
$fp = fopen("../csv/publis.csv", 'r');
while (($row = fgetcsv($fp)) !== false) {
    $id++;
}
fclose($fp);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/componentes/navBar.css">
    <link rel="stylesheet" href="/style/index.css">
    <link rel="stylesheet" href="/style/posts.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>MGT</title>
    <style>
        .post-list {
            margin-top: 10px;
            display: flex;
            flex-direction: column-reverse;
            justify-content: space-between;
            align-items: center;
        }

        #post-header {
            border-bottom: 4px solid black;
            padding: 10px;
            border-radius: 0px;
        }

        #post-body {
            border-bottom: 3px solid black;
            padding: 10px;
        }

        #post-footer {
            padding: 10px;
        }

        .post-button {
            appearance: button;
            backface-visibility: hidden;
            border-radius: 6px;
            border-width: 0;
            box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .1) 0 2px 5px 0, rgba(0, 0, 0, .07) 0 1px 1px 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            font-family: -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", Ubuntu, sans-serif;
            font-size: 100%;
            height: 30px;
            /* Altura do botão */
            line-height: 1.15;
            margin: 12px 0 0;
            outline: none;
            overflow: hidden;
            padding: 0 15px;
            /* Espaçamento interno do botão */
            position: relative;
            text-align: center;
            text-transform: none;
            color: black;
            transform: translateZ(0);
            transition: all .2s, box-shadow .08s ease-in;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: auto;
            /* Largura automática */

        }

        .post-form textarea {
            width: 85%;
            height: 150px;
            padding: 10px;
            font-size: 16px;
            border: 3px solid black;
            border-radius: 4px;
            resize: vertical;
        }

        /* Estilo para mensagens de erro */
        .post-form .error-message {
            color: red;
            margin-top: 5px;
        }

        #titulo-pub {
            background-color: rgb(17 24 39);
            height: 2.5em;
            width: 25%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            box-shadow: 10px 8px 5px rgba(0, 0, 0, 0.5);
            margin-top: 10px;
        }

        #criar-post {
            background-color: rgb(17 24 39);
            height: 2.5em;
            width: 25%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            box-shadow: 10px 8px 5px rgba(0, 0, 0, 0.5);
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php include "../componentes/navBar.php" ?>
    <div id="up"></div>
    <?= navBar("Comunidade", "user/perfil.php", "/index.php", "comunidade.php", "jogos.php",) ?>
    <div class="divBody">
        <div style="display: flex; flex-direction: column; align-items:center;">
            <div id="criar-post">
                <h2>Criar postagem</h2>
            </div>
            <!--- <php $nomeArquivo='publis.csv' ; $arquivo=file($nomeArquivo) ?> ---->
            <form action="post/add_post.php" method="POST" class="post-form">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="text" name="titulo" placeholder="Titulo*" required>
                <textarea name="conteudo" placeholder="Digite seu post..." required></textarea>
                <button class="buttonForm" style="width: 30%;">Postar</button>
            </form>
        </div>
        <div>

            <?php $fp = fopen("../csv/publis.csv", 'r') ?>
            <?php while (($row = fgetcsv($fp)) !== false) : ?>
                <!-- só vai mostar "minhas publicaçoes" caso o usuario tenha alguma publicação -->
                <!-- tirei o "minhas" ja q não vai mostrar só as publicaçoes dql usuario, e sim todas q tem no  csv-->
                <div style=" margin-top: 10px; display: flex; flex-direction: column; align-items:center;">
                    <?php if (!$mostrar) : ?>
                        <div id="titulo-pub">
                            <h2> Publicações</h2>
                        </div>
                    <?php $mostrar = true;
                        $id++;
                    endif ?>

                </div>

                <div class="post-list">
                    <div class="post">
                        <div class="data">
                            <span class="post-dia"><?= $row[3] ?></span>
                            <p class="user" tabindex="0"><?= $row[4] ?></p>
                        </div>

                        <div style="margin-top: 0.5rem;">
                            <h2 href="#" class="post-titulo" tabindex="0" role="link"><?= $row[1] ?></h2>
                            <p class="post-conteudo"><?= $row[2] ?></p>
                        </div>
                        <?php if (isset($_SESSION["userUsuario"]) && ($row[4] == $_SESSION["userUsuario"])) : ?>
                            <div style="display: flex; justify-content: space-between;">
                                <a href="../src/post/edit_post.php?id=<?= $row[0] ?>"><button class="post-button">Editar</button></a>

                                <form action="post/delete_post.php" method="GET" onsubmit="return confirm ('VOCÊ ESTÁ CERTO DISSO?')">
                                    <input type="hidden" name="id" value="<?= $row[0] ?>">
                                    <button class="post-button">Excluir publicação</button>
                                </form>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endwhile ?>
                </div>
        </div>
    </div>
</body>

</html>