<?php

class Venta {
    public $id;
    public $email;
    public $nombre;
    public $tipo;
    public $talla;
    public $stock;
    public $fecha;
    public $numeroPedido;
    public $imagen;

    public function __construct($email, $nombre, $tipo, $talla, $stock, $imagen) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->talla = $talla;
        $this->stock = $stock;
        $this->fecha = date('Y-m-d H:i:s');
        $this->numeroPedido = uniqid();
        $this->imagen = $imagen;
    }
}
?>
