<?php 
    require "../config.php";
    if(!empty($_SESSION['id'])) {
        $userid = $_SESSION['id'];
        $resultado = mysqli_query($conn,"SELECT * FROM users WHERE user_id = $userid");
        $row = mysqli_fetch_assoc($resultado);
    }
    else {
        header("location:../login.php");
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

</head>

<body>
    <?php include "../../componentes/navBar.php" ?>
    <?= navBar("Perfil", "perfil.php", "/index.php", "../comunidade.php", "../jogos.php") ?>
    <div class="divBody" style="height: 100%; width: 97vw; background-color: rgb(52, 2, 98);">
    <h1>Olá, <?php echo $row['user_username']; ?> </h1>
        <a href="logout.php">Sair</a><br>
        <a href="edit_user.php?id=<?php echo $row['user_id']; ?>">Atualizar Dados</a>
        <form class="" action="" method="post">
            <button type = "submit" name="submit" value = <?php echo $row['user_id']; ?> onclick="return confirm('Você tem certeza?')">Excluir Conta</button>
        </form>
    </div>

</body>

</html>