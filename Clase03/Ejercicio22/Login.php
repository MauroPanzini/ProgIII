<?php

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
