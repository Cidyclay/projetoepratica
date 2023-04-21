<?php 
    session_start();
    $logado = false;
    $logadoP = false;
    $fp = fopen("users.csv", "r");

    if ($fp) {
        
        while (($row = fgetcsv($fp)) !== false) {
            if ($row[0] == $_SESSION["user"]) {
                $logado = true;
                header("location: perfil.php", true, 302);
                break;
            }
        }
    }