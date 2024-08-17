<?php
session_start();
include_once '../../config.php';
include_once '../../conexion.php';

// Verificar si el parámetro `id` está presente en la URL
if (isset($_GET['id'])) {
    $id_integrante = intval($_GET['id']);
    
    // Iniciar una transacción
    $conn->begin_transaction();

    try {
        // Eliminar la relación en la tabla `integrante_curso`
        $sql_delete_courses = "DELETE FROM integrante_curso WHERE id_integrante1 = ?";
        if ($stmt_delete_courses = $conn->prepare($sql_delete_courses)) {
            $stmt_delete_courses->bind_param('i', $id_integrante);
            if (!$stmt_delete_courses->execute()) {
                throw new Exception("Error al eliminar registros en integrante_curso: " . $stmt_delete_courses->error);
            }
            $stmt_delete_courses->close();
        } else {
            throw new Exception("Error en la preparación de la consulta para eliminar registros en integrante_curso: " . $conn->error);
        }

        // Confirmar la transacción
        $conn->commit();
        // Redirigir a la página de lista de alumnos después de la eliminación exitosa
        header("Location: listaalu.php");
        exit();

    } catch (Exception $e) {
        // Si ocurre un error, deshacer la transacción
        $conn->rollback();
        die("Error: " . $e->getMessage());
    }

} else {
    // Si no se proporciona el ID, redirigir a la página de lista de alumnos
    header("Location: listaalu.php");
    exit();
}

// Cerrar la conexión
$conn->close();

?>
