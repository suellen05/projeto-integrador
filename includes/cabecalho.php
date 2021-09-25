<?php 
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

$quantidade_no_carrinho = isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : 0;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=================== FAVICON =================-->
    <link rel="shortcut icon" href="img/favicon.jpg" type="image/x-icon">

    <!--=================== ICONS =================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!--==================== LIGHTBOX CSS ====================-->
    <link rel="stylesheet" href="css/lightbox.css">

    <!--==================== SWIPER CSS ====================-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <!--==================== CSS ====================-->
    <link rel="stylesheet" href="css/estilo.css">

    <title>Fabi Bolsas e Acessórios</title>
</head>

<body>
    <header class="header">
        <div class="menu-topo flex">
            <span><i class="bi bi-credit-card"></i> 6x sem juros</span>

            <span><i class="bi bi-truck"></i> Frete grátis</span>

            <span><i class="bi bi-tag"></i> 10% off na primeira compra</span>        
        </div>
    </header>

    <div class="logo">
        <a href="index.php" title="Fabi Correia" class="_db">
            <img class="logo-img" src="img/logo.png" alt="imagem logo">
        </a>
    </div>

    <nav class="nav">
        <div class="buscar">
            <form action="busca.php">
                <input type="text" name="buscar" id="buscar" placeholder="Encontrar produtos">
                <button><i class="bi bi-search"></i></button>
            </form>
        </div>
        <ul>
            <li>
                <a title="Acessórios" href="#" class="_db"> ACESSÓRIOS </a>
            </li>
            <li>
                <a title="Bolsas" href="bolsas.php" class="_db"> BOLSAS</a>
            </li>
            <li>
                <a title="Carteira" href="#" class="_db"> CARTEIRAS </a>
            </li>
            <li>
                <a title="Promoção" href="#" class="_db"> PROMOÇÕES </a>
            </li>
        </ul>

        <div class="nav-btn">
            <a href="<?php if(!isset($_SESSION['usuario'])){ echo "login.php"; } else { echo "minha-conta.php"; }; ?>">
                <i class="bi bi-person"></i>
            </a>

            <a href="carrinho.php"><i class="bi bi-cart"></i></a>
            <span class="qtd_carrinho flex"><?=$quantidade_no_carrinho?></span>
        </div>
    </nav>
    