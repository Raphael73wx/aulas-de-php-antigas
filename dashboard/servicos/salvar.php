<?php

include("../verificar-autenticidade.php");
include("../conexao-pdo.php");
//verifica se está vindo informações via post
if ($_POST) {
    //verifica campos obrigatórios
    if (empty($_POST["servico"])) {
        $_SESSION["tipo"] = 'warning';
        $_SESSION["title"] = 'Ops!';
        $_SESSION["msg"] = 'Por favor, preencha os campos obrigatórios.';
        header("location: ./");
        exit;
    } else {
        $pk_servico = trim($_POST["pk_servico"]);
        $servico = trim($_POST["servico"]);

        try {
            if (empty($pk_servico)) {
                $sql = "
             INSERT INTO servicos (servico)
             VALUES(:servico)
             ";
                $stmt = $coon->prepare($sql);
                $stmt->bindParam(':servico', $servico);
            } else {
                $sql = "
            UPDATE servicos SET servico = :servico 
            WHERE pk_servico = :pk_servico
            ";
                $stmt = $coon->prepare($sql);
                $stmt->bindParam(':pk_servico', $pk_servico);
                $stmt->bindParam(':servico', $servico);
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
