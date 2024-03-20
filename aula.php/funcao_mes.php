<?php
    $numero = $_POST["numero"] ?? 0;
    function exibir_mes($a){
        switch ($a) {
            case 1:
                echo "Janeiro";
            break;
            case 2:
                echo "Fevereiro";
            break;
            case 3:
                echo "Março";
            break;
            case 4:
                echo "Abril";
            break;
            case 5:
                echo "Maio";
            break;
            case 6:
                echo "Junho";
            break;
            case 7:
                echo "Julho";
            break;
            case 8:
                echo "Agosto";
            break;
            case 9:
                echo "Setembro";
            break;
            case 10:
                echo "Outubro";
            break;
            case 11:
                echo "Novembro";
            break;
            case 12:
                echo "Dezembro";
            break;
            default: 
            echo"Não reconhecido";
            break;
        
        }
        
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
                 <form method="post" id="form" name="">
                    <div class="card">
                        <div class="card-header">
                            Funcões PHP 
                        </div>
                        <div class="card-body">
                            <div class="mb-3"> 
                                <label for="numero" class="form-label">Numero</label>   
                            <input name="numero" class="form-control" value="<?php echo $numero ?>">                            
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
                        echo exibir_mes($numero);
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