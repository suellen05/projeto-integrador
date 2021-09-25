    <div class="selos">
        <img src="img/acesso-seguro.png" title="Acesso Seguro">
        <img src="img/selodequalidade.png" title="Selo Qualidade">
        <img src="img/botao-online.png" title="Atendimento OnLine">
        <img src="img/pagseguro.png" title="Atendimento OnLine">
    </div>

    <footer>
        <div class="rodape">
            <ul>
                <li><h5>INFORMAÇÕES</h5></li>
                <li><a href="sobre.php">Sobre Fabi</a></li>
            </ul>

            <ul>
                <li><h5>SERVIÇOS AO CLIENTE</h5></li>
                <li><a href="#">Solicitar Devolução</a></li>
                <li><a href="#">Mapa Site</a></li>
                <li><a href="contato.php"> Entre em Contato</a></li>
            </ul>

            <ul>
                <li><h5>MINHA CONTA</h5></li>
                <li><a href="<?php if(!isset($_SESSION['usuario'])){ echo "login.php"; } else { echo "minha-conta.php"; }; ?>">Minha conta</a></li>
                <li><a href="<?php if(!isset($_SESSION['usuario'])){ echo "login.php"; } else { echo "minha-conta.php"; }; ?>">Historico de pedidos</a></li>
                <li><a>Lista de Desejos</a></li>
            </ul>
        </div>

        <div class="social">
            <a href="#">
                <i class="bi bi-whatsapp"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="https://www.facebook.com" target="_blank">
                <i class="bi bi-facebook"></i>
            </a>  
        </div>
    </footer>


    <!--=================== JQUERY ===================-->
    <script src="js/jquery-3.6.0.min.js"></script>

    <!--=================== LIGHTBOX JS ===================-->
    <script src="js/lightbox.js"></script>

    <!--=================== SWIPER JS ===================-->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!--=================== JS ===================-->
    <script src="js/funcoes.js"></script>

    </body>

    </html>