<?php

### armazenando ###

$email = $_POST["email"];
$nome = $_POST["nome"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

### Verificação de integridade ###

$fp = fopen("users.csv","r");
while (($row = fgetcsv($fp)) !== false) {
    if($row[0] == $email || $row[2] == $usuario) {
        http_response_code(400);
        echo "Dados já utilizados";
        exit();
    }
}

### Salvando ###

$fp = fopen("users.csv","a");
fputcsv($fp,[$email,$nome,$usuario,$senha]);

### Redirect ###

http_response_code(302);
header('location:cadastro.php');

?>