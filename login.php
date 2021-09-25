<?php include "includes/cabecalho.php"; ?>

<?php
if(isset($_GET['mensagem'])){
    if($_GET['mensagem'] == 'invalido'){
        echo "<div class='section container erro' role='alert'>
                ERRO: Usuário ou senha inválidos.
            </div>";
    }else if($_GET['mensagem'] == 'login'){
        echo "<div class='section container erro' role='alert'>
                ERRO: Efetue login para continuar.
            </div>";
    }else if($_GET['mensagem'] == 'cadastro_efetuado'){
        echo "<div class='section container sucesso' role='alert'>
                Cadastro efetuado com sucesso. Faça login para continuar.
            </div>";
    }
}
?>

<div class="formulario">
    <div class="box">
        <h2>Já é Cliente?</h2>

        Se você já fez um pedido e cadastrou uma conta, coloque os dados da conta abaixo:

        <form action="logar.php" method="post">
            <div class="campo">
                <label for="email"> Email:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu Email*" required>
            </div>

            <div class="campo">
                <label for="senha"> Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua Senha*" required>
            </div>

            <div class="campo">
                <input class="botao" type="submit" name="acao" value="ENVIAR">
            </div>
        </form>
    </div>

    <div class="box">
        <h2> Ainda Não é Cliente?</h2>

        <p>
            Ao cadastrar sua conta, você será capaz de comprar mais rápido, ficar atualizado sobre a situação de um pedido e
            acompanhar o histórico dos pedidos que você já fez.
        </p>

        <a href="cadastro.php" class="botao">CADASTRO</a>
    </div>
</div>

<?php include "includes/rodape.php"; ?>