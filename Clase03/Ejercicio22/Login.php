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
    $mail = $_POST['mail'] ?? null;
    $clave = $_POST['clave'] ?? null;
    

    if ($clave && $mail) {
        $resultado = Usuario::VerificarUsuario($mail, $clave);
        echo $resultado;
    } else {
        echo "Faltan datos. Asegúrese de enviar clave y mail.";
    }
} else {
    echo "Método no permitido. Use POST.";
}
?>
