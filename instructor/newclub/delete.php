<?php 
session_start();
include_once '../../config.php'; 
include_once '../../conexion.php'; 

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID de curso inválido.";
    exit();
}

$curso_id = intval($_GET['id']);

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

$sql_delete_instructor_curso = "DELETE FROM instructor_curso WHERE id_curso1 = ?";
$stmt_delete_instructor_curso = $conn->prepare($sql_delete_instructor_curso);
$stmt_delete_instructor_curso->bind_param("i", $curso_id);
$stmt_delete_instructor_curso->execute();

$sql_delete = "DELETE FROM curso WHERE id_curso = ?";
$stmt_delete = $conn->prepare($sql_delete);
$stmt_delete->bind_param("i", $curso_id);

if ($stmt_delete->execute()) {
    if ($curso['imagen'] && file_exists('../../instructor/img_cursos/' . basename($curso['imagen']))) {
        unlink('../../instructor/img_cursos/' . basename($curso['imagen']));
    }
    
    header("Location: index.php"); 
    exit();
} else {
    echo "Error al eliminar el curso: " . $stmt_delete->error;
}
?>
