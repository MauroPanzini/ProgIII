<?php
class Heladeria {
    private $file = 'heladeria.json';
    private $imageDir = 'ImagenesDeHelados/2024/';

    public function __construct() {
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
        if (!file_exists($this->imageDir)) {
            mkdir($this->imageDir, 0777, true);
        }
    }

    public function alta($sabor, $precio, $tipo, $vaso, $stock, $imagen) {
        $helados = json_decode(file_get_contents($this->file), true);
        $id = 1;
        $exists = false;

        foreach ($helados as &$helado) {
            if ($helado['sabor'] === $sabor && $helado['tipo'] === $tipo) {
                $helado['precio'] = $precio;
                $helado['stock'] += $stock;
                $exists = true;
                break;
            }
            $id = max($id, $helado['id'] + 1);
        }

        if (!$exists) {
            $helados[] = [
                'id' => $id,
                'sabor' => $sabor,
                'precio' => $precio,
                'tipo' => $tipo,
                'vaso' => $vaso,
                'stock' => $stock
            ];
        }

        file_put_contents($this->file, json_encode($helados));

        $imagePath = $this->imageDir . "{$sabor}_{$tipo}.jpg";
        move_uploaded_file($imagen['tmp_name'], $imagePath);

        echo json_encode(['success' => true]);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sabor = $_POST['sabor'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $vaso = $_POST['vaso'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $imagen = $_FILES['imagen'] ?? null;

    if ($sabor && $precio && $tipo && $vaso && $stock && $imagen) {
        $heladeria = new Heladeria();
        $heladeria->alta($sabor, $precio, $tipo, $vaso, $stock, $imagen);
    } else {
        echo json_encode(['error' => 'Datos incompletos']);
    }
} else {
    echo json_encode(['error' => 'Método no permitido']);
}
?>
