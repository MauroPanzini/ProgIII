<?php

class Producto {
    // Método para leer productos desde un archivo JSON
    public static function LeerProductos($filename = 'productos.json') {
        if (!file_exists($filename)) {
            return [];
        }
        $json = file_get_contents($filename);
        return json_decode($json, true);
    }

    // Método para guardar productos en un archivo JSON
    public static function GuardarProducto($producto, $filename = 'productos.json') {
        $productos = self::LeerProductos($filename);

        // Verificar si el producto ya existe
        $index = -1;
        foreach ($productos as $key => $prod) {
            if ($prod['codigo_barra'] == $producto['codigo_barra']) {
                $index = $key;
                break;
            }
        }

        // Si el producto existe, actualizar el stock
        if ($index != -1) {
            $productos[$index]['stock'] += $producto['stock'];
            $json = json_encode($productos, JSON_PRETTY_PRINT);
            return file_put_contents($filename, $json) !== false ? "Actualizado" : "no se pudo hacer";
        } else {
            // Si el producto no existe, agregarlo al documento
            $productos[] = $producto;
            $json = json_encode($productos, JSON_PRETTY_PRINT);
            return file_put_contents($filename, $json) !== false ? "Ingresado" : "no se pudo hacer";
        }
    }
    public static function ExisteProductoConStock($codigoBarra, $cantidad) {
        $productos = self::LeerProductos();

        foreach ($productos as $producto) {
            if ($producto['codigo_barra'] == $codigoBarra && $producto['stock'] >= $cantidad) {
                return true;
            }
        }

        return false;
    }
}
?>
