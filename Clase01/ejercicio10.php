<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 10 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.
*/

$lapicera1 = array(
    'color' => 'azul',
    'marca' => 'Bic',
    'trazo' => 'fino',
    'precio' => 1500
);

$lapicera2 = array(
    'color' => 'rojo',
    'marca' => 'Pilot',
    'trazo' => 'medio',
    'precio' => 1800
);

$lapicera3 = array(
    'color' => 'verde',
    'marca' => 'Paper Mate',
    'trazo' => 'grueso',
    'precio' => 2000
);

$arrayIndexado = array($lapicera1, $lapicera2, $lapicera3);

$arrayAsociativo = array(
    'lapicera1' => $lapicera1,
    'lapicera2' => $lapicera2,
    'lapicera3' => $lapicera3
);

echo "Array Indexado:<br>";
mostrarArrays($arrayIndexado);

echo "<br>Array Asociativo:<br>";
mostrarArrays($arrayAsociativo);

function mostrarArrays($arrays)
{
    foreach ($arrays as $key => $array) {
        echo "$key:<br>";
        foreach ($array as $clave => $valor) {
            echo "$clave: $valor<br>";
        }
        echo "<br>";
    }
}

?>