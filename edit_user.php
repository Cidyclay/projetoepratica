<?php

require "auth.php";
$email = $_SESSION["user"];
$fp = fopen('users.csv', 'r');
$data = [];


while (($rom = fgetcsv($fp)) !== false) {
    if ($rom[0] == $email) {
        $data = $rom;
        break;
    }
}

if (sizeof($data) == 0) {
    header('location: perfil.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGT - Atualizar Cadastro</title>
</head>

<body>
    <h1>Atualizar Dados</h1>

    <p><strong>OBS:</strong> Por motivos de segurança, ao atualizar o email, será necessário fazer o login com o novo email </p>

    <form action="update_user.php" method="POST">

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= $data[0] ?>" required>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= $data[1] ?>" required>


        <button>Salvar</button>

</body>

</html>



