<?php

class Usuario {
    private $nombre;
    private $clave;
    private $mail;

    // Constructor
    public function __construct($nombre, $clave, $mail) {
        $this->nombre = $nombre;
        $this->clave = password_hash($clave, PASSWORD_DEFAULT); // Encriptar la clave
        $this->mail = $mail;
    }

    // Método para guardar el usuario en un archivo CSV
    public function GuardarUsuario($filename = 'usuarios.csv') {
        $file = fopen($filename, 'a');
        $data = [$this->nombre, $this->clave, $this->mail];
        $result = fputcsv($file, $data);
        fclose($file);
        return $result !== false;
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

    // Getters
    public function GetNombre() {
        return $this->nombre;
    }

    public function GetClave() {
        return $this->clave;
    }

    public function GetMail() {
        return $this->mail;
    }
}
?>
