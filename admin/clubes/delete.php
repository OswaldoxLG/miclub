<?php
include_once '../../config.php';
include_once '../../conexion.php';

if (isset($_GET['id'])) {
    $id_curso = $_GET['id'];

    $conn->begin_transaction();

    try {
        // Verificar si el curso existe
        $sql_check = "SELECT id_curso FROM curso WHERE id_curso = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param('i', $id_curso);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // Eliminar el curso de la base de datos
            $sql_delete_curso = "DELETE FROM curso WHERE id_curso = ?";
            $stmt_delete_curso = $conn->prepare($sql_delete_curso);
            $stmt_delete_curso->bind_param('i', $id_curso);

            if ($stmt_delete_curso->execute()) {
                $conn->commit();
                header("Location: " . BASE_URL . "admin/clubes/index.php");
                exit();
            } else {
                throw new Exception("Error al eliminar el club: " . $conn->error);
            }
        } else {
            throw new Exception("No se encontró el club.");
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de club no proporcionado.";
}
?>


