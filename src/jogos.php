<?php require "auth/auth.php"?>
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
<style>
    
    h1{
        text-align: center;
        font-size: 50px 
    }
    .img1{
        margin-left: 100px;
    }
    img{
        margin-right: 20px;
        margin-bottom: 20px;
    }
        img:hover{
        opacity: 0.8;
        filter: grayscale(100%); 
        transition: 0.1s;
       
    }
</style>
<body>
    <?php include "../componentes/navBar.php" ?>
    <?= navBar("Jogos", "user/perfil.php", "/index.php", "comunidade.php", "jogos.php") ?>
    <div class="divBody" style="height: 100%; width: 97vw; background-color: rgb(52, 2, 98);">
        <?php if (isset($_SESSION["user"])) : ?>
            <?= $_SESSION["user"] ?>
        <?php endif ?>
        <h1>Jogos em destaque</h1>
         <br><br>
        <div class="imagem">
            <a class="img1" href="https://www.leagueoflegends.com/pt-br/" target="_blank">
                <img src="https://cdn1.epicgames.com/offer/24b9b5e323bc40eea252a10cdd3b2f10/LOL_2560x1440-98749e0d718e82d27a084941939bc9d3" alt="lol" width="600" height="300">
            </a> 
            <a href="https://playvalorant.com/pt-br/" target="_blank">
                <img src="https://assets.b9.com.br/wp-content/uploads/2021/06/vavab9.jpg" alt="vava" width="600" height="300">
            </a>
            <a href="https://www.guildwars2.com/" target="_blank">
                <img src="https://pbs.twimg.com/media/Fa3hmshUIAAph7N.jpg:large" alt="guild wars 2" width="600" height="300">
            </a>
            <a class="img1" href="https://worldofwarcraft.blizzard.com/pt-br/" target="_blank">
                <img src="https://mmorpgplay.com.br/wp-content/uploads/2022/07/world-of-warcraft-dragonflight-pc-juego-cover.webp" alt="wow" width="600" height="300">
            </a>
            <a href="https://www.minecraft.net/pt-pt" target="_blank">
                <img src="https://t.ctcdn.com.br/h4Pgpk0gFJYD5mw1LAOTduvjhuU=/720x405/smart/filters:format(webp)/i575891.jpeg" alt="minecraft" width="600" height="300"> 
            </a>
            <a href="https://store.steampowered.com/app/730/CounterStrike_Global_Offensive/" target="_blank">
                <img src="https://gogamers.gg/wp-content/uploads/2022/07/counter-strike-1024x640.png" alt="cs" width="600" height="300">
            </a>
            <a class="img1"href="https://www.snk-corp.co.jp/us/games/kof-xv/" target="_blank">
                <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1498570/capsule_616x353.jpg?t=1682650767" alt="kof" width="600" height="300">
            </a>
            <a href="https://www.rocketleague.com/pt-br/" target="_blank">
                <img src="https://jogandocasualmente.com.br/wp-content/uploads/2020/09/Rocket-League.jpg" alt="carro" width="600" height="300">
            </a>
            <a href="https://store.steampowered.com/app/39210/FINAL_FANTASY_XIV_Online/" target="_blank">
                <img src="https://image.api.playstation.com/vulcan/img/rnd/202106/2111/iQWooonIcfoudXQk6MpCTbpJ.jpg" alt="final fantasy" width="600" height="300">
            </a>
            <a class=img1 href="https://overwatch.blizzard.com/pt-br/" target="_blank">
                <img src="https://s2.glbimg.com/PNJER51BOnQnITDIcY5imE75mN8=/1200x/smart/filters:cover():strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2019/0/B/l8KwmZRfW41RBYwagf6A/6.jpg" alt="over"  width="600" height="300">
            </a>
            <a href="https://www.ea.com/pt-br/games/fifa/fifa-21"  target="_blank">
                <img src="https://s2.glbimg.com/f5UpJFXD2wQR3-HMNa927HxTd7c=/0x0:1920x1080/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2020/r/7/mSrPjAQTq0uFHNHiBjpQ/fifa-21-intros.jpg" alt="fifa" width="600" height="300">
            </a>
        </div>
    </div>

      


</body>

</html>