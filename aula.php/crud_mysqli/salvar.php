<?php

include("../verificar_autenticidade.php");

//verifica se esta vindo dados vai post
if ($_POST) {
    //pegar informações vindas do formulario
    $pk_cliente = trim($_POST['pk_cliente']);
    $nome = trim($_POST['nome']);
    $cpf = trim($_POST['cpf']);
    $whatsapp = trim($_POST['whatsapp']);
    $email = trim($_POST['email']);

    //validar dados obrigatórios
    if (empty($nome) || empty($cpf) || empty($email) || strlen($cpf) != 14) {
        echo "
        <script>
        alert('Falha na validação do formulario!');
        window.location='./';
        </script>
        ";
        exit;
    }
    //arquivo de conexão ao banco de dados
    include('../conexao_mysqli.php');

    //Montar a sintaxe sql que o PHP vai enviar ao Mysql
    if ($pk_cliente >0) {
        $sql ="
        UPDATE clientes SET
        nome = '$nome',
        cpf ='$cpf',
        whatsapp ='$whatsapp',
        email ='$email'
        WHERE pk_cliente ='$pk_cliente'
        ";
    }else {
        $sql = "
        INSERT INTO clientes  (nome,cpf,whatsapp,email)
        VALUES('$nome','$cpf','$whatsapp','$email') 
        ";
    }
    try {
     //enviar a sintaxe sql ao mysql
    $query = mysqli_query($conn,$sql);
        
    }catch(Exception $e) {
        if (mysqli_errno($conn) == 1062) {
            $msg = "Os campos ja preechidos ja foram cadastrados.";
        }
    echo"
    <script>
    alert('$msg');
    window.location='./';
    </script>
    ";
    exit;
}  // verifica se cadastrou corretamente
if ($query) {
  $msg = "Registro salvo com sucesso!";
}
else {
  $msg = "Error:". mysqli_error($conn);
}
}else {
    //redireciona o usuario para a pagina principal do diretório
    header("location: ./");
    exit;
}
