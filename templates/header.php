<?php require_once("config.php"); 
    if(isset($_SESSION['logado'])) {
        $logado = true;
} 

$mensagem = ($_SESSION['mensagem']);
$tipo = ($_SESSION['tipo']);
$nome = $_SESSION['nome'];
$valor = $_SESSION['valor'];

$carrinhoTamanho = $_SESSION['carrinhoTamanho'];


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja virtual</title>
    <script src="https://kit.fontawesome.com/156d6a1fcd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <div class="header-content">
            <div class="header-title">
                <h1>Company EGS</h1>
            </div>
            <div class="header-list">
                <nav>
                    <ul>
                        <li><a href="index.php">INÍCIO</a></li>
                        <li><a href="#">PRODUTOS</a></li>
                        <li><a href="#" id="categorias-link">CATEGORIAS</a></li>
                        <li><a href="#">CONTATO</a></li>
                        <li><a href="cadastro_produto.php">CADASTRO</a></li>
                    </ul>
                </nav>
            </div>
            <div id="categorias-lista" style="display: none;">
                <ul>
                    <li style="color: white ;">Categoria 1</li>
                    <li style="color: white ;">Categoria 2</li>
                    <li style="color: white ;">Categoria 3</li>
                    <!-- Adicione mais categorias conforme necessário -->
                </ul>
            </div>
            <div class="header-list2">
                <?php if(isset($logado) == "logado"): ?>
                    <span><a href="usuario.php">PERFIL</a></span>
                <?php else: ?>
                    <span><a href="login.php">LOGIN</a></span>
                <?php endif; ?>
                
                <a href="" class="carrinho" onclick="mostraCarrinho(event)"><span>CARRINHO</span></a>
            </div>
        </div>
    </header>
    <div class="<?= $tipo ?>">
       <h5><?= $mensagem ?></h5>
       <?php 
            unset($_SESSION['mensagem']);
            unset($_SESSION['tipo']);
       ?> 
    </div>  
    <div id="carrinhoContent">
        <div id="carrinhoItens">
            <ul class="carrinhoList">
                <?php for($i = 0; $i < $carrinhoTamanho; $i++): ?>
                <li class="carrinhoItem">
                    <div class="iconCarrinhoProdutos">
                        <span><a href="adicionar_produto.php?remover=<?=$i?>"><i class="fa-solid fa-trash"></i></a></span>
                        <span><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="txtCarrinhoProdutos">
                        <span><?= $_SESSION['carrinho'][$i]['nome'] ?></span>
                        <span>R$: <?= $_SESSION['carrinho'][$i]['valor'] ?></span>
                    </div>
                    <div>
                        <img src="conteudos/<?= $_SESSION['carrinho'][$i]['imagem'] ?>" alt="" width="50px" height="50px">
                    </div>
                </li>
                <?php endfor; ?>
            </ul>
                
            <div class="finalizarCompra">
                <a href="adicionar_produto.php?limpar=sim"><input type="submit" value="Limpar" id="botaoLimpar"></a>
                <form action="finalizar_pedido.php" class="" method="POST">
                    <input type="hidden" name="pedidos" value="<?= $_SESSION['carrinho'] ?>">
                    <input type="submit" value="Finalizar" id="botaoFinalizar">
                </form>
            </div>
        </div>
    </div>             
    <script>
        document.getElementById('categorias-link').addEventListener('click', function(event) {
    event.preventDefault(); // Impede o comportamento padrão do link
    var categoriasLista = document.getElementById('categorias-lista');
    if (categoriasLista.style.display === 'none') {
        categoriasLista.style.display = 'block'; // Mostra a lista de categorias
    } else {
        categoriasLista.style.display = 'none'; // Oculta a lista de categorias
    }
});




    </script>



    