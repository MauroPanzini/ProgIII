<?php

class Usuario {
    private $nombre;
    private $clave;
    private $mail;

    // Constructor
    public function __construct($nombre, $clave, $mail) {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
    }

    // Método de clase para leer usuarios desde un archivo CSV
    public static function LeerUsuarios($filename = 'usuarios.csv') {
        $usuarios = [];
        if (($file = fopen($filename, 'r')) !== FALSE) {
            while (($data = fgetcsv($file)) !== FALSE) {
                $usuarios[] = new Usuario($data[0], $data[1], $data[2]);
            }
            fclose($file);
        }
        return $usuarios;
    }

    // Método para obtener el nombre del usuario
    public function GetNombre() {
        return $this->nombre;
    }

    // Método para obtener el mail del usuario
    public function GetMail() {
        return $this->mail;
    }
}
?>
