<?php   
     session_start();
     if (isset($_SESSION["userEmail"])) {
          $tempnam = tempnam("../../csv", "");
          $temp = fopen($tempnam, "w");
          $fp = fopen("../../csv/users.csv", "r");
          if ($fp && $temp) {
               while (($row = fgetcsv($fp)) !== false) {
                    if ($row[0] == $_SESSION["userEmail"]) {
                         continue;
                    }
                    fputcsv($temp, $row);
               }
               fclose($temp);
               fclose($fp);
               session_destroy();
               rename("../../csv/" . basename($tempnam), "../../csv/users.csv");
               header("location:/index.php", true, 302);
          }
     }