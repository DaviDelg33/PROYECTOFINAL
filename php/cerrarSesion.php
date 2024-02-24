<?php
// Iniciar la sesión
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redirigir al usuario al inicio (ajusta la ruta según sea necesario)
header("Location: inicio.php");
exit;
?>