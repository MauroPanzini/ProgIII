<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números
utilizando las estructuras while y foreach.
*/
$num = 0;
for ($i = 0; $i < 10; $i++) {
    $elementos[$i] = $num + 1;
    $num += 2;
}
for ($i = 0; $i < 5; $i++) {
    echo"". $elementos[$i];
    echo "<br/>";
}


?>