<?php

function ordenarNomes($nomesTexto){
    $vetorNomes = explode(",", $nomesTexto);
    $vetorNomes = array_map("trim", $vetorNomes);
    sort($vetorNomes);
    return $vetorNomes;
}

$nomes_usuario = "Carlos,  ana ,  Bruno,fernanda ,Daniela";
echo "Lista original: $nomes_usuario <br>";

$listaOrganizada = ordenarNomes($nomes_usuario);
echo "Lista organizada: <br>";

foreach ($listaOrganizada as $nome){
    echo "- $nome <br>";
}

?>