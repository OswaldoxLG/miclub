<?php
include_once '../config.php';
include_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido-pat'];
    $apellido_materno = $_POST['apellido-mat'];
    $correo = $_POST['email'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql_user = "INSERT INTO usuario (nom_u, paterno_u, materno_u, email, contrasena, id_rol1) VALUES (?, ?, ?, ?, ?, (SELECT id_rol FROM rol WHERE rol = ?))";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("ssssss", $nombre, $apellido_paterno, $apellido_materno, $correo, $hashed_password, $rol);

    if ($stmt_user->execute()) {
        $user_id = $stmt_user->insert_id;

        if ($rol == 'Alumno') {
            $sql_integrante = "INSERT INTO integrante (id_usuario1) VALUES (?)";
            $stmt_integrante = $conn->prepare($sql_integrante);
            $stmt_integrante->bind_param("i", $user_id);
            $stmt_integrante->execute();
        } elseif ($rol == 'Instructor') {
            $sql_instructor = "INSERT INTO instructor (id_usuario1) VALUES (?)";
            $stmt_instructor = $conn->prepare($sql_instructor);
            $stmt_instructor->bind_param("i", $user_id);
            $stmt_instructor->execute();
        } elseif ($rol == 'Administrador') {
            $sql_administrador = "INSERT INTO administrador (id_usuario1) VALUES (?)";
            $stmt_administrador = $conn->prepare($sql_administrador);
            $stmt_administrador->bind_param("i", $user_id);
            $stmt_administrador->execute();
        }

        header("Location: " . BASE_URL . "index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

?>
