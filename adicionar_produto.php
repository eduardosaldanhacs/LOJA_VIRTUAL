<?php require_once("config.php"); 


if(isset($_GET['remover'])) {
        $id = $_GET['remover'];
        // Remover o produto do carrinho
        echo "removi";
        $_SESSION['carrinhoTamanho'] = $_SESSION['carrinhoTamanho'] - 1;
        unset($_SESSION['carrinho'][$id]);
        // Reorganizar os índices do carrinho
        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
    header("Location: index.php");
    exit(); // Encerrar o script após redirecionar
}

if(isset($_GET['limpar'])) {
    $_SESSION['carrinhoTamanho'] = 0;
    $_SESSION['total'] = 0;
    unset($_SESSION['carrinho']); 
    header("Location: index.php");
    exit(); // Encerrar o script após redirecionar
}

$_SESSION['produtoid'] = $_GET['id'];
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

$query = "SELECT * FROM produtos WHERE id = $id";
$resultado = mysqli_query($conn, $query);

$produto = mysqli_fetch_assoc($resultado);

if(isset($_SESSION['carrinho'])) {
    // Se o carrinho já existir, adicionar o novo produto ao carrinho
    $carrinho = $_SESSION['carrinho'];
    $indice = count($carrinho); // Encontrar o próximo índice disponível
    $carrinho[$indice]['nome'] = $produto['titulo'];
    $carrinho[$indice]['valor'] = $produto['valor'];
    $carrinho[$indice]['imagem'] = $produto['imagem'];
    $_SESSION['carrinho'] = $carrinho;
    $_SESSION['carrinhoTamanho'] = $indice;
} else {
    // Se o carrinho não existir, criar um novo carrinho e adicionar o produto
    $carrinho = array();
    $carrinho[0]['nome'] = $produto['titulo'];
    $carrinho[0]['valor'] = $produto['valor'];
    $carrinho[0]['imagem'] = $produto['imagem'];
    $_SESSION['carrinho'] = $carrinho;
}
$i = 0;
$total = 0.0;
$quantidade = count($carrinho);
while($quantidade >= $i) {
    $total = $total + $carrinho[$i]['valor'];
    $i++;
}
$_SESSION['total'] = $total;
header("Location: index.php");

 
 ?>