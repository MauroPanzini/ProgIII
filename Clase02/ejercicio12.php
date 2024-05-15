<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/
function invertirPalabra($palabra) {
    $longitud = count($palabra);
    $inicio = 0;
    $fin = $longitud - 1;

    while ($inicio < $fin) {
        
        $temp = $palabra[$inicio];
        $palabra[$inicio] = $palabra[$fin];
        $palabra[$fin] = $temp;

        $inicio++;
        $fin--;
    }

    return $palabra;
}

$palabra = str_split("HOLA");
$palabraInvertida = invertirPalabra($palabra);
echo implode("", $palabraInvertida);

?>