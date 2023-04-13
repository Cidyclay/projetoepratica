<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>

    <style>
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
        }

        button:hover {
            cursor: pointer;
        }

        button {
            color: white;
            font-size: 20px;
            background-color: black;
            padding: 10px;
            border: 1px solid black;
            width: 100%;
        }

        button:active {
            box-shadow: inset -4px 4px 0 white;
        }
    </style>
</head>

<body>
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
        <p>Já é cadastrado? <a href="login.php">Login</a> </p>
    </div>
    <br>

</body>

</html>