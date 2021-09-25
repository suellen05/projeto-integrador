<?php

$servidor = '127.0.0.1';
$usuario = 'root';
$senha = '';
$banco = 'bd_projeto_integracao';

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if(!$conexao){
    die("<h3>Não conectou</h3> Erro: " . mysqli_connect_error());
}

try{
    $pdo = new PDO('mysql:host=localhost;dbname=bd_projeto_integracao', $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $erro){
    echo "Erro: " . $erro->getMessage();
}