<?php

$host ="localhost";//caminho do banco (ip ou DNS)
$user="root";// Usuario
$pass ="";// senha
$dbname ="ordem_servico";//nome do banco

define('host','localhost');
define('user','root');
define('pass','');
define('dbname','ordem_servico');

$conn = mysqli_connect(host,user,pass,dbname); //Variavel que vai conectar no banco
if ($conn) {
// echo "banco de dados conectado com sucesso";
}else{
    echo"falha ao conectar ao Banco de dados.";
    exit;
}
?>