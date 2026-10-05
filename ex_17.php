<?php
function limparEspacos($texto) {
    return trim(preg_replace('/\s+/', ' ', $texto));
}

function separarPalavras($texto) {
    $texto = strtolower(limparEspacos($texto));
    return explode(' ', $texto);
}

function contarCaracteres($texto) {
    return strlen($texto);
}

function contarPalavras($palavras) {
    return count($palavras);
}

function contarFrases($texto) {
    $frases = preg_split('/[.!?]+/', trim($texto), -1, PREG_SPLIT_NO_EMPTY);
    return count($frases);
}

function encontrarMaiorEMenor($palavras) {
    $maior = $palavras[0];
    $menor = $palavras[0];

    foreach ($palavras as $palavra) {
        if (strlen($palavra) > strlen($maior)) {
            $maior = $palavra;
        }

        if (strlen($palavra) < strlen($menor)) {
            $menor = $palavra;
        }
    }

    return [$maior, $menor];
}

function contarRepetidas($palavras) {
    $contagem = array_count_values($palavras);
    $repetidas = 0;

    foreach ($contagem as $quantidade) {
        if ($quantidade > 1) {
            $repetidas += $quantidade - 1;
        }
    }

    return $repetidas;
}

function palavrasMaisFrequentes($palavras) {
    $contagem = array_count_values($palavras);
    arsort($contagem);
    return array_slice($contagem, 0, 5, true);
}

function processarTexto($texto) {
    $textoLimpo = limparEspacos($texto);
    $palavras = separarPalavras($textoLimpo);
    [$maior, $menor] = encontrarMaiorEMenor($palavras);

    return [
        "caracteres" => strlen($texto),
        "palavras" => contarPalavras($palavras),
        "frases" => contarFrases($texto),
        "palavra_mais_longa" => $maior,
        "palavra_mais_curta" => $menor,
        "palavras_repetidas" => contarRepetidas($palavras),
        "cinco_mais_frequentes" => palavrasMaisFrequentes($palavras),
        "texto_sem_espacos_duplicados" => $textoLimpo,
        "texto_formatado" => ucwords(strtolower($textoLimpo))
    ];
}

$texto = "php é simples. php também é útil!";
$resultado = processarTexto($texto);

print_r($resultado);
?>