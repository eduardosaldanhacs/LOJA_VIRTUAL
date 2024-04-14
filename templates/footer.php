<footer>
    <div class="footer-content">
        <div class="contact-content">
            <h2>Contato</h2>
            <p><span>TELEFONE:</span> (00) 99999-9999</p>
            <p><span>EMAIL:</span> lojavirtual@gmail.com</p>
        </div>
        <div class="social-content">
            <h2>Redes sociais</h2>
            <p><span>FACEBOOK:</span></p>
            <p><span>INSTAGRAM:</span></p>
        </div>
        <script src="script/scripts.js"></script>
        <script>   
        
            function mostraCarrinho3() {
                    var carrinho = document.getElementById('carrinhoContent')
                    var carrinhoItens = document.getElementById('carrinhoItens')
                        carrinho.style.right = "0"
                        carrinhoItens.style.display = "flex"
                    
                }
        </script>


        <?php if($_SESSION['teste'] == 2) {
            echo "<script> mostraCarrinho3() </script>"; 
        } 
        $_SESSION['teste'] = 1;
        ?> 
    </div>
</footer>
</body>

</html>
