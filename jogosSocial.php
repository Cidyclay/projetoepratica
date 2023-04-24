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
    <?= navBar("Jogos") ?>
    <div class="divBody" style="height: 100%; width: 97vw; background-color: rgb(52, 2, 98);">
        <?php if (isset($_SESSION["user"])) : ?>
            <?= $_SESSION["user"] ?>
        <?php endif ?>
    </div>
</body>

</html>