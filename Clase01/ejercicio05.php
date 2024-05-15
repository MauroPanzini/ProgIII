<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/
$num = 58;
$numerosEnPalabras = array(
    1 => 'uno',
    2 => 'dos',
    3 => 'tres',
    4 => 'cuatro',
    5 => 'cinco',
    6 => 'seis',
    7 => 'siete',
    8 => 'ocho',
    9 => 'nueve',
    20 => 'veinte',
    30 => 'treinta',
    40 => 'cuarenta',
    50 => 'cincuenta',
    60 => 'sesenta'
);
$unidad = $num % 10;
$decena = floor($num / 10) * 10;
if($num == 20){
    echo"". $numerosEnPalabras[$num];
}
else if($num % 10 == 0){
    echo "". $numerosEnPalabras[$num];
}
else if ($decena == 20) {
    if ($unidad > 0){
        echo'veinti' . $numerosEnPalabras[$unidad];
    }
}
else{
    echo"". $numerosEnPalabras[$decena]. " y ". $numerosEnPalabras[$unidad] ."";
}
?>