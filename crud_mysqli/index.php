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
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Lista de ordem serviço
                        <button class="btn btn-primary btn-sm float-end">
                         <i class="bi bi-plus-circle"></i> Novo</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-dark text-center">
                            <thead>
                                <tr class="table-warning">
                                    <th>ID</th>
                                    <th>Clientes</th>
                                    <th>Servicos</th>
                                    <th>R$ Valor</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Gluaco Luiz</td>
                                    <td>
                                        Manutencão de micro <br>
                                        Configuração de roteador
                                    </td>
                                    <td>R$ 500,00</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-gear-wide"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="bi bi-trash3-fill"></i> apagar</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-fill"></i> editar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Raphael Willian</td>
                                    <td>
                                        Instalação de software
                                    </td>
                                    <td>R$ 150,00</td>
                                    <td>
                                    <div class="dropdown">
                                            <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-gear-wide"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="bi bi-trash3-fill"></i> apagar</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-fill"></i> editar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
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