<!-- ### armazenando ### -->
<?php
require 'config.php';
if(!empty($_SESSION['id'])) {
    header("Location:/projetoepratica/src/comunidade.php");
}
if(isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmarSenha'];
    $duplicado = mysqli_query($conn, "SELECT * FROM users WHERE user_username='$username' OR user_email = '$email'");
    if(mysqli_num_rows($duplicado) > 0) {
        echo
        "<script> alert('Usuário ou E-mail já utilizado'); </script>";
    }
    else {
        if($senha == $confirmarSenha) {
            $insert = "INSERT INTO users VALUES('','$nome','$email','$username','$senha','com')";
            mysqli_query($conn,$insert);
            echo
            "<script> alert('Registrado com Sucesso'); </script>";
        }
        else {
            echo
            "<script> alert('As senhas não coincidem'); </script>";
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
            box-shadow: 6px 6px 0px black;

        }

        .input {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin-top: 0.5rem;
            color: #4b5563;
            background-color: #fff;
            border-width: 1px;
            border-style: solid;
            border-color: black;
            border-radius: 0.5rem;
        }

        button {
            padding: 0.5rem 1rem;
            cursor: pointer;
            border-width: 1px;
            border-style: solid;
            border-color: black;
            border-radius: 0.5rem;
            box-shadow: 3px 3px 0 1px black;
        }

        button:hover {
            background-color: #836FFF;
            box-shadow: 3px 3px 0 1px black;
        }

        button:focus {
            box-shadow: 0 0 0 2px rgba(38, 103, 255, 0.5);
        }

        button:active {
            box-shadow: 0 0 0 0 black;
            transform: translate(4px, 4px);
        }
    </style>
</head>
<body>
    <?php include "../componentes/navBar.php"?>
    <?= navBar("Conta", "/user/perfil.php", "/index.php", "comunidade.php", "jogos.php") ?>
    <div class="divBody">
        <form id="formularioCadastro" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
            <h1 class="TituloCadastro" style="border-bottom: 2px solid; border-color: #2d2969; font-size: 2em;">Cadastro</h1>
            <div>
            <input class="input" type="text" name="nome" placeholder="Nome" required>

            </div>
            <div>
            <input class="input" type="email" name="email" placeholder="E-mail" required>
            </div>
            <div>
                <input class="input" type="text" name="username" placeholder="Usuário" required>

            </div>
            <div>
                <input class="input" type="password" name="senha" placeholder="Senha" required>

            </div>
            <div>
                <input class="input" type="password" name="confirmarSenha" placeholder="Confirmar Senha">

            </div>
            <input type="submit" name="submit" value="Cadastrar">
            <p><a href="login.php">Já é cadastrado? Login</a></p>
        </form>
    </div>

</body>

</html>