<?php

/*

PERCENTIL DO IMC	                DIAGNÓSTICO NUTRICIONAL
< Percentil 5	                    Baixo Peso
>=Percentil 5 e < Percentil 85	    Adequado ou Eutrófico
>= Percentil 85	                    Sobrepeso

Idade	Percentil por idade Adolescentes                                ***Femininos***
 	    5	    15	    50	    85	    95
10	    14,23	15,09	17,00	20,19	23,20
11	    14,60	15,53	17,67	21,18	24,59
12	    14,98	15,98	18,35	22,17	25,95
13	    15,36	16,43	18,95	23,08	27,07
14	    15,67	16,79	19,32	23,88	27,97
15	    16,01	17,16	19,69	24,29	28,51
16	    16,37	17,54	20,09	24,74	29,10
17	    16,59	17,81	20,36	25,23	29,72
18	    16,71	17,99	20,57	25,56	30,22
19	    16,87	18,20	20,80	25,85	30,72

Idade	Percentil por idade Adolescentes                                ***Masculinos***
 	    5	    15	    50  	85  	95
10	    14,42	15,15	16,72	19,60	22,60
11	    14,83	15,59	17,28	20,35	23,70
12	    15,24	16,06	17,87	21,12	24,89
13	    15,73	16,62	18,53	21,93	25,93
14	    16,18	17,20	19,22	22,77	26,93
15	    16,59	17,76	19,92	23,63	27,76
16	    17,01	18,32	20,63	24,45	28,53
17	    17,31	18,68	21,12	25,28	29,32
18	    17,54	18,89	21,45	25,95	30,02
19	    17,80	19,20	21,86	26,36	30,66

*/

enum ClassificacaoImcSexoEnum: string
{
    case BaixoPeso                  = 'Baixo Peso';
    case AdequadoOuEutrofico        = 'Adequado ou Eutrófico';
    case Sobrepeso                  = 'Sobrepeso';


    public static function classifica(float $imc, SexoEnum $sexo, int $idade): string
{
    // Percentis de IMC para adolescentes do sexo feminino e masculino
    $percentisFemininos = [
        10 => [14.23, 15.09, 17.00, 20.19, 23.20],
        11 => [14.60, 15.53, 17.67, 21.18, 24.59],
        12 => [14.98, 15.98, 18.35, 22.17, 25.95],
        13 => [15.36, 16.43, 18.95, 23.08, 27.07],
        14 => [15.67, 16.79, 19.32, 23.88, 27.97],
        15 => [16.01, 17.16, 19.69, 24.29, 28.51],
        16 => [16.37, 17.54, 20.09, 24.74, 29.10],
        17 => [16.59, 17.81, 20.36, 25.23, 29.72],
        18 => [16.71, 17.99, 20.57, 25.56, 30.22],
        19 => [16.87, 18.20, 20.80, 25.85, 30.72]
    ];

    $percentisMasculinos = [
        10 => [14.42, 15.15, 16.72, 19.60, 22.60],
        11 => [14.83, 15.59, 17.28, 20.35, 23.70],
        12 => [15.24, 16.06, 17.87, 21.12, 24.89],
        13 => [15.73, 16.62, 18.53, 21.93, 25.93],
        14 => [16.18, 17.20, 19.22, 22.77, 26.93],
        15 => [16.59, 17.76, 19.92, 23.63, 27.76],
        16 => [17.01, 18.32, 20.63, 24.45, 28.53],
        17 => [17.31, 18.68, 21.12, 25.28, 29.32],
        18 => [17.54, 18.89, 21.45, 25.95, 30.02],
        19 => [17.80, 19.20, 21.86, 26.36, 30.66]
    ];

    if ($sexo ==='M'){
        $percentis = $percentisMasculinos[$idade];
    }else{
        $percentis = $percentisFemininos[$idade];
    }
    // Comparar o IMC com os percentis para determinar o diagnóstico nutricional
    if ($imc < $percentis[0]) {
        return 'Baixo Peso';
    } elseif ($imc >= $percentis[0] && $imc < $percentis[3]) {
        return 'Adequado ou Eutrófico';
    } else {
        return 'Sobrepeso';
    }
}


    // public static function classifica(float $imc): string
    // {

    //     if ($usuario->getSexo == 'M') {
    //         if ($usuario->idade == 10) {
                
    //             if ($imc < 14.42) {
    //                 return 'Baixo Peso';
    //             }
        
    //             if ($imc >= 15.15 && $imc < 19.60) {
    //                 return 'Adequado ou Eutrófico';
    //             }
        
    //             if ($imc < 22.60) {
    //                 return  'Sobrepeso';
    //             }

    //         }

    //         if ($usuario->idade == 11) {
 
    //         }

    //         if ($usuario->idade == 12) {
 
    //         }

    //         if ($usuario->idade == 13) {

    //         }

    //         if ($usuario->idade == 14) {

    //         }

    //         if ($usuario->idade == 15) {

    //         }

    //         if ($usuario->idade == 16) {

    //         }

    //         if ($usuario->idade == 17) {

    //         }

    //         if ($usuario->idade == 18) {

    //         }

    //         if ($usuario->idade == 19) {
 
    //         }
    //     } else {

    //         if ($usuario->idade == 10) {

    //         }

    //         if ($usuario->idade == 11) {
 
    //         }

    //         if ($usuario->idade == 12) {
 
    //         }

    //         if ($usuario->idade == 13) {

    //         }

    //         if ($usuario->idade == 14) {

    //         }

    //         if ($usuario->idade == 15) {

    //         }

    //         if ($usuario->idade == 16) {

    //         }

    //         if ($usuario->idade == 17) {

    //         }

    //         if ($usuario->idade == 18) {

    //         }

    //         if ($usuario->idade == 19) {
 
    //         }

    //     }
        
    // }
}
