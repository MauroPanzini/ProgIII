<?php
/*
Mauro Panzini - A332-1 LUNES
Aplicación No 24 ( Listado JSON y array de usuarios)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,etc.),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.json.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista.
Hacer los métodos necesarios en la clase usuario
*/
include 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $tipo = $_GET['tipo'] ?? null;

    if ($tipo === 'usuarios') {
        $usuarios = Usuario::LeerUsuarios();
        echo "<ul>";
        foreach ($usuarios as $usuario) {
            echo "<li>{$usuario['nombre']} - {$usuario['mail']}</li>";
        }
        echo "</ul>";
    } else {
        echo "Tipo de listado no válido. Por favor, especifique 'usuarios'.";
    }
} else {
    echo "Método no permitido. Use GET.";
}
?>
