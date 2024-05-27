<?php

function leerVentas() {
    $filePath = 'ventas.json';
    if (!file_exists($filePath)) {
        return [];
    }

    $json = file_get_contents($filePath);
    return json_decode($json, true);
}

function guardarVentas($ventas) {
    $filePath = 'ventas.json';
    file_put_contents($filePath, json_encode($ventas, JSON_PRETTY_PRINT));
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $numeroPedido = $_PUT['numeroPedido'];
    $email = $_PUT['email'];
    $nombre = $_PUT['nombre'];
    $tipo = $_PUT['tipo'];
    $talla = $_PUT['talla'];
    $stock = $_PUT['stock'];

    $ventas = leerVentas();
    $ventaEncontrada = false;

    foreach ($ventas as &$venta) {
        if ($venta['numeroPedido'] == $numeroPedido) {
            $venta['email'] = $email;
            $venta['nombre'] = $nombre;
            $venta['tipo'] = $tipo;
            $venta['talla'] = $talla;
            $venta['stock'] = $stock;
            $ventaEncontrada = true;
            break;
        }
    }

    if ($ventaEncontrada) {
        guardarVentas($ventas);
        echo json_encode(['message' => 'Venta modificada con exito']);
    } else {
        echo json_encode(['message' => 'No existe ese numero de pedido']);
    }
}
