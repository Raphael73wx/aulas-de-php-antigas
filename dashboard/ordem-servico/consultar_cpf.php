<?php
include('../verificar-autenticidade.php');
include('../conexao-pdo.php');

if (isset($_GET["cpf"])){
        $cpf = trim($_GET["cpf"]);
        $sql="
        SELECT nome
        FROM clientes 
        WHERE cpf LiKE :cpf 
        "; 

        try {
            $stmt = $coon-> prepare($sql);
            $stmt->bindParam(':cpf',$cpf);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $dado = $stmt->fetch(PDO::FETCH_OBJ);
                $success = true;
            }else{
                $dado = "Registro não encontrado";
                $success = false;
            }

        } catch (PDOException $ex ) {
           $dado = $ex->getMessage();
           $success = false;
        }

        echo json_encode(array(
            'success' =>$success,
            'dado' =>$dado
        ));
}


?>