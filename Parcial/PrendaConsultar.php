<?php
include 'clases/Tienda.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $color = $_POST['color'];

    $tienda = new Tienda();
    $prendas = $tienda->leerPrendas();

    foreach ($prendas as $prenda) {
        if ($prenda->nombre == $nombre && $prenda->tipo == $tipo && $prenda->color == $color) {
            echo json_encode(['message' => 'existe']);
            exit;
        }
    }

    echo json_encode(['message' => 'no existe']);
}
?>