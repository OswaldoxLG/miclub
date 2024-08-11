<?php
include_once '../config.php';
include_once '../conexion.php';

session_start(); // Inicia la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para obtener el usuario y rol
    $sql = "SELECT u.id_usuario, u.contrasena, r.rol 
            FROM usuario u
            INNER JOIN rol r ON u.id_rol1 = r.id_rol
            WHERE u.email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verifica la contraseña
        if (password_verify($password, $row['contrasena'])) {
            $_SESSION['user_id'] = $row['id_usuario'];
            $_SESSION['user_role'] = $row['rol'];

            // Redirige a la página principal
            header("Location: " . BASE_URL . "index.php");
            exit();
        } else {
            echo "Credenciales incorrectas.";
        }
    } else {
        echo "No se encontró el usuario.";
    }
}
?>



