<?php
$dadosValidos = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  if (isset($email) && isset($senha)) {
    $fp = fopen("../csv/users.csv", "r");
    if ($fp) {
      while (($row = fgetcsv($fp)) !== false) {
        if ($row[0] == $email && $row[3] == $senha) {
          session_start();
          $_SESSION["userEmail"] = $row[0];
          $_SESSION["userUsuario"] = $row[2];
          $_SESSION["auth"] = true;
          fclose($fp);
          header("location:/src/comunidade.php", true, 302);
          break;
        }
      }
      $dadosValidos = false;
      if (!$dadosValidos) {
        fclose($fp);
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
  <title>MGT</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<style>
  #formularioLogin {
    width: 24rem;
    height: 20rem;
    background-color: rgb(17 20 39);
    border-radius: 0.5rem;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
    box-shadow: 10px 8px 20px rgba(0, 0, 0, 0.5);
  }

  #h3Login {
    margin-top: 0.75rem;
    font-size: 1.25rem;
    font-weight: 500;
    text-align: center;
  }

  #parteCima {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
  }
</style>

<body>
  <?php include "../componentes/navBar.php" ?>
  <?= navBar("Login", "user/perfil.php", "/index.php", "comunidade.php", "jogos.php","") ?>
  <div class="divBody" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">

    <div id="formularioLogin">

      <div id="parteCima">

        <h3 id="h3Login" style="border-bottom: 2px solid; border-color: #2d2969; font-size: 1.5em;">Faça o login</h3>

        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">

          <div style="width: 100%;  margin-top: 1rem;">
            <input type="email" name="email" placeholder="E-mail" required>
          </div>

          <div style="width: 100%;  margin-top: 1rem;">
            <input type="password" name="senha" placeholder="Senha" required>
          </div>
          <div style="margin-top: 10%; display: flex; justify-content: center;">
            <button class="buttonForm">Entrar</button>
          </div>
        </form>
        <p><a href="cadastro.php">Faça seu cadastro aqui!</a></p>
      </div>
    </div>
    <div style="height: 10px;">
      <?php if (!$dadosValidos) : ?>
        <p class="aviso">Dados invalidos</p>
      <?php endif ?>
    </div>
  </div>
</body>

</html>