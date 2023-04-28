<?php
require "../auth/auth.php";
$checkUsuario = true;
$dadosValidos = true;
$senhasIguais = true;
$dados = [];
$fp = fopen("../../csv/users.csv", "r");
if ($fp) {
    while (($row = fgetcsv($fp)) !== false) {
        if ($row[0] == $_SESSION["userEmail"]) {
            $dados = $row;
            break;
        }
    }
}
rewind($fp);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novoEmail = $_POST["email"];
    $atualEmail = $dados[0];

    $nome = $_POST["nome"];

    $novoUsuario = $_POST["usuario"];
    $atualUsuario = $dados[2];

    $senha = $_POST["senha"];
    $confirmarSenha = $_POST["confirmarSenha"];

    if (isset($nome) || isset($novoUsuario) || (isset($senha) && isset($confirmarSenha))) {
        $fp = fopen("../../csv/users.csv", "r");
        if ($fp) {
            ## verificando usuario
            while (($row = fgetcsv($fp)) !== false) {
                if ($row[0] != $_SESSION["userEmail"] && $row[2] == $novoUsuario) {
                    $checkUsuario = false;
                    $dadosValidos = false;
                    break;
                }
            }
            ## verificando senhas 
            if ($senha != $confirmarSenha) {
                $senhasIguais = false;
                $dadosValidos = false;
            }
            fclose($fp);
        }
    }
    if ($dadosValidos) {
        $tempnam = tempnam("../../csv", "");
        $temp = fopen($tempnam, "w");
        $fp = fopen("../../csv/users.csv", "r");
        if ($fp && $temp) {
            while (($row = fgetcsv($fp)) !== false) {
                if ($row[0] == $_SESSION["userEmail"]) {
                    if (isset($novoUsuario)) {
                        fputcsv($temp, [$_SESSION["userEmail"], $row[1], $novoUsuario, $row[3]]);
                        continue;
                    } else if (isset($nome)) {
                        fputcsv($temp, [$_SESSION["userEmail"], $nome, $row[2], $row[3]]);
                        continue;
                    } else if (isset($senha)) {
                        fputcsv($temp, [$_SESSION["userEmail"], $row[1], $row[2], $senha]);
                        continue;
                    }
                }
                fputcsv($temp, $row);
            }
            fclose($temp);
            fclose($fp);
            rename("../../csv/" . basename($tempnam), "../../csv/users.csv");
            header("location:edit_user.php", true, 302);
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
    <title>MGT - Atualizar Cadastro</title>
</head>
<!--
<style>

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
   
    form {
        width: 24rem;
        height: 8rem;
        background-color: rgb(17 20 39);
        border-radius: 0.5rem;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        box-shadow: 6px 6px 0px black;
    
    }
    #coleForm {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
    }
</style>
-->
<body>
    <?php include "../../componentes/navBar.php" ?>
    <?= navBar("Perfil", "perfil.php", "/index.php", "../comunidade.php", "../jogos.php") ?>
    <div class="divBody" style="height: 200%; width: 97vw;">
        <div id="coleForm">

            <h1>Atualizar Dados</h1>
        
                <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?= $dados[0] ?>" disabled>
                </form>
        
                <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?= $dados[1] ?>" required>
                    <input type="submit" value="Editar">
                </form>
                
                <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
                    <label for="usuario">Usuário:</label>
                    <input type="text" id="usuario" name="usuario" value="<?= $dados[2] ?>" required>
                    <input type="submit" value="Editar">
                    <?php if (!$dadosValidos) : ?>
                        <?php if (!$checkUsuario) : ?>
                            <p>Usuário já utilizado</p>
                        <?php endif?>
                     <?php endif ?>
                </form>
                <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" value="<?= $dados[3] ?>" required>
                    <label for="confSenha">Confirmar senha:</label>
                    <input type="password" name="confirmarSenha" id="confSenha" value="<?= $dados[3] ?>" required>
                    <input type="submit" value="Editar">
                    <?php if (!$dadosValidos) : ?>
                        <?php if (!$senhasIguais) : ?>
                            <p>As senha devem ser iguais</p>
                        <?php endif?>
                     <?php endif ?>    
                </form>
                <button><a style="color:black" href="perfil.php">Voltar</a></button>
        </div>
    </div>
</body>

</html>