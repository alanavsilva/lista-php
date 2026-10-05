<?php 

function gerarSenha($senha){

$bytes = random_bytes(8);
$senha = bin2hex($bytes);

echo $senha;
}

?>