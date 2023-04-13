<?php

### armazenando ###

$email = $_POST["email"];
$nome = $_POST["nome"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$confirmarSenha = $_POST["confirmarSenha"];

### Verificação de integridade ###

$fp = fopen("users.csv","r");
while (($row = fgetcsv($fp)) !== false) {
    if($row[0] == $email || $usuario[2] == $usuario) {
        echo "Dados já utilizados";
        exit();
    } 

}

if($senha != $confirmarSenha) {
    echo "As senhas estão diferentes, por favor, digite-as iguais";
    exit();
}  


### Salvando ###

$fp = fopen("users.csv","a");
fputcsv($fp,[$email,$nome,$usuario,$senha]);


### Redirect ###
 http_response_code(302);
 header('Location: login.php');
 exit;
 echo "Cadastrado com sucesso";

 ?>