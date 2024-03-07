<?php
echo "<h1>Olá Mundo!<h1>";   

$nome2 = "raphael";
echo "<h3>Seja bem-vindo $nome2<h3><br>";
$escola = 'Senac Taubaté';
echo 'Voce esta matriculado no'.$escola.'<br>';
$turno = 'noite';
echo'Voce está matriculado no '.$escola.', no turno da  '.$turno.'<br>';
for ($nome = 0; $nome < 10 ; $nome++) { 
    echo"$nome ,";
}
echo"<br>";
$xta = true;
$ctz = 0;
$num = 0;

while ($ctz <10) {
    echo("$num , ");
    $ctz++;
    $num++;
}




?>
