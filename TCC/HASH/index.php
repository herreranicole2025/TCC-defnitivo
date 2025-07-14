<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
</head>
<body>
    
<?php

include "conecta.php";

// Seleciona todos os dados da tabela contatos
$sql = "SELECT * FROM usuarios";
// Executa o Select 
$resultado = mysqli_query($conexao,$sql); 

?>

<h1> Usuários </h1>

<h1> Inserir Usuário</h1>

    <form action="inserirUsuario.php" method="post">
        Nome:
        <input type="text" name="nome"> <br>
        Usuário:
        <input type="text" name="usu"> <br>
        Senha:
        <input type="text" name="senha"> <br>
        <input type="submit" value="inserir novo cadastro">


    </form>

<hr>

<h1> Login de Usuário</h1>

    <form action="login.php" method="post">
        Usuário:
        <input type="text" name="usuario"> <br>
        Senha:
        <input type="text" name="senha"> <br>
        <input type="submit" value="fazer login">


    </form>


<?php
/*
if(!empty($resultado)){

    //Lista os contatos

    while ($dados = mysqli_fetch_assoc($resultado)) { 

        echo "Usuário:  {$dados['usuário']} "; 
        echo '<hr>';

    }
    
} else {
    echo "Ainda não há usuários cadastrados.";
}
*/

?>

</body>
</html>
