<?php 
    require_once("templates/header.php"); 



?>
<div class="container">
    <div class="content">
        <div class="formulario-container">
            <form action="cadastro.php" class="formulario formulario_login" method="POST">
                <label for="">Email:</label>
                <input type="email" name="email" placeholder="Digite o seu email" autocomplete="off">
                <label for="">Senha:</label>
                <input type="password" name="senha" placeholder="Digite a sua senha">
                <input type="hidden" name="type" value="entrar" autocomplete="off">
                <input type="submit" value="Entrar" class="botao">
            </form>
        </div>
        <div class="formulario-container">
            <form action="cadastro.php" class="formulario formulario_cadastro" method="POST">
                <label for="">Nome</label>
                <input type="text" name="nome" placeholder="Digite o seu nome">
                <label for="">Email</label>
                <input type="email" name="email" placeholder="Digite o seu email">
                <label for="">CPF</label>
                <input type="text" name="CPF" id="CPF" placeholder="Digite o seu CPF">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="text" name="data_nascimento" id="data_nascimento" placeholder="DD/MM/AAAA">
                <label for="">Senha</label>
                <input type="password" name="senha" placeholder="Escolha uma senha">
                <label for="">Repita a senha</label>
                <input type="password" name="confirmasenha" placeholder="Repita a senha">
                <input type="hidden" name="type" value="cadastrar">
                <input type="submit" value="Cadastrar" class="botao">
            </form>
        </div>
    </div>
</div>

<script src="script/scripts.js"></script>
<?php require_once("templates/footer.php")?>