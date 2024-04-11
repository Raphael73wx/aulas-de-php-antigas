<?php
include("../verificar_autenticidade.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud mysqli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <header class="p-3 mb-3 border-bottom bg-light">
               <div class="container">
                <div class="row">
                    <div class="col-1">
                        <i class="bi bi-bootstrap fs-2"></i> 
                    </div>
                    <div class="col text-end">
                        <a href="../logout.php" class="btn btn-dark">
                            Sair
                            <i class="bi bi-box-arrow-right"></i>
                        </a>
                    </div>
                </div>
               </div>   
 
    </header>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Lista de Clientes
                        <a href="form.php" class="btn btn-primary btn-sm float-end">
                            <i class="bi bi-plus-circle"></i> Novo</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-dark text-center">
                            <thead>
                                <tr class="table-warning">
                                    <th class="text-center">ID</th>
                                    <th>Cliente</th>
                                    <th class="text-center">cpf</th>
                                    <th class="text-center">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../conexao_mysqli.php');
                                $sql = "
                                SELECT pk_cliente,nome,cpf
                                FROM clientes
                                ORDER BY pk_cliente
                                ";

                                $query = mysqli_query($conn, $sql);

                                //verificar se encontrou registros no mysql
                                if (mysqli_num_rows($query) > 0) {
                                    //laço de repetição para listar item a item
                                    while ($row = mysqli_fetch_object($query)) {
                                        echo '
                                        <tr>
                                        <td class="text-center">' . $row->pk_cliente . '</td>
                                        <td>' . $row->nome . '</td>
                                        <td class="text-center">' . $row->cpf . '</td>
                                        <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                               <i class="bi bi-gear-wide"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" onclick="if(confirm(\'Deseja realmente remover este registro\')){ window.location=\'remover.php?ref=' . base64_encode($row->pk_cliente) . '\'}"  href="#       "><i class="bi bi-trash3-fill"></i> apagar</a></li>
                                                <li><a class="dropdown-item" href="form.php?ref=' . base64_encode($row->pk_cliente) . '"><i class="bi bi-pencil-fill"></i> editar</a></li>
                                            </ul>
                                        </div>
                                        </td>
                                        </tr>
                                        
                                        ';
                                    }
                                }


                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>