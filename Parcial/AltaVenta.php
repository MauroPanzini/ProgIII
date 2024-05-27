<?php
include 'clases/Venta.php';
include 'clases/Tienda.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $talla = $_POST['talla'];
    $stock = $_POST['stock'];
    $imagen = $_FILES['imagen'];

    $tienda = new Tienda();
    $prendas = $tienda->leerPrendas();

    foreach ($prendas as &$prenda) {
        if ($prenda->nombre == $nombre && $prenda->tipo == $tipo && $prenda->talla == $talla) {
            if ($prenda->stock >= $stock) {
                $prenda->stock -= $stock;

                $venta = new Venta($email, $nombre, $tipo, $talla, $stock, $imagen);
                $ventas = leerVentas();
                $venta->id = count($ventas) + 1;
                $ventas[] = $venta;
                guardarVentas($ventas);
                guardarImagenVenta($venta);

                $tienda->guardarPrendas($prendas);

                echo json_encode(['message' => 'Venta realizada con éxito']);
                exit;
            } else {
                echo json_encode(['message' => 'Stock insuficiente']);
                exit;
            }
        }
    }

    echo json_encode(['message' => 'Prenda no encontrada']);
}

function leerVentas() {
    $filePath = 'ventas.json';
    if (!file_exists($filePath)) {
        return [];
    }

    $json = file_get_contents($filePath);
    return json_decode($json);
}

function guardarVentas($ventas) {
    $filePath = 'ventas.json';
    file_put_contents($filePath, json_encode($ventas, JSON_PRETTY_PRINT));
}

function guardarImagenVenta($venta) {
    $imageDir = 'ImagenesDeVenta/2024/';
    if (!file_exists($imageDir)) {
        mkdir($imageDir, 0777, true);
    }
    $emailNombre = strstr($venta->email, '@', true);
    $fecha = date('Y-m-d_H-i-s'); 
    $imagePath = $imageDir . "{$venta->nombre}_{$venta->tipo}_{$venta->talla}_{$emailNombre}_{$fecha}.jpg";
    if (move_uploaded_file($venta->imagen['tmp_name'], $imagePath)) {
        echo json_encode(['message' => 'Imagen de la venta guardada con exito']);
    } else {
        echo json_encode(['message' => 'Error al guardar la imagen de la venta']);
    }
}
?>