<?php
$dadosValidos = true;
$checkEmail = true;
$checkUsuario = true;
$senhasIguais = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $confirmarSenha = $_POST["confirmarSenha"];

    ##verificando os dados ##
    if (isset($email) && isset($nome) && isset($usuario) && isset($senha) && isset($confirmarSenha)) {
        $fp = fopen("../csv/users.csv", "r");
        if ($fp) {
            while (($row = fgetcsv($fp)) !== false) {
                if ($email == $row[0]) {
                    $checkEmail = false;
                    $dadosValidos = false;
                    break;
                } else if ($usuario == $row[2]) {
                    $checkUsuario = false;
                    $dadosValidos = false;
                    break;
                }
            }
            fclose($fp);
            if ($senha != $confirmarSenha) {
                $senhasIguais = true;
                $dadosValidos = false;
            }
            if ($dadosValidos) {
                $fpADD = fopen("../csv/users.csv", "a");
                fputcsv($fpADD, [$email, $nome, $usuario, $senha]);
                fclose($fpADD);
                header("location:/src/login.php", true, 302);
                exit;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/componentes/navBar.css">
    <link rel="stylesheet" href="/style/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>MGT</title>

    <style>
        #formularioCadastro {
            width: 24rem;
            height: 30rem;
            background-color: rgb(17 20 39);
            border-radius: 0.5rem;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            box-shadow: 10px 8px 20px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    <?php include "../componentes/navBar.php" ?>
    <?= navBar("Conta", "/src/user/perfil.php", "/index.php", "comunidade.php", "jogos.php") ?>
    <div class="divBody" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <form id="formularioCadastro" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
            <h1 class="TituloCadastro" style="border-bottom: 2px solid; border-color: #2d2969; font-size: 2em;">Cadastro</h1>
            <div>
                <input class="input" type="email" name="email" placeholder="E-mail" required>

            </div>
            <div>
                <input class="input" type="text" name="nome" placeholder="Nome" required>

            </div>
            <div>
                <input class="input" type="text" name="usuario" placeholder="Usuário" required>

            </div>
            <div>
                <input class="input" type="password" name="senha" placeholder="Senha" required>

            </div>
            <div>
                <input class="input" type="password" name="confirmarSenha" placeholder="Confirmar Senha">

            </div>
            <div style="margin-top: 10%; display: flex; justify-content: center;">
                <button class="buttonForm">Entrar</button>
            </div>


            <p><a href="login.php">Já é cadastrado? Login</a></p>
        </form>
        <div style="height: 10px;">
            <?php if (!$dadosValidos) : ?>
                <?php if (!$checkEmail) : ?>
                    <p class="aviso">Email já em uso</p>
                <?php elseif (!$checkUsuario) : ?>
                    <p class="aviso">Usuario já em uso</p>
                <?php elseif ($senhasIguais) : ?>
                    <p class="aviso">As senhas devem ser iguais</p>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>

</body>

</html>