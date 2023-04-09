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

    $fp = fopen("users.csv", "r");
    while (($row = fgetcsv($fp)) !== false) {
        if (($_POST['email'] == $row[0]) && ($_POST['senha'] == $row[3]) && (!empty($_POST))) {

            // echo "logado(a) com sucesso";
            // http_response_code(400);
                header('location:post.php');
            exit();
        }  
    }

    if(!empty($_POST)) {
        echo "Dados incorretos";
    }  
     ?> 


</body>

</html>