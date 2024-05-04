<?php

class Usuario
{
    private string $nome;
    private DateTimeInterface $dataNascimento;
    private float $peso;
    private float $altura;
    private SexoEnum $sexo;

    public function __construct(string $nome, 
                                DateTimeInterface $dataNascimento, 
                                float $peso, 
                                float $altura, 
                                SexoEnum $sexo)
    {
        $this->nome = $nome;
        $this->dataNascimento = $dataNascimento;
        $this->peso = $peso;
        $this->altura = $altura;
        $this->sexo = $sexo;
    }   


    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDataNascimento(): DateTimeInterface
    {
        return $this->dataNascimento;
    }

    public function getPeso(): float
    {
        return $this->peso;
    }

    public function getAltura(): float
    {
        return $this->altura;
    }

    public function getSexo(): SexoEnum
    {
        return $this->sexo;
    }


    public function getIdadeAtual()
    {
        return $this->dataNascimento->diff(new DateTimeImmutable(date('Y-m-d')))->y;
    }

    // public function fazAniversarioHoje(string | DateTime $dataAtual) : bool
    // {
    //     try {
    //         if ($dataAtual->diff(new DateTimeImmutable(date('Y-m-d')))) {
    //             return true;
    //         }
    //         return false;
    //     } catch (ExemploException $e) {
    //         print_r(['dentro da classe usuario linha 64' => $e]);
    //     } catch (Exception $e) {
    //         print_r(['dentro da classe usuario linha 66' => $e]);
    //     } finally {

    //     }      
    // }

    /**
     * throw ExemploException
     */

    public function fazAniversarioHoje(string | DateTime $dataAtual) : bool
    {
        if ($dataAtual->diff(new DateTimeImmutable(date('Y-m-d')))) {
            return true;
        }
        throw new ExemploException('Deu ruim no metodo', 2);
    }

    public function dadosCompletos(
        string $nome,
        DateTimeInterface $dataNascimento,
        float $peso,
        float $altura,
        SexoEnum $sexo
    ) {
        if (empty($nome) || empty($dataNascimento) || empty($peso) || empty($altura) || empty($sexo)) {
            throw new DadosIncompletosException('Todos os valores devem ser informados.', 10);
        }
    }

    public function verificarPeso(float $peso)
    {
        if ($peso > 650) {
            throw new PesoExcedidoException('O peso não pode exceder 650 kg.', 11 );
        }
    }

    public function verificarAltura(float $altura)
    {
        if ($altura > 2.5) {
            throw new AlturaExcedidaException('A altura não pode exceder 2.5 metros.', 12);
        }
    }
}
