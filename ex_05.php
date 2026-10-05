<?php

function analisarTexto($texto) {
    $vogais = "aeiouAEIOUáéíóúÁÉÍÓÚâêîôûÂÊÎÔÛãõÃÕàÀ";
    
    $palavras = preg_split('/\s+/', trim($texto), -1, PREG_SPLIT_NO_EMPTY);
    $quantidadePalavras = count($palavras);
    
    $quantidadeCaracteres = mb_strlen($texto);
    
    $quantidadeVogais = 0;
    $quantidadeConsoantes = 0;
    
    $letras = mb_str_split($texto);
    
    foreach ($letras as $letra) {
        if (ctype_alpha($letra) || mb_strpos($vogais, $letra) !== false && preg_match('/\p{L}/u', $letra)) {
            if (mb_strpos($vogais, $letra) !== false) {
                $quantidadeVogais++;
            } elseif (preg_match('/\p{L}/u', $letra)) {
                $quantidadeConsoantes++;
            }
        }
    }
    
    return [
        "quantidade_palavras" => $quantidadePalavras,
        "quantidade_caracteres" => $quantidadeCaracteres,
        "quantidade_vogais" => $quantidadeVogais,
        "quantidade_consoantes" => $quantidadeConsoantes
    ];
}

$texto = "Python é uma linguagem de programação incrível!";
$resultado = analisarTexto($texto);

print_r($resultado);
   
?>