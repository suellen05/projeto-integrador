<?php include "includes/cabecalho.php"; ?>

<div class="swiper">
    <div class="swiper-wrapper banner">
        <div class="swiper-slide">
            <img src="img/foto1.jpg" alt="">
        </div>
        <div class="swiper-slide">
            <img src="img/foto2.jpg" alt="">
        </div>
        <div class="swiper-slide">
            <img src="img/foto3.jpg" alt="">
        </div>
    </div>

    <div class="swiper-pagination"></div>

    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<section class="coluna section">
    <h2>DESTAQUES</h2>

    <div class="flex">
        <?php 
            include "includes/conexao.php";
            $sql = $pdo->prepare("SELECT * FROM tb_produtos LIMIT 4");
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach($resultado as $produto){
                $fotos = explode(',', $produto['fotos']); ?>
                <div class="produtos">
                    <a href="bolsa.php?id=<?=$produto['id']?>">
                        <img src="<?=$fotos[0]?>">
                        <p><?=$produto['nome']?></p>
                        <p>R$ <?=$produto['preco']?></p>
                    </a>
                </div>
                <?php
            }
        ?>
    </div>
</section>

<?php include "includes/rodape.php"; ?>