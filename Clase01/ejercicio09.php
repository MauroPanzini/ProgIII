<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.
*/
$lapiceraUno = array(
    "color" => "negro",
    "marca" => "bic",
    "trazo" => "fino",
    "precio" => 1500,
);
$lapiceraDos = array(
    "color" => "azul",
    "marca" => "faber castell",
    "trazo" => "grueso",
    "precio" => 1700,
);
$lapiceraTres = array(
    "color" => "rojo",
    "marca" => "bic",
    "trazo" => "fino",
    "precio" => 1300,
);
function mostrarDetalles($lapicera)
{
    echo "Color: " . $lapicera['color'] . "<br>";
    echo "Marca: " . $lapicera['marca'] . "<br>";
    echo "Trazo: " . $lapicera['trazo'] . "<br>";
    echo "Precio: $" . $lapicera['precio'] . "<br><br>";
}
mostrarDetalles($lapiceraUno);
mostrarDetalles($lapiceraDos);
mostrarDetalles($lapiceraTres);
?>