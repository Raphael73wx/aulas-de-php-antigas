<?php

include("../verificar-autenticidade.php");
include("../conexao-pdo.php");
//verifica se está vindo informações via post
if ($_POST) {
    //verifica campos obrigatórios
    if (empty($_POST["nome"]) || empty($_POST["email"])) {
        $_SESSION["tipo"] = 'warning';
        $_SESSION["title"] = 'Ops!';
        $_SESSION["msg"] = 'Por favor, preencha os campos obrigatórios.';
        header("location: ./");
        exit;
    } else {
        $pk_usuario = $_SESSION["pk_usuario"];
        $nome = trim($_POST["nome"]);
        $email = trim($_POST["email"]);
        $senha = trim($_POST["senha"]);
        $foto = $_FILES["foto"];
        try {
            if (empty($senha)) {
                $sql = "
             UPDATE usuarios SET
             nome = :nome,
             email = :email
             WHERE pk_usuario = :pk_usuario
             ";
                $stmt = $coon->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':pk_usuario', $pk_usuario);
            } else {
                $sql = "
            UPDATE usuarios SET 
            nome = :nome,
            email = :email,
            senha = :senha
            WHERE pk_usuario = :pk_usuario
            ";
                $stmt = $coon->prepare($sql);
                $stmt->bindParam(':pk_usuario', $pk_usuario);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':senha', $senha);
                $stmt->bindParam(':email', $email);
            }

            //executa inset ou update acima
            $stmt->execute();
            $_SESSION["tipo"] = 'success';
            $_SESSION["title"] = 'Oba!';
            $_SESSION["msg"] = 'Registro salvo com sucesso!';
            
            header("location: ./");
            exit;
        } catch (PDOException $ex) {
            $_SESSION["tipo"] = 'error';
            $_SESSION["title"] = 'Ops!';
            $_SESSION["msg"] =  $ex->getMessage();
            header("location: ./");
            exit;
        }
    }
}
 