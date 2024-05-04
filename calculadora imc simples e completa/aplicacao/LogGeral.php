<?php

class LogGeral
{
    public static function log($mensagem, $variavel = null)
    {
        $logFile = __DIR__ . '/LogGeral.txt';
        $hora = date('Y-m-d H:i:s');
        
        if ($variavel !== null) {
            $mensagem .= ' | Variável: ' . print_r($variavel, true);
        }
        
        $mensagemFormatada = "[$hora] $mensagem" . PHP_EOL;
        file_put_contents($logFile, $mensagemFormatada, FILE_APPEND);
    }
}