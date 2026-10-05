<?php

function analisarNumero($numero){
    if ($numero % 2 == 0){
        $paridade = "Par";
    } else {
        $paridade = "Ímpar";
    }

    $ehPrimo = true;

    if ($numero < 2){
        $ehPrimo = false;
    } else {
        for ($i = 2; $i < $numero; $i++){
            if ($numero % $i == 0){
                $ehPrimo = false;
                break;
            }
        }
    }

    $somaDivisores = 0;

    for ($i = 1; $i < $numero; $i++){
        if ($numero % $i == 0){
            $somaDivisores += $i;
        }
    }

    $ehPerfeito = ($somaDivisores == $numero && $numero > 0);

    return [
        "paridade" => $paridade,
        "primo" => $ehPrimo ? "Sim" : "Não",
        "perfeito" => $ehPerfeito ? "Sim" : "Não"
    ];

}

$numero_usuario = 28;

$resultado = analisarNumero($numero_usuario);

echo "Número analisado: $numero_usuario <br>";
echo "Paridade: " . $resultado["paridade"] . "<br>";
echo "É primo? " . $resultado["primo"] . "<br>";
echo "É perfeito? " . $resultado["perfeito"] . "<br>";

?>