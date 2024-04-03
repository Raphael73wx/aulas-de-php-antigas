<!-- 
// xxxx
// $variaveis = $_GET ;
// // echo $variaveis ['numero1'];
// // verifica o conteudo de um array
// var_dump($variaveis);
// $numero1 = $_POST["numero1"] ?? 0;
// $numero2 = $_POST["numero2"] ?? 0;
// $operador = $_POST["operador"]??"somar";

// if ($operador == "somar"){
//     $resultado = $numero1 + $numero2;
// }
// elseif ($operador == "dividir") {
//     if($numero2 == 0 ){
//         echo"<script>
//         alert('impossivel divisão por zero');
//         exit() ;
//         </script>";
//     } else{
//         $resultado = $numero1 / $numero2;
//     }
// }
// elseif ($operador == "subtrair") {
//     $resultado = $numero1 - $numero2;
// }
// else{
//     $resultado = $numero1 * $numero2;
// } -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body,
        .container,
        .row{
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-content-center">
            <div class="col-4">
                <form action="validar_login.php" method="post">
                    <div class="card">
                        <div class="card-header">
                            Tela Login
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="email" class="form-label">email</label>
                                <input required type="email" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">senha</label>
                                <input required  type="password" class="form-control" name="senha">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Entar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>