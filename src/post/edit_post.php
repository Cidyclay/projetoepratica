<?php
$id = $_GET['id'];
$fp = fopen('../../csv/publis.csv','r');
$arrayDados = [];

while(($row = fgetcsv($fp)) !== false) {
    if ($row[0] == $id) {
        $arrayDados = $row;
        break;
    }
}
fclose($fp);
if(sizeof($arrayDados) == 0) {
    header('location: /src/comunidade.php', true, 302);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/componentes/navBar.css">
    <link rel="stylesheet" href="/style/index.css">
    <link rel="stylesheet" href="/style/posts.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
 
    <title>Editar publicação</title>
</head>
<style>
    #ediH1 {
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
<body>
<?php    include "../../componentes/navBar.php"?>
    <div id="up"></div>
    <?= navBar("Comunidade", "../user/perfil.php", "../../index.php", "../comunidade.php", "../jogos.php",) ?>
    <div class="divBody" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <h1 id="ediH1">Edite sua publicação</h1>
        <form action="update_post.php" method="POST" class="post-form">
                    <input type="hidden" name="id" value="<?=$arrayDados[0];?>">
                    <input type="text" name="titulo" placeholder="Titulo*" value="<?=$arrayDados[1]?>" required>
                    <textarea name="conteudo" placeholder="Conteudo*" required><?=$arrayDados[2]?></textarea>
                    <button  class="buttonForm" style="width: 30%;">Salvar</button>
                </form>
                <a href="../comunidade.php"><button class="buttonForm" style="margin-top: 20px;">Voltar</button></a>
    </div>
</body>
</html>