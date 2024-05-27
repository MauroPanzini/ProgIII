<?php
class AltaVenta {
    private $heladoFile = 'heladeria.json';
    private $ventaFile = 'ventas.json';
    private $imageDir = 'ImagenesDeLaVenta/2024/';

    public function __construct() {
        if (!file_exists($this->ventaFile)) {
            file_put_contents($this->ventaFile, json_encode([]));
        }
        if (!file_exists($this->imageDir)) {
            mkdir($this->imageDir, 0777, true);
        }
    }

    public function alta($email, $sabor, $tipo, $cantidad, $imagen) {
        $helados = json_decode(file_get_contents($this->heladoFile), true);
        $ventas = json_decode(file_get_contents($this->ventaFile), true);
        $id = count($ventas) + 1;
        $heladoExiste = false;

        foreach ($helados as &$helado) {
            if ($helado['sabor'] === $sabor && $helado['tipo'] === $tipo && $helado['stock'] >= $cantidad) {
                $heladoExiste = true;
                $helado['stock'] -= $cantidad;
                $venta = [
                    'id' => $id,
                    'email' => $email,
                    'sabor' => $sabor,
                    'tipo' => $tipo,
                    'cantidad' => $cantidad,
                    'fecha' => date('Y-m-d H:i:s')
                ];
                $ventas[] = $venta;
                file_put_contents($this->ventaFile, json_encode($ventas));
                file_put_contents($this->heladoFile, json_encode($helados));

                $emailUsername = explode('@', $email)[0];
                $imagePath = $this->imageDir . "{$sabor}_{$tipo}_{$emailUsername}_" . date('Ymd_His') . ".jpg";
                move_uploaded_file($imagen['tmp_name'], $imagePath);

                echo json_encode(['success' => true]);
                return;
            }
        }

        if (!$heladoExiste) {
            echo json_encode(['error' => 'No hay suficiente stock o el helado no existe']);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $sabor = $_POST['sabor'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $cantidad = $_POST['cantidad'] ?? '';
    $imagen = $_FILES['imagen'] ?? null;

    if ($email && $sabor && $tipo && $cantidad && $imagen) {
        $venta = new AltaVenta();
        $venta->alta($email, $sabor, $tipo, $cantidad, $imagen);
    } else {
        echo json_encode(['error' => 'Datos incompletos']);
    }
} else {
    echo json_encode(['error' => 'Método no permitido']);
}
?>
