<?php
$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod === 'POST') {
    $action = $_POST['action'] ?? '';
}
elseif($requestMethod === 'GET'){
    $action = $_GET['action'] ?? '';
}
elseif($requestMethod === 'PUT'){
    $action = 'ModificarVenta';
}
switch ($action) {
    case 'TiendaAlta':
        include 'TiendaAlta.php';
        break;
    case 'PrendaConsultar':
        include 'PrendaConsultar.php';
        break;
    case 'AltaVenta':
        include 'AltaVenta.php';
        break;
    case 'ConsultasVentas':
        include 'ConsultasVentas.php';
        break;
    case 'ModificarVenta':
        include 'ModificarVenta.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(['message' => 'Endpoint not found']);
        break;
}

?>