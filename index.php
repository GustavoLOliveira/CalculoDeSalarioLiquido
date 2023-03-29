<?php
error_reporting(0);
$salarioBruto = $_GET['salarioBruto'];
$dependentes =  $_GET['dependentes'] ;

$salario1 = 1302.00;
$salario2 = 2571.29;
$salario3 = 3856.94;
$salario4 = 7507.49;

$cota1 = 0.075;
$cota2 = 0.09;
$cota3 = 0.12;
$cota4 = 0.14;
$cota5 = 877.24;

function calcularINSS($salarioBruto) {
    global $descontoINSS, $valorBaseIR1, $salario1, $salario2, $salario3, $salario4, $cota1, $cota2, $cota3, $cota4, $cota5;

    if ($salarioBruto <= $salario1) {
        $descontoINSS = $salarioBruto * $cota1;
    } else if ($salarioBruto <= $salario2) {
        $descontoINSS = ($salario1 * $cota1) + (($salarioBruto - $salario1) * $cota2);
    } else if ($salarioBruto <= $salario3) {
        $descontoINSS = ($salario1 * $cota1) + (($salario2 - $salario1) * $cota2) + (($salarioBruto - $salario2) * $cota3);
    } else if ($salarioBruto <= $salario4) {
        $descontoINSS = ($salario1 * $cota1) + (($salario2 - $salario1) * $cota2) + (($salario3 - $salario2) * $cota3 ) + (($salarioBruto - $salario3) * $cota4);
    } else {
        $descontoINSS = $cota5;
    }
    $valorBaseIR1 = $salarioBruto - $descontoINSS;
    return;
}

function calculaIRRF($valorBaseIR1, $dependentes) {
    global $descontoIRRF, $valorBaseIR1, $valorBaseIR2,$salarioFinal, $descontoINSS;
    $valorBaseIR2 = $valorBaseIR1 - ($dependentes * 189.59);
    switch (true) {
        case ($valorBaseIR2 <= 1903.98): 
            $descontoIRRF = $valorBaseIR2;
            
            break;
        case ($valorBaseIR2 >= 1903.99 && $valorBaseIR2 <= 2826.65):
            $descontoIRRF = ($valorBaseIR2 * 0.075) - 142.80;
            
            break;
        case ($valorBaseIR2 >= 2826.66 && $valorBaseIR2 <= 3751.05):
            $descontoIRRF = ($valorBaseIR2 * 0.15) - 354.80;
            
            break;
        case ($valorBaseIR2 >= 3751.06 && $valorBaseIR2 <= 4664.68):
            $descontoIRRF = ($valorBaseIR2 * 0.225) - 636.13;
            
            break;
        case ($valorBaseIR2 >= 4664.68):
            $descontoIRRF = ($valorBaseIR2 * 0.275) - 869.36;
            
            break;
        default:
            echo "erro";
            break;
    }
    $salarioFinal = $valorBaseIR1 - $descontoIRRF;
    echo "Desconto INSS: R$" . number_format($descontoINSS, 2, '.', '') . "<br>";
    echo "Desconto IRRF: R$" . number_format($descontoIRRF, 2, '.', '') . "<br>";
    echo "Salario final: R$" . number_format($salarioFinal, 2, '.', '') . "<br>";
}

calcularINSS($salarioBruto);
calculaIRRF($valorBaseIR1, $dependentes);



?>