<?php
function estatisticasNumericas($numeros) {
    sort($numeros);
    $quantidade = count($numeros);

    $soma = array_sum($numeros);
    $media = $soma / $quantidade;

    $meio = intdiv($quantidade, 2);

    if ($quantidade % 2 == 0) {
        $mediana = ($numeros[$meio - 1] + $numeros[$meio]) / 2;
    } else {
        $mediana = $numeros[$meio];
    }

    $pares = 0;
    $impares = 0;

    foreach ($numeros as $numero) {
        if ($numero % 2 == 0) {
            $pares++;
        } else {
            $impares++;
        }
    }

    return [
        "soma" => $soma,
        "media" => $media,
        "maior" => max($numeros),
        "menor" => min($numeros),
        "mediana" => $mediana,
        "pares" => $pares,
        "impares" => $impares
    ];
}

$valores = [7, 2, 9, 4, 2];
$resultado = estatisticasNumericas($valores);

print_r($resultado);
?>