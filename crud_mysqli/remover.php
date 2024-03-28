<?php

if (isset($_GET['ref'])) {
    $pk_cliente = base64_decode(trim($_GET['ref']));

    include('../aula.php/conexao_mysqli.php');

    $sql = "
    DELETE FROM clientes
    WHERE pk_cliente = '$pk_cliente'
    ";
    
    $query = mysqli_query($conn, $sql);

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
