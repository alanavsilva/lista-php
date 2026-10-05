<?php 

function converterTemperatura($temperatura){

$valor = 0;
$celsius = $valor;
$fahrenheit = ($celsius*1,8+32);
$kelvin = ($celsius+273,15);

echo "Valor em Celsius: $celsius <br>";
echo "Valor em Fahrenheit: $fahrenheit <br>";
echo "Valor em Kelvin : $kelvin <br>";


}

?>