<?php
include_once '../config.php';
include_once '../conexion.php';

session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['email'];
    $password = $_POST['password'];

    // obtener usuario y rol
    $sql = "SELECT u.id_usuario, u.nom_u, u.contrasena, r.rol 
            FROM usuario u
            INNER JOIN rol r ON u.id_rol1 = r.id_rol
            WHERE u.email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifica contraseña
        if (password_verify($password, $row['contrasena'])) {
            $_SESSION['user_name'] = $row['nom_u'];
            $_SESSION['user_id'] = $row['id_usuario'];
            $_SESSION['user_role'] = $row['rol'];

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



