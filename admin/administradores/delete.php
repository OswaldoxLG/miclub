<?php
session_start();
include_once '../../config.php';
include_once '../../conexion.php';

if (isset($_GET['id'])) {
    $id_admin = $_GET['id'];

    $conn->begin_transaction();

    try {
        $sql_get_user = "SELECT id_usuario1 FROM administrador WHERE id_admin = ?";
        $stmt_get_user = $conn->prepare($sql_get_user);
        $stmt_get_user->bind_param('i', $id_admin);
        $stmt_get_user->execute();
        $result_get_user = $stmt_get_user->get_result();

        if ($result_get_user->num_rows > 0) {
            $row = $result_get_user->fetch_assoc();
            $id_usuario = $row['id_usuario1'];

            $sql_delete_admin = "DELETE FROM administrador WHERE id_admin = ?";
            $stmt_delete_admin = $conn->prepare($sql_delete_admin);
            $stmt_delete_admin->bind_param('i', $id_admin);

            if ($stmt_delete_admin->execute()) {
                $sql_delete_user = "DELETE FROM usuario WHERE id_usuario = ?";
                $stmt_delete_user = $conn->prepare($sql_delete_user);
                $stmt_delete_user->bind_param('i', $id_usuario);

                if ($stmt_delete_user->execute()) {
                    $sql_delete_tel = "DELETE FROM telefono WHERE id_tel = (SELECT id_tel1 FROM usuario WHERE id_usuario = ?)";
                    $stmt_delete_tel = $conn->prepare($sql_delete_tel);
                    $stmt_delete_tel->bind_param('i', $id_usuario);

                    if ($stmt_delete_tel->execute()) {
                        $conn->commit();
                        header("Location: " . BASE_URL . "admin/administradores/index.php");
                        exit();
                    } else {
                        throw new Exception("Error al eliminar el teléfono: " . $conn->error);
                    }
                } else {
                    throw new Exception("Error al eliminar el usuario: " . $conn->error);
                }
            } else {
                throw new Exception("Error al eliminar el administrador: " . $conn->error);
            }
        } else {
            throw new Exception("No se encontró el administrador.");
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de administrador no proporcionado.";
}
?>