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

    <style>
        body{
            background-color: rgb(52, 2, 98);
        }
        .CorpoCadastro{
            border: 2px solid black;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            color: black;
        }

        input {
            padding: 15px;
            border: 1px solid black;
        }

        .TituloCadastro{
            text-align: center;
            font-size: 50px;
        }

        button:hover {
            cursor: pointer;
        }

        button {
            color: white;
            font-size: 20px;
            background-color: purple;
            padding: 10px;
            border: 1px solid black;
            width: 100%;
        }

        button:active {
            box-shadow: inset -4px 4px 0 blue;
        }
        p{
            font-size: 25px;
        }
    </style>
</head>

<body>
<?php include "componentes/navBar.php" ?>
  <?= navBar("Conta") ?>

    <div class="CorpoCadastro">
        <h1 class="TituloCadastro">Cadastro</h1>
        <form action="add.php" method="POST">
            <input type="email" name="email" placeholder="E-mail" required>
            <br><br>
            <input type="text" name="nome" placeholder="Nome" required>
            <br><br>
            <input type="text" name="usuario" placeholder="Usuário" required>
            <br><br>
            <input type="password" name="senha" placeholder="Senha" required>
            <br><br>
            <input type="password" name="confirmarSenha" placeholder="Confirmar Senha">
            <button>Cadastrar</button>
        </form>
        <p>Já é cadastrado? <a href="contaSocial.php">Login</a> </p>
    </div>

</body>

</html>