<?php require_once("templates/header.php")?>




<div class="container">
    <div class="content content_produto">
            <div class="formulario-container formulario_produto">
                <form action="cadastrar_produto.php" class="formulario formulario_login" method="POST" enctype="multipart/form-data">
                    <label for="">Categoria</label>
                    <select name="categoria" id="">
                        <option value="computador">Computador</option>
                        <option value="processador">Processador</option>
                        <option value="placa_mae">Placa Mãe</option>
                        <option value="placa_video">Placa de Video</option>
                        <option value="gabinete">Gabinete</option>
                        <option value="fonte">Fonte</option>
                        <option value="memoria_ram">Memoria Ram</option>
                    </select>
                    <label for="">Título</label>
                    <input type="text" name="titulo" placeholder="Digite o titulo" autocomplete="off">
                    <label for="">Escolha a imagem:</label>
                    <input type="file" id="arquivo" name="arquivo">
                    <label for="">Digite o valor do produto</label>
                    <input type="text" id="valor" name="valor" oninput="formatarParaReais(this)">
                    <label for="">Digite a descrição do produto</label>
                    <input type="text" name="descricao">
                    <input type="hidden" name="type" value="entrar" autocomplete="off">
                    <input type="submit" value="Entrar" class="botao">
                </form>
            </div>
    </div>
</div>

<script>
        function formatarParaReais(input) {
            // Remove todos os caracteres que não sejam dígitos
            let valor = input.value.replace(/\D/g, '');
            
            // Adiciona uma vírgula para separar os centavos
            valor = valor.replace(/(\d{2})$/, ',$1');

            // Adiciona pontos a cada milhar
            valor = valor.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');

            // Atualiza o valor do campo de entrada
            input.value = valor;
        }
</script>