<?php 
    session_start();
    if (isset($_SESSION["userEmail"])) {
        $parentDir = dirname(__DIR__);
        $filePath = $parentDir . '/users.csv';
        $fp = fopen("csv\users.csv", "r");
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
