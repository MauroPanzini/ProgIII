<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'altaHelado':
            include 'HeladeriaAlta.php';
            break;
        case 'consultarHelado':
            include 'HeladoConsultar.php';
            break;
        case 'altaVenta':
            include 'AltaVenta.php';
            break;
        default:
            echo json_encode(['error' => 'Accion no valida']);
    }
} else {
    echo json_encode(['error' => 'Método no permitido']);
}
?>
