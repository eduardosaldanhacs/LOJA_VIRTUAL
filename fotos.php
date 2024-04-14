<?php require_once("templates/header.php") ?>
<?php
    $id = $_GET['item'];
    $query = "SELECT * FROM produtos WHERE id = '$id'";
    $resultado = mysqli_query($conn, $query);
    if($resultado) {
        $produto = mysqli_fetch_assoc(($resultado));
    }

?>

<div class="container">
    <div class="content">
        <div class="product-area">
            <ul>
                <li>
                    <h4><?= $produto['titulo'] ?></h4>
                    <a href=""><img src="conteudos/<?= $produto['imagem'] ?>" alt=""></a>
                    <span>R$ <?= $produto['valor'] ?></span>
                    <span><?= $produto['descricao'] ?></span>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php require_once("templates/footer.php") ?>