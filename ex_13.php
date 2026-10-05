<?php

function criptografarMensagem($texto, $deslocamento){
    return cifraDeCesar($texto, $deslocamento);
}

function descriptografarMensagem($textoCriptografado, $deslocamento){

    return cifraDeCesar($textoCriptografado, -$deslocamento);

}

function cifraDeCesar($texto, $deslocamento){

    $resultado = "";

    for ($i = 0; $i < strlen($texto); $i++){

        $caractere = $texto[$i];

        if (ctype_upper($caractere)){
            $posicao = (ord($caractere) - ord('A') + $deslocamento) % 26;
            $posicao = ($posicao + 26) % 26;
            $resultado .= chr($posicao + ord('A'));

        } elseif (ctype_lower($caractere)){
            $posicao = (ord($caractere) - ord('a') + $deslocamento) % 26;
            $posicao = ($posicao + 26) % 26;
            $resultado .= chr($posicao + ord('a'));

        } else {
            $resultado .= $caractere;
        }

    }

    return $resultado;

}

$mensagem_usuario = "Mensagem Secreta";
$deslocamento_usuario = 3;

echo "Mensagem original: $mensagem_usuario <br>";

$mensagemCriptografada = criptografarMensagem($mensagem_usuario, $deslocamento_usuario);
echo "Mensagem criptografada: $mensagemCriptografada <br>";

$mensagemOriginal = descriptografarMensagem($mensagemCriptografada, $deslocamento_usuario);
echo "Mensagem descriptografada: $mensagemOriginal <br>";

?>