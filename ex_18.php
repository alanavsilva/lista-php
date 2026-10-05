<?php

function ordenarConsultas($consultas) {
    usort($consultas, function ($a, $b) {
        return strcmp($a["horario"], $b["horario"]);
    });

    return $consultas;
}

function contarPacientesDiferentes($consultas) {
    $pacientes = [];

    foreach ($consultas as $consulta) {
        $pacientes[] = strtolower($consulta["paciente"]);
    }

    return count(array_unique($pacientes));
}

function contarEspecialidades($consultas) {
    $quantidades = [];

    foreach ($consultas as $consulta) {
        $especialidade = $consulta["especialidade"];

        if (!isset($quantidades[$especialidade])) {
            $quantidades[$especialidade] = 0;
        }

        $quantidades[$especialidade]++;
    }

    return $quantidades;
}

function pesquisarPaciente($consultas, $nome) {
    $encontradas = [];

    foreach ($consultas as $consulta) {
        if (strtolower($consulta["paciente"]) === strtolower($nome)) {
            $encontradas[] = $consulta;
        }
    }

    return $encontradas;
}

function encontrarHorariosDuplicados($consultas) {
    $horarios = [];
    $duplicados = [];

    foreach ($consultas as $consulta) {
        $horario = $consulta["horario"];

        if (isset($horarios[$horario])) {
            $duplicados[] = $horario;
        } else {
            $horarios[$horario] = true;
        }
    }

    return array_unique($duplicados);
}

function organizarAgenda($consultas, $pacientePesquisado) {
    $consultasOrdenadas = ordenarConsultas($consultas);
    $quantidade = count($consultasOrdenadas);

    return [
        "total_consultas" => $quantidade,
        "pacientes_diferentes" => contarPacientesDiferentes($consultas),
        "por_especialidade" => contarEspecialidades($consultas),
        "primeiro_atendimento" => $quantidade > 0 ? $consultasOrdenadas[0] : null,
        "ultimo_atendimento" => $quantidade > 0 ? $consultasOrdenadas[$quantidade - 1] : null,
        "consultas_ordenadas" => $consultasOrdenadas,
        "pesquisa_paciente" => pesquisarPaciente($consultas, $pacientePesquisado),
        "horarios_duplicados" => encontrarHorariosDuplicados($consultas)
    ];
}

$consultas = [
    [
        "paciente" => "Ana Souza",
        "especialidade" => "Dermatologia",
        "data" => "2026-10-06",
        "horario" => "09:00"
    ],
    [
        "paciente" => "João Lima",
        "especialidade" => "Cardiologia",
        "data" => "2026-10-06",
        "horario" => "10:30"
    ],
    [
        "paciente" => "Ana Souza",
        "especialidade" => "Cardiologia",
        "data" => "2026-10-06",
        "horario" => "10:30"
    ]
];

$resultado = organizarAgenda($consultas, "Ana Souza");

print_r($resultado);
?>