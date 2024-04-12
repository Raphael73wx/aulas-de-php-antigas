<?php

// criar sessão para variavel glonal
session_start();

//VERIFICA SE ESTA VINDO INFORMAÇÕES PARA VALIDAÇÃO DE E-MAIL E SENHA
if ($_POST) {
    //VERIFICAR SE FOI ENVIADO OS CAMPOS OBRIGATORIOS
    if (empty($_POST["email"]) || empty($_POST["senha"])) {
        $_SESSION["msg"] = "Por favor, preencha os campos obrigatórios!";
        $_SESSION["tipo"] = "warning";

        // var_dump($_SESSION);exit;

        header("location: Login.php");
        exit;
    }
    else {
        include('conexao-pdo.php');
        //recuperar informações do formulário login 
        $email = trim($_POST["email"]);
        $senha = trim($_POST["senha"]);

        //montar sintaxe sql para consultar no banco de dados 
        $stmt = $coon->prepare("    
        SELECT pk_usuario,nome
        FROM usuarios
        WHERE email LIKE :email
        AND senha LIKE :senha
        ");

        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':senha',$senha);

        $stmt->execute();
        //VERIFICA SE ENCONTROU ALGUM REGISTRO NA TABELA
        if ($stmt->rowCount() > 0) {
            //ORGANIZA OS DADOS DO BANCO COMO OBJETOS NA VARIAVEL $ROW
            $row = $stmt->fetch(PDO::FETCH_OBJ);

            //DECLARO VARIAVEL GLOBAL INFORMANDO QUE USUARIOE ESTA AUTENTICADO
            $_SESSION["autenticado"] = true;
            $_SESSION["pk_usuario"] = $row->pk_usuario;
            $_SESSION["nome_usuario"] = $row->nome;
            $_SESSION["tempo_login"] = time();

        }
        else{
            $_SESSION["msg"] = 'E-mail e/ou senha invalidos!';
            $_SESSION["tipo"] = 'error';

            header('Location: login.php');
            exit;
        }
    }
}else {
    header('Location: ./tela_login.php');
    exit;
}

?>