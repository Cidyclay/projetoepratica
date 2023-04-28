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
    <title>Editar publicação</title>
</head>
<body>
    <h1>Edite sua publicação</h1>
    <form action="update_post.php" method="POST">
                <input type="hidden" name="id" value="<?=$arrayDados[0];?>">
                <input type="text" name="titulo" placeholder="Titulo*" value="<?=$arrayDados[1]?>">
                <input type="text" name="conteudo" placeholder="Conteudo*" value="<?=$arrayDados[2]?>">
                <button>Salvar</button>
            </form>
            <button><a href="../comunidade.php">Voltar</a></button>
</body>
</html>