<?php
include "conecta.php";

$usu = $_POST['usuario'];
$senha = $_POST['senha'];


$sql = "SELECT * FROM usuarios WHERE usuario = '$usu'";
$resultado = mysqli_query($conexao, $sql);

   
if ($dados = mysqli_fetch_assoc($resultado)) { print_r($dados);
    $senha_hash = $dados['senha'];

    // Verifica a senha digitada com a senha do banco
    if (password_verify($senha, $senha_hash)) {
header("Location: ../professor/painelprof.php");
    exit;

    } else {
        echo "Senha inválida";
    }
} else {
   echo "Usuário não encontrado";
}

?>