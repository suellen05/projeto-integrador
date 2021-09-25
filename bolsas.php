<?php include_once "includes/cabecalho.php"; ?>

<section class="container-flex">
    <?php 
        include "includes/conexao.php";
        $sql = $pdo->prepare("SELECT * FROM tb_produtos");
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
</section>

<?php include "includes/rodape.php"; ?>