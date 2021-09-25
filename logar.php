<?php
session_start();

include "includes/conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "SELECT * FROM tb_clientes WHERE email = '{$email}' AND senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
    $usuario_bd = mysqli_fetch_assoc($result);
    $_SESSION['usuario'] = $usuario_bd['nome'];
    $_SESSION['email'] = $usuario_bd['email'];
    $_SESSION['id'] = $usuario_bd['id'];
    header("Location: minha-conta.php");
    exit();
}else {
    header('Location: login.php?mensagem=invalido');
    exit();
}

?>