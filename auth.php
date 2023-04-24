<?php 
    session_start();
    $logado = false;
    $logadoP = false;
    $fp = fopen("users.csv", "r");

    if ($fp) {
        
        while (($row = fgetcsv($fp)) !== false) {
            if ( isset($_SESSION["user"]) && $row[0] == $_SESSION["user"] ) {
                $logado = true;
                break;
            }
        }
        if ($logado === false) {
            fclose($fp);
            header("location: login.php", true, 302);
        }
    }