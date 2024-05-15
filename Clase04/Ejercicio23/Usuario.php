<?php
class Usuario {
    private $id;
    private $nombre;
    private $clave;
    private $mail;
    private $fechaRegistro;

    // Constructor
    public function __construct($nombre, $clave, $mail, $fechaRegistro) {
        $this->id = mt_rand(1, 10000); // Generar un ID autoincremental emulado
        $this->nombre = $nombre;
        $this->clave = password_hash($clave, PASSWORD_DEFAULT); // Encriptar la clave
        $this->mail = $mail;
        $this->fechaRegistro = $fechaRegistro;
    }

    // Método para guardar el usuario en un archivo JSON
    public function GuardarUsuario($filename = 'usuarios.json') {
        $usuarios = $this->LeerUsuarios($filename);
        $usuarios[] = [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'clave' => $this->clave,
            'mail' => $this->mail,
            'fechaRegistro' => $this->fechaRegistro
        ];
        $json = json_encode($usuarios, JSON_PRETTY_PRINT);
        return file_put_contents($filename, $json) !== false;
    }

    // Método para leer usuarios desde un archivo JSON
    public static function LeerUsuarios($filename = 'usuarios.json') {
        if (!file_exists($filename)) {
            return [];
        }
        $json = file_get_contents($filename);
        return json_decode($json, true);
    }

    // Método para subir la imagen del usuario al servidor
    public static function SubirImagen($file, $directory = 'Fotos/') {
        $target_dir = $directory;
        $target_file = $target_dir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            return false;
        }
    }

    // Getters
    public function GetId() {
        return $this->id;
    }

    public function GetNombre() {
        return $this->nombre;
    }

    public function GetMail() {
        return $this->mail;
    }

    public function GetFechaRegistro() {
        return $this->fechaRegistro;
    }
}
?>
