<?php 

function analisarSenha($senha)
{
    $forca = 0;

    if (strlen($senha) < 6) {
        echo "Senha muito curta!";
        return;
    }

    if (preg_match('/[a-z]/', $senha)) {
        $forca += 1;
    }
    if (preg_match('/[A-Z]/', $senha)) {
        $forca += 1;
    }
    if (preg_match('/[0-9]/', $senha)) {
        $forca += 1;
    }
    if (preg_match('/[\W]/', $senha)) {
        $forca += 1;
    }

    switch ($forca) {
        case 1:
            echo "Senha fraca!";
            break;
        case 2:
            echo "Senha média!";
            break;
        case 3:
            echo "Senha forte!";
            break;
        case 4:
            echo "Senha muito forte!";
            break;
        default:
            echo "Senha inválida!";
            break;
    }
}