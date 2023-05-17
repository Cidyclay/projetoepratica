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
    <style>
        .notes {
            width: 400px;
            height: 400px;
            text-align: center;
        }

        .notDiv {
            width: 400px;
            height: 400px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include "componentes/navBar.php" ?>
    <div id="up"></div>
    <?= navBar("Destaques", "src/user/perfil.php", "index.php", "src/comunidade.php", "src/jogos.php") ?>
    <div class="divBody" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <div class="notes">
            <div class="notDiv">
                <a href="https://playvalorant.com/pt-br/news/community/torneios-de-comunidade-12-05-a-18-05/" target="_blank">
                    <img src="https://images.contentstack.io/v3/assets/bltb6530b271fddd0b1/blt1fb651358bfe01fe/60c10342d475801b9d54fe31/TORNEIOS_DE_COMUNIDADE_VAL_CARD.jpg?auto=webp&disable=upscale&width=364" alt="">
                    <p>11/05/23</p>
                    <h1>TORNEIOS DE COMUNIDADE - 12/05 A 18/05</h1>
                </a>
            </div>
            <div class="notDiv">
                <a href="https://www.leagueoflegends.com/pt-br/news/game-updates/notas-da-atualizacao-13-9/" target="_blank">
                    <img src="https://images.contentstack.io/v3/assets/blt731acb42bb3d1659/blt132112adb6e293fd/6449beefef41f64ab2952601/050223_LoL_Patch_13_9_Notes_Banner.jpg?quality=90&crop=1%3A1&width=240" alt="">
                    <p>03/05/23</p>
                    <h1>NOTAS DA ATUALIZAÇÃO 13.9</h1>
                </a>
            </div>
            </div>
        </div>
    </div>
</body>

</html>