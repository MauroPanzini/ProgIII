<?php

class Prenda {
    public $id;
    public $nombre;
    public $precio;
    public $tipo;
    public $talla;
    public $color;
    public $stock;
    public $imagen;

    public function __construct($nombre, $precio, $tipo, $talla, $color, $stock, $imagen) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->tipo = $tipo;
        $this->talla = $talla;
        $this->color = $color;
        $this->stock = $stock;
        $this->imagen = $imagen;
    }
}
?>