<?php
class HeladeriaConsultar {
    private $file = 'heladeria.json';

    public function consultar($sabor, $tipo) {
        $helados = json_decode(file_get_contents($this->file), true);

        foreach ($helados as $helado) {
            if ($helado['sabor'] === $sabor && $helado['tipo'] === $tipo) {
                echo json_encode(['mensaje' => 'existe']);
                return;
            }
        }

        foreach ($helados as $helado) {
            if ($helado['sabor'] === $sabor) {
                echo json_encode(['mensaje' => 'No existe el tipo']);
                return;
            } elseif ($helado['tipo'] === $tipo) {
                echo json_encode(['mensaje' => 'No existe el sabor']);
                return;
            }
        }

        echo json_encode(['mensaje' => 'No existe el sabor y tipo']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sabor = $_POST['sabor'] ?? '';
    $tipo = $_POST['tipo'] ?? '';

    if ($sabor && $tipo) {
        $consulta = new HeladeriaConsultar();
        $consulta->consultar($sabor, $tipo);
    } else {
        echo json_encode(['error' => 'Datos incompletos']);
    }
} else {
    echo json_encode(['error' => 'Método no permitido']);
}
?>
