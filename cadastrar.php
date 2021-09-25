<?php
session_start();
include "includes/conexao.php";

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$estado = mysqli_real_escape_string($conexao, trim($_POST['estado']));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

$sql = "SELECT COUNT(*) AS total FROM tb_clientes WHERE email = '$email'";
$resultado = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($resultado);

if($row['total'] == 1) {
    header('Location: cadastro.php?mensagem=email_existe');
    exit;
}

$sql = "INSERT INTO tb_clientes (nome, endereco, cidade, estado, telefone, cpf, email, senha) 
        VALUES ('$nome', '$endereco', '$cidade', '$estado', '$telefone', '$cpf', '$email', '$senha')
        ";

if($conexao->query($sql) === TRUE) {
    header('Location: login.php?mensagem=cadastro_efetuado');
    exit;
}

$conexao->close();
?>