<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: rgb(52, 2, 98);
            font-family: Arial, sans-serif;
            
        }

        form {
            background-color: black;
            border-radius: 50px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin: 100px auto;
            padding: 10px;
            text-align: center;
            width: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
          

        }

        input[type=email],
        input[type=password] {
            border-radius: 50px;
            border: none;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            margin-bottom: 5px;
            padding: 10px;
            width: 200%;


        }

        button {
            background-color: rgb(52, 2, 98);
            border: none;
            border-radius: 50px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 10px;
            width: 200%;
            height: 50%;

        }

        button:hover {
            background-color: purple;
        }

        h1 {
            text-align: center;
        }

        .error {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>Fazer login</h1>

    <form action="" method="POST">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button>Entrar</button>
    </form>


    <?php
    if (!empty($_POST)) {

        $fp = fopen("users.csv", "r");
        while (($row = fgetcsv($fp)) !== false) {
            if (isset($_POST['email']) && $_POST['email'] == $row[0] && isset($_POST['senha']) && $_POST['senha'] == $row[3]) {
                echo "logado(a) com sucesso";
                //Pergunta pra raniere, se isto aqui e magia..
                echo "<script>window.location.href='social.php';</script>";
                exit();
            }
        }

        echo "Dados incorretos";
    }
    ?>


</body>

</html>