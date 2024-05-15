<?php

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
