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
    margin-left: auto;
    background-color: rgb(17 24 39);
    border-radius: 0.5rem;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
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
    border-color: #e5e7eb;
    border-radius: 0.5rem;
  }

  button {
    padding: 0.5rem 1.5rem;
    font-size: 1rem;
    font-weight: 500;
    line-height: 1.25;
    text-transform: capitalize;
    background-color: #2563eb;
    color: #fff;
    border-radius: 0.375rem;
    border: 1px solid transparent;
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    cursor: pointer;
  }

  button:hover {
    background-color: #1d4ed8;
  }

  button:focus {
    box-shadow: 0 0 0 2px rgba(38, 103, 255, 0.5);
  }

  button:active {
    transform: scale(0.95);
  }

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
  <div class="divBody">

    <div id="formularioLogin">

      <div id="parteCima">

        <h3 id="h3Login">Faça o login</h3>

        <form action="<?= $_SERVER["_SELF"] ?>" method="POST">

          <div style="width: 100%;  margin-top: 1rem;">
            <input class="input" type="email" name="email" placeholder="E-mail" required>
          </div>

          <div style="width: 100%;  margin-top: 1rem;">
            <input class="input" type="password" name="senha" placeholder="Senha" required>
          </div>

          <div>
            <button>Entrar</button>
          </div>
        </form>

      </div>

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fp = fopen("users.csv", "r");
        if ($fp) {
          $email = $_POST["email"];
          $senha = $_POST["senha"];
          while (($row = fgetcsv($fp)) !== false) {
            if ($email == $row[0] && $senha == $row[3]) {
              header("location: comunidadeSocial.php");
              exit();
            }
          }
        }
      }
      ?>
      <div>
        <p><a href="cadastro.php
        ">Crie sua conta aqui!</a></p>
      </div>
    </div>
  </div>
</body>

</html>