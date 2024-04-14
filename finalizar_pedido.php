<?php require_once("templates/header.php"); ?>

<?php 
$carrinho = $_SESSION['carrinho'];
$quant = count($carrinho) - 1;
?>
<div class="container">
    <div class="content">
        <div class="content2">
            <h1>Produtos no carrinho:</h1>
            <div class="finalizarContent">
                <?php for($i = 0; $i < $quant; $i++): ?>
                <div class="finalizarItens">
                    <p>Produto: <?= $i + 1 ?></p>
                    <p> <?= $carrinho[$i]['nome'] ?></p>
                    <p> <?= $carrinho[$i]['valor'] ?></p>
                    <img src="conteudos/<?= $carrinho[$i]['imagem'] ?>" alt="" class="finalizarImg">
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>








<?php require_once("templates/footer.php"); ?>