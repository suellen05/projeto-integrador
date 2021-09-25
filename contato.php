<?php include "includes/cabecalho.php"; ?>

<div class="formulario section">  
    <div class="contato-endereco box">
        <h2>Localização</h2>
    
        <div>
            <strong>FABI BOLSAS - REPLICAS DE BOLSAS FEMININA</strong>
            <address>Rua Belo Horizonte,00 </address>
        </div>

        <div>
            <i class="bi bi-whatsapp"></i>
            <i class="bi bi-instagram"></i>
            <i class="bi bi-facebook"></i>
        </div>
        
        <div>
            <strong>Horário de funcionamento</strong>
            Das 8:00 as 18:00
            
            De segunda a Sábado
        </div>
        
        <div class="mapa">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7359.277520171322!2d-47.38917583759836!3d-22.74166441760177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c89c71d35a3417%3A0xd4b59beb8f6fe885!2sR.%20Belo%20Horizonte%2C%20Santa%20B%C3%A1rbara%20d&#39;Oeste%20-%20SP%2C%2013454-330!5e0!3m2!1spt-BR!2sbr!4v1614726976596!5m2!1spt-BR!2sbr"
                width="350" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <div class="contato-formulario box">
        <h1>Contato</h1>
        <form>
            <div class="campo">
                <label for="nome"> Seu Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu Nome*" required>
            </div>

            <div class="campo">
                <label for="Telefone"> Seu Telefone:</label>
                <input type="text" id="Telefone" name="Telefone" placeholder="Digite seu Telefone">
            </div>

            <div class="campo">
                <label for="email"> Seu E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu E-mail*" required>
            </div>

            <div class="campo radiobox">
                <span> Deseja receber nossas novidades?</span>
                <input type="radio" name="novidades" id="sim" value="sim" checked><label for="sim">Sim</label>
                <input type="radio" name="novidades" id="não" value="não"><label for="não">Não</label>
            </div>

            <div class="campo">
                <label for="mensagem"> Sua mensagem: </label>
                <textarea name="mensagem" id="mensagem" placeholder=" mensagem*" required></textarea>
            </div>

            <div class="campo">
                <input class="botao" type="submit" name="acao" value="Enviar">
            </div>
        </form>
    </div> 
</div>

<?php include "includes/rodape.php"; ?>