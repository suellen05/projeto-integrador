<?php 

include_once 'includes/conexao.php';
if(isset($_POST['id_produto'], $_POST['quantidade']) && is_numeric($_POST['id_produto']) && is_numeric($_POST['quantidade'])){
    $id_produto= (int)$_POST['id_produto'];
    $quantidade= (int)$_POST['quantidade'];

    $sql= $pdo->prepare('SELECT * FROM tb_produtos WHERE id = ?'); 
    $sql->execute([$_POST['id_produto']]);
    $produto= $sql->fetch(PDO::FETCH_ASSOC);
    if($produto && $quantidade > 0){

        if(isset($_SESSION['carrinho']) && is_array($_SESSION['carrinho'])){
            if(array_key_exists($id_produto,$_SESSION['carrinho'])){
                $_SESSION['carrinho'][$id_produto] += $quantidade;
            }
            else {
                $_SESSION['carrinho'][$id_produto] = $quantidade;

            }
        }
        else{
            $_SESSION['carrinho'] = array($id_produto => $quantidade);
        }
    } 

    header('Location: carrinho.php');
}

if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['carrinho']) && isset($_SESSION['carrinho'][$_GET['remove']])) {
    unset($_SESSION['carrinho'][$_GET['remove']]);  
}

if(isset($_POST['atualizar']) && isset($_SESSION['carrinho'])){ 
    foreach($_POST as $k => $v) {
        if(strpos ($k, 'quantidade') !== false && is_numeric($v)){
            $id=str_replace('quantidade-', '',$k);
            $quantidade=(int)$v;
            if (is_numeric($id) && isset($_SESSION['carrinho'][$id]) && $quantidade > 0 ){

                $_SESSION['carrinho'][$id] = $quantidade;

            }
        }
    }

    header('Location: carrinho.php');
}

if(isset($_POST['compra']) && isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
    header('Location: checkout.php');
    exit;
}

$produtos_no_carrinho= isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : array();
$produtos = array();
$subtotal = 0.00;

if($produtos_no_carrinho){
    
 $array_to_question_marks = implode(',', array_fill(0, count($produtos_no_carrinho), '?'));
 $sql = $pdo->prepare('SELECT * FROM tb_produtos WHERE id in (' . $array_to_question_marks . ')');
 $sql->execute(array_keys($produtos_no_carrinho));
 $produtos = $sql->fetchAll(PDO::FETCH_ASSOC);
 
 foreach ($produtos as $produto){
     $subtotal += (float)$produto['preco'] * (int)$produtos_no_carrinho[$produto['id']]; 
 }
}

$total = $subtotal + 100;
?>