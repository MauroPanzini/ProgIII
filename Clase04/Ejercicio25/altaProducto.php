<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 25 ( AltaProducto)
Archivo: altaProducto.php
método:POST
Recibe los datos del producto(código de barra (6 cifras ),nombre ,tipo, stock, precio )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un objeto y
utilizar sus métodos para poder verificar si es un producto existente, si ya existe el producto se le
suma el stock , de lo contrario se agrega al documento en un nuevo renglón
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase
*/
include 'Producto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoBarra = $_POST['codigo_barra'] ?? null;
    $nombre = $_POST['nombre'] ?? null;
    $tipo = $_POST['tipo'] ?? null;
    $stock = $_POST['stock'] ?? null;
    $precio = $_POST['precio'] ?? null;
    
    if ($codigoBarra && preg_match('/^\d{6}$/', $codigoBarra)) {
        if ($nombre && $tipo && $stock && $precio) {
            $producto = [
                'id' => mt_rand(1, 10000), // Generar un ID autoincremental emulado
                'codigo_barra' => $codigoBarra,
                'nombre' => $nombre,
                'tipo' => $tipo,
                'stock' => intval($stock), // Convertir a entero
                'precio' => floatval($precio) // Convertir a float
            ];

            // Guardar el producto y obtener el resultado
            $resultado = Producto::GuardarProducto($producto);
            echo $resultado;
        } else {
            echo "Faltan datos. Asegúrese de enviar nombre, tipo, stock y precio.";
        }
    } else {
        echo "El código de barras debe tener exactamente 6 dígitos.";
    }
} else {
    echo "Método no permitido. Use POST.";
}
?>
