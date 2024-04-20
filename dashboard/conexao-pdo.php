<?php

define('username','root');
define('password','');
try {
    $coon = new PDO('mysql:host=localhost;
    dbname=ordem_servico',
    username,
    password
);
} catch(PDOException $e){
    echo "Error: ".$e->getMessage();
    exit;
}  


?>