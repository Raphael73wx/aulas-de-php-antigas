<?php
    $numero = $_POST["numero"] ?? 0;
    $expoente = $_POST["expoente"] ?? 0;
    function expoente($a,$b){
        return $a ** $b;
    }

?>

 <!DOCTYPE html>
 <html lang="PT-BR">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <title>while</title>
 </head>

 <body>
     <div class="container">
         <div class="row">
             <div class="col">
                 <form method="post">
                    <div class="card">
                        <div class="card-header">
                            Funcões PHP 
                        </div>
                        <div class="card-body">
                            <div class="mb-3"> 
                                <label for="numero" class="form-label">Numero</label>   
                            <input name="numero" class="form-control" value="<?php echo $numero ?>">                            
                            </div>
                            <div class="mb-3">
                            <label for="expoente" class="form-label">expoente</label>                          
                            <input name="expoente" class="form-control" value="<?php echo $expoente ?>">
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Contar</button>
                        </div>
                    </div>
                 </form>
             </div>
             <div class="col">
                <div class="card">
                    <div class="card-header">
                        Resultado
                    </div>
                    <div class="card-body">
                        <p>
                        <?php
                        echo expoente($numero,$expoente);
                        ?>
                        </p>
                    </div>
                </div>
             </div>
         </div>
     </div>

     <script>
         // Função para limpar o formulário
         function limparForm() {
             document.getElementById("numero1").value = ""
             document.getElementById("numero1").focus()
             document.getElementById("numero2").value = ""
             document.getElementById("resultado").value = ""
         }
     </script>


 </body>

 </html>