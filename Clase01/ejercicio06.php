<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
*/

$elementos = array();

for ($i = 0; $i < 5; $i++) {
    $elementos[$i] = rand(1, 10);
}

$suma = array_sum($elementos);
$promedio = $suma / count($elementos);

if ($promedio > 6) {
    echo "El promedio de los números es ".$promedio .", y es mayor que 6.";
} else if ($promedio < 6) {
    echo "El promedio de los números es ".$promedio .", y es menor que 6.";
} else {
    echo "El promedio de los números es igual a 6.";
}

?>