<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 20 BIS (Registro CSV)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario
*/
include 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? null;
    $clave = $_POST['clave'] ?? null;
    $mail = $_POST['mail'] ?? null;

    if ($nombre && $clave && $mail) {
        $usuario = new Usuario($nombre, $clave, $mail);
        if ($usuario->GuardarUsuario()) {
            echo "Usuario agregado correctamente.";
        } else {
            echo "Error al agregar el usuario.";
        }
    } else {
        echo "Faltan datos. Asegúrese de enviar nombre, clave y mail.";
    }
} else {
    echo "Método no permitido. Use POST.";
}
?>
