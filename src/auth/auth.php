<?php 
    session_start();
    if (isset($_SESSION["userEmail"])) {
        $fp = fopen("../../csv/users.csv", "r");
        if ($fp) {
            while (($row = fgetcsv($fp)) !== false) {
                if ($_SESSION["userEmail"] == $row[0]) {
                    break;
                }
            }
            fclose($fp);
        }
    }else {
        header("location:/src/login.php");
    }
