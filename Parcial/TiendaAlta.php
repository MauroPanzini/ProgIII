<?php
include 'clases/Prenda.php';
include 'clases/Tienda.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];
    $talla = $_POST['talla'];
    $color = $_POST['color'];
    $stock = $_POST['stock'];
    $imagen = $_FILES['imagen'];

    $prenda = new Prenda($nombre, $precio, $tipo, $talla, $color, $stock, $imagen);
    $tienda = new Tienda();
    $tienda->agregarPrenda($prenda);

    echo json_encode(['message' => 'Prenda agregada con exito']);
}
?>