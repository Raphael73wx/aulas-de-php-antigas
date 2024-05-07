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

        if ($foto["error"] != 4) {
            $ext_permitidos = array(
                "bmp",
                "jpg",
                "jpeg",
                "png",
                "jfif",
                "tiff"
            );
            $extensao = pathinfo($foto["name"], PATHINFO_EXTENSION);
            if (in_array($extensao,$ext_permitidos)) {
                $novo_nome = hash("sha256", uniqid() . rand() . $foto["tmp_name"]). "." . $extensao;

                move_uploaded_file($foto["tmp_name"], "fotos/$novo_nome");
                $update_foto = "foto = '$novo_nome'";

                $_SESSION["foto_usuario"] = $novo_nome;

                
            }else {
                $_SESSION["tipo"] = "error";
                $_SESSION["title"] = "Ops!";
                $_SESSION["msg"] = "Arquivo de imagem NÃO permitido.";
                header("location: ./");
                exit;
            }
        
        }else{
            $update_foto = "foto=foto";
        }
        try {
            if (empty($senha)) {
                $sql = "
             UPDATE usuarios SET
             nome = :nome,
             email = :email,
             $update_foto
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
            senha = :senha,
            $update_foto
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

            $nome_usuario =  explode(" ",$nome);
            $_SESSION["nome_usuario"] = $nome_usuario[0] ." ". end($nome_usuario);

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
 