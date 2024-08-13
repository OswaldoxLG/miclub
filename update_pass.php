<?php
include_once 'config.php'; // Ajusta la ruta según la ubicación
include_once 'conexion.php'; // Ajusta la ruta según la ubicación

// Consulta para obtener todos los usuarios con contraseñas sin encriptar
$sql = "SELECT id_usuario, contrasena FROM usuario";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $userId = $row['id_usuario'];
    $plainPassword = $row['contrasena']; // Contraseña sin encriptar
    $hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);

    // Actualiza la contraseña en la base de datos
    $updateSql = "UPDATE usuario SET contrasena = ? WHERE id_usuario = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("si", $hashedPassword, $userId);
    $stmt->execute();
}

echo "Contraseñas actualizadas.";
?>
