<?php

//destruir qualquer sessaõ existente
session_start();
session_destroy();

header("location: tela_login.php")



?>