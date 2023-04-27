
<?php

require "auth.php";

$email = $_POST['email'];
$nome = $_POST['nome'];

$tempName = tempnam('.', '');

$temp = fopen($tempName, 'w');
$orig = fopen('users.csv', 'r');

while (($row = fgetcsv($fp)) !== false) {
    if ($row[0] == $email) {
        echo "infelizmente não foi possivel atualizar, email já em uso";
        header('location:index.php'); 
          exit();
      
    }
}



while (($rom =  fgetcsv($orig)) !== false) {
    if ($rom[0] ==  $_SESSION["user"]) {
        fputcsv($temp, [$email, $nome, $rom[2], $rom[3]]);
        continue;
    }
    fputcsv($temp, $rom);
}

fclose($temp);
fclose($orig);


rename($tempName, 'users.csv');
header('location:login.php');

?>

