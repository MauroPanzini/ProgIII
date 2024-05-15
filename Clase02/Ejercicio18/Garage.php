<?php
include '../Ejercicio17/Auto.php'; //en mi máquina tengo la referencia al mismo Auto del ejercicio 17
// include 'Auto.php'; //<-- para entregar el trabajo hice en gdb el mismo archivo Auto y uso esta referencia
class Garage {
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($razonSocial, $precioPorHora = null) {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora ?? 0.0; 
        $this->_autos = array();
    }

    public function MostrarGarage() {
        echo "Razón Social: {$this->_razonSocial}, Precio por Hora: {$this->_precioPorHora}";
        echo "<br/>";
        echo "Autos en el Garaje:";
        echo "<br/>";
        foreach ($this->_autos as $auto) {
            Auto::MostrarAuto($auto);
        }
    }

    public function Equals($auto) {
        foreach ($this->_autos as $a) {
            if ($a->Equals($auto)) {
                return true;
            }
        }
        return false;
    }
    public function Add($auto) {
        if (!$this->Equals($auto)) {
            $this->_autos[] = $auto;
        } else {
            echo "El auto ya está en el garaje.";
            echo "<br/>";
        }
    }

    public function Remove($auto) {
        foreach ($this->_autos as $key => $a) {
            if ($a->Equals($auto)) {
                unset($this->_autos[$key]);
                echo "Auto removido del garaje.";
                echo "<br/>";
                return;
            }
        }
        echo "El auto no está en el garaje.";
        echo "<br/>";
    }
}
?>