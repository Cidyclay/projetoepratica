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
    box-shadow: 6px 6px 0px black;
  }

  #h3Login {
    margin-top: 0.75rem;
    font-size: 1.25rem;
    font-weight: 500;
    text-align: center;
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
    transform: translate(4px, 4px);  }

  #parteCima {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
  }
</style>

<body>
  <?php include "componentes/navBar.php" ?>
  <?= navBar("Conta") ?>
  <div class="divBody" style=" display:flex; flex-direction: column;  justify-content: center; align-items: center; width: 98vw; height: 100%;">

    <div id="formularioLogin">

      <div id="parteCima">

        <h3 id="h3Login" style="border-bottom: 2px solid; border-color: #2d2969; font-size: 1.5em;">Faça o login</h3>
        
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">

          <div style="width: 100%;  margin-top: 1rem;">
            <input class="input" type="email" name="email" placeholder="E-mail" required>
          </div>

          <div style="width: 100%;  margin-top: 1rem;">
            <input class="input" type="password" name="senha" placeholder="Senha" required>
          </div>

          <div style="margin-top: 10%; display: flex; justify-content: center;">
            <button>Entrar</button>
          </div>
        </form>
      </div>

      <?php
      $checkConta = true;
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fp = fopen("users.csv", "r");
        if ($fp) {
          $email = $_POST["email"];
          $senha = $_POST["senha"];
          while (($row = fgetcsv($fp)) !== false) {
            if ($email == $row[0] && $senha == $row[3]) {
              session_start();
              $_SESSION["user"] = $email;
              header("location: comunidadeSocial.php");
              exit();
            }
          }
          $checkConta = false;
        }
      }
      ?>
      <div>
        <?php if(!$checkConta):?>
          <p style="text-align: center; color:red;">Dados invalidos!</p>
          <?php endif?>
        <p><a href="cadastro.php">Crie sua conta aqui!</a></p>
      </div>
    </div>
  </div>
</body>

</html>