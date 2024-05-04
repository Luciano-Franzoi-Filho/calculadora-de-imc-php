<?php

require_once __DIR__ . '/src/Usuario.php';
require_once __DIR__ . '/src/CalculadoraImc.php';
require_once __DIR__ . '/src/SexoEnum.php';
require_once __DIR__ . '/src/ClassificacaoImcEnum.php';
require_once __DIR__ . '/src/ClassificacaoImcSexoEnum.php';


$usuario = new Usuario('Joao', new DateTimeImmutable('2008-01-01'), 600, 1.80, SexoEnum::M);
$calculadoraImc = new CalculadoraImc($usuario);
if ($usuario->getIdadeAtual() >140) {
    print_r("ja virou pó \n\n ");
}if ($usuario->getIdadeAtual()>= 10 && $usuario->getIdadeAtual() <= 19) {
    print_r(ClassificacaoImcSexoEnum::classifica($calculadoraImc->calcular(), $usuario->getSexo(), $usuario->getIdadeAtual()));
}else{
    print_r(ClassificacaoImcEnum::classifica($calculadoraImc->calcular()));
}