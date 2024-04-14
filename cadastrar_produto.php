<?php
require_once("config.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $imagem = $_FILES['arquivo']['name'];
    $valor = $_POST['valor'];
    $categoria = $_POST['categoria'];
    
    $query = "INSERT INTO produtos 
    (categoria, titulo, imagem, descricao, valor)
    VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "sssss", $categoria, $titulo, $imagem, $descricao, $valor);

    if(mysqli_stmt_execute($stmt)) {
        echo "Deu certo!";
    } else {
        echo "Deu erro!";
        exit();
    }

    mysqli_stmt_close($stmt);

    mysqli_close($conn);


    // Verifica se houve algum erro no envio do arquivo
    if ($_FILES["arquivo"]["error"] != UPLOAD_ERR_OK) { // Alterado o operador para !=
        echo "Erro ao enviar arquivo.";
    } else {
        $arquivo_nome = $_FILES["arquivo"]["name"];
        $arquivo_temporario = $_FILES["arquivo"]["tmp_name"];

        // Define o diretório de destino onde o arquivo será salvo
        $diretorio_destino = "C:/xampp/htdocs/LOJA_VIRTUAL/conteudos/";

        // Move o arquivo temporário para o diretório de destino
        if (move_uploaded_file($arquivo_temporario, $diretorio_destino . $arquivo_nome)) {
            echo "Arquivo enviado com sucesso. O arquivo foi salvo em: " . $diretorio_destino . $arquivo_nome;
            header("Location: index.php");
        } else {
            echo "Erro ao enviar arquivo.";
            header("Location: index.php");
        }
    }
}
?>