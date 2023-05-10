<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
        $tempnan = tempnam('../../csv', '');
        $orig = fopen('../../csv/users.csv', 'r');
        $temp = fopen($tempnam, 'w');
        if ($orig && $temp) {
            while (($row = fgetcsv($orig)) !== false) {
                if ($email == $row[0]) {
                    fputcsv($temp, [$email, $nome, $usuario, $senha]);
                    continue;
                }
                fputcsv($temp, $row);
            }
        }
        fclose($orig);
        fclose($temp);

        rename('../../csv/' . basename($tempnam), '../../csv/users.csv');
        header("location: /src/user/peril.php", true, 302);
}


