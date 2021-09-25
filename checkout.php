<?php include "includes/cabecalho.php"; ?>

<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

include "carrinho-funcoes.php";
include_once "includes/conexao.php";

if(isset($_SESSION['email']) && isset($_SESSION['carrinho'])){
    $stmt = $pdo->prepare("SELECT id FROM tb_clientes WHERE email = ?");
    $stmt->execute([$_SESSION['email']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id_cliente = $result['id'];
    

    $sql = $pdo->prepare("INSERT INTO tb_pedidos(id_cliente, valor_total) VALUES($id_cliente, $subtotal)");
    $sql->execute();

    foreach($produtos as $produto){
        $id = $produto['id'];
        $quantidade = $produtos_no_carrinho[$produto['id']];
        $stmt = $pdo->prepare("INSERT INTO tb_itens_pedido(id_produto, quantidade, id_pedido) values($id, $quantidade, (SELECT MAX(id) FROM tb_pedidos))");
        $stmt->execute();
    }

    unset($_SESSION['carrinho']);
    header('Location: checkout.php');
}

?>

<div class="section container coluna">
    <h2 class="sucesso">Pedido realizado!</h2>
    <a href="minha-conta.php" class="sucesso">Ver meus pedidos</a>
</div>


<?php include "includes/rodape.php"; ?>