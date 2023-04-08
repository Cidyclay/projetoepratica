<?php
$diretorio_destino = "uploads/"; // diretório de destino para onde o arquivo será movido
$basename = basename( $_FILES["arquivo"]["name"]);
$caminho_completo_destino = $diretorio_destino . $basename; // caminho completo para o arquivo de destino
$upload_ok = 1;
$extensao_arquivo = strtolower(pathinfo($caminho_completo_destino, PATHINFO_EXTENSION)); // extensão do arquivo enviado


// Verifica se o arquivo é uma imagem real ou uma imagem falsa
if(isset($_POST["enviar"])) {
  $verificar_imagem = getimagesize($_FILES["arquivo"]["tmp_name"]);
  if($verificar_imagem !== false) {
    echo "Arquivo é uma imagem - " . $verificar_imagem["mime"] . ".";
    $upload_ok = 1;
  } else {
    echo "Arquivo não é uma imagem.";
    $upload_ok = 0;
  }
}

// Verifica se o arquivo já existe
if (file_exists($caminho_completo_destino)) {
  echo "Desculpe, arquivo já existe.";
  $upload_ok = 0;
}

// Verifica o tamanho do arquivo
if ($_FILES["arquivo"]["size"] > 500000) {
  echo "Desculpe, o tamanho do arquivo é muito grande.";
  $upload_ok = 0;
}

// Verifica o tipo de arquivo
if($extensao_arquivo != "jpg" && $extensao_arquivo != "png" && $extensao_arquivo != "jpeg"
&& $extensao_arquivo != "gif" ) {
  echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
  $upload_ok = 0;
}

// Verifica se $upload_ok é definido como 0 por um erro
if ($upload_ok == 0) {
  echo "Desculpe, seu arquivo não foi enviado.";

// Se tudo estiver ok, tenta enviar o arquivo
} else {
  if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $caminho_completo_destino)) {
    echo "O arquivo ". $basename . " foi enviado com sucesso.";
  } else {
    echo "Desculpe, ocorreu um erro ao enviar o arquivo.";
  }
}

var_dump($upload_ok);
?>
