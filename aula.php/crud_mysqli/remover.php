<?php
include("../verificar_autenticidade.php");

if (isset($_GET['ref'])) {
    $pk_cliente = base64_decode(trim($_GET['ref']));

    include('../conexao_mysqli.php');

    $sql = "
    DELETE FROM clientes
    WHERE pk_cliente = '$pk_cliente'
    ";
    
    try {
        //enviar a sintaxe sql ao mysql
       $query = mysqli_query($conn,$sql);
           
       }catch(Exception $e) {
           if (mysqli_errno($conn) == 1451) {
               $msg = "Error: Existem Ordem de servico atribuídas a este cliente!";
           }
       echo"
       <script>
       alert('$msg');
       window.location='./';
       </script>
       ";
       exit;
    }
    //verifica se cadastrou corretamente
    if ($query) {
        $msg = "Registro removido com sucesso!";
    } else {
        $msg = "Error:" . mysqli_error($conn);
    }
    echo "
    <script>
    alert('$msg');
    window.location='./';
    </script>
    ";
    exit;
}
header("location: ./");
exit;

