<?php
session_start();
include_once '../../config.php';
include_once '../../conexion.php';

if (isset($_GET['id_integrante']) && isset($_GET['id_curso'])) {
    $id_integrante = intval($_GET['id_integrante']);
    $id_curso = intval($_GET['id_curso']);

    $conn->begin_transaction();

    try {
        $sql_delete_course = "DELETE FROM integrante_curso WHERE id_integrante1 = ? AND id_curso1 = ?";
        if ($stmt_delete_course = $conn->prepare($sql_delete_course)) {
            $stmt_delete_course->bind_param('ii', $id_integrante, $id_curso);
            if (!$stmt_delete_course->execute()) {
                throw new Exception("Error al eliminar el curso del integrante: " . $stmt_delete_course->error);
            }
            $stmt_delete_course->close();
        } else {
            throw new Exception("Error en la preparación de la consulta para eliminar el curso del integrante: " . $conn->error);
        }

        $conn->commit();
        header("Location: index.php");
        exit();

    } catch (Exception $e) {
        $conn->rollback();
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit();
}

$conn->close();

?>