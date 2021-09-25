<?php

include_once "includes/conexao.php";

$sql = $pdo->prepare("SELECT * FROM tb_produtos WHERE id = ?");
$sql->execute([$_GET['id']]);
$resultado = $sql->fetch(PDO::FETCH_ASSOC);

if($resultado){
    $fotos = explode(',', $resultado['fotos']);
}

?>

<?php include "includes/cabecalho.php"; ?>

<section class="produto">
    <div class="produto-galeria galeria">
        <a href="<?php echo $fotos[0]?>" data-lightbox="bolsas">
            <img src="<?php echo $fotos[0]?>" alt="bolsa frente">
        </a>

        <a class="bolsa-oculta" href="<?php echo $fotos[1]?>" data-lightbox="bolsas">
            <img src="<?php echo $fotos[1]?>">
        </a>
    </div>


    <div class="produto-info">
        <h2><?=$resultado['nome']?></h2>

        <p> Marca: <?=$resultado['marca']?></p>

        <p>Modelo: <?=$resultado['modelo']?></p>

        <p>Disponibilidade: Em estoque</p>

        <p>R$ <?php echo number_format($resultado['preco'], 2,',', '.')?></p>

        <div class="tamanho-produto">
            <p>Tamanho</p>

            <button type="button" class="btn btn-outline-danger">M</button>
            <button type="button" class="btn btn-outline-danger">G</button>
        </div>

        <form action= 'carrinho.php ' method='post'>
            <label for="quantidade">Quantidade</label><br>
            <input type="number" id="quantidade" name="quantidade" value="1" min="1" max="<?=$resultado['estoque']?>" required>
            <input type="hidden" name="id_produto" value="<?=$resultado['id']?>">
            
            <button class="botao">Comprar</button>
        </form>
    </div>
</section>

<section class="coluna section">
    <h2>Produtos Relacionados</h2>

    <div class="flex">
        <div class="produtos">
            <a href="#">
                <img src="img/chanel-calfskin.jpg" alt="bolsa-7">
                <p> BOLSA CHANEL</p>
                <p>R$ 180,00</p>
            </a>
        </div>
        
        <div class="produtos">
            <a href="#">
                <img src="img/vuitton-manhattan.jpeg" alt="bolsa-4">
                <p> BOLSA LOUIS VUITTON</p>
                <p>R$ 150,00</p>
            </a>
        </div>

        <div class="produtos">
            <a href="#">
                <img src="img/vuitton-neverfull.jpg" alt="bolsa-5">
                <p>BOLSA LOUIS NEVERFULL</p>
                <p>R$ 190,00</p>
            </a>
        </div>
    </div>
</section>

<?php include "includes/rodape.php"; ?>