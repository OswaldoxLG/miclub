<?php
include_once '../../config.php';
include_once '../../conexion.php';

if (isset($_GET['id'])) {
    $id_alumno = $_GET['id'];

    $conn->begin_transaction();

    try {
        // Se obtiene el id_usuario asociado al alumno
        $sql_get_user = "SELECT id_usuario1 FROM integrante WHERE id_integrante = ?";
        $stmt_get_user = $conn->prepare($sql_get_user);
        $stmt_get_user->bind_param('i', $id_alumno);
        $stmt_get_user->execute();
        $result_get_user = $stmt_get_user->get_result();

        if ($result_get_user->num_rows > 0) {
            $row = $result_get_user->fetch_assoc();
            $id_usuario = $row['id_usuario1'];

            // Eliminar el registro del alumno en la tabla 'integrante'
            $sql_delete_alumno = "DELETE FROM integrante WHERE id_integrante = ?";
            $stmt_delete_alumno = $conn->prepare($sql_delete_alumno);
            $stmt_delete_alumno->bind_param('i', $id_alumno);

            if ($stmt_delete_alumno->execute()) {
                // Eliminar el registro del usuario en la tabla 'usuario'
                $sql_delete_user = "DELETE FROM usuario WHERE id_usuario = ?";
                $stmt_delete_user = $conn->prepare($sql_delete_user);
                $stmt_delete_user->bind_param('i', $id_usuario);

                if ($stmt_delete_user->execute()) {
                    // Eliminar el registro del teléfono en la tabla 'telefono'
                    $sql_delete_tel = "DELETE FROM telefono WHERE id_tel = (SELECT id_tel1 FROM usuario WHERE id_usuario = ?)";
                    $stmt_delete_tel = $conn->prepare($sql_delete_tel);
                    $stmt_delete_tel->bind_param('i', $id_usuario);

                    if ($stmt_delete_tel->execute()) {
                        $conn->commit();
                        header("Location: " . BASE_URL . "admin/alumnos/index.php");
                        exit();
                    } else {
                        throw new Exception("Error al eliminar el teléfono: " . $conn->error);
                    }
                } else {
                    throw new Exception("Error al eliminar el usuario: " . $conn->error);
                }
            } else {
                throw new Exception("Error al eliminar el alumno: " . $conn->error);
            }
        } else {
            throw new Exception("No se encontró el alumno.");
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de alumno no proporcionado.";
}
?>
