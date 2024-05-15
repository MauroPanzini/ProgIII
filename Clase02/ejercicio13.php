<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 13 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán: 1 si la palabra
pertenece a algún elemento del listado.
0 en caso contrario.
*/
function validar_palabra($palabra, $max) {

    $palabras_validas = ["Recuperatorio", "Parcial", "Programacion"];
    
    if (strlen($palabra) > $max) {
        return 0;
    }
    
    if (in_array($palabra, $palabras_validas)) {
        return 1;
    }
    return 0;
}

echo validar_palabra("Parcial", 10); 
echo validar_palabra("Programacion", 5); 
echo validar_palabra("Recuperatorio", 20); 
echo validar_palabra("Final",10); 

?>