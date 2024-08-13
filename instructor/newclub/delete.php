<?php 
include_once '../../config.php'; 
include_once '../../conexion.php'; 

// Obtener el ID del curso a eliminar
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID de curso inválido.";
    exit();
}

$curso_id = intval($_GET['id']);

// Consultar los datos actuales del curso para obtener la imagen
$sql_curso = "SELECT imagen FROM curso WHERE id_curso = ?";
$stmt_curso = $conn->prepare($sql_curso);
$stmt_curso->bind_param("i", $curso_id);
$stmt_curso->execute();
$result_curso = $stmt_curso->get_result();

if ($result_curso->num_rows === 0) {
    echo "Curso no encontrado.";
    exit();
}

$curso = $result_curso->fetch_assoc();

// Eliminar registros dependientes en instructor_curso
$sql_delete_instructor_curso = "DELETE FROM instructor_curso WHERE id_curso1 = ?";
$stmt_delete_instructor_curso = $conn->prepare($sql_delete_instructor_curso);
$stmt_delete_instructor_curso->bind_param("i", $curso_id);
$stmt_delete_instructor_curso->execute();

// Eliminar el curso de la base de datos
$sql_delete = "DELETE FROM curso WHERE id_curso = ?";
$stmt_delete = $conn->prepare($sql_delete);
$stmt_delete->bind_param("i", $curso_id);

if ($stmt_delete->execute()) {
    // Eliminar la imagen asociada si existe
    if ($curso['imagen'] && file_exists('../../instructor/img_cursos/' . basename($curso['imagen']))) {
        unlink('../../instructor/img_cursos/' . basename($curso['imagen']));
    }
    
    header("Location: index.php"); // Redireccionar a la página de cursos
    exit();
} else {
    echo "Error al eliminar el curso: " . $stmt_delete->error;
}
?>
