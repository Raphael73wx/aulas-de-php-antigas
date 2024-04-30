<?php

include("../verificar-autenticidade.php");
include("../conexao-pdo.php");
//verifica se está vindo informações via post
if ($_POST) {
    //verifica campos obrigatórios
    if ( empty($_POST["CPF"]) || strlen($_POST["cpf"]  != 14)) {
        var_dump($_POST);
        exit;
        $_SESSION["tipo"] = 'warning';
        $_SESSION["title"] = 'Ops!';
        $_SESSION["msg"] = 'Por favor, preencha os campos obrigatórios.';
        header("location: ./");
        exit;
    } else {
        $PK_ORDEM_SERVICO= trim($_POST["PK_ORDEM_SERVICO"]);
        $CPF = trim($_POST["CPF"]);
        $DATA_INICIO = trim($_POST["DATA_INICIO"]);
        $DATA_FIM = trim($_POST["DATA_FIM"]);

        try {
            if (empty($PK_ORDEM_SERVICO)) {
                $sql = "
             INSERT INTO ordens_servicos (data_ordem_servico,data_inicio,data_fim,fk_cliente)
             VALUES(CURDATE():data_inicio,:data_fim,(
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
                UPDATE ordens_servico
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
                $stmt->bindParam(':pk_ordem_servico', $PK_ORDEM_SERVICO);
                $stmt->bindParam(':data_inicio', $data_inicio);
                $stmt->bindParam(':CPF', $CPF);
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
            where fk_ordem_servico = fk_ordem_servico
            ";
            $stmt = $coon->prepare($sql);
            $stmt->bindParam('fk_ordem_servico',$pk_ordem_servico);
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
            $_SESSION["msg"] =  '$ex->getMessage()';
            header("location: ./");
            exit;
        }
    }
}
