<?php
session_start();
if ($_SESSION["autenticado"] != true) {
   //destruir qualquer sessão existente
   session_destroy();

   header("location: ../tela_login.php");
   exit;
} else {
   $tempo_limite = 300; //segundos
   $tempo_atual = time();

   //verificar tempo inativo do usuario
   if ($tempo_atual - $_SESSION["tempo_login"] > $tempo_limite) {
      //destruir qualquer sessão existente
      session_destroy();

      echo "
       <script>
         alert('Tempo de sessão esgotado!');
         window.location='../tela_login.php';
       </script>
       ";

      header("location: ../tela_login.php");
      exit;
   } else {
      $_SESSION["tempo_login"] = time();
   }
}
