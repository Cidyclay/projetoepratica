<?php
require '../config.php';
$id = $_GET["id"];
$usuario = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE user_id = $id"));
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
                    <label for="email">Nome:</label>
                    <input type="text" id="name" name="name" value="<?= $usuario['user_name'] ?>" disabled>
                    <br><br>

                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?= $usuario['user_email'] ?>" disabled>
                    <br><br>

                    <label for="nome">Usuário(a):</label>
                    <input type="text" id="nome" name="usuario" value="<?= $usuario['user_username'] ?>" required>
                    <br><br>

                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" value="<?= $usuario['user_password'] ?>" required>
                    <label for="confSenha">Confirmar senha:</label>
                    <input type="password" name="confirmarSenha" id="confSenha" value="<?= $usuario['user_password'] ?>" required>
                    <br><br>
                    
                    <button type ="submit" name="submit" value = "edit" onclick="return confirm('Confirma as informações?')">Editar</button>
                </form>
                <br>
                <button><a style="color:black" href="perfil.php">Voltar</a></button>
        </div>
    </div>
</body>

</html>