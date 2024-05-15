<?php

include 'Auto.php';

class Garage {
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    // Constructor con sobrecarga
    public function __construct($razonSocial, $precioPorHora = null) {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora ?? 0.0; // Default price per hour to 0.0 if not provided
        $this->_autos = array();
    }

    // Método para mostrar los atributos del garaje
    public function MostrarGarage() {
        echo "Razón Social: {$this->_razonSocial}, Precio por Hora: {$this->_precioPorHora}";
        echo "<br/>";
        echo "Autos en el Garaje:";
        echo "<br/>";
        foreach ($this->_autos as $auto) {
            Auto::MostrarAuto($auto);
        }
    }

    // Método para comparar si un auto está en el garaje basado en marca y color
    public function Equals($auto) {
        foreach ($this->_autos as $a) {
            if ($a->Equals($auto) && $a->GetColor() === $auto->GetColor()) {
                return true;
            }
        }
        return false;
    }

    // Método para agregar un auto al garaje
    public function Add($auto) {
        if (!$this->Equals($auto)) {
            $this->_autos[] = $auto;
            echo "Auto agregado al garaje.";
            echo "<br/>";
        } else {
            echo "El auto ya está en el garaje.";
            echo "<br/>";
        }
    }

    // Método para quitar un auto del garaje
    public function Remove($auto) {
        foreach ($this->_autos as $key => $a) {
            if ($a->Equals($auto) && $a->GetColor() === $auto->GetColor()) {
                unset($this->_autos[$key]);
                // Reindexar el array para evitar huecos
                $this->_autos = array_values($this->_autos);
                echo "Auto removido del garaje.";
                echo "<br/>";   
                return;
            }
        }
        echo "El auto no está en el garaje.\n";
    }

    // Método de clase para guardar un garage en un archivo CSV
    public static function GuardarGarage($garage, $filename = 'garages.csv') {
        $file = fopen($filename, 'a');
        $autosStr = '';
        foreach ($garage->_autos as $auto) {
            $autosStr .= "{$auto->GetMarca()}-{$auto->GetColor()},";
        }
        $autosStr = rtrim($autosStr, ','); // Remove the trailing comma
        $data = [$garage->_razonSocial, $garage->_precioPorHora, $autosStr];
        fputcsv($file, $data);
        fclose($file);
    }

    // Método de clase para leer garages desde un archivo CSV
    public static function LeerGarages($filename = 'garages.csv') {
        $garages = [];
        if (($file = fopen($filename, 'r')) !== FALSE) {
            while (($data = fgetcsv($file)) !== FALSE) {
                $razonSocial = $data[0];
                $precioPorHora = (double)$data[1];
                $garage = new Garage($razonSocial, $precioPorHora);

                $autos = explode(',', $data[2]);
                foreach ($autos as $autoStr) {
                    list($marca, $color) = explode('-', $autoStr);
                    $auto = new Auto($marca, $color);
                    $garage->Add($auto);
                }

                $garages[] = $garage;
            }
            fclose($file);
        }
        return $garages;
    }
}
?>
