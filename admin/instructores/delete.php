<?php
include_once '../../config.php';
include_once '../../conexion.php';

if (isset($_GET['id'])) {
    $id_instructor = $_GET['id'];

    // Iniciar la transacción
    $conn->begin_transaction();

    try {
        // Primero, obtenemos el id_usuario asociado al instructor
        $sql_get_user = "SELECT id_usuario1 FROM instructor WHERE id_instructor = ?";
        $stmt_get_user = $conn->prepare($sql_get_user);
        $stmt_get_user->bind_param('i', $id_instructor);
        $stmt_get_user->execute();
        $result_get_user = $stmt_get_user->get_result();

        if ($result_get_user->num_rows > 0) {
            $row = $result_get_user->fetch_assoc();
            $id_usuario = $row['id_usuario1'];

            // Eliminamos el instructor
            $sql_delete_instructor = "DELETE FROM instructor WHERE id_instructor = ?";
            $stmt_delete_instructor = $conn->prepare($sql_delete_instructor);
            $stmt_delete_instructor->bind_param('i', $id_instructor);

            if ($stmt_delete_instructor->execute()) {
                // Eliminamos el usuario asociado
                $sql_delete_user = "DELETE FROM usuario WHERE id_usuario = ?";
                $stmt_delete_user = $conn->prepare($sql_delete_user);
                $stmt_delete_user->bind_param('i', $id_usuario);

                if ($stmt_delete_user->execute()) {
                    // Eliminamos el teléfono asociado al usuario
                    $sql_delete_tel = "DELETE FROM telefono WHERE id_tel = (SELECT id_tel1 FROM usuario WHERE id_usuario = ?)";
                    $stmt_delete_tel = $conn->prepare($sql_delete_tel);
                    $stmt_delete_tel->bind_param('i', $id_usuario);

                    if ($stmt_delete_tel->execute()) {
                        // Confirmamos la transacción
                        $conn->commit();
                        // Redirigimos de vuelta al listado de instructores
                        header("Location: " . BASE_URL . "admin/instructores/index.php");
                        exit();
                    } else {
                        throw new Exception("Error al eliminar el teléfono: " . $conn->error);
                    }
                } else {
                    throw new Exception("Error al eliminar el usuario: " . $conn->error);
                }
            } else {
                throw new Exception("Error al eliminar el instructor: " . $conn->error);
            }
        } else {
            throw new Exception("No se encontró el instructor.");
        }
    } catch (Exception $e) {
        // Si ocurre algún error, revertimos la transacción
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de instructor no proporcionado.";
}
?>
