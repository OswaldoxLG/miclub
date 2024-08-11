<?php
include_once '../config.php'; // Incluye el archivo de configuración para asegurarte de que la sesión esté iniciada correctamente

// Destruir todas las sesiones
session_start();
session_unset();
session_destroy();

// Redirigir a la página principal después de cerrar sesión
header("Location: " . BASE_URL . "index.php");
exit();
?>
