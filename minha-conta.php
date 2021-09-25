<?php include "includes/cabecalho.php"; ?>
<?php 

if(!isset($_SESSION['usuario'])){
    header('Location: login.php?mensagem=login');
    exit();
}

include_once "includes/conexao.php";

$id_cliente = $_SESSION['id'];

$sql = $pdo->prepare("SELECT * FROM tb_clientes WHERE id = ?");
$sql->execute([$id_cliente]);
$cliente = $sql->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT tb_pedidos.id, tb_pedidos.data, tb_pedidos.valor_total FROM tb_pedidos WHERE id_cliente = ?");
$stmt->bindValue(1, $id_cliente, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total_pedidos = $pdo->query("SELECT tb_pedidos.id, tb_clientes.id FROM tb_pedidos  INNER JOIN tb_clientes ON tb_pedidos.id_cliente = tb_clientes.id WHERE tb_clientes.id = $id_cliente")->rowCount();
?>


<div class="minha-conta container flex coluna">
    <div>
        <h2>Minha conta</h2>
        <h3>Bem vinda, <?php echo $_SESSION['usuario']; ?></h3>
        <h3><a href="logout.php" class="botao">Sair</a></h3>
    </div>

    <div class="dados-pessoais">
        <h3>Dados pessoais</h3>
        <div class="box">
            <form method="post" action="cadastrar.php">
                <div class="campo">
                    <label for="Nome">Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="*Digite seu Nome*" value="<?=$cliente['nome']?>">
                </div>

                <div class="campo">
                    <label for="endereco">Endereco:</label>
                    <input type="text" id="endereco" name="endereco" placeholder="*Digite seu Endereço*" value="<?=$cliente['endereco']?>">
                </div>

                <div class="campo">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" placeholder="*Digite a Cidade*" value="<?=$cliente['cidade']?>">
                </div>

                <div class="campo">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado">
                        <option>--</option>
                        <option value="RJ">RJ</option>
                        <option value="SP">SP</option>
                        <option value="CE">CE</option>
                    </select>
                </div>

                <div class="campo">
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" placeholder="*Digite seu Telefone*" value="<?=$cliente['telefone']?>">
                
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" placeholder="*Digite seu CPF*" value="<?=$cliente['cpf']?>">
                </div>

                <div class="campo">
                    <label for="Email">Email:</label>
                    <input type="text" id="telefone" name="email" placeholder="*Digite seu Email*" value="<?=$cliente['email']?>">
                </div>

                <div class="campo">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="*Digite uma senha*">
                </div>

                <div class="campo">
                    <input class="botao" type="submit" name="acao" value="ALTERAR">
                </div>
            </form>
        </div>
    </div>

    <div class="pedidos">
        <h3>Meus pedidos</h3>
        <div class="flex">
            <?php if($total_pedidos == 0) {
                echo "Você ainda não comprou nada na nossa loja, <a href='bolsas.php'>clique aqui</a> e faça sua primeira compra.";
            }else {
                foreach($result as $pedido){ 
                $id_pedido = $pedido['id'];
                $stmt = $pdo->prepare("SELECT tb_produtos.nome, tb_produtos.fotos, tb_itens_pedido.quantidade FROM tb_itens_pedido INNER JOIN tb_produtos ON tb_itens_pedido.id_produto = tb_produtos.id WHERE id_pedido = ?");
                $stmt->bindValue(1, $id_pedido, PDO::PARAM_INT);
                $stmt->execute();
                $resultItens = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                    <div class="box produto-info">
                        <h4>Pedido #<?=$pedido['id']?>:</h2>

                        <div>
                            <p>Valor total: <?=$pedido['valor_total'];?></p>
                            <p>Data da compra: <?=$pedido['data'];?></p>
                            <?php foreach($resultItens as $itens){ $fotos = explode(',', $itens['fotos']);?>
                                <div class="pedido-info flex">
                                    <div>
                                        <img src="<?=$fotos[0]?>" width="80">
                                    </div>
                                    <p>
                                        <?=$itens['nome']?> 
                                        <br>Quantidade: <?=$itens['quantidade']?>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php 
                }
            }
            ?>
        </div>  
    </div>
</div>


<?php include "includes/rodape.php"; ?>