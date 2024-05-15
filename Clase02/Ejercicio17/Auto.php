<?php
class Auto {
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($marca, $color, $precio = null, $fecha = null) {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio ?? 0.0; 
        $this->_fecha = $fecha ?? new DateTime();
    }

    public function AgregarImpuestos($impuesto) {
        $this->_precio += $impuesto;
    }

    public static function MostrarAuto($auto) {
        echo "Marca: {$auto->_marca}, Color: {$auto->_color}, Precio: {$auto->_precio}, Fecha: {$auto->_fecha->format('Y-m-d')}";
        echo "<br/>";
    }

    public function Equals($auto) {
        return $this->_marca === $auto->_marca && $this->_color === $auto->_color;
    }

    public static function Add($auto1, $auto2) {
        if ($auto1->Equals($auto2)) {
            return $auto1->_precio + $auto2->_precio;
        } else {
            echo "Los autos no son de la misma marca y color.";
            echo "<br/>";
            return 0.0;
        }
    }
}
?>