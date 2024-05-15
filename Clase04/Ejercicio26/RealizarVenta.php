<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 26 (RealizarVenta)
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
POST .
Verificar que el usuario y el producto exista y tenga stock.
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). carga
los datos necesarios para guardar la venta en un nuevo renglón.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesaris en las clases
*/
include 'Usuario.php';
include 'Producto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoBarra = $_POST['codigo_barra'] ?? null;
    $usuarioId = $_POST['usuario_id'] ?? null;
    $cantidad = $_POST['cantidad'] ?? null;

    if ($codigoBarra && $usuarioId && $cantidad) {
        // Verificar si el usuario existe
        if (Usuario::ExisteUsuario($usuarioId)) {
            // Verificar si el producto existe y tiene suficiente stock
            if (Producto::ExisteProductoConStock($codigoBarra, $cantidad)) {
                $ventaId = mt_rand(1, 10000); // Generar un ID autoincremental emulado
                // Cargar los datos necesarios para guardar la venta en un nuevo renglón

                // Simplemente retornamos un mensaje de éxito en este ejemplo
                echo "venta realizada";
            } else {
                echo "El producto no existe o no tiene suficiente stock.";
            }
        } else {
            echo "El usuario no existe.";
        }
    } else {
        echo "Faltan datos. Asegúrese de enviar código de barra, usuario_id y cantidad.";
    }
} else {
    echo "Método no permitido. Use POST.";
}
?>
