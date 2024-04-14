<?php 

    require_once("config.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $type = $_POST['type'];
        if($type == "cadastrar") {
            if($_POST['nome'] == "" || $_POST['email'] == "" || $_POST['CPF'] == "" || $_POST['data_nascimento'] == "" 
            || $_POST['senha'] == "" || $_POST['confirmasenha'] == "") {
                $_SESSION['tipo'] = "error";
                $_SESSION['mensagem'] = "Preencha todos os dados!";
                header("Location: login.php");
                exit();
            }
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $CPF = $_POST['CPF'];
            $data_nascimento = $_POST['data_nascimento'];
            $senha_padrao = ($_POST['senha']);
            $confirmasenha = ($_POST['confirmasenha']);

            if($senha_padrao != $confirmasenha) {
                $_SESSION['tipo'] = "error";
                $_SESSION['mensagem'] = "Escolha senhas iguais!";
                header("Location: login.php");
                exit();
            }
            
            $senha = password_hash($senha_padrao, PASSWORD_DEFAULT);
    
            $query = "INSERT INTO usuarios 
            (nome, email, CPF, data_nascimento, senha, confirmasenha)
            VALUES (?, ?, ?, ?, ?, ?)";
    
            $stmt = mysqli_prepare($conn, $query);
    
            mysqli_stmt_bind_param($stmt, "ssssss", $nome, $email, $CPF, $data_nascimento,
            $senha, $confirmasenha);
    
            if(mysqli_stmt_execute($stmt)) {
                $_SESSION['logado'] = true;
                $_SESSION['tipo'] = "success";
                $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
                header("Location: usuario.php");
                exit();
            } else {
                $_SESSION['logado'] = false;
                $_SESSION['tipo'] = "error";
                $_SESSION['mensagem'] = "Erro no cadastro, tente novamente!";
                header("Location: index.php");
                exit();
            }
    
            mysqli_stmt_close($stmt);
    
            mysqli_close($conn);
        } else if ($type == "entrar") {
            $email = $_POST['email'];
            $senha_padrao = $_POST['senha'];
            $senha = password_hash($senha_padrao, PASSWORD_DEFAULT);

            $query = "SELECT senha FROM usuarios WHERE email = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "s", $email);

            mysqli_stmt_execute($stmt);

            $resultado = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($resultado) > 0) {
                $row = mysqli_fetch_assoc($resultado);
                $senha_hash = $row['senha'];
                if(password_verify($senha_padrao, $senha_hash)) {
                    $_SESSION['logado'] = true;
                    $_SESSION['tipo'] = "success";
                    $_SESSION['mensagem'] = "Login realizado com sucesso!";
                    header("Location: usuario.php");
                    exit();
            } else {
                $_SESSION['logado'] = false;
                $_SESSION['tipo'] = "error";
                $_SESSION['mensagem'] = "Erro no login, tente novamente!";
                header("Location: login.php");
                exit();
            }
            }
        } else if ($type == "sair") {
            session_destroy();
            session_start();
            $_SESSION['tipo'] = "success";
            $_SESSION['mensagem'] = "Logout realizado com sucesso!";
            header("Location: index.php");
        exit();
        }
        

    } else {
        echo "Erro: Nenhum dado enviado!";
        header("Location: index.php");
        exit();
    }

?>
