<?php
include "conecta.php";

$nome = $_POST['nome'];
$usu = $_POST['usu'];
$senha = $_POST['senha'];

$hash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome,usuario,senha) VALUES ('$nome','$usu','$hash')";


if(mysqli_query($conexao,$sql)){
    echo "Usuário inserido com sucesso!";
} else {
    echo "Falha na inserção!";
}

?>