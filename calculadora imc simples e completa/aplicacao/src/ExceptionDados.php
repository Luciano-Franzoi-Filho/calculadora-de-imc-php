<?php

// errorcode 10 dados inconpletos
// errorcode 11 peso excedido 650 kg
// errorcode 12 altura excedida 2.5 mt

class DadosIncompletosException extends Exception {

    public function __construct(string $message, int $codeError)
    {
        parent::__construct($message, $codeError);
        $this->gerarLog();
    }
    private function gerarLog() 
    {
        $str =  'Message: ' . $this->getMessage();
        $str .= PHP_EOL . 'File: ' . $this->getFile();
        $str .= PHP_EOL . 'Line:' . $this->getLine();
        $str .= PHP_EOL . 'ErrorCode: ' . $this->getCode();
        $str .= PHP_EOL . 'Stack Strace: ' . $this->getTraceAsString();

        file_put_contents(__DIR__ . '../log_error.txt', 
        $str . PHP_EOL, FILE_APPEND);
    }
}
class PesoExcedidoException extends Exception {

    public function __construct(string $message, int $codeError)
    {
        parent::__construct($message, $codeError);
        $this->gerarLog();
    }
    private function gerarLog() 
    {
        $str =  'Message: ' . $this->getMessage();
        $str .= PHP_EOL . 'File: ' . $this->getFile();
        $str .= PHP_EOL . 'Line:' . $this->getLine();
        $str .= PHP_EOL . 'ErrorCode: ' . $this->getCode();
        $str .= PHP_EOL . 'Stack Strace: ' . $this->getTraceAsString();

        file_put_contents(__DIR__ . '../log_error.txt', 
        $str . PHP_EOL, FILE_APPEND);
    }
}
class AlturaExcedidaException extends Exception {

    public function __construct(string $message, int $codeError)
    {
        parent::__construct($message, $codeError);
        $this->gerarLog();
    }
    private function gerarLog() 
    {
        $str =  'Message: ' . $this->getMessage();
        $str .= PHP_EOL . 'File: ' . $this->getFile();
        $str .= PHP_EOL . 'Line:' . $this->getLine();
        $str .= PHP_EOL . 'ErrorCode: ' . $this->getCode();
        $str .= PHP_EOL . 'Stack Strace: ' . $this->getTraceAsString();

        file_put_contents(__DIR__ . '../log_error.txt', 
        $str . PHP_EOL, FILE_APPEND);
    }
}
