<?php
    $limite = $_POST["limite"] ?? 0;


    ?>

 <!DOCTYPE html>
 <html lang="PT-BR">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <title>contadora</title>
 </head>

 <body>
     <div class="container">
         <div class="row">
             <div class="col-4">
                 <form method="post">
                     <div class="mb3">
                         <label for="limite" class="form-label"> Insira o número máximo: </label>
                         <input value="<?php echo $limite ?>" type="number" name="limite" id="limite" class="form-control">

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
                    for ($i = 0; $i <= $limite; $i++) {
                        echo $i . "<br>";
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