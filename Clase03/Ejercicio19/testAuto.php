<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 19 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos

privados: _color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como

parámetros: i. La marca y el color.

ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto” por
parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo devolverá
TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son de la
misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con la suma de los
precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un archivo
autos.csv.
Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo
autos.csv
Se deben cargar los datos en un array de autos.
En testAuto.php:
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio. ● Crear
un objeto “Auto” utilizando la sobrecarga restante.
● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al
atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)
*/
include 'Auto.php';

// Crear dos objetos “Auto” de la misma marca y distinto color
$auto1 = new Auto("Toyota", "Rojo");
$auto2 = new Auto("Toyota", "Azul");

// Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio
$auto3 = new Auto("Ford", "Negro", 10000);
$auto4 = new Auto("Ford", "Negro", 15000);

// Crear un objeto “Auto” utilizando la sobrecarga restante
$auto5 = new Auto("Honda", "Blanco", 20000, new DateTime('2023-05-01'));

// Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $1500 al atributo precio
$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

// Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido
$importeSumado = Auto::Add($auto1, $auto2);
echo "Importe sumado de Auto1 y Auto2: $importeSumado\n";

// Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no
echo "Auto1 y Auto2 son iguales (misma marca)? " . ($auto1->Equals($auto2) ? "Sí" : "No");
echo "<br/>";
echo "Auto1 y Auto5 son iguales (misma marca)? " . ($auto1->Equals($auto5) ? "Sí" : "No");
echo "<br/>";

// Utilizar el método de clase “MostrarAuto” para mostrar cada uno de los objetos impares (1, 3, 5)
Auto::MostrarAuto($auto1);
Auto::MostrarAuto($auto3);
Auto::MostrarAuto($auto5);

// Guardar los autos en el archivo autos.csv
Auto::GuardarAuto($auto1);
Auto::GuardarAuto($auto2);
Auto::GuardarAuto($auto3);
Auto::GuardarAuto($auto4);
Auto::GuardarAuto($auto5);

// Leer los autos desde el archivo autos.csv y mostrarlos
$autos = Auto::LeerAutos();
foreach ($autos as $auto) {
    Auto::MostrarAuto($auto);
}

?>