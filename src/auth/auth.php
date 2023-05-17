<?php 
    session_start();
    if (!isset($_SESSION["auth"]) or $_SESSION["auth"] !== true) {
        header("location: /src/login.php", true, 302);
        exit;
    }