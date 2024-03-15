<?php
    $numero = $_POST["numero"] ?? 0;


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
             <div class="col-4">
                 <form method="post">
                     <div class="mb3">
                         <label for="numero" class="form-label"> Insira um numero</label>
                         <input value="<?php echo $numero ?>" type="number" name="numero" id="numero" class="form-control">

                     </div>
                     <div>
                         <button class="btn btn-danger" type="button" onclick="limparForm()">Limpar</button>
                         <button class="btn btn-primary" type="submit">Calular</button>
                     </div>

                 </form>
             </div>
             <div class="col-4"></div>
             <div class="col-4">
                 <?php
                 $contador = 1;
                 $resultado = 0;
                 echo"<h4>Tabuada do $numero<h4>";
                 while ($contador <= 10) {
                    $resultado = $numero * $contador;
                    echo$numero." x ".$contador." = ".$resultado."<br>";
                    $contador++;
                 }
                    
                 ?>
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