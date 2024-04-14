<?php require_once("templates/header.php") ?>

<?php
$query = "SELECT * FROM produtos";
$resultado = mysqli_query($conn, $query);

$dados = array(); 


if ($resultado) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $dados[] = $linha;
    }
}

$mensagem = isset($_SESSION['msg']['mensagem']);
$tipo = isset($_SESSION['msg']['tipo']);

?>
<div class="main-container">
    <div class="<?= $tipo ?>">
        <h5><?= $mensagem ?></h5>
    </div>
    <!-- INICIO COMPUTADORES -->
    <div id="carouselExampleControls" class="carousel slide container2" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $grupo = 0;
            for ($i = 0; $i < count($dados); $i++) {
                if ($dados[$i]['categoria'] == 'computador') {
                    if ($grupo % 3 == 0) {
                        $activeClass = ($grupo == 0) ? 'active' : '';
                        ?>
                        <div class="carousel-item <?= $activeClass ?>">
                            <div class="row d-flex align-item-center justify-content-center">
                    <?php
                    }
                    ?>
                            <div class="col-md-3 carousel-text">
                                <img src="conteudos/<?= $dados[$i]['imagem'] ?>" class="d-block w-100" alt="...">
                                <span class="valor">R$ <?= $dados[$i]['valor'] ?></span>
                                <span class="parcela"> 12x R$ 100,00 s/juros</span>
                                <span class="descricao"><?= $dados[$i]['descricao'] ?></span>
                                <span class="btn-comprar"><button onclick="adicionarProduto(<?= $dados[$i]['id'] ?>, <?= $_SESSION['teste'] = 2 ?>)">Comprar</button></span>
                            </div>
                    <?php
                    $grupo++;
                    if ($grupo % 3 == 0 || $i == count($dados) - 1) {
                    ?>
                            </div>
                        </div>
                    <?php
                    }
                }
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
        </a>
    </div>
    <!--FIM  COMPUTADORES -->

    <!--INICIO PROCESSADORES -->
    <div id="carouselExampleControls2" class="carousel slide container2" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $grupo = 0;
            for ($j = 0; $j < count($dados); $j++) {
                if ($dados[$j]['categoria'] == 'processador') {
                    if ($grupo % 3 == 0) {
                        $activeClass = ($grupo == 0) ? 'active' : '';
                        ?>
                        <div class="carousel-item <?= $activeClass ?>">
                            <div class="row d-flex align-item-center justify-content-center">
                    <?php
                    }
                    ?>
                            <div class="col-md-3 carousel-text">
                                <img src="conteudos/<?= $dados[$j]['imagem'] ?>" class="d-block w-100" alt="...">
                                <span class="valor">R$ <?= $dados[$j]['valor'] ?></span>
                                <span class="parcela"> 12x R$ 100,00 s/juros</span>
                                <span class="descricao"><?= $dados[$j]['descricao'] ?></span>
                                <span class="btn-comprar"><button onclick="adicionarProduto(<?= $dados[$j]['id'] ?>, <?= $_SESSION['teste'] = 2 ?>)">Comprar</button></span>
                            </div>
                    <?php
                    $grupo++;
                    if ($grupo % 3 == 0 || $j == count($dados) - 1) {
                    ?>
                            </div>
                        </div>
                    <?php
                    }
                }
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- FIM PROCESSADORES -->

    <!-- INICIO MEMORIA_RAM -->
    <div id="carouselExampleControls3" class="carousel slide container2" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $grupo = 0;
            for ($k = 0; $k < count($dados); $k++) {
                if ($dados[$k]['categoria'] == 'memoria_ram') {
                    if ($grupo % 3 == 0) {
                        $activeClass = ($grupo == 0) ? 'active' : '';
                        ?>
                        <div class="carousel-item <?= $activeClass ?>">
                            <div class="row d-flex align-item-center justify-content-center">
                    <?php
                    }
                    ?>
                            <div class="col-md-3 carousel-text">
                                <img src="conteudos/<?= $dados[$k]['imagem'] ?>" class="d-block w-100" alt="...">
                                <span class="valor">R$ <?= $dados[$k]['valor'] ?></span>
                                <span class="parcela"> 12x R$ 100,00 s/juros</span>
                                <span class="descricao"><?= $dados[$k]['descricao'] ?></span>
                                <span class="btn-comprar"><button onclick="adicionarProduto(<?= $dados[$k]['id'] ?>, <?= $_SESSION['teste'] = 2 ?>)">Comprar</button></span>
                            </div>
                    <?php
                    $grupo++;
                    if ($grupo % 3 == 0 || $k == count($dados) - 1) {
                    ?>
                            </div>
                        </div>
                    <?php
                    }
                }
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- FIM MEMORIA RAM -->
      
     <!-- INICIO PLACA MAE -->
    <div id="carouselExampleControls4" class="carousel slide container2" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $grupo = 0;
            for ($l = 0; $l < count($dados); $l++) {
                if ($dados[$l]['categoria'] == 'placa_mae') {
                    if ($grupo % 3 == 0) {
                        $activeClass = ($grupo == 0) ? 'active' : '';
                        ?>
                        <div class="carousel-item <?= $activeClass ?>">
                            <div class="row d-flex align-item-center justify-content-center">
                    <?php
                    }
                    ?>
                            <div class="col-md-3 carousel-text">
                                <img src="conteudos/<?= $dados[$l]['imagem'] ?>" class="d-block w-100" alt="...">
                                <span class="valor">R$ <?= $dados[$l]['valor'] ?></span>
                                <span class="parcela"> 12x R$ 100,00 s/juros</span>
                                <span class="descricao"><?= $dados[$l]['descricao'] ?></span>
                                <span class="btn-comprar"><button onclick="adicionarProduto(<?= $dados[$l]['id'] ?>, <?= $_SESSION['teste'] = 2 ?>)">Comprar</button></span>
                            </div>
                    <?php
                    $grupo++;
                    if ($grupo % 3 == 0 || $l == count($dados) - 1) {
                    ?>
                            </div>
                        </div>
                    <?php
                    }
                }
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls4" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls4" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- FIM PLACA MAE -->       



</div>




<?php require_once("templates/footer.php"); ?>


<!-- Inclua suas folhas de estilo e scripts -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- Script para inicializar o carrossel -->
<script>
    $(document).ready(function(){
        $('#carouselExampleControls').carousel();
        $('#carouselExampleControls2').carousel();
        $('#carouselExampleControls3').carousel();
        $('#carouselExampleControls4').carousel();
    });
</script>
