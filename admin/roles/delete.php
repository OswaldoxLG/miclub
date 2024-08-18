<?php
session_start();
include_once '../../config.php';
include_once '../../conexion.php';

if (isset($_GET['id'])) {
    $id_rol = $_GET['id'];

    $conn->begin_transaction();

    try {
        // Verifica si el rol existe
        $sql_check_rol = "SELECT id_rol FROM rol WHERE id_rol = ?";
        $stmt_check_rol = $conn->prepare($sql_check_rol);
        $stmt_check_rol->bind_param('i', $id_rol);
        $stmt_check_rol->execute();
        $result_check_rol = $stmt_check_rol->get_result();

        if ($result_check_rol->num_rows > 0) {
            // Elimina el rol
            $sql_delete_rol = "DELETE FROM rol WHERE id_rol = ?";
            $stmt_delete_rol = $conn->prepare($sql_delete_rol);
            $stmt_delete_rol->bind_param('i', $id_rol);

            if ($stmt_delete_rol->execute()) {
                $conn->commit();
                header("Location: " . BASE_URL . "admin/roles/index.php");
                exit();
            } else {
                throw new Exception("Error al eliminar el rol: " . $conn->error);
            }
        } else {
            throw new Exception("No se encontró el rol.");
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de rol no proporcionado.";
}
?>
