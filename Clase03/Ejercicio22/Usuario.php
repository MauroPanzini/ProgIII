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

    // Método para verificar si un usuario está registrado y si la clave coincide
    public static function VerificarUsuario($mail, $clave) {
        $usuarios = self::LeerUsuarios();
        foreach ($usuarios as $usuario) {
            if ($usuario->GetMail() === $mail) {
                return password_verify($clave, $usuario->GetClave()) ? "Verificado" : "Error en los datos";
            }
        }
        return "Usuario no registrado";
    }

    // Método para obtener el nombre del usuario
    public function GetNombre() {
        return $this->nombre;
    }

    // Método para obtener la clave del usuario
    public function GetClave() {
        return $this->clave;
    }

    // Método para obtener el mail del usuario
    public function GetMail() {
        return $this->mail;
    }
}
?>
