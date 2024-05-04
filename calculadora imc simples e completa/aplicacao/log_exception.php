<?php


require_once __DIR__ . '/src/Usuario.php';
require_once __DIR__ . '/src/CalculadoraImc.php';
require_once __DIR__ . '/src/SexoEnum.php';
require_once __DIR__ . '/src/ClassificacaoImcEnum.php';
require_once __DIR__ . '/src/ExemploException.php';
require_once __DIR__ . '/src/ClassificacaoImcSexoEnum.php';
require_once __DIR__ . '/LogGeral.php';

echo "oi";
LogGeral::log('começou');

try {
    $usuario = new Usuario('Joao', new DateTimeImmutable('2000-01-01'), 750, 3.80, SexoEnum::M);
    LogGeral::log('usuario informado', $usuario);
    print_r($usuario->fazAniversarioHoje(new DateTime('2000-01-01')));
    LogGeral::log(' teste fazaniversariohoje', $usuario->fazAniversarioHoje(new DateTime('2000-01-01')));
} catch (ExemploException $e) {
    // colocar o que fazer se cair na exception 
} catch (DadosIncompletosException $e) {

} catch (PesoExcedidoException $e) {
} catch (AlturaExcedidaException $e) {
} catch (\Throwable $th) {
    // Tratar outras exceções gerais
}

// $usuario = new Usuario('Joao', new DateTimeImmutable('2000-01-01'), 750, 1.80, SexoEnum::M);
// $usuario->fazAniversarioHoje('01-01');

LogGeral::log('terminou');