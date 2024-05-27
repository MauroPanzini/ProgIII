<?php

function leerVentas()
{
    $filePath = 'ventas.json';
    if (!file_exists($filePath)) {
        return [];
    }

    $json = file_get_contents($filePath);
    return json_decode($json, true);
}

$ventas = leerVentas();
$accion = $_GET['accion'];

switch ($accion) {
    case 'cantidadPrendasVendidas':
        $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d', strtotime('yesterday'));
        $cantidad = 0;
        foreach ($ventas as $venta) {
            $cantidad += $venta['stock'];
        }
        echo json_encode(['cantidad' => $cantidad]);
        break;

    case 'ventasUsuario':
        $email = $_GET['email'];
        $ventasUsuario = array_filter($ventas, function ($venta) use ($email) {
            return $venta['email'] == $email;
        });
        echo json_encode($ventasUsuario);
        break;

    case 'ventasPorTipo':
        $tipo = $_GET['tipo'];
        $ventasTipo = array_filter($ventas, function ($venta) use ($tipo) {
            return $venta['tipo'] == $tipo;
        });
        echo json_encode($ventasTipo);
        break;

    case 'prendasPorPrecio':
        $precioMin = $_GET['precioMin'];
        $precioMax = $_GET['precioMax'];
        $prendas = json_decode(file_get_contents('tienda.json'), true);
        $prendasEnRango = array_filter($prendas, function ($prenda) use ($precioMin, $precioMax) {
            return $prenda['precio'] >= $precioMin && $prenda['precio'] <= $precioMax;
        });
        echo json_encode($prendasEnRango);
        break;

    case 'ingresosPorDia':
        $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null;
        $ingresosPorDia = [];
        foreach ($ventas as $venta) {
            $fechaVenta = substr($venta['fecha'], 0, 10);
            if ($fecha && $fecha != $fechaVenta)
                continue;
            if (!isset($ingresosPorDia[$fechaVenta])) {
                $ingresosPorDia[$fechaVenta] = 0;
            }
            $ingresosPorDia[$fechaVenta] += $venta['precio'] * $venta['stock'];
        }
        echo json_encode($ingresosPorDia);
        break;

    case 'productoMasVendido':
        $productoVentas = [];
        foreach ($ventas as $venta) {
            $clave = "{$venta['nombre']}_{$venta['tipo']}";
            if (!isset($productoVentas[$clave])) {
                $productoVentas[$clave] = 0;
            }
            $productoVentas[$clave] += $venta['stock'];
        }
        arsort($productoVentas);
        $productoMasVendido = array_key_first($productoVentas);
        echo json_encode(['productoMasVendido' => $productoMasVendido]);
        break;

    default:
        echo json_encode(['message' => 'Acción no válida']);
        break;
}
