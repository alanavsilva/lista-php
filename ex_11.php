<?php

function formatarTexto($texto){

    $maiusculo = strtoupper($texto);
    $minusculo = strtolower($texto);
    $primeiraLetraMaiuscula = ucwords(strtolower($texto));
    $quantidadeCaracteres = strlen($texto);

    return [
        "maiusculo" => $maiusculo,
        "minusculo" => $minusculo,
        "capitalizado" => $primeiraLetraMaiuscula,
        "quantidade_caracteres" => $quantidadeCaracteres
    ];

}

$texto_usuario = "relatório de vendas do mês";

$resultado = formatarTexto($texto_usuario);

echo "Texto original: $texto_usuario <br>";
echo "Maiúsculo: " . $resultado["maiusculo"] . "<br>";
echo "Minúsculo: " . $resultado["minusculo"] . "<br>";
echo "Capitalizado: " . $resultado["capitalizado"] . "<br>";
echo "Quantidade de caracteres: " . $resultado["quantidade_caracteres"] . "<br>";

?>