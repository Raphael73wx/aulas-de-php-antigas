<?php
   session_start();
   if ($_SESSION["autenticado"] != true) {
    //destruir qualquer sessão existente
    session_destroy();

    header("location: ../tela_login.php");
    exit;
   }
?>