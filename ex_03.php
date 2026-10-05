<?php

function mascararCpf(string $cpf): string {
    $numeros = preg_replace('/\D/', '', $cpf);
    
    if (strlen($numeros) !== 11) {
        return "CPF inválido";
    }
    
    return '***.***.***-' . substr($numeros, -4);
}