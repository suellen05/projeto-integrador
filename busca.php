<?php
include "includes/cabecalho.php";
include "includes/conexao.php";

if(!isset($_GET['buscar'])) {
    header("Location: index.php");
    exit;
}

$buscar = "%" . trim($_GET['buscar']) . "%";

$query = $pdo->prepare("SELECT * FROM tb_produtos WHERE nome LIKE :nome");
$query->bindParam(':nome', $buscar, PDO::PARAM_STR);
$query->execute();
$total_products = $query->rowCount();


$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <?php echo "<div class='section container flex'><h2>Você buscou por: {$_GET['buscar']}</h2></div>"; ?>
    <h2>Encontramos <?=$total_products?> produto(s)</h2>
    <div class="container-flex">
        <?php
        if(count($result)) {
            foreach($result as $produto): $fotos = explode(',', $produto['fotos']); ?>
                <div class="produtos">
                    <a href="bolsa.php?id=<?=$produto['id']?>">
                        <img src="<?=$fotos[0]?>">
                        <p><?=$produto['nome']?></p>
                        <p>R$ <?=$produto['preco']?></p>
                    </a>
                </div>
            <?php endforeach;
        }else {
            echo "<div class='section container flex'>Não encontramos resultados pelo  termo buscado.</div>";
        }
        ?>
    </div>
</div>

<?php include "includes/rodape.php"; ?>