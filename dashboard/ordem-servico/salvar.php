<?php

include("../verificar-autenticidade.php");
include("../conexao-pdo.php");
//verifica se está vindo informações via post
if ($_POST) {
    //verifica campos obrigatórios
    if (empty($_POST["nome"]) || empty($_POST["cpf"]) || strlen($_POST["cpf"]) != 14) {
   
        $_SESSION["tipo"] = 'warning';
        $_SESSION["title"] = 'Ops!';
        $_SESSION["msg"] = 'Por favor, preencha os campos obrigatórios.';
        header("location: ./");
        exit;
    } else {

        $pk_ordem_servico= trim($_POST["pk_ordem_servico"]);
        $cpf = trim($_POST["cpf"]);
        $data_inicio = trim($_POST["data_inicio"]);
        $data_fim = trim($_POST["data_fim"]);

        try {
            if (empty($pk_ordem_servico)) {
                $sql = "
             INSERT INTO ordens_servicos (data_ordem_servico,data_inicio,data_fim,fk_cliente)
             VALUES(CURDATE(),:data_inicio,:data_fim,(
                SELECT pk_cliente
                FROM clientes
                WHERE cpf LIKE :cpf
             ))
             ";
                $stmt = $coon->prepare($sql);
                $stmt->bindParam(':data_inicio',$data_inicio);
                $stmt->bindParam(':data_fim',$data_fim);
                $stmt->bindParam(':cpf',$cpf);
            } else {
                $sql = "
                UPDATE ordens_servicos
                SET data_inicio =:data_inicio,
                data_fim =:data_fim,
                fk_cliente = (
                    SELECT pk_cliente
                    FROM clientes
                    WHERE cpf LIKE :cpf 
                ) 
                WHERE pk_ordem_servico = :pk_ordem_servico
                ";
                $stmt = $coon->prepare($sql);
                $stmt->bindParam(':pk_ordem_servico', $pk_ordem_servico);
                $stmt->bindParam(':data_inicio', $data_inicio);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':data_fim', $data_fim);
            }

            //executa inset ou update acima
            $stmt->execute();

            if (empty($pk_ordem_servico)) {
                $pk_ordem_servico =$coon->lastInsertId();
            }

            //montar dados da tabela rl_servicos_os
            $sql = "
            DELETE FROM  rl_servicos_os
            where fk_ordem_servico = :fk_ordem_servico
            ";
            $stmt = $coon->prepare($sql);
            $stmt->bindParam(':fk_ordem_servico',$pk_ordem_servico);
            $stmt->execute();

            $sql = "
            INSERT INTO rl_servicos_os VALUES
            ";
            
            $servicos = $_POST["fk_servico"];
            $valores = $_POST["valor"];

            foreach($servicos as $key =>$servico){
                $sql.="(:fk_servico_$key, :fk_ordem_servico,:valor_$key),";
            };
            
            $sql = substr($sql,0,-1);
            $stmt = $coon->prepare($sql);

            foreach($servicos as $key =>$servico){
                $stmt->bindParam(":fk_servico_$key",$servicos[$key]);
                $stmt->bindParam(":fk_ordem_servico",$pk_ordem_servico);
                $stmt->bindParam(":valor_$key",$valores[$key]);
            }
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
