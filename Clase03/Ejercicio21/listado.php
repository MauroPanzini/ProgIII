<?php

include 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $tipo = $_GET['tipo'] ?? null;

    if ($tipo === 'usuarios') {
        $usuarios = Usuario::LeerUsuarios();
        echo "<ul>";
        foreach ($usuarios as $usuario) {
            echo "<li>{$usuario->GetNombre()} - {$usuario->GetMail()}</li>";
        }
        echo "</ul>";
    } else {
        echo "Tipo de listado no válido. Por favor, especifique 'usuarios'.";
    }
} else {
    echo "Método no permitido. Use GET.";
}
?>
