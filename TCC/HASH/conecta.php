<?php

// realizar a conexão com o BD
$bdServidor = 'localhost'; 
$bdUsuario = 'root'; 
$bdSenha = ''; // sem senha
$bdBanco = 'sistema_turmas';

mysqli_report(MYSQLI_REPORT_OFF);

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, 
$bdBanco);

if (!$conexao) {
    echo('Erro de conexão: ' . 
        mysqli_connect_error());
    die();
}