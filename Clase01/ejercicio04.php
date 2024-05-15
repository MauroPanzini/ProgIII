<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 4 (Calculadora)
Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla.
*/

$operador = "-";
$op1 = 6;
$op2 = 10;

if ($operador == "*") {
    $resultado = $op1 * $op2;
} else if ($operador == "/") {
    if ($op2 > 0) {
        $resultado = $op1 / $op2;
    } else {
        $resultado = null;
    }
} else if ($operador == "+") {
    $resultado = $op1 + $op2;
} else if ($operador == "-") {
    $resultado = $op1 - $op2;
}

if ($resultado == null) {
    echo "La operación es inválida";
} else {

    echo "" . $resultado . "";
}
?>