<?php
//xxxxx
// $variaveis = $_GET ;
// // echo $variaveis ['numero1'];
// // verifica o conteudo de um array
// var_dump($variaveis);
$numero1 = $_POST["numero1"] ?? 0;
$numero2 = $_POST["numero2"] ?? 0;
$operador = $_POST["operador"]??"somar";

if ($operador == "somar"){
    $resultado = $numero1 + $numero2;
}
elseif ($operador == "dividir") {
    if($numero2 == 0 ){
        echo"<script>
        alert('impossivel divisão por zero');
        exit() ;
        </script>";
    } else{
        $resultado = $numero1 / $numero2;
    }
}
elseif ($operador == "subtrair") {
    $resultado = $numero1 - $numero2;
}
else{
    $resultado = $numero1 * $numero2;
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Calculadora php</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form method="post" action="">
                    <div class="mb-3">
                        <label class="form-label" for="numero1">numero 1 </label>
                        <input type="number" value="<?php echo intval($numero1) ?>" class="form-control" id="numero1" name="numero1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="operador">operador</label>
                        <select class="form-control" id="operador" name="operador">
                            <option value="somar"  <?php echo $operador=="somar" ? "selected" : "";?>>somar</option>
                            <option value="subtrair" <?php echo $operador=="subtrair" ? "selected" : "";?>>subtrair</option>
                            <option value="multiplicar" <?php echo $operador=="multiplicar" ? "selected":"";?>>multiplicar</option>
                            <option value="dividir" <?php echo $operador=="dividir" ? "selected":"";?>>dividir</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="numero2">numero 2</label>
                        <input type="number" value="<?php echo intval($numero2) ?>" class="form-control" id="numero2" name="numero2">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="resultado">resultado</label>
                        <input type="number" value="<?php echo intval($resultado) ?>" class="form-control" id="resultado" readonly>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-danger" type="button" onclick="LimparForm()">Limpar</button>
                        <button class="btn btn-primary" type="submit">Calcular</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        //funçaõ para limpar o formulário
        function LimparForm(){
            document.getElementById("numero1").value =""
            document.getElementById("numero1").focus()
            document.getElementById("numero2").value =""
            document.getElementById("resultado").value =""
        }
    </script>

</body>

</html>
