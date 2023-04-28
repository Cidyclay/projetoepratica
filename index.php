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
    <?php include "componentes/navBar.php"?>
    <?= navBar("Destaques", "src/user/perfil.php", "index.php", "src/comunidade.php", "src/jogos.php") ?>
    <div class="divBody">
        <h1 class="TituloNoticia" style="text-align: center;">Notícias</h1>
        <div class="Post1">
            <img class="Imagem" style=" width: 500px;
            margin-top: 20px;
            margin-left: 250px;" src="https://assets.b9.com.br/wp-content/uploads/2021/06/vavab9.jpg" alt="Valorant wallapaper">
            <p class="D" style="margin-left: 800px;
            margin-top: -250px;">13/04/2023</p>
            <img class="Imagem" style=" width: 500px;
            margin-top: 400px;
            margin-left: 250px;" src="https://assets.b9.com.br/wp-content/uploads/2021/06/vavab9.jpg" alt="Valorant wallapaper">
        </div>
        <div class="Post2">
        <p class="D" style="margin-left: 800px;
            margin-top: -250px;">13/04/2023</p>
        <p class="PrimeiraText" style="margin-left: 800px;
            margin-top: 0px;">Veja as ultimas atualizações para as suas ranqueadas do valorant</p>
        <a class="PrimeiraNoticia" style="margin-left: 800px;
            margin-top: -250px;" href="https://playvalorant.com/pt-br/news/community/torneios-de-comunidade-14-04-a-20-04/"> Veja a noticia</a>
        </div>

    </div>
</body>

</html>