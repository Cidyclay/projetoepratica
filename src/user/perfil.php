<?php
require "../auth/auth.php";
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

</head>

<body>
    <?php include "../../componentes/navBar.php" ?>
    <?= navBar("Perfil", "perfil.php", "/index.php", "../comunidade.php", "../jogos.php") ?>
    <div class="divBody" style=" display: flex; justify-items: center ; justify-content: center;">
        <div style="display: flex; flex-direction: column; width: 200px; justify-content: center;">
            <a href="edit_user.php">
                <button class="buttonForm">
                    Atualizar Dados
                </button>
            </a>
            <a href="removerAccount.php">
                <button class="buttonForm">
                    Excluir conta
                </button>
            </a>
            <a href="logOut.php">
                <button class="buttonForm">
                    Sair
                </button>
            </a>
        </div>
    </div>

</body>

</html>