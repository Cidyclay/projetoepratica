<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <h1>Fazer login</h1>

    <form action="" method="POST">
        <input type="text" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button>Entrar</button>
    </form>

    <?php
    if (!empty($_POST)) {

        $fp = fopen("users.csv", "r");
        while (($row = fgetcsv($fp)) !== false) {
            if (isset($_POST['email']) && $_POST['email'] == $row[0] && isset($_POST['senha']) && $_POST['senha'] == $row[3]) {
               
                http_response_code(302);
                echo "logado(a) com sucesso";
                exit();
            }
        }

        echo "Dados incorretos";
    }
    ?>


</body>

</html>