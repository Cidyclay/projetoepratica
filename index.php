<?php
include 'noticias.php';

// verifica se existe alguma criação de conteúdo

if (isset($_POST['submit'])) {
	$titulo = $_POST['titulo'];
	$imagem = $_POST['imagem'];
	$texto = $_POST['texto'];
	$video = $_POST['video_link'];
	$link = $_POST['link'];

	// Extrai o ID do vídeo do link do YouTube
	// Quando o usuário passar a URL, vai ser criado um array
	// Associativo, basicamente quando ele encontrar na query da url
	// o "V" que contém o vídeo ID do YouTube, ele para e aramzena na variável
	// video_id que por fim vai pro arquivo csv. O video ID fica aqui:
	//https://www.youtube.com/watch?v=bESGLojNYSo&ab_channel=LadyGagaVEVO&start=56
	//                           v= VIDEO_ID
	// que no caso corresponde a "bESGLojNYSo".
	$video_id = '';
	$parsed_url = parse_url($video);
	if (isset($parsed_url['query'])) {

		parse_str($parsed_url['query'], $query);
		if (isset($query['v'])) {
			$video_id = $query['v'];
		}
	}
	// Termina a extração do ID do vídeo do link do YouTube. ^-^

	// Caso tenha uma "nova" notícia o arquivo CSV será aberto
	// então as informações dela !"não serão acessadas." :)

		//Coloquei o $id da postagem no final, pra não destroçar o código todo, :)
	$nova_noticia = [$titulo, $imagem, $texto, $video_id, $link];
	$fp = fopen('noticias.csv', 'a');
	fputcsv($fp, $nova_noticia);
	fclose($fp);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="index.css">
	<title>Crie uma noticia</title>
</head>

<body>

	<div style="background-color: black;">
		<h1>Criar notícia</h1>
		<!-- Dentro da abertura da tag form, está os campos de input, os quais o usuário ou adm
		irá preencher de acordo com o conteúdo solicitado,nome,url da imagem, texto,video,link etc -->
		<form method="post" action="">
			<label>Título:</label><br>
			<input type="text" name="titulo"><br>

			<label>Imagem (link):</label><br>
			<input type="text" name="imagem"><br>

			<label>Texto:</label><br>
			<textarea name="texto"></textarea><br>

			<label>Link do vídeo do YouTube:</label><br>
			<input type="text" name="video_link"><br>


			<label>Link da notícia:</label><br>
			<input type="text" name="link"><br>
			<input type="submit" name="submit" value="Criar notícia"><br>
		</form>
		<h1>Notíciais</h1>
		<!-- Esta tag php, está chamando a função exibir noticias, para que seja acessado no arquivo csv,
		  o conteúdo do array e seja exibido, tudo isto dentro dessa função -->
		<?php exibirNoticias(); ?>

	</div>
</body>


</html>