<?php

function calcularImc($peso, $altura){
    return $peso / ($altura * $altura);
}

function validarEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function gerarSenhaAleatoria($tamanho){
    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%&*";
    $senha = "";

    for ($i = 0; $i < $tamanho; $i++){
        $posicao = rand(0, strlen($caracteres) - 1);
        $senha .= $caracteres[$posicao];
    }

    return $senha;
}

function contarVogais($texto){
    $texto = strtolower($texto);
    $vogais = ["a", "e", "i", "o", "u"];
    $total = 0;

    for ($i = 0; $i < strlen($texto); $i++){
        if (in_array($texto[$i], $vogais)){
            $total++;
        }
    }

    return $total;
}

function inverterTexto($texto){
    return strrev($texto);
}

function calcularIdade($dataNascimento){
    $nascimento = new DateTime($dataNascimento);
    $hoje = new DateTime();

    return $hoje->diff($nascimento)->y;
}

function converterMoeda($valorEmReais, $cotacao){
    return $valorEmReais / $cotacao;
}

function formatarTelefone($telefone){
    $numeros = preg_replace("/[^0-9]/", "", $telefone);

    $ddd = substr($numeros, 0, 2);
    $parteInicial = substr($numeros, 2, 5);
    $parteFinal = substr($numeros, 7, 4);

    return "($ddd) $parteInicial-$parteFinal";
}

function gerarSaudacao(){
    $hora = (int) date("H");

    if ($hora < 12){
        return "Bom dia!";
    } elseif ($hora < 18){
        return "Boa tarde!";
    } else {
        return "Boa noite!";
    }
}

function validarSenhaForte($senha){
    $temTamanhoMinimo = strlen($senha) >= 8;
    $temMaiuscula = preg_match("/[A-Z]/", $senha);
    $temMinuscula = preg_match("/[a-z]/", $senha);
    $temNumero = preg_match("/[0-9]/", $senha);
    $temEspecial = preg_match("/[^A-Za-z0-9]/", $senha);

    return $temTamanhoMinimo && $temMaiuscula && $temMinuscula && $temNumero && $temEspecial;
}

?>