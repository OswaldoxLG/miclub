<?php
session_start();
include_once '../../config.php';
include_once '../../conexion.php';

if (isset($_GET['id'])) {
    $id_direccion = $_GET['id'];

    $conn->begin_transaction();

    try {
        $sql_delete_direccion = "DELETE FROM direccion WHERE id_direccion = ?";
        $stmt_delete_direccion = $conn->prepare($sql_delete_direccion);
        $stmt_delete_direccion->bind_param('i', $id_direccion);
        
        if (!$stmt_delete_direccion->execute()) {
            throw new Exception("Error al eliminar la dirección: " . $conn->error);
        }

        $conn->commit();
        header("Location: " . BASE_URL . "admin/direcciones/index.php"); 
        exit();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "id de dirección no proporcionado.";
}
?>
