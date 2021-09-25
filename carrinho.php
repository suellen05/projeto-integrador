<?php include "includes/cabecalho.php"; ?>

<?php include_once 'carrinho-funcoes.php'; ?>

<div class="carrinho container">
    <form action="" method="post">
        <h2>Carrinho</h2>
        <table>
            <thead>
                <tr>
                    <th colspan="2">Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Remover</th>
                </tr>
            </thead>

            <tbody>
                <?php if(empty($produtos)): ?>
                    <tr>
                        <td colspan="4">Você ainda não adicionou nenhum produto ao carrinho.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach($produtos as $produto): 
                        $fotos = explode(',', $produto['fotos'])?>
                        <tr>
                            <td>
                                <a href="bolsa.php?id=<?php echo $produto['id']?>">
                                    <img src="<?php echo $fotos[0]?>" width="130">
                                </a>
                            </td>

                            <td>
                                <?=$produto['nome']?>
                            </td>

                            <td>
                                R$ <?=$produto['preco']?>
                            </td>

                            <td>
                            <input type="number" name="quantidade-<?=$produto['id']?>"
                                                value="<?=$produtos_no_carrinho[$produto['id']]?>" min="1"
                                                max="<?=$produto['estoque']?>" required>
                            </td>

                            <td>
                                R$ <?=$produto['preco'] * $produtos_no_carrinho[$produto['id']]?>
                            </td>

                            <td>
                                <a href="?id=<?=$produto['id']?>&remove=<?=$produto['id']?>" class="remove">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="flex carrinho-flex">
            <div class="campo carrinho-campo">
                <label for="">Calcular frete</label>
                <input type="text">
                <button class="botao">Calcular</button>
            </div>

            <div class="box carrinho-box">
                <p>Frete: <span>R$ 100,00</span></p>
                <p>Subtotal: <span>R$ <?=$subtotal?></span></p>
                <p>Total: <span>R$ <?=$total?></span></p>
            </div>
        </div>

        <div class="flex">
            <a href="bolsas.php" class="continuar-comprando-link"><i class="bi bi-arrow-left"></i> Continuar comprando</a>

            <div class="flex">
                <input type="submit" value="Atualizar carrinho" name="atualizar" class="botao">

                <a href="<?php if(!isset($_SESSION['usuario'])){ echo "login.php"; } else if(isset($_SESSION['usuario']) && isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])){ echo "checkout.php"; }; ?>" class="botao">Finalizar compra</a>
            </div>
        </div>
    </form>
</div>

<?php include "includes/rodape.php"; ?>