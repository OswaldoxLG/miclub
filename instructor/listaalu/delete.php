<?php
session_start();
include_once '../../config.php';
include_once '../../conexion.php';

// Verificar si los parámetros `id_integrante` y `id_curso` están presentes en la URL
if (isset($_GET['id_integrante']) && isset($_GET['id_curso'])) {
    $id_integrante = intval($_GET['id_integrante']);
    $id_curso = intval($_GET['id_curso']);
    
    // Iniciar una transacción
    $conn->begin_transaction();

    try {
        // Eliminar la relación específica en la tabla `integrante_curso`
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

        // Confirmar la transacción
        $conn->commit();
        // Redirigir a la página de lista de alumnos después de la eliminación exitosa
        header("Location: index.php");
        exit();

    } catch (Exception $e) {
        // Si ocurre un error, deshacer la transacción
        $conn->rollback();
        die("Error: " . $e->getMessage());
    }

} else {
    // Si no se proporcionan los IDs, redirigir a la página de lista de alumnos
    header("Location: index.php");
    exit();
}

// Cerrar la conexión
$conn->close();

?>