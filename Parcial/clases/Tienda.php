<?php

class Tienda {
    private $filePath = 'tienda.json';
    private $imageDir = 'ImagenesDeRopa/2024/';

    public function agregarPrenda($prenda) {
        $prendas = $this->leerPrendas();
        $existe = false;

        foreach ($prendas as &$p) {
            if ($p->nombre == $prenda->nombre && $p->tipo == $prenda->tipo) {
                $p->precio = $prenda->precio;
                $p->stock += $prenda->stock;
                $existe = true;
                break;
            }
        }

        if (!$existe) {
            $prenda->id = count($prendas) + 1;
            $prendas[] = $prenda;
        }

        $this->guardarPrendas($prendas);
        $this->guardarImagen($prenda);
    }

    public function leerPrendas() {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $json = file_get_contents($this->filePath);
        return json_decode($json);
    }



    public function guardarPrendas($prendas) {
        file_put_contents($this->filePath, json_encode($prendas, JSON_PRETTY_PRINT));
    }

    public function guardarImagen($prenda) {
        $imagePath = $this->imageDir . "{$prenda->nombre}_{$prenda->tipo}.jpg";
        move_uploaded_file($prenda->imagen['tmp_name'], $imagePath);
    }
}
?>