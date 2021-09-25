<?php include "includes/cabecalho.php"; ?>

<?php
if(isset($_GET['mensagem'])){
    if($_GET['mensagem'] == 'email_existe'){
        echo "<div class='section container erro' role='alert'>
                ERRO: O email informado já existe.
            </div>";
    }
}
?>

<div class="formulario">
    <div class="box" style="width: 70%">
        <form method="post" action="cadastrar.php">
            <h1> Ainda Não é Cliente?</h1>

            <p>
                Ao cadastrar sua conta, você será capaz de comprar mais rápido, ficar atualizado sobre a situação de um pedido e
                acompanhar o histórico dos pedidos que você já fez.
            </p>
            
            <div class="campo">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="*Digite seu Nome*" required>
            </div>

            <div class="campo">
                <label for="endereco">Endereco:</label>
                <input type="text" id="endereco" name="endereco" placeholder="*Digite seu Endereço*" required>
            </div>

            <div class="campo">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" placeholder="*Digite a Cidade*" required>
            </div>

            <div class="campo">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" required>
                    <option>--</option>
                    <option value="RJ">RJ</option>
                    <option value="SP">SP</option>
                    <option value="CE">CE</option>
                </select>
            </div>

            <div class="campo">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" placeholder="*Digite seu Telefone*" required>
            
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="*Digite seu CPF*" required>
            </div>

            <div class="campo">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="*Digite seu Email*" required>
            </div>

            <div class="campo">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="*Digite uma senha*" required>
            </div>

            <div class="campo">
                <input class="botao" type="submit" name="acao" value="ENVIAR">
            </div>
        </form>
    </div>

    <div class="box">
        <h1> Já é Cliente?</h1>

        <p>
            Se você já fez um pedido e cadastrou uma conta, faça login.
        </p>

        <a href="login.php" class="botao">LOGIN</a>
    </div>
</div>

<?php include "includes/rodape.php"; ?>