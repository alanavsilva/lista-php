<?php

function inverterTexto($texto){
     $textoInvertido = strrev($texto);
     $quantidadeCaracteres = strlen ($texto);

     return textoInvertido;
     return quantidadeCaracteres;

}

$texto = "teste 123";

echo "o texto original: $texto<br> ";

echo "texto invertido:" . inverterTexto($texto);
echo "quantidade caracteres: $quantidadeCaracteres";

?>