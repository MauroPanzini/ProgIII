<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 22 ( Login)
Archivo: Login.php
método:POST
Recibe los datos del usuario(clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado, Retorna
un :
“Verificado” si el usuario existe y coincide la clave también.
“Error en los datos” si esta mal la clave.
“Usuario no registrado si no coincide el mail“
Hacer los métodos necesarios en la clase usuario.
*/
include 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? null;
    $clave = $_POST['clave'] ?? null;
    $mail = $_POST['mail'] ?? null;
    $imagen = $_FILES['imagen'] ?? null;

    if ($nombre && $clave && $mail && $imagen) {
        $fechaRegistro = date('Y-m-d H:i:s'); // Obtener la fecha de registro actual
        $usuario = new Usuario($nombre, $clave, $mail, $fechaRegistro);
        
        // Guardar el usuario en el archivo JSON
        if ($usuario->GuardarUsuario()) {
            // Subir la imagen del usuario al servidor
            $imagenPath = Usuario::SubirImagen($imagen);
            if ($imagenPath) {
                echo "Usuario registrado correctamente. Imagen subida: $imagenPath";
            } else {
                echo "Error al subir la imagen.";
            }
        } else {
            echo "Error al registrar el usuario.";
        }
    } else {
        echo "Faltan datos. Asegúrese de enviar nombre, clave, mail e imagen.";
    }
} else {
    echo "Método no permitido. Use POST.";
}
?>
