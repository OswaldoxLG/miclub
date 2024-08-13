<?php
include_once '../../config.php';
include_once '../../conexion.php';

if (isset($_GET['id'])) {
    $id_categoria = $_GET['id'];

    $conn->begin_transaction();

    try {
        $sql_check_categoria = "SELECT id_categoria FROM categoria WHERE id_categoria = ?";
        $stmt_check_categoria = $conn->prepare($sql_check_categoria);
        $stmt_check_categoria->bind_param('i', $id_categoria);
        $stmt_check_categoria->execute();
        $result_check_categoria = $stmt_check_categoria->get_result();

        if ($result_check_categoria->num_rows > 0) {
            $sql_delete_categoria = "DELETE FROM categoria WHERE id_categoria = ?";
            $stmt_delete_categoria = $conn->prepare($sql_delete_categoria);
            $stmt_delete_categoria->bind_param('i', $id_categoria);

            if ($stmt_delete_categoria->execute()) {
                $conn->commit();
                header("Location: " . BASE_URL . "admin/categorias/index.php");
                exit();
            } else {
                throw new Exception("Error al eliminar la categoría: " . $conn->error);
            }
        } else {
            throw new Exception("No se encontró la categoría.");
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de categoría no proporcionado.";
}
?>

