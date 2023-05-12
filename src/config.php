<?php
session_start();
$HOST = "localhost";
$ROOT = "root";
$PASS = "";
$BASE = "projetoepratica";

//cria uma conexão utilizando mysqli_connect

$conn = mysqli_connect($HOST,$ROOT,$PASS,$BASE);




if(isset($_POST["submit"])) {
    if($_POST["submit"] == "edit") {
        edit();
    }
    else if($_POST["submit"] =="delete") {
        delete();
    }
}

function edit() {
    global $conn;

    $id = $_GET["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $confirmarSenha = $_POST["confirmarSenha"];

    if ($senha == $confirmarSenha) {
        $query = "UPDATE users SET user_name ='$nome', user_email = '$email', user_username = '$usuario', user_password = '$senha' WHERE user_id = $id";
        mysqli_query($conn,$query);
        
        echo
        "<script>
        alert('Editado com sucesso');
        </script>";
    }


}

function delete () {
    global $conn;

    $id = $_POST["submit"];

    $query = "DELETE FROM users WHERE user_id = $id";
}

?>