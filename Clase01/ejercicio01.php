<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.
*/
    $numeros = 0;
    $suma = 0;
    while ($suma < 1000 - $numeros) {
        $numeros ++;
        $suma += $numeros;
        echo "El último número es: " . $numeros;
        echo "<br/>";
        echo "La suma actual es:". $suma;
        echo "<br/>";
    }
?>