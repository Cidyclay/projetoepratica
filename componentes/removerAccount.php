<?php

require "auth.php";
$email = $_SESSION["user"];

$tempName = tempnam('.', '');

$temp = fopen($tempName, 'w');
$orig = fopen('users.csv', 'r');


while (($rom =  fgetcsv($orig)) !== false) {
     if ($rom[0] != $email) {
          fputcsv($temp, $rom);
     }
}


rename($tempName, 'users.csv');

fclose($temp);
fclose($orig);
session_destroy();

header('location:cadastro.php');
