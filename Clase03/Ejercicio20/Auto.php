<?php

class Auto {
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    // Constructor con sobrecarga
    public function __construct($marca, $color, $precio = null, $fecha = null) {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio ?? 0.0; // Default price to 0.0 if not provided
        $this->_fecha = $fecha ?? new DateTime(); // Default to current date if not provided
    }

    // Método para agregar impuestos
    public function AgregarImpuestos($impuesto) {
        $this->_precio += $impuesto;
    }

    // Método de clase para mostrar los atributos de un Auto
    public static function MostrarAuto($auto) {
        echo "Marca: {$auto->_marca}, Color: {$auto->_color}, Precio: {$auto->_precio}, Fecha: {$auto->_fecha->format('Y-m-d')}";
        echo "<br/>";
    }

    // Método para comparar si dos Autos son de la misma marca
    public function Equals($auto) {
        return $this->_marca === $auto->_marca;
    }

    // Método de clase para sumar dos Autos si son de la misma marca y color
    public static function Add($auto1, $auto2) {
        if ($auto1->Equals($auto2) && $auto1->_color === $auto2->_color) {
            return $auto1->_precio + $auto2->_precio;
        } else {
            echo "Los autos no son de la misma marca y color.";
            echo "<br/>";
            return 0.0;
        }
    }

    // Getters
    public function GetColor() {
        return $this->_color;
    }

    public function GetMarca() {
        return $this->_marca;
    }

    public function GetPrecio() {
        return $this->_precio;
    }

    public function GetFecha() {
        return $this->_fecha;
    }

    // Método de clase para guardar un auto en un archivo CSV
    public static function GuardarAuto($auto, $filename = 'autos.csv') {
        $file = fopen($filename, 'a');
        $data = [$auto->_marca, $auto->_color, $auto->_precio, $auto->_fecha->format('Y-m-d')];
        fputcsv($file, $data);
        fclose($file);
    }

    // Método de clase para leer autos desde un archivo CSV
    public static function LeerAutos($filename = 'autos.csv') {
        $autos = [];
        if (($file = fopen($filename, 'r')) !== FALSE) {
            while (($data = fgetcsv($file)) !== FALSE) {
                $marca = $data[0];
                $color = $data[1];
                $precio = (double)$data[2];
                $fecha = new DateTime($data[3]);
                $autos[] = new Auto($marca, $color, $precio, $fecha);
            }
            fclose($file);
        }
        return $autos;
    }
}
?>
