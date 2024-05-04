<?php

require_once __DIR__ . '/src/Usuario.php';
require_once __DIR__ . '/src/CalculadoraImc.php';
require_once __DIR__ . '/src/SexoEnum.php';
require_once __DIR__ . '/src/ClassificacaoImcEnum.php';
require_once __DIR__ . '/src/ClassificacaoImcSexoEnum.php';


$usuario = new Usuario( nome: $_POST['nome'], 
                        peso: $_POST['peso'], 
                        altura: $_POST['altura'],
                        sexo: SexoEnum::from($_POST['sexo']),
                        dataNascimento: new DateTimeImmutable($_POST['data_nascimento']));


$calculadoraImc = new CalculadoraImc($usuario);
if ($usuario->getIdadeAtual() >140) {
    $resultadoIdade = "já virou pó, ";
}if ($usuario->getIdadeAtual()>= 10 && $usuario->getIdadeAtual() <= 19) {
    $resultado = ClassificacaoImcSexoEnum::classifica($calculadoraImc->calcular(), $usuario->getSexo(), $usuario->getIdadeAtual());
}else{
    $resultado = ClassificacaoImcEnum::classifica($calculadoraImc->calcular());
}

// 1) ler o template de resposta
$template = file_get_contents(__DIR__ . '/src/templates/resultado.html');

// 2) trocar cada valor estatico pelo valor do script
$template = str_replace(
    [
        '{{USUARIO}}',
        '{{PESO}}',
        '{{ALTURA}}',
        '{{IDADE}}',
        '{{SEXO}}',
        '{{ICM}}',
        '{{CLASSIFICACAO}}'
    ],
    [
        $usuario->getNome(),
        $usuario->getPeso(),
        $usuario->getAltura(),
        $usuario->getIdadeAtual(),
        $usuario->getSexo()->value,
        number_format($calculadoraImc->calcular(), 2), // Formata o IMC para duas casas decimais
        $resultado = $resultadoIdade . $resultado
    ],
    $template);


echo $template;